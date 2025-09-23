<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/services/SEO.php';

class PolitiqueConfidentialiteController
{
    public function get()
    {
        $seo = SEO::getPageData('/politique-confidentialite');
        include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/layouts/politique-confidentialite.php';
    }
    
    public function post()
    {
        $seo = SEO::getPageData('/politique-confidentialite');
        include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/layouts/politique-confidentialite.php';
    }
}
?>