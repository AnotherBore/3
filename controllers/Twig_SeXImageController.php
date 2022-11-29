<?php
require_once "Twig_SeXController.php";

class Twig_SeXImageController extends Twig_SeXController {
    public $template = "object_image.twig";
    public $is_image = "";

    public function getContext(): array
    {   
        $is_image = "SeX/image";
        $context = parent::getContext();
        $context['image_url'] = "/images/SeX.webp";
        $context['is_image'] = $is_image;
        return $context;
    }
}