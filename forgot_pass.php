<?php
if (isset($_POST['f-pass'])) {
    include 'connection.php';
    $phno = $_POST['mobile'];
    $dob = $_POST['dob'];

    $submit = $conn->prepare('SELECT * FROM details WHERE mobile = ?');
    $submit->bind_param('s', $phno);
    $submit->execute();

    $rst = $submit->get_result();
    $rows = $rst->fetch_assoc();

    if($rows['dob'] == $dob){
        header('location: ../change_pass.html');
    }
    else{
        header('location: ../forgot_pass.html');
    }
} else {
    header('location: ../forgot_pass.html');
}
