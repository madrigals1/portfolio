<?php
  session_start();
  if(!isset($_SESSION['user_id'])){
    header("Location: /admin/login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/db/connect.php";
  $title = "Achievements";
  include_once $_SERVER['DOCUMENT_ROOT']."/components/head.php";
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
      $href = "achivements.php";
      include_once $_SERVER['DOCUMENT_ROOT']."/components/sidebar.php";
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
          include_once $_SERVER['DOCUMENT_ROOT']."/components/topbar.php";
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <?php
                    echo '<h5 class="m-0 font-weight-bold text-primary">'.$title.'</h5>';
                ?>
                <a href="#" data-toggle="modal" data-target="#addProjectModal" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                  </span>
                  <span class="text">Add Achievement</span>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Short description</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Short description</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $result_projects = mysqli_query($con, "SELECT * FROM `achievement`");
                            $projects = mysqli_fetch_all($result_projects, MYSQLI_BOTH);
                            $num_rows = $result_projects->num_rows;
    
                            for($i = 0; $i < $num_rows; $i++){
                                $project = $projects[$i];
                                echo '<tr style="cursor: pointer;" onclick="goAchievement('.$project['id'].')">';
                                echo '<td>'.$project['name'].'</td>';
                                echo '<td>'.$project['short_desc'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form method="post" action="/db/addProject.php">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add new Project</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>
             <div class="modal-body">
               <div class="form-group">
                 <label for="name">Class Name</label>
                 <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"/>
               </div>
               <div class="form-group">
                 <label for="summary">Class Summary</label>
                 <textarea class="form-control" id="summary" name="summary" rows="3"></textarea>
               </div>
               <div class="form-group">
                 <label for="color">Class Color</label>
                 <select class="form-control" id="color" name="color">
                   <option value="primary">Cyan</option>
                   <option value="secondary">Gray</option>
                   <option value="success">Green</option>
                   <option value="danger">Red</option>
                   <option value="warning">Yellow</option>
                   <option value="info">Blue</option>
                   <option value="dark">Black</option>
                 </select>
               </div>
             </div>
             <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
               <button class="btn btn-success" type="submit">Add</button>
             </div>
           </div>
          </form>
        </div>
      </div>

      <?php
        include_once $_SERVER['DOCUMENT_ROOT']."/components/footer.php";
      ?> 

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/components/logout.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/components/bottom.php";
  ?>

  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/demo/datatables-demo.js"></script>

  <script type="text/javascript">
  function goAchievement(id){
    window.location.href = "/achievement.php?id=" + id;
  }
  </script>

</body>

</html>