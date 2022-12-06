<?php
// require_once "Twig_ParentController.php";

class Twig_ObjectController extends Twig_ParentController {
    public $template = "object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();


        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        $query = $this->pdo->prepare("SELECT id, title FROM xboxes WHERE id = :my_id;");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        // стягиваем одну строчку из базы
        $data = $query->fetch();

        // передаем описание из БД в контекст
        $context['id'] = $data['id'];
        $context['title'] = $data['title'];
        // $context['description'] = nl2br($data['description'], false);
        // $context['image'] = $data['image'];

        return $context;
    }
}