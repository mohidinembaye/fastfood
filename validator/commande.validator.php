<?php

function validateCommande($donnees) {
    $errors = [];

    if (empty($donnees['idClient'])) {
        $errors[] = "L'identifiant client est obligatoire";
    }
    if (empty($donnees['listeProduits'])) {
        $errors[] = "La liste des produits est obligatoire";
    }

    if (!empty($errors)) {
        return $errors;
    }

    if (!existsClient($donnees['idClient'])) {
        return ["client" => "Ce client n'existe pas"];
    }

    foreach ($donnees['listeProduits'] as $ligne) {
        if (!existsProduit($ligne['idProduit'])) {
            return ["produit" => "Le produit #" . $ligne['idProduit'] . " n'existe pas"];
        }
        if (!stockDisponible($ligne['idProduit'], $ligne['quantite'])) {
            return ["stock" => "Stock insuffisant pour le produit #" . $ligne['idProduit']];
        }
    }

    return "ok";
}