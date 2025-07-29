<html>
    <head>
        <title>Login</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body class="bg-light">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card p-4" style="width: 100%; max-width: 400px;">
                <h3 class="text-center mb-4">Login</h3>

            <div id="alertMessage" class="alert alert-danger d-none" role="alert">
                Login failed: Invalid email or password.
                </div>
                
                <form action="index.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <a href="register.php">Register An Account</a> <br>
                    <br> <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
    
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('login_failed')) {
            const alertMessage = document.getElementById('alertMessage');
            alertMessage.classList.remove('d-none');
            }
        </script>
        
</html>

<?php
session_start();
include "/xampp/htdocs/web_app_1_assignment_4/database.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'SELECT email, password FROM employees WHERE email = ?'; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Verify with hashed password
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];
        if (password_verify($password, $storedPassword)) {
            echo 'Login successful';
            $_SESSION['user'] = $row['email']; 
           header("Location:../index.php");
            exit(); 
        } else {
            header("Location: login.php?login_failed=true");
            exit(); 
        }
    } else {
        header("Location: login.php?login_failed=true");
        exit(); 
    }
}
?>