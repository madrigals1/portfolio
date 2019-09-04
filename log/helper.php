<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/db/connect.php";
  if($_GET['error'] == "loginerror"){
    $title = "Can't log in!";
  }
  if($_GET['error'] == "regerror"){
    $title = "Can't sign up!";
  }
  if($_GET['error'] == "regok"){
    $title = "Sign up succesfull!";
  }
  if($_GET['error'] == "profileerror"){
    $title = "Error in process of changing profile information";
  }
  if($_GET['error'] == "avatar_upload_error"){
    $title = "Couldn't load avatar";
  }
  if($_GET['error'] == "avatar_delete_error"){
    $title = "Couldn't delete previous avatar";
  }
  if($_GET['error'] == "subject_add_error"){
    $title = "Couldn't add Subject";
  }
  if($_GET['error'] == "subject_edit_error"){
    $title = "Couldn't change Subject";
  }
  if($_GET['error'] == "subject_image_upload_error"){
    $title = "Couldn't upload image to this Subject";
  }
  if($_GET['error'] == "subject_image_delete_error"){
    $title = "Couldn't delete image from this Subject";
  }
  if($_GET['error'] == "class_image_upload_error"){
    $title = "Couldn't upload image to this Class";
  }
  if($_GET['error'] == "class_image_delete_error"){
    $title = "Couldn't delete image from this Class";
  }
  if($_GET['error'] == "hour_add_error"){
    $title = "Couldn't add new Hour";
  }
  if($_GET['error'] == "lesson_add_error"){
    $title = "Couldn't add new Lesson";
  }
  if($_GET['error'] == "lesson_hour_add_error"){
    $title = "Couldn't add new Lesson Hour";
  }
  if($_GET['error'] == "class_add_error"){
    $title = "Couldn't add new Class";
  }
  if($_GET['error'] == "class_edit_error"){
    $title = "Couldn't change class";
  }
  if($_GET['error'] == "marking_hour_add_error"){
    $title = "Couldn't add new Marking Hour";
  }
  if($_GET['error'] == "class_change_error"){
    $title = "Couldn't change Class";
  }
  if($_GET['error'] == "lesson_add_change_error"){
    $title = "Error while marking";
  }
  
  include_once $_SERVER['DOCUMENT_ROOT']."/components/head.php";
?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="d-flex flex-column justify-content-center align-items-center">
                    <?php 
                      if($_GET['error'] == "regerror"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<p>Possible issues: </p>
                          <ul>
                            <li>Email you entered already exists.</li>
                            <li>Error in the values you entered.</li>
                            <li>Website is under construction</li>
                          </ul>
                          <a href="/login/register.php" class="btn btn-primary">Try again</a>
                        ';
                      }
                      if($_GET['error'] == "loginerror"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<p>Email or password you entered aren\'t valid</p>';
                        echo '<a href="/login/login.php" class="btn btn-primary">Try again</a>';
                      }
                      if($_GET['error'] == "regok"){
                        echo '<h1 class="h4 text-success mb-4">'.$title.'</h1>';
                        echo '<a href="/login/login.php" class="btn btn-primary">Enter Website</a>';
                      }
                      if($_GET['error'] == "profileerror"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/users/profile.php" class="btn btn-primary">Back to Profile</a>';
                      }
                      if($_GET['error'] == "avatar_upload_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/users/profile.php" class="btn btn-primary">Back to Profile</a>';
                      }
                      if($_GET['error'] == "avatar_delete_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/users/profile.php" class="btn btn-primary">Back to Profile</a>';
                      }
                      if($_GET['error'] == "subject_add_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/lessons.php?type=subject" class="btn btn-primary">Back to Subjects</a>';
                      }
                      if($_GET['error'] == "subject_edit_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/lessons.php?type=subject" class="btn btn-primary">Back to Subjects</a>';
                      }
                      if($_GET['error'] == "class_edit_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/class.php" class="btn btn-primary">Back to Classes</a>';
                      }
                      if($_GET['error'] == "subject_image_upload_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/lessons.php?type=subject" class="btn btn-primary">Back to Subjects</a>';
                      }
                      if($_GET['error'] == "subject_image_delete_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/lessons.php?type=subject" class="btn btn-primary">Back to Subjects</a>';
                      }
                      if($_GET['error'] == "class_image_upload_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/classes.php" class="btn btn-primary">Back to Classes</a>';
                      }
                      if($_GET['error'] == "class_image_delete_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/classes.php" class="btn btn-primary">Back to Classes</a>';
                      }
                      if($_GET['error'] == "hour_add_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/lessons.php?type=hour" class="btn btn-primary">Back to Hours</a>';
                      }
                      if($_GET['error'] == "lesson_add_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/lessons.php?type=lesson" class="btn btn-primary">Back to Lessons</a>';
                      }
                      if($_GET['error'] == "lesson_hour_add_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/lessons/lessons.php?type=lesson_hour" class="btn btn-primary">Back to Lesson Hours</a>';
                      }
                      if($_GET['error'] == "subject_add_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/classes/classes.php?type=class" class="btn btn-primary">Back to Classes</a>';
                      }
                      if($_GET['error'] == "marking_hour_add_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/marks/marks.php?type=lesson" class="btn btn-primary">Back to Marking Hours</a>';
                      }
                      if($_GET['error'] == "class_change_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/index.php" class="btn btn-primary">Back</a>';
                      }
                      if($_GET['error'] == "lesson_add_change_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/marks/marks.php" class="btn btn-primary">Back</a>';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php
    include_once $_SERVER['DOCUMENT_ROOT']."/components/bottom.php";
  ?>

</body>

</html>
