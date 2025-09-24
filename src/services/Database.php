<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/services/Config.php';

class Database
{
    private $pdo;
    
    public function __construct()
    {
        Config::load();
        $host = Config::get('DB_HOST', 'localhost');
        $dbname = Config::get('DB_NAME', 'fabioserra');
        $username = Config::get('DB_USER', 'root');
        $password = Config::get('DB_PASSWORD', '');
        $charset = Config::get('DB_CHARSET', 'utf8mb4');
        
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function execute($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
    
    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>