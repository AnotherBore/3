<?php
require_once "Twig_SeXController.php";

class Twig_SeXInfoController extends Twig_SeXController {
    public $template = "SeX.twig";
    public $is_info = "";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 
        $is_info = "SeX/info";
        $context['is_info'] = $is_info;
        return $context;
    }
}