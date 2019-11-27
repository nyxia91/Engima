<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $statement;
    private $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if ($this->connection->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->connection->connect_error;
        }
    }

    public function query($query) {
        $this->statement = $this->connection->prepare($query);
    }

    public function bind(...$args) {
        $this->statement->bind_param(...$args);
    }

    public function execute() {
        $this->statement->execute();
    }

    public function fetchAll() {
        $this->execute();
        $result  = $this->statement->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetch() {
        $this->execute();
        $result  = $this->statement->get_result();
        return $result->fetch_assoc();
    }

    public function affectedRow() {
        return $this->statement->affected_rows;
    }

    public function lastInsertedID() {
        return $this->connection->insert_id;
    }
}