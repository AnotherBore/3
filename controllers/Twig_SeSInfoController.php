<?php
require_once "Twig_SeSController.php";

class Twig_SeSInfoController extends Twig_SeSController {
    public $template = "SeS.twig";
    public $is_info = "";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 
        $is_info = "SeS/info";
        $context['is_info'] = $is_info;
        return $context;
    }
}