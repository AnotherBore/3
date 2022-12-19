<?php
abstract class CommonRestController {
    function list() {
        $query=$this->pdo->query("SELECT id, title FROM xboxes");
        $query->execute();
        $data=$query->fetchAll();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
     }
    function retrieve() {
        $query = $this->pdo->prepare("SELECT description, id, image, info FROM xboxes WHERE id = :id");
        $query->bindValue("id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
function create() {
    $data=file_get_contents("php://input");
    $data=json_decode($data,True);
    $sql = <<<EOL
INSERT INTO xboxes(type_FK, title, description, image, price_ru, price_us)
VALUES(:type, :title, :description, :image_url, :price_ru, :price_us)
EOL;

    $query = $this->pdo->prepare($sql);
    $query->bindValue("title",$data['title']);
    $query->bindValue("description", $data['description']);
    $query->bindValue("type", $data['type']);
    $query->bindValue("price_ru", $data['price_ru']);
    $query->bindValue("price_us", $data['price_us']);
    $query->bindValue("image_url", $data['image_url']);
    $query->execute();
    http_response_code(200);
    header("Content-type:application/json");
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
function update() {
    $data=file_get_contents("php://input");
    $data=json_decode($data,True);
    $sql=<<<EOL
    UPDATE `xboxes` type_FK=:type, title=:title, description=:description, image=:image_url, price_ru=:price_ru, price_us=:price_us WHERE `id`= :id

    EOL;
    $query=$this->pdo->prepare($sql);
    $query->bindValue("id", $this->params['id']);
    $query->bindValue("title", $data['title']);
    $query->bindValue("description", $data['description']);
    $query->bindValue("type", $data['type']);
    $query->bindValue("info", $data['info']);
    $query->bindValue("image_url", $data['image_url']);
    $query->execute();

    http_response_code(200);
    header("Content-type:application/json");
    echo json_encode(['id'=>$this->params['id']]);
}
function delete() {
    $query = $this->pdo->prepare("DELETE FROM xboxes WHERE id = :id");
    $query->bindValue("id", $this->params['id']);
    $query->execute();

    http_response_code(200);
}

function process_response(){

    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'GET'){
        if(isset($this->params['id']))
            $this->retrieve();
        else
            $this->list();
        }
        else if ($method == 'POST'){
        if(isset($this->params['id']))
            $this->update();
        else
            $this->create();
        }
        else if ($method == 'DELETE'){
            $this->delete();
        }
    }
}
