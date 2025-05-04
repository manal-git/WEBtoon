<?php
require_once 'Database.php';

class Webtoon extends Database
{
    public function __construct()
    {
        // Ensure to use the Singleton instance of Database
        $this->lien_base = Database::getInstance()->lien_base;
    }

    // Create a new webtoon
    public function create($title, $author_id, $description, $genre, $nb_chapitres, $statut, $cover, $content)
    {
        $query = "INSERT INTO webtoon (titre_bd, id_auteur, description, id_genre, nb_chapitres, statut, cover, content) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->lien_base->prepare($query);
        $stmt->bind_param("sisissss", $title, $author_id, $description, $genre, $nb_chapitres, $statut, $cover, $content);
        $stmt->execute();
        return $this->lien_base->affected_rows;
    }

    // Find a webtoon by its ID
    public function findById($id)
    {
        $query = "SELECT 
        w.*, 
        l.*, 
        ROUND(AVG(a.rating), 1) AS average_rating, 
        u.pseudo AS author_name
    FROM webtoon w
    JOIN utilisateur u ON w.id_auteur = u.id
    LEFT JOIN library l ON w.id = l.webtoon_id
    LEFT JOIN avis a ON w.id = a.id_bd
    WHERE w.id = ?
    GROUP BY w.id, l.webtoon_id, l.user_id, l.status, u.pseudo";

        $stmt = $this->lien_base->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Find webtoons by genre
    public function findByGenre($genre)
    {
        $query = "SELECT w.*, g.*, u.pseudo as author_name 
                  FROM webtoon w 
                  JOIN utilisateur u ON w.id_auteur = u.id 
                  JOIN genre g ON w.id_genre = g.id
                  WHERE w.id_genre = ?";

        $stmt = $this->lien_base->prepare($query);
        $stmt->bind_param("i", $genre);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Search for webtoons by keyword
    public function search($keyword)
    {
        $query = "SELECT w.*, u.pseudo as author_name 
                  FROM webtoon w 
                  JOIN utilisateur u ON w.id_auteur = u.id 
                  WHERE w.titre_bd LIKE ? OR w.description LIKE ?";

        $stmt = $this->lien_base->prepare($query);
        $keyword = "%$keyword%";
        $stmt->bind_param("ss", $keyword, $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Get all webtoons
    public function getAll()
    {
        $query = "SELECT w.*, g.genre_bd, u.pseudo as author_name 
                  FROM webtoon w 
                  JOIN utilisateur u ON w.id_auteur = u.id 
                  JOIN genre g ON w.id_genre = g.id 
                  ORDER BY w.titre_bd";

        $stmt = $this->lien_base->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Get webtoons by author ID
    public function getByAuthor($author_id)
    {
        $query = "SELECT w.*, u.pseudo as author_name 
                  FROM webtoon w 
                  JOIN utilisateur u ON w.id_auteur = u.id 
                  WHERE w.id_auteur = ?";

        $stmt = $this->lien_base->prepare($query);
        $stmt->bind_param("i", $author_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function changeStatus($id, $status, $user_id)
    {
        $query = "INSERT INTO library(user_id, webtoon_id, status) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE status = ?";
        $stmt = $this->lien_base->prepare($query);
        $stmt->bind_param("iiss", $user_id, $id, $status, $status);
        $stmt->execute();
        header("Location: ./webtoon.php?id=" . $id);
        return $stmt->affected_rows;
    }

    public function comment($user_id, $id, $comment, $rating)
    {
        $query = "INSERT INTO avis(id_utilisateur, id_bd, content, rating, comment_date) VALUES(?,?,?,?, NOW()) ON DUPLICATE KEY UPDATE content =?, rating =?, comment_date = NOW()";
        $stmt = $this->lien_base->prepare($query);
        $stmt->bind_param("iisisi", $user_id, $id, $comment, $rating, $comment, $rating);
        $stmt->execute();
        header("Location:./webtoon.php?id=" . $id);
        return $stmt->affected_rows;
    }

    public function getComments($id)
    {
        $query = "SELECT a.*, u.pseudo as author_name FROM avis a 
        JOIN utilisateur u ON a.id_utilisateur = u.id 
        WHERE a.id_bd =?";
        $stmt = $this->lien_base->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
