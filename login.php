<?php session_start(); ?>
   
<?php 

    require './connection.php'; 
   if (isset($_POST['uname']) && isset($_POST['pass'])){
        $name=$_POST['uname'];
        $pass=$_POST['pass'];
        
        $sql = "select * from login where user_name = '".$name."' and password = '".$pass."'";
        $result = mysqli_query($dbConn, $sql);
       if (mysqli_num_rows($result)==1){
        $row= mysqli_fetch_array($result);
        $type=$row['type'];
        $email=$row['user_name'];
        
        $_SESSION["email"]=$email;
        $_SESSION["type"]=$type;
        
    
            if ($type=='admin'){
            
            
               header('location:admin_home.php');
               exit();
            }  elseif ($type=='customer') {
               header('location:customer_home.php');
               exit();
            
            }  
            
        }  
        else {
            
            
           echo '<script language="javascript">';
           echo 'alert("Incorrect Credential")';
           echo '</script>';
  
            
        }   
            
    }  
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script>
   function validateForm()

{
if((document.form1.uname.value=="") || (document.form1.pass.value==""))
 {
  document.getElementById('une').innerHTML = "**User Name and password should not be empty";
  form1.uname.focus();
  form1.pass.focus();
  return(false);
 }


 else
   {
   return(true);
   }
  
}
function myFunction() {
  var x = document.getElementById("email").pattern;
  
}
    </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login form</title>
<?php include './homeheader.php'; ?> 
<link rel="stylesheet" href="style/login.css"/>
</head>

    <body>
<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
    <div align="center">
    <h2 align="center"><b>LOGIN</b></h2>
    <input type="text" id="uname" name="uname" placeholder="eg:sample@gmail.com" pattern="[a-z0-9._%+-]+@[gmail5-5.-]+\.[com]{3,3}$">
    <input type="password" id="pass" name="pass" placeholder="Password">
    <font color='red'> <i><DIV id="une"> </DIV></i></font>  
      <input type="submit" name="login" id="login" value="LOGIN" onclick="myFunction()" />
      </div>

      
      

</form>
</body>
    <?php include './footer.php'; ?>
</html>

    

