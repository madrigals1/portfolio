<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Adi S. Portfolio</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Adi S. Portfolio</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <?php
            if($_SESSION['user_id'] == 1){
              echo '
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/admin">Admin</a>
              </li>';
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To My Portfolio!</div>
        <div class="text-uppercase">My Name is Adi Sabyrbayev, Nice To Meet You!</div>
        <hr>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#portfolio">My Projects</a>
      </div>
    </div>
  </header>

  <!-- Portfolio Grid -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Portfolio</h2>
          <h3 class="section-subheading text-muted">Projects I Made.</h3>
        </div>
      </div>
      <div class="row">
        <?php
          include_once $_SERVER['DOCUMENT_ROOT']."/db/connect.php";

          $result_projects = mysqli_query($con, "SELECT * FROM `projects`");
          $projects = $result_projects->fetch_all(MYSQLI_BOTH);

          for($i = 0; $i < count($projects); $i++){
            $project = $projects[$i];
            echo '
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#', $project['alias'],'">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fas fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="img/projects/', $project['small_pic'],'" alt="', $project['name'], '">
              </a>
              <div class="portfolio-caption">
                <h4>', $project['name'], '</h4>
                <p class="text-muted">'. $project['lnf'], '</p>
              </div>
            </div>
            ';
          }
        ?>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#maze">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/maze-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Maze Generator</h4>
            <p class="text-muted">Python3</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#grades">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/grades-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Grades</h4>
            <p class="text-muted">PHP</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#grades_mobile">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/grades-mobile-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Grades Mobile</h4>
            <p class="text-muted">React Native</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#snake">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/snake-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Snake</h4>
            <p class="text-muted">Unity</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#arkanoid">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/arkanoid-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Arkanoid</h4>
            <p class="text-muted">Unity</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#pingpong">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/pingpong-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Ping Pong</h4>
            <p class="text-muted">Unity</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#verysecret">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/verysecret-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>VerySecret</h4>
            <p class="text-muted">Construct 2</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#verysecret2">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/verysecret2-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>VerySecret 2</h4>
            <p class="text-muted">Unity</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#sokoban">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/sokoban-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Sokoban</h4>
            <p class="text-muted">JavaFX</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#asyqatu">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/asyqatu-thumbnail.png" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Asyq Atu</h4>
            <p class="text-muted">Unity</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          <h3 class="section-subheading text-muted">My Lifetime Journey.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/logos/ktl_logo.png" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>2009-2014</h4>
                  <h4 class="subheading">Beginning of My Journey</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">I have been studying in Kazakh-Turkish Lyceum these years.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/logos/enu_logo.png" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>2014-2018</h4>
                  <h4 class="subheading">University Years</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">I have been studying in L.N.Gumilyov Eurasian National University. These years i
                    learned how to make games in Construct 2, Unity. I learned
                    how to make websitres using PHP and MySQL. Learned basics from lots of modern day popular
                    programming languages like Python, C++, Java and C#.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/logos/kk_logo.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>August 2018</h4>
                  <h4 class="subheading">Government Service</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">As my first job, i have been working for 2 months in Treasury Committee of
                    Ministry of Finance of Kazakhstan, in the position of Security Engineer and Website Administrator.
                  </p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/logos/valis_logo.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>November 2019</h4>
                  <h4 class="subheading">Valis KZ</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">After participating in Astana Innovations Challenge Hackaton in 2018, i was
                    spotted by Valis KZ and was hired as Junior Developer. Here i have learned how to work with Odoo ERP
                    system and learned how to make simple apps with React Native.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>And my
                  <br>Journey is
                  <br>Still Going!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mb-3 text-center">
          <h2 class="section-heading text-uppercase">Contact Me</h2>
          <h5 class="section-heading text-uppercase">Under construction, all messages go to "Spam" folder</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" action="mail/contact_me.php" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required"
                    data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required"
                    data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required"
                    data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required="required"
                    data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send
                  Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Adi S. Portfolio 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="https://www.facebook.com/adi.sabyrbayev.3">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.linkedin.com/in/adi-sabyrbayev-831942186/">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->

  <!-- MazeGenerator -->
  <div class="portfolio-modal modal fade" id="maze" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Maze Generator</h2>
                <p class="item-intro text-muted">Simple labyrinth generator made in Python3.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/maze.png" alt="">
                <p>This project was made in Python3 using Tkinter and i made it to test my Python skills. The algorithm
                  used in this Project is Depth-Search algorithm.</p>
                <ul class="list-inline">
                  <li>Date: December 2016</li>
                  <li>Language and Frameworks: Python3</li>
                </ul>
                <button class="btn btn-primary"
                  onclick="window.location.href='https\://gitlab.com/sabyrbayev.adi32/mazegenerator';" type="button">
                  <i class="fab fa-gitlab"></i>
                  Show on Gitlab</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Snake -->
  <div class="portfolio-modal modal fade" id="snake" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Snake</h2>
                <p class="item-intro text-muted">Snake clone made in 2 hours</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/snake.png" alt="">
                <p>This project was made by me as part of "Make this game in 2 hours" challenge.</p>
                <ul class="list-inline">
                  <li>Date: April 2019</li>
                  <li>Language and Frameworks: Unity</li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='projects/snake';" type="button">
                  <i class="fa fa-gamepad"></i>
                  Play</button>
                <button class="btn btn-primary"
                  onclick="window.location.href='https\://gitlab.com/sabyrbayev.adi32/snake';" type="button">
                  <i class="fab fa-gitlab"></i>
                  Show on Gitlab</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Arkanoid -->
  <div class="portfolio-modal modal fade" id="arkanoid" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Arkanoid</h2>
                <p class="item-intro text-muted">Simple Arkanoid clone made in 1.5 hours</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/arkanoid.png" alt="">
                <p>This project was made by me as part of "Make this game in 2 hours" challenge. </p>
                <ul class="list-inline">
                  <li>Date: April 2019</li>
                  <li>Language and Frameworks: Unity</li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='projects/arkanoid';" type="button">
                  <i class="fa fa-gamepad"></i>
                  Play</button>
                <button class="btn btn-primary"
                  onclick="window.location.href='https\://gitlab.com/sabyrbayev.adi32/arkanoid';" type="button">
                  <i class="fab fa-gitlab"></i>
                  Show on Gitlab</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Ping Pong -->
  <div class="portfolio-modal modal fade" id="pingpong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Ping Pong</h2>
                <p class="item-intro text-muted">Simple Ping Pong clone made in 1 hour</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/pingpong.png" alt="">
                <p>This project was made by me as part of "Make this game in 2 hours" challenge. </p>
                <ul class="list-inline">
                  <li>Date: April 2019</li>
                  <li>Language and Frameworks: Unity</li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='projects/pingpong';" type="button">
                  <i class="fa fa-gamepad"></i>
                  Play</button>
                <button class="btn btn-primary"
                  onclick="window.location.href='https\://gitlab.com/sabyrbayev.adi32/ping-pong';" type="button">
                  <i class="fab fa-gitlab"></i>
                  Show on Gitlab</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- VerySecret -->
  <div class="portfolio-modal modal fade" id="verysecret" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">VerySecret</h2>
                <p class="item-intro text-muted">Tank 1990 and Battle City clone.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/verysecret.png" alt="">
                <p>My first game I ever made.</p>
                <ul class="list-inline">
                  <li>Date: June 2015</li>
                  <li>Language and Frameworks: Construct 2</li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='projects/verysecret';" type="button">
                  <i class="fa fa-gamepad"></i>
                  Play</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- VerySecret 2 -->
  <div class="portfolio-modal modal fade" id="verysecret2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">VerySecret 2</h2>
                <p class="item-intro text-muted">Tank 1990 and Battle City clone.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/verysecret2.png" alt="">
                <p>Second version of my first game, but now in Unity, but the same project overall.</p>
                <ul class="list-inline">
                  <li>Date: January 2018</li>
                  <li>Language and Frameworks: Unity</li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='projects/verysecret2';" type="button">
                  <i class="fa fa-gamepad"></i>
                  Play</button>
                <button class="btn btn-primary"
                  onclick="window.location.href='https\://gitlab.com/sabyrbayev.adi32/verysecret2';" type="button">
                  <i class="fab fa-gitlab"></i>
                  Show on Gitlab</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Sokoban -->
  <div class="portfolio-modal modal fade" id="sokoban" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Sokoban</h2>
                <p class="item-intro text-muted">Sokoban game clone.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/sokoban.png" alt="">
                <p>Sokoban game clone made by using JavaFX.</p>
                <ul class="list-inline">
                  <li>Date: September 2018</li>
                  <li>Language and Frameworks: Java, JavaFX</li>
                </ul>
                <button class="btn btn-primary"
                  onclick="window.location.href='https\://gitlab.com/sabyrbayev.adi32/sokoban';" type="button">
                  <i class="fab fa-gitlab"></i>
                  Show on Gitlab</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Asyq Atu -->
  <div class="portfolio-modal modal fade" id="asyqatu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Asyq Atu</h2>
                <p class="item-intro text-muted">Kazakh national game Asyq Atu.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/asyqatu.png" alt="">
                <p>Kazakh national game Asyq Atu made in Unity.</p>
                <ul class="list-inline">
                  <li>Date: December 2018</li>
                  <li>Language and Frameworks: Unity</li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='projects/asyqatu';" type="button">
                  <i class="fa fa-gamepad"></i>
                  Play</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Grades -->
  <div class="portfolio-modal modal fade" id="grades" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Grades</h2>
                <p class="item-intro text-muted">Simple website for schools</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/grades.png" alt="">
                <p>This website made by using PHP and Bootstrap as framework, is a simple website for students,
                  teachers, classes
                  and marks.</p>
                <ul class="list-inline">
                  <li>Date: April 2019</li>
                  <li>Language and Frameworks: PHP, Bootstrap, JQuery</li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='https\://verysecret.site'" type="button">
                  <i class="fa fa-globe">
                    Visit
                  </i>
                </button>
                <button class="btn btn-primary"
                  onclick="window.location.href='https\://gitlab.com/sabyrbayev.adi32/site_journal'" type="button">
                  <i class="fab fa-gitlab"></i>
                  Show on Gitlab</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Grades Mobile -->
  <div class="portfolio-modal modal fade" id="grades_mobile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Grades Mobile</h2>
                <p class="item-intro text-muted">Mobile app version of Grades</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/grades-mobile-thumbnail.png" alt="">
                <p>This app was made by using React Native, so that it can run on both Android and iOS devices.</p>
                <ul class="list-inline">
                  <li>Date: May 2019</li>
                  <li>Language and Frameworks: React Native</li>
                </ul>
                <button class="btn btn-primary"
                  onclick="window.location.href='https\://gitlab.com/sabyrbayev.adi32/react_native_journal'"
                  type="button">
                  <i class="fab fa-gitlab"></i>
                  Show on Gitlab</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>