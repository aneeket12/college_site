<?php
    if(isset($_POST['c-pass'])){
        include 'connection.php';
        $pass1 = password_hash($_POST['pass1'], PASSWORD_DEFAULT);

        $sql = $conn->prepare('UPDATE details SET pass = ?');
        $sql->bind_param('s', $pass1);
        $sql->execute();
        
        header('location: ../login.html');

    }else{
        print("wrong input");
    }