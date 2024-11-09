<?php
session_start();
include 'connection.php';
if (isset($_POST['sign-up'])) {
    $s_name = $_POST['name-input'];
    $s_email = $_POST['email-input'];
    $dob = $_POST['date-input'];
    $mobile = $_POST['mobile-input'];
    $passhash = password_hash($_POST['pass-input'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $quarry = 'INSERT INTO details(name, email, dob, mobile, pass, role) VALUES (?, ?, ?, ?, ?, ?)';
    $submit = $conn->prepare($quarry);
    $submit->bind_param('ssssss', $s_name, $s_email, $dob, $mobile, $passhash, $role);
    $submit->execute();
    header('location: ../index.html');
} else {
    header('location: ../signup.html');
}