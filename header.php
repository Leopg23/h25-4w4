<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club de voyage</title>
    <!-- link rel="stylesheet" href="normalize.css" -->
    <!-- link rel="stylesheet" href="style.css" -->
    <?php wp_head() ?>
</head>
<body>
    <header>
        <div class="entete">
            <figure class="entete__logo">
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            }
            ?>
            </figure>
            <div class="entete__navigation">
                <?php wp_nav_menu(array(
                    'menu' => 'principal',
                    'container' => 'nav',
                    'container_class' => 'entete__menu'
                )); ?>

                <input type="checkbox" class="entete__ouvrir_categories" id="ouvrir_categories">
                <label for="ouvrir_categories" class="bouton_ouvrir">&#9205;</label>

                <input type="checkbox" class="entete__fermer_categories" id="fermer_categories">
                <label for="ouvrir_categories" class="bouton_fermer">&#9204;</label>

                
                <?php get_search_form() ?>
                
            </div> <!-- fin entete__navigation  -->
        </div>
    </header>