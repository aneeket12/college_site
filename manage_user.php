<?php
    session_start();
    if(isset($_SESSION['admin'])){
        include 'connection.php';

        $stmt = $conn->prepare('SELECT * FROM details3');
        $stmt->execute();

        $rslt = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>
</head>
<body>
    <h1>All Users</h1>
    <table border="1">
        <tr>
            <th>Sl no</th>
            <th>Name</th>
            <th>email</th>
            <th>DOB</th>
            <th>Mobile</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php
            $i = 1;
            while($rows = $rslt->fetch_assoc()){
        ?>
        <tr>
            <th><?php print $i ?></th>
            <th><?php print $rows['name']?></th>
            <th><?php print $rows['email']?></th>
            <th><?php print $rows['dob']?></th>
            <th><?php print $rows['mobile']?></th>
            <th><?php print $rows['role']?></th>
            <th>
                <a href="update_role.php?uid=<?php echo $rows['uid']?>">Upadate Role</a>
                <a href="#">Reset Password</a>
            </th>
        </tr>
        <?php
            $i++;
            }
        ?>
    </table>
</body>
</html>
<?php
    }else{
        header('location: ../login.html');
    }
?>