
function OuvrirMenu(bouton) {
    bouton.setAttribute("aria-expanded", "true");
    bouton.setAttribute("aria-label", "Masquer le menu");
};

function FermerMenu(bouton) {
    bouton.setAttribute("aria-expanded", "false");
    bouton.setAttribute("aria-label", "Ouvrir le menu");
};

const ClickButton = (e, bouton) => {
    // Éviter l'action par défaut lorsque l'on clique sur le bouton.
    e.preventDefault();

    // Vérifier l'état du bouton à l'aide de son attribut d'accessibilité "aria-expanded" :
    const menu = document.querySelector('#menu'); // Récupérer le menu

    if (menu.getAttribute('aria-expanded') === "false") {
        OuvrirMenu(menu);
    } else {
        FermerMenu(menu);
    }
};

const TouchKey = (e, bouton) => {
    if (e.key === "Enter" || e.key === " ") {  // " " pour espace
        ClickButton(e, bouton);
    }
};

function BurgerMenu(bouton) {
    FermerMenu(bouton);

    // Initialiser l'évènement déclenché par le clic sur le bouton du menu.
    bouton.addEventListener('click', (e) => ClickButton(e, bouton));
    bouton.addEventListener('keydown', (e) => TouchKey(e, bouton));
};

export { BurgerMenu };