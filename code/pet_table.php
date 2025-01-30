<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลpet
$sql_pet = "SELECT Pet_ID, CUS_ID, Pet_Name, Pet_Birthday, Pet_Type, Pet_Breed, Pet_Gender, Pet_Weight, Age_Years, Age_Months FROM pet";
$result_pet = $conn->query($sql_pet);

// ดึงข้อมูลcus
$sql_cus = "SELECT CUS_ID, CUS_Firstname, CUS_Lastname, CUS_Gender, CUS_Address, CUS_Mail, CUS_Tel FROM customer";
$result_cus = $conn->query($sql_cus);

// ดึงข้อมูลmember
$sql_mem = "SELECT Membership_ID, CUS_ID, Membership_Total FROM memberships";
$result_mem = $conn->query($sql_mem);
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
                <li><a href="pet.php">Add New Pet</a></li>
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
      <h2>Pet List</h2>

      <!-- ตารางแสดงข้อมูลพนักงาน -->
      <table>
        <tr>
          <th>ID</th>
          <th>เจ้าของ</th>
          <th>ชื่อ</th>
          <th>วันเกิด</th>
          <th>ประเภท</th>
          <th>สายพันธุ์</th>
          <th>เพศ</th>
          <th>น้ำหนัก</th>
          <th>อายุ(ปี)</th>
          <th>เดือน</th>
        </tr>

        <?php if ($result_pet && $result_pet->num_rows > 0) { ?>
  <?php while($row = $result_pet->fetch_assoc()) { ?>
    <tr>
      <td><?php echo htmlspecialchars($row['Pet_ID']); ?></td>
      <td><?php echo htmlspecialchars($row['CUS_ID']); ?></td>
      <td><?php echo htmlspecialchars($row['Pet_Name']); ?></td>
      <td><?php echo htmlspecialchars($row['Pet_Birthday']); ?></td> 
      <td><?php echo htmlspecialchars($row['Pet_Type']); ?></td>
      <td><?php echo htmlspecialchars($row['Pet_Breed']); ?></td>
      <td><?php echo htmlspecialchars($row['Pet_Gender']); ?></td>
      <td><?php echo htmlspecialchars($row['Pet_Weight']); ?></td>
      <td><?php echo htmlspecialchars($row['Age_Years']); ?></td>
      <td><?php echo htmlspecialchars($row['Age_Months']); ?></td>
    </tr>
  <?php } ?>
<?php } else { ?>
  <tr>
    <td colspan="10">ไม่พบข้อมูล</td> 
  </tr>
<?php } ?>

      </table>

      <h2>Owner List</h2>

      <!-- ตารางแสดงข้อมูลพนักงาน -->
      <table>
        <tr>
          <th>ID</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>เพศ</th>
          <th>ที่อยู่</th>
          <th>อีเมล</th>
          <th>เบอร์โทร</th>
        </tr>

        <?php if ($result_cus && $result_cus->num_rows > 0) { ?>
      <?php while($row = $result_cus->fetch_assoc()) { ?>
      <tr>
      <td><?php echo htmlspecialchars($row['CUS_ID']); ?></td>
      <td><?php echo htmlspecialchars($row['CUS_Firstname']); ?></td>
      <td><?php echo htmlspecialchars($row['CUS_Lastname']); ?></td>
      <td><?php echo htmlspecialchars($row['CUS_Gender']); ?></td> <!-- แก้ไขตรงนี้ -->
      <td><?php echo htmlspecialchars($row['CUS_Address']); ?></td>
      <td><?php echo htmlspecialchars($row['CUS_Mail']); ?></td>
      <td><?php echo htmlspecialchars($row['CUS_Tel']); ?></td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr>
      <td colspan="10">ไม่พบข้อมูล</td> 
      </tr>
      <?php } ?>

      </table>
      <h2>Memberships</h2>

    <!-- ตารางแสดงข้อมูลพนักงาน -->
    <table>
      <tr>
        <th>ID</th>
        <th>ลูกค้า</th>
        <th>คะแนนสะสม</th>
      </tr>

      <?php if ($result_mem && $result_mem->num_rows > 0) { ?>
    <?php while($row = $result_mem->fetch_assoc()) { ?>
    <tr>
    <td><?php echo htmlspecialchars($row['Membership_ID']); ?></td>
    <td><?php echo htmlspecialchars($row['CUS_ID']); ?></td>
    <td><?php echo htmlspecialchars($row['Membership_Total']); ?></td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr>
    <td colspan="10">ไม่พบข้อมูล</td> 
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
