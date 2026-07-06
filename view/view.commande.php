<?php

function afficherMenu() {
    global $produits;
    echo "\n--- Menu ---\n";
    foreach ($produits as $produit) {
        echo $produit['id'] . ". " . $produit['nom'] . " - " . number_format($produit['prix'], 0, ',', ' ') . " FCFA\n";
    }
}

function saisirCommande() {
    $idClient = (int) lireEntree("Identifiant client : ");

    $lignes = [];
    $continuer = true;
    while ($continuer) {
        afficherMenu();
        $idProduit = (int) lireEntree("Identifiant du plat (0 pour terminer) : ");
        if ($idProduit === 0) {
            $continuer = false;
            continue;
        }
        $quantite = (int) lireEntree("Quantite : ");
        $lignes[] = ['idProduit' => $idProduit, 'quantite' => $quantite];
    }

    return ['idClient' => $idClient, 'listeProduits' => $lignes];
}
function afficherErreurs($errors) {
    echo "\n[ERREUR] ";
    if (is_array($errors) && isset($errors[0]) === false) {
        echo implode(" - ", $errors) . "\n";
    } else {
        echo implode(" - ", (array) $errors) . "\n";
    }
}