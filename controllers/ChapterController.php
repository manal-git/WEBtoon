<?php
require_once dirname(__DIR__) . '/controllers/Controller.php';
require_once dirname(__DIR__) . '/models/Chapter.php';

class ChapterController extends Controller {
    private $chapterModel;

    public function __construct() {
        $this->chapterModel = new Chapter();
    }

    public function upload() {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('login.php');
        }

        $data = [
            'webtoon_id' => $this->getPostData('webtoon_id'),
            'chapter_number' => $this->getPostData('chapter_number'),
            'title' => $this->getPostData('title'),
            'content_file' => $_FILES['content_file']
        ];

        if (!$this->validateRequired($data, ['webtoon_id', 'chapter_number', 'title'])) {
            $this->redirect('views/error.php', ['erreur' => 'Please fill all required fields']);
        }

        // Handle file upload
        $target_dir = dirname(__DIR__) . '/uploads/chapters/';
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_extension = pathinfo($data['content_file']['name'], PATHINFO_EXTENSION);
        $content_path = 'chapter_' . $data['webtoon_id'] . '_' . $data['chapter_number'] . '.' . $file_extension;
        $target_file = $target_dir . $content_path;

        if (move_uploaded_file($data['content_file']['tmp_name'], $target_file)) {
            $result = $this->chapterModel->create(
                $data['webtoon_id'],
                $data['chapter_number'],
                $data['title'],
                $content_path
            );

            if ($result > 0) {
                $this->redirect('../views/confirmation.php', ['message' => 'Chapter uploaded successfully']);
            }
        }

        $this->redirect('views/error.php', ['erreur' => 'Error uploading chapter']);
    }

    public function getChapters($webtoon_id) {
        return $this->chapterModel->findByWebtoonId($webtoon_id);
    }

    public function view($webtoon_id, $chapter_number) {
        $chapter = $this->chapterModel->findByWebtoonAndNumber($webtoon_id, $chapter_number);
        if ($chapter && mysqli_num_rows($chapter) > 0) {
            return mysqli_fetch_assoc($chapter);
        }
        $this->redirect('views/error.php', ['erreur' => 'Chapter not found']);
    }
}
?>