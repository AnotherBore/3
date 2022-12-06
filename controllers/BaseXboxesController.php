<?php

class BaseXboxesController extends Twig_ParentController {
    public function getContext(): array{
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT DISTINCT type FROM xboxes ORDER BY 1");
        $types = $query->fetchAll();
        $context['types']=$types;

        return $context;
    }
}