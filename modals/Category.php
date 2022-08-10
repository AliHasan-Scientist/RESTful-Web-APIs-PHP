<?php

class Category
{
    // db stuff
    private $table;
    private $conn;
    // properties
    public $id;
    public $name;
    public $created_at;

    // init database stuff
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = 'SELECT `id`, `name`, `created_at` FROM `categories` ';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}