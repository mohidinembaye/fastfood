<?php

require_once 'utils/utils.php';

require_once 'model/produit.model.php';
require_once 'model/client.model.php';
require_once 'model/commande.model.php';
require_once 'model/paiement.model.php';
require_once 'model/livreur.model.php';

require_once 'validator/commande.validator.php';
require_once 'validator/paiement.validator.php';
require_once 'validator/livreur.validator.php';

require_once 'service/commande.service.php';
require_once 'service/paiement.service.php';
require_once 'service/livreur.service.php';

require_once 'view/view.commande.php';
require_once 'view/view.paiement.php';
require_once 'view/view.livreur.php';

require_once 'controller/commande.controller.php';
require_once 'controller/paiement.controller.php';
require_once 'controller/livreur.controller.php';

function afficherMenuPrincipal() {
    echo "\n===== FASTFOOD =====\n";
    echo "1. Espace Client\n";
    echo "2. Espace Gerant\n";
    echo "0. Quitter\n";
}

function menuClient() {
    $retour = false;
    while (!$retour) {
        echo "\n----- ESPACE CLIENT -----\n";
        echo "1. Passer une commande\n";
        echo "2. Payer une commande\n";
        echo "0. Retour\n";
        switch (lireEntree("Votre choix : ")) {
            case '1':
                traiterSaveCommande();
                break;
            case '2':
                traiterPayerCommande();
                break;
            case '0':
                $retour = true;
                break;
            default:
                echo "[ERREUR] Choix invalide\n";
        }
    }
}

function menuGerant() {
    $retour = false;
    while (!$retour) {
        echo "\n----- ESPACE GERANT -----\n";
        echo "1. Consulter les commandes payees\n";
        echo "2. Valider une commande entrante\n";
        echo "3. Assigner un livreur\n";
        echo "0. Retour\n";
        switch (lireEntree("Votre choix : ")) {
            case '1':
                traiterListerCommandesPayees();
                break;
            case '2':
                traiterValiderCommande();
                break;
            case '3':
                traiterAssignerLivreur();
                break;
            case '0':
                $retour = true;
                break;
            default:
                echo "[ERREUR] Choix invalide\n";
        }
    }
}

$quitter = false;
while (!$quitter) {
    afficherMenuPrincipal();
    switch (lireEntree("Votre choix : ")) {
        case '1':
            menuClient();
            break;
        case '2':
            menuGerant();
            break;
        case '0':
            $quitter = true;
            break;
        default:
            echo "[ERREUR] Choix invalide\n";
    }
}

echo "\nFermeture de l'application. A bientot !\n";