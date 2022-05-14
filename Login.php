<?php  session_start(); error_reporting(0); 

require_once('include/conn.php');  


if(isset($_SESSION['user']) && $_SESSION['user']!=""){ //redirect if already Login
	$rurl = 'index.php';
	redirect($rurl);	
} 
if(isset($_POST['signin'])){ //login User

$status = '';
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
// Validation: Checking entered captcha code with the generated captcha code
if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
// Note: the captcha code is compared case insensitively.
// if you want case sensitive match, check above with strcmp()
$status = "Entered captcha code does not match! Kindly try again.";
}
}else{
   $rurl = "Login.php?errormsg=captcha Required.";
				redirect($rurl);
			 
}
    if($status==""){
	if($_POST['user_name']!="" &&  $_POST['password']!="" && $_POST['captcha']!=""){
		
		$user_name = $_POST['user_name'];
		$password = md5($_POST['password']);
         $query  = "SELECT * FROM user WHERE user_name = '$user_name' AND password='$password'";
        
		$count_users  = mysqli_query($conn,$query);
	
		if(mysqli_num_rows($count_users)>0){
		$result = mysqli_fetch_array($count_users);
				
				$_SESSION['user']=$result['id'];
				 redirect('welcome.php');
		}else{
			
				$rurl = "Login.php?errormsg=Wrong Username Or password.";
				redirect($rurl);
			
			
		}
	}else{
		$rurl = "Login.php?errormsg=Wrong Username Or password.";
				redirect($rurl);
	}
}else{
        $rurl = "Login.php?errormsg=".$status;
				redirect($rurl);

    }
}

if(isset($_POST['send_pass'])){
    $email = $_POST['email'];
    
    $q = mysqli_query($conn,"select * from user where email ='$email'");
    $count = mysqli_num_rows($q);
    if($count>0){
       
        $rand = rand(10000,100);

        mysqli_query($conn,"update  user set otp = '$rand' where email = '$email' ");
        $_SESSION['email'] = $email;
        
        
        $otp = "OTP for Password Reset : ".$rand;
        
        sendmail($email, "Password Reset",$otp);
        
        
        $rurl = "Login.php?msg=otp_sent";
				redirect($rurl);
    }else{
     
        
		$rurl = "Login.php?errormsg=Email not Found.";
				redirect($rurl);
    }
}

if(isset($_POST['recive_otp'])){
    
 $email =    $_SESSION['email'];
$new_otp = $_POST['r_otp'];
  
    
    $q = mysqli_query($conn,"select * from user where email ='$email' and otp = '$new_otp'");
    $count = mysqli_num_rows($q);
    
     if($count>0){
         
         mysqli_query($conn, "update user set otp = '' where email = '$email'");
        $rurl = "Login.php?msg=otp_correct";
         redirect($rurl);
     }else{
         
         
		$rurl = "Login.php?error=wrong_otp";
				redirect($rurl);
     }
    
}

if(isset($_POST['reset_pass'])){
    
    $p = $_POST['cpassword'];
    $rp = $_POST['re_cpassword'];
    if($p==$rp){
        
        $p= md5($p);
        
         $email =    $_SESSION['email'];
        
        mysqli_query($conn,"update user set password = '$p' where email = '$email'");
        
        $rurl = "Login.php?msg=Password Updated Successfully";
         redirect($rurl);

        
    }else{
        
        
        $rurl = "Login.php?error=password_not_match";
         redirect($rurl);
    }
}

?>



<html>
 
<head>
<title>Login</title>
<meta charset="utf-8">
<script src="https://kit.fontawesome.com/fd26d16765.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Economica:wght@400;700&display=swap" rel="stylesheet">	
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css"><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com"  crossorigin>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet"  href="style.css">

</head>

<body>
    <?php  include("include/header.php");?>

<!-- section-13-start! -->

<div class="kbr_section_13">

<div class="container">

<div class="row text-center  justify-content-center">

<div class="col-md-6 kbr_border-1">

<h1 class="text-white">TAHQ'Q</h1>

<h1 class="text-white">LOGIN</h1>
   <?php if(isset($_GET['errormsg']) && $_GET['errormsg'] != ""){ ?>
    
<div class="alert alert-danger" role="alert">
  <?=$_GET['errormsg'] ?>
</div>
    
    <?php } ?>
    
     <?php if(isset($_GET['msg']) && $_GET['msg'] != ""){ ?>
    
<div class="alert alert-success" role="alert">
  <?=$_GET['msg'] ?>
</div>
    
    <?php } ?>
<form method="post">
<input class="form-control kbr_kbr_21  mt-4" type="text" placeholder="Username" name="user_name" id="user_name">

<input class="form-control kbr_kbr_21 mt-4" type="password" placeholder="Password" name="password" id="password">
    
    <?php  include("include/captcha_new.php");
    echo '<div class="captcha">'.$_SESSION['captcha'].'</div>';
    ?>
 
<input type="text" class="ccc" name="captcha" />
    <style>
        .ccc{    float: left;
    width: 60%;
    margin-left: 10px;
    margin-top: 10px;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
    
    </style>


<br>
<a class="kbr_1_kbr" href="#" data-toggle="modal" data-target="#exampleModal">Forget password?</a>

<button  class="bttun_kbr-1" style="border:none; width:100%" name="signin">LOGIN</button>	

<a  class="bttun_kbr-1" href="Registration.php">RESGISTER</a>
    
    </form>

</div>
</div>
</div>
</div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      
      <form method="post">
    <div class="modal-content kbr_kbr_modales">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h3 class="kbr_modal_2323">FORGET PASSWORD</h3></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input name="email"  required class="form-control	kbr_modal_0980  mt-4" type="text" placeholder="Email">
      </div>
	  <button type="submit" name="send_pass" class="btn btn-success">SEND</button>

      </div>
          </form>
    </div>
      
  </div>
    
    
    <div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form method="post">
    <div class="modal-content kbr_kbr_modales">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h3 class="kbr_modal_2323">ENTER OTP</h3></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <?php if(isset($_GET['error']) && $_GET['error'] != "wrong_otp"){ ?>
    
<div class="alert alert-danger" role="alert">
Your enter wrong OTP please try again..

</div>
    
    <?php } ?>
          
          <?php if(isset($_GET['msg']) && $_GET['msg'] != "otp_correct"){ ?>
    
<div class="alert alert-success" role="alert">
Please check your Email for OTP
</div>
    
    <?php } ?>

        <input required name="r_otp" class="form-control	kbr_modal_0980  mt-4" type="text" placeholder="Code">
      </div>
	  <button type="submit" name="recive_otp" class="btn btn-success">submit</button>

      </div>
          </form>
    </div>
  </div>
    
    <div class="modal fade" id="exampleModalll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form method="post">
    <div class="modal-content kbr_kbr_modales">
      <div class="modal-header 	">
        <h5 class="modal-title" id="exampleModalLabel"><h3 class="kbr_modal_2323"> CREATE NEW PASSWORD</h3></h5>
          
           
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php if(isset($_GET['error']) && $_GET['error'] != "password_not_match"){ ?>
    
<div class="alert alert-danger" role="alert">
Password and confirm password not match!
</div>
    
    <?php } ?>
        
          
        <input  name="cpassword" id="cpassword" required class="form-control	kbr_modal_0980  mt-4" type="password" placeholder="New Password">
		        <input name="re_cpassword" id="re_cpassword" class="form-control	kbr_modal_0980  mt-4" type="password" placeholder="Confirm New password">

      </div>
	  <button type="submit"  name= "reset_pass" class="btn btn-success">SUBMIT</button>

      </div>
          </form>
    </div>
  </div>


        <?php  include("include/footer.php");?>



<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>


<script>
function validate_form(){
var username = document.getElementById("username").value;	
var password = document.getElementById("password").value;	
if(username==""){
 alert("Username is Required");
    return false;
}
if(password==""){
 alert("Password is Required");
    return false;
}

}
//Refresh Captcha
function refreshCaptcha(){
    var img = document.images['captcha_image'];
    img.src = img.src.substring(
		0,img.src.lastIndexOf("?")
		)+"?rand="+Math.random()*1000;
}
<?php if(isset($_GET['msg']) && $_GET['msg']=="otp_sent") {?>  
    $(window).on('load', function() {
        $('#exampleModall').modal('show');
    });
<?php } ?>
    
<?php if(isset($_GET['error']) && $_GET['error']=="wrong_otp") {?>  
    $(window).on('load', function() {
        $('#exampleModall').modal('show');
    });
<?php } ?>
    

<?php if(isset($_GET['msg']) && $_GET['msg']=="otp_correct") {?>  
    $(window).on('load', function() {
        $('#exampleModalll').modal('show');
    });
<?php } ?>
    
<?php if(isset($_GET['error']) && $_GET['error']=="password_not_match") {?>  
    $(window).on('load', function() {
        $('#exampleModalll').modal('show');
    });
<?php } ?>
    
    var new_password = document.getElementById("cpassword");
  var new_confirm_password = document.getElementById("re_cpassword");

function validatePassword(){
  if(new_password.value != new_confirm_password.value) {
    new_confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    new_confirm_password.setCustomValidity('');
  }
}

new_password.onchange = validatePassword;
new_confirm_password.onkeyup = validatePassword;
  
</script>
</body>
</html>