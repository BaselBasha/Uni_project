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
    <link rel="stylesheet" href="./styles/main.css">
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

        function services() {
            if (!loggedIn) {
                window.location.href = '/GAZA/login.html';
                return;
            } else {
                window.location.href = '/bills/electric.php';
            }
        }

        function health() {
            if (!loggedIn) {
                window.location.href = '/GAZA/login.html';
                return;
            } else {
                window.location.href = './GAZA/health.php';
            }
        }

        function edu() {
            if (!loggedIn) {
                window.location.href = '/GAZA/login.html';
                return;
            } else {
                window.location.href = '/GAZA/edu.php';
            }
        }

        function tourism() {
            if (!loggedIn) {
                window.location.href = '/GAZA/login.html';
                return;
            } else {
                window.location.href = '/GAZA/tourism.php';
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
                <li><a href="#">التعليم والصحة</a></li>
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

<div class="main-section">
    <div class="main-img"> </div>
    <div class="header">
        <h1>اكتشف غزة</h1>
    </div>
    <div class="cards">
        <div class="card" onclick="services()">
            <img src="./imgs/hands.jpg" alt="" style= "width: 100%">
            <div class="card__content">
                <p class="card__title">خدمات المواطنين</p>
                <p class="card__description">يقدم هذا القسم مجموعة من الخدمات للمواطنين مثل طلبات الوثائق الرسمية، الاستشارات القانونية، والمساعدة الاجتماعية، بهدف تلبية احتياجاتهم اليومية بسهولة ويسر.</p>
            </div>
            <h2>خدمات المواطنين</h2>
        </div>
        <div class="card" onclick="health()">
            <img src="./imgs/hospital.jpg" alt="" style= "width: 93%">
            <div class="card__content">
                <p class="card__title">القطاع الصحي</p>
                <p class="card__description"> يحتوي هذا القسم على معلومات حول المرافق الصحية والخدمات الطبية المتاحة، بما في ذلك المستشفيات، العيادات، والخدمات الطبية الطارئة لضمان صحة وسلامة المواطنين.</p>
            </div>
            <h2>القطاع الصحي</h2>
        </div>
        <div class="card" onclick="edu()">
            <img src="./imgs/uni.jpg" alt="" style= "width: 105%">
            <div class="card__content">
                <p class="card__title">قطاع التعليم</p>
                <p class="card__description">يوفر هذا القسم معلومات عن المؤسسات التعليمية، البرامج الأكاديمية، والمنح الدراسية المتاحة لدعم التعليم وتطوير المهارات بين جميع الفئات العمرية.</p>
            </div>
            <h2>قطاع التعليم</h2>
        </div>
        <div class="card" onclick="tourism()">
            <img src="./imgs/basha.jpg" alt="" style= "width: 95%">
            <div class="card__content">
                <p class="card__title">أهم معالم غزة</p>
                <p class="card__description">يعرض هذا القسم أبرز المعالم التاريخية والثقافية في غزة، بما في ذلك المتاحف، المواقع الأثرية، والمعالم السياحية التي تعكس تاريخ وثقافة المدينة العريق.</p>
            </div>
            <h2>أهم معالم غزة</h2>
        </div>
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
