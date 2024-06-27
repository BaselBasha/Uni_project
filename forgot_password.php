<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/signup.css">
    <link rel="stylesheet" href="./styles/nav-fotter.css">
    <link rel="stylesheet" href="./styles/forgot-pass.css">

    <script>
        const loggedIn = <?php echo json_encode($loggedIn); ?>;

        function checkTheService() {
            const services = document.getElementById('service-select');
            const selectedValue = services.value;

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
                <img src="./imgs/gaza-logo.pngb.png" alt="" style="width: 50px;">
            </div>
            <div class="nav-links" style="flex-direction: row-reverse;">
            <ul>
                <li><a href="/GAZA/places.php">أهم المعالم</a></li>
                <li><a href="/GAZA/edu.php">التعليم</a></li>
                <li><a href="/Gaza/health.php">الصحة</a></li>
                <select id="service-select" onchange="checkTheService()">
                    <option value="" disabled selected>الخدمات</option>
                    <option value="electric-bill">فاتورة الكهرباء</option>
                    <option value="water-bill">فاتورة الماء</option>
                </select>
                <li><a href="/GAZA/main.php">الرئيسية</a></li>
            </ul>
        </div>
            <div class="login">
                <a href="/GAZA/login.html">تسجيل الدخول</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="form-container">
            <h1>اعادة تعيين كلمة المرور </h1>
            <form action="server/forgot_password.php" method="post">
                رقم الهوية <input type="text" name="user-id" required> <br>
                  كلمة السر الجديدة<input type="password" name="new-password" required> <br>
                  كلمة السر الجديدة<input type="password" name="repeat-new-password" required> <br>
                <input type="submit" value=" تحديث كلمة المرور">
            </form>
    </div>
    <div class="img-containerr"></div>



    
</body>
</html>
