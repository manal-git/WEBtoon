<?php
require_once 'Database.php';

class Chapter extends Database {
    public function create($webtoon_id, $chapter_number, $title, $content_path) {
        $query = "INSERT INTO chapter (webtoon_id, chapter_number, title, content_path) "
               . "VALUES ($webtoon_id, $chapter_number, '$title', '$content_path')";
        $this->executeQuery($query);
        return $this->getAffectedRows();
    }

    public function findByWebtoonId($webtoon_id) {
        $query = "SELECT * FROM chapter "
               . "WHERE webtoon_id = $webtoon_id "
               . "ORDER BY chapter_number";
        return $this->executeQuery($query);
    }

    public function findByWebtoonAndNumber($webtoon_id, $chapter_number) {
        $query = "SELECT * FROM chapter "
               . "WHERE webtoon_id = $webtoon_id "
               . "AND chapter_number = $chapter_number";
        return $this->executeQuery($query);
    }

    public function getLatestChapters($limit = 10) {
        $query = "SELECT c.*, w.title as webtoon_title "
               . "FROM chapter c "
               . "JOIN webtoon w ON c.webtoon_id = w.id "
               . "ORDER BY c.created_at DESC "
               . "LIMIT $limit";
        return $this->executeQuery($query);
    }
}
?>