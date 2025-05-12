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
  
  for ($k = 0; $k < 3; $k++) {
    $key = 'hero_background_' . $k;
  
    // Add setting
    $wp_customize->add_setting($key, array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
  
    // Add control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $key, array(
      'label' => __('Hero Background Image ' . ($k + 1), 'theme_tp'),
      'section' => 'hero_section',
    )));
  }
  
  ////////////////////////////////////////////// ajout du controle de la donnée
  
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


?>