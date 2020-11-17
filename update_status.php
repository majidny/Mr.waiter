<?php
require('./connection.php');
include("./adminheader.php");
$oid=$_REQUEST['order_id'];
$query = "SELECT * from order_dtl where order_id='".$oid."'"; 
$result = mysqli_query($dbConn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update food Record</title>
<link rel="stylesheet" href="style/form.css"/>
</head>
<body>
<div class="form">
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$oid=$_REQUEST['order_id'];
$status = $_REQUEST['status'];


$update="update order_dtl set status='".$status."' where order_id='".$oid."'";
mysqli_query($dbConn, $update);
//$sql="DELETE FROM order_table WHERE status='Declined'";
//mysqli_query($dbConn, $sql);

$status = "Record Updated Successfully. </br></br>
<a href='view_order.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';

}else {
?>

<div>
    
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['order_id'];?>" />
        <p><select id="status" name="status" placeholder="Update Current Status">
    <option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
      <option value="Confirmed" >Confirmed</option>
      <option value="Delayed" >Delayed</option>
      <option value="Delivered" >Delivered</option>
      <option value="Declined" >Declined</option>
            </select></p>
    


<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
<?php include("./footer.php"); ?>
</html>