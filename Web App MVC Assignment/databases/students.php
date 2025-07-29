<?php

function getStudents(): mysqli_result|bool {
    $conn = getConnection();
    $sql = 'select * from students';
    $result = $conn->query($sql);
    return $result;
}

function getStudentById(int $id): array|bool {
    $conn = getConnection();
    $sql = 'select * from students where student_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }
    return $result->fetch_assoc();
}

function insertEnrollment(int $id): bool {
    $conn = getConnection();
    $sql = 'delete from students where student_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    try {
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}

function deleteSubjectById(int $id ,$course_id): bool {
    $conn = getConnection();
    $sql = 'delete from enrollment where student_id = ? and course_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $id,$course_id);
    try {
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}