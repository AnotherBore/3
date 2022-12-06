<?php
require_once "BaseXboxesController.php";

class MainPageController extends BaseXboxesController {
    public $template = "mainPage.twig";
    public $title = "Microsoft Store";


    public function getContext(): array
    {
        $context = parent::getContext();

        if (isset($_GET['type'])) {
            $query = $this->pdo->prepare("SELECT * FROM xboxes WHERE type =:type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
        } else {
            $query=$this->pdo->query("SELECT * FROM xboxes");
        }

        // стягиваем данные через fetchAll() и сохраняем результат в контекст
        $context['xboxes'] = $query->fetchAll();

        return $context;
    }
}
