<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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


// Lấy sản phẩm từ database dựa trên tên sản phẩm tìm kiếm
if (isset($_POST['sp'])) {
    $searchTerm = $_POST['sp'];

    // Câu truy vấn SQL
    $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    // Hiển thị kết quả
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<span class=' p-20'>" . $row['TENSP'] . "</span><br>";
        }
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
}

// Đóng kết nối
$conn->close();


?>