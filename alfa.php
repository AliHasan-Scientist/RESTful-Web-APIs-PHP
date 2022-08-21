<?php

declare(strict_types=1);

header('Content-Type: application/json');

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});



$parts = explode('/', $_SERVER["REQUEST_URI"]);
if ($parts[3] != 'products') {
    http_response_code(404);
    exit;
}
$id = $parts[4] ?? null;
// Connection With Database ... 
$database = new Database();
$database->connect();
$controller = new ProductController;
$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
