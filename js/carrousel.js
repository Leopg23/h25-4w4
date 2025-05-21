(function(){
console.log("carrousel.js loaded");
let hero__radio__label = document.querySelectorAll(".hero__radio__label")
let hero__carrousel = document.querySelectorAll(".hero__carrousel")
let hero__animation = document.querySelectorAll(".hero__animation")
let hero__radio__input = document.querySelectorAll(".hero__radio__input")

console.log(hero__carrousel.length)
console.log("hero__radio__label = " , hero__radio__label.length)

let currentIndex = 0;
let intervalId = null;



function showSlide(index) {
    parcourir_carrousel();
    parcourir_animation();
    if (hero__radio__input[index]) hero__radio__input[index].checked = true;
    hero__carrousel[index].classList.add("hero__carrousel--active");
    if (hero__animation[index]) {
        hero__animation[index].classList.add("hero__animation--active");
    }
    // Met à jour le texte
    const description = document.querySelector('.hero__description');
    if (description && heroTexts[index]) {
        description.textContent = heroTexts[index];
        description.classList.remove('hero__description--animate');
        void description.offsetWidth;
        description.classList.add('hero__description--animate');
    }
    currentIndex = index;
}

function nextSlide() {
    let nextIndex = (currentIndex + 1) % hero__carrousel.length;
    showSlide(nextIndex);
}

intervalId = setInterval(nextSlide, 10000);

hero__radio__label.forEach((label, idx) => {
    label.addEventListener('mousedown', function() {
        clearInterval(intervalId); // Stop auto-advance on manual interaction
        // Get the input associated with this label
        const inputId = label.getAttribute('for');
        const input = document.getElementById(inputId);
        const id_radio = input ? input.dataset.id_radio : undefined;
        console.log(id_radio);
        if (id_radio !== undefined) {
            showSlide(Number(id_radio));
            // Restart auto-advance after manual interaction
            intervalId = setInterval(nextSlide, 10000);
        }
    });
});

function parcourir_carrousel(){
    hero__carrousel.forEach(element => {
        element.classList.remove("hero__carrousel--active")
    });
}

function parcourir_animation(){
    hero__animation.forEach(element => {
        element.classList.remove("hero__animation--active")
    });
}

// Initialize first slide
showSlide(0);
})()