import 'bulma/css/bulma.css';
import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';
import '../sass/app.sass';

document.addEventListener('DOMContentLoaded', () => {
    const navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    if (navbarBurgers.lenght > 0) {
        navbarBurgers.foreach((navbarBurger: HTMLElement) => {
            navbarBurger.addEventListener('click', () => {
                const target = document.getElementById(navbarBurger.dataset.target);
                navbarBurger.classList.toggle('is-active');
                target.classList.toggle('is-active');
            });
        });
    }
});
