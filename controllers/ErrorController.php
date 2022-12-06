<?php
require_once "BaseXboxController.php";

class ErrorController extends BaseXboxController {
    public $template = "404.twig";
    public $title = "Ошибка";

    public function get(array $context)
    {
        http_response_code(404);
        parent::get($context);
    }
}