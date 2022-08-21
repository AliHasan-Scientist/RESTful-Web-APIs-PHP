<?php
include_once('./config/Database.php');
class ProductController
{
    public function processRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }


    // Process Resources Method
    public function processResourceRequest(string $method, ?string $id): void
    {
    }
    // Process Collection Method
    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case 'GET':
                echo json_encode(array('id'=>'1'));
                break;
        }
    }
}
