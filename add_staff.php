<?php      
    require './connection.php'; 
    
    if (isset($_POST['register'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        
        $sql1="select * from staff WHERE email='$email'";
        $result1 = mysqli_query($dbConn, $sql1);
        if(mysqli_num_rows($result1)>0)
        {
            echo '<script language="javascript">';
            echo 'alert("Account Already Exist")';
            echo '</script>';
        }else{
        $sql = "INSERT INTO staff VALUES(null,'$name','$email','$phone');";
            if (mysqli_query($dbConn, $sql)){
            
                echo '<script language="javascript">';
                echo 'alert("Inserted Successfully")';
                echo '</script>';
            }
            else {
                echo '<script language="javascript">';
                echo 'alert("Something went wrong")';
                echo '</script>';
            }
        
        
        }   
    }    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>registration form</title>


<script>
   function validateForm()

{
if(document.form1.name.value=="")
 {
  document.getElementById('txt').innerHTML = "**Name field should not be empty";
  form1.name.focus();
  
  return(false);
 }
 if(document.form1.email.value=="")
 {
  document.getElementById('txt').innerHTML = "**Email field should not be empty";
  form1.email.focus();
  
  return(false);
 }

  if(document.form1.phone.value=="")
 {
  document.getElementById('txt').innerHTML = "**Phone Number field must be filled with 10 numbers";
  form1.phone.focus();
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
<?php include './adminheader.php'; ?>
<link rel="stylesheet" href="style/form.css"/>
</head>
<body>
    <div class="form">
<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
  <h2 align="center"><b>ADD STAFF</b></h2>
    <label for="sname">Name</label>
    <input type="text" id="name" name="name" placeholder="Enter the name">
    <label for="email id">Email</label>
    <input type="text" id="email" name="email" placeholder="eg:sample@gmail.com" pattern="[a-z0-9._%+-]+@[gmail5-5.-]+\.[com]{3,3}$"/>
    <label for="phone number">Phone Number</label>
    <input type="text" pattern="^\d{4}\d{4}\d{2}$" required  id="phone" name="phone" placeholder="Phone number">
    
    <input type="submit" name="register" id="register" value="REGISTER" onclick="myFunction()" />
          
    <font color='red'> <DIV id="txt"> </DIV> </font>
</form>
    </div>
</body>
    <?php include './footer.php'; ?>
</html>

