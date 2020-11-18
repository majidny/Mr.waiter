<?php
session_start();
$cid = $_SESSION['cid'];
require('./connection.php');
include("./customerheader.php");
$id=$_REQUEST['order_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Review Order</title>
<link rel="stylesheet" href="style/form.css"/>
</head>
<body align="cener">
<div class="form">
<h1>Review Your Order</h1>

<form action="" method="POST">

<textarea id="review" name="review" rows="4" cols="50">
</textarea>
  <br><br>
  <input type="submit" value="Submit" name="submit">
</form>
</div>
</div>
</body>
<?php include("./footer.php"); ?>
</html>
<?php
if(isset($_POST['submit']))
{
$id=$_REQUEST['order_id'];
$review=$_POST['review'];
$sql="select * from review_table WHERE order_id='$id' AND cust_id='$cid'";
        $result = mysqli_query($dbConn, $sql);
        if(mysqli_num_rows($result)>0)
        {
            echo '<script language="javascript">';
            echo 'alert("Already Reviewed");window.location.href="customer_orders.php"';
            echo '</script>';
        }else{

$update="INSERT INTO review_table VALUES(null,'$cid','$id','$review')";
if (mysqli_query($dbConn, $update)){
    
echo '<script language="javascript">';
echo 'alert("Review Added Successfully");window.location.href="customer_orders.php"';
echo '</script>';
}else {
echo '<script language="javascript">';
echo 'alert("Error !!");window.location.href="customer_orders.php"';
echo '</script>'; 
}
}
}
?>
