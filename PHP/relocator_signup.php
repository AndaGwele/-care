<?php
// signup_relocator.php
require_once "Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['FullName'];
    $email = $_POST['Email'];
    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
    $phone = $_POST['PhoneNumber'];
    $reason = $_POST['Reason'];



    $stmt = $conn->prepare("INSERT INTO users 
(full_name, email, password_hash, role, phone_number, province_id, district_id, community_id, created_at, reason) 
VALUES (?, ?, ?, 'relocator', ?, null, null, null, NOW(), ?)");
    $stmt->execute([$fullname, $email, $password, $phone, $reason]);


    echo "Relocator registered successfully!";
}
?>