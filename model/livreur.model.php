<?php

$livreurs = [
    ['id' => 1, 'nom' => 'Sarr', 'statut' => 'DISPONIBLE'],
    ['id' => 2, 'nom' => 'Gueye', 'statut' => 'DISPONIBLE'],
];

function findDisponibles() {
    global $livreurs;
    $resultats = [];
    foreach ($livreurs as $livreur) {
        if ($livreur['statut'] === 'DISPONIBLE') {
            $resultats[] = $livreur;
        }
    }
    return $resultats;
}
function obtenirLivreurParId($idLivreur) {
    global $livreurs;
    foreach ($livreurs as $livreur) {
        if ($livreur['id'] === $idLivreur) {
            return $livreur;
        }
    }
    return null;
}

function existsLivreur($idLivreur) {
    return obtenirLivreurParId($idLivreur) !== null;
}

function verifierDisponibilite($idLivreur) {
    $livreur = obtenirLivreurParId($idLivreur);
    return $livreur !== null ? $livreur['statut'] : null;
}