<?php
    include 'connection.php';

    $stmt = $conn->prepare('SELECT * FROM details3 where uid = ?');
    $stmt->bind_param('i', $_GET['uid']);
    $stmt->execute();
    $rslt = $stmt->get_result();
    $rows = $rslt->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update role</title>
</head>
<body>
    <form action="./user_role_script.php?uid=<?php echo $rows['uid']?>" method="post">
        <label for="u_name">user name:</label>
        <input type="text" value="<?php echo $rows['name']?>"> <br>

        <label for="u_email">user email:</label>
        <input type="email" id="u_email" name="u_email" value="<?php echo $rows['email']?>"><br>

        <label for="u_mobile">user mobile:</label>
        <input type="text" id="u_mobile" name="u_mobile" value="<?php echo $rows['mobile']?>"><br>

        <label for="u_role">user role:</label>
        <select name="u_role" id="u_role">
            <option value="Guest">Guest</option>
            <option value="Manager">Manager</option>
            <option value="Admin">Admin</option>
        </select><br>

        <input type="submit" name="s_btn" value="Submit" id="s_btn">
    </form>
</body>
</html>