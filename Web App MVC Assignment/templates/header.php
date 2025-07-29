<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header class="bg-dark p-2">
        <div class="p-2 d-flex justify-content-between align-items-center">
            <h1 class="text-left text-light">ระบบลงทะเบียนเรียน</h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="/">หน้าแรก</a>
                        </li>
                        <?php
                        if (isset($_SESSION['timestamp'])) {
                        ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="/profile">ข้อมูลนักเรียน</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="/courses">รายวิชา</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="/logout">ออกจากระบบ</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link btn btn-primary text-light" href="/login">เข้าสู่ระบบ</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>
