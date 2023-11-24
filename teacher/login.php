<?php
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Set the username and role in the session
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on the user role
            if ($row['role'] == 'teacher') {
                header("Location: index.html");
            } else {
                echo "Invalid role for the user.";
            }
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>