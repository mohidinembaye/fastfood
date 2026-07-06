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

    $client = getClientCommande($idCommande);

    if ($client !== null) {
        enregistrerNotification($client['id'], "Votre commande #" . $idCommande . " est en preparation", "COMMANDE");
    }

    return "ok";
}