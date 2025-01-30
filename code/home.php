<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลพนักงาน
$sql_employees = "SELECT Emp_ID 
                  FROM employees 
                  ";
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
              <a href="home.php" class= "js-logo-clone" ><img src="./images/YAJOK.png" style="width:150px;height :80px ;"> </a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="alltable.php">Employees</a></li>
                <li><a href="pet_table.php">Pet</a></li>
                <li><a href="treatment_table.php">Treatment</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-blocks-cover" style="background-image: url('./images/clinic.png">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h1>Welcome To Clinic YAJOK</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch section-overlap">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-primary h-100">
              <a href="#" class="h-100">
                <h5>คลินิกสัตว์เลี้ยงใกล้บ้าน</h5>
                <p>
                  <strong>ทุ่มเทใส่ใจกับทุกการรักษาให้มีประสิทธิภาพสูงสุด และเป็นไปตามหลักสากล เครื่องมือทางการแพทย์มีความทันสมัย สามารถวินิจฉัยได้อย่างละเอียดและแม่นยำ</strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap h-100">
              <a href="#" class="h-100">
                <h5> ลดราคา 50%</h5>
                <p>
                  สำหรับสมาชิกเท่านั้น
                  <strong>สมัครได้ง่ายๆ ผ่านเว็บไซต์ เพื่อสิทธิประโยชน์อื่นๆ อีกมากมาย </strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-warning h-100">
              <a href="#" class="h-100">
                <h5>ปรึกษาสัตวแพทย์ออนไลน์ ผ่านเว็บไซต์ ได้ฟรี ตลอด 24 ชั่วโมง</h5>
                <p>
                  <strong>ไขข้อสงสัยทุกปัญหาสุขภาพสัตว์เลี้ยงและการใช้ยา จากสัตวแพทย์ตัวจริง เสมือนมีที่ปรึกษาส่วนตัวอยู่เคียงข้างคุณ</strong>
                </p>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">บริการอาบน้ำตัดขน</h2>
          </div>
        </div>
        <div class="site-section bg-light custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="./images/S0065_675.jpg.jpg" alt="Image placeholder" class="img-fluid rounded">
                <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span
                    class="icon-play"></span></a>
    
              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
    
    
            <div class="site-section-heading pt-3 mb-4">
            </div>
            <p class="text-black">บริการอาบน้ำ ตัดขน ที่คลินิคยาจก เปิดให้บริการทุกวัน เวลา 08.00 – 20.00

เพื่อสิ่งที่ดีที่สุดสำหรับสัตว์เลี้ยง เราจึงใส่ใจทุกรายละเอียด มีการควบคุมทุกขั้นตอนให้เป็นไปตามมาตรฐานโรงพยาบาล รวมไปถึงอุปกรณ์ เครื่องมือที่มีคุณภาพ ไม่ว่าจะเป็นแชมพูที่มีสารประกอบจากธรรมชาติ ไม่ก่อให้เกิดอาการแพ้และระคายเคืองต่อผิวหนัง ปลอดสารกันเสีย

ทาง โรงพยาบาลสัตว์ทองหล่อ มีการแยกห้องอาบน้ำตัดขนของน้องสุน้ขและน้องแมว เพื่อให้น้องแมวมีอาการสงบไม่แตกตื่นหรือตกใจในระหว่างการรับบริการ</p>
    
          </div>
        </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>คลินิกสัตว์เลี้ยงยาจกทุ่มเทใส่ใจกับทุกการรักษาให้มีประสิทธิภาพสูงสุด และเป็นไปตามหลักสากล เครื่องมือทางการแพทย์มีความทันสมัย สามารถวินิจฉัยได้อย่างละเอียดและแม่นยำ</p>
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