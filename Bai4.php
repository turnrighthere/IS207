<!DOCTYPE html>
<html>

<head>
  <title>Thêm nhân viên</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <style>
    html,
    body {
      min-height: 100%;
    }

    body,
    div,
    form,
    input,
    select,
    textarea,
    label {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
    }

    h2 {
      text-align: center;
    }

    .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      max-width: 300px;
      margin: 0 auto;
    }

    form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px #cc7a00;
    }

    .item {
      position: relative;
      margin: 10px 0;
    }

    label {
      margin-bottom: 5px;
    }

    input,
    select {
      width: 100%;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .question {
      margin-top: 10px;
    }

    .question-answer label {
      display: block;
    }

    .btn-block {
      margin-top: 10px;
      text-align: center;
    }

    button {
      padding: 10px;
      border: none;
      border-radius: 5px;
      background: #cc7a00;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
    }

    button:hover {
      background: #ff9800;
    }
  </style>
</head>

<body>
  <div class="testbox">
    <form method="GET">
      <h2>Thêm nhân viên</h2>
      <div class="item">
        <label for="branch">Tên chi nhánh</label>
        <select id="branch" name="branch">
          <!-- Options for branch names populated from the database -->
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
      <div class="item">
        <label for="department">Tên phòng ban</label>
        <select id="department" name="department">
          <!-- Options for department names populated from the database -->
          <?php
          include "connect.php";
          $query = "SELECT * FROM PHONGBAN";
          $result = $connect->query($query);
          while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["MaPhong"] . '">' . $row["TenPhong"] . '</option>';
          }
          $connect->close();
          ?>
        </select>
      </div>
      <div class="item">
        <label for="employeeId">Mã nhân viên</label>
        <input id="employeeId" type="text" name="employeeId" required />
      </div>
      <div class="item">
        <label for="employeeName">Tên nhân viên</label>
        <input id="employeeName" type="text" name="employeeName" required />
      </div>
      <div class="item">
        <label for="salary">Lương</label>
        <input id="salary" type="number" name="salary" required />
      </div>
      <div class="">
        <label for="gender">Giới tính</label>
        <div class="">
        <div block>
          Nam<input type="radio" value="Nam" name="gender" required />
        </div>
        <div>
          Nữ<input type="radio" value="Nữ" name="gender" required />
        </div>  
        </div>
      </div>
      <div class="btn-block">
        <button type="submit">Thêm</button>
        <button type="Reset">Reset</button>
      </div>
    </form>
  </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  include "connect.php";
  
  $department = $_GET["department"];
  $employeeId = $_GET["employeeId"];
  $employeeName = $_GET["employeeName"];
  $salary = $_GET["salary"];
  $gender = $_GET["gender"];
  
  $query = "INSERT INTO NHANVIEN ( MaNhanVien, TenNhanVien, LuongThang, GioiTinh,MaPhong) VALUES ( '$employeeId', '$employeeName','$salary' ,'$gender' , '$department')";
  
  if ($connect->query($query) === TRUE) {
    echo "Thêm nhân viên thành công";
  } else {
    echo "Lỗi: " . $connect->error;
  }
  
  $connect->close();
}
?>