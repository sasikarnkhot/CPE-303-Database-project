<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลพนักงาน
$sql_employees = "SELECT Emp_ID, Emp_Firstname, Emp_Lastname, Emp_Mail, Emp_Tel, Position_ID, Years_of_experience, Vet_Specialization, Salary FROM employees";
$result_employees = $conn->query($sql_employees);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>YAJOK</title>
  <link rel = "icon" href = "./images/YAJOK.png" type = "image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="site-wrap">
    <div class="site-navbar py-2">
      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="ค้นหา...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="home.php" class="js-logo-clone"><img src="./images/YAJOK.png" style="width:150px;height:80px;"></a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="searcher.php">Search</a></li>
                <li><a href="insert_employee.php">Add Employees</a></li>
                <li><a href="delete_employee.php">Delete Employees</a></li>
                <li><a href="schedule.php">Update Schedule</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
    

    <div class="container">
      <h2>Employee List</h2>

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

        <?php if ($result_employees && $result_employees->num_rows > 0) { ?>
          <?php while($row = $result_employees->fetch_assoc()) { ?>
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


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>คลินิกสัตว์เลี้ยงยาจกทุ่มเทใส่ใจกับทุกการรักษาให้มีประสิทธิภาพสูงสุด และเป็นไปตามหลักสากล...</p>
            </div>
          </div>

          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">สินค้า</h3>
            <ul class="list-unstyled">
              <li><a href="#">ศูนย์หัวใจและหลอดเลือด</a></li>
              <li><a href="#">ศูนย์โรคผิวหนังและภูมิแพ้</a></li>
              <li><a href="#">ศูนย์สัตว์เลี้ยงสูงวัย</a></li>
              <li><a href="#">ศูนย์โรคอายุรกรรม</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">1771/1 ถ. พัฒนาการ แขวงสวนหลวง เขตสวนหลวง กรุงเทพมหานคร 10250</li>
                <li class="phone"><a href="tel://23923929210">+66 123-456-789</a></li>
                <li class="email">yajok@domain.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

</body>

</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
