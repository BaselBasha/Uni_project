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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/nav-fotter.css">
    <link rel="stylesheet" href="./styles/health.css">
</head>
<body>
    <div class="nav" style="background-color: #025159;">
        <div class="nav-items">
            <div class="logo">
                <img src="./imgs/whitelogo.png" alt="" style="width: 50px;">
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

    <div class="health-main-section">
        <div class="img-sec">
            <h1>مستشفيات قطاع غزة</h1>
        </div>
    </div>
    <div class="hospitals">
        <div class="hospital">
            <div class="hospital-img hos-1"></div>
            <div class="hospital-text">
                <h1>
                    المستشفى الاوروبي
                </h1>
                <p>المدينة: غزة</p>
                <p>تواصل: +9705315312214</p>
            </div>
        </div>
        <div class="hospital">
            <div class="hospital-text">
                <h1>
                    مستشفى الشفاء الطبي
                </h1>
                <p>المدينة: غزة</p>
                <p>تواصل: +9705315312214</p>
            </div>
            <div class="hospital-img hos-2"></div>
        </div>
        <div class="hospital">
            <div class="hospital-img hos-3"></div>
            <div class="hospital-text">
                <h1>
                    مستشفى الكويتي التخصصي
                </h1>
                <p>المدينة: رفح</p>
                <p>تواصل: +9705315312214</p>
            </div>
        </div>
        <div class="hospital">
            <div class="hospital-text">
                <h1>
                     المستشفى الاندونيسي
                </h1>
                <p>المدينة: بيت لاهيا</p>
                <p>تواصل: +9705315312214</p>
            </div>
            <div class="hospital-img hos-4"></div>
        </div>
    </div>
</body>
</html>