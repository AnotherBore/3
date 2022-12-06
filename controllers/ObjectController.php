<?php
require_once "BaseXboxesController.php";

class ObjectController extends BaseXboxesController {
    public $template = "object.twig";

    public function getContext(): array
    {
        if (isset($_GET['show'])) {
            $typeShow=$_GET['show'];

            if ($typeShow=="image"){
                $this->template = "object_image.twig";
            }
            else{
                $this->template = "object_info.twig";
            }
        } else {
            $this->template = "object.twig";
        }
        $context = parent::getContext();


        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        $query = $this->pdo->prepare("SELECT id, title, image, description FROM xboxes WHERE id = :my_id;");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        // стягиваем одну строчку из базы
        $data = $query->fetch();

        // передаем описание из БД в контекст
        $context['id'] = $data['id'];
        $context['title'] = $data['title'];
        $context['image'] = $data['image'];
        $context['description'] = $data['description'];
        // $context['description'] = nl2br($data['description'], false);
        // $context['image'] = $data['image'];

        return $context;
    }
}