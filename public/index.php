<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';

require_once '../controllers/MainPageController.php';

require_once '../controllers/ErrorController.php';
require_once '../controllers/XboxController.php';
require_once '../controllers/SearchController.php';
require_once '../controllers/XboxCreateController.php';
require_once '../controllers/TypeCreateController.php';

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
$router->add("/search", SearchController::class);
$router->add("/xboxes/create", XboxCreateController::class);
$router->add("/xboxes/create/type", TypeCreateController::class);
$router->add("/xboxes/(?P<id>\d+)", XboxController::class);
$router->get_or_default(ErrorController::class);
