<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';

require_once '../controllers/Twig_MainPageController.php';

require_once '../controllers/Twig_SeSController.php';
require_once '../controllers/Twig_SeSImageController.php';
require_once '../controllers/Twig_SeSInfoController.php';

require_once '../controllers/Twig_SeXController.php';
require_once '../controllers/Twig_SeXImageController.php';
require_once '../controllers/Twig_SeXInfoController.php';

require_once '../controllers/Twig_ErrorController.php';
require_once '../controllers/Twig_ObjectController.php';

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
$router->add("/", Twig_MainPageController::class);
$router->add("/SeS", Twig_SeSController::class);
$router->add("/xboxes/(?P<id>)", Twig_ObjectController::class);
$router->get_or_default(Twig_ErrorController::class);


// if ($url == "/") {
//     $controller = new Twig_MainPageController($twig);
// }
// elseif (preg_match("#^/SeS/image#", $url)) {
//     $controller = new Twig_SeSImageController($twig);
// }
// elseif (preg_match("#^/SeS/info#", $url)){
//     $controller = new Twig_SeSInfoController($twig);
// }
// elseif (preg_match("#^/SeX/image#", $url)) {
//     $controller = new Twig_SeXImageController($twig);
// }
// elseif (preg_match("#^/SeX/info#", $url)){
//     $controller = new Twig_SeXInfoController($twig);
// }
// elseif (preg_match("#^/SeS#", $url)) {
//     $controller = new Twig_SeSController($twig);
// }
// elseif (preg_match("#^/SeX#", $url)) {
//     $controller = new Twig_SeXController($twig);
// }

// if ($controller) {
//     $controller->setPDO($pdo); // а тут передаем PDO в контроллер
//     $controller->get();
// }
