<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Orders</title>
<?php include './adminheader.php'; ?>
<link rel="stylesheet" href="style/table.css"></link>
</head>

<body>

<h2 align="center"><b>DELIVERED</b></h2>
    <table id="customers" width="200" border="0">
    <tr>
      <th>Order Number</th>
      <th>Date</th>
      <th>Scheduled Time</th>
      <th>Total Amount</th>
      <th>Status</th>
      <th>Review</th>
      <th>Item Name X Quantity</th>
      <th>Address</th>
            
     
    </tr>
    <?php
        require './connection.php';
        

        $sql = "SELECT * FROM `order_dtl` WHERE `status`='Delivered' order by order_id DESC;";
        $result = mysqli_query($dbConn, $sql);
    if ($result->num_rows > 0) {

        while ($row= mysqli_fetch_array($result)){
            $oid=$row['order_id'];
            $cid=$row['cust_id'];
            //$fid=$row['food_id'];
            $date=$row['date'];
            $tot=$row['total'];
            $status=$row['status'];
            $time=$row['time'];
            
            
        $sql5 = "SELECT * FROM `review_table` where cust_id= $cid AND order_id=$oid;";
        $result5 = mysqli_query($dbConn, $sql5);
        while ($row5= mysqli_fetch_array($result5)){
     
        
    ?>
        <tr>
        <td><?php echo $oid;?></td>
        <td><?php echo $date;?></td>
        <td><?php echo $time;?></td>
        <td><?php echo 'Rs.'.$tot;?></td>
        <td><?php echo '<span style="color:#FF0000;text-align:center;">'.$status.'</span>';?></td>
        <td><?php echo '<span style="color:#2b772e;text-align:center;">'.$row5['review'].'</span>';?></td>
        <td>
        <?php    
        $sql1 = "SELECT * FROM `orders_tbl` WHERE order_no=$oid;";
        $result1 = mysqli_query($dbConn, $sql1);
        while ($row1= mysqli_fetch_array($result1)){
        $fid=$row1['food_id'];
        $qty=$row1['quantity'];
        
       
    
        $sql2 = "SELECT * FROM `food` where food_id= $fid;";
        $result2 = mysqli_query($dbConn, $sql2);
        while ($row2= mysqli_fetch_array($result2)){
            $iname=$row2['item_name'];
            echo $iname.'  X '.$qty; echo '</br>';
        }}
        ?> 
            
     </td> 
    <?php
        
        
    $sql4 = "SELECT * FROM `customer` where customer_id= $cid;";
    $result4 = mysqli_query($dbConn, $sql4);
    while ($row4= mysqli_fetch_array($result4)){
    //$house=$row4['house_name'];
    //$street=$row4['street'];
    //$post=$row4['post'];
    //$pin=$row4['pin'];
   
   ?><td><?php echo $row4['cname']; echo '</br>'; echo $row4['house']; echo '</br>'; echo $row4['street']; echo '</br>'; echo $row4['post']; echo '</br>'; echo $row4['phone']; echo '</br>'; echo $row4['pin'];?></td> 
        <?php
    } } }
} else {
  echo "0 Orders";
}
    ?> 
         
</tr> 
</table>
<!--<input type="submit" name="submit" id="submit" value="UPDATE">-->
        
</body>
    <?php include './footer.php'; ?>
</html>