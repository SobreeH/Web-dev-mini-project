<?php
include 'db.php';

$dbname = "bookmarker";
if ($conn->select_db($dbname)) {
    echo "Database " . $dbname . " selected successfully! <br>";
} else {
    echo "Error selecting database: " . $conn->error;
}

// รับ book_id จาก request
$book_id = $_REQUEST['book_id'];

// คำสั่งลบ
$sql = "DELETE FROM books WHERE book_id='$book_id'";
if ($conn->query($sql) === TRUE) {
    // ลบเสร็จแล้วแสดงตารางหนังสืออีกครั้ง
    header("Location:showbook_admin.php");   // <-- ใช้ไฟล์ที่แสดงรายการหนังสือของคุณ
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
