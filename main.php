<?php
session_start();
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية</title>
    <link rel="stylesheet" href="./styles/style.css">
    <script>
        function checkTheService() {
            const services = document.getElementById('service-select');
            const selectedValue = services.value;
            const loggedIn = <?php echo json_encode($loggedIn); ?>;

            if (!loggedIn) {
                window.location.href = '/GAZA/login.html';
                return;
            }

            if (selectedValue === 'electric-bill') {
                window.location.href = '/GAZA/bills/electric.php';
            } else if (selectedValue === 'water-bill') {
                window.location.href = '/GAZA/bills/water.php';
            }
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
            <a href="/GAZA/login.html">تسجيل الدخول</a>
        </div>
    </div>
</div>



<footer>
    <p>© 2023 حقوق الطبع والنشر محفوظة</p>
</footer>

</body>
</html>
