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
            if(count($_SESSION['route']) != 9){
                array_push($_SESSION['route'], substr($_SERVER['HTTP_REFERER'], 19));
            }
            else{
                $_SESSION['route'] = array_slice($_SESSION['route'], 1);
                array_push($_SESSION['route'], substr($_SERVER['HTTP_REFERER'], 19));
            }
        }

        $context['route'] = isset($_SESSION['route']) ? $_SESSION['route'] : "";
        $context['with_route']=true;
        return $context;
    }
}