<?php
    session_start();
    $message = ""; 
    include "/xampp/htdocs/web_app_1_assignment_4/database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeNumber = $_POST['employeeNumber'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $officeCode = 1; 

    try {
        $check_sql = "SELECT employeeNumber FROM employees WHERE employeeNumber = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $employeeNumber);
        $check_stmt->execute();
        $check_stmt->store_result();
        if ($check_stmt->num_rows > 0) {
            $message = "Username นี้ถูกใช้งานเเล้ว";
        }
        else{
            $sql  = 'INSERT INTO employees(employeeNumber, firstName, lastName, email, password, officeCode) 
            VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $conn->prepare($sql);
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sssssi', $employeeNumber, $firstName, $lastName, $email, $hash, $officeCode);
            $stmt->execute();
   
             if ($stmt->affected_rows > 0){
                echo 'Insert completed';
                header("Location:login.php");
        }
            else{
             echo 'Insert failed';
         }  $stmt->close();
         
        }$check_stmt->close();
    } catch (mysqli_sql_exception $e) {
        $message = "ข้อมูลซ้ำ: " . $e->getMessage();
    }
    $conn->close();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body class="bg-light">
        <style>
            .btn-primary {
                justify-content: center;
                text-align: center;
                background-color: #0d6efd;
                color: white;
                width: 55vh;
                max-width: 100%;

            }
        </style>
        <div class="container d-flex justify-content-center align-items-center" style="height: 800px;">
            <div class="card p-4" style="width: 150vh; max-width: 200vh;">
                <h3 class="text-center mb-4">Register</h3>

            <div id="alertMessage" class="alert alert-danger d-none" role="alert">
            Register failed:
                </div>
                
                <form action="register.php" method="post">
                <div class="mb-3">

                        <?php if (!empty($message)): ?>
                        <div class="alert alert-danger"><?= $message ?></div>
                         <?php endif; ?>

                        <label for="employeeNumber" class="form-label">Username</label>
                        <input type="text" id="text" name="employeeNumber" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Firstname</label>
                        <input type="text" id="text" name="firstName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Surname:</label>
                        <input type="text" id="text" name="lastName" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <a href="login.php">Back To Login</a> <br>
                    <br><button type="submit" class="btn btn-primary ">Registe Account</button><br>
                </form>
            </div>
        </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
    
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('register_failed')) {
            const alertMessage = document.getElementById('alertMessage');
            alertMessage.classList.remove('d-none');
            }
        </script>
        
    </html>