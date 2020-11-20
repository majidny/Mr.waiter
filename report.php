<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/table.css"></link>
        <style>
            
  #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
            
        </style>
        <title>VIEW REPORT</title>
        <?php include './adminheader.php'; ?>
    </head>
    <body>
        <table id="customers" width="200" border="0">
           <!-- <input type="date" name="start_date" placeholder="Search for date.."> 
            <input type="date" name="end_date" placeholder="Search for date.."> 
            <input type="submit" name="search" value="Search">-->
        <tr>
        <th>DATE</th>
        <th>TOTAL ORDERS</th>
        <!--<th>TOTAL SALES</th>-->
        <th>TOTAL INCOME</th>
        <!--th>&nbsp;</th>-->
        </tr>
        <?php
        require './connection.php';
        $sql="SELECT DATE(date) AS Date,COUNT(order_id) AS Total_Orders,SUM(total) AS Total_Income FROM order_dtl WHERE status='Delivered' GROUP BY date";
        $result= mysqli_query($dbConn, $sql);
        if ($result->num_rows > 0) {
        while ($row=  mysqli_fetch_array($result)){
            ?>
        <tr>
        <td><?php echo $row['Date'];?></td>
        
        <td><?php echo $row['Total_Orders'];?></td>
        <?php
        
        //$sql1="SELECT DATE(date) AS Date,COUNT(order_id) AS Total_Orders,SUM(total) AS Total_Income FROM order_dtl WHERE status='Delivered' GROUP BY date";
        //$result1= mysqli_query($dbConn, $sql1);
        //while ($row1=  mysqli_fetch_array($result1)){
            ?>
        <!--<td><?php //echo $row1['Total_Sales'];?></td>-->
        
        <td><?php echo $row['Total_Income'];?></td>
      
        </tr>
        
           <?php
        } }
else {
  echo "0 results";
}
    ?> 

</table>
       
    </body>
    <?php include './footer.php'; ?>
</html>
    
   <?php
   if (isset($_POST['search'])){
        $s_date=$_POST['start_date'];
        $e_date=$_POST['end_date'];
        $sql1="SELECT DATE(date) AS Date, SUM(quantity) AS Total_Sales, SUM(total) AS Total_Income FROM orders_tbl,order_dtl WHERE order_dtl.order_id=orders_tbl.order_no AND order_dtl.date BETWEEN '2020-11-10' AND '2020-11-13' GROUP BY date";
        $result1=  mysqli_query($dbConn, $sql1);
   }     
?>
    
     
 