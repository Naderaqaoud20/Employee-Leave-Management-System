<?php
include('dp.php');
$user_id='';
$msg ="";
session_start();
if(isset($_COOKIE['token'])){
    $token = $_COOKIE['token'];
    $query = "SELECT * FROM auth WHERE token ='$token'";
    if($result = mysqli_query($con,$query)){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $_SESSION['user_id'] = $user_id;
        }
    }
}
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
}else{
    $user_id = $_SESSION['user_id'];
}


if(isset($_POST['update'])){
    $fullname=$_POST['firstName'];
    $lasname=$_POST['lastName'];
    $email = $_POST['email'];
    $mobile=$_POST['mobileno'];
    $gender = $_POST['gender'];

    $query = "UPDATE tblemployees SET 
    FirstName = '$fullname',
    LastName = '$lasname',
    EmailId = '$email',
    Phonenumber = '$mobile',
    Gender='$gender' 
    WHERE id=$user_id";
    if(mysqli_query($con,$query)){
        $msg = "updated profile successfully";
    }else{
        $msg = "error in updating profile".mysqli_error($con);
    }
}
$user_fullname = $user_email =$user_country=$user_gender=$user_mobile='';
$select_query = "SELECT * FROM tblemployees WHERE id = $user_id";
$select_result = mysqli_query($con,$select_query);
    while($select_row = mysqli_fetch_assoc($select_result)){
        $user_fullname = $select_row['FirstName'];
        $user_lastname = $select_row['LastName'];
        $user_email = $select_row['EmailId'];  
        $user_mobile = $select_row['Phonenumber'];
        $user_gender = $select_row['Gender'];
    }
    echo "$msg";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Update Employee</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
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





    </head>
    <body>
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
                            <span class="chapter-title">ELMS | Employee</span>
                        </div>
                     
                
                    </div>
                </nav>
            </header>            
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                        <p><?php echo "$user_fullname"?> <?php echo "$user_lastname"?></p>
                               
                                <span>EMP10806121</span>
                                                 </div>
                    </div>
              
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                  
  <li class="no-padding"><a class="waves-effect waves-grey" href="myprofile.php"><i class="material-icons">account_box</i>My Profiles</a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" href="emp-changepassword.php"><i class="material-icons">settings_input_svideo</i>Chnage Password</a></li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Leaves<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="apply-leave.php">Apply Leave</a></li>
                                <li><a href="leavehistory.php">Leave History</a></li>
                            </ul>
                        </div>
                    </li>
                
         
               
                  <li class="no-padding">
                                <a class="waves-effect waves-grey" name="logout" value="logout" href="logout.php"><i class="material-icons">exit_to_app</i>log Out</a>
                            </li>  
                 
                   
                </ul>
                <div class="footer">
                   
                
                </div>
                </div>
            </aside>   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Update employee</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="updatemp">
                                    <div>
                                        <h3>Update Employee Info</h3>
                                                                                   <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
 
 <div class="input-field col  s12">
<label for="empcode">Employee Code</label>
<input  name="empcode" id="empcode" value="EMP10806121" type="text" autocomplete="off" readonly required>
<span id="empid-availability" style="font-size:12px;"></span> 
</div>


<div class="input-field col m6 s12">
<label for="firstName">First name</label>
<input id="firstName" name="firstName"   type="text"   value="<?php echo $user_fullname; ?> "required>
</div>

<div class="input-field col m6 s12">
<label for="lastName">Last name </label>
<input id="lastName" name="lastName"  type="text" value="<?php echo $user_lastname; ?>" autocomplete="off"  required>
</div>

<div class="input-field col s12">
<label for="email">Email</label>
<input  name="email" type="email" id="email" value="anuj@gmail.com"  readonly autocomplete="off" required>
<span id="emailid-availability" style="font-size:12px;"></span> 
</div>

<div class="input-field col s12">
<label for="phone">Mobile number</label>
<input id="phone" name="mobileno" type="tel" value="9857555555"  value="" maxlength="10" autocomplete="off" required>
 </div>

</div>
</div>
                                                    
<div class="col m6">
<div class="row">
<div class="input-field col m6 s12">
<select  name="gender" autocomplete="off">
<option value="Male">Male</option>                                          
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>
<label for="birthdate">Date of Birth</label>
<div class="input-field col m6 s12">

<input id="birthdate" name="dob"  class="datepicker" value="3 February, 1990" >
</div>

                                                    

<div class="input-field col m6 s12">
<select  name="department" autocomplete="off">
<option value="Human Resource">Human Resource</option>
                                            
<option value="Human Resource">Human Resource</option>
                                            
<option value="Information Technology">Information Technology</option>
                                            
<option value="Operations">Operations</option>
</select>
</div>

<div class="input-field col m6 s12">
<label for="address">Address</label>
<input id="address" name="address" type="text"   value="New Delhi" autocomplete="off" required>
</div>

<div class="input-field col m6 s12">
<label for="city">City/Town</label>
<input id="city" name="city" type="text"  value="Delhi" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="country">Country</label>
<input id="country" name="country" type="text"  value="India" autocomplete="off" required>
</div>

                                                            

                                                        
<div class="input-field col s12">
<button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>

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
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        
    </body>
</html>
 