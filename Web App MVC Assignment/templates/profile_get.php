<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>โปร์ไฟล์</title>
</head>
<body>
    <div class="container my-5">
        <section class="mb-4">
            <table class="table table-striped table-bordered table-hover display compact" id="coursesTable">
                <h2>ช้อมูลนักเรียน</h2>
                <tr>
                    <th>ชื่อ</th>
                    <td><?= $data['result']['first_name'] ?></td>
                </tr>
                <tr>
                    <th>นามสกุล</th>
                    <td><?= $data['result']['last_name'] ?></td>
                </tr>
                <tr>
                    <th>วันเกิด</th>
                    <td><?= $data['result']['date_of_birth'] ?></td>
                </tr>
                <tr>
                    <th>เบอร์โทรศัพท์</th>
                    <td><?= $data['result']['phone_number'] ?></td>
                </tr>
            </table>
        </section>
    </div>

        <section>
            <div class="table2-responsive">
                <h2>วิชาที่ลงทะเบียนเรียน</h2>
                <table class="table table-striped table-bordered table-hover display compact" id="coursesTable">
                    <thead>
                        <tr>
                            <th>รหัสวิชา</th>
                            <th>ชื่อวิชา</th>
                            <th>อาจารย์ผู้สอน</th>
                            <th>วันที่ลงทะเบียน</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['enrollments'] as $enrollment): ?>
                            <tr>
                                <td><?= $enrollment['course_code'] ?></td>
                                <td><?= $enrollment['course_name'] ?></td>
                                <td><?= $enrollment['instructor'] ?></td>
                                <td><?= $enrollment['enrollment_date'] ?></td>
                                <td>
                                    <form action="/withdrawSubject" method="POST">
                                        <input type="hidden" name="student_id" value="<?= $data['result']['student_id'] ?>">
                                        <input type="hidden" name="course_id" value="<?= $enrollment['course_id'] ?>">
                                        <button type="submit" class="btn btn-danger">ถอนรายวิชา</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>

    <script>
        function confirmSubmission() {
            return confirm("Are you sure you want to delete?");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        
</body>
</html>

<style>
        table {
            width: 50%; 
            margin: 0 auto; 
        }

         .table-striped {
            max-width: 580px; 
            margin: 0 auto;
        } 
        .table2-responsive{
            max-width: 770px; 
            margin: 0 auto;
        }
        .btn-danger {
            width: 20vh;
            margin: 0 auto;
        }
    </style>
