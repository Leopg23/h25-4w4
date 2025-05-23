<?php
  
//----------------------------------------------------------------------------------P2_OPTIONS

// CETTE PARTIE SERT A AJOUTER DES OPTIONS DANS WORDPRESS 
// EXEMPLE: AJOUTER UN MENU DANS LE HEADER
// CERTAINE OPTION DE WP SONT OPTIONELLES ET DOIVENT DONC ETRE AJOUTEES
// LA TOTALITE DES OPTION DISPONIBLE EST DANS LA DOC DE WP ET PEUVENT ETRE 
// AJOUTEES AVEC LA FONCTION ADD_THEME_SUPPORT
add_action('customize_register', 'theme_tp_customize_register');
function mon_theme_supports()
{

  add_theme_support('title-tag');
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', array(
    'height'      => 150,
    'width'       => 150,
    'flex-height' => true,
    'flex-width'  => true,
  ));
}
add_action('after_setup_theme', 'mon_theme_supports');


// CETTE PARTIE SERT A METTRE LE CSS DU SITE DANS LE HEADER.
// SA SERT A REGLER LES PROBLEMES DE CSS QUI NE S'APPLIQUENT PAS
// DANS LE BON ORDRE
// CETTE PARTIE EST OPTIONNELLE MAIS RECOMMANDEE
function theme_4w4_enqueue_styles()
{
  wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
  wp_enqueue_style('mon-style-style', 
  get_template_directory_uri() . '/style.css',
  array(),
  filemtime(get_template_directory() .
    '/style.css'));




  wp_enqueue_script(
    'destination_restapi',
    get_template_directory_uri() . '/js/destination.js',
    array(),
    filemtime(get_template_directory() .
      '/js/destination.js'),
    true
  );
  wp_enqueue_script(
    'carrousel_restapi',
    get_template_directory_uri() . '/js/carrousel.js',
    array(),
    filemtime(get_template_directory() .
      '/js/carrousel.js'),
    true
  );
}

/* 
*/
add_action('wp_enqueue_scripts', 'theme_4w4_enqueue_styles');

/**
 * Modifie la requete principale de WordPress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas ci nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */


function modifie_requete_principal($query)
{
  if ($query->is_home() && $query->is_main_query() && ! is_admin()) {
    $query->set('category_name', 'populaire');
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
}
add_action('pre_get_posts', 'modifie_requete_principal');

function enqueue_destination_script() {
    wp_enqueue_script('destination-js', get_template_directory_uri() . '/js/destination.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_destination_script');

// function categories_liste($parent_slug) {
//     $parent_category = get_category_by_slug($parent_slug);
//     if ($parent_category) {
//         $child_categories = get_categories(array(
//             'parent' => $parent_category->term_id,
//             'hide_empty' => false,
//         ));

//         if (!empty($child_categories)) {
//             echo '<ul class="categories-liste">';
//             foreach ($child_categories as $category) {
//                 echo '<li><a class="categorieDeListe">' . $category->name . '</a></li>';
//             }
//             echo '</ul>';
//         } else {
//             echo '<p>Aucune sous-catégorie trouvée.</p>';
//         }
//     } else {
//         echo '<p>Catégorie parente introuvable.</p>';
//     }
// }
?>