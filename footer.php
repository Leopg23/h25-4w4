<?php   
    $piedpage_auteur = get_theme_mod('piedpage_auteur', 'Default Title'); 

?>

<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">
            <div class="piedpage__s1__externe">
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav",
                )); ?>
            </div>
            <div class="piedpage__s1__adresse">
                <div class="piedpage__s1__adresse__coord">
                    Recherchez des mots clés
                </div>
                <div class="piedpage__s1__adresse__recherche">
                    <?php get_search_form();   ?>
                </div>
            </div>
            <div class="piedpage__s1__description">
                Découvrez le monde avec nous ! 🌍 Suivez nos aventures, conseils et inspirations pour vos prochains voyages. © [Club de voyage] - Tous droits réservés.
            </div>

            <div class="piedpage__auteur">
            <p class="piedpage__courriel">
            <?php bloginfo('admin_email'); ?>
            </p>
            <p class="piedpage__adresse">
                5800 Sherbrooke-est - Montréal (Québec) H1X 2A2
            </p>
            <p class="piedpage__auteur">
                <?php echo $piedpage_auteur; ?>
            </p>    
            </div>
        </section>
        <section class="piedpage__s2"></section>
        <section class="piedpage__s3"></section>


    </div>
</footer>
<?php wp_footer() ?>