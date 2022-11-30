<?php
// require_once "Twig_ParentController.php";

class Twig_ObjectController extends Twig_ParentController {
    public $template = "object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        echo "<pre>";
        print_r($this->params);
        echo "</pre>";
        
        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        $query = $this->pdo->prepare("SELECT description, id FROM xboxes WHERE id= :id");
        // подвязываем значение в my_id 
        $query->bindValue("id", $this->params['id']);
        $query->execute();  
        // стягиваем одну строчку из базы
        $data = $query->fetch();
        
        // передаем описание из БД в контекст
        $context['description'] = $data['description'];

        return $context;
    }
}