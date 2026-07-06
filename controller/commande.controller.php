<?php


function traiterValiderCommande() {
    traiterListerCommandesPayees();

    $idCommande = (int) lireEntree("Identifiant de la commande a valider : ");
    $confirmation = lireEntree("Confirmez le lancement de la preparation (O/N) : ");

    if (strtoupper($confirmation) !== 'O') {
        echo "[OK] Validation annulee\n";
        return;
    }

    $resultat = validateValidationCommande($idCommande);
    if ($resultat !== "ok") {
        afficherErreurs($resultat);
        return;
    }

    validerCommande($idCommande);
}