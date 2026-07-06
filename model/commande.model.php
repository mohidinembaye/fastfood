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
function obtenirCommandeParId($idCommande) {
    global $commandes;
    foreach ($commandes as $commande) {
        if ($commande['id'] === $idCommande) {
            return $commande;
        }
    }
    return null;
}

function existsCommande($idCommande) {
    return obtenirCommandeParId($idCommande) !== null;
}

function verifierEtat($idCommande) {
    $commande = obtenirCommandeParId($idCommande);
    return $commande !== null ? $commande['statut'] : null;
}
function getMontant($idCommande) {
    $commande = obtenirCommandeParId($idCommande);
    return $commande !== null ? $commande['montant'] : 0;
}
function modifierEtat($idCommande, $nouvelEtat) {
    global $commandes;
    foreach ($commandes as &$commande) {
        if ($commande['id'] === $idCommande) {
            $commande['statut'] = $nouvelEtat;
            return "ok";
        }
    }
    return "Commande introuvable";
}
function findByEtat($etat) {
    global $commandes;
    $resultats = [];
    foreach ($commandes as $commande) {
        if ($commande['statut'] === $etat) {
            $resultats[] = $commande;
        }
    }
    return $resultats;
}