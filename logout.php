
<?php
session_start();
$type = $_SESSION['type'];
if ($type=='admin'){
$tmp1 = $_SESSION['username'];
session_destroy();
}  else {
  $tmp = $_SESSION['cid'];
  session_destroy();
}


echo '<script language="javascript">';
echo " alert('Logout Successfully');window.location.href='login.php'";
echo '</script>';

?>