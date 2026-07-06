<?php

function saveCommande($donnees) {
    $montant = 0;
    foreach ($donnees['listeProduits'] as $ligne) {
        $prix = getPrix($ligne['idProduit']);
        $montant += $prix * $ligne['quantite'];
    }

    $reference = insertCommande($donnees, $montant);

    return ['reference' => $reference, 'montant' => $montant];
}
function getCommandesPayees() {
    return findByEtat(STATUT_PAYEE);
}
function validerCommande($idCommande) {
    modifierEtat($idCommande, STATUT_EN_PREPARATION);

    return "ok";
}