<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $Cus_Firstname = $_POST['Cus_Firstname'];
    $Cus_Lastname = $_POST['Cus_Lastname'];
    $Cus_Gender = $_POST['Cus_Gender'];
    $Cus_Address = $_POST['Cus_Address'];
    $Cus_Mail = $_POST['Cus_Mail'];
    $Cus_Tel = $_POST['Cus_Tel'];

    $Pet_Name = $_POST['Pet_Name'];
    $Pet_Birthday = $_POST['Pet_Birthday'];
    $Pet_Type = $_POST['Pet_Type'];
    $Pet_Breed = $_POST['Pet_Breed'];
    $Pet_Gender = $_POST['Pet_Gender'];
    $Pet_Weight = $_POST['Pet_Weight'];

    $membership = isset($_POST['is_member']) ? 1 : 0; // ตรวจสอบให้ถูกต้อง

    // เริ่มต้น transaction
    $conn->begin_transaction();

    try {
        // แทรกข้อมูลเจ้าของลงในตาราง customer
        $stmt_customer = $conn->prepare("INSERT INTO customer (Cus_Firstname, Cus_Lastname, Cus_Gender, Cus_Address, Cus_Mail, Cus_Tel) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_customer->bind_param("ssssss", $Cus_Firstname, $Cus_Lastname, $Cus_Gender, $Cus_Address, $Cus_Mail, $Cus_Tel);
        $stmt_customer->execute();

        // ดึงค่า CUS_ID ที่เพิ่งถูกสร้างขึ้น
        $Cus_ID = $stmt_customer->insert_id;

        // แทรกข้อมูลสัตว์เลี้ยงลงในตาราง pet
        $stmt_pet = $conn->prepare("INSERT INTO pet (Cus_ID, Pet_Name, Pet_Birthday, Pet_Type, Pet_Breed, Pet_Gender, Pet_Weight, Age_Years, Age_Months)
        VALUES (?, ?, ?, ?, ?, ?, ?, TIMESTAMPDIFF(YEAR, ?, CURDATE()), TIMESTAMPDIFF(MONTH, ?, CURDATE()) % 12)
        ");
        $stmt_pet->bind_param("isssssdss", $Cus_ID, $Pet_Name, $Pet_Birthday, $Pet_Type, $Pet_Breed, $Pet_Gender, $Pet_Weight, $Pet_Birthday, $Pet_Birthday);
        $stmt_pet->execute();

        // ตรวจสอบว่าผู้ใช้เลือกสมัครสมาชิกหรือไม่
        if ($membership) {
            // แทรกข้อมูลลงในตาราง memberships
            $stmt_membership = $conn->prepare("INSERT INTO memberships (Cus_ID, Membership_Total) VALUES (?, 0)");
            $stmt_membership->bind_param("i", $Cus_ID);
            $stmt_membership->execute();
        }

        // ถ้าทุกอย่างถูกต้อง ให้ commit ข้อมูล
        $conn->commit();
        echo "เพิ่มข้อมูลเจ้าของและสัตว์เลี้ยงสำเร็จ!";
    } catch (Exception $e) {
        // ถ้าเกิดข้อผิดพลาด ให้ rollback ข้อมูล
        $conn->rollback();
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Pet And Owner</title>
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
    <h2>เพิ่มข้อมูลเจ้าของและสัตว์เลี้ยง</h2>
    <form method="post"  >
        <h3>ข้อมูลเจ้าของ</h3>
        <label for="Cus_Firstname">ชื่อ:</label>
        <input type="text" id="Cus_Firstname" name="Cus_Firstname" required><br>

        <label for="Cus_Lastname">นามสกุล:</label>
        <input type="text" id="Cus_Lastname" name="Cus_Lastname" required><br>

        <label for="Cus_Gender">เพศ:</label>
        <select id="Cus_Gender" name="Cus_Gender" required>
            <option value="">-- เลือกเพศ --</option>
            <option value="ชาย">ชาย</option>
            <option value="หญิง">หญิง</option>
            <option value="อื่นๆ">อื่นๆ</option>
        </select><br>

        <label for="Cus_Address">ที่อยู่:</label>
        <input type="text" id="Cus_Address" name="Cus_Address" required><br>

        <label for="Cus_Email">อีเมล:</label>
        <input type="email" id="Cus_Email" name="Cus_Mail" required><br>


        <label for="Cus_Tel">เบอร์โทรศัพท์:</label>
        <input type="text" id="Cus_Tel" name="Cus_Tel" required><br>

        <h3>ข้อมูลสัตว์เลี้ยง</h3>
        <label for="Pet_Name">ชื่อสัตว์เลี้ยง:</label>
        <input type="text" id="Pet_Name" name="Pet_Name" required><br>

        <label for="Pet_Birthday">วันเกิด:</label>
        <input type="date" id="Pet_Birthday" name="Pet_Birthday" required><br>

        <label for="Pet_Type">ประเภทสัตว์เลี้ยง:</label>
        <input type="text" id="Pet_Type" name="Pet_Type" required><br>

        <label for="Pet_Breed">สายพันธุ์:</label>
        <input type="text" id="Pet_Breed" name="Pet_Breed" required><br>

        <label for="Pet_Gender">เพศสัตว์เลี้ยง:</label>
        <select id="Pet_Gender" name="Pet_Gender" required>
            <option value="">-- เลือกเพศ --</option>
            <option value="ชาย">ชาย</option>
            <option value="หญิง">หญิง</option>
            <option value="อื่นๆ">อื่นๆ</option>
        </select><br>

        <label for="Pet_Weight">น้ำหนักสัตว์เลี้ยง (กก.):</label>
        <input type="number" step="0.01" id="Pet_Weight" name="Pet_Weight" required><br>

        <h3>สมัครสมาชิก</h3>
        <input type="checkbox" id="is_member" name="is_member">
        <button type="submit">บันทึกข้อมูล</button>
    </form>
</body>
</html>
