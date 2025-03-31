<?php

/**
 * Template pour afficher les pages 404 (Non Trouvé)
 */
// Intégration de l'en-tête
$hero_couleur = get_theme_mod('hero_couleur', '');
$hero_background = get_theme_mod("hero_background_404", '');
?>

<style>
  .hero__couleur {
    color: <?php echo $hero_couleur; ?>;
  }
</style>

<section class="p404" style="background-image: url('<?php echo $hero_background; ?>')">
  <?php get_header(); ?>
  
  <div class="p404__contenu">
    
  <h1 class="p404__titre"> Oops, vous avez échoué sur l'île 404 !</h1>
  <p class="p404__description">
    Pas de panique, cher membre explorateur ! Vous avez dérivé un peu trop loin des destinations de rêve que notre club a soigneusement sélectionnées pour vous. Reprenez votre périple en cliquant sur 'Accueil' pour découvrir à nouveau nos voyages d’exception !
  </p>
  <div class="p404__icones-sociaux">
    <img src="https://s2.svgbox.net/social.svg?ic=facebook&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
    <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
    <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
  </div>

  <div class="p404__bouton">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="p404__bouton__lien">Retour à l'accueil</a>
  </div>
  <nav class="p404__menu">
    <?php // Menu personnalisé pour la page 404 
    wp_nav_menu(array(
        "menu" => "404"
      ));
    ?>
  </nav>
  </div>
  
</section>

<?php
get_footer(); // Intégration du footer
?>
