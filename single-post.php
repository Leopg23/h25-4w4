<?php if (have_posts()) : while (have_posts()) : the_post();
    // Image mise en avant ou image par défaut
    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if (!$image_url) {
      $image_url = get_theme_mod('default_destination_image', get_template_directory_uri() . '/images/default-destination.jpg');
    }
    // Catégories
    $categories = get_the_category();
    // Températures (en supposant que tu utilises des champs personnalisés)
    $temp_min = get_post_meta(get_the_ID(), 'temperature_min', true);
    $temp_max = get_post_meta(get_the_ID(), 'temperature_max', true);
    $temp_moy = get_post_meta(get_the_ID(), 'temperature_moy', true);

    // Valeurs par défaut si vide
    if ($temp_min === '') $temp_min = rand(5, 18);
    if ($temp_max === '') $temp_max = rand(22, 38);
    if ($temp_moy === '') $temp_moy = ($temp_min + $temp_max) / 2;
?>
    <section class="single_post" style="background-image: url('<?php echo esc_url($image_url); ?>')">
      <?php get_header(); ?>
      <article class="single_post__article">
        <h2><?php the_title(); ?></h2>
        <p><strong>Auteur :</strong> <?php the_author(); ?></p>
        <p><strong>Date de publication :</strong> <?php echo get_the_date(); ?></p>
        <p><strong>Catégories :</strong>
          <?php
          $cats = [];
          foreach ($categories as $cat) {
            $cats[] = esc_html($cat->name);
          }
          echo implode(', ', $cats);
          ?>
        </p>
        <p><strong>Destination :</strong> <?php the_title(); ?></p>
        <div><strong>Description :</strong> <?php the_content(); ?></div>
        <div class="single_post__temperatures">
          <strong>Températures :</strong>
          <ul>
            <li>Min : <?php echo esc_html($temp_min); ?>°C</li>
            <li>Max : <?php echo esc_html($temp_max); ?>°C</li>
            <li>Moyenne : <?php echo esc_html($temp_moy); ?>°C</li>
          </ul>
        </div>
      </article>
    </section>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>