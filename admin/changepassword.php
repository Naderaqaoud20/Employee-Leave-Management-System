<?php
error_reporting(0);
include('db.php');
$msg ="";
$error = "";
$user_id='';
session_start();
if(isset($_SESSION['user_id'])){
     $user_id= $_SESSION['user_id'];
     echo $user_id;
$username=$result['user_id'];
}else{
    header("Location: admin-login.php");
}
$sql = "select UserName from admin where id = '$user_id'";
$result1 = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($result1);
// Code for change password 
if(isset($_POST['change'])){
    $password=$_POST['currentpassword'];
    $newpassword=$_POST['newpassword'];
    $re_pass=$_POST['confirmpassword'];
    $user_password = '';
    $select_query = "SELECT * FROM admin WHERE id = $user_id";
    $select_result = mysqli_query($con,$select_query);
        $select_row = mysqli_fetch_assoc($select_result);
        if($user_Password = $select_row['Password']){
            if($newpassword==$re_pass){
                $query = "UPDATE admin SET 
                    Password = '$newpassword'
                    WHERE id=$user_id";
                    if(mysqli_query($con,$query)){
                        $msg = "change password successfully";
                    }}
        }else{
            $msg = "error in change password".mysqli_error($con);
        }
          
     }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Change Password</title>
        
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
                        <div class="page-title">Change Pasword</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12" name="chngpwd" method="post">
                                          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                        <div class="row">
                                            <div class="input-field col s12">
<input id="password" type="password"  class="validate" autocomplete="off" name="password"  required>
                                                <label for="password">Current Password</label>
                                            </div>

  <div class="input-field col s12">
 <input id="password" type="password" name="newpassword" class="validate" autocomplete="off" required>
                                                <label for="password">New Password</label>
                                            </div>

<div class="input-field col s12">
<input id="password" type="password" name="confirmpassword" class="validate" autocomplete="off" required>
 <label for="password">Confirm Password</label>
</div>


<div class="input-field col s12">
<button type="submit" name="change" class="waves-effect waves-light btn indigo m-b-xs" onclick="return valid();">Change</button>

</div>




                                        </div>
                                       
                                    </form>
                                </div>
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
