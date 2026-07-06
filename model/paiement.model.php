<?php

$paiements = [];

function enregistrerPaiement($idCommande, $montant) {
    global $paiements;
    $paiement = [
        'id' => genererId($paiements),
        'commandeId' => $idCommande,
        'montant' => $montant,
    ];
    $paiements[] = $paiement;
    return $paiement['id'];
}
