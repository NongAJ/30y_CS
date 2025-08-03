<?php
$host = "localhost";
$user = "root";
$pass = "Armop119_";
$db = "30yCS_shop";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

$sql = "SELECT * FROM products ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>รายการสินค้า</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      padding: 30px;
      background-color: #fdfdfd;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: center;
    }
    th {
      background-color: #2980b9;
      color: white;
    }
    img {
      width: 80px;
      height: auto;
    }
    h2 {
      text-align: center;
      color: #2c3e50;
    }
  </style>
</head>
<body>

<h2>รายการสินค้าทั้งหมด</h2>

<table>
  <tr>
    <th>ลำดับ</th>
    <th>ประเภทสินค้า</th>
    <th>สี</th>
    <th>ขนาด</th>
    <th>ราคา</th>
    <th>รูปภาพ</th>
    <th>วันที่เพิ่ม</th>
  </tr>
  <?php
  if ($result->num_rows > 0) {
    $i = 1;
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $i++ . "</td>";
      echo "<td>" . $row['product_type'] . "</td>";
      echo "<td>" . $row['color'] . "</td>";
      echo "<td>" . $row['size'] . "</td>";
      echo "<td>" . number_format($row['price'], 2) . " บาท</td>";
      echo "<td><img src='" . $row['image'] . "' alt='รูปสินค้า'></td>";
      echo "<td>" . $row['created_at'] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='7'>ไม่มีข้อมูลสินค้า</td></tr>";
  }
  $conn->close();
  ?>
</table>

</body>
</html>
