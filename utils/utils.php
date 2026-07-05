<?php

function lireEntree($message) {
    echo $message;
    return trim(fgets(STDIN));
}

function genererId($tableau) {
    if (empty($tableau)) {
        return 1;
    }
    $ids = array_column($tableau, 'id');
    return max($ids) + 1;
}