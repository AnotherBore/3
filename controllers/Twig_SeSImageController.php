<?php
require_once "Twig_SeSController.php";

class Twig_SeSImageController extends Twig_SeSController {
    public $template = "object_image.twig";
    public $is_image = "";

    public function getContext(): array
    {   
        $is_image = "SeS/image";
        $context = parent::getContext();
        $context['image_url'] = "/images/SeS.webp";
        $context['is_image'] = $is_image;
        return $context;
    }
}