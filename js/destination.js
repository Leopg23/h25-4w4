/**
 *  Script js permettant d'extraire des destinations de voyage
 */

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
  const domaine = window.location.href;
  const defaultCategoryId = 3; // 👈 ID de la catégorie à afficher au départ

  genererMenuPays(paysListe);
  ajusterSeparateurs();
  window.addEventListener("resize", ajusterSeparateurs);
  chargerDestinationsParRecherche(paysParDefaut);

  charger_articles_par_categorie(defaultCategoryId);
  parcourir_bouton();

  // 🔽 Appliquer la classe active à la catégorie par défaut
  const defaultActiveLi = document.querySelector(
    `.categorie__ul__li[data-category_id="${defaultCategoryId}"]`
  );
  if (defaultActiveLi) {
    defaultActiveLi.classList.add("active");
  }

  function genererMenuPays(pays) {
    const conteneur = document.querySelector(".section-menu-pays");
    if (!conteneur) return;

    let html = '<ul class="categorie__ul">';
    pays.forEach((p, i) => {
      // Utilise l'index comme ID fictif ou adapte selon ta logique
      html += `<li data-category_id="${
        i + 1000
      }" data-pays="${p}" class="categorie__ul__li">${p}</li>`;
      html += '<div class="categorie__ul__separateur"></div>';
    });
    html += "</ul>";
    conteneur.innerHTML = html;
  }

  function ajusterSeparateurs() {
    const items = Array.from(document.querySelectorAll(".categorie__ul__li"));
    const separateurs = Array.from(
      document.querySelectorAll(".categorie__ul__separateur")
    );
    if (items.length === 0) return;

    // Réinitialise tous les séparateurs
    separateurs.forEach((sep) => (sep.style.display = ""));

    // Pour chaque item, si le suivant est sur une nouvelle ligne, cache le séparateur après cet item
    for (let i = 0; i < items.length - 1; i++) {
      const current = items[i];
      const next = items[i + 1];
      const sep = separateurs[i];
      if (current.offsetTop !== next.offsetTop && sep) {
        sep.style.display = "none";
      }
    }
  }

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

  function afficherDestinations(destinations) {
    const destinationList = document.querySelector(".destination__liste");
    if (!destinationList) return;

    destinationList.innerHTML = ""; // Vider la liste actuelle

    destinations.forEach((article) => {
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
  }

  function parcourir_bouton() {
    const categorie__ul__li = document.querySelectorAll(".categorie__ul__li");
    if (categorie__ul__li.length === 0) return;

    // On prend le parent UL puis son parent (le conteneur menu)
    const conteneurMenu = categorie__ul__li[0].closest(
      ".section-menu-pays, .destination"
    );
    // On déduit le mode selon la classe du parent
    let mode = "recherche";
    if (conteneurMenu && conteneurMenu.classList.contains("destination")) {
      mode = "categorie";
    }

    categorie__ul__li.forEach((elm) => {
      elm.addEventListener("mousedown", function () {
        // Retirer la classe 'active' de toutes les catégories
        categorie__ul__li.forEach((li) => li.classList.remove("active"));
        // Ajouter 'active' à la catégorie cliquée
        elm.classList.add("active");

        if (mode === "categorie") {
          const categoryId = elm.dataset.category_id;
          charger_articles_par_categorie(categoryId);
        } else {
          const pays = elm.dataset.pays;
          chargerDestinationsParRecherche(pays);
        }
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
