<?php
session_start();
include 'databaseConn.php';

$error_message = ''; // متغير لتخزين رسالة الخطأ

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user-id'];
    $password = $_POST['password'];

    // To prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $user_id);
    $password = mysqli_real_escape_string($conn, $password);

    // Example query to check user credentials
    $sql = "SELECT * FROM users WHERE id = '$user_id' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Assuming passwords are stored in plain text
        if ($password === $row['password']) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['first_name']; // or whatever column contains the username
            $_SESSION['user_id'] = $row['id']; // set the user_id in session
            // Redirect to the user main page
            header("Location: ../main-user.php");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            $error_message = "بيانات الدخول غير صحيحة"; // تعيين رسالة الخطأ
        }
    } else {
        $error_message = "بيانات الدخول غير صحيحة"; // تعيين رسالة الخطأ
    }
    mysqli_close($conn);
}
?>
