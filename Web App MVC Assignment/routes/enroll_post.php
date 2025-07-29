<?php
    $courseId = $_POST['course_id'];
    $studentId = $_POST['student_id'];
    $enrollment_date = $_POST['enrollment_date'];
         
    if (checkEnrollment($studentId, $courseId)){
        $_SESSION['messageEnroll'] = "เคยลงวิชานี้เเล้ว!";
        $data['courses'] = getCourses(); 
        renderView('courses_get', $data);
    }
    else {
        enrollInCourse($studentId, $courseId,$enrollment_date);
        $_SESSION['messageEnroll'] = "ลงทะเบียนสำเร็จ!";

        $result = getStudentById($_SESSION['student_id']);
        $enrollments = getStudentEnrollmentByStudentId($_SESSION['student_id']);
        renderView('profile_get',['result' => $result, 'enrollments' => $enrollments]);
    }
?>
    
