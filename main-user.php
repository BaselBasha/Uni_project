<?php
session_start();

// Check if the user is logged in and retrieve the username
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $username = $_SESSION['username'];
} else {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية</title>
    <link rel="stylesheet" href="./styles/style.css">
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

</head>
<body>

<header>
    <h1>الشعار</h1>
</header>

<nav>
    <a href="#">الرئيسية</a>
    <a href="/GAZA/places.php">أهم المعالم</a>
    <a href="#">التعليم والصحة</a>
    <select id="service-select" onchange="checkTheService()">
        <option value="" disabled selected>صفحة الخدمات</option>
        <option value="electric-bill">فاتورة الكهرباء</option>
        <option value="water-bill">فاتورة الماء</option>
    </select>
    <select id="user-options" onchange="handleUserOptionsChange()">
        <option value="" disabled selected><?php echo htmlspecialchars($username); ?></option>
        <option value="logout" >تسجيل الخروج</option>
    </select>
</nav>

<footer>
    <p>© 2023 حقوق الطبع والنشر محفوظة</p>
</footer>

</body>
</html>
