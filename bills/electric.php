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
$sql = "SELECT * FROM electric_bill WHERE user_id = '$user_id'";
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
    <link rel="stylesheet" href="../styles/nav-fotter.css">
</head>

<body>

<header>
    <h1>فاتورة الكهرباء</h1>
</header>

<div class="nav">
    <div class="nav-items">
        <div class="logo">
            <img src="./imgs/gaza-logo.pngb.png" alt="" style="width: 50px;">
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="/GAZA/places.php">أهم المعالم</a></li>
                <li><a href="#">التعليم والصحة</a></li>
                <select id="service-select" onchange="checkTheService()">
                    <option value="" disabled selected>الخدمات</option>
                    <option value="electric-bill">فاتورة الكهرباء</option>
                    <option value="water-bill">فاتورة الماء</option>
                </select>
                <li><a href="/GAZA/main-user.php">الرئيسية</a></li>
            </ul>
        </div>
        <div class="login">
            <select id="user-options" onchange="handleUserOptionsChange()">
                <option value="" disabled selected><?php echo htmlspecialchars(" مرحبا" . " , " . $username); ?></option>
                <option value="logout" >تسجيل الخروج</option>
            </select>
        </div>
    </div>
</div>

<table border="1">
    <thead>
        <tr>
            <th>رقم الفاتورة</th>
            <th>المبلغ</th>
            <th>التاريخ</th>
            <th>الحالة</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['electric_bill_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['amount']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status'] ? 'مدفوعة' : 'غير مدفوعة') . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<footer>
    <p>© 2023 حقوق الطبع والنشر محفوظة</p>
</footer>


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
        const services = document.getElementById('service-select'); // Corrected spelling
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
