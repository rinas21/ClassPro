<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Add your styles or link to an external stylesheet here -->
</head>

<body>
  <h2>Welcome to the Dashboard</h2>

  <?php
  // Retrieve the username from the URL
  $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';

  // You can fetch additional user information from the database based on the username
  // For example: $user_info = fetchUserInfo($username);

  // Display user information
  echo "<p>Hello, $username!</p>";
  // Display additional user information if available
  // echo "<p>Email: " . $user_info['email'] . "</p>";
  ?>

  <!-- Add more content to your dashboard as needed -->

</body>

</html>