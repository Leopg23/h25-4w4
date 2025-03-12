<?php
/**
 * Template-part carte
 */
?>
<article class="carte carte--grande">
  <figure class="carte__image">
    <!-- <img src="voyage.jpg" alt="Image de voyage"> -->
     <!-- <?php
        if (has_post_thumbnail()) {
        the_post_thumbnail('thumbnail'); }
      ?>     -->
    </figure>
  <div class="carte__contenu">
    
    <h4 class="carte__titre"><?php the_title(); ?></h4>
    <p class="carte__description"><?php echo wp_trim_words(get_the_content(),10, " ... " ); ?></p>
    <div class="carte__infos">
      
    <p>Température maximum : <?php the_field('temperature_maximum'); ?> &#8451;</p>
    <?php  the_category();  ?>
    </div>
    <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink() ?>">suite ...</a>
  </div>
</article>

<?php
/**
 * Template-part carte
 */
?>

