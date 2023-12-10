<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBName = "qlsp";

$conn = mysqli_connect($servername, $username, $password, $DBName);

mysqli_set_charset($conn, "utf8");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$masp = $_POST['masp'];
$tensp = $_POST['tensp'];
$nuocsx = $_POST['nuocsx'];
$dvt = $_POST['dvt'];
$gia = $_POST['gia'];
$lsp = $_POST['lsp'];
$hinhanh = $_POST['hinhanh'];

// SQL query to insert data into the table
$sql = "INSERT INTO sanpham (masp, tensp, dvt, nuocsx, gia, hinhanh, loaisp)
        VALUES ('$masp', '$tensp', '$dvt','$nuocsx' , '$gia', '$hinhanh', '$lsp')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>