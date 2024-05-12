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

// Vérifier la méthode de requête HTTP
$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case 'GET':
        // Endpoint pour récupérer toutes les données de la table jobs
        $sql = "SELECT * FROM jobs ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $jobs = [];
            while ($row = $result->fetch_assoc()) {
                $jobs[] = $row;
            }
            header('Content-Type: application/json');
            echo json_encode($jobs);
        } else {
            http_response_code(404); // Non trouvé
            echo json_encode(['error' => 'No data found']);
        }
        break;
    case 'POST':
        // Endpoint pour enregistrer les données du formulaire
        $formData = json_decode(file_get_contents("php://input"), true);

        if (
            isset($formData['enterprise']) &&
            isset($formData['title']) &&
            isset($formData['source']) &&
            isset($formData['recruiter'])
        ) {
            $enterprise = $formData['enterprise'];
            $title = $formData['title'];
            $source = $formData['source'];
            $recruiter = $formData['recruiter'];
            $note = $formData['note'] ?? '';

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
            http_response_code(400); // Mauvaise demande
            echo json_encode(['error' => 'Missing required data']);
        }
        break;
        case 'PUT':
            // Endpoint to update item status
            $urlParts = explode('/', $_SERVER['REQUEST_URI']);
            $id = $urlParts[2] ?? null;
            $status = $urlParts[3] ?? '';
        
            if ($id !== null && ($status == 'accepted' || $status == 'rejected')) {
                $sql = "UPDATE jobs SET status = '$status' WHERE id = $id";
        
                if ($conn->query($sql) === TRUE) {
                    $response = [
                        'success' => true,
                        'message' => 'Item status updated'
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Error updating item status: ' . $conn->error
                    ];
                }
        
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                http_response_code(400); // Bad request
                echo json_encode(['error' => 'Invalid ID or status parameter']);
            }
        break;
    default:
        http_response_code(405); // Méthode non autorisée
        echo json_encode(['error' => 'Method Not Allowed']);
        break;
}

// Fermer la connexion à la base de données
$conn->close();
?>
