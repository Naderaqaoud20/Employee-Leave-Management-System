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


if(isset($_POST['apply'])){
    $user_id=$_SESSION['user_id'];
    $leavetype=$_POST['leavetype'];
    $fromdate=$_POST['fromdate']; 
    $description=$_POST['description'];
    $todate=$_POST['todate'];
    $status=0;
    $isread=0;
    $user_EMPID="";
    $select2='';
    $select_query = "SELECT * FROM tblemployees WHERE id = $user_id";
    $select_result = mysqli_query($con,$select_query);
    $select_row = mysqli_fetch_assoc($select_result);
$select_query1 = "SELECT * FROM tblleaves";
$select_result1 = mysqli_query($con,$select_query1);
    $select_row1 = mysqli_fetch_assoc($select_result1);
    $select1= $select_row['EmpId'];
    echo "$select1";
    $select2=$select_row1['empid'];
    echo "$select2";
    $select2=$select1;
    echo "$select2";

    
        if($fromdate > $todate){
            $error=" ToDate should be greater than FromDate ";
            echo "$error";
        }

            $query="INSERT INTO tblleaves(LeaveType,ToDate,FromDate,Description,Status,IsRead,empid) VALUES('$leavetype','$todate','$fromdate','$description','$status','$isread','$select2')";
                    if(mysqli_query($con,$query)){
                        $msg = "insert  successfully";
                    
                }else{
            $msg = "error in insert ".mysqli_error($con);
        }
          
     }
echo "$msg";
           
           
       

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>apply-leave Employee</title>
        
        <meta charset="UTF-8">
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
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>  
                 
                   
                </ul>
                <div class="footer">
                
                </div>
                </div>
            </aside>  <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Apply for Leave</div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
    


 


<div class="input-field col m6 s12">
<label for="fromdate">From  Date</label>
<input placeholder="" id="mask1" name="fromdate" class="masked" type="text" data-inputmask="'alias': 'date'" required>
</div>
<div class="input-field col m6 s12">
<label for="todate">To Date</label>
<input placeholder="" id="mask1" name="todate" class="masked" type="text" data-inputmask="'alias': 'date'" required>
</div>

<div class="input-field col  s12">
<select  name="leavetype" autocomplete="off">
<option value="">Select leave type...</option>

    <option>Casual leave type </option>
    <option>medical leave </option>
    <option>Restricted Holiday </option>

   ?>                                   
</select>
</div>


<div class="input-field col m12 s12">
<label for="birthdate">Description</label>    

<textarea id="textarea1" name="description" class="materialize-textarea" length="500" required></textarea>
</div>
</div>
      <button type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">Apply</button>                                             

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
        <script src="assets/js/pages/form-input-mask.js"></script>
        <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    </body>
</html>
 