function toggleDetails(card) {
    const details = card.querySelector('.reservation-details');
    if (details.style.display === 'none' || details.style.display === '') {
        details.style.display = 'block'; // Show details
    } else {
        details.style.display = 'none'; // Hide details
    }
}

function addHoverEffects(card) {
    card.style.transition = 'transform 0.3s, box-shadow 0.3s'; // Smooth transition
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'scale(1.05)'; // Slightly enlarge the card
        card.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.2)'; // Add shadow
    });
    card.addEventListener('mouseleave', () => {
        card.style.transform = 'scale(1)'; // Reset size
        card.style.boxShadow = 'none'; // Remove shadow
    });
}

// Apply hover effects to all cards
document.querySelectorAll('.card').forEach(card => {
    addHoverEffects(card);
});