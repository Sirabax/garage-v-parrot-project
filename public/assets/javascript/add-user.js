document.getElementById('addUserForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche la soumission par défaut du formulaire

    // Récupérer les données du formulaire
    var formData = new FormData(this);

    // Valider les mots de passe
    var password = document.getElementById('mot_de_passe').value;
    var confirmPassword = document.getElementById('confirm_passe').value;

    if (password !== confirmPassword) {
    alert('Les mots de passe ne correspondent pas!');
    event.preventDefault(); // Empêcher la soumission du formulaire
    return; // Arrêter l'exécution du script
}

    // Envoyer la requête AJAX vers le contrôleur Symfony
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ path('add_users') }}', true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Si la requête a réussi, gérer la réponse
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert('Utilisateur ajouté avec succès!');
            } else {
                alert('Une erreur est survenue lors de l\'ajout de l\'utilisateur.');
            }
        }
        else {
            // Si la requête a échoué
            console.error('La requête a échoué :', xhr.statusText);
        }
    };
    xhr.send(formData);
});