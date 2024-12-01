// Confirmation de suppression
function deleteTable() {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette table ?")) {
        alert("Table supprimée");
        // Ajoutez ici la logique pour supprimer la table
    }
}

// Exemple de traitement du formulaire d'ajout de table
document.getElementById("addTableForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const tableName = document.getElementById("tableName").value;
    const tableSeats = document.getElementById("tableSeats").value;
    const tableStatus = document.getElementById("tableStatus").value;

    alert(`Table ajoutée: ${tableName}, ${tableSeats} places, Status: ${tableStatus}`);
    // Ajouter ici la logique pour envoyer les données à un serveur ou à une base de données
});

// Exemple de traitement du formulaire de modification de table
document.getElementById("editTableForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const tableName = document.getElementById("tableName").value;
    const tableSeats = document.getElementById("tableSeats").value;
    const tableStatus = document.getElementById("tableStatus").value;

    alert(`Table modifiée: ${tableName}, ${tableSeats} places, Status: ${tableStatus}`);
    // Ajouter ici la logique pour mettre à jour la table dans la base de données
});
