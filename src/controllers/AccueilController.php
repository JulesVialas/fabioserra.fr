<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/services/Email.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/services/SEO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/models/ConsultationCitoyenne.php';

class AccueilController
{
    public function get()
    {
        $uri = $_SERVER['REQUEST_URI'] === '/' ? '/' : '/accueil';
        $seo = SEO::getPageData($uri);
        include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/layouts/accueil.php';
    }
    
    public function post()
    {
        if (isset($_POST['form_type']) && $_POST['form_type'] === 'consultation-citoyenne') {
            $consultation = new ConsultationCitoyenne(
                $_POST['quartier'],
                $_POST['satisfaction'],
                $_POST['sujets'] ?? [],
                $_POST['etat'],
                $_POST['ameliorations'],
                $_POST['age']
            );
            $consultation->save();
        } elseif (isset($_POST['nom'])) {
            $email = new Email();
            $email->envoyerMail($_POST['nom'], $_POST['prenom'], $_POST['sujet'], $_POST['message']);
        }
        
        $uri = $_SERVER['REQUEST_URI'] === '/' ? '/' : '/accueil';
        $seo = SEO::getPageData($uri);
        include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/layouts/accueil.php';
    }
}
?>