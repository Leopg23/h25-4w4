<?php
$hero_background = [];
$hero_background_count = get_theme_mod('hero_background_count', 3); // Get the dynamic count

for ($k = 0; $k < $hero_background_count; $k++) {
  $hero_background[$k] = get_theme_mod('hero_background_' . $k, '');
}

$hero_texts = [];
for ($k = 0; $k < $hero_background_count; $k++) {
    $hero_texts[$k] = get_theme_mod('hero_text_' . $k, '');
}

$hero_couleur = get_theme_mod('hero_couleur', '');
?>
<style>
  .hero__couleur {
    color: <?php echo $hero_couleur; ?>;
  }
</style>
<section class="hero">
  <?php get_header(); ?>
  <?php get_template_part("gabarits/herot"); ?>
  <div class="hero__contenu global">

    <h1 class="hero__titre hero__couleur"><?php bloginfo('name'); ?></h1>
    <p class="hero__description hero__couleur">
      <?php bloginfo('description'); ?>
    </p>

    <?php afficher_icones_sociaux(); ?>
  </div>

  <?php for ($k = 0; $k < $hero_background_count; $k++): ?>
    <div class="hero__carrousel<?php echo $k === 0 ? ' hero__carrousel--active' : ''; ?>" style="background-image: url(<?php echo esc_url($hero_background[$k]); ?>)"></div>
  <?php endfor; ?>

  <div class="hero__radio">
    <?php for ($k = 0; $k < $hero_background_count; $k++): ?>
      <input id="rad_<?php echo $k + 1; ?>" class="hero__radio__input" data-id_radio="<?php echo $k; ?>" type="radio" name="carroussel" <?php echo $k === 0 ? 'checked="checked"' : ''; ?>>
      <label for="rad_<?php echo $k + 1; ?>" class="hero__radio__label"></label>
    <?php endfor; ?>
  </div>
</section>
<section class="populaire">
  <?php categorie_par_destination('Populaire'); ?>
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

<script>
  const heroTexts = <?php echo json_encode($hero_texts); ?>;
</script>
</body>

</html>