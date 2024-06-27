<?php
session_start();

// Check if the user is logged in and retrieve the username
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $username = $_SESSION['username'];
    $loggedIn = true;
} else {
    $loggedIn = false;
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
    <link rel="stylesheet" href="./styles/service.css">
    

    <script>
        const loggedIn = <?php echo json_encode($loggedIn); ?>;

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

        function electric() {
            if (!loggedIn) {
                window.location.href = '/GAZA/login.html';
                return;
            } else {
                window.location.href = '/GAZA/bills/electric.php';
            }
        }

        function water() {
            if (!loggedIn) {
                window.location.href = '/GAZA/login.html';
                return;
            } else {
                window.location.href = '/GAZA/bills/water.php';
            }
        }
    </script>
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
<div class="cards">
        <div class="card" onclick="electric()">
            <img src="./imgs/electric.webp" alt="" style= "width: 100%">
            <div class="card__content">
                <p class="card__title">الكهرباء </p>
                <p class="card__description"> هنا يمكنك عرض تاريخ فواتير الكهرباء الخاصة بك وحالتها الحالية، بالإضافة إلى معلومات حول استهلاك الكهرباء وأي تنبيهات أو إخطارات متعلقة بخدمات الكهرباء.</p>
            </div>
            <h2> الكهرباء</h2>
        </div>
        <div class="card" onclick="water()">
            <img src="./imgs/water1.webp" alt="" style= "width: 300px; height: 300px;">
            <div class="card__content">
                <p class="card__title">المياه</p>
                <p class="card__description">هنا يمكنك عرض تاريخ فواتير المياه الخاصة بك وحالتها الحالية، بالإضافة إلى معلومات حول استهلاك المياه وأي تنبيهات أو إخطارات متعلقة بخدمات المياه.</p>
            </div>
            <h2> المياه</h2>
        </div>
</div>

<div class="footer">
    <div class="contact-info">
        <div class="logo">
            <img src="./imgs/whitelogo.png" alt="" style="width: 70px;">
        </div>
        <div class="info">
            <p>غزة - فلسطين</p>
            <p>info@jenin.edu.ps</p>
            <p>+9705623232323</p>
        </div>
    </div>
    <div class="copyright">
        <p>جميع الحقوق محفوظة © 2023-2024.</p>
    </div>
</div>

</body>
</html>
