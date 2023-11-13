<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Redirect to the dashboard with user info
            header("Location: dashboard.php?username=" . urlencode($row['username']));
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
