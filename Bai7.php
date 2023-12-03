<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 6</title>
</head>
<body>
    <br>
    <form method="GET">
        <div>
            <label>Tên công ty:</label>
            <select name="tenct" id="tenct">
                <?php
                include "connect.php";
                $query = "SELECT * FROM CONGTY";
                $result = $connect->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["MaCongTy"] . '">' . $row["TenCongTy"] . '</option>';
                }
                $connect->close();
                ?>
            </select>
        </div>
        <br>
        <div>
            <label for="tencn">Tên chi nhánh</label>
            <select name="tencn" id="tencn">
                <?php
                include "connect.php";
                $query = "SELECT * FROM CHINHANH";
                $result = $connect->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["MaChiNhanh"] . '">' . $row["TenChiNhanh"] . '</option>';
                }
                $connect->close();
                ?>
            </select>
        </div>
        <div class="btn-block">
            <button type="submit">Liệt kê</button>
        </div>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include "connect.php";

    $tencongty = $_GET['tenct'];
    $machinhanh = $_GET['tencn'];
    $query = "SELECT TenPhong FROM PHONGBAN pb JOIN CHINHANH cn ON pb.MaChiNhanh=cn.MaChiNhanh JOIN CONGTY ct ON ct.MaCongTy=cn.MaCongTy WHERE pb.MaChiNhanh='$machinhanh' AND ct.MaCongTy='$tencongty'";

    $result = $connect->query($query);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["TenPhong"] . "<br>";
            }
        } else {
            echo "No departments found.";
        }
    } else {
        echo "Lỗi: " . $connect->error;
    }

    $connect->close();
}
?>