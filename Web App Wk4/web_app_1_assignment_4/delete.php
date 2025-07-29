<?php
include "/xampp/htdocs/web_app_1_assignment_4/database.php";

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $sql = "DELETE FROM students WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_id);

    if ($stmt->execute()) {
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาดในการลบข้อมูล: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // กลับไปหน้าหลัก
    header("Location: index.php");
    exit();
} else {
    echo "ไม่มีรหัสนักศึกษาที่ต้องการจะลบ";
}
?>