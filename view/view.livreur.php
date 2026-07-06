<?php

function afficherErreursLivraison($errors) {
    echo "\n[ERREUR] " . implode(" - ", (array) $errors) . "\n";
}