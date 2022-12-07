<?php

class BaseXboxController extends ParentController {
    public function getContext(): array{
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT DISTINCT id, title FROM xbox_types ORDER BY 1");
        $types = $query->fetchAll();
        $context['types']=$types;

        return $context;
    }
}