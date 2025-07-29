้<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            background-image: url('https://www.vecteezy.com/photo/5735561-grand-peoples-study-house-in-the-north-korean-capital-pyongyang.jpg');
            
        }
    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <body class="bg-light">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card p-4" style="width: 100%; max-width: 400px;">
                <h3 class="text-center mb-4">Login</h3>

            <div id="alertMessage" class="alert alert-danger d-none" role="alert">
                Login Failed: Invalid Email or Password.
                </div>
                
                <form action="/login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email (อีเมล)</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password (รหัสผ่าน)</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
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
    if (isset($_SESSION['message'])): ?>        
    <?= $_SESSION['message'] ?>
    <?php unset($_SESSION['message']); ?> 
    <?php endif; ?>
