<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="dashboard.css">
  <title>ClassPro - Home</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo">ClassPro</div>
      <ul class="nav-links">
        <input type="checkbox" id="checkbox_toggle">
        <label for="checkbox_toggle" class="three-line">&#9776;</label>
        <div class="menu">
          <li><a href="/">Home</a></li>
          <li><a href="/users/pages/aboutus/about2.html">About Us</a></li>
          <li class="services">
            <a href="/">Features</a>
            <ul class="dropdown">
              <li><a href="/classPro/performance/student_performance.html">Student Data Analysis</a></li>
              <li><a href="/classPro/calender/index.php">Events</a></li>
              <li><a href="/classPro/performance/summery/report.html">Summary Report</a></li>
              <li><a href="/">Assignments</a></li>
              <li><a href="/">Progress Tracking</a></li>
              <li><a href="/users/users/chat/index.php">Chat</a></li>
            </ul>
          </li>
          <li>
            <form action="logout.php" method="post">
              <input type="submit" value="Logout" class="cpl-out">
            </form>
          </li>
        </div>
      </ul>
    </nav>
  </header>
  <?php
  session_start();

  if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
  }
  ?>
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

    #usernameOneP {
      font-size: 24px;
      margin-bottom: 10px;
      margin-right: 10px;
      padding: 5px;
      border-bottom: 2px solid #333;
      position: relative;
      text-decoration: none;
    }

    #usernameOneP::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 2px;
      bottom: 0;
      left: 0;
      background: #333;
      box-shadow: 0 0 10px #333;
      transform-origin: bottom right;
      transition: transform 0.3s ease-in-out;
    }

    #usernameOneP:hover::after {
      transform: scaleX(0);
      /* Hide the underline on hover */
    }

    #icon-container {
      width: 50px;
      height: 50px;
      background-size: cover;
    }

    #greeting-container {
      display: flex;
      align-items: center;
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var greetingMessage = document.getElementById("usernameOneP");
      var iconContainer = document.getElementById("icon-container");
      var username = "<?php echo htmlspecialchars($_SESSION['username']); ?>"; // Replace with the actual username

      var currentTime = new Date().getHours();
      var greeting, icon;

      if (currentTime >= 0 && currentTime < 6) {
        greeting = "Good Night, " + username;
        icon = "night.png"; // Replace with your night icon image
      } else if (currentTime >= 6 && currentTime < 12) {
        greeting = "Good Morning, " + username;
        icon = "sunrise.png"; // Replace with your morning icon image
      } else if (currentTime >= 12 && currentTime < 18) {
        greeting = "Good Afternoon, " + username;
        icon = "after.png"; // Replace with your afternoon icon image
      } else {
        greeting = "Good Evening, " + username;
        icon = "sunset.png"; // Replace with your evening icon image
      }

      greetingMessage.textContent = greeting;
      iconContainer.style.backgroundImage = "url('" + icon + "')";
    });
  </script>
  <div id="greeting-container">
    <p id='usernameOneP'>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <div id="icon-container"></div>
  </div>
  <div class="body-section why-use-app">
    <h2>Why Use Our App?</h2>
    <div class="cpdo-container">
      <div class="cpdo-heading">
        <h1 class="cpdo-title">We can provide you with 1000 reasons but these are top 6 reasons.</h1>
      </div>
    </div>
    <div class="cpdo-cards">
      <div class="cpdo-card cpdo-card-1">
        <div class="cpdo-icon">1</div>
        <h2 class="cpdo-title">Effortless Class Management</h2>
        <p>Streamline your class administration with intuitive tools for scheduling, attendance, and assignments, creating a stress-free educational environment.</p>
      </div>
      <div class="cpdo-card cpdo-card-2">
        <div class="cpdo-icon">2</div>
        <h2 class="cpdo-title">Engaging Interactive Learning</h2>
        <p>Immerse students in an innovative learning experience with interactive modules that captivate and enhance overall comprehension.</p>
      </div>
      <div class="cpdo-card cpdo-card-3">
        <div class="cpdo-icon">3</div>
        <h2 class="cpdo-title">Insightful Analytics</h2>
        <p>Harness the power of data-driven insights for a comprehensive view of student performance, enabling informed decision-making and targeted interventions.</p>
      </div>
      <div class="cpdo-card cpdo-card-4">
        <div class="cpdo-icon">4</div>
        <h2 class="cpdo-title">Effective Communication</h2>
        <p>Foster a collaborative learning community through seamless communication channels among teachers, students, and parents, strengthening the educational support system.</p>
      </div>
      <div class="cpdo-card cpdo-card-5">
        <div class="cpdo-icon">5</div>
        <h2 class="cpdo-title">Increase Flexible Scheduling</h2>
        <p>Tailor your learning journey with flexible scheduling options, enabling students to customize study routines and learn at their own pace.</p>
      </div>
      <div class="cpdo-card cpdo-card-1">
        <div class="cpdo-icon">6</div>
        <h2 class="cpdo-title">User-Friendly Interface</h2>
        <p>Navigate the complexities of education effortlessly with a user-friendly interface designed for both educators and students.</p>
      </div>
    </div>

  </div>
  <style>
    .cpdo-container {
      padding: 30px;
    }

    /* HEADING */

    .cpdo-heading {
      text-align: center;
    }

    .cpdo-title {
      font-weight: 600;
      margin-top: -10px;
      text-align: right;
      /* Align the text to the right */
      padding-right: 5px;
    }


    .cpdo-credits {
      margin: 10px 0px;
      color: #888888;
      font-size: 25px;
      transition: all 0.5s;
    }

    .cpdo-link {
      text-decoration: none;
    }

    .cpdo-credits .cpdo-link {
      color: inherit;
    }

    /* CARDS */

    .cpdo-cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .cpdo-icon {
      color: #fff;
      font-size: 40px;
    }

    .cpdo-card {
      margin: 20px;
      padding: 20px;
      width: 500px;
      min-height: 200px;
      display: grid;
      grid-template-rows: 20px 50px 1fr 50px;
      border-radius: 10px;
      box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
      transition: all 0.2s;
    }

    .cpdo-card:hover {
      box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
      transform: scale(1.01);
      filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.8));
    }

    .cpdo-card__link,
    .cpdo-card__exit,
    .cpdo-card__icon {
      position: relative;
      text-decoration: none;
      color: rgba(255, 255, 255, 0.9);
    }

    .cpdo-card__link::after {
      position: absolute;
      top: 25px;
      left: 0;
      content: "";
      width: 0%;
      height: 3px;
      background-color: rgba(255, 255, 255, 0.6);
      transition: all 0.5s;
    }

    .cpdo-card__link:hover::after {
      width: 100%;
    }

    .cpdo-card__exit {
      grid-row: 1/2;
      justify-self: end;
    }

    .cpdo-card__icon {
      grid-row: 2/3;
      font-size: 30px;
      transition: transform 0.3s;
    }

    .cpdo-card:hover .cpdo-card__icon {
      transform: scale(1.2);
    }

    .cpdo-card__title {
      grid-row: 3/4;
      font-weight: 400;
      color: #ffffff;
    }

    .cpdo-card__apply {
      grid-row: 4/5;
      align-self: center;
    }

    /* CARD BACKGROUNDS */

    .cpdo-card-1 {
      background: radial-gradient(#1fe4f5, #3fbafe);
    }

    .cpdo-card-2 {
      background: radial-gradient(#fbc1cc, #fa99b2);
    }

    .cpdo-card-3 {
      background: radial-gradient(#76b2fe, #b69efe);
    }

    .cpdo-card-4 {
      background: radial-gradient(#60efbc, #58d5c9);
    }

    .cpdo-card-5 {
      background: radial-gradient(#f588d8, #c0a3e5);
    }

    /* RESPONSIVE */

    @media (max-width: 1600px) {
      .cpdo-cards {
        justify-content: center;
      }
    }
  </style>

  </div>

  <div class="body-section roadmap">
    <h2 class="body-section-head1">Journey towards future</h2>
    <div class="animation-container">
      <div class="growing"></div>
      <div class="animation-quote">
        <ul>
          <li>GET FOCUSED</li>
          <li>GET PREPARE</li>
          <li>WORK HARD & SMART</li>
          <li>ACHIEVE YOUR GOALS</li>
        </ul>
      </div>
      <div class="animation-button-div"><b>
          ALL JOURNEY BEGINS WITH A SMALL STEP!. <br>MAKE A STEP WITH ClassPro. </b><br><br><br>
        <a href="../pages/guide/guide.html" class="animation-button">Try your self</a>
      </div>
    </div>
    <style>
      .animation-button {
        display: inline-block;
        padding: 10px 20px;
        text-decoration: none;
        color: #ffffff;
        background-color: #007bff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }

      .animation-button:hover {
        background-color: #0056b3;
      }

      .body-section-head1 {
        margin: 10px;
      }

      .animation-container {
        position: relative;
        display: flex;
      }

      .growing {
        width: 150px;
        height: 150px;
        position: relative;
        clip-path: inset(-100vh 0);
        background-color: #527C96;
        overflow: hidden;
      }

      .animation-quote {
        margin-left: auto;
        padding-right: 20%;
      }

      .growing:before {
        content: "";
        display: block;
        width: 400%;
        height: 100%;
        background:
          /*1*/
          radial-gradient(farthest-side, #639510 97%, #0000) 12.5% 65%/12px 9px,
          linear-gradient(#996b52 0 0) 9% 80%/9.4% 9%,
          linear-gradient(#996b52 0 0) 10% 100%/7% 25%,
          linear-gradient(#639510 0 0) 12.5% 100%/5px 36%,
          /*2*/
          radial-gradient(farthest-side, #639510 97%, #0000) 35.5% 50%/15px 10px,
          radial-gradient(farthest-side, #639510 97%, #0000) 38% 64%/15px 10px,
          linear-gradient(#996b52 0 0) 35.5% 80%/9.4% 9%,
          linear-gradient(#996b52 0 0) 36% 100%/7% 25%,
          linear-gradient(#639510 0 0) 37% 100%/5px 52%,
          /*3*/
          radial-gradient(farthest-side, #fb3e4c 98%, #0000) 64.5% 40.5%/10px 9px,
          radial-gradient(farthest-side at bottom, #0000 calc(100% - 5px), #639510 0 100%, #0000) 63.6% 34%/20px 10px,
          radial-gradient(farthest-side, #639510 97%, #0000) 61% 50%/15px 10px,
          radial-gradient(farthest-side, #639510 97%, #0000) 63.5% 64%/15px 10px,
          linear-gradient(#996b52 0 0) 63.5% 80%/9.4% 9%,
          linear-gradient(#996b52 0 0) 63.1% 100%/7% 25%,
          linear-gradient(#639510 0 0) 62% 100%/5px 62%,
          /*4*/
          radial-gradient(farthest-side at 50% 4px, #fb3e4c 98%, #0000) 88.1% 17.5%/17px 13px,
          radial-gradient(farthest-side, #639510 97%, #0000) 87% 50%/15px 10px,
          radial-gradient(farthest-side, #639510 97%, #0000) 89.5% 38%/15px 10px,
          radial-gradient(farthest-side, #639510 97%, #0000) 89.5% 64%/15px 10px,
          linear-gradient(#996b52 0 0) 91% 80%/9.4% 9%,
          linear-gradient(#996b52 0 0) 90% 100%/7% 25%,
          linear-gradient(#639510 0 0) 87.5% 100%/5px 77%;
        background-repeat: no-repeat;
        animation: m 6s linear .5s both infinite;
        position: relative;
      }

      .growing:after {
        content: "";
        position: absolute;
        inset: -100vh 49px 42px 54px;
        background:
          conic-gradient(at 2px 50%, #0000 270deg, #fff 0) 0 0/8px 10px,
          conic-gradient(at 2px 50%, #0000 270deg, #fff 0) 4px 5px/8px 10px;
        animation: s 3s linear .3s both infinite;
      }

      .messages {
        text-align: center;
        font-size: 20px;
        margin-top: 20px;
      }

      @keyframes m {

        0%,
        20% {
          transform: translate(0%)
        }

        33.33%,
        53.33% {
          transform: translate(-24%)
        }

        66.66%,
        86.66% {
          transform: translate(-49.5%)
        }

        100% {
          transform: translate(-74.5%)
        }
      }

      @keyframes s {
        0% {
          inset: -100vh 49px 100vh 54px
        }

        10% {
          inset: -100vh 49px 42px 54px;
          opacity: 1
        }

        20% {
          inset: -100vh 49px 42px 54px;
          opacity: 0
        }

        20.01%,
        33.33% {
          inset: -100vh 49px 100vh 54px;
          opacity: 1
        }

        43.33% {
          inset: -100vh 49px 42px 54px;
          opacity: 1
        }

        53.33% {
          inset: -100vh 49px 42px 54px;
          opacity: 0
        }

        53.34%,
        66.66% {
          inset: -100vh 49px 100vh 54px;
          opacity: 1
        }

        76.66% {
          inset: -100vh 49px 42px 54px;
          opacity: 1
        }

        86.66%,
        100% {
          inset: -100vh 49px 42px 54px;
          opacity: 0
        }
      }
    </style>
  </div>

  <div class="body-section analytical-data">
    <h2>ClassPro Analytical Data Feature</h2>
    <div class="analytical-box">
      <div class="pie-chart" id="pieChart">

        <head>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {
              'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

              var data = google.visualization.arrayToDataTable([
                ['Feature Type', 'Usage'],
                ['Interactive Learning', 700],
                ['Progress Tracking', 300],
                ['Communication Platform', 500],
                ['Event Management', 200],
                ['Grades and Assignments', 400],
                ['Student Data Analysis', 600]
              ]);

              var options = {
                pieSliceText: 'Interactive Learning',
                slices: {
                  0: {
                    color: '#FACCFF',
                    offset: 0.2
                  },
                  1: {
                    color: '#DCB0FF'
                  },
                  2: {
                    color: '#BE93FD'
                  },
                  3: {
                    color: '#A178DF'
                  },
                  4: {
                    color: '#845EC2'
                  },
                  5: {
                    color: '#51308E'
                  },
                },

                backgroundColor: '#f9f9fb',
                chartArea: {
                  left: 0,
                  top: 20,
                  width: '100%',
                  height: '90%'
                },
              };

              var chart = new google.visualization.PieChart(document.getElementById('classProChart'));
              chart.draw(data, options);
            }
          </script>
          <style>
            #classProChart {
              min-height: 300px;
              max-width: 90%;
            }
          </style>
        </head>

        <div align="center">
          <p>ClassPro Features Usage</p>
          <div id="classProChart"></div>
          <p><small>Source: ClassPro Analytics, 2023</small></p>
        </div>

      </div>
      <div class="chart-info">
        <p id="chartValue">Get advance analytical detail via class pro.
        <div class="cpdc">
          <div class="bg"></div>
          <div class="bar"></div>
          <div class="bar fill1"></div>
          <div class="bar fill2"></div>
          <div class="bar fill3"></div>
          <div class="bar fill4"></div>
          <div class="bar fill1"></div>
          <div class="bar fill5"></div>
          <div class="bar fill6"></div>
          <div class="bar"></div>
        </div>
        <a href="/users/pages/index.html" class="animation-button2">Get Yours</a>
        <style>
          .animation-button2 {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            color: #ffffff;
            background-color: #DB397C;
            border-radius: 5px;
            transition: background-color 0.3s ease;
          }

          .animation-button2:hover {
            background-color: #DB397C;
          }

          .cpdc {
            background: #f2f2f2;
            width: 90%;
            height: 80%;
            position: relative;
            margin: 0 auto;
            padding-top: 12px;
            padding-bottom: 24px;
            -webkit-transform: translateZ(0);
          }

          .cpdc .bg {
            position: absolute;
            top: 9px;
            left: 8px;
            right: 8px;
            bottom: 8px;
            background: url(http://boutique.flarework.com/wp-content/themes/boutique/img/logo_large.png) center 0px no-repeat;
            background-size: contain;
            -webkit-filter: drop-shadow(0px 6px 25px rgba(0, 0, 0, 0.5));
          }

          .cpdc .bar {
            position: relative;
            height: 8px;
            background: #6a6a6a;
            width: 0%;
            top: 0px;
            left: 25px;
            margin-top: 8px;
            box-shadow: 0 0 3px rgba(192, 192, 192, 0.9);
            animation: fill 5s infinite alternate, colors 5s infinite alternate;
          }

          .cpdc .bar.fill1 {
            animation: fill-1 5s infinite alternate, colors 5s infinite alternate;
          }

          .cpdc .bar.fill2 {
            animation: fill-2 5s infinite alternate, colors 5s infinite alternate;
          }

          .cpdc .bar.fill3 {
            animation: fill-3 5s infinite alternate, colors 5s infinite alternate;
          }

          .cpdc .bar.fill4 {
            animation: fill-4 5s infinite alternate, colors 5s infinite alternate;
          }

          .cpdc .bar.fill5 {
            animation: fill-5 5s infinite alternate, colors 5s infinite alternate;
          }

          .cpdc .bar.fill6 {
            animation: fill-6 5s infinite alternate, colors 5s infinite alternate;
          }

          @keyframes fill {
            0% {
              width: 0;
            }

            33% {
              width: 30px;
            }

            66% {
              width: 10px;
            }

            100% {
              width: 105px;
            }
          }

          @keyframes fill-1 {
            0% {
              width: 0;
            }

            33% {
              width: 50px;
            }

            66% {
              width: 20px;
            }

            100% {
              width: 130px;
            }
          }

          @keyframes fill-2 {
            0% {
              width: 0;
            }

            33% {
              width: 90px;
            }

            66% {
              width: 70px;
            }

            100% {
              width: 136px;
            }
          }

          @keyframes fill-3 {
            0% {
              width: 0;
            }

            33% {
              width: 50px;
            }

            66% {
              width: 24px;
            }

            100% {
              width: 109px;
            }
          }

          @keyframes fill-4 {
            0% {
              width: 0;
            }

            33% {
              width: 98px;
            }

            66% {
              width: 34px;
            }

            100% {
              width: 99px;
            }
          }

          @keyframes fill-5 {
            0% {
              width: 0;
            }

            33% {
              width: 30px;
            }

            66% {
              width: 10px;
            }

            100% {
              width: 148px;
            }
          }

          @keyframes fill-6 {
            0% {
              width: 0;
            }

            33% {
              width: 48px;
            }

            66% {
              width: 22px;
            }

            100% {
              width: 140px;
            }
          }

          @keyframes colors {
            0% {
              background-color: #5a5a5a;
            }

            50% {
              background-color: #3a3aaa;
            }

            100% {
              background-color: #006aa0;
            }
          }
        </style>
        </p>
      </div>
    </div>
  </div>

  <div class="body-section user-feedback">
    <h2>Listen what our users says about us!</h2>
    <div class="feedback-box">
      <div class="feedback-category" id="parent-feedback">
        <img src="parents.png" alt="Parent Image" class="user-feedback-img">
        <p>Exceptional experience! My child is thriving with ClassPro.Great communication and easy access to my child's progress.</p>
      </div>
      <div class="feedback-category teacher" id="teacher-feedback">
        <img src="teacher.png" alt="Teacher Image" class="user-feedback-img">
        <p>Incredibly helpful resources for educators. Makes teaching a joy!.Efficient class management tools. Streamlines my workload.</p>
      </div>
      <div class="feedback-category" id="student-feedback">
        <img src="students.png" alt="Student Image" class="user-feedback-img">
        ClassPro has transformed my learning journey. Highly recommended!.
        Interactive lessons make studying fun and engaging.</p>
      </div>
    </div>
    <div class="journey-feedback">
      <h2>start your journey with our ClassPro solution.</h2>
    </div>

  </div>
  <style>
    .journey-feedback {
      text-align: right;
      padding-right: 1%;
      margin-top: -30px;
    }

    #teacher-feedback {
      padding-right: auto;
    }

    .user-feedback-img {
      width: 80px;
      height: 80px;
    }

    .feedback-box {
      display: flex;
      justify-content: space-between;
      flex-direction: column;
    }

    .feedback-category {
      width: 50%;
      display: flex;
      flex-direction: row;
      align-items: center;
    }

    .feedback-category.teacher {
      flex-direction: row-reverse;
    }

    .feedback-category img {
      max-width: 100%;
      height: auto;
      margin-right: 10px;
    }
  </style>
  <style>
    /* Apply your global styles here */

    .body-section {
      padding: 40px;
      margin: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .roadmap .pinpoint {
      position: relative;
      display: inline-block;
      margin-right: 20px;
      cursor: pointer;
    }

    .roadmap .pinpoint span {
      text-decoration: underline;
    }

    .roadmap .popup {
      display: none;
      position: absolute;
      top: 20px;
      left: 0;
      background-color: #f9f9f9;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      z-index: 1;
    }

    .roadmap .pinpoint:hover .popup {
      display: block;
    }

    .analytical-data .analytical-box {
      display: flex;
    }

    .analytical-data .pie-chart {
      flex: 1;
      /* Adjust the size as needed */
    }



    /* Add more specific styles as needed */
  </style>
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
</body>

</html>