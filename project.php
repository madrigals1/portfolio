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
    $project_id = $_GET['id'];
	$result_project = mysqli_query($con, "SELECT * FROM `projects` WHERE `id` = '$project_id'");
    $project = $result_project->fetch_array(MYSQLI_BOTH);  
    $title = $project['name'];
	include_once $_SERVER['DOCUMENT_ROOT']."/components/head.php";
	echo '<link rel="stylesheet" href="https://static.adigame.dev/portfolio/vendor/css/profile.css">';
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
      $href = "project.php";
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
                                <h5 class="text-center border-bottom">Big Picture</h5>
                                <img class="editable img-responsive" 
                                    style="width: auto; height: auto; max-width: 100%; max-height: 100%;" 
                                    alt="Avatar" id="avatar2" 
                                    src="/img/projects/'.$project['big_pic'].'">
                            </span>
                            <div class="space space-4"></div>
                            <span class="profile-picture">
                                <h5 class="text-center border-bottom">Small Picture</h5>
                                <img class="editable img-responsive" 
                                    style="width: auto; height: auto; max-width: 100%; max-height: 100%;" 
                                    alt="Avatar" id="avatar2" 
                                    src="/img/projects/'.$project['small_pic'].'">
							</span>
							<div class="space space-4"></div>
							<br/>
							<a href="#editProjectModal" data-toggle="modal" class="btn btn-sm btn-block btn-primary">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Edit Project</span>
                            </a>
                            <a href="#editBigModal" data-toggle="modal" class="btn btn-sm btn-block btn-primary">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Edit Big Picture</span>
                            </a>
                            <a href="#editSmallModal" data-toggle="modal" class="btn btn-sm btn-block btn-primary">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Edit Small Picture</span>
                            </a>
                            <a href="#editLongDescModal" data-toggle="modal" class="btn btn-sm btn-block btn-primary">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Edit Long Description</span>
							</a>
							<a href="#removeProjectModal" data-toggle="modal" class="btn btn-sm btn-block btn-danger">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Remove Project</span>
                            </a>
                            ';
							echo '
						</div>

						<div class="col-md-12 col-lg-9">
							<h4 class="blue d-flex justify-content-between">
								<span class="middle">Project - <b>'.$project['name'].'</b></span>
							</h4>
                              <div class="profile-user-info">

								<div class="profile-info-row">
									<div class="profile-info-name"> Alias </div>

									<div class="profile-info-value">
										<span>'.$project['alias'].'</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Date </div>

									<div class="profile-info-value">
										<span>'.$project['date'].'</span>
									</div>
								</div>
							
								<div class="profile-info-row">
									<div class="profile-info-name"> Languages & Frameworks </div>

									<div class="profile-info-value">
										<span>'.$project['lnf'].'</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Play link </div>

									<div class="profile-info-value">
										<span><a class="btn btn-link m-0 p-0" href="'.$project['play_link'].'">'.$project['play_link'].'</a></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Github link </div>

									<div class="profile-info-value">
                                        <span><a class="btn btn-link m-0 p-0" href="'.$project['github_link'].'">'.$project['github_link'].'</a></span>
									</div>
								</div>
								
								<div class="profile-info-row">
									<div class="profile-info-name"> Visit link </div>

									<div class="profile-info-value">
                                        <span><a class="btn btn-link m-0 p-0" href="'.$project['visit_link'].'">'.$project['visit_link'].'</a></span>
									</div>
                                </div>
                                
                                <div class="profile-info-row">
									<div class="profile-info-name"> Short description </div>

									<div class="profile-info-value">
										<span>'.$project['short_desc'].'</span>
									</div>
								</div>
                            </div>
                            
                            <div class="card shadow mb-4 mt-4 w-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Long Description</h6>
						    	</div>
						    	';

						    	if($project['long_desc'] != null){
						    		echo '
						    		<div class="card-body">
						    			'.$project['long_desc'].'
						    		</div>
						    		';
						    	} else {
						    		echo '
						    		<div class="card-body">
						    			Long description about the project.
						    		</div>
						    		';
						    	}

						    	echo '
						    </div>

							<div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
							        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">×</span>
							        </button>
								  </div>
								  <form method="post" action="/db/editProject.php?id='.$project_id.'">
								  	<div class="modal-body">
                                        
                                      <div class="form-group">
								  	  	<label for="name">Name</label>
								  	  	<input type="text" class="form-control" id="name" name="name" value="'.$project['name'].'">
									  </div>
										
									  <div class="form-group">
									  	<label for="alias">Alias</label>
									  	<input type="text" class="form-control" id="alias" name="alias" value="'.$project['alias'].'">
									  </div>

								  	  <div class="form-group">
								  	  	<label for="date">Date</label>
								  	  	<input type="text" class="form-control" id="date" name="date" value="'.$project['date'].'">
								  	  </div>

								  	  <div class="form-group">
								  	  	<label forlnf">Languages & Frameworks</label>
								  	  	<input type="text" class="form-control" id="lnf" name="lnf" value="'.$project['lnf'].'">
								  	  </div>

								  	  <div class="form-group">
								  	  	<label for="play_link">Play link</label>
								  	  	<input type="text" class="form-control" id="play_link" name="play_link" value="'.$project['play_link'].'">
								  	  </div>

								  	  <div class="form-group">
								  	  	<label for="github_link">Github link</label>
								  	  	<input type="text" class="form-control" id="github_link" name="github_link" value="'.$project['github_link'].'">
									  </div>
									  
									  <div class="form-group">
								  	  	<label for="visit_link">Visit link</label>
								  	  	<input type="text" class="form-control" id="visit_link" name="visit_link" value="'.$project['visit_link'].'">
                                      </div>

                                      <div class="form-group">
								  	  	<label for="short_desc">Short description</label>
								  	  	<textarea class="form-control" rows="2" id="short_desc" name="short_desc">'.$project['short_desc'].'</textarea>
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

							<div class="modal fade" id="editBigModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Edit Big Picture</h5>
							        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">×</span>
							        </button>
                                        </div>
										<form method="post" action="/db/editBigPicture.php?id='.$project_id.'" enctype="multipart/form-data">
                                            <div class="modal-body">

                                                <img class="editable rounded border img-responsive" 
                                                    style="width: auto; height: auto; max-width: 100%; max-height: 100%;" 
                                                    alt="Avatar" id="avatar2" 
                                                    src="/img/projects/'.$project['big_pic'].'">

                                                <div class="m-3"></div>

												<div class="input-group form-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="imageUpload">Big picture</span>
													</div>
												  <div class="custom-file">
												    <input type="file" class="custom-file-input imageFile" id="big_pic" name="big_pic" accept="image/x-png,image/gif,image/jpeg">
												    <label class="custom-file-label" for="big_pic">Picture</label>
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
                            
                            <div class="modal fade" id="editSmallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Edit Small Picture</h5>
							        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">×</span>
							        </button>
										</div>
										<form method="post" action="/db/editSmallPicture.php?id='.$project_id.'" enctype="multipart/form-data">
                                            <div class="modal-body">
                                            
                                            <img class="editable rounded border img-responsive" 
                                                style="width: auto; height: auto; max-width: 100%; max-height: 100%;" 
                                                alt="Avatar" id="avatar2" 
                                                src="/img/projects/'.$project['small_pic'].'">

                                                <div class="m-3"></div>

												<div class="input-group form-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="imageUpload">Small picture</span>
													</div>
                                                  <div class="custom-file">
												    <input type="file" class="custom-file-input imageFile" id="small_pic" name="small_pic" accept="image/x-png,image/gif,image/jpeg">
												    <label class="custom-file-label" for="small_pic">Picture</label>
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

							<div class="modal fade" id="editLongDescModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Edit Long Description</h5>
							        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">×</span>
							        </button>
										</div>
										<form method="post" action="/db/editLongDescription.php?id='.$project_id.'">
											<div class="modal-body">

												<div class="form-group">
													<textarea class="form-control" rows="6" id="long_desc" name="long_desc">'.$project['long_desc'].'</textarea>
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
							
							<div class="modal fade" id="removeProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							       <h5 class="modal-title" id="exampleModalLabel">Remove <b>', $project['name'], '</b></h5>
							       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							         <span aria-hidden="true">×</span>
							       </button>
								  </div>
								  <form method="post" action="/db/removeProject.php?id='.$project_id.'">
								  	<div class="modal-body">
								  		<h5 class="modal-title">Are you sure you want to remove this project?</h5>
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
