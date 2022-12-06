<?php
// require_once "Twig_ParentController.php";

class Twig_ErrorController extends Twig_ParentController {
    public $template = "404.twig";
    public $title = "Ошибка";

    public function get()
    {
        http_response_code(404);
        parent::get();
    }
}
