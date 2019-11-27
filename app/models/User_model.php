<?php

class User_model extends Model
{
    protected $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByID($user_id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE user_id = ?");
        $this->db->bind('i', $user_id);
        return $this->db->fetch();
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM $this->table WHERE username = ?");
        $this->db->bind('s', $username);
        return $this->db->fetch();
    }

    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM $this->table WHERE email = ?");
        $this->db->bind('s', $email);
        return $this->db->fetch();
    }

    public function getUserByPhone($phone)
    {
        $this->db->query("SELECT * FROM $this->table WHERE phone = ?");
        $this->db->bind('i', $phone);
        return $this->db->fetch();
    }

    public function insertUser($user)
    {
        $this->db->query("INSERT INTO $this->table (username, email, phone, password, prof_pic) VALUES (?, ? , ?, ?, ?)");
        $this->db->bind('ssiss', $user['username'], $user['email'], $user['phone'], $user['password'], $user['profile_pic']);

        $this->db->execute();
        return $this->db->lastInsertedID();
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        $this->db->query("SELECT * FROM $this->table WHERE username = ? AND password = ?");
        $this->db->bind("ss", $username, $password);
        return $this->db->fetch();
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        $this->db->query("SELECT * FROM $this->table WHERE email = ? AND password = ?");
        $this->db->bind("ss", $email, $password);
        return $this->db->fetch();
    }

    public function getUserBySID($sid)
    {
        $this->db->query("SELECT * FROM $this->table JOIN session USING(user_id) WHERE sid = ?");
        $this->db->bind("i", $sid);
        return $this->db->fetch();
    }
}