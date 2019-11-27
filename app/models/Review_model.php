<?php

class Review_model extends Model
{  
    protected $table = 'review';

    public function __construct()
    {
        parent::__construct();
    }

    public function getReviewByUserAndMovieId($user_id, $movie_id)
    {
        $this->db->query("SELECT * FROM $this->table NATURAL JOIN movie WHERE user_id = ? AND movie_id = ?");
        $this->db->bind('ii', $user_id, $movie_id);
        return $this->db->fetch();
    }

    public function getAllReviewsByMovieID($movie_id)
    {
        $this->db->query("SELECT * FROM $this->table JOIN user USING (user_id) WHERE movie_id = ?");
        $this->db->bind("i", $movie_id);
        return $this->db->fetchAll();
    }

    public function getMovie($movie_id){
        $this->db->query("SELECT * FROM movie WHERE movie_id = ?");
        $this->db->bind('i', $movie_id);
        return $this->db->fetch();
    }

    public function getScheduleByUserAndMovieId($user_id, $movie_id)
    {
        $this->db->query("SELECT * FROM $this->table NATURAL JOIN history NATURAL JOIN schedule WHERE user_id = ? AND movie_id = ?");
        $this->db->bind('ii', $user_id, $movie_id);
        return $this->db->fetch();
    }

    public function insertReview($review)
    {
        $this->db->query("INSERT INTO $this->table (user_id, movie_id, rate, review) VALUES (? , ?, ?, ?)");
        $this->db->bind('iiis', $review['user_id'], $review['movie_id'], $review['rate'], $review['review']);

        $this->db->execute();

        $this->db->query("UPDATE $this->table NATURAL JOIN history NATURAL JOIN schedule SET reviewed = 1 WHERE user_id = ? AND movie_id = ?");
        $this->db->bind('ii', $review['user_id'], $review['movie_id']);

        $this->db->execute();
        
        return $this->db->lastInsertedID();
        
    }
    
    public function deleteReview($user_id, $movie_id) {
        $this->db->query("UPDATE $this->table NATURAL JOIN history NATURAL JOIN schedule SET reviewed = 0 WHERE user_id = ? AND movie_id = ?");
        $this->db->bind('ii', $user_id, $movie_id);

        $this->db->execute();
        
        $this->db->query("DELETE FROM $this->table WHERE user_id = ? AND movie_id = ?");
        $this->db->bind('ii', $user_id, $movie_id);

        $this->db->execute();

        
    }
    
    public function updateReview($review)
    {
        $this->db->query("UPDATE $this->table SET review = ?, rate = ? WHERE user_id = ? AND movie_id = ?");
        $this->db->bind('siii', $review['review'], $review['rate'], $review['user_id'], $review['movie_id']);

        $this->db->execute();
        
    }

    
}