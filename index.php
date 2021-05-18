
<?php
session_start();
include('dp.php');
$msg ="";
if(isset($_COOKIE['token'])){
  $token = $_COOKIE['token'];
  $query = "SELECT * FROM auth WHERE token ='$token'";
  if($result = mysqli_query($con,$query)){
      while($row = mysqli_fetch_assoc($result)){
          $user_id = $row['user_id'];
          $_SESSION['user_id'] = $user_id;
      }
  }
  if(isset($_SESSION['user_id'])){
    header("Location:/aa/myprofile.php");
}
}
if(isset($_POST['signin'])){
$email=$_POST['email'];
$password=$_POST['password'];
$query ="SELECT EmailId,Password,Status,id FROM tblemployees WHERE EmailId = '$email'" ;
$result =mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    while( $row = mysqli_fetch_assoc($result)){
        $user_id = $row['id'];
        $user_password = $row['Password'];
        if($password == $user_password){
          $_SESSION['user_id'] = $user_id;
          if(isset($_POST['container'])){
            $token = openssl_random_pseudo_bytes(8);
            $token = bin2hex($token);
            setcookie("token",$token,time()+(30*24*60*60),"/");
            $query = "INSERT INTO auth(user_id,token) VALUES($user_id,'$token')";
            
            if(mysqli_query($con,$query)){
              header("Location:/aa/myprofile.php");                         
        }else{
            $msg = "failed".mysqli_error($con);
        }
    }
    header("Location:myprofile.php");                         
}else{
    $msg = "incorrect email or password";
}
}
}else{
$msg ="incorrect email or password";
}


}

?><!DOCTYPE html>
<html lang="en">
    <head>
        <title> Home Page</title>
        <meta charset="UTF-8">
       
        <style>
        h2 {text-align: center;
        margin-top:10%;
        color:red;
        }
        h3{
            color:red; 
            text-align:left;
            margin-top:10px;
            margin-right:1px;
        }
        body{
            background-color:#e5e4e2;
        }
        .loginBox{
	margin-left:500px;
	width: 300px;
	height: 300px;
	padding: 20px 20px;
	background: white;
    display: flex;
    flex-direction: column;
    border-radius: 5px;
} 
input{
    margin-top:20px;
    height: 30px;
    border:0;
    border-bottom: 1px solid gray;
    outline: none;
    margin-left:15px;
    width:250px;
}
#submit{
    height: 40px;
    background-color: green;
    color:white;
    font-size: 18px;
    width:100px;
    margin-left:100px;
    margin-top:30;
}
.container {
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;

}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}


/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
 
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid green;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

    </style>
        
    </head>
    <body>
           
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"><h2>Welcome to Employee Leave Management System</h2></div>
                        <div class="loginBox">
                      
                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;"><h3>Employee Login</h3></span>
                                       
                                       <div class="row">
                                           <form class="loginemployee-section" name="signin" method="post">
                                               <div class="input-field col s12">
                                               <input type="text" name="email" id="email" placeholder="Enter Employee email" required/>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="password" class="validate"placeholder="Enter password" name="password" autocomplete="off" required>
                                               </div>
                                               <br>
                                               <br>
                                               <div class="col s12 right-align m-t-sm">
                                                 
                                               <label class="container">rememmber login?
  <input type="checkbox" >
  <span class="checkmark"></span>
</label>
<input type="submit" name="signin" value="signin" class="waves-effect waves-light btn teal" />

                                               </div>
                                           </form>
                                      </div>
                                  </div>
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
        
    </body>
</html>  