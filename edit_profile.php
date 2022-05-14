
<?php require_once('include/session.php');  

require_once('include/conn.php');
    $user_id = $_SESSION['user'];

 


		


if(isset($_POST['update_account'])){ //register

	
	if($_POST['email']!=""   && $_POST['user_name']  && $_POST['first_name']!="" && $_POST['degree']!="" && $_POST['specialization']!="" && $_POST['sce_membership_number']!="" && $_POST['nationality']!="" && $_POST['country']!="" && $_POST['city']!="" && $_POST['phone']!=""){
		
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
$password1 = $_POST['password'];



    
		
	 $query2  = "SELECT * FROM user WHERE password = '$password1' and id = '$user_id'";	
	 $check_user2  = mysqli_query($conn,$query2);
	 

            if(mysqli_num_rows($check_user2)>0){
            
            $password = $_POST['password'];

        }
    
    
        	
	 $query  = "SELECT * FROM user WHERE email = '$email'  and id != '$user_id'";	
	 $check_user  = mysqli_query($conn,$query);
	 
               
    $query1  = "SELECT * FROM user WHERE user_name = '$user_name' and id != '$user_id'";	
	 $check_user1  = mysqli_query($conn,$query1);
	
		if(mysqli_num_rows($check_user)>0){ //if email already Exist
			$url = 'edit_profile.php?errormsg=Email already Exist';
			redirect($url);	
		}elseif(mysqli_num_rows($check_user1)>0){
			$url = 'edit_profile.php?errormsg=Username already Exist';
			redirect($url);	
		}else{
		//insert user data in db
            
                
                
		$update_user = mysqli_query($conn,"Update user SET first_name='$first_name' ,user_name='$user_name', degree ='$degree', specialization ='$specialization' , sce_membership_number = '$sce_membership_number' , nationality = '$nationality' ,country ='$country' , city ='$city' , email = '$email' , phone = '$phone', password='$password' where id ='$user_id'");
            
            
			
			$url = 'welcome.php?msg=Profile Updated successfully';
			redirect($url);	
		}
	}else{
		$url = "edit_profile.php?errormsg=Please Fill All fileds";
				redirect($url);
	}
}else{

    $q  = mysqli_query($conn,"select * from user where id = '$user_id'");

$r = mysqli_fetch_assoc($q);

    
$email  = $r['email'];
$user_name = $r['user_name'];
$first_name  = $r['first_name'];
$degree = $r['degree'];
$specialization  = $r['specialization'];
$sce_membership_number = $r['sce_membership_number'];
$nationality  = $r['nationality'];
$country = $r['country'];
$city  = $r['city'];
$phone = $r['phone'];
$password = $r['password'];

} 
?>
 
<html>
 
<head>
<title>Edit Profile</title>
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

<h1 class="text-white pb-3">TAHQ'Q تحقاق</h1>

<h1 class="text-white H3 pb-4">UPDATE PROFILE</h1>
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
<input style="margin-left:-60px" class="form-control kbreses-2" type="password" placeholder="Password" name="password" id="password" required value="<?=$password?>">

 <button  style="border:none; " type="submit" class="bttun_kbr-77766" name="update_account">Update Profile</button>

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
</script>  
</body>
</html>