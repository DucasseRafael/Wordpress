document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.OdooBridge .liste .cardContent');

    // Ajout d'un effet de survol supplémentaire
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            card.style.transform = 'scale(1.05)';
            card.style.transition = 'transform 0.3s';
        });

        card.addEventListener('mouseleave', function() {
            card.style.transform = 'scale(1)';
        });
    });

    // Supprimer la partie filtre
    // const filterInput = document.createElement('input');
    // filterInput.setAttribute('type', 'text');
    // filterInput.setAttribute('placeholder', 'Filtrer par classe...');
    // filterInput.style.marginBottom = '20px';
    // filterInput.style.padding = '10px';
    // filterInput.style.width = '100%';
    // filterInput.style.borderRadius = '5px';
    // filterInput.style.border = '1px solid #ccc';

    // const liste = document.querySelector('.OdooBridge .liste');
    // liste.before(filterInput);

    // filterInput.addEventListener('input', function() {
    //     const filterValue = filterInput.value.toLowerCase();
    //     cards.forEach(card => {
    //         const modelText = card.querySelector('.nom').textContent.toLowerCase();
    //         if (modelText.includes(filterValue)) {
    //             card.style.display = '';
    //         } else {
    //             card.style.display = 'none';
    //         }
    //     });
    // });
});