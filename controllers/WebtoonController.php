<?php
session_start();
require_once dirname(__DIR__) . '/controllers/Controller.php';
require_once dirname(__DIR__) . '/models/Webtoon.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class WebtoonController extends Controller
{
    private $webtoonModel;

    public function __construct()
    {
        $this->webtoonModel = new Webtoon();
    }

    public function upload()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('../login.html');
            return;
        }

        $data = [
            'title' => $this->getPostData('title'),
            'description' => $this->getPostData('description'),
            'genre' => $this->getPostData('genre'),
            'nb_chapitres' => $this->getPostData('nb_chapitres'),
            'statut' => $this->getPostData('statut'),
            'cover' => $_FILES['cover_image']['name'],
            'content' => $_FILES['content']['name'],
        ];

        if (!$this->validateRequired($data, ['title', 'description', 'genre'])) {
            $this->redirect('../views/error.php', ['erreur' => 'Please fill all required fields']);
        }

        // Upload cover
        $coverDir = dirname(__DIR__) . '/public/uploads/covers/';
        if (!is_dir($coverDir)) {
            mkdir($coverDir, 0777, true);
        }
        $coverPath = $coverDir . basename($_FILES['cover_image']['name']);
        if (!move_uploaded_file($_FILES['cover_image']['tmp_name'], $coverPath)) {
            $this->redirect('../views/error.php', ['erreur' => 'Cover upload failed']);
            return;
        }

        // Upload content
        $contentDir = dirname(__DIR__) . '/public/uploads/contents/';
        if (!is_dir($contentDir)) {
            mkdir($contentDir, 0777, true);
        }
        $contentPath = $contentDir . basename($_FILES['content']['name']);
        if (!move_uploaded_file($_FILES['content']['tmp_name'], $contentPath)) {
            $this->redirect('../views/error.php', ['erreur' => 'Content upload failed']);
            return;
        }

        $result = $this->webtoonModel->create(
            $data['title'],
            $_SESSION['user_id'],
            $data['description'],
            $data['genre'],
            $data['nb_chapitres'],
            $data['statut'],
            $data['cover'],
            $data['content']
        );

        if ($result > 0) {
            $this->redirect('../views/confirmation.php', ['message' => "Webtoon uploaded successfully. $result record(s) affected."]);
        } else {
            $this->redirect('../views/error.php', ['erreur' => 'Error uploading webtoon']);
        }
    }

    public function comment()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('../login.html');
            return;
        }

        $user_id = $_SESSION['user_id'];
        $webtoon_id = $_POST['webtoon_id'] ?? null;
        $comment = $_POST['comment'] ?? '';
        $rating = $_POST['rating'] ?? null;

        if (!$webtoon_id || !$rating) {
            $this->redirect('../views/error.php', ['erreur' => 'Invalid comment data']);
            return;
        }

        $this->webtoonModel->comment($user_id, $webtoon_id, $comment, $rating);

        // Redirect back to the webtoon page
        $this->redirect("../views/webtoon.php?id=$webtoon_id");
    }

    public function view($id = null)
    {
        if ($id) {
            $webtoon = $this->webtoonModel->findById($id);
            if ($webtoon && mysqli_num_rows($webtoon) > 0) {
                return mysqli_fetch_assoc($webtoon);
            }
            $this->redirect('../views/error.php', ['erreur' => 'Webtoon not found']);
        }
        return $this->webtoonModel->getAll();
    }

    public function search()
    {
        $keyword = $this->getPostData('keyword');
        if (!$keyword) {
            $this->redirect('../views/error.php', ['erreur' => 'Please enter a search keyword']);
        }
        return $this->webtoonModel->search($keyword);
    }

    public function getByGenre($genre)
    {
        return $this->webtoonModel->findByGenre($genre);
    }

    public function getByAuthor()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('../login.html');
        }
        return $this->webtoonModel->getByAuthor($_SESSION['user_id']);
    }

    public function getAll()
    {
        return $this->webtoonModel->getAll();
    }

    public function changeStatus($id, $status)
    {
        $user_id = $_SESSION['user_id'];
        $this->webtoonModel->changeStatus($id, $status, $user_id);
    }

    public function getComments($webtoon_id)
    {
        return $this->webtoonModel->getComments($webtoon_id);
    }
}