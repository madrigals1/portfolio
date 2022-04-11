<?php
  session_start();
  require('populate/dynamic.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php
    $title = $dynamic["main_title"];
    echo '<title>'.$title.'</title>';
  ?>

  <!-- Bootstrap core CSS -->
  <link href="https://static.madrigal.pro/portfolio/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://static.madrigal.pro/portfolio/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="https://static.madrigal.pro/portfolio/vendor/css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
    $buttons_array = [];

    foreach ($dynamic["buttons"] as &$button) {
      $name = $button["name"];
      $link = $button["link"];

      $buttons_array[] = '
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="'.$link.'">'.$name.'</a>
      </li>
      ';
    }

    if($_SESSION['user_id'] == 1){
      $buttons_array[] = '
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="/admin">Admin</a>
      </li>
      ';
    }

    $buttons = join("", $buttons_array);
  
    $buttons_content = '
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
        '.$buttons.'
        </ul>
      </div>
    ';
    echo '
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">'.$title.'</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          '.$buttons_content.'
        </div>
      </nav>
    ';
  ?>

  <?php

  $welcome_text = $dynamic["welcome_text"];
  $short_description = $dynamic["short_description"];
  $my_projects = $dynamic["my_projects"];
  
  echo '
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">'.$welcome_text.'</div>
          <div class="text-uppercase">'.$short_description.'</div>
          <hr>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#portfolio">'.$my_projects.'</a>
        </div>
      </div>
    </header>
  ';
  ?>

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

          $result_projects = mysqli_query($con, "SELECT * FROM `projects` WHERE `is_visible` = 1 ORDER BY `queue`");
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
                <img class="img-fluid" src="', $project['small_pic'], '" alt="', $project['name'], '" style="width: 350px; height: 262.5px;">
              </a>
              <div class="portfolio-caption">
                <h4>', $project['name'], '</h4>
                <p class="text-muted">'. $project['lnf'], '</p>
              </div>
            </div>
            ';
          }
        ?>

      </div>
    </div>
  </section>

  <!-- About -->
  <section class="page-section" id="experience">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Experience</h2>
          <h3 class="section-subheading text-muted">My Lifetime Journey.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <?php
              $result_works = mysqli_query($con, "SELECT * FROM `works` ORDER BY `queue` DESC");
              $works = $result_works->fetch_all(MYSQLI_BOTH);
              
              for($i = 0; $i < count($works); $i++){
                $work = $works[$i];
                if($i % 2 == 0){
                  $class = "";
                } else {
                  $class = "timeline-inverted";
                }
                echo '
                <li class="', $class, '">
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="', $work['picture'],'" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>', $work['period'], '</h4>
                      <h4 class="subheading">', $work['name'],'</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">', $work['description'], '</p>
                    </div>
                  </div>
                </li>
                ';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <!-- <section class="page-section" id="contact">
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
  </section> -->

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <?php 
            echo '<span class="copyright">'.$title.' 2020</span>';
          ?>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <?php
              $sb_array = [];

              foreach ($dynamic["social_buttons"] as &$sb) {
                $fa_classes = $sb["fa_classes"];
                $link = $sb["link"];
          
                $sb_array[] = '
                  <li class="list-inline-item">
                    <a href="'.$link.'">
                      <i class="'.$fa_classes.'"></i>
                    </a>
                  </li>
                ';
              }
          
              $sbs = join("", $sb_array);
              echo $sbs;
            ?>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->
  
  <?php
    for($i = 0; $i < count($projects); $i++){
      $project = $projects[$i];
      echo '
      <div class="portfolio-modal modal fade" id="', $project['alias'], '" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <h2 class="text-uppercase">', $project['name'], '</h2>
                    <p class="item-intro text-muted">', $project['short_desc'], '</p>
                    <img class="img-fluid d-block mx-auto" src="', $project['big_pic'], '" alt="">
                    <p>', $project['long_desc'], '</p>
                    <ul class="list-inline">
                      <li>Date: ', $project['date'], '</li>
                      <li>Language and Frameworks: ', $project['lnf'], '</li>
                    </ul>
                    ';
                    if($project['play_link']){
                      echo '
                      <button class="btn btn-primary" onclick="window.location.href=\'', $project['play_link'], '\';" type="button">
                        <i class="fa fa-gamepad"></i>
                        Play
                      </button>
                      ';
                    }
                    if($project['visit_link']){
                      echo '
                      <button class="btn btn-primary"
                        onclick="window.location.href=\'', $project['visit_link'], '\';" type="button">
                        <i class="fa fa-globe"></i>
                        Visit
                      </button>
                      ';
                    }
                    if($project['github_link']){
                      echo '
                      <button class="btn btn-primary"
                        onclick="window.location.href=\'', $project['github_link'], '\';" type="button">
                        <i class="fab fa-github"></i>
                        GitHub
                      </button>
                      ';
                    }
                    echo '
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fas fa-times"></i>
                      Close Project
                    </button>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      ';
    }
   ?>

  <!-- Bootstrap core JavaScript -->
  <script src="https://static.madrigal.pro/portfolio/vendor/jquery/jquery.min.js"></script>
  <script src="https://static.madrigal.pro/portfolio/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="https://static.madrigal.pro/portfolio/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="https://static.madrigal.pro/portfolio/vendor/js/jqBootstrapValidation.js"></script>
  <script src="https://static.madrigal.pro/portfolio/vendor/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="https://static.madrigal.pro/portfolio/vendor/js/agency.min.js"></script>

</body>

</html>