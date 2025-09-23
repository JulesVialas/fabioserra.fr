<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/models/Utilisateur.php';

class LoginController
{
    public function get()
    {
        if (isset($_SESSION['admin'])) {
            header('Location: /dashboard');
            exit;
        }
        include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/layouts/login.php';
    }
    
    public function post()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $user = Utilisateur::authenticate($username, $password);
        
        if ($user) {
            $_SESSION['admin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header('Location: /dashboard');
            exit;
        } else {
            $_SESSION['error'] = 'Identifiants incorrects';
            header('Location: /login');
            exit;
        }
    }
}
?>
