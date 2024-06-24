<?php
include 'databaseConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user-id'];
    $new_password = $_POST['new-password'];
    $repeat_new_password = $_POST['repeat-new-password'];

    // Check for empty fields
    if (empty($user_id) || empty($new_password) || empty($repeat_new_password)) {
        die("All fields are required.");
    }

    if (!ctype_digit($user_id)) {
        die("User ID must be numeric.");
    }

    if (strlen($new_password) < 8) {
        die("New password must be at least 8 characters long.");
    }

    if ($new_password !== $repeat_new_password) {
        die("Passwords do not match.");
    }

    $user_id = mysqli_real_escape_string($conn, $user_id);
    $new_password = mysqli_real_escape_string($conn, $new_password);

    $sql = "UPDATE users SET password='$new_password' WHERE id='$user_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Password updated successfully";
        echo '<script>
                setTimeout(function() {
                    window.location.href = "../login.html";
                }, 3000);
              </script>';
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
