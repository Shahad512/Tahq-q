<?php  session_start(); error_reporting(0); 
?>
<html>
 
<head>
<title>TAHQQ</title>

<meta charset="utf-8">
<script src="https://kit.fontawesome.com/fd26d16765.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Economica:wght@400;700&display=swap" rel="stylesheet">	
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css"><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com"  crossorigin>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet"  href="style.css">

</head>

<body>
    
    <?php  include("include/header.php");?>

<!-- section-1-end! -->

<!-- section-2-start! -->

<div class="kbr_colores">

<div class="container">

<div class="row pt-5">

<div class="col-md-5 pt-4">

<h2 class="text-white">Check with ease,</h2>

<h1 class="font-weight-bold  kbr_heading_1 pt-2 text-white">Your SBC Guide.</h1>

                              <?php if(!isset($_SESSION['user'])){ 	?>


<button type="button" class="btn btn- text-white mt-5 my-3 button-1 px-5" onclick="window.location='Registration.php'">JOIN IN</button>
<?php }else{?>
    
<button type="button" class="btn btn- text-white mt-5 my-3 button-1 px-5" onclick="window.location='welcome.php'">Profile</button>

    <?php } ?>
</div>


<div class="col-md-7 kbr_images_12">

<img src="images/Header graph (1).png">

</div>





</div>
</div>
</div>

<!-- section-2-end! -->


<!-- section-3-start! -->

<div class="kbr_section_3 py-5">

<div class="container">

<div class="row pt-3">

<div class="col-md-12">
	
<h2 class="text-center text-white kbr_heading_style" id="about">About us</h2>
	  
</div> 
</div>

<div class="row pt-5">

<div class="col-md-12">

<h1 class="text-white h1 font-weight-bold ">TAHQ'Q</h1>

<p class="  kbr_pra pt-4">Tahq’q is a result of a study conducted by the architecture and planning collage, Which aim to facilitate the Saudi Building Code compliance checking for the Saudi construction field. With the contribution of computer science and information Technology collage to finalize the implementation process and transfer the vision to reality.</p>

<h1 class="text-white h1 font-weight-bold  pt-4">OUR GOAL</h1>

<p class="  kbr_praes pt-4">Contribute to facilitating the process of the Saudi Building Code compliance checking for building projects by automating the SBC through the services that TAHQ’Q provide.</p>

</div>
</div>

</div>

<!-- section-3-end! -->

<!-- section-4-start! -->



<div class="container">

<div class="row pt-3">

<div class="col-md-12 ">
	
<h2 class="text-center text-white kbr_heading_style">Services</h2>
	  
</div> 
</div>

<div class="row justify-content-between pt-5 pb-3">
  
<div class="col-md-6 kbres-11111">
	 
<div class="card text-center position-relative kbr_services_box px-3 pr-4 py-4">
	  
<div class="card-body">
		
<div class="row">
		 
<div class="col">

<img src="images/Vectors (2).png"  width="60">
	
</div>

<div class="col">
		  
<h2 class="text-white text-right kbr_card_title">Check</h2>
			
</div>
		  
</div>  
		      
<p class="card-text kbr_para_style pt-3  text-justify pra-12345">The compliance checking guide to verify building projects in accordance to SBC 1011</p>
		   
</div>	
</div> 
</div>

<div class="col-md-6">
	 
<div class="card text-center position-relative kbr_services_box px-3 pr-4 py-4">
	  
<div class="card-body">
		
<div class="row">
		 
<div class="col">

<img src="images/Vectors.png"  width="60">
			
</div>

<div class="col">
		  
<h2 class="text-white text-right kbr_card_title">Search</h2>
			
</div>
		  
</div>  
		      
<p class="card-text kbr_para_style pt-3  text-justify  pra-12345">The quick accessible guide on applying the SBC 1011 regulations during design</p>
		   
</div>	 
</div> 
</div>



</div>
</div>

<!-- section-4-end! -->

<!-- section-5-start! -->


<div class="container">

<div class="row py-5">

<div class="col-md-12">
	
<h3 class="text-center text-white kbr_heading_style_2">Empwered by</h3>

</div> 
</div>

<div class="row">

<div class="col-md-12 text-center">


<img src="images/Powered logo.png">


</div>
</div>


</div>


<!-- section-5-end! -->

<!-- section-6-start! -->



<div class="container">

<div class="row py-5">

<div class="col-md-12">
	
<h3 class="text-center text-white kbr_heading_style_2">Contant Us</h3>

</div> 
</div>

<div class="row kbr_icones pb-5">

<div class="col-md-12 text-center pb-4">

<img src="images/Instagram.png" width="50">

<img src="images/Twitter.png" width="50">

<img src="images/Email.png" width="50">



</div> 
</div>

</div>
</div>
<!-- section-6-end! -->







<!-- section-footer-start! -->

    <?php  include("include/footer.php");?>

	
</body>
</html>	