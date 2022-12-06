<?php
require_once "CommonController.php";

class ParentController extends CommonController {
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

    public function get(array $context) {
        echo $this->twig->render($this->template, $context);
    }
}
