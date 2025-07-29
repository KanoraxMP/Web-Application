<?php

function getCourses(): mysqli_result|bool {
    $conn = getConnection();
    $sql = 'select * from courses';
    $result = $conn->query($sql);
    return $result;
}

function insertCourse($course): bool {
    $conn = getConnection();
    $sql = 'insert into courses (course_name, course_code, instructor) VALUES (?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss',$course['name'], $course['code'], $course['instructor']);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}
