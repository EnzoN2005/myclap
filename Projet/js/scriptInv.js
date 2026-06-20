$('#searchToggle').click(function(e) {

  //comme en css un mobile est caractérisé par width <768px

  if ($(window).width() < 768) {
    e.stopPropagation(); // Pour empêcher le clic de se propager au document
    $('#searchContainer').toggleClass('active');
    // Si le conteneur est actif, on met le focus sur l'input
    if ($('#searchContainer').hasClass('active')) $('.search-input').focus();
  }

});

// On referme la recherche si on clique n'importe où ailleurs sur l'écran
$(document).click(function(e) {
  if ($(window).width() < 768 && !$('#searchContainer').has(e.target).length 
      && !$('#searchContainer').is(e.target)){
    $('#searchContainer').removeClass('active');
  }  
});

const searchBar = document.getElementById('searchToggle'); // Ou ton input .searchInput
const inventoryContainer = document.getElementById('inventoryContainer');

// On écoute l'événement 'input' (plus moderne et fluide que keyup)
document.querySelector('.searchInput').addEventListener('input', (e) => {
    const searchString = e.target.value.trim();

    // On utilise la fonction AJAX de jQuery pour parler au contrôleur PHP
    $.ajax({
        url: 'index.php?action=search', // Cible ton contrôleur principal MVC
        type: 'POST',
        data: { search: searchString }, // La donnée envoyée au PHP
        dataType: 'json', // On attend du JSON en retour
        success: function(products) {
            // Étape de la VUE : On vide l'inventaire actuel et on reconstruit
            displayCharacters(products); 
        },
        error: function(xhr, status, error) {
            console.error("Erreur lors de la recherche AJAX: ", error);
        }
    });
});

// Fonction qui prend les données (VUE) et génère le HTML
function displayCharacters(products) {
    inventoryContainer.innerHTML = ''; // On vide l'écran
    
    if (products.length === 0) {
        inventoryContainer.innerHTML = '<p class="no-result">Aucun matériel trouvé.</p>';
        return;
    }

    products.forEach(product => {
        // On crée la structure de carte ou de ligne responsive
        const productCard = `
            <div class="produit-card">
                <img src="${product.photo_url}" alt="${product.nom}">
                <div class="produit-info">
                    <h3>${product.nom}</h3>
                    <p class="description">${product.description}</p>
                    <span class="caution">Caution : ${product.caution}€</span>
                </div>
            </div>
        `;
        inventoryContainer.innerHTML += productCard;
    });
}
