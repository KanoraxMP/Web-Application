<?php 
session_start();
include "database.php";

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
$num_students = $result->num_rows;



$sql = "SELECT student_id, prefix, fname, lname, year, gpa, birthday FROM students";
$result = $conn->query($sql);
$num_students = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายชื่อนักศึกษา</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
        thead {
            background-color: #007bff;
            color: white;
        }
        .btn-logout {
            background-color:rgb(240, 116, 8); 
            color: white; 
            border: none;
        }
        .btn-logout:hover {
            background-color:rgb(240, 116, 8);
            color: white;
        }
    </style>
    <div class="container mt-4">
        <h1 class="text-center">รายชื่อนักศึกษา</h1> <br>
        <div class="d-flex justify-content-end mb-3">
            <a href="login.php" class="btn btn-logout">Logout</a>
        </div> <br>
        <div class="d-flex justify-content-end mb-3">
            <a href="add_student_data.php" class="btn btn-primary">เพิ่มข้อมูลนักศึกษา</a>
        </div> <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>รหัสนักศึกษา (Student ID)</th>
                    <th>คำนำหน้า (Prefix)</th>
                    <th>ชื่อ (First Name)</th>
                    <th>นามสกุล (Last Name)</th>
                    <th>ชั้นปี (Year)</th>
                    <th>เกรดเฉลี่ย (GPA)</th>
                    <th>วันเกิด (Birthday)</th>
                    <th>การจัดการ (Management)</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($num_students > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['student_id']) ?></td>
                        <td><?= htmlspecialchars($row['prefix']) ?></td>
                        <td><?= htmlspecialchars($row['fname']) ?></td>
                        <td><?= htmlspecialchars($row['lname']) ?></td>
                        <td><?= htmlspecialchars($row['year']) ?></td>
                        <td><?= htmlspecialchars($row['gpa']) ?></td>
                        <td><?= htmlspecialchars($row['birthday']) ?></td>
                        <td>
                            <a href="edit_data_student.php?student_id=<?= $row['student_id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                            <a href="delete.php?id=<?= $row['student_id'] ?>" class="btn btn-danger btn-sm">ลบข้อมูล</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">ไม่มีข้อมูลนักศึกษา</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
