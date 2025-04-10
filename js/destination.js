/**
 *  Script js permettant d'extraire des destinations de voyage
 */
(function () {
  console.log("destination.js");

  const domaine = window.location.href;
  const defaultCategoryId = 3; // 👈 ID de la catégorie à afficher au départ
  charger_articles_par_categorie(defaultCategoryId);
  parcourir_bouton();

  // 🔽 Appliquer la classe active à la catégorie par défaut
  const defaultActiveLi = document.querySelector(`.categorie__ul__li[data-category_id="${defaultCategoryId}"]`);
  if (defaultActiveLi) {
    defaultActiveLi.classList.add("active");
  }

  function parcourir_bouton() {
    const categorie__ul__li = document.querySelectorAll(".categorie__ul__li");
    console.log("categorie__ul__li.length = ", categorie__ul__li.length);

    categorie__ul__li.forEach((elm) => {
      elm.addEventListener("mousedown", function () {
        const categoryId = elm.dataset.category_id;
        console.log("Nouvel ID de catégorie : ", categoryId);

        // 🔁 Retirer la classe 'active' de toutes les catégories
        categorie__ul__li.forEach((li) => li.classList.remove("active"));

        // ✅ Ajouter 'active' à la catégorie cliquée
        elm.classList.add("active");

        charger_articles_par_categorie(categoryId);
      });
    });
  }

  function charger_articles_par_categorie(categoryId) {
    const apiUrl = `${domaine}wp-json/wp/v2/posts?categories=${categoryId}`;
    console.log("API URL :", apiUrl);

    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        const destinationList = document.querySelector(".destination__liste");
        destinationList.innerHTML = ""; // Vider la liste actuelle

        data.forEach((article) => {
          const articleElement = document.createElement("div");
          articleElement.innerHTML = `
            <input type="checkbox" id="checkbox-${article.id}" class="destination__liste__checkbox" data-id="${article.id}">
            <label for="checkbox-${article.id}" class="destination__liste__label">
              <h3>${article.title.rendered}</h3>
              <span class="destination__liste__label__fleche destination__liste__label__droite">&#9205;</span>
              <span class="destination__liste__label__fleche destination__liste__label__bas">&#9207;</span>
            </label>
            <div class="destination__liste__texte">
              <p>${article.excerpt.rendered}</p>
              <a href="${article.link}">Plus &#9205;</a>
            </div>
          `;
          destinationList.appendChild(articleElement);
        });
      })
      .catch((error) =>
        console.error("Erreur lors de la récupération des articles:", error)
      );
  }
})();
