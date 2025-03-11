<?php
require("dbvezerlo.php");

class Oscar {

    private $db;

    public function __construct() {
        $this->db = new DBVezerlo();
    }

    public function getAllOscars() {
        $query = "SELECT m_ID, title, m_desc, pic FROM movie";
        return $this->db->executeSelectQuery($query);
    }

    public function getOscarsById($oscarId) {
        $query = "SELECT m_ID, title, m_desc, pic FROM movie WHERE m_ID = ?";
        return $this->db->executeSelectQuery($query, [$oscarId]);
    }

    public function getOscarsByType($Mt_name) {
        $query = "SELECT m_ID, title, m_desc, pic, movie_type.Mt_description
                  FROM movie
                  INNER JOIN movie_type ON movie_type.mt_ID = movie.m_type
                  WHERE movie_type.Mt_name = ?";
        return $this->db->executeSelectQuery($query, [$Mt_name]);
    }
}
?>
