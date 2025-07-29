<?php
$id = $_GET['id'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';


if (empty($password) || empty($confirm_password)) {
    // badRequest("All fields are required");
}

if ($password != $confirm_password) {
    // badRequest("Password not the same");
}   

// changePassword($id, $password);

renderView('students_get');