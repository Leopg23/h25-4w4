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
  const defaultActiveLi = document.querySelector(
    `.categorie__ul__li[data-category_id="${defaultCategoryId}"]`
  );
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

(function () {
  console.log("destination.js");

  const paysListe = [
    "France",
    "États-Unis",
    "Canada",
    "Argentine",
    "Chili",
    "Belgique",
    "Maroc",
    "Mexique",
    "Japon",
    "Italie",
    "Islande",
    "Chine",
    "Grèce",
    "Suisse",
  ];

  const paysParDefaut = "France";
  genererMenuPays(paysListe);
  chargerDestinationsParRecherche(paysParDefaut);
  activerBoutonsPays();

  // 🔄 Génère le menu HTML dynamiquement
  function genererMenuPays(pays) {
    const conteneur = document.querySelector(".section-menu-pays");
    if (!conteneur) return;

    let html = '<ul class="categorie__ul">';
    pays.forEach((p) => {
      html += `<li class="categorie__ul__li" data-pays="${p}">${p}</li>`;
    });
    html += "</ul>";
    conteneur.innerHTML = html;
  }

  // 🧠 Gère les clics sur les boutons de pays
  function activerBoutonsPays() {
    const boutons = document.querySelectorAll(".categorie__ul__li");

    boutons.forEach((bouton) => {
      bouton.addEventListener("mousedown", function () {
        const paysChoisi = bouton.dataset.pays;
        console.log("Pays sélectionné :", paysChoisi);

        // ❌ Enlève la classe active
        boutons.forEach((b) => b.classList.remove("active"));

        // ✅ Ajoute la classe active
        bouton.classList.add("active");

        // 🔄 Charge les destinations correspondantes
        chargerDestinationsParRecherche(paysChoisi);
      });
    });

    // 🔽 Active visuellement le pays par défaut
    const actifDefaut = document.querySelector(
      `.categorie__ul__li[data-pays="${paysParDefaut}"]`
    );
    if (actifDefaut) actifDefaut.classList.add("active");
  }

  // 🔍 Charge les destinations avec la requête REST API `search`
  async function chargerDestinationsParRecherche(pays) {
    const url = `${
      window.location.origin
    }/4w4/wp-json/wp/v2/posts?search=${encodeURIComponent(pays)}`;
    console.log("URL utilisée :", url);

    try {
      const response = await fetch(url);
      const text = await response.text();
      console.log("Réponse brute REST API :", text);
      const data = JSON.parse(text);
      afficherDestinations(data);
    } catch (err) {
      console.error("Erreur de chargement REST API :", err);
    }
  }

  // 🖼️ Affiche les résultats dans la page
  function afficherDestinations(destinations) {
    const conteneur = document.querySelector(".rest-api");
    if (!conteneur) return;

    if (destinations.length === 0) {
      conteneur.innerHTML = "<p>Aucune destination trouvée.</p>";
      return;
    }

    let html = "";
    destinations.forEach((dest) => {
      html += `
        <div class="destination">
          <h3>${dest.title.rendered}</h3>
          <div class="destination-content">${dest.content.rendered}</div>
        </div>
      `;
    });

    conteneur.innerHTML = html;
  }
})();
