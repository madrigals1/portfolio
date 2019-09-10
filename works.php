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
  $title = "Work";
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
                <a href="#" data-toggle="modal" data-target="#addWorkModal" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                  </span>
                  <span class="text">Add Work</span>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Period</th>
                        <th>Queue</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Period</th>
                        <th>Queue</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $result_works = mysqli_query($con, "SELECT * FROM `works` ORDER BY `works`.`queue` ASC");
                            $works = mysqli_fetch_all($result_works, MYSQLI_BOTH);
                            $num_rows = $result_works->num_rows;
    
                            for($i = 0; $i < $num_rows; $i++){
                                $work = $works[$i];
                                echo '<tr style="cursor: pointer;" onclick="goWork('.$work['id'].')">';
                                echo '<td>'.$work['name'].'</td>';
                                echo '<td>'.$work['description'].'</td>';
                                echo '<td>'.$work['queue'].'</td>';
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

      <div class="modal fade" id="addWorkModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <form method="post" action="/db/addWork.php" enctype="multipart/form-data">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add new Work</h5>
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
                 <label for="period">Period</label>
                 <input type="text" class="form-control" id="period" name="period"/>
               </div>
               <div class="form-group">
                 <label for="description">Description</label>
                 <textarea class="form-control" id="description" name="description" rows="3"></textarea>
               </div>
               <div class="form-group">
                 <label for="queue">Queue</label>
                 <input type="number" class="form-control" id="queue" name="queue"/>
               </div>
               <div class="input-group form-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text" id="imageUpload">Picture</span>
                 </div>
                 <div class="custom-file">
                   <input type="file" class="custom-file-input" id="picture" name="picture" accept="image/x-png,image/gif,image/jpeg">
                   <label class="custom-file-label" for="picture">Picture</label>
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
  function goWork(id){
    window.location.href = "/work.php?id=" + id;
  }
  $('#picture').on('change',function(){
    var fileName = $(this).val();
    var name = fileName.replace(/^.*[\\/]/, '');
    $(this).next('.custom-file-label').html(name);
  })
  </script>

</body>

</html>