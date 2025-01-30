<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'clinics');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// กำหนด action เมื่อส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    // ดึง ID ของพนักงานที่ต้องการลบ
    $employee_id = intval($_POST['delete_id']);

    // ลบข้อมูลพนักงานจากฐานข้อมูล
    $sql = "DELETE FROM employees WHERE Emp_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_id);

    if ($stmt->execute()) {
        // Redirect to alltable.php after successful deletion
        header("Location: alltable.php?message=Employee deleted successfully!");
        exit();
    } else {
        // Log the error
        error_log("Error: " . $stmt->error);
        echo "<script>alert('Error deleting employee. Please try again.');</script>";
    }

    $stmt->close();
}

// ดึงรายชื่อพนักงานจากตารางemployees
$employees = $conn->query("SELECT Emp_ID, Emp_Firstname, Emp_Lastname, Emp_Mail, Emp_Tel, Position_ID, Years_of_experience, Vet_Specialization, Salary FROM employees");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Employee</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f7fa; color: #333; }
        .container { width: 100%; max-width: 500px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #dc3545; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; font-weight: bold; }
        select { padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; }
        button { margin-top: 20px; padding: 10px; background-color: #dc3545; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease; }
        button:hover { background-color: #c82333; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Employee</h2>
        <form method="POST" action="">
            <label for="delete_id">Select Employee to Delete:</label>
            <select id="delete_id" name="delete_id" required>
                <option value="">-- Select Employee --</option>
                <?php
                // สร้างตัวเลือกสำหรับพนักงานแต่ละคน
                while ($row = $employees->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($row['Emp_ID']) . "'>" . htmlspecialchars($row['Emp_Firstname'] . " " . $row['Emp_Lastname']) . "</option>";
                }
                ?>
            </select>

            <button type="submit">Delete Employee</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
