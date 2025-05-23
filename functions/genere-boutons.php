<?php

/**
 * Génére une liste de sous-catégories
 * @param string $parent_slug Le slug de la catégorie parente
 */
function categories_liste($parent_slug)
{
    // Récupérer la catégorie parente à partir de son slug
    $parent_category = get_category_by_slug($parent_slug);
    // Vérifier si la catégorie parente existe
    if ($parent_category) {
        $parent_id = $parent_category->term_id;
        // Récupérer les sous-catégories de "destination"
        $sous_categories = get_categories(array(
            'parent' => $parent_id, // Filtrer par le parent "destination"
            'hide_empty' => true, // Ne pas afficher les catégories vides
        ));

        // Vérifier s'il y a des sous-catégories
        if (!empty($sous_categories)) {
            echo '<ul class="categorie__ul">';
            foreach ($sous_categories as $categorie) {
                // Afficher le nom de chaque sous-catégorie
                echo '<li  data-category_id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' . esc_html($categorie->name) . '</li>';
                echo '<div class="categorie__ul__separateur"></div>';
            }
            echo '</ul>';
        }
    }
}

function categorie_par_destination($cat_a_retirer = '')
{
    $categories = get_categories([
        'hide_empty' => false,
    ]);
    // Liste des catégories autorisées (insensible à la casse)
    $categories_autorisees = [
        'aventure',
        'croisière',
        'culturel',
        'pleine nature',
        'repos',
        'sport',
        'zen',
        'populaire'
    ];
    echo '<div class="populaire__categories">';
    foreach ($categories as $cat) {
        if (
            strtolower($cat->name) !== strtolower($cat_a_retirer) &&
            in_array(strtolower($cat->name), $categories_autorisees)
        ) {
            $cat_link = get_category_link($cat->term_id);
            echo '<a class="populaire__categorie-btn" href="' . esc_url($cat_link) . '">' . esc_html($cat->name) . '</a> ';
        }
    }
    echo '</div>';
}

/*function genere_vague($couleur)
{ ?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#f3f4f5" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
<?php }*/
function genere_vague($couleur_haut = '#ffffff', $couleur_bas = '#f3f4f5')
{ ?>
    <svg id="visual" viewBox="0 0 1440 120" width="1440" height="120" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
        <rect x="0" y="0" width="1440" height="120" fill="#232323"></rect>
        <path d="M0 77L34.3 81.2C68.7 85.3 137.3 93.7 205.8 93.5C274.3 93.3 342.7 84.7 411.2 82.5C479.7 80.3 548.3 84.7 617 85.5C685.7 86.3 754.3 83.7 823 83.7C891.7 83.7 960.3 86.3 1028.8 85.7C1097.3 85 1165.7 81 1234.2 81.5C1302.7 82 1371.3 87 1405.7 89.5L1440 92" fill="none" stroke-linecap="round" stroke-linejoin="miter" stroke="#671e1e" stroke-width="40"></path>
    </svg>
<?php }
