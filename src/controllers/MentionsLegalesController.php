<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/services/SEO.php';

class MentionsLegalesController
{
    public function get()
    {
        $seo = SEO::getPageData('/mentions-legales');
        include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/layouts/mentions-legales.php';
    }
    
    public function post()
    {
        $seo = SEO::getPageData('/mentions-legales');
        include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/layouts/mentions-legales.php';
    }
}
?>