<?php
// require_once "Twig_ParentController.php";

class Twig_SeXController extends Twig_ParentController {
    public $template = "object.twig";
    public $title = "Xbox Series X";

    public function getContext(): array
    {
        $context = parent::getContext();
        $context['url_title'] = "SeX";
        return $context;
    }
}