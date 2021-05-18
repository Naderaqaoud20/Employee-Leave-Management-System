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

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Leave History</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
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
                            <span class="chapter-title"> Employee</span>
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
 
                </div>  
                </aside> <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Leave History</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Leave History</span>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th width="120">Sl NO</th>
                                            <th width="120"> Type Of Leave</th>
                                            <th>From</th>
                                            <th>To</th>
                                             <th >Description</th>
                                             <th width="120">Posting Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

$LeaveType='';
             $cnt=1;                       
$select_query1 = "SELECT * FROM tblleaves";
$select_result1 = mysqli_query($con,$select_query1);
    $select_row1 = mysqli_fetch_assoc($select_result1);
    $select2=$select_row1['empid'];
    $LeaveType=$select_row1['LeaveType'];
    $ToDate=$select_row1['ToDate'];
    $FromDate=$select_row1['FromDate'];
    $description=$select_row1['Description'];
    $PostingDate=$select_row1['PostingDate'];
    $Status=$select_row1['Status'];

$sql = "SELECT * from tblleaves";
?>
<tr>
<td> <?php echo "$cnt";?></td>
<td><?php echo "$LeaveType";?></td>
<td><?php echo "$FromDate";?></td>
<td><?php echo "$ToDate";?></td>
<td><?php echo "$description";?></td>
<td><?php echo "$PostingDate";?></td>
<td>
 <?php if($Status==1){?>
 <span style="color: green">Approved</span>
 <?php } 
 if($Status==2)  { ?>
<span style="color: red">Not Approved</span>
 <?php } 
 if($Status==0)  { ?>
<span style="color: blue">waiting for approval</span>

</td>

</tr>
<?php $cnt++;}?>
</tbody>
</table>
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
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>
        
    </body>
</html>
