<?php
//session_start();
//local
$pdo = new PDO('mysql:dbname=job_tracker;host=localhost', 'root', '');
function getConnexion()
{
    return new PDO(
        'mysql:host=localhost; dbname=job_tracker; charset=UTF8',
        'root',
        ''
    );
}

function sendJSON($infos)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}

$error = ['error' => false];
$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

//controle des input
function verifyInput($inputContent)
{
    $inputContent = htmlspecialchars($inputContent);

    $inputContent = trim($inputContent);

    return $inputContent;
}

function addNewJob()
{
    $pdo = getConnexion();
    if (!$pdo) {
        echo json_encode([
            'success' => false,
            'message' => 'Database connection failed'
        ]);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
        $errors = [];

        // Validate inputs
        if (empty($_POST['company'])) {
            $errors['company'] = "Company not valid";
        }

        if (empty($_POST['position'])) {
            $errors['position'] = 'Position not valid';
        }

        if (empty($_POST['date_applied'])) {
            $errors['date_applied'] = 'Date applied not valid';
        }

        if (empty($errors)) {
            $company = verifyInput($_POST['company']);
            $position = verifyInput($_POST['position']);
            $date_applied = verifyInput($_POST['date_applied']);

            try {
                $sql = $pdo->prepare("INSERT INTO jobs (company, position, date_applied, status) VALUES (?, ?, ?, ?)");
                $sql->execute([$company, $position, $date_applied, 'pending']);

                if ($sql->rowCount() > 0) {
                    $response = [
                        'success' => true,
                        'message' => 'Job added successfully'
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'No data inserted'
                    ];
                }
            } catch (PDOException $e) {
                $response = [
                    'success' => false,
                    'message' => 'Database error: ' . $e->getMessage()
                ];
            }
        } else {
            $response = [
                'success' => false,
                'errors' => $errors
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => 'Invalid request. Please fill the form correctly.'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

function getJobs()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    jobs
        ORDER BY id DESC");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
    //  return $datas;
}

function updateJob($id, $status)
{
    $pdo = getConnexion();
    $req = $pdo->prepare("UPDATE jobs SET status = ? WHERE id = ?");
    $req->execute([$status, $id]); ?>
<?php
}
