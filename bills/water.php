<?php
session_start();
include '../server/databaseConn.php';

// Check if the user is logged in and retrieve the user ID
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
} else {
    // Redirect to login page if not logged in
    header("Location: ../login.html");
    exit();
}

// Query to get the electric bills for the logged-in user
$sql = "SELECT * FROM water_bill WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة الكهرباء</title>
    <link rel="stylesheet" href="./styles/signup.css">
    <link rel="stylesheet" href="../styles/nav-fotter.css">
    <link rel="stylesheet" href="../styles/water.css">
    <style>
        text {
            display: none;
        }
    </style>
</head>
<body>
<div class="nav">
    <div class="nav-items">
        <div class="logo">
            <img src="./imgs/gaza-logo.pngb.png" alt="" style="width: 50px;">
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="/GAZA/places.php">أهم المعالم</a></li>
                <li><a href="/GAZA/edu.php">التعليم</a></li>
                <li><a href="/Gaza/health.php">الصحة</a></li>
                <select id="service-select" onchange="checkTheService()">
                    <option value="" disabled selected>الخدمات</option>
                    <option value="electric-bill">فاتورة الكهرباء</option>
                    <option value="water-bill">فاتورة الماء</option>
                </select>
                <li><a href="/GAZA/main-user.php">الرئيسية</a></li>
            </ul>
        </div>
        <div class="login" style="border: none">
            <select id="user-options" onchange="handleUserOptionsChange()" style="width: fit-content;">
                <option value="" disabled selected><?php echo htmlspecialchars(" مرحبا" . " , " . $username); ?></option>
                <option value="logout">تسجيل الخروج</option>
            </select>
        </div>
    </div>
</div>
<div class="electric-container">
    <div class="left"></div>
    <div class="right">
        <div class="title">
            <h1>فاتورة الماء</h1>
        </div>
        <div class="data">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>رقم الفاتورة: <span>" . htmlspecialchars($row['water_bill_id']) . "</span></p>";
                echo "<p>المبلغ: <span>" . htmlspecialchars($row['amount']) . "</span></p>";
                echo "<p>التاريخ: <span>" . htmlspecialchars($row['date']) . "</span></p>";
                echo "<p>الحالة: <span>" . htmlspecialchars($row['status'] ? 'مدفوعة' : 'غير مدفوعة') . "</span></p>";
            }
            ?>
        </div>
    </div>
</div>

<script>
    function handleUserOptionsChange() {
        const userOptions = document.getElementById('user-options');
        const selectedValue = userOptions.value;

        if (selectedValue === 'logout') {
            window.location.href = '/GAZA/server/logout.php';
        } else if (selectedValue === 'profile') {
            window.location.href = 'profile.php';
        }
    }

    function checkTheService() {
        const services = document.getElementById('service-select');
        const selectedValue = services.value;
        if (selectedValue === 'electric-bill') {
            window.location.href = '/GAZA/bills/electric.php';
        } else if (selectedValue === 'water-bill') {
            window.location.href = '/GAZA/bills/water.php';
        }
        services.selectedIndex = 0;
    }
</script>

</body>
</html>