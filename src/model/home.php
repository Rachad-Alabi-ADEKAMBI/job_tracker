<?php
require_once 'db.php';

function getJobs()
{

    return 'ok';
}

function newJob() {
    $pdo = getConnexion();
    $errors = [];
    if (!empty($_POST)) {
           $msg = 'done';
           return $msg;
        } else {
            $response = [
                'success' => false,
                'errors' => $errors
            ];
        }

    header('Content-Type: application/json');
    echo json_encode($response);
}