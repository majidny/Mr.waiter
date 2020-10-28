<?php
session_start();
$cid = $_SESSION['cid'];
include('./connection.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($dbConn,"SELECT * FROM `food` WHERE food_id='$code'");
$row = mysqli_fetch_assoc($result);
$fid = $row['food_id'];
$name = $row['item_name'];
$category = $row['category'];
$price = $row['price'];





$folder="./Upload";  
$url = $folder."/".$row["image"];
$image = $url;

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$fid,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$url)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>

<html>
<head>
<title>Shopping Cart</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<link rel='stylesheet' href='style/style.css' type='text/css' media='all' />
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
  width: 50%;
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
  padding: 40px;
  text-align: center;
  background-color: #f1f1f1;
  
}
.cardbutton {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #56AED4;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 15px;
}

.cardbutton:hover {
  opacity: 0.7;
  background-color: #012B50;
}
.price {
  color: grey;
  font-size: 22px;
}
.images{
				width:300px;
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
<?php include './customerheader.php'; ?>
<body>
    
    <form name="form1" method="post" action="">
<div style="width:700px; margin:50 auto;">

  

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
   
    <a href="cart.php?cid=<?php echo $cid;  ?>"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>

</div>
<?php
}

$result = mysqli_query($dbConn,"SELECT * FROM `food`");
while($row = mysqli_fetch_assoc($result)){
    $folder="./Upload";  
    $url = $folder."/".$row["image"];
   
                          echo "<div class='column'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['food_id']." />
                          <div class='card'><img src='".$url."' class='images'/></div>
			  <p><b>".$row['item_name']."</b></p>
		   	  <p class='price'>Rs.".$row['price']."</p>
			  <p><button class='cardbutton'>Buy Now</button></p>
			  </form>
		   	  </div>";

        }
mysqli_close($dbConn);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<br /><br />
</div>
    </form>
</body>
<?php include './footer.php'; ?>
</html>