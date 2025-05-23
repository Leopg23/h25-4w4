<?php

/**
 * Template Name: Pays
 */

get_header();
?>

<section class="intro">
  <h1><?php the_title(); ?></h1>
  <p>
    Plongez au cœur de l’aventure et laissez-vous emporter par l’appel du large ! Notre planète regorge de destinations incroyables, chacune promettant une expérience unique et mémorable. Que vous rêviez de plages idylliques baignées de soleil, de sommets majestueux invitant à la randonnée, de villes vibrantes d’histoire et de modernité, ou de rencontres culturelles authentiques, il y a un pays fait pour vous.
  </p>
</section>

<?php echo genere_vague('#ffffff', '#f0f0f0'); ?>
<?php
// Affiche la galerie WordPress si elle existe dans le contenu de la page
if (have_posts()) : while (have_posts()) : the_post();
    the_content();
  endwhile;
endif;
?>
<!-- Contenu REST API dynamique -->
<section class="destination">
  <section class="section-menu-pays "></section>
  <div class="destination__liste"></div>
</section>



<?php echo genere_vague('#f0f0f0', '#ffffff'); ?>

<?php get_footer(); ?>