<?php

class SEO {
    private static $pages = [
        '/' => [
            'title' => 'Fabio Serra - Retrouvons Muret !',
            'description' => 'Fabio Serra, candidat pour les élections municipales de Muret 2026. Participez à notre consultation citoyenne pour construire l\'avenir de Muret ensemble. Retrouvons Muret !',
            'keywords' => 'Fabio Serra, Muret, élections municipales 2026, consultation citoyenne, politique Muret, candidat municipal, Haute-Garonne',
            'canonical' => 'https://fabioserra.fr/',
            'og_image' => 'https://fabioserra.fr/assets/images/hero.webp'
        ],
        '/accueil' => [
            'title' => 'Fabio Serra - Retrouvons Muret !',
            'description' => 'Fabio Serra, candidat pour les élections municipales de Muret 2026. Participez à notre consultation citoyenne pour construire l\'avenir de Muret ensemble. Retrouvons Muret !',
            'keywords' => 'Fabio Serra, Muret, élections municipales 2026, consultation citoyenne, politique Muret, candidat municipal, Haute-Garonne',
            'canonical' => 'https://fabioserra.fr/',
            'og_image' => 'https://fabioserra.fr/assets/images/hero.webp'
        ],
        '/mentions-legales' => [
            'title' => 'Fabio Serra - Retrouvons Muret !',
            'description' => 'Mentions légales du site officiel de Fabio Serra, candidat aux élections municipales de Muret 2026. Informations légales et réglementaires.',
            'keywords' => 'mentions légales, Fabio Serra, Muret, informations légales, RGPD',
            'canonical' => 'https://fabioserra.fr/mentions-legales',
            'og_image' => 'https://fabioserra.fr/assets/images/logo-header.webp'
        ],
        '/politique-confidentialite' => [
            'title' => 'Fabio Serra - Retrouvons Muret !',
            'description' => 'Politique de confidentialité et protection des données personnelles sur le site de Fabio Serra, candidat municipal Muret 2026.',
            'keywords' => 'politique confidentialité, RGPD, protection données, Fabio Serra, Muret',
            'canonical' => 'https://fabioserra.fr/politique-confidentialite',
            'og_image' => 'https://fabioserra.fr/assets/images/logo-header.webp'
        ]
    ];

    public static function getPageData($uri) {
        return self::$pages[$uri] ?? self::$pages['/'];
    }

    public static function getTitle($uri) {
        $data = self::getPageData($uri);
        return $data['title'];
    }

    public static function getDescription($uri) {
        $data = self::getPageData($uri);
        return $data['description'];
    }

    public static function getKeywords($uri) {
        $data = self::getPageData($uri);
        return $data['keywords'];
    }

    public static function getCanonical($uri) {
        $data = self::getPageData($uri);
        return $data['canonical'];
    }

    public static function getOgImage($uri) {
        $data = self::getPageData($uri);
        return $data['og_image'];
    }

    public static function generateStructuredData($uri) {
        $baseData = [
            "@context" => "https://schema.org",
            "@type" => "Person",
            "name" => "Fabio Serra",
            "jobTitle" => "Candidat aux élections municipales",
            "address" => [
                "@type" => "PostalAddress",
                "addressLocality" => "Muret",
                "addressRegion" => "Haute-Garonne",
                "addressCountry" => "FR"
            ],
            "url" => "https://fabioserra.fr",
            "image" => "https://fabioserra.fr/assets/images/hero.webp",
            "sameAs" => [
                "https://www.facebook.com/fabioserra.muret",
                "https://twitter.com/fabioserra_31"
            ]
        ];

        if ($uri === '/' || $uri === '/accueil') {
            $baseData["@type"] = "PoliticalOrganization";
            $baseData["name"] = "Retrouvons Muret ! avec Fabio Serra";
            $baseData["description"] = "Mouvement politique pour les élections municipales de Muret 2026";
        }

        return json_encode($baseData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}