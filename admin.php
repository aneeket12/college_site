<?php
    session_start();
    if(isset($_SESSION['admin'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
</head>
<body>
    <h1>Hello admin</h1>
    <ul>
        <li><a href="#">Sign Out</a></li>
        <li><a href="#">Change Password</a></li>
        <li><a href="manage_user.php">Manage Users</a></li>
    </ul>    
</body>
</html>

<?php
    }else{
        header('location: login.php');
    }
?>