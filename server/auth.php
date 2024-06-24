<?php
include 'databaseConn.php';

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
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"]. " - Name: " . $row["f_name"]. " " . $row["l_name"]. "<br>";
        }
    } else {
        echo "Invalid login credentials";
    }
    mysqli_close($conn);
}
?>
