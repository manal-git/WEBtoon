<?php
require_once 'Database.php';

class Genre extends Database
{

    public function getAllGenres()
    {
        $query = "SELECT * FROM genre";
        return $this->executeQuery($query);
    }   

    public function addGenre($genre)
    {
        $query = "INSERT INTO genre (genre_bd) VALUES ('$genre')";
        return $this->executeQuery($query);
    }
}
