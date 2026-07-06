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