<?php

/**
 * Template pour afficher les pages 404 (Non Trouvé)
 */
// Intégration de l'en-tête
$p404_couleur = get_theme_mod('404_couleur', '');
$p404_background = get_theme_mod("404_background", '');
$p404_titre = get_theme_mod("404_titre", 'Oops, vous avez échoué sur l\'île 404 !');
$p404_description = get_theme_mod("404_description", 'Pas de panique, cher membre explorateur ! Vous avez dérivé un peu trop loin des destinations de rêve que notre club a soigneusement sélectionnées pour vous. Reprenez votre périple en cliquant sur \'Accueil\' pour découvrir à nouveau nos voyages d’exception !');
?>

<style>
  .p404__couleur {
    color: <?php echo $p404_couleur; ?> !important;
  }
</style>

<section class="p404" style="background-image: url('<?php echo $p404_background; ?>')">
  <?php get_header(); ?>

  <div class="p404__contenu">

    <h1 class="p404__titre .404__couleur"> <?php echo $p404_titre; ?></h1>
    <p class="p404__description .404__couleur">
      <?php echo $p404_description; ?>
    </p>
    <div class="p404__icones-sociaux">
      <img src="https://s2.svgbox.net/social.svg?ic=facebook&color= <?php echo substr($p404_couleur, 1); ?>" width="20" height="20">
      <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color= <?php echo substr($p404_couleur, 1); ?>" width="20" height="20">
      <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color= <?php echo substr($p404_couleur, 1); ?>" width="20" height="20">
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