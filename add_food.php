<?php      
    require './connection.php';    
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registration form</title>
<?php include './adminheader.php'; ?>
<link rel="stylesheet" href="style/form.css"/>
<script src="js/jQuery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		
		<script src="js/jQuery.Form.js"></script>
<script>
   function validateForm()

{
if(document.form1.name.value=="")
 {
  document.getElementById('txt').innerHTML = "**Item Name field should not be empty";
  form1.name.focus();
  
  return(false);
 }
 if(document.form1.cat.value=="")
 {
  document.getElementById('txt').innerHTML = "**Category field should not be empty";
  form1.cat.focus();
  
  return(false);
 }
  if(document.form1.qty.value=="")
 {
  document.getElementById('txt').innerHTML = "**Quntity field should not be empty";
  form1.qty.focus();
  
  return(false);
 }
    if(document.form1.count.value=="")
 {
  document.getElementById('txt').innerHTML = "**Count field should not be empty";
  form1.count.focus();
  
  return(false);
 }
   if(document.form1.price.value=="")
 {
  document.getElementById('txt').innerHTML = "**Price field should not be empty";
  form1.price.focus();
  
  return(false);
 }
    if(document.form1.files[].value=="")
 {
  document.getElementById('txt').innerHTML = "**Image field should not be empty";
  form1.files[].focus();
  
  return(false);
 }

else
 {
   return(true);
 }
}


$(document).ready(function(){			
				
				var divProgressBar=$("#divProgressBar");
				var status=$("#status");
				
				$("#uploadForm").ajaxForm({
					
					dataType:"json",
					
					beforeSend:function(){
						divProgressBar.css({});
						divProgressBar.width(0);
					},
					
					uploadProgress:function(event, position, total, percentComplete){
						var pVel=percentComplete+"%";
						divProgressBar.width(pVel);
					},
					
					complete:function(data){
						status.html(data.responseText);
					}
				});
			});

</script>
</head>

<body>
<div class="form">
    <form id="form1"  enctype="multipart/form-data" name="form1" method="post" action="upload.php" onsubmit="return validateForm()">
  <h2 align="center"><b>ADD FOOD</b></h2>
        <label for="name">Item Name</label>
    <input type="text" id="name" name="name" placeholder="Enter name of item">
    
    <label for="category">Category</label>
    <select id="cat" name="cat">
      <option value="">Choose One:</option>
      <option value="Mandhi">Mandhi</option>
      <option value="Madhooth">Madhooth</option>
      <option value="Madhfoona">Madhfoon</option>
    </select>
    
    <label for="quantity">Quantity</label>
    <select id="qty" name="qty">
      <option value="">Choose One:</option>
      <option value="Quarter">Quarter</option>
      <option value="Half">Half</option>
      <option value="Full">Full</option>
    </select>
    <label for="count">Count</label>
    <input type="text" id="count" name="count" placeholder="Enter the Available Count"/>
    <label for="price">Price</label>
    <input type="text" id="price" name="price" placeholder="Price of item"/>
    <label for="exampleInputFile">Select files to upload:</label>
    <input type="file" id="exampleInputFile" name="files[]"/>
    <input type="submit" name="submit" id=submit" value="ADD"/>
           
<font color='red'> <DIV id="txt"> </DIV> </font>
</form>
</div>
</body>
    <?php include './footer.php'; ?>
</html>

