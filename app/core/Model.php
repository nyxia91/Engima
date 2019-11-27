<?php

class Model {
    protected $table;
    protected $db;
    protected $statement;

    public function __construct() {
        $this->db = new Database();
    }
}