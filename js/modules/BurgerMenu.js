class BurgerMenu {
    constructor(bouton) {
        this.bouton = bouton;
        this.menu = document.querySelector('#menu');
        this.init();
    }

    init() {
        if (this.estEnMobile()) {
            this.fermerMenu();
        } else {
            this.menu.style.display = "flex";
        }

        this.bouton.addEventListener('click', (e) => this.clickButton(e));
        this.bouton.addEventListener('keydown', (e) => this.touchKey(e));

        window.addEventListener('resize', () => this.handleResize());
    }

    ouvrirMenu() {
        this.menu.setAttribute("aria-expanded", "true");
        this.menu.style.display = "flex";
        this.bouton.setAttribute("aria-label", "Masquer le menu");
    }

    fermerMenu() {
        this.menu.setAttribute("aria-expanded", "false");
        this.menu.style.display = "none";
        this.bouton.setAttribute("aria-label", "Ouvrir le menu");
    }

    estEnMobile() {
        return window.innerWidth <= 768;
    }

    clickButton(e) {
        e.preventDefault();

        if (!this.estEnMobile()) return;

        if (this.menu.getAttribute('aria-expanded') === "false") {
            this.ouvrirMenu();
        } else {
            this.fermerMenu();
        }
    }

    touchKey(e) {
        if (!this.estEnMobile()) return;

        if (e.key === "Enter" || e.key === " ") {
            this.clickButton(e);
        }
    }

    handleResize() {
        if (this.estEnMobile()) {
            this.fermerMenu();
        } else {
            this.menu.style.display = "flex";
        }
    }
}
export default BurgerMenu;
