<?php
require_once "BaseXboxController.php";

class MainPageController extends BaseXboxController {
    public $template = "mainPage.twig";
    public $title = "Microsoft Store";


    public function getContext(): array
    {
        $context = parent::getContext();

        if (isset($_GET['type'])) {
            $query = $this->pdo->prepare("SELECT * FROM xboxes WHERE type_FK =:type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
            $data = $query->fetchAll();
            $query = $this->pdo->prepare("SELECT image FROM xbox_types WHERE id =:type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
            $data_type= $query->fetch();
            $context['image_type'] = $data_type['image'];
        } else {
            $query=$this->pdo->query("SELECT * FROM xboxes");
            $data = $query->fetchAll();
        }

        $context['xboxes'] = $data;


        return $context;
    }
}
