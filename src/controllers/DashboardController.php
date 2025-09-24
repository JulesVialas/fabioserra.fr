<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/models/ConsultationCitoyenne.php';

class DashboardController
{
    public function get()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: /login');
            exit;
        }
        
        $consultations = ConsultationCitoyenne::getAll();
        include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/layouts/dashboard.php';
    }
    
    public function post()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: /login');
            exit;
        }
        
        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: /');
            exit;
        }
        
        $this->get();
    }
}
?>
