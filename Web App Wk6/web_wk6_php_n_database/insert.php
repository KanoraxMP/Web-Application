<?php
include "database.php";
$productLine = $_POST['productLine'];
$textDescription = $_POST['textDescription'];
$htmlDescription = $_POST['htmlDescription'];
$image = $_POST['image'];

$sql  = 'INSERT INTO productlines(productLine, textDescription, htmlDescription, image) VALUES (?,?,?,?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssb', $productLine, $textDescription, $htmlDescription, $image);
$stmt->execute();

if ($stmt->affected_rows > 0){
    echo 'Insert completed';
}
else{
    echo 'Insert failed';
}
?>