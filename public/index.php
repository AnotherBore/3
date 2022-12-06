<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';

require_once '../controllers/MainPageController.php';

require_once '../controllers/ErrorController.php';
require_once '../controllers/ObjectController.php';
require_once '../controllers/ObjectImageController.php';
require_once '../controllers/ObjectInfoController.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true // добавляем тут debug режим
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$title = "";
$template = "";
$url_title = "";
$context = [];



// создаем экземпляр класса и передаем в него параметры подключения
// создание класса автоматом открывает соединение
$pdo = new PDO("mysql:host=localhost;dbname=microsoft_store;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainPageController::class);
$router->add("/xboxes/(?P<id>\d+)", ObjectController::class);
$router->add("/xboxes/(?P<id>\d+)/info", ObjectInfoController::class);
$router->add("/xboxes/(?P<id>\d+)/image", ObjectImageController::class);
$router->get_or_default(ErrorController::class);
