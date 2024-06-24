<?php
include 'databaseConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $first_name = $_POST['f-name'];
    $last_name = $_POST['l-name'];
    $password = $_POST['pwd'];
    $repeat_password = $_POST['pwd2'];

    if (empty($id) || empty($first_name) || empty($last_name) || empty($password) || empty($repeat_password)) {
        die("All fields are required.");
    }

    if (!ctype_digit($id)) {
        die("ID must be numeric.");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long.");
    }

    if ($password !== $repeat_password) {
        die("Passwords do not match.");
    }

    $id = mysqli_real_escape_string($conn, $id);
    $first_name = mysqli_real_escape_string($conn, $first_name);
    $last_name = mysqli_real_escape_string($conn, $last_name);
    $password = mysqli_real_escape_string($conn, $password);

    // Construct the SQL statement
    $sql = "INSERT INTO users (id, f_name, l_name, password) VALUES ('$id', '$first_name', '$last_name', '$password')";

    // Execute the statement
    if (mysqli_query($conn, $sql)) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
