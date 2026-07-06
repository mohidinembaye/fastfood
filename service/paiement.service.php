<?php

function demanderPaiement($infosCB, $montant) {
    if (substr($infosCB['numeroCarte'], -4) === '0000') {
        return "REFUSEE";
    }
    return "ACCEPTEE";
}


function payerCommande($idCommande, $infosCB) {
    $montant = getMontant($idCommande);
    $reponseBanque = demanderPaiement($infosCB, $montant);

    if ($reponseBanque === "REFUSEE") {
        return ['statut' => 'KO'];
    }

    $referencePaiement = enregistrerPaiement($idCommande, $montant);
    modifierEtat($idCommande, STATUT_PAYEE);

    return ['statut' => 'OK', 'montant' => $montant, 'referencePaiement' => $referencePaiement];
}