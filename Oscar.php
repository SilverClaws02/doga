<?php
require("dbvezerlo.php");

class Oscar {

    private $oscars = [];

    public function __construct() {
        $query = "SELECT m_ID, title, m_desc, pic FROM movie";
        $dbvez = new DBVezerlo();
        $this->oscars = $dbvez->executeSelectQuery($query);
        $dbvez->closeDB();
    }

    public function getAllOscars()
    {
        return $this->oscars;
    }


    public function getOscarsById($OscarId)
    {
        $query = "SELECT m_ID, title, m_desc, pic FROM movie WHERE m_ID = " .$OscarId;
        $dbvez = new DBVezerlo();
        $this->oscars = $dbvez->executeSelectQuery($query);
        $dbvez->closeDB();
        return $this->oscars;
    }

    public function getOscarsByType($Mt_name) {
            $query = "SELECT m_ID, title, m_desc, pic, movie_type.Mt_description
            FROM movie
            inner join movie_type on movie_type.mt_ID=movie.m_type
            where movie_type.Mt_name= '".$Mt_name. "'";
            $dbvez = new DBVezerlo();
            $this->oscars = $dbvez->executeSelectQuery($query);
            $dbvez->closeDB();
            return $this->oscars;
        }
    }


?>
