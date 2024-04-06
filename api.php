<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = ""; // Par défaut, il n'y a pas de mot de passe pour 'root' en local
$database = "job_tracker";

// Établir la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si des données ont été soumises via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $formData = json_decode(file_get_contents("php://input"), true);

    // Vérifie si les données nécessaires sont présentes
    if (isset($formData['enterprise']) && isset($formData['title']) && isset($formData['source']) && isset($formData['recruiter'])) {
        $enterprise = $formData['enterprise'];
        $title = $formData['title'];
        $source = $formData['source'];
        $recruiter = $formData['recruiter'];
        $note = $formData['note'] ?? '';

        // Préparer et exécuter la requête SQL pour insérer les données dans la base de données
        $sql = "INSERT INTO jobs (enterprise, title, source, recruiter, note, status)
         VALUES ('$enterprise', '$title', '$source', '$recruiter', '$note', 'pending')";

        if ($conn->query($sql) === TRUE) {
            $response = [
                'success' => true,
                'message' => 'Form data saved successfully'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Error saving form data: ' . $conn->error
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Si certaines données sont manquantes, renvoyer une erreur
        http_response_code(400); // Mauvaise demande
        echo json_encode(['error' => 'Missing required data']);
    }
} else {
    // Si la méthode de requête n'est pas POST, renvoyer une erreur
    http_response_code(405); // Méthode non autorisée
    echo json_encode(['error' => 'Method Not Allowed']);
}

// Fermer la connexion à la base de données
$conn->close();
?>