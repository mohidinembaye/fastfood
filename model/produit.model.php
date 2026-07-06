<?php

$produits = [
    ['id' => 1, 'nom' => 'Burger Poulet', 'prix' => 2500, 'stock' => 10],
    ['id' => 2, 'nom' => 'Frites', 'prix' => 1000, 'stock' => 20],
    ['id' => 3, 'nom' => 'Jus de Bissap', 'prix' => 500, 'stock' => 15],
];
function obtenirProduitParId($idProduit) {
    global $produits;
    foreach ($produits as $produit) {
        if ($produit['id'] === $idProduit) {
            return $produit;
        }
    }
    return null;
}

function existsProduit($idProduit) {
    return obtenirProduitParId($idProduit) !== null;
}

function stockDisponible($idProduit, $quantite) {
    $produit = obtenirProduitParId($idProduit);
    if ($produit === null) {
        return false;
    }
    return $produit['stock'] >= $quantite;
}