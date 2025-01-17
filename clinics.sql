-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 07:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinics`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `App_ID` int(11) NOT NULL,
  `Treat_ID` int(11) DEFAULT NULL,
  `App_detail` varchar(255) DEFAULT NULL,
  `App_Date` date DEFAULT NULL,
  `App_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`App_ID`, `Treat_ID`, `App_detail`, `App_Date`, `App_time`) VALUES
(6001, 4001, 'ตรวจระดับน้ำตาลในเลือด', '2024-01-08', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUS_ID` int(11) NOT NULL,
  `CUS_Firstname` varchar(255) DEFAULT NULL,
  `CUS_Lastname` varchar(255) DEFAULT NULL,
  `CUS_Gender` varchar(200) DEFAULT NULL,
  `CUS_Address` varchar(255) DEFAULT NULL,
  `CUS_Mail` varchar(255) DEFAULT NULL,
  `CUS_Tel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUS_ID`, `CUS_Firstname`, `CUS_Lastname`, `CUS_Gender`, `CUS_Address`, `CUS_Mail`, `CUS_Tel`) VALUES
(2002, 'ก้องเกียรติ', 'จันทรรัตน์', 'ชาย', 'ชลบุรี', 'Kongkiat@gmail.com', '0912568945'),
(2003, 'นวพร', 'ศิริวัฒน์', 'หญิง', 'กรุงเทพมหานคร', 'Navaporn@gmail.com', '0917987512');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Emp_ID` int(11) NOT NULL,
  `Emp_Firstname` varchar(255) DEFAULT NULL,
  `Emp_Lastname` varchar(255) DEFAULT NULL,
  `Emp_Mail` varchar(255) DEFAULT NULL,
  `Emp_Tel` varchar(15) DEFAULT NULL,
  `Position_ID` int(11) DEFAULT NULL,
  `Years_of_experience` int(11) DEFAULT NULL,
  `Vet_Specialization` varchar(255) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Emp_ID`, `Emp_Firstname`, `Emp_Lastname`, `Emp_Mail`, `Emp_Tel`, `Position_ID`, `Years_of_experience`, `Vet_Specialization`, `Salary`) VALUES
(3001, 'นพดล', 'วิริยะธรรม', 'napadol.viriyatam@gmail.com', '0812345678', 10001, 10, 'ศัลยกรรมสัตว์เลี้ยงขนาดใหญ่', 70000.00),
(3002, 'จิรนันท์', 'พิทักษ์ศิลป์', 'jiranan.pitaksin@gmail.com', '0823456789', 10001, 12, 'การดูแลสัตว์น้ำและสัตว์ทะเล', 70000.00),
(3003, 'วราภรณ์', 'วัฒนธรรม', 'waraporn.wattanatham@gmail.com', '0801234567', 10002, 7, 'ใช้งานเครื่องเอ็กซเรย์และอัลตราซาวด์', 40000.00),
(3004, 'นนทกร', 'เพชรพิชัย', 'nonthakorn.petchpichai@gmail.com', '0812346789', 10002, 6, 'ปฐมพยาบาลและ CPR', 40000.00),
(3005, 'กัลยา', 'ธีรชัยวงศ์', 'kalaya.theerachaiwong@gmail.com', '0823457890', 10002, 5, 'ควบคุมพฤติกรรมสัตว์ก้าวร้าว', 35000.00),
(3006, 'ชนินทร์', 'ศรีโสภณ', 'chanin.srisophon@gmail.com', '0834568901', 10002, 7, 'ดูแลการพักฟื้นสัตว์สูงอายุ', 40000.00),
(3007, 'พรรณราย', 'วงศ์สมุทร', 'pannarai.wongsamut@gmail.com', '0856780123', 10003, 3, 'จัดการนัดหมายและให้ข้อมูลบริการ', 20000.00),
(3008, 'ชนัญญา', 'เรืองศรี', 'chananya.ruangsri@gmail.com', '0867891234', 10003, 2, 'การสื่อสารและจัดการข้อร้องเรียน', 18000.00),
(3009, 'อภิชัย', 'พุทธรักษา', 'apichai.puttaraksa@gmail.com', '0878902345', 10004, 4, 'ดูแลสุขภาพและให้อาหารสัตว์', 25000.00),
(3010, 'อรุณรัตน์', 'เมธากุล', 'arunrat.methakul@gmail.com', '0889013456', 10004, 3, 'เข้าใจพฤติกรรมสัตว์', 23000.00),
(3011, 'ศุภชัย', 'รัตนสมบัติ', 'supachai.rattanasombat@gmail.com', '0890124567', 10005, 5, 'บริหารจัดการคลินิกและทีมงาน', 50000.00),
(3012, 'นฤมล', 'ทิพย์วรรณ', 'narumon.tippawan@gmail.com', '0801235678', 10006, 4, 'จัดการบัญชีรายรับ-รายจ่าย', 30000.00),
(3013, 'ธนพล', 'พิทักษ์สกุล', 'thanapol.pitaksakul@email.com', '0912345678', 10006, 3, 'ความรู้ด้านภาษีและการเงิน', 28000.00),
(3014, 'สุพจน์', 'วงศ์วัฒนกิจ', 'supoj.wongwatthakit@email.com', '0923456789', 10007, 2, 'แนะนำและขายผลิตภัณฑ์สัตว์เลี้ยง', 22000.00),
(3015, 'ชนัญธิดา', 'สุริยะมาศ', 'chanantida.suriyamat@email.com', '0934567890', 10008, 5, 'ฟื้นฟูสมรรถภาพสัตว์', 35000.00),
(3016, 'กิตติภูมิ', 'ศรีสวัสดิ์', 'kittipoom.srisawat@email.com', '0945678901', 10008, 4, 'ออกกำลังกายและบำบัดสัตว์', 32000.00),
(3017, 'พิมพ์ชนก', 'ภูวนารถ', 'pimchanok.phuwanart@email.com', '0956789012', 10009, 3, 'วิเคราะห์และปรับพฤติกรรมสัตว์', 28000.00),
(3018, 'ธนภพ', 'รัตนวณิชย์', 'thanapop.rattanavanich@email.com', '0967890123', 10010, 6, 'ตัดขนและดูแลสุขภาพขนสัตว์', 30000.00),
(3019, 'วราภรณ์', 'แซ่ตั้ง', 'waraporn.sae-tang@email.com', '0978901234', 10011, 2, 'เตรียมอุปกรณ์และดูแลสัตว์ระหว่างตัดขน', 18000.00),
(3020, 'จิรพงศ์', 'หอมวิเศษ', 'jirapong.homwiset@email.com', '0989012345', 10012, 3, 'อาบน้ำและดูแลความสะอาดสัตว์', 20000.00),
(3021, 'นันทิดา', 'ชาญวิชัย', 'nantida.chanyawichai@email.com', '0990123456', 10013, 1, 'ช่วยเตรียมอุปกรณ์', 15000.00),
(3022, 'อภิชาต', 'เกียรติพงษ์', 'apichart.kiatpong@email.com', '0811234567', 10014, 2, 'ดูแลความสะอาดในคลินิก', 15000.00),
(3023, 'วิชัย', 'ลีลาพงศ์', 'wichai.leelapong@email.com', '0822345678', 10014, 1, 'ทำความสะอาดพื้นที่ทำงาน', 14000.00),
(3024, 'กัญญา', 'มหาสิทธิ์', 'kanya.mahasit@email.com', '0833456789', 10015, 3, 'ควบคุมและจัดการสต็อก', 25000.00),
(3025, 'วัฒนา', 'วรากิจสวัสดิ์', 'wattana.worakit-sawat@email.com', '0844567890', 10015, 2, 'จัดการอุปกรณ์สัตว์', 22000.00);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `Equ_ID` int(11) NOT NULL,
  `Equ_name` varchar(255) DEFAULT NULL,
  `Equ_Type` varchar(255) DEFAULT NULL,
  `Equ_Quantity` int(11) DEFAULT NULL,
  `Equ_Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`Equ_ID`, `Equ_name`, `Equ_Type`, `Equ_Quantity`, `Equ_Price`) VALUES
(11001, 'ผ้าก๊อซ', 'อุปกรณ์ทำแผล', 100, 500.00),
(11002, 'เทปยึดแผล', 'อุปกรณ์ทำแผล', 20, 400.00),
(11003, 'น้ำยาฆ่าเชื้อ', 'อุปกรณ์ทำแผล', 5, 750.00),
(11004, 'แปรงขัดแผล', 'อุปกรณ์ทำแผล', 5, 250.00),
(11005, 'ชุดเครื่องมือทำแผล', 'อุปกรณ์ทำแผล', 3, 300.00),
(11006, 'ผ้าปิดแผล', 'อุปกรณ์ทำแผล', 50, 500.00),
(11007, 'ชุดเครื่องมือผ่าตัด', 'อุปกรณ์ผ่าตัด', 2, 10000.00),
(11008, 'เครื่องระงับความรู้สึก', 'อุปกรณ์ผ่าตัด', 1, 2000.00),
(11009, 'อุปกรณ์เฝ้าระวัง', 'อุปกรณ์ผ่าตัด', 1, 5000.00),
(11010, 'เครื่องมือเอกซเรย์', 'อุปกรณ์ผ่าตัด', 1, 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `follow_up`
--

CREATE TABLE `follow_up` (
  `Follow_ID` int(11) NOT NULL,
  `CUS_ID` int(11) DEFAULT NULL,
  `Treat_ID` int(11) DEFAULT NULL,
  `Follow_Date` date DEFAULT NULL,
  `Follow_Status` varchar(200) DEFAULT NULL,
  `Follow_Notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow_up`
--

INSERT INTO `follow_up` (`Follow_ID`, `CUS_ID`, `Treat_ID`, `Follow_Date`, `Follow_Status`, `Follow_Notes`) VALUES
(17001, 2002, 4001, '2024-01-08', 'กำลังติดตาม', 'ตรวจพบไข้ในแมว อาการเริ่มดีขึ้นหลังการรักษา');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `Drug_ID` int(11) NOT NULL,
  `Drug_Type` varchar(255) DEFAULT NULL,
  `Drug_Name` varchar(255) DEFAULT NULL,
  `Drug_Price` decimal(10,2) DEFAULT NULL,
  `Drug_Quantity` int(11) DEFAULT NULL,
  `Drug_Exp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`Drug_ID`, `Drug_Type`, `Drug_Name`, `Drug_Price`, `Drug_Quantity`, `Drug_Exp`) VALUES
(5001, 'ยาปฏิชีวนะ', 'Amoxicillin', 200.00, 500, '2026-09-30'),
(5002, 'ยาลดการอักเสบ', 'Prednisone', 180.00, 500, '2026-09-30'),
(5003, 'ยาลดไข้และแก้ปวด', 'Aspirin', 120.00, 500, '2026-09-30'),
(5004, 'ยาถ่ายพยาธิ', 'Albendazole', 100.00, 500, '2026-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `medication_list`
--

CREATE TABLE `medication_list` (
  `med_list_id` int(11) NOT NULL,
  `Drug_ID` int(11) DEFAULT NULL,
  `Pre_Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `Membership_ID` int(11) NOT NULL,
  `CUS_ID` int(11) DEFAULT NULL,
  `Membership_Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`Membership_ID`, `CUS_ID`, `Membership_Total`) VALUES
(15002, 2002, 0),
(15003, 2003, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `Emp_ID` int(11) DEFAULT NULL,
  `CUS_ID` int(11) DEFAULT NULL,
  `Ser_list_ID` int(11) DEFAULT NULL,
  `Equ_ID` int(11) DEFAULT NULL,
  `Treat_ID` int(11) DEFAULT NULL,
  `Pre_ID` int(11) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `Order_Payment` varchar(255) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `Pet_ID` int(11) NOT NULL,
  `CUS_ID` int(11) DEFAULT NULL,
  `Pet_Name` varchar(255) DEFAULT NULL,
  `Pet_Birthday` date DEFAULT NULL,
  `Pet_Type` varchar(200) DEFAULT NULL,
  `Pet_Breed` varchar(255) DEFAULT NULL,
  `Pet_Gender` varchar(200) DEFAULT NULL,
  `Pet_Weight` decimal(5,2) DEFAULT NULL,
  `Age_Years` int(11) DEFAULT NULL,
  `Age_Months` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`Pet_ID`, `CUS_ID`, `Pet_Name`, `Pet_Birthday`, `Pet_Type`, `Pet_Breed`, `Pet_Gender`, `Pet_Weight`, `Age_Years`, `Age_Months`) VALUES
(1002, 2002, 'หน่วยกิต', '2015-02-09', 'แมว', 'สก็อตติช โฟลด์', 'ชาย', 5.20, NULL, NULL),
(1003, 2003, 'ไข่ขาว', '2018-02-06', 'แมว', 'ขาวมณี', 'ชาย', 3.70, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `Position_ID` int(11) NOT NULL,
  `Position_Name` varchar(255) DEFAULT NULL,
  `Pos_ass_information` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`Position_ID`, `Position_Name`, `Pos_ass_information`) VALUES
(10001, 'สัตวแพทย์', 'เข้าถึงตามหน้าที่ที่มี'),
(10002, 'ผู้ช่วยสัตวแพทย์', 'เข้าถึงตามหน้าที่ที่มี'),
(10003, 'พนักงานต้อนรับ', 'เข้าถึงตามหน้าที่ที่มี'),
(10004, 'พนักงานดูแลสัตว์', 'เข้าถึงตามหน้าที่ที่มี'),
(10005, 'ผู้จัดการคลินิก', 'เข้าถึงได้หมด'),
(10006, 'พนักงานการเงินและบัญชี', 'เข้าถึงตามหน้าที่ที่มี'),
(10007, 'พนักงานขายผลิตภัณฑ์สัตว์เลี้ยง', 'เข้าถึงตามหน้าที่ที่มี'),
(10008, 'นักกายภาพบำบัดสัตว์', 'เข้าถึงตามหน้าที่ที่มี'),
(10009, 'นักพฤติกรรมสัตว์', 'เข้าถึงตามหน้าที่ที่มี'),
(10010, 'ช่างตัดขนสัตว์เลี้ยง', 'เข้าถึงตามหน้าที่ที่มี'),
(10011, 'ผู้ช่วยช่างตัดขน', 'เข้าถึงตามหน้าที่ที่มี'),
(10012, 'พนักงานอาบน้ำสัตว์', 'เข้าถึงตามหน้าที่ที่มี'),
(10013, 'ผู้ช่วยพนักงานอาบน้ำสัตว์', 'เข้าถึงตามหน้าที่ที่มี'),
(10014, 'พนักงานทำความสะอาด', 'เข้าถึงตามหน้าที่ที่มี'),
(10015, 'พนักงานจัดการสต็อกสินค้าและอุปกรณ์', 'เข้าถึงตามหน้าที่ที่มี');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `Pre_ID` int(11) NOT NULL,
  `med_list_id` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Pre_Dosage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Prc_ID` int(11) NOT NULL,
  `Type_ID` int(11) DEFAULT NULL,
  `Prc_Name` varchar(255) DEFAULT NULL,
  `Detail` varchar(255) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Prc_date` date DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Prc_ID`, `Type_ID`, `Prc_Name`, `Detail`, `Quantity`, `Prc_date`, `Price`) VALUES
(12001, 14001, 'Dry Food', 'อาหารเม็ดสูตรโปรตีนสูง', 200, '2025-09-30', 150.00),
(12002, 14001, 'Wet Food', 'อาหารเปียกแมวรสปลาทูน่า', 200, '2026-09-30', 75.00),
(12003, 14002, 'Amoxicillin', 'ยาปฏิชีวนะสำหรับการติดเชื้อแบคทีเรีย', 500, '2026-09-30', 200.00),
(12004, 14002, 'Prednisone', 'ยาบรรเทาอาการบวมและปวด', 500, '2026-09-30', 180.00),
(12005, 14002, 'Aspirin', 'ยาลดไข้และบรรเทาอาการปวด', 500, '2026-09-30', 120.00),
(12006, 14002, 'Albendazole', 'ยากำจัดพยาธิในสัตว์เลี้ยง', 500, '2026-09-30', 100.00),
(12007, 14002, 'Antiviral Medicine', 'ยารักษาโรคไวรัสในสัตว์เลี้ยง', 500, '2025-09-30', 250.00),
(12008, 14002, 'Enalapril', 'ยารักษาโรคหัวใจ', 500, '2026-09-30', 300.00),
(12009, 14002, 'Ketoconazole', 'ยารักษาโรคที่เกิดจากเชื้อรา', 500, '2026-09-30', 220.00),
(12010, 14002, 'Histamine', 'ยาลดอาการภูมิแพ้และปัญหาผิวหนัง', 500, '2025-09-30', 150.00),
(12011, 14002, 'Prebiotics', 'ยาบรรเทาอาการท้องอืดและส่งเสริมการย่อยอาหาร', 500, '2025-09-30', 130.00),
(12012, 14002, 'Doxorubicin', 'ยารักษามะเร็งในสัตว์เลี้ยง', 200, '2026-09-30', 500.00),
(12013, 14002, 'Interferon', 'ยาการบรรเทาอาการของโรคเอดส์', 200, '2025-09-30', 400.00),
(12014, 14003, 'Cage', 'กรงสำหรับสัตว์', 50, NULL, 800.00),
(12015, 14003, 'Collar', 'ปลอกคอสำหรับสัตว์', 100, NULL, 50.00),
(12016, 14003, 'Food Container', 'ที่ใส่อาหารพลาสติกคุณภาพสูง', 100, NULL, 30.00),
(12017, 14003, 'Litter Box', 'กระบะทรายสำหรับสัตว์', 50, NULL, 100.00),
(12018, 14003, 'Pet Shampoo', 'แชมพูสูตรธรรมชาติสำหรับสัตว์เลี้ยง', 100, '2027-09-30', 70.00),
(12019, 14003, 'Pet Dry Wipes', 'กระดาษเช็ดทำความสะอาดสำหรับสัตว์', 200, '2026-09-30', 25.00),
(12020, 14003, 'Dental Chew Toy', 'ที่ขัดฟัน', 300, NULL, 40.00),
(12021, 14004, 'Recovery Room', 'ห้องพักฟื้นสัตว์', 1, NULL, 500.00),
(12022, 14004, 'X-ray Room', 'ห้องพักฟื้นสัตว์', 1, NULL, 1000.00),
(12023, 14004, 'Surgical Lab Room', 'ห้อง lab สำหรับการผ่าตัด', 1, NULL, 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `Pro_list_ID` int(11) NOT NULL,
  `Order_ID` int(11) DEFAULT NULL,
  `Prc_ID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Receipt_ID` int(11) NOT NULL,
  `App_ID` int(11) DEFAULT NULL,
  `Order_ID` int(11) DEFAULT NULL,
  `Receipt_Date` datetime DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Ser_ID` int(11) NOT NULL,
  `Ser_Type` varchar(255) DEFAULT NULL,
  `Ser_Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Ser_ID`, `Ser_Type`, `Ser_Price`) VALUES
(13001, 'รับฝากเลี้ยง', 650.00),
(13002, 'อาบน้ำสัตว์', 450.00),
(13003, 'ตัดขนสัตว์', 750.00),
(13004, 'การตรวจและวินิฉัยอาการ', 400.00),
(13005, 'X-ray', 1200.00),
(13006, 'ฉีดยา', 600.00),
(13007, 'ทำแผล', 300.00),
(13008, 'ผ่าตัด', 15000.00);

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `Ser_list_ID` int(11) NOT NULL,
  `Ser_ID` int(11) DEFAULT NULL,
  `Emp_ID` int(11) DEFAULT NULL,
  `Pet_ID` int(11) DEFAULT NULL,
  `ser_list_date_start` date DEFAULT NULL,
  `ser_list_date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `Treat_ID` int(11) NOT NULL,
  `Pet_ID` int(11) DEFAULT NULL,
  `Emp_ID` int(11) DEFAULT NULL,
  `Treat_Startdate` date DEFAULT NULL,
  `Treat_Enddate` date DEFAULT NULL,
  `clinical_Sing` varchar(255) DEFAULT NULL,
  `Physical_Examination` varchar(255) DEFAULT NULL,
  `Laborary_Test` varchar(255) DEFAULT NULL,
  `Diagnosis` varchar(255) DEFAULT NULL,
  `Therapentic_plan` varchar(255) DEFAULT NULL,
  `Heart_rate` int(11) DEFAULT NULL,
  `Temperature` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`Treat_ID`, `Pet_ID`, `Emp_ID`, `Treat_Startdate`, `Treat_Enddate`, `clinical_Sing`, `Physical_Examination`, `Laborary_Test`, `Diagnosis`, `Therapentic_plan`, `Heart_rate`, `Temperature`) VALUES
(4001, 1002, 3001, '2024-01-01', '2024-01-01', 'ตัวร้อนกว่าปกติ', 'อุณหภูมิร่างกายสูงกว่าเกณฑ์', 'ไข้', 'ไข้ในแมว', 'ฉีดวัดซีน', 231, 42),
(4002, 1003, 3002, '2024-01-01', '2024-01-01', 'หายใจเร็วเกินไป', 'หายใจถี่หรือติดขัด', 'ช็อกอากาศร้อน', 'ไข้ในแมว', 'ฉีดวัดซีน', 183, 35);

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `Type_ID` int(11) NOT NULL,
  `Type_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`Type_ID`, `Type_Name`) VALUES
(14001, 'Pet food'),
(14002, 'Medication'),
(14003, 'Pet Supplies'),
(14004, 'Hospital Facilities');

-- --------------------------------------------------------

--
-- Table structure for table `work_schedule`
--

CREATE TABLE `work_schedule` (
  `Work_ID` int(11) NOT NULL,
  `Emp_ID` int(11) DEFAULT NULL,
  `Work_Date` varchar(255) DEFAULT NULL,
  `Start_Time` time DEFAULT NULL,
  `End_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_schedule`
--

INSERT INTO `work_schedule` (`Work_ID`, `Emp_ID`, `Work_Date`, `Start_Time`, `End_Time`) VALUES
(8001, 3001, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8002, 3002, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8003, 3003, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8004, 3004, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8005, 3005, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8006, 3006, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8007, 3007, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8008, 3008, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8009, 3009, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8010, 3010, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8011, 3011, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8012, 3012, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8013, 3013, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8014, 3014, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8015, 3015, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8016, 3016, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8017, 3017, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8018, 3018, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8019, 3019, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8020, 3020, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8021, 3021, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8022, 3022, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8023, 3023, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8024, 3024, 'จันทร์-เสาร์', '12:00:00', '06:00:00'),
(8025, 3025, 'จันทร์-เสาร์', '12:00:00', '06:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`App_ID`),
  ADD KEY `Treat_ID` (`Treat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUS_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD KEY `Position_ID` (`Position_ID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Equ_ID`);

--
-- Indexes for table `follow_up`
--
ALTER TABLE `follow_up`
  ADD PRIMARY KEY (`Follow_ID`),
  ADD KEY `CUS_ID` (`CUS_ID`),
  ADD KEY `Treat_ID` (`Treat_ID`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`Drug_ID`);

--
-- Indexes for table `medication_list`
--
ALTER TABLE `medication_list`
  ADD PRIMARY KEY (`med_list_id`),
  ADD KEY `Drug_ID` (`Drug_ID`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`Membership_ID`),
  ADD KEY `CUS_ID` (`CUS_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Emp_ID` (`Emp_ID`),
  ADD KEY `CUS_ID` (`CUS_ID`),
  ADD KEY `Ser_list_ID` (`Ser_list_ID`),
  ADD KEY `Equ_ID` (`Equ_ID`),
  ADD KEY `Treat_ID` (`Treat_ID`),
  ADD KEY `Pre_ID` (`Pre_ID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`Pet_ID`),
  ADD KEY `CUS_ID` (`CUS_ID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`Position_ID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`Pre_ID`),
  ADD KEY `med_list_id` (`med_list_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Prc_ID`),
  ADD KEY `Type_ID` (`Type_ID`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`Pro_list_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Prc_ID` (`Prc_ID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Receipt_ID`),
  ADD KEY `App_ID` (`App_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Ser_ID`);

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`Ser_list_ID`),
  ADD KEY `Ser_ID` (`Ser_ID`),
  ADD KEY `Emp_ID` (`Emp_ID`),
  ADD KEY `Pet_ID` (`Pet_ID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`Treat_ID`),
  ADD KEY `Pet_ID` (`Pet_ID`),
  ADD KEY `Emp_ID` (`Emp_ID`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`Type_ID`);

--
-- Indexes for table `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD PRIMARY KEY (`Work_ID`),
  ADD KEY `Emp_ID` (`Emp_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `Membership_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15004;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `Pet_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `Pro_list_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Treat_ID`) REFERENCES `treatment` (`Treat_ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`Position_ID`) REFERENCES `positions` (`Position_ID`);

--
-- Constraints for table `follow_up`
--
ALTER TABLE `follow_up`
  ADD CONSTRAINT `follow_up_ibfk_1` FOREIGN KEY (`CUS_ID`) REFERENCES `customer` (`CUS_ID`),
  ADD CONSTRAINT `follow_up_ibfk_2` FOREIGN KEY (`Treat_ID`) REFERENCES `treatment` (`Treat_ID`);

--
-- Constraints for table `medication_list`
--
ALTER TABLE `medication_list`
  ADD CONSTRAINT `medication_list_ibfk_1` FOREIGN KEY (`Drug_ID`) REFERENCES `medication` (`Drug_ID`);

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_ibfk_1` FOREIGN KEY (`CUS_ID`) REFERENCES `customer` (`CUS_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employees` (`Emp_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`CUS_ID`) REFERENCES `customer` (`CUS_ID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Ser_list_ID`) REFERENCES `service_list` (`Ser_list_ID`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`Equ_ID`) REFERENCES `equipment` (`Equ_ID`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`Treat_ID`) REFERENCES `treatment` (`Treat_ID`),
  ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`Pre_ID`) REFERENCES `prescription` (`Pre_ID`);

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`CUS_ID`) REFERENCES `customer` (`CUS_ID`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`med_list_id`) REFERENCES `medication_list` (`med_list_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `type_product` (`Type_ID`);

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `product_list_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`),
  ADD CONSTRAINT `product_list_ibfk_2` FOREIGN KEY (`Prc_ID`) REFERENCES `product` (`Prc_ID`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`App_ID`) REFERENCES `appointment` (`App_ID`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`);

--
-- Constraints for table `service_list`
--
ALTER TABLE `service_list`
  ADD CONSTRAINT `service_list_ibfk_1` FOREIGN KEY (`Ser_ID`) REFERENCES `service` (`Ser_ID`),
  ADD CONSTRAINT `service_list_ibfk_2` FOREIGN KEY (`Emp_ID`) REFERENCES `employees` (`Emp_ID`),
  ADD CONSTRAINT `service_list_ibfk_3` FOREIGN KEY (`Pet_ID`) REFERENCES `pet` (`Pet_ID`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`Pet_ID`) REFERENCES `pet` (`Pet_ID`),
  ADD CONSTRAINT `treatment_ibfk_2` FOREIGN KEY (`Emp_ID`) REFERENCES `employees` (`Emp_ID`);

--
-- Constraints for table `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD CONSTRAINT `work_schedule_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employees` (`Emp_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
