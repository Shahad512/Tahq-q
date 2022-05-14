<?php require_once('include/session.php');  


require_once('include/conn.php'); 
            $user =   $_SESSION['user'];
            $user_id =   $_SESSION['user'];


require_once('include/rate_submit.php');  

if(isset($_POST['submit'])){
    add_activity($conn,"Error checking");

      $i =0;                  

    
    $q_m = mysqli_query($conn,"select max(session) as t from user_answer  where user_id='$user'");
    $row_m  = mysqli_fetch_assoc($q_m);
    
    $m = $row_m['t']+1;

    
        
    $query = mysqli_query($conn,"select * from checking  order by id asc");
    
    while($row = mysqli_fetch_array($query)){
              
        if(isset($_POST['check_'.$row['id']])){
                 $q_ans = $_POST['check_'.$row['id']];
   
        }else{
            $q_ans ="";
        }

        
        //if(isset($q_ans) && $q_ans!=""){
        $q_id = $row['id'];
            
                $category= $row['category'];
            

$answer_query = mysqli_query($conn,"select * from checking_answer where question_id = '$q_id'");
$row_answer  = mysqli_fetch_assoc($answer_query);
            
                

if($q_ans=="No" || $q_ans=="") {
    $ans = "Not Compiled";
}elseif($q_ans==$row_answer['result']){
    
    $ans  = "Compiled";
}elseif($q_ans=="Yes"){
    $ans  = "Compiled";
}elseif($q_ans=="less"){
    if($q_ans<=$row_answer['result'] && $q_ans!=""){
            $ans  = "Compiled";

    }else{
            $ans  = "Not Compiled";

    }
    
}elseif($q_ans=="grater"){
    if($row['answer']>=$row_answer['result']){
            $ans  = "Compiled";

    }else{
            $ans  = "Not Compiled";

    }
    
}

            
            

        $q = "insert into  user_answer set question_id = '$q_id', user_id ='$user',session='$m', answer = '$q_ans' , category='$category'";
        
       mysqli_query($conn,$q);
            
            if($ans=="Compiled"){
            $i++;
            }
            
            $ans="";
        //}
    }
    
    if($i==0){
        
         	$rurl = "checking.php?msg=failed";
   
    }else{
    	$rurl = "checking.php?msg=success&session=".$m;
    }
				redirect($rurl);
			
}
?>

<html>

<head>
<title>Error Checking</title>
  <meta charset="utf-8">
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


          <h1 class="font-weight-bold  kbr_heading_88 pt-5 text-white  ">ERROR CHECKING</h1>



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
<div class="row">
        <div class="col-md-12">
<?php if(isset($_GET['msg']) && $_GET['msg'] != ""){ ?>
    
<div class="alert alert-success" role="alert">
  <?=$_GET['msg'] ?>
</div>
    
    <?php } ?>
          <p class="kbr-style_23 text-white textt-center">Please Provide information for each category by answering the questions to verify the compliance of your project according to the SBC</p>

        </div>
      </div>
            <form method="post">
      


          <ul class="site_checking_tabs nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#adv-check" role="tab">Adminstraitive check</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#arc-check" role="tab">Architectural check</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#gen-check" role="tab">General check</a>
            </li>
          </ul>
          <div class="site_checking_tab_content tab-content text-white" id="myTabContent">
            <div class="tab-pane fade show active" id="adv-check" role="tabpanel">

              <!--- Inner tabs start -->
                             

              <div class="tab-content  px-4" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-chk-1" role="tabpanel">

                <?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 1 and category2 = 1 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>
                                 <!-- <button type="button" class="site_action_btns action-button float-right site_active_sbc_2"   onclick="return change_tab_profile()"><i class="fa-solid fa-chevron-right"></i></button>-->
                    
                    
                                  <button type="button"  class="btn-ha float-right" onclick="return change_tab_profile()"><i class="fa-solid fa-chevron-right"></i></button>

                </div>

                
                 

              </div>
              <!--- Inner tabs end -->


            </div>

            <div class="tab-pane fade" id="arc-check" role="tabpanel">
              <ul class="site_sbc_tabs nav nav-pills py-5 justify-content-center" id="pills-tab" role="tablist">
         
                <li class="nav-item active" id="chk-30" role="presentation">
                  <a class="nav-link active" id="pills-chk-30" data-toggle="pill" href="#pills-chk-3">General</a>
                </li>
                <li class="nav-item"  id="chk-40" role="presentation">
                  <a class="nav-link" data-toggle="pill" id="pills-chk-40" href="#pills-chk-4">Means of eggress</a>
                </li>
                <li class="nav-item" id="chk-50" role="presentation">
                  <a class="nav-link" data-toggle="pill" id="pills-chk-50" href="#pills-chk-5">Stairways</a>
                </li>
                <li class="nav-item" id="chk-60" role="presentation">
                  <a class="nav-link" data-toggle="pill" id="pills-chk-60" href="#pills-chk-6">Interior environment</a>
                </li>
         
                </ul>
              
                         <div class="tab-content  px-4" id="pills-tabContent">
   
             <div class="tab-pane fade show active" id="pills-chk-3" role="tabpanel">
                 
                   <?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 2 and category2 = 1 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>
                                                <button type="button" class="site_action_btns action-button float-right site_active_sbc_2"  data-toggle="pill" href="#pills-chk-4" ><i class="fa-solid fa-chevron-right"></i></button>
                 

                </div> 
                    
                  
                             
                <div class="tab-pane fade" id="pills-chk-4" role="tabpanel">
                   <?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 2 and category2 = 2 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>
                    
                                                <button type="button" class="btn-ha float-right"  data-toggle="pill" href="#pills-chk-5" onclick="return chkfive()"><i class="fa-solid fa-chevron-right"></i></button>	
                </div>                
                  
                             
                        
                <div class="tab-pane fade" id="pills-chk-5" role="tabpanel">
<?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 2 and category2 = 3 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>         
                             
                             <button type="button" class="btn-ha float-right"  data-toggle="pill" href="#pills-chk-6" onclick="return chksix()"><i class="fa-solid fa-chevron-right"></i></button>	

                             </div>                
                             
                  
   <div class="tab-pane fade" id="pills-chk-6" role="tabpanel">
<?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 2 and category2 = 4 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>                
                             
                             
                             <button type="button" onclick="return change_tab_contact()" class="site_action_btns btn-ha float-right"  ><i class="fa-solid fa-chevron-right"></i></button>
                             </div>                
                             
                  
                </div>
              <!--  <button type="button" class="site_action_btns action-button float-right site_active_sbc_2"  data-toggle="pill" href="#pills-chk-7" onclick="return change_tab('contact-tab');"><i class="fa-solid fa-chevron-right"></i></button>									
									<!--<button type="button" class="site_action_btns previous action-button-previous float-right" href="#pills-sbc-2" onclick="return change_tab('home-tab');"><i class="fa-solid fa-chevron-left"></i></button>-->
         
            </div>
            <div class="tab-pane fade" id="gen-check" role="tabpanel">
              
              
              <ul class="site_sbc_tabs nav nav-pills py-5 justify-content-center" id="pills-tab" role="tablist">
         
                <li class="nav-item active" id="chk-70" role="presentation">
                  <a class="nav-link active" id="pills-chk-70" data-toggle="pill" href="#pills-chk-7">Plan & Document</a>
                </li>
                <li class="nav-item" id="chk-80" role="presentation">
                  <a class="nav-link" data-toggle="pill"  id="pills-chk-80" href="#pills-chk-8">Site Plan Items to be Included</a>
                </li>
                <li class="nav-item" id="chk-90" role="presentation">
                  <a class="nav-link" data-toggle="pill" id="pills-chk-90" href="#pills-chk-9">Foundation Plan</a>
                </li>
                <li class="nav-item" id="chk-100" role="presentation">
                  <a class="nav-link" data-toggle="pill" id="pills-chk-100"  href="#pills-chk-10">Floor Plans</a>
                </li>
         <li class="nav-item" id="chk-110" role="presentation">
                  <a class="nav-link" data-toggle="pill" id="pills-chk-110" href="#pills-chk-11">Wall section</a>
                </li>
         
                </ul>
              
                <div class="tab-content  px-4" id="pills-tabContent">
                
                    
             <div class="tab-pane fade show active" id="pills-chk-7" role="tabpanel">
                 
                   <?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 3 and category2 = 1 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>
              <button type="button" onclick="return chkeight()" class="float-right btn-ha"  data-toggle="pill" href="#pills-chk-8" ><i class="fa-solid fa-chevron-right"></i></button>
                             
                </div> 
                                
                             
                <div class="tab-pane fade" id="pills-chk-8" role="tabpanel">
                   <?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 3 and category2 = 2 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text"  class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>
                                  <button type="button"  onclick="return chknine()" class="btn-ha float-right"  data-toggle="pill" href="#pills-chk-9" ><i class="fa-solid fa-chevron-right"></i></button>

                </div>                
                  
                        
                <div class="tab-pane fade" id="pills-chk-9" role="tabpanel">
<?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 3 and category2 = 3 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>     
                                                      <button type="button"  onclick="return chkten()" class="btn-ha  float-right"  data-toggle="pill" href="#pills-chk-10" ><i class="fa-solid fa-chevron-right"></i></button>

                    </div>                
                             
                  
   <div class="tab-pane fade" id="pills-chk-10" role="tabpanel">
<?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 3 and category2 = 4 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>
                                                      <button type="button" onclick="return chkeleven" class="btn-ha float-right"  data-toggle="pill" href="#pills-chk-11" ><i class="fa-solid fa-chevron-right"></i></button>

                    </div>                
  
                               
                  
   <div class="tab-pane fade" id="pills-chk-11" role="tabpanel">
<?php 
                    
                $query = mysqli_query($conn,"select * from checking where category = 3 and category2 = 5 order by id asc");
                 while($row = mysqli_fetch_array($query)){
 
                    ?>

                    <label><?php echo $row['question']?></label>
                    
                    <?php if($row['q_type']=='check') {?>
                    <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="No"  name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2" >No</label>
                      </div>
                    </div>
                <?php 
                    }elseif($row['q_type']=='radio'){ ?>
                <div class="form-group form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  value="Yes" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"   value="No" name="check_<?=$row['id']?>">
                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                      </div>
                    </div>    
                  <?php   }elseif($row['q_type']=='text'){ ?>
                        
                    <div class="form-group">
                        <input type="text" class="form-control" name="check_<?=$row['id']?>">
                    </div>

                        
                    <?php }elseif($row['q_type']=='number'){ ?>
                    
                    <div class="form-group">
                        <input type="number" min='0' class="form-control" name="check_<?=$row['id']?>" >
                    </div>

                    
                    <?php }elseif($row['q_type']=='dropdown'){ ?>
                    
                    <?php }
                 } 
                    ?>                </div>                
   
  <!--	<button type="button" name="previous" class="site_action_btns previous action-button-previous float-right" onclick="return change_tab('profile-tab');"><i class="fa-solid fa-chevron-left"></i></button>-->
         
                </div>
              
              </div>
          </div>          


        </div>
          	<button type="submit" style="margin-top:10px;" class="btn btn-primary float-right mr-5" name="submit">Finish</button>

      </div>
        </form>    
    


    </div>
  </div>
    
        <?php  include("include/footer.php");?>

    <!-- section-footer-end! -->

	<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content kbr_kbr_modales d-block">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><h3 class="kbr_modal_2323 text-center"> Your SBC compliance checking is finished</h3></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-white text-center">
					
				<h1 class="mb-4"><img src="images/success-check.png" width="100"/> CONGRATULATIONS</h1>
			
					
					<p class="mb-4">You have completed your project SBC compliance checking, you can revise the following detailed information by downloading the pdf below </p>

					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#askques" data-toggle="modal" data-target="#wytModal">DONE</button>
          <br><br>
					<button type="button" class="btn btn-success mb-4"  onclick="window.location.href='checking_pdf.php?session=<?=$_GET['session']?>'">DOWNLOAD PDF</button>
				</div>
				
		
				</div>
			</div>
		</div>    

    <!-- Fail Modal -->
		<div class="modal fade" id="failModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content kbr_kbr_modales d-block">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><h3 class="kbr_modal_2323 text-center"> Your SBC compliance checking is finished</h3></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-white text-center">
					
				<h1 class="mb-4"><img src="images/fail.png" width="100"/> ERROR FOUNDS</h1>
			
					
					<p class="mb-4">You have not answered any questions regarding your project SBC compliance checking, we advise you to go back and answer.</p>

					<button type="button" class="btn btn-success">BACK</button>
          <br><br>
					<button type="button" class="btn btn-success mb-4">DOWNLOAD PDF</button>
				</div>
				
		
				</div>
			</div>
		</div>  

         		<!-- What You think Modal -->
		<div class="modal fade" id="askques" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
                
                <form method="post">

			<div class="modal-content kbr_kbr_modales d-block">
				<div class="modal-header p-0">
					
					<button type="button" class="site_custom_close close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-white text-center">
					
				<h1 class="mb-4"><img src="images/comment.png" class="mr-4" width="60"/> What do you think?</h1>
        <div class="site_rating_stars mb-4"> 
                  <a href="#" onclick="return rating(1);" ><i class="fa-solid fa-star rate1" style="color:#479990"></i></a>
                  <a href="#" onclick="return rating(2);"><i class="fa-solid fa-star rate2"></i></a>
                  <a href="#" onclick="return rating(3);"><i class="fa-solid fa-star rate3" ></i></a>
                  <a href="#" onclick="return rating(4);"><i class="fa-solid fa-star rate4"></i></a>
                  <a href="#" onclick="return rating(5);"><i class="fa-solid fa-star rate5"></i></a>
                </div>
					<input type="hidden" value="1" name="rate_field" id="rate_field" >
					<div class="mb-4">

                 <textarea name="comment" class="form-control w-100" placeholder="Type your comment" rows="5"></textarea>

                 
                 
          </div>

					<button type="submit" name="rate_add" class="btn btn-success">Submit</button>
          
					
				</div>
				
		
				</div>
                                </form>

			</div>
		</div>   
   




            <?php  include("include/question.php");?>

    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <script>
    
    function change_tab_profile(){
        
        $("#profile-tab").addClass("active");
        $("#arc-check").addClass("active");
        $("#arc-check").addClass("show");
        $("#adv-check").removeClass("active");
        $("#adv-check").removeClass("show");
        $("#home-tab").removeClass("active");
        $("#contact-tab").removeClass("active");
        //$("#pills-chk-30").addClass("active");
        $("#pills-chk-40").removeClass("active");

  
        }
 function change_tab_contact(){
                $("#contact-tab").addClass("active");
   $("#gen-check").addClass("active");
        $("#gen-check").addClass("show");
     
        $("#arc-check").removeClass("active");
        $("#arc-check").removeClass("show");
        $("#adv-check").removeClass("active");
        $("#adv-check").removeClass("show");
        $("#home-tab").removeClass("active");
        $("#profile-tab").removeClass("active");

        $("#pills-chk-30").removeClass("active");
        $("#pills-chk-40").removeClass("active");
     
     
        $("#pills-chk-70").addClass("active");
        $("#pills-chk-80").removeClass("active");
  
        }
        
        function chkfive(){
            
                                        $("#chk-40").removeClass("active");

                                        $("#chk-30").removeClass("active");
                                        $("#pills-chk-40").removeClass("active");

                                        $("#pills-chk-30").removeClass("active");
            

                            $("#pills-chk-50").addClass("active");

        }
        
          function chksix(){
            
                                        $("#chk-40").removeClass("active");

                                        $("#chk-30").removeClass("active");
                                        $("#pills-chk-40").removeClass("active");

                                        $("#pills-chk-30").removeClass("active");
            

                            $("#pills-chk-50").removeClass("active");
                                                      $("#chk-50").removeClass("active");

                                          $("#pills-chk-60").addClass("active");


        }
         
          function chkeight(){
            
                                        $("#chk-70").removeClass("active");

                                        $("#pills-chk-70").removeClass("active");
                $("#pills-chk-80").addClass("active");


        }
        function chknine(){
            
                                        $("#chk-70").removeClass("active");

                                        $("#pills-chk-70").removeClass("active");
            $("#chk-80").removeClass("active");

                                        $("#pills-chk-80").removeClass("active");

                $("#pills-chk-90").addClass("active");


        }
        function chkten(){
            
                                        $("#chk-70").removeClass("active");

                                        $("#pills-chk-70").removeClass("active");
            
            $("#chk-80").removeClass("active");

                                        $("#pills-chk-80").removeClass("active");

            $("#chk-90").removeClass("active");

                                        $("#pills-chk-90").removeClass("active");
            
        

                $("#pills-chk-100").addClass("active");


        }
        function chkten(){
            
                                        $("#chk-70").removeClass("active");

                                        $("#pills-chk-70").removeClass("active");
            
            $("#chk-80").removeClass("active");

                                        $("#pills-chk-80").removeClass("active");

            $("#chk-90").removeClass("active");

                                        $("#pills-chk-90").removeClass("active");
            $("#chk-100").removeClass("active");

                                        $("#pills-chk-100").removeClass("active");
            
        

                $("#pills-chk-110").addClass("active");


        }
    function change_tab_mean(){
        
                $("#pills-chk-4").addClass("active");
                $("#pills-chk-3").removeClass("active");
                      $("#pills-chk-4").addClass("show");
                    $("#pills-chk-3").removeClass("show");

                    $("#pills-chk-40").addClass("active");
                            $("#pills-chk-30").removeClass("active");




    }
    </script>
  <?php if(isset($_GET['msg']) && $_GET['msg']=="success") {?>  
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#successModal').modal('show');
    });
</script>
<?php } ?>
    
    <?php if(isset($_GET['msg']) && $_GET['msg']=="failed") {?>  
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#failModal').modal('show');
    });
</script>
<?php } ?>
    
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
    <style>.btn-ha{
        border-radius: 25px;
    padding: 10px 13px;
    background-color: #3c606a;
    border-color: transparent;
    color: #fff;
    margin: 5px;
        }</style>

</body>

</html>