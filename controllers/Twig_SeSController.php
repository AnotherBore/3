<?php
// require_once "Twig_ParentController.php";

class Twig_SeSController extends Twig_ParentController {
    public $template = "object.twig";
    public $title = "Xbox Series S";

    public function getContext(): array
    {
        $context = parent::getContext();
        $context['url_title'] = "SeS";
        return $context;
    }
}