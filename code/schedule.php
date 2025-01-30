<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // ตรวจสอบว่าข้อมูลไม่ว่าง
    if (!empty($start_time) && !empty($end_time)) {
        // อัปเดตเวลาทั้งหมดในตาราง Work_Schedule
        $sql = "UPDATE Work_Schedule SET Start_Time = '$start_time', End_Time = '$end_time'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Work schedule updated successfully</p>";
        } else {
            echo "<p>Error updating schedule: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Please fill in both start and end times.</p>";
    }
}

// Query to get the work schedule
$sql = "SELECT Work_ID, Emp_ID, Work_Date, Start_Time, End_Time FROM Work_Schedule";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>YAJOK</title>
  <link rel="icon" href="./images/YAJOK.png" type="image/png">
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
                <li><a href="#">Update Schedule</a></li>
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
      <h2>Work Schedule</h2>

      <!-- ฟอร์มสำหรับกรอกเวลา -->
      <form action="" method="post">
          <label for="start_time">Start Time:</label>
          <input type="time" id="start_time" name="start_time" required><br><br>

          <label for="end_time">End Time:</label>
          <input type="time" id="end_time" name="end_time" required><br><br>

          <input type="submit" value="Update Schedule">
      </form>

      <!-- Displaying the Work Schedule Table -->
      <?php
      if ($result->num_rows > 0) {
          echo "<table border='1'>
                  <tr>
                      <th>Emp_ID</th>
                      <th>Work_Date</th>
                      <th>Start_Time</th>
                      <th>End_Time</th>
                  </tr>";
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>" . $row['Emp_ID'] . "</td>
                      <td>" . $row['Work_Date'] . "</td>
                      <td>" . $row['Start_Time'] . "</td>
                      <td>" . $row['End_Time'] . "</td>
                    </tr>";
          }
          echo "</table>";
      } else {
          echo "<p>No records found</p>";
      }
      ?>

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
