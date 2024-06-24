<?php
session_start();
include '../server/databaseConn.php';

// Check if the user is logged in and retrieve the user ID
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $user_id = $_SESSION['user_id'];
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
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

<header>
    <h1>فاتورة الكهرباء</h1>
</header>

<nav>
    <a href="../main-user.php">الرئيسية</a>
    <a href="../places.php">أهم المعالم</a>
    <a href="#">التعليم والصحة</a>
    <select id="service-select" onchange="checkTheService()">
        <option value="" disabled selected>صفحة الخدمات</option>
        <option value="electric-bill">فاتورة الكهرباء</option>
        <option value="water-bill">فاتورة الماء</option>
    </select>
    <select id="user-options" onchange="handleUserOptionsChange()">
        <option value="" disabled selected><?php echo htmlspecialchars($_SESSION['username']); ?></option>
        <option value="logout">تسجيل الخروج</option>
        <option value="profile">صفحتي</option>
    </select>
</nav>

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
