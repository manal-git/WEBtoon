<?php
session_start();
require_once dirname(__DIR__) . '/controllers/Controller.php';
require_once dirname(__DIR__) . '/models/User.php';

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register()
    {
        $data = [
            'pseudo' => $this->getPostData('pseudo'),
            'email' => $this->getPostData('email'),
            'age' => $this->getPostData('age'),
            'password' => $this->getPostData('password'),
            'confirm_pass' => $this->getPostData('password')
        ];

        if (!$this->validateRequired($data, ['pseudo', 'email', 'age', 'password'])) {
            $this->redirect('views/error.php', ['erreur' => 'Please fill all the fields']);
        }

        $result = $this->userModel->create(
            $data['pseudo'],
            $data['email'],
            $data['password'],
            $data['age']
        );

        if ($result > 0) {
            $this->redirect('../views/confirmation.php', ['nb' => $result]);
        } else {
            $this->redirect('views/error.php', ['erreur' => 'Error inserting data']);
        }
    }
    public function getMyLibrary()
    {
        $userId = $_SESSION['user_id'];
        $library = $this->userModel->getMyLibrary($userId);
        return $library;
    }
}
