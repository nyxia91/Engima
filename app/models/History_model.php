<?php

class History_model extends Model
{  
    protected $table = 'history';

    public function __construct()
    {
        parent::__construct();
    }

    public function getHistoryByUserId($user_id)
    {
        $this->db->query("SELECT * FROM $this->table NATURAL JOIN schedule NATURAL JOIN movie WHERE user_id = ?");
        $this->db->bind('i', $user_id);
        return $this->db->fetchAll();
    }

    public function insertHistory($user_id, $schedule_id, $seat_id)
    {
        $this->db->query("INSERT INTO $this->table (user_id, schedule_id, finished_time, reviewed) VALUES (?, ? , ?, ?)");
        $this->db->bind('iiii', $user_id, $schedule_id, 0, 0);

        $this->db->execute();
    }
}