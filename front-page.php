    <?php get_header(); ?>
    <?php 
        $hero_auteur = get_theme_mod('hero_auteur', 'Default Title');
        $hero_background = get_theme_mod('hero_background', '');
        $hero_couleur = get_theme_mod('hero_couleur', '');
    ?>
    <style>
        .hero__couleur {
            color: <?php echo $hero_couleur; ?>;
        }
    </style>
    <section class="hero" style="background-image: url('<?php echo $hero_background; ?>')">
        <div class="hero__contenu global">
            <h1 class="hero__titre hero__couleur"><?php bloginfo('name'); ?></h1>
            <p class="hero__description hero__couleur">
            <?php bloginfo('description'); ?>
            </p>
            <p class="hero__courriel hero__couleur">
            <?php bloginfo('admin_email'); ?>
            </p>
            <p class="hero__adresse hero__couleur">
                5800 Sherbrooke-est - Montréal (Québec) H1X 2A2
            </p>
            <p class="hero__auteur hero__couleur">
                <?php echo $hero_auteur; ?>
            </p>
            <div class="hero__icone">
                
                <img src="https://s2.svgbox.net/social.svg?ic=facebook&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=snapchat&color= <?php echo substr($hero_couleur, 1); ?>" width="20" height="20">
            </div>
        </div>
    </section>

    <section class="populaire">
        <div class="global">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
            if (in_category("galerie"))  {
                the_content() ;
            } else {    ?>
                <?php get_template_part( 'gabarits/carte' ); ?>
            <?php } ?>
            <?php endwhile; endif; ?>
        </div>
    </section>
    <footer></footer>
    <?php get_footer(); ?>
</body>
</html>