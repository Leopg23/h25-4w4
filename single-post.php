    
    <section class="single_post" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>')">
      <?php get_header(); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="single_post__article" >
              
              <h2><?php the_title(); ?></h2>
              <div><?php the_content() ?>

            <?php endwhile;
        endif; ?>
             
    </section>
    <?php get_footer(); ?>

    </body>

    </html>