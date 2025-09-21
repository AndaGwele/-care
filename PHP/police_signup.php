<?php
// signup_police.php
require_once "Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['FullName'];
    $badge = $_POST['BadgeNumber'];
    $email = $_POST['Email'];
    $station = $_POST['Station'];
    $role = $_POST['Designation'];
    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO Police (first_name, badge_number, email, station, password, role) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fullname, $badge, $email, $station, $password, $role]);

    echo "Police officer registered successfully!";
}
?>