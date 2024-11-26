<?php
// routes.php

require_once 'app/controllers/OrganizersController.php';

$organizerscontroller = new OrganizersController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/organizers/index' || $url == '/') {
    $organizerscontroller->index();
} elseif ($url == '/organizers/create' && $requestMethod == 'GET') {
    $organizerscontroller->create();
} elseif ($url == '/organizers/store' && $requestMethod == 'POST') {
    $organizerscontroller->store();
} elseif (preg_match('/\/organizers\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $organizerscontroller->edit($userId);
} elseif (preg_match('/\/organizers\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $organizerscontroller->update($userId, $_POST);
} elseif (preg_match('/\/organizers\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $organizerscontroller->delete($userId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}