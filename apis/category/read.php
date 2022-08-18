<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: GET');
header('Content-Type: application/json');
// include resources
include_once('../../config/Database.php');
include_once('../../modals/Category.php');
//create db instance
$db = new Database();
$database = $db->connect();
$category = new Category($database);

//

$result = $category->read();
$num_of_results = $result->rowCount();
if ($num_of_results > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $arr[] = $row;


    }
    echo json_encode($arr);


} else {
    echo json_encode(array("message" => "no record found"));

}

