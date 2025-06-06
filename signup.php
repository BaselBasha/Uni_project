<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/signup.css">
    <link rel="stylesheet" href="./styles/nav-fotter.css">

    <script>
        const loggedIn = <?php echo json_encode($loggedIn); ?>;

        function checkTheService() {
            const services = document.getElementById('service-select');
            const selectedValue = services.value;

            if (!loggedIn) {
                window.location.href = '/GAZA/login.php';
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
                <img src="./imgs/gaza-logo.pngb.png" alt="" style="width: 50px;">
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#">الرئيسية</a></li>
                    <li><a href="/GAZA/places.php">أهم المعالم</a></li>
                    <li><a href="/GAZA/edu.php">التعليم</a></li>
                    <li><a href="/Gaza/health.php">الصحة</a></li>
                </ul>
            
                <select id="service-select" onchange="checkTheService()">
                    <option value="" disabled selected>الخدمات</option>
                    <option value="electric-bill">فاتورة الكهرباء</option>
                    <option value="water-bill">فاتورة الماء</option>
                </select>
            </div>
            <div class="login">
                <a href="/GAZA/login.html">تسجيل الدخول</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="form-container">
            <h1>إنشاء حساب</h1>
            <form action="./server/signup.php" method="post">
                <label for="user-id">رقم الهوية</label>
                <input type="text" name="user-id" id="user-id" autocomplete="off"> 
                <label for="first-name">الاسم الأول</label>
                <input type="text" name="first-name" id="first-name"> 
                <label for="last-name">الاسم الثاني</label>
                <input type="text" name="last-name" id="last-name">
                <label for="location">العنوان</label>
                <input type="text" name="location" id="location"> 
                <label for="birth-date">تاريخ الميلاد</label>
                <input type="text" name="birth-date" id="birth-date">
                <label for="email">البريد الإلكتروني</label>
                <input type="text" name="email" id="email">
                <label for="password">كلمة المرور</label>
                <input type="password" name="password" id="password">
                <label for="password2">تأكيد كلمة المرور</label>
                <input type="password" name="password2" id="password2">
                <input type="submit" value="إنشاء حساب">
            </form> 
        </div>
        <div class="img-container"></div>
    </div>
</body>
</html>