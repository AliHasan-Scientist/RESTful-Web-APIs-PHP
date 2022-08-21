<?php
// header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');

// include external resources
include_once('../../config/Database.php');
include_once('../../modals/User.php');
// init Db and connect
$database = new Database();
$db = $database->connect();
// init Post object
$user = new User($db);
// Get Post id
$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$user->getSingleUser();

$user_array = array(
    'id' => $user->id,
    'name' => $user->name,
    'password' => $user->password,
    'created_at'=> $user->created_at
   


);
echo json_encode($user_array);
