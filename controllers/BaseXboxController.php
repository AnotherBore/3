<?php

class BaseXboxController extends ParentController {
    public function getContext(): array{
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT DISTINCT id, title FROM xbox_types ORDER BY 1");
        $types = $query->fetchAll();
        $context['types']=$types;

        if(isset($_SERVER['HTTP_REFERER']))
        {
            if (!isset($_SESSION['route'])) {$_SESSION['route']=[];}
            array_push($_SESSION['route'], substr($_SERVER['HTTP_REFERER'], 19));
        }

        $context['route'] = isset($_SESSION['route']) ? $_SESSION['route'] : "";
        return $context;
    }
}