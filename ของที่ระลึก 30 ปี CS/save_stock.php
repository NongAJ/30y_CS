<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$host = "localhost";
$user = "root";
$pass = "Armop119_";
$db = "30yCS_shop";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$product_type = $_POST['product_type'];
$color = $_POST['color'];
$size = $_POST['size'];
$price = $_POST['price'];

// จัดการรูปภาพ
$imageName = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name'];
$targetDir = "uploads/";
$imagePath = $targetDir . basename($imageName);
move_uploaded_file($imageTmp, $imagePath);

// บันทึกข้อมูล
$sql = "INSERT INTO products (product_type, color, size, price, image)
        VALUES ('$product_type', '$color', '$size', '$price', '$imagePath')";

if ($conn->query($sql) === TRUE) {
  echo "บันทึกสำเร็จ <br><a href='products_list.php'>ดูรายการสินค้า</a>";
} else {
  echo "เกิดข้อผิดพลาด: " . $conn->error;
}

$conn->close();
?>
