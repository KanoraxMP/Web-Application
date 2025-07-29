<?php

include "database.php";

$lname = '%'.'M'.'%';
$sql = 'select * from employees where lastName = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $lname);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <?= $row['firstName'] ?> <?= $row['lastName'] ?> <br>
<?php
    }
}