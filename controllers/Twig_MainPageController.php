<?php
// require_once "Twig_ParentController.php";

class Twig_MainPageController extends Twig_ParentController {
    public $template = "mainPage.twig";
    public $title = "Microsoft Store";


    public function getContext(): array
    {
        $context = parent::getContext();
        
        // подготавливаем запрос SELECT * FROM space_objects
        // вообще звездочку не рекомендуется использовать, но на первый раз пойдет
        $query = $this->pdo->query("SELECT * FROM xboxes");
        
        // стягиваем данные через fetchAll() и сохраняем результат в контекст
        $context['xboxes'] = $query->fetchAll();

        return $context;
    }
}
