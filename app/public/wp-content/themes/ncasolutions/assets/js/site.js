(() => {
    const toggle = document.querySelector('.site-nav-toggle');
    const nav = document.querySelector('.site-navigation');

    if (!toggle || !nav) {
        return;
    }

    toggle.addEventListener('click', () => {
        const expanded = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!expanded));
        nav.classList.toggle('is-open', !expanded);
    });
})();
