<?php
    session_start();
    if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin page</title>
</head>
<body>
    <h1>Hello user</h1>    
</body>
</html>

<?php
    }else{
        header('location: login.php');
    }
?>