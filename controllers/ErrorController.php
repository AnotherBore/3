<?php
require_once "BaseXboxesController.php";

class ErrorController extends BaseXboxesController {
    public $template = "404.twig";
    public $title = "Ошибка";

    public function get()
    {
        http_response_code(404);
        parent::get();
    }
}