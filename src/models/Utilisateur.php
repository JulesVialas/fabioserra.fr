<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/services/Database.php';

class Utilisateur
{
    public $id;
    public $username;
    public $password;
    public $role;
    
    public function __construct($username = null, $password = null, $role = 'admin')
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
    
    public static function authenticate($username, $password)
    {
        $db = new Database();
        $sql = "SELECT * FROM utilisateurs WHERE username = ?";
        $users = $db->fetchAll($sql, [$username]);
        
        if (count($users) === 1) {
            $user = $users[0];
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
?>