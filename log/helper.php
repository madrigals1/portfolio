<?php
  session_start();
  if(!isset($_SESSION['user_id'])){
    header("Location: /admin");
  }
?>

<!DOCTYPE html>
<html lang="en">

<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/db/connect.php";
  
  if($_GET['error'] == "login_error"){
    $title = "Can't log in!";
  }

  if($_GET['error'] == "project_add_error"){
    $title = "Can't create project with this data!";
  }

  if($_GET['error'] == "project_edit_error"){
    $title = "Can't change project data!";
  }

  if($_GET['error'] == "project_remove_error"){
    $title = "Can't remove project!";
  }

  if($_GET['error'] == "project_ok"){
    $title = "Succesfully created project!";
  }

  if($_GET['error'] == "picture_upload_error"){
    $title = "Error while uploading picture";
  }

  if($_GET['error'] == "work_add_error"){
    $title = "Can't create work with this data!";
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
                      if($_GET['error'] == "login_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<p>Email or password you entered aren\'t valid</p>';
                        echo '<a href="/login/login.php" class="btn btn-primary">Try again</a>';
                      }
                      
                      if($_GET['error'] == "project_add_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/projects.php" class="btn btn-primary">Back to Projects</a>';
                      }

                      if($_GET['error'] == "project_edit_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/projects.php" class="btn btn-primary">Back to Projects</a>';
                      }

                      if($_GET['error'] == "project_remove_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/projects.php" class="btn btn-primary">Back to Projects</a>';
                      }
                      
                      if($_GET['error'] == "project_ok"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/projects.php" class="btn btn-primary">Back to Projects</a>';
                      }

                      if($_GET['error'] == "picture_upload_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/projects.php" class="btn btn-primary">Back to Projects</a>';
                      }

                      if($_GET['error'] == "work_add_error"){
                        echo '<h1 class="h4 text-danger mb-4">'.$title.'</h1>';
                        echo '<a href="/works.php" class="btn btn-primary">Back to Works</a>';
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
