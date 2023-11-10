<?php

// Récupérer les données du formulaire
$sujet = $_POST['sujet'];
$corpsMail = nl2br($_POST['corpsMail']); // Convertir les sauts de ligne en balises <br>

// Construire les en-têtes de l'e-mail
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: votre_email@example.com"; // Remplacez par votre adresse e-mail

// Envoyer l'e-mail
$mailResult = mail("destinataire@example.com", $sujet, $corpsMail, $headers);

// Vérifier si l'e-mail a été envoyé avec succès
if ($mailResult) {
    // Réponse en cas de succès
    echo "E-mail envoyé avec succès";
} else {
    // Réponse en cas d'erreur
    echo "Erreur lors de l'envoi de l'e-mail";
}

?>
