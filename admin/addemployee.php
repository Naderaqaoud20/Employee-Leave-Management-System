<?php
error_reporting(0);
include('db.php');
$user_id='';
$error='';
$msg='';
session_start();
if(isset($_SESSION['user_id'])){
     $user_id= $_SESSION['user_id'];
}else{
    header("Location: admin-login.php");
}

if(isset($_POST['add']))
{
$empid=$_POST['empcode'];
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$email=$_POST['email']; 
$password=md5($_POST['password']); 
$gender=$_POST['gender']; 
$dob=$_POST['dob']; 
$department=$_POST['department']; 
$address=$_POST['address']; 
$city=$_POST['city']; 
$country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$status=1;

$query="INSERT INTO tblemployees(
    EmpId,
    FirstName,
    LastName,
    EmailId,
    PASSWORD,
    Gender,
    Dob,
    Department,
    Address,
    City,
    Country,
    Phonenumber,
STATUS
)
VALUES(
    '$empid',
    '$fname',
    '$lname',
    '$email',
    '$password',
    '$gender',
    '$dob',
    '$department',
    '$address',
    '$city',
    '$country',
    '$mobileno',
    '$status'
    )";
if($result = mysqli_query($con,$query))
{
$msg="Employee record added Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Add Employee</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
  <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
<script type="text/javascript">
function valid()
{
if(document.addemp.password.value!= document.addemp.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.addemp.confirmpassword.focus();
return false;
}
return true;
}
</script>

<script>
function checkAvailabilityEmpid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'empcode='+$("#empcode").val(),
type: "POST",
success:function(data){
$("#empid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function checkAvailabilityEmailid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#emailid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>



    </head>

    <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title"> Employee Leave Managment System </span>
                        </div>  
                    </div>
                </nav>
            </header>


            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="../assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                       
                                <p>Admin</p>
                        </div>
                    </div>
            
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_box</i>Employees<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="addemployee.php">Add Employee</a></li>
                                <li><a href="manageemployee.php">Manage Employee</a></li>
       
                            </ul>
                        </div>
                    </li>

   <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Leave Management<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="leaves.php">All Leaves </a></li>
                            </ul>
                        </div>
                    </li>


             <li class="no-padding"><a class="waves-effect waves-grey" href="changepassword.php"><i class="material-icons">settings_input_svideo</i>Chnage Password</a></li>

                        <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>  
                 

                 
              
                </ul>
                </div>
            </aside>





    <body>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Add employee</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3>Employee Info</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }?>


 <div class="input-field col  s12">
<label for="empcode">Employee Code(Must be unique)</label>
<input  name="empcode" id="empcode" onBlur="checkAvailabilityEmpid()" type="text" autocomplete="off" required>
<span id="empid-availability" style="font-size:12px;"></span> 
</div>


<div class="input-field col m6 s12">
<label for="firstName">First name</label>
<input id="firstName" name="firstName" type="text" required>
</div>

<div class="input-field col m6 s12">
<label for="lastName">Last name</label>
<input id="lastName" name="lastName" type="text" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="email">Email</label>
<input  name="email" type="email" id="email" onBlur="checkAvailabilityEmailid()" autocomplete="off" required>
<span id="emailid-availability" style="font-size:12px;"></span> 
</div>

<div class="input-field col s12">
<label for="password">Password</label>
<input id="password" name="password" type="password" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="confirm">Confirm password</label>
<input id="confirm" name="confirmpassword" type="password" autocomplete="off" required>
</div>
</div>
</div>
                                                    
<div class="col m6">
<div class="row">
<div class="input-field col m6 s12">
<select  name="gender" autocomplete="off">
<option value="">Gender...</option>                                          
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>

<div class="input-field col m6 s12">
<label for="birthdate">Birthdate</label>
<input id="birthdate" name="dob" type="date" class="datepicker" autocomplete="off" >
</div>

                                                    

<div class="input-field col m6 s12">
<select  name="department" autocomplete="off">
<option value="">Department...</option>
<?php $query = "SELECT DepartmentName from tbldepartments";
  $result = mysqli_query($con,$query);
  $cnt=1;
    if(mysqli_num_rows($result) >0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
  ?>                                            
<option value="<?php echo $row['DepartmentName'];?>"><?php echo $row['DepartmentName'];?></option>
<?php }} ?>
</select>
</div>

<div class="input-field col m6 s12">
<label for="address">Address</label>
<input id="address" name="address" type="text" autocomplete="off" required>
</div>

<div class="input-field col m6 s12">
<label for="city">City/Town</label>
<input id="city" name="city" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="country">Country</label>
<input id="country" name="country" type="text" autocomplete="off" required>
</div>

                                                            
<div class="input-field col s12">
<label for="phone">Mobile number</label>
<input id="phone" name="mobileno" type="tel" maxlength="10" autocomplete="off" required>
 </div>

                                                        
<div class="input-field col s12">
<button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">ADD</button>

</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        
    </body>
</html> 