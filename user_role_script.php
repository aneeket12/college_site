<?php
    if(isset($_POST['s_btn'])){
        include 'connection.php';

        $role = $_POST['u_role'];
        $submit = $conn->prepare('UPDATE details3 SET role = ? WHERE uid = ?');
        $submit->bind_param('si', $role, $_GET['uid']);
        $submit->execute();
        header('location: ./manage_user.php');
    }else{
        header('location: user_role_script.php');
    }