<?php require_once('include/session.php');  

require_once('include/conn.php');  
?>
<html>

<head>
<title>APPLYING THE SBC</title>
<meta charset="UTF-8">
	<script src="https://kit.fontawesome.com/fd26d16765.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Economica:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="style.css">

</head>

<body>

    
        <?php  include("include/header.php");?>

	<!-- section-2-start! -->

	<div class="kbr_colores">

		<div class="container">



			<div class="row ">

				<div class="col-md-6 pt-4">


					<h1 class="font-weight-bold  kbr_heading_88 pt-5 text-white  ">APPLYING THE SBC</h1>



				</div>


				<div class="col-md-6 kbr_images_12">

					<img src="images/Device (1).png">

				</div>





			</div>
		</div>
	</div>

	<!-- section-2-end! -->
	<!-- section-11-start! -->

	<div class="kbr_section_11">

		<section class="pt-5">

			<div class="container">

				
			<div class="row">
				<div class="col-lg-12">
                          							<form id="msform">

					<ul class="site_sbc_tabs nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
						  <a class="nav-link active" data-toggle="pill" href="#pills-sbc-1">Schematic Desgin</a>
						</li>
						<li class="nav-item" role="presentation">
						  <a class="nav-link" data-toggle="pill" href="#pills-sbc-2">Desgin Development</a>
						</li>
						<li class="nav-item" role="presentation">
						  <a class="nav-link" data-toggle="pill" href="#pills-sbc-3">Construction Documents</a>
						</li>
					</ul>
					  <div class="tab-content" id="pills-tabContent">

						<div class="tab-pane fade show active" id="pills-sbc-1" role="tabpanel">


								<!-- fieldsets -->
								<fieldset>
                                    
                                    
									<div class="form-card mb-4">
										<div class="row">
											<div class="col-lg-12">
												
                                                
                                                          <?php
                                    
                                    $query = mysqli_query($conn,"select * from sbc  order by id asc limit 5");
                                                
                                                while($row = mysqli_fetch_array($query)){
                                    
                                    ?>
                                                <div class="card position-relative kbr_services_box px-3 pr-4 py-4 mb-4">

													<div class="card-body">
						
														<div class="row">
						
															<div class="col">
						
																<h2 class="text-white"><?=$row['stage']?> <?=$row['title']?></h2>
						
															</div>
						
															<div class="col">
						
						
															</div>
														</div>
						
														<p class="card-text adl_para_style pt-3 text-white text-justify"><?=$row['detail']?></p>
						
														<a  class="text-white"><?=$row['reference']?></a>
						
													</div>
						
												</div>	
                                                
                                                <?php } ?>
																											
											</div>
											
										</div> 
									</div> 
									
									<button type="button" name="next" class="site_action_btns next action-button float-right"><i class="fa-solid fa-chevron-right"></i></button>

								</fieldset>
								<fieldset>
									<div class="form-card mb-4">
										<div class="row">
											<div class="col-lg-12">
												     <?php
                                    
                                    $query = mysqli_query($conn,"select * from sbc  order by id asc limit 5 OFFSET 5");
                                                
                                                while($row = mysqli_fetch_array($query)){
                                    
                                    ?>
                                                <div class="card position-relative kbr_services_box px-3 pr-4 py-4 mb-4">

													<div class="card-body">
						
														<div class="row">
						
															<div class="col">
						
																<h2 class="text-white"><?=$row['stage']?> <?=$row['title']?></h2>
						
															</div>
						
															<div class="col">
						
						
															</div>
														</div>
						
														<p class="card-text adl_para_style pt-3 text-white text-justify"><?=$row['detail']?></p>
						
														<a  class="text-white"><?=$row['reference']?></a>
						
													</div>
						
												</div>	
                                                
                                                <?php } ?>
																																				
											</div>
											
										</div> 
									</div> 
									<button type="button" class="site_action_btns action-button float-right site_active_sbc_2"  data-toggle="pill" href="#pills-sbc-2"><i class="fa-solid fa-chevron-right"></i></button>									
									<button type="button" name="previous" class="site_action_btns previous action-button-previous float-right"><i class="fa-solid fa-chevron-left"></i></button>


								</fieldset>





						</div>
						<div class="tab-pane fade" id="pills-sbc-2" role="tabpanel">
							

								<!-- fieldsets -->
								<fieldset>
									<div class="form-card mb-4">
										<div class="row">
											<div class="col-lg-12">
                                                				     <?php
                                    
                                    $query = mysqli_query($conn,"select * from sbc  order by id asc limit 5 OFFSET 10");
                                                
                                                while($row = mysqli_fetch_array($query)){
                                    
                                    ?>
                                                <div class="card position-relative kbr_services_box px-3 pr-4 py-4 mb-4">

													<div class="card-body">
						
														<div class="row">
						
															<div class="col">
						
																<h2 class="text-white"><?=$row['stage']?> <?=$row['title']?></h2>
						
															</div>
						
															<div class="col">
						
						
															</div>
														</div>
						
														<p class="card-text adl_para_style pt-3 text-white text-justify"><?=$row['detail']?></p>
						
														<a  class="text-white"><?=$row['reference']?></a>
						
													</div>
						
												</div>	
                                                
                                                <?php } ?>
																																				
																															
											</div>
											
										</div> 
									</div> 
									
									<button type="button" name="next" class="site_action_btns next action-button float-right"><i class="fa-solid fa-chevron-right"></i></button>
                                    
									<button type="button" name="previous" class="site_action_btns previous action-button-previous float-right"><i class="fa-solid fa-chevron-left"></i></button>

								</fieldset>
								<fieldset>
									<div class="form-card mb-4">
										<div class="row">
											<div class="col-lg-12">
																     <?php
                                    
                                    $query = mysqli_query($conn,"select * from sbc  order by id asc limit 5 OFFSET 15");
                                                
                                                while($row = mysqli_fetch_array($query)){
                                    
                                    ?>
                                                <div class="card position-relative kbr_services_box px-3 pr-4 py-4 mb-4">

													<div class="card-body">
						
														<div class="row">
						
															<div class="col">
						
																<h2 class="text-white"><?=$row['stage']?> <?=$row['title']?></h2>
						
															</div>
						
															<div class="col">
						
						
															</div>
														</div>
						
														<p class="card-text adl_para_style pt-3 text-white text-justify"><?=$row['detail']?></p>
						
														<a  class="text-white"><?=$row['reference']?></a>
						
													</div>
						
												</div>	
                                                
                                                <?php } ?>
																																																											
											</div>
											
										</div> 
									</div> 
									<button type="button" class="site_action_btns action-button float-right site_active_sbc_3"  data-toggle="pill" href="#pills-sbc-3"><i class="fa-solid fa-chevron-right"></i></button>									
									<button type="button" name="previous" class="site_action_btns previous action-button-previous float-right"><i class="fa-solid fa-chevron-left"></i></button>


								</fieldset>

						</div>
						<div class="tab-pane fade" id="pills-sbc-3" role="tabpanel" >


								<!-- fieldsets -->
								<fieldset>
									<div class="form-card mb-4">
										<div class="row">
											<div class="col-lg-12">
																     <?php
                                    
                                    $query = mysqli_query($conn,"select * from sbc  order by id asc limit 5 OFFSET 20");
                                                
                                                while($row = mysqli_fetch_array($query)){
                                    
                                    ?>
                                                <div class="card position-relative kbr_services_box px-3 pr-4 py-4 mb-4">

													<div class="card-body">
						
														<div class="row">
						
															<div class="col">
						
																<h2 class="text-white"><?=$row['stage']?> <?=$row['title']?></h2>
						
															</div>
						
															<div class="col">
						
						
															</div>
														</div>
						
														<p class="card-text adl_para_style pt-3 text-white text-justify"><?=$row['detail']?></p>
						
														<a  class="text-white"><?=$row['reference']?></a>
						
													</div>
						
												</div>	
                                                
                                                <?php } ?>
																																																											
											</div>
											
										</div> 
									</div> 
									
									<button type="button" name="next" class="site_action_btns next action-button float-right"><i class="fa-solid fa-chevron-right"></i></button>
                                    
									<button type="button" name="previous" class="site_action_btns previous action-button-previous float-right"><i class="fa-solid fa-chevron-left"></i></button>

								</fieldset>
								<fieldset>
									<div class="form-card mb-4">
										<div class="row">
											<div class="col-lg-12">
															     <?php
                                    
                                    $query = mysqli_query($conn,"select * from sbc  order by id asc limit 5 OFFSET 25");
                                                
                                                while($row = mysqli_fetch_array($query)){
                                    
                                    ?>
                                                <div class="card position-relative kbr_services_box px-3 pr-4 py-4 mb-4">

													<div class="card-body">
						
														<div class="row">
						
															<div class="col">
						
																<h2 class="text-white"><?=$row['stage']?> <?=$row['title']?></h2>
						
															</div>
						
															<div class="col">
						
						
															</div>
														</div>
						
														<p class="card-text adl_para_style pt-3 text-white text-justify"><?=$row['detail']?></p>
						
														<a  class="text-white"><?=$row['reference']?></a>
						
													</div>
						
												</div>	
                                                
                                                <?php } ?>
																																																											
											</div>
											
										</div> 
									</div> 
									
									<button type="button" name="previous" class="site_action_btns previous action-button-previous float-right"><i class="fa-solid fa-chevron-left"></i></button>
                                    
									<a href="#" class="btn btn-primary float-right mr-5" data-toggle="modal" data-target="#exampleModal" data-whatever="@fsix">Finish</a>


								</fieldset>

						</div>
                          
					  </div>					

                </div></form>
			</div>


			</div>



	</div>

    <?php  include("include/footer.php");?>



		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content kbr_kbr_modales d-block">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><h3 class="kbr_modal_2323 text-center">The steps of Applying the SBC during design is completed </h3></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-white text-center">
					
				<p>All the steps of applying the SBC during design is documented in the following pdf file</p>
			
					<a type="button" class="btn btn-success mb-4" target="_blank" href="sbc_pdf.php?d=1">DOWNLOAD PDF</a>
					<P>Download the steps without reference </P>
					<a type="button" class="btn btn-success mb-4" target="_blank" href="sbc_pdf_without.php?d=1">DOWNLOAD PDF</a><br>
					<button type="button" class="btn btn-success" data-dismiss="modal" >BACK</button>
				</div>
				
		
				</div>
			</div>
		</div>

		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
		<script type='text/javascript' src='js/jquery.min.js'></script>		
		<!--script src="js/jquery.slim.min.js"></script-->
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<script src="js/script.js"></script>
</body>

</html>