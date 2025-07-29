<?php
$courses = $data['courses'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ลงทะเบียนเรียน</title>
</head>
<body>
    <div class="container">
        <h2>รายวิชาที่เปิดให้ลงทะเบียน</h2>  
        <?php if (isset($_SESSION['messageEnroll'])): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= $_SESSION['messageEnroll'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['messageEnroll']); ?> 
        <?php endif; ?>

        <div class="table-responsive" style="width: 600px; border-radius: 10px; padding: 10px;">
            <table class="table table-striped table-bordered table-hover display compact" id="coursesTable">
                <thead>
                    <tr>
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        <th>อาจารย์ผู้สอน</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><?= $course['course_code'] ?></td>
                            <td><?= $course['course_name'] ?></td>
                            <td><?= $course['instructor'] ?></td>
                            <td>
                                <form action="/enroll" method="post">
                                    <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                                    <input type="hidden" name="student_id" value="<?= $_SESSION['student_id'] ?>">
                                    <input type="hidden" name="enrollment_date" value="<?= date('Y-m-d') ?>">
                                    
                                    <button type="submit" class="btn btn-succes">ลงทะเบียน</button> 
                                </form>
            
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmSubmission() {
            return confirm("คุณต้องการลงทะเบียนหรือไม่?");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
