<?php
require_once 'Database.php';

class Webtoon extends Database {
    public function create($title, $author_id, $description, $genre, $nb_chapitres, $statut, $cover, $content) {
        $query = "INSERT INTO webtoon (titre_bd, id_auteur, description, id_genre, nb_chapitres, statut, cover, content)"
               . "VALUES ('$title', '$author_id', '$description', '$genre', '$nb_chapitres', '$statut', '$cover', '$content')";
        $this->executeQuery($query);
        return $this->getAffectedRows();
    }

    public function findById($id) {
        $query = "SELECT w.*, u.pseudo as author_name "
               . "FROM webtoon w "
               . "JOIN utilisateur u ON w.author_id = u.id "
               . "WHERE w.id = $id";
        return $this->executeQuery($query);
    }

    public function findByGenre($genre) {
        $query = "SELECT w.*, u.pseudo as author_name "
               . "FROM webtoon w "
               . "JOIN utilisateur u ON w.author_id = u.id "
               . "WHERE w.genre = '$genre'";
        return $this->executeQuery($query);
    }

    public function search($keyword) {
        $query = "SELECT w.*, u.pseudo as author_name "
               . "FROM webtoon w "
               . "JOIN utilisateur u ON w.author_id = u.id "
               . "WHERE w.title LIKE '%$keyword%' "
               . "OR w.description LIKE '%$keyword%'";
        return $this->executeQuery($query);
    }

    public function getAll() {
        $query = "SELECT w.*, u.pseudo as author_name "
               . "FROM webtoon w "
               . "JOIN utilisateur u ON w.author_id = u.id "
               . "ORDER BY w.title";
        return $this->executeQuery($query);
    }

    public function getByAuthor($author_id) {
        $query = "SELECT w.*, u.pseudo as author_name "
               . "FROM webtoon w "
               . "JOIN utilisateur u ON w.author_id = u.id "
               . "WHERE w.author_id = $author_id";
        return $this->executeQuery($query);
    }
}
?>