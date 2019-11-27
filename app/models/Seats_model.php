<?php

class Seats_model extends Model {
    protected $table = 'seats';

    public function __construct() {
        parent::__construct();
    }

    public function getSeatsByScheduleID($schedule_id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE schedule_id = ?");
        $this->db->bind("i", $schedule_id);

        return $this->db->fetchAll();
    }

    public function updateSeatByScheduleIDandSeatNo($user_id, $schedule_id, $seat_no, $value) {
        $this->db->query("UPDATE $this->table SET user_id = ?, status = ? WHERE schedule_id = ? AND seat_no = ?");
        $this->db->bind("iiii", $user_id, $value, $schedule_id, $seat_no);
        $this->db->execute();
    }
}