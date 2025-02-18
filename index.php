<?php
session_start();

// Configure le niveau de rapport des erreurs pour exclure les avertissements
error_reporting(E_ALL & ~E_WARNING);

// Désactive l'affichage des erreurs
ini_set('display_errors', 1);

// Inclusion des contrôleurs nécessaires
require_once 'src/controller/home.php';

if (isset($_GET['action']) && !empty($_GET['action'])) {
    switch ($_GET['action']) {
        case 'homepage':
            homePage();
            break;

        case 'getJobs':
            getJobs();
            break;

        case 'addNewJob':
            addNewJob();
            break;

        case 'updateStatus':
            updateStatus();
            break;

        default:
            echo '<script>
                alert("Function not found ");
                window.history.back();
            </script>';
            exit();
    }
} else {
    // Page d'accueil par défaut
    homePage();
}
