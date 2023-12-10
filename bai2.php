<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBName = "qlsp";

$conn = mysqli_connect($servername, $username, $password, $DBName);

mysqli_set_charset($conn, "utf8");

if (isset($_POST['sp'])) {
    $sp = $_POST['sp'];
    if ($sp == "all") {
        $strSQL = "Select dvt,tensp,gia,hinhanh from sanpham";
        $result = mysqli_query($conn, $strSQL);
    } else {
        $strSQL = "Select  dvt,tensp,gia,hinhanh from sanpham where loaisp ='" . $sp . "'";
        $result = mysqli_query($conn, $strSQL);
    }
}
?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
<style>
    .container {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
    }
    .container > div {
        margin-right: 10px;
    }
</style>
<?php
if (isset($result)) {
    if ($result->num_rows > 0) {
        echo "<div class='container'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<img src='" . $row['hinhanh'] . "' alt='pic' width='250' height='250' style='margin-bottom:10px'>";
                echo "<br>";
                echo "<i>";
                echo $row['tensp'] . "<br>";
                echo "Đơn vị tính:";
                echo $row['dvt'] . "<br>";            
                echo "Giá: ";
                echo $row['gia'] . " đ <br>Số lượng: ";
                echo "<input type='number' name='' id='' min='0' max='10' step='1' value='0'>";
                echo "<button type='submit'>Chọn mua</button>";
                echo "</i>";
                echo "</div>";
            }
    echo "</div>";
    } else {
        echo "<tr><td colspan='3'>No products found</td></tr>";
    }
}
?>
