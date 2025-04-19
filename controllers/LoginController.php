<?php
require_once dirname(__DIR__) . '/controllers/Controller.php';
require_once dirname(__DIR__) . '/models/User.php';

class LoginController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        $data = [
            'email' => $this->getPostData('email'),
            'password' => $this->getPostData('password')
        ];

        if (!$this->validateRequired($data, ['email', 'password'])) {
            $this->redirect('../views/error.php', ['erreur' => 'Please enter both email and password']);
        }

        $user = $this->userModel->findByEmail($data['email']);
        
        if ($user && mysqli_num_rows($user) > 0) {
            $userData = mysqli_fetch_assoc($user);
            if ($userData['mdp'] === $data['password']) {
                session_start();
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['pseudo'] = $userData['pseudo'];
                $this->redirect('../index.html');
            }
        }

        $this->redirect('../views/error.php', ['erreur' => 'Invalid email or password']);
    }

    public function logout() {
        session_start();
        session_destroy();
        $this->redirect('../login.html');
    }
}
?>