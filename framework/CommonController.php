<?php
abstract class CommonController {
    public PDO $pdo; // добавил поле

    public function setPDO(PDO $pdo) { // и сеттер для него
        $this->pdo = $pdo;
    }

    public function getContext(): array {
        return [];
    }
    
    abstract public function get();
}
