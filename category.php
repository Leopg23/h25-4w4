<?php
$hero_categorie = single_cat_title('', false);
$hero_background = get_theme_mod("hero_background_" . $hero_categorie, '');
$hero_couleur = get_theme_mod('hero_couleur', '');
$cat_courante = single_cat_title('', false);

$cat_obj = get_queried_object();
$cat_slug = $cat_obj->slug;
?>
<style>
  .hero__couleur {
    color: <?php echo $hero_couleur; ?>;
  }

  /* ca marche quand meme malgre que c'est souligne en rouge */
  .<?php echo esc_attr($cat_slug); ?> {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    translate: 0 -1rem;

    .global {
      article {
        translate: 0 0;
      }
    }

    &__categories {
      margin-bottom: 1rem;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    &__categorie-btn {
      background: #494949;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.2s;

      &:hover {
        background: #ccc;
      }
    }
  }
</style>

<section class="hero" style="background-image: url('<?php echo $hero_background; ?>')">
  <?php get_header(); ?>
  <div class="hero__contenu global">
    <h1 class="h1"><?php echo single_cat_title('', false); ?></h1>
    <div>
      <p class="hero__description"><?php echo category_description(); ?></p>
    </div>

  </div>
</section>
<section class="<?php echo esc_attr($cat_slug); ?>">
  <?php categorie_par_destination($cat_courante); ?>
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