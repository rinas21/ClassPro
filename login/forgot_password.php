<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $telephoneNumber = mysqli_real_escape_string($con, $_POST['telephone_number']);
  $nic = mysqli_real_escape_string($con, $_POST['nic']);

  $sql = "SELECT * FROM users WHERE username = '$username' AND telephone_number = '$telephoneNumber' AND nic = '$nic'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      // User found, you can implement password reset logic here
      $recoveredPassword = $row['password']; // Replace 'password' with your actual column name

      // Display recovered password on a new page
      header("Location: password_reset.php?password=" . urlencode($recoveredPassword));
      exit();
    } else {
      $error_message = "<h3 style='color:red;'>Invalid information. Please check your details.</h3>";
    }
  } else {
    $error_message = "Error: " . mysqli_error($con);
  }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: linear-gradient(to right, #2980b9, #6dd5fa, #ff5fff);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    h2 {
      text-align: center;
      color: #000;
    }

    form {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      width: 300px;
      position: relative;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input {
      width: 100%;
      padding: 12px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
      color: #333;
    }

    input[type="submit"] {
      background-color: #3498db;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #2980b9;
    }

    .forget-password {
      text-align: center;
      margin-top: 10px;
    }

    .forget-password a {
      color: #3498db;
      text-decoration: none;
      font-weight: bold;
    }

    .forget-password a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <form action="forgot_password.php" method="post">
    <h2>Forgot Password</h2>
    <?php if (isset($error_message)) : ?>
      <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <br>
    <label for="telephone_number">Telephone Number:</label>
    <input type="text" name="telephone_number" required>
    <br>
    <label for="nic">NIC:</label>
    <input type="text" name="nic" required>
    <br>
    <input type="submit" value="Recover Password">
    <div class="forget-password">
      <a href="login.html">Back to Login</a>
    </div>
  </form>
</body>

</html>