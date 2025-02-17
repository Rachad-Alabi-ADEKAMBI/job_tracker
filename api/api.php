<?php
session_start();
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


function createJob0()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        $errors = [];
        echo $_POST['title'];


        if (empty($_POST['enterprise'])) {
            $errors['enterprise'] = "Name not valid";
        }

        if (empty($_POST['title'])) {
            $errors['title'] = 'Title not valid';
        }

        if (empty($_POST['source'])) {
            $errors['source'] = 'Source not valid';
        }

        if (empty($_POST['recruiter'])) {
            $errors['recruiter'] = 'Recruiter not valid';
        }

        if (empty($errors)) {
            $enterprise = verifyInput($_POST['enterprise']);
            $title = verifyInput($_POST['title']);
            $source = verifyInput($_POST['source']);
            $recruiter = verifyInput($_POST['recruiter']);
            $note = verifyInput($_POST['note']);

            $sql = $pdo->prepare("INSERT INTO jobs (`date`, enterprise, title, source, recruiter, note, status) 
            VALUES (NOW(), ?, ?, ?, ?, ?, 'pending')");

            $sql->execute([$enterprise, $title, $source, $recruiter, $note]);

            if ($sql->rowCount() > 0) {
                $response = [
                    'success' => true,
                    'message' => 'Form data saved successfully'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error saving form data'
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
            'message' => 'Please fill the form'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
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
