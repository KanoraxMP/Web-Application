<html>
    <body>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>

<?php
include "database.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query stored password
    $sql = 'SELECT password FROM employees WHERE email = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Verify with hashed password
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $storedPassword = $result->fetch_assoc()['password'];
        if (password_verify($password, $storedPassword)) {
            echo 'Login successful';
        } else {
            echo 'Login failed';
        }
    } else {
        echo 'Login failed';    
    }
}