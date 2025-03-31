<?php

/**
 * Modèle pour les résultats de recherche
 */
get_header();
?>
<main class="site__main">

  <div class="search">
    <section class="populaire">
      <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post();
            if (in_category("galerie")) {
              the_content();
            } else {    ?>
              <?php get_template_part('gabarits/carte'); ?>
            <?php } ?>
        <?php endwhile;
        endif; ?>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>