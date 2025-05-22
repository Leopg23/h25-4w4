<?php

// Chemin vers le dossier functions
$functions_dir = get_template_directory() . '/functions/';

// Liste des fichiers à inclure
$function_files = array(
    'genere-boutons.php',
    'customizer.php',
    'options.php'
);

// Boucle pour inclure tous les fichiers
foreach ($function_files as $file) {
    include_once $functions_dir . $file;
}

function afficher_icones_sociaux() {
    // Liste des réseaux à afficher
    $reseaux = [
        'facebook' => [
            'label' => 'Facebook',
            'default_url' => '#',
            'default_icon' => 'https://s2.svgbox.net/social.svg?ic=facebook'
        ],
        'linkedin' => [
            'label' => 'LinkedIn',
            'default_url' => '#',
            'default_icon' => 'https://s2.svgbox.net/social.svg?ic=linkedin'
        ],
        'stackoverflow' => [
            'label' => 'Stack Overflow',
            'default_url' => '#',
            'default_icon' => 'https://s2.svgbox.net/social.svg?ic=stackoverflow'
        ],
        'github' => [
            'label' => 'GitHub',
            'default_url' => 'https://github.com/ton-utilisateur/ton-tp2', // Mets ici l'URL de ton dépôt
            'default_icon' => 'https://s2.svgbox.net/social.svg?ic=github'
        ],
    ];

    $hero_couleur = get_theme_mod('hero_couleur', '#000000');
    $color = ltrim($hero_couleur, '#');

    echo '<div class="hero__icone">';
    foreach ($reseaux as $slug => $infos) {
        $url = get_theme_mod('social_' . $slug . '_url', $infos['default_url']);
        $icon = get_theme_mod('social_' . $slug . '_icon', $infos['default_icon'] . '&color=' . $color);
        echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener">
                <img src="' . esc_url($icon) . '" alt="' . esc_attr($infos['label']) . '" width="20" height="20">
              </a>';
    }
    echo '</div>';
}


