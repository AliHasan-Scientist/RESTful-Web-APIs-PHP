<?php
// header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: user');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
// include external resources
include_once('../../config/Database.php');
include_once('../../modals/User.php');
// init Db and connect
$database = new Database();
$db = $database->connect();
// init user object
$user = new User($db);
// Get raw user data
$data = json_decode(file_get_contents("php://input"));
$user->name = $data->name;
$user->password = $data->password;

// Create user
if ($user->createUser()) {
    echo json_encode(
        array('message' => 'user Created')
    );
} else {
    echo json_encode(
        array('message' => 'user Not Created')
    );
}
