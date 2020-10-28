<?php
require './connection.php';
session_start();
$cid=$_GET["cid"];
$cart=$_SESSION["shopping_cart"];
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $keys => $values) {
            
       
		if($values['code'] === $_POST["code"]){
		unset($_SESSION["shopping_cart"][$keys]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$values){
    if($values['code'] === $_POST["code"]){
        $values['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
<title>Cart</title>
<style>
    .images{
				width:200px;
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

.linkstyle:hover, .linkstyle:active {
  background-color: #012B50;
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
  
  background-color: #012B50;
}
</style>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<link rel='stylesheet' href='style/table.css' type='text/css' media='all' />
<link rel='stylesheet' href='style/style.css' type='text/css' media='all' />
</head>
<?php include './customerheader.php'; ?>
<body>

<div style="width:700px; margin:50 auto;">

<h2>Shopping Cart</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));

?>
<!--<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Cart
<span><?php //echo $cart_count; ?></span></a>
</div>-->
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' class="images" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />

<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action='' >
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>

</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>

</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">

</div>

<a href="customer_home.php" class="linkstyle">Continue Shopping</a>
<br /><br />

<input type="submit" name="order" id="order" value="PLACE ORDER" class="cardbutton">
</div>
</body>
<?php include './footer.php'; 

if (isset($_POST['order'])){
    $fcode= $product["code"];
    $date=date("Y-m-d");
    		
foreach ($_SESSION["shopping_cart"] as $product){
    $sql = "INSERT INTO order_table VALUES(null,'".$product["code"]."','".$product["price"]*$product["quantity"]."','".$product["quantity"]."','time','$date','$cid','Order')";
     if(mysqli_query($dbConn,$sql)){
         unset($cart);
        echo '<script language="javascript">';
        echo 'alert("Order Placed")';
        echo '</script>';
     }else {
        echo '<script language="javascript">';
        echo 'alert("Order Cannot be placed")';
        echo '</script>';
     }
         
}
}
?>
</form>
</html>