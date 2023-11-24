<!DOCTYPE html>
<html>

<head>
  <title>Events</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="index.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <?php
  include('dbcon.php');
  $query = $conn->query("SELECT * FROM events ORDER BY id");
  ?>
  <script>
    $(document).ready(function() {
      var calendar = $('#calendar').fullCalendar({
        editable: false, // Disable editing
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        events: [<?php while ($row = $query->fetch_object()) { ?> {
            id: '<?php echo $row->id; ?>',
            title: '<?php echo $row->title; ?>',
            start: '<?php echo $row->start_event; ?>',
            end: '<?php echo $row->end_event; ?>',
          }, <?php } ?>],
        selectable: false, // Disable selecting
        selectHelper: false, // Disable select helper
      });
    });
  </script>
  <style>
    #cpc-heading-container {
      position: relative;
    }

    #cpc-heading-image {
      width: 100%;
      height: 250px;
    }

    #cpc-heading {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #f0f0f0;
      font-size: 12rem;
      font-weight: bold;
      text-transform: uppercase;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.8), 0 0 30px rgba(255, 255, 255, 0.8);
    }
  </style>

  <script>
    $(document).ready(function() {
      var heading = $('#cpc-heading');

      heading.mousemove(function(e) {
        var xOffset = e.pageX / heading.width() - 0.5;
        var yOffset = e.pageY / heading.height() - 0.5;

        var shadowColor = getRandomColor();
        var shadow = xOffset * 20 + 'px ' + yOffset * 20 + 'px 10px ' + shadowColor;

        heading.css('text-shadow', shadow);
      });

      function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
          color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
      }
    });
  </script>
</head>

<body>
  <style>
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
  <header>
    <nav class="navbar">
      <div class="logo">ClassPro</div>
      <ul class="nav-links">
        <input type="checkbox" id="checkbox_toggle">
        <label for="checkbox_toggle" class="three-line">&#9776;</label>
        <div class="menu">
          <li><a href="/classPro/form/dashboard.php">Home</a></li>
          <li><a href="/classPro/pages/about2.html">About</a></li>
          <li class="services">
            <a href="/">Features</a>
            <ul class="dropdown">
              <li><a href="/">Student Data Analysis</a></li>
              <li><a href="/classPro/calender/index.php">Events</a></li>
              <li><a href="/">Grades</a></li>
              <li><a href="/">Assignments</a></li>
              <li><a href="/">Progress Tracking</a></li>
              <li><a href="/">Communication Platform</a></li>
            </ul>
          </li>
          <li><a href="/">Contact</a></li>
        </div>
      </ul>
    </nav>
  </header>
  <div id="cpc-heading-container">
    <!-- Add your image with a specific width and height -->
    <img id="cpc-heading-image" src="image.jpg" alt="Event Image">

    <!-- Heading on top of the image -->
    <h1 id="cpc-heading">Events</h1>
  </div>
  <br />
  <div class="container">
    <div id="calendar"></div>
  </div>
</body>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<style>
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
</style>
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

</html>