<?php
session_start()
?>
<?php
include './customerheader.php';
        require './connection.php';
        // put your code here
        $email=$_SESSION["email"];
        $sql = "select * from customer where email = '".$email."'";
        $result = mysqli_query($dbConn, $sql);
        $row= mysqli_fetch_array($result);
        
     ?>
<!DOCTYPE html>
<html>
<head>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 15px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
.images{
				width:200px;
				height:200px;
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
.linkstyle:link, .linkstyle:visited {
  background-color: #56AED4;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

.linkstyle:hover, .linkstyle:active {
  background-color: #012B50;
}
</style>
</head>
<body>

<?php
$sql2 = "SELECT * FROM `food`;";
        $result2 = mysqli_query($dbConn, $sql2);
    if ($result2->num_rows > 0) {
        while ($row2= mysqli_fetch_array($result2)){
            
    
        
         $folder="./Upload";  
	$url = $folder."/".$row2["image"];

?>

<div class="row">
  <div class="column">
    <div class="card">
      <image src="<?php echo $url; ?>" class="images" />
    </div>
      <p><?php echo $row2["item_name"]; ?></p>
      <p><?php echo 'Rs.'.$row2["price"]; ?></p>
      <p><a class="linkstyle" href="item.php?food_id=<?php echo $row2["food_id"]; ?>"> ADD TO CART</a></p>
  </div>


    <?php
      }
        
        
} else {
  echo "0 results";
}
?>

<?php include './footer.php';  ?>
</body>
</html>