<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>
    <h1>Registration Successful!</h1>
    <p>You will be redirected to the login page shortly.</p>
    <script>
        setTimeout(function() {
            window.location.href = "../login.html";
        }, 3000); // 3 seconds
    </script>
</body>
</html>
