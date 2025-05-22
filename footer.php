<?php
$piedpage_auteur = get_theme_mod('piedpage_auteur', 'Default Title');

?>

<footer>
  <div class="piedpage global">
    <section class="piedpage__s1">
      <h5 class="piedpage__s1__titre p2p_titre">
        Description
      </h5>
      <p class="piedpage__s1__description">
        Découvrez le monde avec nous ! Suivez nos aventures, conseils et inspirations pour vos prochains voyages. © [Travel Inc] - Tous droits réservés.
      </p>

    </section>

    <section class="piedpage__s2">
      <h5 class="piedpage__s2__titre p2p_titre">
        Liens utiles
      </h5>
      <div class="piedpage__s2__externe">
        <?php wp_nav_menu(array(
          "menu" => "externe",
          "container" => "nav",
        )); ?>
      </div>

    </section>

    <section class="piedpage__s3">
      <h5 class="piedpage__s3__titre p2p_titre">
        Contact
      </h5>
      <div class="piedpage__s3__auteur">
        <p class="piedpage__s3__courriel">
          <?php bloginfo('admin_email'); ?>
        </p>
        <p class="piedpage__s3__adresse">
          5800 Sherbrooke-est - Montréal (Québec) H1X 2A2
        </p>
        <p class="piedpage__s3__auteur">
          <?php echo $piedpage_auteur; ?>
        </p>
      </div>

    </section>

    <section class="piedpage__s4">
      <h5 class="piedpage__s4__titre p2p_titre">
        Recherche
      </h5>
      <div class="piedpage__s4__recherche">
        <div class="piedpage__s4__recherche__coord">
            Entrez des mots-clés pour votre recherche
        </div>
        <div class="piedpage__s4__recherche__form">
          <?php get_search_form();   ?>
        </div>
      </div>
    </section>


  </div>
  
</footer>
<?php wp_footer() ?>