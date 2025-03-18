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
        <input type="checkbox" class="entete__toggle_categories" id="toggle_categories">
        <label for="toggle_categories" class="bouton_toggle">
          <span class="fleche droite">&#9205;</span>
          <span class="fleche gauche">&#9204;</span>
        </label>
        <?php wp_nav_menu(array(
          'menu' => 'principal',
          'container' => 'nav',
          'container_class' => 'entete__menu'
        )); ?>

        


        <?php get_search_form() ?>

      </div> <!-- fin entete__navigation  -->
    </div>
  </header>