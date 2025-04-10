<?php
// for ($k; $k < 3; $k++) {
//   $hero_background[$k] = get_theme_mod('hero_background' . $k, '');
// }
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
  <?php get_template_part("gabarits/herot"); ?>
  <div class="hero__contenu global">
    <h1 class="hero__titre hero__couleur"><?php bloginfo('name'); ?></h1>
    <p class="hero__description hero__couleur">
      <?php bloginfo('description'); ?>
    </p>

    <div class="hero__icone">

      <img src="https://s2.svgbox.net/social.svg?ic=facebook&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
      <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
      <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
    </div>
  </div>
</section>
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

<section class="destination">
  <?php
  if (function_exists('categories_liste')) {
    categories_liste("destination");
  } else {
    echo '<p>Function categories_liste() is not defined. Please ensure it is implemented.</p>';
  }
  ?>
  <h2 class="destination__titre">Articles de la catégorie</h2>
  <div class="destination__liste">

  </div>
</section>

<?php get_footer(); ?>
</body>

</html>