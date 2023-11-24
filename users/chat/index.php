<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
  <title>forum</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="main.js"></script>
  <style>
    .cpl-out {
      border: none;
      background: none;
      color: #fff;
      cursor: pointer;
      text-decoration: none;
      font-family: inherit;
      font-size: inherit;
    }

    .cpl-out:hover {
      color: #4ca9a9;
    }

    footer {
      background: #333;
      color: #fff;
      padding: 40px 0;
      text-align: center;
      margin-bottom: 0px;
    }

    .footer-content {
      padding: 0 20px;
    }

    .footer-content h3 {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .footer-content p {
      font-size: 14px;
      margin-bottom: 20px;
    }

    .socials {
      list-style: none;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 30px;
    }

    .socials li {
      margin: 0 10px;
    }

    .socials a {
      text-decoration: none;
      color: #fff;
      border: 2px solid #fff;
      padding: 8px;
      border-radius: 50%;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .socials a i {
      font-size: 20px;
      width: 20px;
    }

    .socials a:hover {
      background-color: #fff;
      color: #333;
    }

    .footer-menu {
      display: flex;
      justify-content: center;
      align-items: center;
      list-style: none;
      padding: 0;
      margin: 20px 0;
    }

    .footer-menu ul {
      display: flex;
      justify-content: center;
      align-items: center;
      /* Align items vertically in the middle */
      margin: 20px 0;
      padding: 0;
      list-style: none;
    }

    .footer-menu ul li {
      margin: 15px;
      /* Add space between menu items */
    }

    .footer-menu ul li a {
      color: #ccc;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-menu ul li a:hover {
      color: #fff;
    }

    .footer-menu-item {
      margin: 10px;
      color: #fff;
      text-decoration: none;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: cursive;
    }

    a {
      text-decoration: none;
    }

    li {
      list-style: none;
    }

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      background-color: #9896f1;
      color: #fff;
    }

    .nav-links a {
      color: #fff;
    }

    .logo {
      font-size: 32px;
    }

    .menu {
      display: flex;
      gap: 1em;
      font-size: 18px;
    }

    .menu li {
      padding: 5px 14px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .menu li:hover {
      background-color: #4ca9a9;
    }

    .services {
      position: relative;
    }

    .dropdown {
      background-color: #018585;
      padding: 1em 0;
      position: absolute;
      display: none;
      border-radius: 8px;
      top: 35px;
      z-index: 1;
    }

    .dropdown-group {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 10px;
    }

    .dropdown-group li {
      margin: 5px 0;
    }

    .dropdown li+li {
      margin-top: 10px;
    }

    .dropdown li {
      padding: 0.5em 1em;
      width: 8em;
      text-align: center;
    }

    .dropdown li:hover {
      background-color: #4ca9a9;
    }

    .services:hover .dropdown {
      display: block;
    }

    input[type="checkbox"] {
      display: none;
    }

    .three-line {
      display: none;
      font-size: 24px;
      user-select: none;
    }

    @media (max-width: 768px) {
      .menu {
        display: none;
        position: absolute;
        background-color: #9896f1;
        right: 0;
        left: 0;
        text-align: center;
        padding: 16px 0;
      }

      .menu li:hover {
        display: inline-block;
        background-color: #4ca9a9;
        transition: background-color 0.3s ease;
      }

      .menu li+li {
        margin-top: 12px;
      }

      input[type="checkbox"]:checked~.menu {
        display: block;
      }

      .three-line {
        display: block;
      }

      .dropdown {
        left: 50%;
        top: 30px;
        transform: translateX(-50%);
      }

      .dropdown li:hover {
        background-color: #8ef6e4;
      }
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo">ClassPro</div>
      <ul class="nav-links">
        <input type="checkbox" id="checkbox_toggle">
        <label for="checkbox_toggle" class="three-line">&#9776;</label>
        <div class="menu">
          <li><a href="/users/login/dashboard.php">Home</a></li>
          <li><a href="/users/pages/aboutus/about2.html">About Us</a></li>
          <li class="services">
            <a href="/">Features</a>
            <ul class="dropdown">
              <li><a href="/">Student Data Analysis</a></li>
              <li><a href="/classPro/calender/index.php">Events</a></li>
              <li><a href="/">Grades</a></li>
              <li><a href="/">Assignments</a></li>
              <li><a href="/">Progress Tracking</a></li>
              <li><a href="/users/users/chat/index.php">Chat</a>
          </li>
      </ul>
      </li>
      </div>
      </ul>
    </nav>
  </header>

  <!-- Modal -->
  <div id="ReplyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reply Question</h4>
        </div>
        <div class="modal-body">
          <form name="frm1" method="post">
            <input type="hidden" id="commentid" name="Rcommentid">
            <div class="form-group">
              <label for="usr">Write your name:</label>
              <input type="text" class="form-control" name="Rname" required>
            </div>
            <div class="form-group">
              <label for="comment">Write your reply:</label>
              <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
            </div>
            <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
          </form>
        </div>
      </div>

    </div>
  </div>

  <div class="container">

    <div class="panel panel-default" style="margin-top:50px">
      <div class="panel-body">
        <h3>Community forum</h3>
        <hr>
        <form name="frm" method="post">
          <input type="hidden" id="commentid" name="Pcommentid" value="0">
          <div class="form-group">
            <label for="usr">Write your name:</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label for="comment">Write your question:</label>
            <textarea class="form-control" rows="5" name="msg" required></textarea>
          </div>
          <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
        </form>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Recent questions</h4>
        <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
          <tbody id="record">

          </tbody>
        </table>
      </div>
    </div>

  </div>
  <footer>
    <div class="footer-content">
      <h3>ClassPro</h3>
      <p>
        ClassPro is a platform that helps students to learn and improve their skills.
      </p>
      <ul class="socials">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
      </ul>
      <ul class="footer-menu">
        <li><a href="#" class="footer-menu-item">Home</a></li>
        <li><a href="#" class="footer-menu-item">About</a></li>
        <li><a href="#" class="footer-menu-item">Contact</a></li>
        <li><a href="#" class="footer-menu-item">Blog</a></li>
      </ul>
    </div>
  </footer>
</body>

</html>