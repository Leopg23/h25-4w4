<?php

/**
 * Template-part carte
 */

?>
<article class="carte carte--grande" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>')">
  <!-- <figure class="carte__image">
     <?php

      ?>     
    </figure> -->
  <div class="carte__contenu">

    <h4 class="carte__titre"><?php the_title(); ?></h4>
    <p class="carte__description"><?php echo wp_trim_words(get_the_content(), 15, " ... "); ?></p>


    <!-- <p>Température maximum : <?php the_field('temperature_maximum'); ?> &#8451;</p> -->
    <div class="carte__footer">
      <?php the_category();?>
      <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink() ?>">Plus &#9205;</a>
    </div>

  </div>
</article>

<?php
/**
 * Template-part carte
 */
?>