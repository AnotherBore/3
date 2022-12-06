<?php

class Twig_ObjectImageController extends Twig_ParentController {
    public $template = "object_image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT id,image FROM xboxes WHERE id= :my_id;");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();

        $context['image'] = $data['image'];
        $context['id'] = $data['id'];

        return $context;
    }
}
