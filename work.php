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
    $work_id = $_GET['id'];
	$result_work = mysqli_query($con, "SELECT * FROM `works` WHERE `id` = '$work_id'");
    $work = $result_work->fetch_array(MYSQLI_BOTH);  
    $title = $work['name'];
	include_once $_SERVER['DOCUMENT_ROOT']."/components/head.php";
	echo '<link rel="stylesheet" href="/vendor/css/profile.css">';
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
      $href = "work.php";
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
					<?php
						echo '
                        <div class="row">
						  <div class="col-md-12 col-lg-3 center mb-5">
                            <span class="profile-picture">
                                <h5 class="text-center border-bottom">Picture</h5>
                                <img class="editable img-responsive" 
                                    style="width: auto; height: auto; max-width: 100%; max-height: 100%;" 
                                    alt="Avatar" id="avatar2" 
                                    src="/img/works/'.$work['picture'].'">
							</span>
							<div class="space space-4"></div>
							<br/>
							<a href="#editWorkModal" data-toggle="modal" class="btn btn-sm btn-block btn-primary">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Edit Work</span>
                            </a>
                            <a href="#editPictureModal" data-toggle="modal" class="btn btn-sm btn-block btn-primary">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Edit Picture</span>
                            </a>
                            <a href="#editDescriptionModal" data-toggle="modal" class="btn btn-sm btn-block btn-primary">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Edit Description</span>
							</a>
							<a href="#removeWorkModal" data-toggle="modal" class="btn btn-sm btn-block btn-danger">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Remove Work</span>
                            </a>
                            ';
							echo '
						</div>

						<div class="col-md-12 col-lg-9">
							<h4 class="blue d-flex justify-content-between">
								<span class="middle">Work - <b>'.$work['name'].'</b></span>
							</h4>

								<div class="profile-user-info">
									<div class="profile-info-row">
									<div class="profile-info-name"> Period </div>

									<div class="profile-info-value">
										<span>'.$work['period'].'</span>
									</div>
								</div>
							
								<div class="profile-info-row">
									<div class="profile-info-name"> Queue </div>

									<div class="profile-info-value">
										<span>'.$work['queue'].'</span>
									</div>
								</div>
                            </div>
                            
                            <div class="card shadow mb-4 mt-4 w-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Description</h6>
						    	</div>
						    	';

						    	if($work['description'] != null){
						    		echo '
						    		<div class="card-body">
						    			'.$work['description'].'
						    		</div>
						    		';
						    	} else {
						    		echo '
						    		<div class="card-body">
						    			Description about this work.
						    		</div>
						    		';
						    	}

						    	echo '
						    </div>

							<div class="modal fade" id="editWorkModal" tabindex="-1" role="dialog" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Edit Work</h5>
							        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">×</span>
							        </button>
								  </div>
								  <form method="post" action="/db/editWork.php?id='.$work_id.'">
								  	<div class="modal-body">
                                        
                                      <div class="form-group">
								  	  	<label for="name">Name</label>
								  	  	<input type="text" class="form-control" id="name" name="name" value="'.$work['name'].'">
								  	  </div>

								  	  <div class="form-group">
								  	  	<label for="period">Period</label>
								  	  	<input type="text" class="form-control" id="period" name="period" value="'.$work['period'].'">
								  	  </div>

								  	  <div class="form-group">
								  	  	<label for="queue">Queue</label>
								  	  	<input type="number" class="form-control" id="queue" name="queue" value="'.$work['queue'].'">
								  	  </div>
								  	</div>
							      	<div class="modal-footer">
							      	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
							      	  <button class="btn btn-primary" type="submit">Change</a>
									</div>
								  </form>
							    </div>
							  </div>
							</div>

							<div class="modal fade" id="editPictureModal" tabindex="-1" role="dialog" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Edit Picture</h5>
							        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">×</span>
							        </button>
                                        </div>
										<form method="post" action="/db/editWorkPicture.php?id='.$work_id.'" enctype="multipart/form-data">
                                            <div class="modal-body">

                                                <img class="editable rounded border img-responsive" 
                                                    style="width: auto; height: auto; max-width: 100%; max-height: 100%;" 
                                                    alt="Avatar" id="avatar2" 
                                                    src="/img/works/'.$work['picture'].'">

                                                <div class="m-3"></div>

												<div class="input-group form-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="imageUpload">Picture</span>
													</div>
												  <div class="custom-file">
												    <input type="file" class="custom-file-input imageFile" id="picture" name="picture" accept="image/x-png,image/gif,image/jpeg">
												    <label class="custom-file-label" for="picture">Picture</label>
												  </div>
												</div>

											</div>
							      	<div class="modal-footer">
							      	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
							      	  <button class="btn btn-primary" type="submit">Change</a>
											</div>
										</form>
							    </div>
							  </div>
                            </div>

							<div class="modal fade" id="editDescriptionModal" tabindex="-1" role="dialog" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
							        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">×</span>
							        </button>
										</div>
										<form method="post" action="/db/editWorkDescription.php?id='.$work_id.'">
											<div class="modal-body">

												<div class="form-group">
													<textarea class="form-control" rows="6" id="description" name="description">'.$work['description'].'</textarea>
												</div>

											</div>
							      	<div class="modal-footer">
							      	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
							      	  <button class="btn btn-primary" type="submit">Change</a>
											</div>
										</form>
							    </div>
							  </div>
							</div>
							
							<div class="modal fade" id="removeWorkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							       <h5 class="modal-title" id="exampleModalLabel">Remove <b>', $work['name'], '</b></h5>
							       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							         <span aria-hidden="true">×</span>
							       </button>
								  </div>
								  <form method="post" action="/db/removeWork.php?id='.$work_id.'">
								  	<div class="modal-body">
								  		<h5 class="modal-title">Are you sure you want to remove this work?</h5>
								  	</div>
							      	<div class="modal-footer">
							      		<button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
							      		<button class="btn btn-danger" type="submit">Remove</a>
								  	</div>
								  </form>
							    </div>
							  </div>
                            </div>

							<div class="hr hr-8 dotted"></div>

						</div><!-- /.col -->
						
					</div>
					';
					?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
	echo "
	<script>
	$('.imageFile').on('change',function(){
		var fileName = $(this).val();
		var name = fileName.replace(/^.*[\\\/]/, '');
		$(this).next('.custom-file-label').html(name);
	})
	</script>";
  ?>

</body>

</html>
