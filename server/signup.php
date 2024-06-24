<?php
session_start(); // Start the session
include 'databaseConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user-id'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $location = $_POST['location'];
    $birth_date = $_POST['birth-date'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['password2'];

    if (empty($user_id) || empty($first_name) || empty($last_name) || empty($password) || empty($repeat_password)) {
        die("All fields are required.");
    }

    if (!ctype_digit($user_id)) {
        die("ID must be numeric.");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long.");
    }

    if ($password !== $repeat_password) {
        die("Passwords do not match.");
    }
    $user_id = mysqli_real_escape_string($conn, $user_id);
    $first_name = mysqli_real_escape_string($conn, $first_name);
    $last_name = mysqli_real_escape_string($conn, $last_name);
    $location = mysqli_real_escape_string($conn, $location);
    $birth_date = mysqli_real_escape_string($conn, $birth_date);
    $email = mysqli_real_escape_string($conn, $email);
    $password_hashed = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO users (id, first_name, last_name, password, location, birth_date, email) 
            VALUES ('$user_id', '$first_name', '$last_name', '$password_hashed', '$location', '$birth_date', '$email')";

    if (mysqli_query($conn, $sql)) {
        // Set the session variable for the username
        $_SESSION['username'] = $first_name;
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
