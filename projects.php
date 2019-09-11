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
  $title = "Projects";
  include_once $_SERVER['DOCUMENT_ROOT']."/components/head.php";
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
      $href = "projects.php";
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
                  <span class="text">Add Project</span>
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
                            $result_projects = mysqli_query($con, "SELECT * FROM `projects`");
                            $projects = mysqli_fetch_all($result_projects, MYSQLI_BOTH);
                            $num_rows = $result_projects->num_rows;
    
                            for($i = 0; $i < $num_rows; $i++){
                                $project = $projects[$i];
                                echo '<tr style="cursor: pointer;" onclick="goProject('.$project['id'].')">';
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
          <form method="post" action="/db/addProject.php" enctype="multipart/form-data">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add new Project</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>
             <div class="modal-body">
               <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" id="name" name="name"/>
               </div>
               <div class="form-group">
                 <label for="alias">Alias</label>
                 <input type="text" class="form-control" id="alias" name="alias"/>
               </div>
               <div class="form-group">
                 <label for="short_desc">Short description</label>
                 <textarea class="form-control" id="short_desc" name="short_desc" rows="2"></textarea>
               </div>
               <div class="form-group">
                 <label for="long_desc">Long description</label>
                 <textarea class="form-control" id="long_desc" name="long_desc" rows="4"></textarea>
               </div>
               <div class="form-group">
                 <label for="date">Date</label>
                 <input type="text" class="form-control" id="date" name="date"/>
               </div>
               <div class="form-group">
                 <label for="lnf">Languages & Frameworks</label>
                 <input type="text" class="form-control" id="lnf" name="lnf"/>
               </div>
               <div class="form-group">
                 <label for="play_link">Play link</label>
                 <input type="text" class="form-control" id="play_link" name="play_link"/>
               </div>
               <div class="form-group">
                 <label for="github_link">Github link</label>
                 <input type="text" class="form-control" id="github_link" name="github_link"/>
               </div>
               <div class="form-group">
                 <label for="visit_link">Visit link</label>
                 <input type="text" class="form-control" id="visit_link" name="visit_link"/>
               </div>
               <div class="input-group form-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text" id="imageUpload">Big picture</span>
                 </div>
                 <div class="custom-file">
                   <input type="file" class="custom-file-input" id="big_pic" name="big_pic" accept="image/x-png,image/gif,image/jpeg">
                   <label class="custom-file-label" for="big_pic">Picture</label>
                 </div>
               </div>
               <div class="input-group form-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text" id="imageUpload">Small picture</span>
                 </div>
                 <div class="custom-file">
                   <input type="file" class="custom-file-input" id="small_pic" name="small_pic" accept="image/x-png,image/gif,image/jpeg">
                   <label class="custom-file-label" for="small_pic">Picture</label>
                 </div>
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
  $('#small_pic').on('change',function(){
    var fileName = $(this).val();
    var name = fileName.replace(/^.*[\\/]/, '');
    $(this).next('.custom-file-label').html(name);
  })
  $('#big_pic').on('change',function(){
    var fileName = $(this).val();
    var name = fileName.replace(/^.*[\\/]/, '');
    $(this).next('.custom-file-label').html(name);
  })
  function goProject(id){
    window.location.href = "/project.php?id=" + id;
  }
  </script>

</body>

</html>