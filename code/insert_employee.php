<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// สร้างฟังก์ชันสำหรับสร้าง Emp_ID เริ่มต้นที่ 3001
function generateEmpID($conn) {
    // ค้นหา Emp_ID ล่าสุดในฐานข้อมูล
    $result = $conn->query("SELECT Emp_ID FROM employees ORDER BY Emp_ID DESC LIMIT 1");

    // ตรวจสอบว่ามีข้อมูลผลลัพธ์หรือไม่
    if ($result && $result->num_rows > 0) {
        $lastEmpID = $result->fetch_assoc()['Emp_ID'];
        
        // เพิ่ม 1 สำหรับ Emp_ID ใหม่
        return $lastEmpID + 1;
    }

    // หากยังไม่มีพนักงานในระบบให้ตั้งค่าเริ่มต้นเป็น 3001
    return 3001;
}


// ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $name = isset($_POST['Emp_Firstname']) ? $_POST['Emp_Firstname'] : null;
    $lastname = isset($_POST['Emp_Lastname']) ? $_POST['Emp_Lastname'] : null;
    $email = isset($_POST['Emp_Mail']) ? $_POST['Emp_Mail'] : null;
    $tel = isset($_POST['Emp_Tel']) ? $_POST['Emp_Tel'] : null;
    $position_id = isset($_POST['position_id']) ? $_POST['position_id'] : null;
    $years_of_experience = isset($_POST['Years_of_experience']) ? $_POST['Years_of_experience'] : null;
    $vet_specialization = isset($_POST['Vet_Specialization']) ? $_POST['Vet_Specialization'] : null;
    $salary = isset($_POST['Salary']) ? $_POST['Salary'] : null;

    // ใช้ฟังก์ชันนี้ก่อนที่จะทำการ INSERT ข้อมูลใหม่
    $empID = generateEmpID($conn);

    // คำสั่ง SQL สำหรับเพิ่มข้อมูลพนักงานใหม่
    $sql = "INSERT INTO employees (Emp_ID, Emp_Firstname, Emp_Lastname, Emp_Mail, Emp_Tel, Position_ID, Years_of_experience, Vet_Specialization, Salary)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssssi", $empID, $name, $lastname, $email, $tel, $position_id, $years_of_experience, $vet_specialization, $salary);

    // ตรวจสอบว่าการเพิ่มข้อมูลสำเร็จหรือไม่
    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มพนักงานใหม่สำเร็จ!');</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "');</script>";
    }

    // ปิดการเชื่อมต่อ
    $stmt->close();
}

// ดึงตำแหน่งงานจากฐานข้อมูล
$position_sql = "SELECT Position_ID, Position_Name  FROM Positions";
$position_result = $conn->query($position_sql);


// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f7fa; color: #333; }
        .container { width: 100%; max-width: 500px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #007bff; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; font-weight: bold; }
        input[type="text"], input[type="number"], select { padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; }
        button { margin-top: 20px; padding: 10px; background-color: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>
    <div class="Employees">
        <h2>Add New Employee</h2>
        <form action="" method="post">
        <!-- ชื่อพนักงาน -->
        <label for="name">ชื่อ:</label>
        <input type="text" name="Emp_Firstname" required />
        <br><br>

        <!-- นามสกุลพนักงาน -->
        <label for="lastname">นามสกุล:</label>
        <input type="text" name="Emp_Lastname" required />
        <br><br>

        <!-- อีเมลพนักงาน -->
        <label for="email">อีเมล:</label>
        <input type="email" name="Emp_Mail" required />
        <br><br>

        <!-- เบอร์โทรพนักงาน -->
        <label for="tel">เบอร์โทร:</label>
        <input type="tel" name="Emp_Tel" />
        <br><br>

        <!-- ตำแหน่งงาน -->
        <label for="position">ตำแหน่ง:</label>
        <select name="position_id" id="position" required>
            <option value="">-- กรุณาเลือกตำแหน่ง --</option>
            <?php
            // วนลูปแสดงตำแหน่งใน dropdown
            if ($position_result->num_rows > 0) {
                // แสดงข้อมูลที่ดึงมาในตัวเลือก
                $position_result->data_seek(0); // รีเซ็ต pointer ก่อนวนลูป
                while($row = $position_result->fetch_assoc()) {
                    echo "<option value='" . $row["Position_ID"] . "'>" . $row["Position_Name"] . "</option>";
                }
            } else {
                echo "<option value=''>ไม่มีข้อมูล</option>";
            }
            ?>
        </select>
        <br><br>

        <!-- ปีประสบการณ์ -->
        <label for="years_of_experience">ปีประสบการณ์:</label>
        <input type="number" name="Years_of_experience" />
        <br><br>

        <!-- ความเชี่ยวชาญ -->
        <label for="vet_specialization">ความเชี่ยวชาญ:</label>
        <input type="text" name="Vet_Specialization" required />
        <br><br>

        <!-- เงินเดือน -->
        <label for="salary">เงินเดือน:</label>
        <input type="number" name="Salary" />
        <br><br>

        <input type="submit" value="เพิ่มพนักงาน">
    </form>
    </div>
</body>
</html>
