<?php

class User
{
    //DB Stuff
    private $conn;
    private $table = 'user';
    //User Properties
    public $id;
    public $name;
    public $password;
    public $created_at;

    //DB constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Get  All Posts
    public function getUser()
    {
        // Create query
        $query = "SELECT  `id`, `name`, `password`, `created_at` FROM  {$this->table}";
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // execute the query
        $stmt->execute();
        return $stmt;
    }
    public function getSingleUser()
    {
        // Create query
        $query = "SELECT * FROM  {$this->table} WHERE id=? ";
        // prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // execute the query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->password = $row['password'];
        $this->created_at = $row['created_at'];

        return $stmt;
    }

    // Create User
    public function createUser()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET name = :name, password = :password';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->password = htmlspecialchars(password_hash(strip_tags($this->password), PASSWORD_BCRYPT));


        // Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':password', $this->password);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
    // Update User
    public function updateUser()
    {
        // Create query
        $query = 'UPDATE' . $this->table . '
                          SET title = :title, body = :body, author = :author, category_id = :category_id
                          WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
