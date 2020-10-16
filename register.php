<?php      
    require './connection.php'; 
    
    if (isset($_POST['register'])){
        $password="";
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
        $phone=$_POST['phone'];
        $house=$_POST['house'];
        $street=$_POST['street'];
        $post=$_POST['post'];
        $pin=$_POST['pin'];
        $sql1="select * from customer WHERE email='$email'";
        $result1 = mysqli_query($dbConn, $sql1);
        
        if(mysqli_num_rows($result1)>0)
        {
        echo '<script language="javascript">';
        echo 'alert("Account Already Exist")';
        echo '</script>';
        }elseif ($pass==$cpass) {
            $pasword=$pass;
        $sql = "INSERT INTO customer VALUES(null,'$name','$email','$password','$phone','$house','$street','$post','$pin');";
        $sql.="INSERT INTO login VALUES(null,'$email','$pass','customer');";
            if (mysqli_multi_query($dbConn, $sql) === TRUE){
                echo '<script language="javascript">';
                echo 'alert("Inserted Succesfully")';
                echo '</script>';
     
            }
            else {
               echo '<script language="javascript">';
               echo 'alert("Something went wrong")';
               echo '</script>';
            }   
        
        
        }
        else {
          echo '<script language="javascript">';
                echo 'alert("Password Miss match")';
                echo '</script>'; 
            
        }        
    }
            
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registration form</title>
<?php include './homeheader.php'; ?>
<link rel="stylesheet" href="style/form.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
  if(document.form1.cpass.value=="")
 {
  document.getElementById('txt').innerHTML = "**Confirm Password field should not be empty";
  form1.cpass.focus();
  if(document.form1.pass.value=="")
 {
  document.getElementById('txt').innerHTML = "**Password field should not be empty";
  form1.pass.focus();
  
  return(false);
 }
  return(false);
 }
 if(document.form1.phone.value=="")
 {
  document.getElementById('txt').innerHTML = "**Phone Number field should not be empty";
  form1.phone.focus();
  
  return(false);
 }
  if(document.form1.house.value=="")
 {
  document.getElementById('txt').innerHTML = "**House Name field should not be empty";
  form1.house.focus();
  
  return(false);
 }
  if(document.form1.street.value=="")
 {
  document.getElementById('txt').innerHTML = "**Street field should not be empty";
  form1.street.focus();
  
  return(false);
 }
  if(document.form1.post.value=="")
 {
  document.getElementById('txt').innerHTML = "**Post field should not be empty";
  form1.post.focus();
  
  return(false);
 }
  if(document.form1.pin.value=="")
 {
  document.getElementById('txt').innerHTML = "**Pin field should not be empty";
  form1.pin.focus();
  
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
</head>

    <body bgcolor="cyan">
<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
  <h2 align="center"><b>Customer Registration</b></h2>
    <label for="cname">Name</label>
    <input type="text" id="name" name="name" placeholder="Enter the name">
      <label for="email id">Email Id</label>
    <input type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[gmail5-5.-]+\.[com]{3,3}$" placeholder="eg:sample@gmail.com">
    <label for="password">Password</label>
    <input type="password" id="pass" name="pass" placeholder="Enter the Password">
    <label for="cpassword">Confirm Password</label>
    <input type="password" id="cpass" name="cpass" placeholder="Confirm Password">
    <label for="phone number">Phone</label>
    <input type="text" pattern="^\d{4}\d{4}\d{2}$" required id="phone" name="phone" placeholder="Enter Phone Number">
    <label for="house name">House</label>
    <input type="text" id="house" name="house" placeholder="House Name">
    <label for="street name">Street Name</label>
    <input type="text" id="street" name="street" placeholder="Street Name">
    <label for="post name">Post</label>
    <input type="text" id="post" name="post" placeholder="Post Adress">
    <label for="pin code">Pin Code</label>
    <input type="text" id="pin" name="pin" pattern="^\d{2}\d{1}\d{3}$" required placeholder="Pincode">
    <input type="submit" name="register" id="register" value="REGISTER" onclick="myFunction()" />
<font color='red'> <DIV id="txt"> </DIV> </font>  
</form>
</body>
    <?php include './footer.php'; ?>
</html>