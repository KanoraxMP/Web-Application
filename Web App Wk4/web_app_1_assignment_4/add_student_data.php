<?php
session_start();

include "/xampp/htdocs/web_app_1_assignment_4/database.php";
$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $prefix = $_POST['prefix'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname']; 
    $year = $_POST['year']; 
    $gpa = $_POST['gpa']; 
    $birthday = $_POST['birthday']; 

    try {
        $check_sql = "SELECT student_id FROM students WHERE student_id = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $student_id);
        $check_stmt->execute();
        $check_stmt->store_result();
        if ($check_stmt->num_rows > 0) {
            $message = "รหัสนักศึกษานี้ถูกใช้แล้ว! โปรดใช้รหัสอื่นแทน";
        } else {

            $sql = 'INSERT INTO students(student_id, prefix, fname, lname, year, gpa, birthday) VALUES (?, ?, ?, ?, ?, ?, ?)';
            $stmt = $conn->prepare($sql)    ;
            $stmt->bind_param('ssssids', $student_id, $prefix, $fname, $lname, $year, $gpa, $birthday);

            if ($stmt->execute()) {
                header("Location: index.php");
                exit();
            } else {
                $message = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . $stmt->error;
            }
            $stmt->close();
        }

        $check_stmt->close();
    } catch (mysqli_sql_exception $e) {
        $message = "ข้อมูลซ้ำ: " . $e->getMessage();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนักศึกษา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">เพิ่มข้อมูลนักศึกษา</h1>
        <?php if (!empty($message)): ?>
            <div class="alert alert-danger"><?= $message ?></div>
        <?php endif; ?>

        <div class="container d-flex justify-content-center align-items-center" style="height: 800px;">
            <div class="card p-4" style="width: 200vh; max-width: 200vh;">
                <form action="add_student_data.php" class="mt-4" method="post">
                    <div class="mb-3"> 
                        <label for="student_id" class="form-label">รหัสนักศึกษา (Student)</label>
                        <input type="text" name="student_id" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="prefix" class="form-label">คำนำหน้า (Prefix)</label>
                        <select class="form-select" name="prefix" required>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="fname" class="form-label">ชื่อ (Name)</label>
                        <input type="text" class="form-control" name="fname" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="lname" class="form-label">นามสกุล (Surname)</label>
                        <input type="text" class="form-control" name="lname" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="year" class="form-label">ชั้นปี (Year)</label>
                        <select class="form-select" name="year" required>
                            <?php for ($i = 1; $i <= 4; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="gpa" class="form-label">เกรดเฉลี่ย (GPAX)</label>
                        <input type="number" step="0.01" class="form-control" name="gpa" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="birthday" class="form-label">วันเกิด (Birthday)</label>
                        <input type="date" class="form-control" name="birthday">
                    </div>
        
                    <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
                    <a href="index.php" class="btn btn-secondary">กลับไปหน้าแรก</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>