<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูล
$sql_treatment = "SELECT Treat_ID, Pet_ID, Emp_ID, Treat_Startdate, Treat_Enddate, clinical_Sing, Physical_Examination, Laborary_Test, Diagnosis, Therapentic_plan, Heart_rate, Temperature FROM treatment";
$result_treatment = $conn->query($sql_treatment);
//ดึงยา
$sql_medication = "SELECT Drug_ID, Drug_Type, Drug_Name, Drug_Price, Drug_Quantity, Drug_Exp FROM medication";
$result_medication = $conn->query($sql_medication);
//ดึงapp
$sql_app = "SELECT App_ID , Treat_ID, App_detail, App_Date, App_time FROM appointment";
$result_app = $conn->query($sql_app);
//ดึงfollow
// ตรวจสอบว่าตารางที่ต้องการดึงข้อมูลคือ "follow_up" (หรือชื่ออื่นที่ถูกต้องที่มีคอลัมน์ Follow_ID)
$sql_follow = "SELECT Follow_ID, CUS_ID, Treat_ID, Follow_Date, Follow_Status, Follow_Notes FROM follow_up";
$result_follow = $conn->query($sql_follow);

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
                <li><a href="treatment.php">Add Treatment</a></li>
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
      <h2>Treatment</h2>

      <!-- ตารางแสดงข้อมูลพนักงาน -->
      <table>
        <tr>
          <th>ID</th>
          <th>Pet</th>
          <th>แพทย์</th>
          <th>Treat_Startdate</th>
          <th>Treat_Enddate</th>
          <th>Clinical_Sing</th>
          <th>Physical_Examination </th>
          <th>Laboratory_Test</th>
          <th>Diagnosis</th>
          <th>Therapentic_plan</th>
          <th>Heart_Rate</th>
          <th>Temperature</th>
        </tr>

        <?php if ($result_treatment && $result_treatment->num_rows > 0) { ?>
          <?php while($row = $result_treatment->fetch_assoc()) { ?>
            <tr>
              <td><?php echo htmlspecialchars($row['Treat_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['Pet_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['Emp_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['Treat_Startdate']); ?></td>
              <td><?php echo htmlspecialchars($row['Treat_Enddate']); ?></td>
              <td><?php echo htmlspecialchars($row['clinical_Sing']); ?></td>
              <td><?php echo htmlspecialchars($row['Physical_Examination']); ?></td>
              <td><?php echo htmlspecialchars($row['Laborary_Test']); ?></td>
              <td><?php echo htmlspecialchars($row['Diagnosis']); ?></td>
              <td><?php echo htmlspecialchars($row['Therapentic_plan']); ?></td>
              <td><?php echo htmlspecialchars($row['Heart_rate']); ?></td>
              <td><?php echo htmlspecialchars($row['Temperature']); ?></td>
            </tr>
          <?php } ?>
        <?php } else { ?>
          <tr>
            <td colspan="13">ไม่พบข้อมูล</td>
          </tr>
        <?php } ?>
      </table>


      <h2>Medication</h2>
      <!-- ตารางแสดงข้อมูลพนักงาน -->
      <table>
        <tr>
          <th>ID</th>
          <th>Drug_type</th>
          <th>Drug_Name</th>
          <th>Drug_Price</th>
          <th>Drug_Quantity</th>
          <th>Drug_Exp</th>
        </tr>

        <?php if ($result_medication && $result_medication->num_rows > 0) { ?>
          <?php while($row = $result_medication->fetch_assoc()) { ?>
            <tr>
              <td><?php echo htmlspecialchars($row['Drug_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['Drug_Type']); ?></td>
              <td><?php echo htmlspecialchars($row['Drug_Name']); ?></td>
              <td><?php echo htmlspecialchars($row['Drug_Price']); ?></td>
              <td><?php echo htmlspecialchars($row['Drug_Quantity']); ?></td>
              <td><?php echo htmlspecialchars($row['Drug_Exp']); ?></td>
            </tr>
          <?php } ?>
        <?php } else { ?>
          <tr>
            <td colspan="13">ไม่พบข้อมูล</td>
          </tr>
        <?php } ?>
      </table>
      <h2>Appointment</h2>
      <!-- ตารางแสดงข้อมูลพนักงาน -->
      <table>
        <tr>
          <th>ID</th>
          <th>Treat_ID</th>
          <th>App_detail</th>
          <th>App_Date</th>
          <th>App_Time</th>
        </tr>

        <?php if ($result_app && $result_app->num_rows > 0) { ?>
          <?php while($row = $result_app->fetch_assoc()) { ?>
            <tr>
              <td><?php echo htmlspecialchars($row['App_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['Treat_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['App_detail']); ?></td>
              <td><?php echo htmlspecialchars($row['App_Date']); ?></td>
              <td><?php echo htmlspecialchars($row['App_time']); ?></td>
            </tr>
          <?php } ?>
        <?php } else { ?>
          <tr>
            <td colspan="13">ไม่พบข้อมูล</td>
          </tr>
        <?php } ?>
      </table>
      <h2>Follow-Up</h2>
      <!-- ตารางแสดงข้อมูลพนักงาน -->
      <table>
        <tr>
          <th>ID</th>
          <th>Owner</th>
          <th>Treat_ID</th>
          <th>Date</th>
          <th>Status</th>
          <th>Notes</th>
        </tr>

        <?php if ($result_follow && $result_follow->num_rows > 0) { ?>
          <?php while($row = $result_follow->fetch_assoc()) { ?>
            <tr>
              <td><?php echo htmlspecialchars($row['Follow_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['CUS_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['Treat_ID']); ?></td>
              <td><?php echo htmlspecialchars($row['Follow_Date']); ?></td>
              <td><?php echo htmlspecialchars($row['Follow_Status']); ?></td>
              <td><?php echo htmlspecialchars($row['Follow_Notes']); ?></td>
            </tr>
          <?php } ?>
        <?php } else { ?>
          <tr>
            <td colspan="13">ไม่พบข้อมูล</td>
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
