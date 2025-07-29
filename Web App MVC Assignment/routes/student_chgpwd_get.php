<?php

declare(strict_types=1);

if (!isset($_GET['id'])) {
    header('Location: /students');
    exit;
} else {
    $id = (int)$_GET['id'];
    $res = getStudentById($id);
    if ($res) {
        renderView('students_chgpwd_get', array('result' => $res));
    } else {
        // badRequest(message: 'Something went wrong! on query student');
    }
}