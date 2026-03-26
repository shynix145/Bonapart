/* LE BON APPART — Scripts */

document.addEventListener('DOMContentLoaded', () => {

  /* ---- Menu mobile ---- */
  const toggle = document.getElementById('nav-toggle');
  const links  = document.getElementById('nav-links');
  if (toggle && links) {
    toggle.addEventListener('click', () => {
      links.classList.toggle('is-open');
      const open = links.classList.contains('is-open');
      toggle.setAttribute('aria-expanded', open);
      toggle.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
    });
    /* Fermer en cliquant en dehors */
    document.addEventListener('click', (e) => {
      if (!toggle.contains(e.target) && !links.contains(e.target)) {
        links.classList.remove('is-open');
      }
    });
  }

  /* ---- Disparition automatique des alertes flash ---- */
  document.querySelectorAll('.alert').forEach(alert => {
    setTimeout(() => {
      alert.style.transition = 'opacity 400ms ease';
      alert.style.opacity = '0';
      setTimeout(() => alert.remove(), 420);
    }, 4000);
  });

});
