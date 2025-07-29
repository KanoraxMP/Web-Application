<?php
session_start();

include "/xampp/htdocs/web_app_1_assignment_4/database.php";

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $sql = 'SELECT * FROM students WHERE student_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลนิสิต</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">แก้ไขข้อมูลนักศึกษา</h1>

        <div class="container d-flex justify-content-center align-items-center" style="height: 800px;">
            <div class="card p-4" style="width: 200vh; max-width: 200vh;">
                <form action="update_data.php" class="mt-4" method="post">
                    <input type="hidden" name="student_id" value="<?= $student['student_id'] ?>">
                    <div class="mb-3">
                        <label for="prefix" class="form-label">คำนำหน้า (Prefix)</label>
                        <select class="form-select" name="prefix" required>
                            <option value="นาย" <?= $student['prefix'] == 'นาย' ? 'selected' : '' ?>>นาย</option>
                            <option value="นางสาว" <?= $student['prefix'] == 'นางสาว' ? 'selected' : '' ?>>นางสาว</option>
                            <option value="นาง" <?= $student['prefix'] == 'นาง' ? 'selected' : '' ?>>นาง</option>
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="fname" class="form-label">ชื่อ (Name)</label>
                        <input type="text" class="form-control" name="fname" value="<?= $student['fname'] ?>" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="lname" class="form-label">นามสกุล (Surname)</label>
                        <input type="text" class="form-control" name="lname" value="<?= $student['lname'] ?>" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="year" class="form-label">ชั้นปี (Year)</label>
                        <select class="form-select" name="year" required>
                            <?php for ($i = 1; $i <= 4; $i++): ?>
                                <option value="<?= $i ?>" <?= $student['year'] == $i ? 'selected' : '' ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="gpa" class="form-label">เกรดเฉลี่ย (GPAX)</label>
                        <input type="number" step="0.01" class="form-control" name="gpa" value="<?= $student['gpa'] ?>" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="birthday" class="form-label">วันเกิด (Birthday)</label>
                        <input type="date" class="form-control" name="birthday" value="<?= $student['birthday'] ?>" required>
                    </div>
        
                    <button type="submit" class="btn btn-primary">บันทึกการแก้ไขข้อมูล</button>
                    <a href="index.php" class="btn btn-secondary">กลับไปหน้าแรก</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>