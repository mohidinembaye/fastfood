<?php

$commandes = [];

const STATUT_EN_ATTENTE = "EN_ATTENTE";
const STATUT_PAYEE = "PAYEE";
const STATUT_EN_PREPARATION = "EN_PREPARATION";
const STATUT_PRETE = "PRETE";
const STATUT_EN_LIVRAISON = "EN_LIVRAISON";

function insertCommande($donnees, $montant) {
    global $commandes;
    $commande = [
        'id' => genererId($commandes),
        'clientId' => $donnees['idClient'],
        'lignes' => $donnees['listeProduits'],
        'montant' => $montant,
        'statut' => STATUT_EN_ATTENTE,
    ];
    $commandes[] = $commande;
    return $commande['id'];
}