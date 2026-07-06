<?php
function validatePaiement($idCommande, $infosCB) {
    if (empty($idCommande)) {
        return ["L'identifiant de commande est obligatoire"];
    }
    if (empty($infosCB['numeroCarte']) || empty($infosCB['dateExpiration']) || empty($infosCB['cvv'])) {
        return ["Tous les champs de la carte bancaire sont obligatoires"];
    }

    if (!existsCommande($idCommande)) {
        return ["commande" => "Cette commande n'existe pas"];
    }

    $etat = verifierEtat($idCommande);
    if ($etat !== STATUT_EN_ATTENTE) {
        return ["etat" => "Cette commande n'est pas au statut EN_ATTENTE (statut actuel : " . $etat . ")"];
    }

    return "ok";
}