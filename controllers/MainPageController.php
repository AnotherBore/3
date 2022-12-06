<?php
require_once "BaseXboxController.php";

class MainPageController extends BaseXboxController {
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

        $context['xboxes'] = $query->fetchAll();

        return $context;
    }
}
