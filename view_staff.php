      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Satff</title>
<?php include './adminheader.php'; ?>
<link rel="stylesheet" href="style/table.css"></link>
</head>

<body>

<h2 align="center"><b>STAFF LIST</b></h2>
    <table id="customers" width="200" border="0">
    <tr>
        <th>Name</th>
      <th>Email</th>
      <th>Phone No</th>
      <th>&nbsp;</th>
    </tr>
    <?php
        require './connection.php'; 
   
        $sql = "SELECT * FROM `staff`;";
        $result = mysqli_query($dbConn, $sql);
    if ($result->num_rows > 0) {
        while ($row= mysqli_fetch_array($result)){
        
    ?>
      <tr>
        <td><?php echo $row['sname'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><p><a href="edit_staff.php?staff_id=<?php echo $row["staff_id"]; ?>">Edit</a></p><a href="delete_staff.php?staff_id=<?php echo $row["staff_id"]; ?>">Delete</a></p></td>
      </tr>
    <?php
      }
} else {
  echo "0 results";
}
    ?> 
</table>
</body>
    <?php include './footer.php'; ?>
</html>