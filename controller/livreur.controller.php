<?php

function traiterAssignerLivreur() {
    echo "\n=== Assigner un livreur ===\n";
    $idCommande = (int) lireEntree("Identifiant de la commande a expedier : ");

    $resultat = validateAssignation($idCommande);
    if ($resultat !== "ok") {
        afficherErreursLivraison($resultat);
        return;
    }

    $listeLivreurs = getLivreursDisponibles();
    afficherLivreurs($listeLivreurs);

    $idLivreur = (int) lireEntree("Identifiant du livreur a assigner : ");

    $resultat = validateLivreur($idLivreur);
    if ($resultat !== "ok") {
        afficherErreursLivraison($resultat);
        return;
    }

    assignerLivreur($idCommande, $idLivreur);
    afficherConfirmationAssignation();
}