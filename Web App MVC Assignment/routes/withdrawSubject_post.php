<?php
    declare(strict_types=1);
         
    if (!isset($_POST['student_id'] )) {
        renderView('profile_get');
        exit;
    }

    else {
        $course_id = $_POST['course_id'];
        $id = (int)$_POST['student_id']; 
        $res = deleteSubjectById($id,$course_id);
        if($res) {
        $result = getStudentById($_SESSION['student_id']);
        $enrollments = getStudentEnrollmentByStudentId($_SESSION['student_id']);
        renderView('profile_get',['result' => $result, 'enrollments' => $enrollments]);
        }
        else {
            // badRequest(message: 'Something went wrong! on delete student');
        }
    }
    
?>