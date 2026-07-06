<?php

function getLivreursDisponibles() {
    return findDisponibles();
}
function assignerLivreur($idCommande, $idLivreur) {
    affecterLivreur($idCommande, $idLivreur);

    modifierEtat($idCommande, STATUT_EN_LIVRAISON);

    modifierEtatLivreur($idLivreur, 'OCCUPE');

    notifierLivreur($idLivreur, $idCommande);

    return "ok";
}