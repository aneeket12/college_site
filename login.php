<?php
if (isset($_POST['log-in']) && isset($_POST['g-recaptcha-response'])){ 
    include 'connection.php';

    $email = $_POST['log-email'];
    $pass = $_POST['log-pass'];
    $response= $_POST['g-recaptcha-response'];
    $secret_key='6LdgZGcqAAAAAAPzo5xIv8afhDDdjDDD7E5gADfU';
    $ip=$_SERVER['REMOTE_ADDR'];
    $url="https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response&ip=$ip";
    $launch=file_get_contents($url);
    $data=json_decode($launch);
    if($data->success==true)
    {
    $sql = $conn->prepare('SELECT * FROM details WHERE email = ?');
    $sql->bind_param('s', $email);
    $sql->execute();

    $res = $sql->get_result();
    $row = $res->fetch_assoc();

    $hash = $row['pass'];

    if (password_verify($pass, $hash)) {
        session_start();
        if ($row['role'] == 'Admin') {
            $_SESSION['admin'] = $email;
            $_SESSION['admin_name'] = $row['uname'];
            header("location: admin.php");
        } else {
            $_SESSION['username'] = $email;
            $_SESSION['uname'] = $row['uname'];
            header("location: welcome.php");
        }
    } else {
        // header('location: ../login.html');
        echo 'Hi';
    }
}
} 
    else {
    // header('location: ../login.html');
    echo "Bye";
}
