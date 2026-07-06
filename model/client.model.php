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