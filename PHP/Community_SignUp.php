<?php
// signup_community.php
require_once "Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $username = $_POST['Username'];
    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
    $province = $_POST['province'];
    $district = $_POST['district'];
    $community = $_POST['community'];

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, phone, username, password, role, province, district, community) 
                            VALUES (?, ?, ?, ?, ?, ?, 'community_member', ?, ?, ?)");
    $stmt->execute([$fname, $lname, $email, $phone, $username, $password, $province, $district, $community]);

    echo "Community member registered successfully!";
}
?>