<?php
include "/xampp/htdocs/web_app_1_assignment_4/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $prefix = $_POST['prefix'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname']; 
    $year = $_POST['year']; 
    $gpa = $_POST['gpa']; 
    $birthday = $_POST['birthday']; 

    
    $sql = 'UPDATE students SET prefix = ?, fname = ?, lname = ?, year = ?, gpa = ?, birthday = ? WHERE student_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssidss', $prefix, $fname, $lname, $year, $gpa, $birthday, $student_id);

    if ($stmt->execute()) {
        header("Location: index.php");
        echo 'อัปเดตข้อมูลสำเร็จ';
    } else {
        echo 'อัปเดตข้อมูลล้มเหลว: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>