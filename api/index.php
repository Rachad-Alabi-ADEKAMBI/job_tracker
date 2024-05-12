<?php
include 'api.php';
//www.monsite.fr/formation/:id (6, 7)

try {
    if (!empty($_GET['demande'])) {
        $url = explode('/', filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case 'jobs':
                getJobs();
                break;

            case 'newJob':
                createJob();
                break;

            case 'updateJob()':
                if (!empty($url[1])) {
                    updateJob($status, $id);
                } else {
                    throw new Exception('Please check the id');
                }
                break;

            default:
                throw new Exception("La demande n'est pas valide");
        }
    } else {
        throw new Exception('Problème de récupération de données. ');
    }
} catch (Exception $e) {
    $erreur = [
        'message' => $e->getMessage(),
        'code' => $e->getCode(),
    ];

    print_r($erreur);
}