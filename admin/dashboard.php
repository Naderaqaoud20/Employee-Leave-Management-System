<?php 
include('db.php');
$user_id='';
session_start();
if(isset($_SESSION['user_id'])){
     $user_id= $_SESSION['user_id'];
}else{
    header("Location: admin-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
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
                <div class="middle-content">
                    <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Totle Regd Employee</span>
                                <span class="stats-counter">
<?php 
$query = "SELECT id FROM tblemployees";
$result = mysqli_query($con,$query);
$employeeNumber = mysqli_num_rows($result); 
?>
                                    <span class="counter"><?php echo $employeeNumber;?></span></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                        <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Listed Departments </span>
<?php 
$query = "SELECT id FROM tbldepartments";
$result = mysqli_query($con,$query);
$departmentNumber = mysqli_num_rows($result); 
?>                          
                                <span class="stats-counter"><span class="counter"><?php echo $departmentNumber;?></span></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title"> TOTAL LEAVES APPLICATIONS </span>
<?php 
$query = "SELECT id FROM tblleaves";
$result = mysqli_query($con,$query);
$leavesNumber = mysqli_num_rows($result); 
?>                                   
   
                                <span class="stats-counter"><span class="counter"><?php echo $leavesNumber;?></span></span>
                      
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                 
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l12">
                            <div class="card invoices-card">
                                <div class="card-content">
                                 
                                    <span class="card-title">Latest Leave Applications</span>
                             <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="200">Employe Name</th>
                                            <th width="120">Leave Type</th>

                                             <th width="180">Posting Date</th>                 
                                            <th>Status</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
      <?php $query = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status,tblleaves.empid from tblleaves join tblemployees on tblleaves.empid=tblemployees.empid order by lid desc limit 6";
    $result = mysqli_query($con,$query);
    $cnt=1;
    if(mysqli_num_rows($result) >0)
    {
        while($row = mysqli_fetch_assoc($result))
        {        
      ?>  

                                        <tr>
                                            <td> <b><?php echo $cnt;?></b></td>
                                              <td><a href="editemployee.php?empid=<?php echo $row['id'];?>" target="_blank"><?php echo $row['FirstName']." ".$row['LastName'];?>(<?php echo $row['EmpId'];?>)</a></td>
                                            <td><?php echo $row['LeaveType'];?></td>
                                            <td><?php echo $row['PostingDate'];?></td>
                                                                       <td><?php $stats=$row['Status'];
if($stats==1){
                                             ?>
                                                 <span style="color: green">Approved</span>
                                                 <?php } if($stats==2)  { ?>
                                                <span style="color: red">Not Approved</span>
                                                 <?php } if($stats==0)  { ?>
 <span style="color: blue">waiting for approval</span>
 <?php } ?>


                                             </td>

          <td>
           <td><a href="leave-details.php?leaveid=<?php echo $row['lid'];?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a></td>
                                    </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </main>
          
        </div>

        
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/dashboard.js"></script>
        
    </body>
</html>