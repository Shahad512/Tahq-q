<?php require_once('include/session.php');  



require_once('include/conn.php');  

$user_id = $_SESSION['user'];

$q  = mysqli_query($conn,"select * from user where id = '$user_id'");

$r = mysqli_fetch_assoc($q);

require_once('include/rate_submit.php');  

?>



<html>



<head>

<title>History</title>

  <meta charset="utf-8">

  <script src="https://kit.fontawesome.com/fd26d16765.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Economica,wght@400;700&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Poppins,wght@400;500;600;700&display=swap" rel="stylesheet">



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


<h1 class="text-white pb-3">TAHQ'Q</h1>

<h1 class="text-white H3 pb-4">HISTORY</h1>










        </div>





        <div class="col-md-6 kbr_images_12">



          <img src="images/Device (1).png">



        </div>











      </div>

    </div>

  </div>



  <!-- section-2-end! -->



  <!-- section-12-start! -->



  <div class="kbr_section_12">

    <div class="container">

      <div class="row py-5">

        <div class="col-md-12">
<?php if(isset($_GET['msg']) && $_GET['msg'] != ""){ ?>
    
<div class="alert alert-success" role="alert">
  <?=$_GET['msg'] ?>
</div>
    
    <?php } ?>

            <ul class="list-unstyled">
                <li class="media">
                    <img src="images/person_outline.png" class="mr-3" style="width,70px" alt="">
                    <div class="media-body">
                    <h1 class="my-4 text-white">Welcome <?=$r['first_name']?></h1>
                    
                    </div>
                </li>
            </ul>

        </div>

        <div class="col-md-12 mb-4">
            

            <div class="site_welcome_box text-white ">
                <div class="row">
                <div class="col-lg-6">
                    <ul class="site_welcome_box_detail_lsit list-unstyled">
                    <li>NAME: <?=$r['first_name']." ".$r['last_name']?></li>
                    <li>ID: <?=$r['sce_membership_number']?></li>
                    <li>SPACIALITY: <?=$r['specialization']?></li>
                    <li>PHONE NUMBER: <?=$r['phone']?></li>
                    <li>EMAIL: <?=$r['email']?></li>
                    </ul>
                </div>
                <div class="col-lg-6">

                    <ul class="site_welcome_box_button_lsit list-unstyled">
                    <li><a href="edit_profile.php" class="btn btn-success btn-block">EDIT PROFILE</a></li>
                    <li><a href="logout.php" class="btn btn-success btn-block">SIGN OUT</a></li>
                    <li><a href="history.php" class="btn btn-success btn-block">VIEW HISTORY</a></li>
                    <li><a href="" class="btn btn-success btn-block" data-toggle="modal" data-target="#wytModal">ASK QUESTION</a></li>
                    </ul>
                
                </div>
                </div>
            </div>  
            
            

        </div>

        </div>

<div class="row">

        <div class="col-6">

        <div class="site_welcome_box text-white">
                <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-4">SBC Appling</h2>

                    <div class="site_history_list" style="background:none;">
                        
                        <?php $q = mysqli_query($conn,"select * from sbc_user where user_id='$user_id' ");
                        
                        while($r = mysqli_fetch_array($q)){ ?>
                    
                        <div class="row" style="background:#133b5c;margin-bottom:10px;padding:5px;">
                            <div class="col-md-8"><a target="_blank" href="<?php if($r['pdf_type']=='with'){ ?>sbc_pdf.php<?php } else {?>sbf_pdf_without.php<?php }?>" class="site_error_check_link"><?php 
                            if($r['pdf_type']=='with') echo "With Reference"; else echo "Without Reference";
                                ?></a></div>
                            <div class="col-md-4">
                                <div class="site_errorchecking_date_wrap">
                                <div class="site_ec_date"><?=date("Y-m-d",strtotime($r['datetime']))?></div>
                                <div class="site_ec_time"><?=date("g,i a",strtotime($r['datetime']))?></div>
                                </div>
                            </div>
                        </div>
                        
                    <?php  } ?>
                    </div>


                </div>

                </div>
                </div>
            </div> 
            <div class="col-6">

        <div class="site_welcome_box text-white">
                <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-4">Error Checking</h2>

                    <div class="site_history_list" style="background:none;">
                        
                        <?php $q = mysqli_query($conn,"select * from user_answer where user_id='$user_id' GROUP by session");
                        
                        while($r = mysqli_fetch_array($q)){ ?>
                    
                        <div class="row" style="background:#133b5c;margin-bottom:10px;padding:5px;">
                            <div class="col-md-8"><a target="_blank" href="checking_pdf.php?session=<?=$r['session']?>" class="site_error_check_link">Error checking</a></div>
                            <div class="col-md-4">
                                <div class="site_errorchecking_date_wrap">
                                <div class="site_ec_date"><?=date("Y-m-d",strtotime($r['datetime']))?></div>
                                <div class="site_ec_time"><?=date("g,i a",strtotime($r['datetime']))?></div>
                                </div>
                            </div>
                        </div>
                        
                    <?php  } ?>
                    </div>


                </div>

                </div>
                </div>
            </div> 
    
          </div>

      </div>

    </div>

   </div>




                <?php  include("include/rate.php");?>


        <?php  include("include/footer.php");?>






    <!-- Optional JavaScript; choose one of the two! -->



    <!-- Option 1, jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="js/jquery.slim.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/script.js"></script>
    
    <script>
    
    function rating(id){
        $("#rate_field").val(id);
        if(id==1){
            $(".rate1").css("color" , "#479990");
            $(".rate2").css("color" , "#ffffff");
            $(".rate3").css("color" , "#ffffff");
            $(".rate4").css("color" , "#ffffff");
            $(".rate5").css("color" , "#ffffff");


        }else if(id==2){
            
            $(".rate1").css("color" , "#479990");
            $(".rate2").css("color" , "#479990");
            $(".rate3").css("color" , "#ffffff");
            $(".rate4").css("color" , "#ffffff");
            $(".rate5").css("color" , "#ffffff");

        }else if(id==3){
            
            $(".rate1").css("color" , "#479990");
            $(".rate2").css("color" , "#479990");
            $(".rate3").css("color" , "#479990");
            $(".rate4").css("color" , "#ffffff");
            $(".rate5").css("color" , "#ffffff");

        }else if(id==4){
            
            $(".rate1").css("color" , "#479990");
            $(".rate2").css("color" , "#479990");
            $(".rate3").css("color" , "#479990");
            $(".rate4").css("color" , "#479990");
            $(".rate5").css("color" , "#ffffff");

        }else if(id==5){
            
            $(".rate1").css("color" , "#479990");
            $(".rate2").css("color" , "#479990");
            $(".rate3").css("color" , "#479990");
            $(".rate4").css("color" , "#479990");
            $(".rate5").css("color" , "#479990");

        }
    } 
    
    </script>

</body>
</html>