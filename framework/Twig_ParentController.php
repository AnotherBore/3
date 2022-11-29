<?php
require_once "CommonController.php";

class Twig_ParentController extends CommonController {
    public $title = "";
    public $template = "";
    public $url_title = "";

    protected \Twig\Environment $twig;
    
    public function setTwig($twig) {
        $this->twig = $twig;
    }
    
    public function getContext() : array
    {
        $context = parent::getContext();
        $context['title'] = $this->title;
        return $context;
    }
    
    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}
