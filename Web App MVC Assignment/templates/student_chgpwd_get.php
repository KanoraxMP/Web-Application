<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4" style="width: 100%; max-width: 400px;">
            <section>
                <h1>Change Password</h1>
                <?php
                if (isset($data['result'])) {
                    $row = $data['result']->fetch_object();
                ?>
                    <label for="first_name"><?= $row->first_name ?></label> <label for="last_name"><?= $row->last_name ?></label><br>
                    <form action="students_chgpwd?id=<?= $row->student_id ?>" method="post">
                        <label for="password">Password</label><br>
                        <input type="password" name="password"><br>
                        <label for="confirmpassword">Confirm Password</label><br>
                        <input type="password" name="confirm_password"><br>
                        <button type="submit">Change Password</button>
                    </form>
                <?php
                } 
                ?>
            </section>
        </div>
    </div>
</body>
</html>
