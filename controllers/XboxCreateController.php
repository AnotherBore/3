<?php
require_once "BaseXboxController.php";

class XboxCreateController extends BaseXboxController {
    public $template = "xbox_create.twig";

    public function get(array $context)
    {
        parent::get($context);
    }

    public function post(array $context) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $price_ru = $_POST['price_ru'];
        $price_us = $_POST['price_us'];

         $tmp_name = $_FILES['image']['tmp_name'];
         $name =  $_FILES['image']['name'];

         move_uploaded_file($tmp_name, "../public/media/$name");
         $image_url = "/media/$name";


        $sql = <<<EOL
INSERT INTO xboxes(type_FK, title, description, image, price_ru, price_us)
VALUES(:type, :title, :description, :image_url, :price_ru, :price_us)
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("price_ru", $price_ru);
        $query->bindValue("price_us", $price_us);
        $query->bindValue("image_url", $image_url);

        $query->execute();

        $context['message'] = 'Вы добавили модель консоли';
        $context['id'] = $this->pdo->lastInsertId();

        $this->get($context);
    }
}
