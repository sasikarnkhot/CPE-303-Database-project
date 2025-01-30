<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// บันทึกข้อมูลเมื่อกดปุ่ม submit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_treatment'])) {
    $pet_id = $_POST['Pet_ID'];
    $emp_id = $_POST['Emp_ID'];
    $start_date = $_POST['Treat_Startdate'];
    $end_date = $_POST['Treat_Enddate'];
    $clinical_sign = $_POST['clinical_Sing'];
    $physical_examination = $_POST['Physical_Examination'];
    $laboratory_test = $_POST['Laborary_Test'];
    $diagnosis = $_POST['Diagnosis'];
    $therapeutic_plan = $_POST['Therapentic_plan'];
    $heart_rate = $_POST['Heart_rate'];
    $temperature = $_POST['Temperature'];

    // SQL สำหรับการบันทึกข้อมูลลงในตาราง treatment
    $sql = "INSERT INTO treatment (
        Pet_ID, Emp_ID, Treat_Startdate, Treat_Enddate, clinical_Sing, 
        Physical_Examination, Laboratory_Test, Diagnosis, Therapentic_plan, 
        Heart_rate, Temperature) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iisssssssii", $pet_id, $emp_id, $start_date, $end_date, 
              $clinical_sign, $physical_examination, $laboratory_test, 
              $diagnosis, $therapeutic_plan, $heart_rate, $temperature);

if ($stmt->execute()) {
echo "Record added successfully.";
} else {
echo "Error: " . $stmt->error;
}

}

// ค้นหาสัตว์เลี้ยงแบบเรียลไทม์
if (isset($_POST['query_pet'])) {
    $search = $conn->real_escape_string($_POST['query_pet']);
    $sql = "SELECT Pet_ID, Pet_Name FROM pet WHERE Pet_Name LIKE '%$search%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='pet_item' data-id='" . $row['Pet_ID'] . "'>" . $row['Pet_Name'] . "</p>";
        }
    } else {
        echo "<p>ไม่พบข้อมูลสัตว์เลี้ยง</p>";
    }
    exit();
}

// ค้นหาพนักงานแบบเรียลไทม์
if (isset($_POST['query_emp'])) {
    $search = $conn->real_escape_string($_POST['query_emp']);
    $sql = "SELECT Emp_ID, Emp_Firstname, Emp_Lastname FROM employees WHERE Emp_Firstname LIKE '%$search%' OR Emp_Lastname LIKE '%$search%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='emp_item' data-id='" . $row['Emp_ID'] . "'>" . $row['Emp_Firstname'] . " " . $row['Emp_Lastname'] . "</p>";
        }
    } else {
        echo "<p>ไม่พบข้อมูลพนักงาน</p>";
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>บันทึกการรักษา</title>
    <style>
        .search-box {
            position: relative;
        }
        .result {
            position: absolute;
            z-index: 999;
            top: 100%;
            left: 0;
            background: white;
            border: 1px solid #ccc;
        }
        .result p {
            margin: 0;
            padding: 8px;
            cursor: pointer;
            border-bottom: 1px solid #ccc;
        }
        .result p:hover {
            background: #f2f2f2;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h1>บันทึกการรักษา</h1>

<form action="" method="POST">

    <!-- ค้นหาและเลือกสัตว์เลี้ยง -->
    <label for="Pet_ID">ค้นหาสัตว์เลี้ยง:</label>
    <div class="search-box">
        <input type="text" id="pet_search" placeholder="ค้นหาสัตว์เลี้ยง...">
        <div class="result" id="pet_result"></div>
    </div>
    <input type="hidden" name="Pet_ID" id="Pet_ID"><br>

    <!-- ค้นหาและเลือกพนักงาน -->
    <label for="Emp_ID">ค้นหาพนักงาน:</label>
    <div class="search-box">
        <input type="text" id="emp_search" placeholder="ค้นหาพนักงาน...">
        <div class="result" id="emp_result"></div>
    </div>
    <input type="hidden" name="Emp_ID" id="Emp_ID"><br>

    <!-- วันที่เริ่มการรักษา -->
    <label for="Treat_Startdate">วันที่เริ่มการรักษา:</label>
    <input type="date" name="Treat_Startdate" required><br>

    <!-- วันที่สิ้นสุดการรักษา -->
    <label for="Treat_Enddate">วันที่สิ้นสุดการรักษา:</label>
    <input type="date" name="Treat_Enddate"><br>

    <!-- อาการทางคลินิก -->
    <label for="clinical_Sing">อาการทางคลินิก:</label>
    <textarea name="clinical_Sing" required></textarea><br>

    <!-- การตรวจร่างกาย -->
    <label for="Physical_Examination">การตรวจร่างกาย:</label>
    <textarea name="Physical_Examination" required></textarea><br>

    <!-- การตรวจทางห้องปฏิบัติการ -->
    <label for="Laborary_Test">การตรวจทางห้องปฏิบัติการ:</label>
    <textarea name="Laborary_Test"></textarea><br>

    <!-- การวินิจฉัย -->
    <label for="Diagnosis">การวินิจฉัย:</label>
    <textarea name="Diagnosis" required></textarea><br>

    <!-- แผนการรักษา -->
    <label for="Therapentic_plan">แผนการรักษา:</label>
    <textarea name="Therapentic_plan"></textarea><br>

    <!-- อัตราการเต้นของหัวใจ -->
    <label for="Heart_rate">อัตราการเต้นของหัวใจ:</label>
    <input type="number" name="Heart_rate"><br>

    <!-- อุณหภูมิร่างกาย -->
    <label for="Temperature">อุณหภูมิร่างกาย:</label>
    <input type="number" name="Temperature"><br>

    <button type="submit" name="submit_treatment">บันทึกการรักษา</button>
</form>

<script>
// ค้นหาสัตว์เลี้ยงแบบเรียลไทม์
$('#pet_search').on('input', function() {
    var search = $(this).val();
    if (search != "") {
        $.ajax({
            url: "", // ดึงข้อมูลในไฟล์เดียวกัน
            method: "POST",
            data: {query_pet: search},
            success: function(data) {
                $('#pet_result').html(data);
            }
        });
    } else {
        $('#pet_result').html("");
    }
});

// เมื่อกดเลือกสัตว์เลี้ยง
$(document).on('click', '.pet_item', function() {
    var pet_id = $(this).attr("data-id");
    var pet_name = $(this).text();
    $('#pet_search').val(pet_name);
    $('#Pet_ID').val(pet_id);
    $('#pet_result').html("");
});

// ค้นหาพนักงานแบบเรียลไทม์
$('#emp_search').on('input', function() {
    var search = $(this).val();
    if (search != "") {
        $.ajax({
            url: "", // ดึงข้อมูลในไฟล์เดียวกัน
            method: "POST",
            data: {query_emp: search},
            success: function(data) {
                $('#emp_result').html(data);
            }
        });
    } else {
        $('#emp_result').html("");
    }
});

// เมื่อกดเลือกพนักงาน
$(document).on('click', '.emp_item', function() {
    var emp_id = $(this).attr("data-id");
    var emp_name = $(this).text();
    $('#emp_search').val(emp_name);
    $('#Emp_ID').val(emp_id);
    $('#emp_result').html("");
});
</script>

</body>
</html>
