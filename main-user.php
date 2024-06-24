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
    <link rel="stylesheet" href="./styles/nav-fotter.css">
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
</head>
<body>

<div class="nav">
    <div class="nav-items">
        <div class="logo">
            <h3>logo</h3>
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="#">الرئيسية</a></li>
                <li><a href="/GAZA/places.php">أهم المعالم</a></li>
                <li><a href="#">التعليم والصحة</a></li>
            </ul>
        
            <select id="service-select" onchange="checkTheService()">
                <option value="" disabled selected>صفحة الخدمات</option>
                <option value="electric-bill">فاتورة الكهرباء</option>
                <option value="water-bill">فاتورة الماء</option>
            </select>
        </div>
        <div class="login">
            <select id="user-options" onchange="handleUserOptionsChange()">
                <option value="" disabled selected><?php echo htmlspecialchars(" مرحبا" . " , " . $username); ?></option>
                <option value="logout">تسجيل الخروج</option>
            </select>
        </div>
    </div>
</div>

<footer>
    <p>© 2023 حقوق الطبع والنشر محفوظة</p>
</footer>

</body>
</html>
