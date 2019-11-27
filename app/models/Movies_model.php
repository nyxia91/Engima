<?php

class Movies_model extends Model {
    protected $table = 'movie';

    public function __construct() {
        parent::__construct();
    }

    public function getAllMovie()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->fetchAll();
    }

    public function findAllMoviesByTitle($title) {
        $this->db->query("SELECT * from $this->table WHERE movie_title LIKE '%?%'");
        $this->db->bind('s', $title);

        return $this->db->fetchAll();
    }

    public function findMoviesByPageAndTitle($data) {
        $this->db->query("SELECT * from $this->table WHERE movie_title LIKE '%{$data['keyword']}%' ORDER BY movie_id LIMIT ?, ?");
        $this->db->bind("ii", $data['starting_idx'], $data['max_per_page']);

        return $this->db->fetchAll();
    }

    public function countMoviesByTitle($keyword) {
        $this->db->query("SELECT COUNT(movie_id) FROM movie WHERE movie_title LIKE '%{$keyword}%'");
        return $this->db->fetch()['COUNT(movie_id)'];
    }

    public function findMovieByMovieID($movie_id) {
        $this->db->query("SELECT * FROM $this->table WHERE movie_id = ?");
        $this->db->bind('i', $movie_id);

        return $this->db->fetch();
    }
}