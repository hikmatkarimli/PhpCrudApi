<?php

class Post
{
    public $id;
    public $title;
    public $body;
    private $table_name = "posts";
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->connect();
    }

    public function create()
    {
        $query = "Insert into {$this->table_name} (title, body) values(?, ?)";
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars($this->title);
        $this->body = htmlspecialchars($this->body);

        if ($stmt->execute([$this->title, $this->body])) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $query = "Update {$this->table_name} set title=?, body=? where id=?";
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars($this->title);
        $this->body = htmlspecialchars($this->body);

        if ($stmt->execute([$this->title, $this->body, $this->id])) {
            return true;
        } else {
            return false;
        }
    }

    public function read()
    {
        $query = "Select * from {$this->table_name}";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function delete()
    {
        $query = "Delete from {$this->table_name} where id=?";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute([$this->id])) {
            return true;
        } else {
            return false;
        }
    }
}