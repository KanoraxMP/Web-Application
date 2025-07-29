<html>

<body>
    <form action="updatepwd.php" method="post">
        <label for="id">Id</label>
        <input type="text" id="id" name="id">
        <br>
        <label for="pass">Password</label>
        <input type="text" id="pass" name="password">
        <br>
        <input type="submit" value="Update Password">
    </form>
</body>

</html>

<?php
include "database.php";

if (isset($_POST['id'])) {

    $sql = 'update employees set password = ? where employeeNumber = ?';
    $stmt = $conn->prepare($sql);
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT) ;
    $stmt->bind_param("ss", $hash, $_POST['id']);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo 'Update completed';
    } else {
        echo 'Update failed';
    }
}