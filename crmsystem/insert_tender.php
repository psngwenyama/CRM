<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rrr";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tender_reference = $_POST['tender_reference'];
$tender_name = $_POST['tender_name'];
$application_date = $_POST['application_date'];
$closing_date = $_POST['closing_date'];
$contact_person = $_POST['contact_person'];
$contact_name = $_POST['contact_name'];
$need_briefing = $_POST['need_briefing'];
$submission_type = $_POST['submission_type'];
$owner = $_POST['owner'];
$comment = $_POST['comment'];

$sql = "INSERT INTO tenders (tender_reference, tender_name, application_date, closing_date, contact_person, contact_name, need_briefing, submission_type, owner, comment) 
        VALUES ('$tender_reference', '$tender_name', '$application_date', '$closing_date', '$contact_person', '$contact_name', '$need_briefing', '$submission_type', '$owner', '$comment')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $response = array(
        'success' => true,
        'tender' => array(
            'tender_id' => $last_id,
            'tender_reference' => $tender_reference,
            'tender_name' => $tender_name,
            'application_date' => $application_date,
            'closing_date' => $closing_date,
            'contact_person' => $contact_person,
            'contact_name' => $contact_name,
            'need_briefing' => $need_briefing,
            'submission_type' => $submission_type,
            'owner' => $owner,
            'comment' => $comment
        )
    );
} else {
    $response = array('success' => false);
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
