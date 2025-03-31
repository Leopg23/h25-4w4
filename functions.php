<?php

//----------------------------------------------------------------------------------P1_CUSTOMIZER
// CETTE PARTIE SERT A INSERER DES VARIABLE A UTILISER A TRAVERS LE SITE QUI POURONT ETRE CHANGEES DANS 
// L'APPLI WORDPRESS
// 
// TEMPLATE POUR UNE VARIABLE
//  ////////////////////////////////////////////// EXPLICATION DE LA VARIABLE
//  $wp_customize->add_setting('NOM DE LA VARIABLE', '');', array(
//   'default' => '',
//   'sanitize_callback' => 'esc_url_raw',
// ));
// TEMPLATE POUR UN CONTROLLER DE DONNES
// ////////////////////////////////////////////// EXPICATION DU CONTROLE
// $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'NOM DE LA VARIABLE A CONTROLLER', array(
//   'label' => __('NOM QUI SERA AFFICHE DANS WP', 'theme_tp(LE NOM DU THEME DOIT ETRE PAREIL PARTOUT)'),
//   'section' => 'SA SECTION AUQUEL LE CONTROL SERA ATTACHE DANS WP',
// )));

function theme_tp_customize_register($wp_customize)
{
  // Le code pour ajouter des sections, des réglages et des contrôles ira ici.
  // Création d'une nouvelle section dans le customizer
  $wp_customize->add_section('hero_section', array(
    'title' => __('Section Hero', 'theme_tp'),
    'priority' => 30,
  ));

  ////////////////////////////////////////////// ajout de la donnée
  $wp_customize->add_setting('hero_auteur', array(
    'default' => __('Léo Paquet-Gauthier', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée
  $wp_customize->add_control('hero_auteur', array(
    'label' => __('Hero Title', 'theme_tp'),
    'section' => 'hero_section',
    'type' => 'text',
  ));
  ////////////////////////////////////////////// image en arrière plan
  $wp_customize->add_setting('hero_background', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
    'label' => __('Hero Background Image', 'theme_tp'),
    'section' => 'hero_section',
  )));
  ////////////////////////////////////////////// image en arrière plan _zen
  $wp_customize->add_setting('hero_background_Zen', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée zen
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_Zen', array(
    'label' => __('Hero Background Image Zen', 'theme_tp'),
    'section' => 'hero_section',
  )));
  ////////////////////////////////////////////// image en arrière plan_croisiere
  $wp_customize->add_setting('hero_background_Croisière', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée croisiere
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_Croisière', array(
    'label' => __('Hero Background Image Croisiere', 'theme_tp'),
    'section' => 'hero_section',
  )));
  ////////////////////////////////////////////// image en arrière plan_economique
  $wp_customize->add_setting('hero_background_Économique', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée economique
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_Économique', array(
    'label' => __('Hero Background Image Economique', 'theme_tp'),
    'section' => 'hero_section',
  )));
  ////////////////////////////////////////////// image en arrière plan_aventure
  $wp_customize->add_setting('hero_background_Aventure', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée aventure
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_Aventure', array(
    'label' => __('Hero Background Image Aventure', 'theme_tp'),
    'section' => 'hero_section',
  )));
  ////////////////////////////////////////////// image en arrière plan_culturel
  $wp_customize->add_setting('hero_background_Culturel', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée culturel
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_Culturel', array(
    'label' => __('Hero Background Image Culturel', 'theme_tp'),
    'section' => 'hero_section',
  )));
  ////////////////////////////////////////////// image en arrière plan_repos
  $wp_customize->add_setting('hero_background_Repos', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée repos
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_Repos', array(
    'label' => __('Hero Background Image Repos', 'theme_tp'),
    'section' => 'hero_section',
  )));
  ////////////////////////////////////////////// couleure des caractères de la zone hero
  $wp_customize->add_setting('hero_couleur', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_couleur', array(
    'label' => __('Hero Couleur', 'theme_tp'),
    'section' => 'hero_section',
  )));



  ///////////////////////////////////////////// section 404 ////////////////////////////
  $wp_customize->add_section('404_section', array(
    'title' => __('Section 404', 'theme_tp'),
    'priority' => 30,
  ));

  ////////////////////////////////////////////// ajout de la donnée
  $wp_customize->add_setting('404_titre', array(
    'default' => __('Léo Paquet-Gauthier', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée
  $wp_customize->add_control('404_titre', array(
    'label' => __('404 Title', 'theme_tp'),
    'section' => '404_section',
    'type' => 'text',
  ));

  ////////////////////////////////////////////// ajout de la donnée
  $wp_customize->add_setting('404_description', array(
    'default' => __('Léo Paquet-Gauthier', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée
  $wp_customize->add_control('404_description', array(
    'label' => __('404 Title', 'theme_tp'),
    'section' => '404_section',
    'type' => 'text',
  ));

  $wp_customize->add_setting('404_background', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  ////////////////////////////////////////////// ajout du controle de la donnée
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, '404_background', array(
    'label' => __('404 Background Image', 'theme_tp'),
    'section' => '404_section',
  )));

  $wp_customize->add_setting('404_couleur', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, '404_couleur', array(
    'label' => __('404 Couleur', 'theme_tp'),
    'section' => '404_section',
  )));
}


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
  wp_enqueue_style('mon-style-style', get_stylesheet_uri());
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
