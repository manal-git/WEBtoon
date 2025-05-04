<?php
require_once 'Database.php';

class Genre extends Database
{
    public function __construct()
    {
        // Ensure to use the Singleton instance of Database
        $this->lien_base = Database::getInstance()->lien_base;
    }
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
