<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require $_SERVER["DOCUMENT_ROOT"] . "/Utils/common.php";
require_once "./API_controller.php";

$auth = new AuthHandler();
$apiController = new API_controller();
$router = new Utils\Router("/api", $apiController);

$router->addRoute("/about", 'handleAbout');
$router->addRoute("/getuser", 'handleGetUser');
$router->addRoute("/categories", 'handleCategories');
$router->addRoute("/assets", 'handleAssets');
$router->addRoute("/teacher/ordered", 'handle_teacher_ordered');
$router->addRoute("/teacher", 'handle_teacher_ordered');
$router->addRoute("/courses", 'handle_courses');
$router->addRoute("/videos", 'handle_courses');
$router->addRoute("/users", 'handle_users');
$router->addRoute("/videos", 'handle_videos');
$router->addRoute("/announcements", 'handle_announcements');
$router->addRoute("/chapters", 'handle_chapters');
$router->addRoute("/subchapters", 'handle_subchapters');
$router->addRoute("/enrollments", 'handle_enrollments');
$router->addRoute("/enrolled", 'handle_enrolled');
$router->addRoute("/verify", 'handle_verify');
$router->addRoute('/web/about','');
$router->addRoute('/test/role','test_roles');
$router->addRoute('/courseusers','handle_course_users');

$router->dispatch();
