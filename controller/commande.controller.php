<?php


function traiterSaveCommande() {
    echo "\n=== Passer une commande ===\n";
    $donnees = saisirCommande();

    $resultat = validateCommande($donnees);
    if ($resultat !== "ok") {
        afficherErreurs($resultat);
        return;
    }

    $commandeEnregistree = saveCommande($donnees);
    afficherConfirmationCommande($commandeEnregistree['reference'], $commandeEnregistree['montant']);
}