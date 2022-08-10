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
// post query
$result = $post->read();
// get row count
$num = $result->rowCount();
// check if any post
if ($num > 0) {
    // init array

//    $posts_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => htmlentities($title),
            'author' => $author,
            'category_id' => $category_id,
            'category' => $category_name
        );
         ;
//        = $post_item;
        // Turn to json
        echo json_encode($post_item);
    }

} else {
    //
    echo json_encode(array(
        'message' => 'no posts found'

    ));

}