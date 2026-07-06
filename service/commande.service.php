<?php

function saveCommande($donnees) {
    $montant = 0;

    foreach ($donnees['listeProduits'] as $ligne) {
        $prix = getPrix($ligne['idProduit']);
        $montant += $prix * $ligne['quantite'];
    }

    return $montant;
}