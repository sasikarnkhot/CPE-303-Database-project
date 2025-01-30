<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าตารางและ search_term จากการร้องขอ
$table_type = isset($_GET['table_type']) ? $_GET['table_type'] : 'employees';
$search_term = isset($_GET['search_term']) ? trim($_GET['search_term']) : ''; // รับค่าค้นหาจากฟอร์ม

$data = [];

// ฟังก์ชันสำหรับดึงข้อมูลพนักงาน
function getEmployees($conn, $search_term = null) {
    // กำหนดคำสั่ง SQL เบื้องต้น
    $sql = "SELECT Emp_ID, Emp_Firstname, Emp_Lastname, Emp_Mail, Emp_Tel, Position_ID, Years_of_experience, Vet_Specialization, Salary FROM employees";
  
    // ตรวจสอบว่ามีการค้นหาหรือไม่
    if ($search_term) {
        // ค้นหาตาม Emp_ID
        $sql .= " WHERE Emp_ID = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        // Bind ตัวแปร $search_term ที่เป็นค่า Emp_ID (ต้องเป็นประเภท integer)
        $stmt->bind_param("i", $search_term);
    } else {
        // ถ้าไม่มีการค้นหา เตรียม statement โดยใช้ SQL พื้นฐาน
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
    }
  
    // Execute คำสั่ง SQL
    $stmt->execute();
  
    // ดึงผลลัพธ์จาก statement และแปลงผลลัพธ์เป็น associative array
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// ตรวจสอบประเภทข้อมูลที่เลือกและดึงข้อมูล
if ($table_type == 'employees') {
    $data = getEmployees($conn, $search_term);
} 

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    
    <title>ข้อมูลพนักงาน</title>
    <link rel="icon" href="./images/YAJOK.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f7fa; color: #333; }
        .container { width: 80%; margin: 50px auto; }
        h1 { text-align: center; color: #007bff; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        .form-container { text-align: center; margin-bottom: 20px; }
    </style>

    <script>
        // ฟังก์ชันสำหรับรีเซ็ตช่องค้นหาเมื่อเปลี่ยนประเภทข้อมูล
        function resetSearchField() {
            document.getElementById('search_term').value = '';
        }
    </script>
</head>
<body>
<div class="site-wrap">

    <div class="container">
        <h1>ค้นหาตาราง</h1>
        
        <!-- ฟอร์มเพื่อเลือกประเภทตาราง -->
        <div class="form-container">
            <form action="" method="get">
                <label for="table_type">เลือกประเภทข้อมูล:</label>
                <select name="table_type" id="table_type" onchange="resetSearchField(); this.form.submit();">
                    <option value="employees" <?php if ($table_type == 'employees') echo 'selected'; ?>>ข้อมูลพนักงาน</option>
                </select>
                <input type="text" name="search_term" id="search_term" placeholder="ใส่รหัสพนักงาน" value="<?php echo htmlspecialchars($search_term); ?>">
                <input type="submit" value="ค้นหา">
            </form>
        </div>

        <!-- ตารางแสดงข้อมูลพนักงาน -->
        <table>
            <tr>
                <th>ID</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>อีเมล</th>
                <th>เบอร์โทร</th>
                <th>ตำแหน่ง</th>
                <th>ประสบการณ์ (ปี)</th>
                <th>สาขาเฉพาะทาง</th>
                <th>เงินเดือน</th>
            </tr>

            <?php if (!empty($data)) { ?>
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Emp_ID']); ?></td>
                        <td><?php echo htmlspecialchars($row['Emp_Firstname']); ?></td>
                        <td><?php echo htmlspecialchars($row['Emp_Lastname']); ?></td>
                        <td><?php echo htmlspecialchars($row['Emp_Mail']); ?></td>
                        <td><?php echo htmlspecialchars($row['Emp_Tel']); ?></td>
                        <td><?php echo htmlspecialchars($row['Position_ID']); ?></td>
                        <td><?php echo htmlspecialchars($row['Years_of_experience']); ?></td>
                        <td><?php echo htmlspecialchars($row['Vet_Specialization']); ?></td>
                        <td><?php echo number_format($row['Salary'], 2); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="9">ไม่พบข้อมูล</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>คลินิกสัตว์เลี้ยงยาจกทุ่มเทใส่ใจกับทุกการรักษาให้มีประสิทธิภาพสูงสุด และเป็นไปตามหลักสากล เครื่องมือทางการแพทย์มีความทันสมัย สามารถวินิจฉัยได้อย่างละเอียดและแม่นยำ</p>
          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">สินค้า</h3>
            <ul class="list-unstyled">
              <li><a href="#">ศูนย์หัวใจและหลอดเลือด</a></li>
              <li><a href="#">ศูนย์โรคผิวหนังและภูมิแพ้</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-3">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <ul class="list-unstyled">
              <li class="address">1771/1 ถ. พัฒนาการ แขวงสวนหลวง เขตสวนหลวง กรุงเทพมหานคร 10250</li>
              <li class="phone"><a href="tel://23923929210">+66 123-456-789</a></li>
              <li class="email">yajok@domain.com</li>
            </ul>
          </div>
        </div>
      </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
