
function OuvrirMenu(menu, bouton) {
    menu.setAttribute("aria-expanded", "true");
    menu.style.display = "flex"
    bouton.setAttribute("aria-label", "Masquer le menu")
};

function FermerMenu(menu, bouton) {
    menu.setAttribute("aria-expanded", "false");
    menu.style.display = "none";
    bouton.setAttribute("aria-label", "Ouvrir le menu");
};

function EstEnMobile() {
    return window.innerWidth <= 768;
}
const ClickButton = (e, bouton, menu) => {
    // Éviter l'action par défaut lorsque l'on clique sur le bouton.
    e.preventDefault();

    if (!EstEnMobile()) return;

    if (menu.getAttribute('aria-expanded') === "false") {
        OuvrirMenu(menu,bouton);
    } else {
        FermerMenu(menu,bouton);
    }
};

const TouchKey = (e, bouton, menu) => {
    if (!EstEnMobile()) return;

    if (e.key === "Enter" || e.key === " ") {  // " " pour espace
        ClickButton(e, bouton, menu);
    }
};

function BurgerMenu(bouton) {
    const menu = document.querySelector('#menu')

    if (EstEnMobile())
    {FermerMenu(menu, bouton);}
    else {
        menu.style.display = "flex";
    }
    bouton.addEventListener('click', (e) => ClickButton(e, bouton, menu));
    bouton.addEventListener('keydown', (e) => TouchKey(e, bouton, menu));
};

window.addEventListener('resize', () => {
    if (EstEnModeMobile()) {
        FermerMenu(menu, bouton);
    } else {
        menu.style.display = "flex";
    }
});

export { BurgerMenu };