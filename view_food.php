      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Satff</title>
<?php include './adminheader.php'; ?>
<link rel="stylesheet" href="style/table.css"></link>
<style>
			.images{
				width:100px;
				height:100px;
				cursor:pointer;
				margin:10px;
			}
			.images:hover{
				-webkit-transform: scale(1.2);
				-moz-transform: scale(1.2);
				-o-transform: scale(1.2);
				transform: scale(1.2);
				transition: all 0.3s;
				-webkit-transition: all 0.3s;
			}
		</style>
</head>

<body>

<h2 align="center"><b>FOOD ITEMS</b></h2>
    <table id="customers" width="200" border="0">
    <tr>
        <th>Item Name</th>
      <th>Category</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Count</th>
      <th>Image</th>
      <th>&nbsp;</th>
    </tr>
    <?php
        require './connection.php'; 
   
        $sql = "SELECT * FROM `food`;";
        $result = mysqli_query($dbConn, $sql);
    if ($result->num_rows > 0) {
        while ($row= mysqli_fetch_array($result)){
            
    ?>
      <tr>
        <td><?php echo $row['item_name'];?></td>
        <td><?php echo $row['category'];?></td>
        <td><?php echo $row['quantity'];?></td>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['count'];?></td>
        <?php   
        
         $folder="./Upload";  
	$url = $folder."/".$row["image"];
	?><td><image src="<?php echo $url; ?>" class="images" /></td>
        <td><p><a href="edit_food.php?food_id=<?php echo $row["food_id"]; ?>">Edit</a></p><a href="delete_food.php?food_id=<?php echo $row["food_id"]; ?>">Delete</a></p></td>
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