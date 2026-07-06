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