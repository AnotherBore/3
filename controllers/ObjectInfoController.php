<?php

class ObjectInfoController extends BaseXboxesController {
    public $template = "object_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT id, description FROM xboxes WHERE id= :my_id;");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();

        $context['description'] = $data['description'];
        $context['id'] = $data['id'];

        return $context;
    }
}