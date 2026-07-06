<?php

$clients = [
    ['id' => 1, 'nom' => 'Diop', 'email' => 'a.diop@mail.sn'],
    ['id' => 2, 'nom' => 'Fall', 'email' => 'k.fall@mail.sn'],
];
function existsClient($idClient) {
    global $clients;
    foreach ($clients as $client) {
        if ($client['id'] === $idClient) {
            return true;
        }
    }
    return false;
}
function getClientCommande($idCommande) {
    global $clients;
    $commande = obtenirCommandeParId($idCommande);
    if ($commande === null) {
        return null;
    }
    foreach ($clients as $client) {
        if ($client['id'] === $commande['clientId']) {
            return $client;
        }
    }
    return null;
}