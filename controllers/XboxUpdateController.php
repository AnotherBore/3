<?php
require_once "BaseXboxController.php";

class XboxUpdateController extends BaseXboxController {
    public $template = "xbox_update.twig";

    public function get(array $context){
        $id = $this->params['id'];
        $sql = <<<EOL
SELECT * FROM xboxes WHERE id = :id
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();

        $data = $query->fetch();

        $context['xbox']=$data;

        parent::get($context);
    }

    public function post(array $context) {
        if (isset($_POST['xbox'])){
				$title = $_POST['title'];
				$description = $_POST['description'];
				$type = $_POST['type'];
				$price_ru = $_POST['price_ru'];
				$price_us = $_POST['price_us'];

				$id = $this->params['id'];
				$tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];

        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        $name =  $_FILES['image']['name'];
        $sql = <<<EOL
UPDATE xboxes
SET type_FK=:type, title=:title, description=:description, image=:image_url, price_ru=:price_ru, price_us=:price_us
WHERE id=:id
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id",$id);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("price_ru", $price_ru);
				$query->bindValue("price_us", $price_us);
        $query->bindValue("image_url", $image_url);

        $query->execute();

        $context['message'] = 'Запись о консоли изменена';
        $context['title'] = $title;
        }
        $context['id'] = $this->pdo->lastInsertId();

        $this->get($context);
    }
}
