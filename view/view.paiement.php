<?php

function choisirCommandeAPayer() {
    $idCommande = (int) lireEntree("Identifiant de la commande a payer : ");
    $numeroCarte = lireEntree("Numero de carte : ");
    $dateExpiration = lireEntree("Date d'expiration (MM/AA) : ");
    $cvv = lireEntree("CVV : ");

    return [
        'idCommande' => $idCommande,
        'infosCB' => ['numeroCarte' => $numeroCarte, 'dateExpiration' => $dateExpiration, 'cvv' => $cvv]
    ];
}

function afficherErreurPaiement() {
    echo "\n[ERREUR BANCAIRE] Transaction refusee par la banque\n";
}
function afficherRecu($idCommande, $montant) {
    echo "\n[OK] Paiement effectue - Commande #" . $idCommande . " PAYEE\n";
    echo "Recu : " . number_format($montant, 0, ',', ' ') . " FCFA\n";
}