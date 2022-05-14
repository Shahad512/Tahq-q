<?php  session_start(); error_reporting(0); 

require_once('include/conn.php');

if(isset($_SESSION['user']) && $_SESSION['user']!=""){ //redirect if already Login
	$rurl = 'index.php';
	redirect($rurl);	
} 


		
$email  = "";
$user_name = "";
$first_name  = "";
$degree = "";
$specialization  = "";
$sce_membership_number = "";
$nationality  = "";
$country = "";
$city  = "";
$phone = "";
$password = "";
$password1 = "";

$rpassword = "";
$errors ="";



if(isset($_POST['new_account'])){ //register

    
    
	
	if($_POST['email']!="" &&  $_POST['password']!=""  && $_POST['user_name']  && $_POST['password']==$_POST['rpassword']  && $_POST['first_name']!="" && $_POST['degree']!="" && $_POST['specialization']!="" && $_POST['sce_membership_number']!="" && $_POST['nationality']!="" && $_POST['country']!="" && $_POST['city']!="" && $_POST['phone']!="" ){
        $password1 = $_POST['password'];

        
    if (strlen($password1) < 8) {
        $errors.= " should be atleast 8 characters!<br>";
    }

    if (!preg_match("#[0-9]+#", $password1)) {
        $errors .= "Password must include at least one number!<br>";
    }

    if (!preg_match("#[a-zA-Z]+#", $password1)) {
        $errors .= "Password must include at least one letter!<br>";
    }     
    
   /* if(!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/",$password1)){
        
                $errors .= "Password must include at least one Special Character!";

    }*/

        if($errors==""){
		
$email  = $_POST['email'];
$user_name = $_POST['user_name'];
$first_name  = $_POST['first_name'];
$degree = $_POST['degree'];
$specialization  = $_POST['specialization'];
$sce_membership_number = $_POST['sce_membership_number'];
$nationality  = $_POST['nationality'];
$country = $_POST['country'];
$city  = $_POST['city'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);

$rpassword = $_POST['rpassword'];

		





		
	 $query  = "SELECT * FROM user WHERE email = '$email'";	
	 $check_user  = mysqli_query($conn,$query);
	 
	 $query1  = "SELECT * FROM user WHERE user_name = '$user_name'";	
	 $check_user1  = mysqli_query($conn,$query1);
	
		if(mysqli_num_rows($check_user)>0){ //if email already Exist
			$url = 'Registration.php?errormsg=Email already Exist';
			redirect($url);	
		}elseif(mysqli_num_rows($check_user1)>0){
			$url = 'Registration.php?errormsg=Username already Exist';
			redirect($url);	
		}else{
		//insert user data in db
            
                
                
		$insert_user = mysqli_query($conn,"INSERT INTO user SET first_name='$first_name' ,user_name='$user_name', degree ='$degree', specialization ='$specialization' , sce_membership_number = '$sce_membership_number' , nationality = '$nationality' ,country ='$country' , city ='$city' , email = '$email' , phone = '$phone', password='$password'");
		 $last_id = mysqli_insert_id($conn);
            
            
        $_SESSION['user']=$last_id;
            
            add_activity($conn,"New User Registration",$last_id);
			
			$url = 'index.php';
			redirect($url);	
		}
	}else{
            
          //  echo $errors;
            
            	$url = "Registration.php?errormsg=".$errors;
				redirect($url);

        }
    }
    else{
		$url = "Registration.php?errormsg=Please Fill All fileds";
				redirect($url);
	}
} 
?>
 
<html>
 
<head>
<title>Registration</title>
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
    
<div class="kbr_section_14">

<div class="container">

<div class="row text-center  justify-content-center">

<div class="col-md-12 kbr_border-5">

<h1 class="text-white pb-3">TAHQ'Q</h1>

<h1 class="text-white H3 pb-4">REGISTRATION</h1>
<form method="post">

    <?php if(isset($_GET['errormsg']) && $_GET['errormsg'] != ""){ ?>
    
<div class="alert alert-danger" role="alert">
  <?=$_GET['errormsg'] ?>
</div>
    
    <?php } ?>

    
    
<div class="kbr_formes-1">
<input class="form-control kbreses-2  mt-4" type="text" placeholder="First Name" name="first_name" id="first_name" required value="<?=$first_name?>">
<input class="form-control kbreses-2 mt-4" type="text" placeholder="Username" name="user_name" id="user_name" required value="<?=$user_name?>">
<input class="form-control kbreses-2 mt-4" type="text" placeholder="Specialization" name="specialization" id="specialization" required value="<?=$specialization?>">
<input class="form-control kbreses-2 mt-4" type="text" placeholder="Degree" name="degree" id="degree" required value="<?=$degree?>">
<input class="form-control kbreses-2 mt-4" type="text" placeholder="SCE Membership Number" name="sce_membership_number" id="sce_membership_number" required value="<?=$sce_membership_number?>">
<input class="form-control kbreses-2 mt-4" type="text" placeholder="Nationality" name="nationality" id="nationality" required value="<?=$nationality?>">
<input class="form-control kbreses-2 mt-4" type="text" placeholder="Country" name="country" id="country" required value="<?=$country?>">
<input class="form-control kbreses-2 mt-4" type="text" placeholder="City" name="city" id="city" required value="<?=$city?>">
<input class="form-control kbreses-2 mt-4" type="email" placeholder="Email" name="email" id="email" required value="<?=$email?>">
<input class="form-control kbreses-2 mt-4" type="tel" placeholder="Phone Number" name="phone" id="phone" required value="<?=$phone?>">
<input onKeyUp="checkPasswordStrength();" class="form-control kbreses-2 mt-4" type="password" placeholder="Password" name="password" id="password" required value="<?=$password?>" >        <div id="password-strength"></div>

<input class="form-control kbreses-2 mt-4" type="password" placeholder="Confirm Password" name="rpassword" id="rpassword" required value="<?=$password1?>">

<div class="form-check kbr_0987" style="    margin-top: 55px;
">
  <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="">
 <span class="span_2341 text-white">Additional classes can be used to vary this layout on a per-form</span> 
 
</div>
 <button style="border:none;" type="submit" class="bttun_kbr-77766" name="new_account">REGISTRATION</button>

</div>
    </form>
</div>

</div>
</div>
</div>
    
        <?php  include("include/footer.php");?>


<!-- section-footer-end! -->
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>

<script>
function validate_form(){
var user_name = document.getElementById("username").value;	
var password = document.getElementById("password").value;
var email = document.getElementById("email").value;	
var rpassword = document.getElementById("rpassword").value;	
if(username==""){
 alert("Username is Required");
    return false;
}
if(email==""){
 alert("Email is Required");
    return false;
}else if(validateEmail(email)==false){
	 alert("Please Write correct Email");
	     return false;
}
if(password==""){
 alert("Password is Required");
    return false;
}
if(rpassword==""){
 alert("Confirm Password is Required");
    return false;
}
if(password!=rpassword){
	 alert("Password and Confirm Password Not Matach");
    return false;
}




}
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
        function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#password').val().length < 8) {
                $('#password-strength').removeClass();
                $('#password-strength').addClass('weak-pass');
                $('#password-strength').html("Weak (should be atleast 8 characters.)");
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                    $('#password-strength').removeClass();
                    $('#password-strength').addClass('strong-pass');
                    $('#password-strength').html("");
                } else {
                    $('#password-strength').removeClass();
                    $('#password-strength').addClass('medium-pass');
                    $('#password-strength').html("Medium (should include alphabets, numbers and special characters.)");
                }
            }
        }
    </script>
    <style> #password-strength {
        position: absolute;
                padding: 5px 10px;
                color: #FFFFFF;
                border-radius: 4px;
                margin-top: 5px;
            }
            .medium-pass {
                background-color: #ce1d14;
                border: #AA4502 1px solid;
            }
            .weak-pass {
                background-color: #ce1d14;
                border: #AA4502 1px solid;
            }
            .strong-pass {
                background-color: #12CC1A;
                border: #0FA015 1px solid;
            }</style>
</body>
</html>