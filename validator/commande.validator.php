<?php

function validateValidationCommande($idCommande) {
    if (empty($idCommande)) {
        return ["L'identifiant de commande est obligatoire"];
    }

    if (!existsCommande($idCommande)) {
        return ["commande" => "Cette commande n'existe pas"];
    }

    $etat = verifierEtat($idCommande);
    if ($etat !== STATUT_PAYEE) {
        return ["etat" => "Cette commande n'est pas au statut PAYEE (statut actuel : " . $etat . ")"];
    }

    return "ok";
}