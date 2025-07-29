<?php

declare(strict_types=1);

$name = $_POST['name'] ?? '';
$code = $_POST['code'] ?? '';
$instructor = $_POST['instructor'] ?? '';

if (empty($name) || empty($code) || empty($instructor)) {
    // badRequest("All fields are required");
}

$course = array('name' => $name, 'code' => $code, 'instructor' => $instructor);
$res = insertCourse($course);

if ($res) { 
    // Add a success message before rendering the view
    $_SESSION['message'] = 'Course added successfully!';   
    renderView('courses_new_get');
} else {
    // badRequest(message: 'Something went wrong! on insert course');
}