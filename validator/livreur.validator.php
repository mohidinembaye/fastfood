<?php

function validateAssignation($idCommande) {
    if (empty($idCommande)) {
        return ["L'identifiant de commande est obligatoire"];
    }
    if (!existsCommande($idCommande)) {
        return ["commande" => "Cette commande n'existe pas"];
    }
    $etat = verifierEtat($idCommande);
    if ($etat !== STATUT_PRETE) {
        return ["etat" => "Cette commande n'est pas au statut PRETE (statut actuel : " . $etat . ")"];
    }
    return "ok";
}
function validateLivreur($idLivreur) {
    if (empty($idLivreur)) {
        return ["L'identifiant du livreur est obligatoire"];
    }
    if (!existsLivreur($idLivreur)) {
        return ["livreur" => "Ce livreur n'existe pas"];
    }
    $statut = verifierDisponibilite($idLivreur);
    if ($statut !== 'DISPONIBLE') {
        return ["disponibilite" => "Ce livreur n'est pas disponible actuellement (statut : " . $statut . ")"];
    }
    return "ok";
}