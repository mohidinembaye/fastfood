<?php

function traiterPayerCommande() {
    echo "\n=== Payer une commande ===\n";
    $saisie = choisirCommandeAPayer();

    $resultat = validatePaiement($saisie['idCommande'], $saisie['infosCB']);
    if ($resultat !== "ok") {
        afficherErreursPaiement($resultat);
        return;
    }

   
}