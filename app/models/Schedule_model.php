<?php

class Schedule_model extends Model {
    protected $table = 'schedule';

    public function __construct() {
        parent::__construct();
    }

    public function getAllSchedulesByMovieID($movie_id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE movie_id = ?");
        $this->db->bind("i", $movie_id);

        return $this->db->fetchAll();
    }

    public function getScheduleDetailByScheduleID($schedule_id)
    {
        $this->db->query("SELECT * FROM $this->table JOIN movie USING (movie_id) WHERE schedule_id = ?");
        $this->db->bind("i", $schedule_id);

        return $this->db->fetchAll();
    }

    public function updateAvailableSeats($schedule_id)
    {
        $this->db->query("SELECT COUNT(*) AS count FROM $this->table JOIN seats USING (schedule_id) WHERE schedule_id = ? AND status = 1");
        $this->db->bind("i", $schedule_id);
        $available_seats = $this->db->fetchAll();

        $this->db->query("UPDATE $this->table SET available_seats = ? WHERE schedule_id = ?");
        $this->db->bind("ii", $available_seats[0]["count"], $schedule_id);
        $this->db->execute();
    }
}