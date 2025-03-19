<?php
$hero_background = get_theme_mod('hero_background', '');
$hero_couleur = get_theme_mod('hero_couleur', '');
?>
<style>
  .hero__couleur {
    color: <?php echo $hero_couleur; ?>;
  }
</style>

<section class="hero" style="background-image: url('<?php echo $hero_background; ?>')">
  <?php get_header(); ?>
  <div class="hero__contenu global">
    <h1 class="h1"><?php single_cat_title(); ?></h1>
    <div><p class="hero__description"><?php echo category_description(); ?></p></div>
    
  </div>
</section>
<section class="<?php single_cat_title(); ?>">
  <div class="categorie global ">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('gabarits/carte'); ?>
    <?php endwhile;
    endif; ?>
  </div>
</section>
<?php get_footer(); ?>

</body>

</html>