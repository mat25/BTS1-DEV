<?php

$destinataire = "dest@tests.fr";
$objet = "Test mailDev";
$message = "Contenu du message envoyées";
$emetteur = "emetteur@tests.fr";

// Définir l'addresse de l'emetteur (from)
// Positionner les entetes de mail
$entetes = [
    "from" => $emetteur,
    // TEXT-plain correspond au type MIME du contenus
    "content-type" => "text/html; charset=utf-8",
    "cc" => "copie1@tests.fr,copie2@tests.fr",
    "bcc" => "copie1@tests.fr,copie2@tests.fr",
];

/*if (mail($destinataire,$objet,$message,$entetes)) {
    echo "Le mail a été envoyer";
} else {
    echo "Un probleme est survenue lors de l'envoi du mail";
}*/

// Envoie d'un messsage dont le contenu est en HTML
$message = "
    <h1>Contenu du mail</h1>
    <p>Ceci est un message en HTML</p>
";

if (mail($destinataire,$objet,$message,$entetes)) {
    echo "Le mail a été envoyer";
} else {
    echo "Un probleme est survenue lors de l'envoi du mail";
}
