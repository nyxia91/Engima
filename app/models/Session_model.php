<?php

class Session_model extends Model {
    protected $table = 'session';

    public function __construct() {
        parent::__construct();
    }

    public function createSessionForUser($user, $new_expire_time) {
        $this->db->query("INSERT INTO $this->table (user_id, expire_time) VALUES (?, ?)");
        $this->db->bind('ii', $user['user_id'], $new_expire_time);
        $this->db->execute();

        return $this->db->lastInsertedID();
    }

    public function findSessionByUserID($user_id) {
        $this->db->query("SELECT * FROM $this->table WHERE user_id = ?");
        $this->db->bind("i", $user_id);
        return $this->db->fetch();
    }

    public function newSessionExpireTime() {
        // 3 days
        return time() + 60*60*24*3;
    }

    public function updateSessionExpireTime($session, $new_expire_time) : int {
        $this->db->query("UPDATE $this->table SET expire_time = ? WHERE sid = ?");
        $this->db->bind("ii", $new_expire_time, $session['sid']);
        $this->db->execute();

        return $session['sid'];
    }

    public function removeSessionByID($sid) {
        $this->db->query("DELETE FROM $this->table WHERE sid = ?");
        $this->db->bind("i", $sid);
        $this->db->execute();
    }

    public function isSessionExpired($session) {
        return $session['expire_time'] < time();
    }
}