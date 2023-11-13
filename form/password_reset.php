<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Recovery</title>
  <style>
    body {
      font-family: cursive;
      /* Change the font-family */
      background-color: #d1fceb;
      /* Use the background color from the previous CSS */
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    div {
      background-color: #fff;
      padding: 40px;
      /* Use the padding from the previous CSS */
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 800px;
      margin: 0 auto;
      text-align: center;
    }

    a {
      display: inline-block;
      padding: 12px 24px;
      background-color: #1f1f1f;
      color: #fff;
      font-size: 18px;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      margin-top: 20px;
      /* Adjusted margin */
    }

    a:hover {
      background-color: #bedb3d;
    }
  </style>
</head>

<body>
  <div>
    <h2>Password Recovered</h2>
    <?php if (isset($_GET['password'])) : ?>
      <p>Your password is: <?php echo htmlspecialchars($_GET['password']); ?></p>
    <?php else : ?>
      <p>Password not found.</p>
    <?php endif; ?>
    <a href="login.html">Next</a> <!-- Link to go back to login.html -->
  </div>
</body>

</html>