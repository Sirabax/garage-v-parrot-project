function envoyerEmail() {
  var nom = document.getElementById("nom").value;
  var prenom = document.getElementById("prenom").value;
  var email = document.getElementById("email").value;
  var telephone = document.getElementById("telephone").value;
  var message = document.getElementById("message").value;

  var sujet = "Demande de contact";
  var corpsMail =
    "Nouveau message de <br><br>" +
    "Nom: " +
    nom +
    "<br>" +
    "Prénom: " +
    prenom +
    "<br>" +
    "E-mail: " +
    email +
    "<br>" +
    "Numéro de téléphone: " +
    telephone +
    "<br>" +
    "Message: " +
    message;

  var xhr = new XMLHttpRequest();
  var url = 'https://localhost:8000/envoiemail.php';

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log("E-mail envoyé avec succès");
    } else if (xhr.readyState == 4 && xhr.status != 200) {
      console.error("Erreur lors de l'envoi de l'e-mail");
    }
  };

  xhr.send(
    "sujet=" +
      encodeURIComponent(sujet) +
      "&corpsMail=" +
      encodeURIComponent(corpsMail)
  );
}
