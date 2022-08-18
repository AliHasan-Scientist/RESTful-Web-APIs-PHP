<?php
// header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');

// include external resources
include_once('../../config/Database.php');
include_once('../../modals/Post.php');
// init Db and connect
$database = new Database();
$db = $database->connect();
// init Post object
$post = new Post($db);
// Get Post id
$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$post->read_single();

$post_array = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name



);
echo json_encode($post_array);
