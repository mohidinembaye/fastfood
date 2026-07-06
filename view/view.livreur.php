<?php

function afficherErreursLivraison($errors) {
    echo "\n[ERREUR] " . implode(" - ", (array) $errors) . "\n";
}
function afficherLivreurs($listeLivreurs) {
    echo "\n--- Livreurs disponibles ---\n";
    foreach ($listeLivreurs as $livreur) {
        echo $livreur['id'] . ". " . $livreur['nom'] . " - DISPONIBLE\n";
    }
}
function afficherConfirmationAssignation() {
    echo "\n[OK] Livreur assigne - Commande : EN_LIVRAISON - Livreur : OCCUPE - Notification envoyee\n";
}