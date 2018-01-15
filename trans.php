<?php
include_once("conn.php");
$sql = "SELECT * FROM products where status = 1";
$result = $conn->query($sql);
?>
<center>
<table>
	<tr>
		<th>Product List</th>
		<th></th>
		<th></th>
		<th><a href = "show_trans.php">Show Transactions</a></th>
	</tr>
	<tr>
		<th>Barcode</th>
		<th>Product</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
	<?php 
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<tr><td>" . $row["barcode"]. "</td><td>" . $row["product"]. "</td><td>" . $row["price"]. "</td><td><input type = 'button' value = 'Buy' class = 'buy' id = '".$row["id"]."' price = '".$row["price"]."' barcode = '".$row["barcode"]."' product = '".$row["product"]."'/></th></tr>";
    	}
	} ?>
</table>
<br><br><br>
<table>
	<tr>
		<th>Transaction</th>
		<th></th>
		<th></th>
	</tr>
</table>
<form action = "accept.php" method = "post">
<table id = "trans">
	
</table>
<br><br>
<h3 ><b>Total:</b></h3><h3 id = "total">0</h3>
<input type = "submit" value = "Checkout"/>
</form>

</center>

<script src="jquery-3.2.1.min.js"></script>

<script >
$(document).ready(function(){

   $(".buy").click(function() {
   	 var pd = $(this);
   	 var product = pd.attr("product");
   	 var barcode = pd.attr("barcode");
   	 var price = pd.attr("price");
   	 var id = pd.attr("id");
   	 	var total = $("#total").text();
   	 	$("#total").html(Number(total) + Number(price));
   	 	$("#trans").append("<tr><td><input type = 'hidden' name = 'id[]' value = '"+id+"'/><input type = 'hidden' name = 'product[]' value = '"+product+"'/><input type = 'hidden' name = 'barcode[]' value = '"+barcode+"'/><input type = 'hidden' name = 'price[]' value = '"+price+"'/>"+product+"</td><td>"+barcode+"</td><td>"+price+"</td><td><input type = 'button' value = 'remove' class = 'remove' price = "+price+"></td></tr>");
   });

   $("#trans").on( "click", ".remove", function() {
   		var price = $(this).attr("price");
   		var total = $("#total").text();
   		$("#total").html(Number(total) - Number(price));
  		$(this).parent().parent().remove();
   });


});
</script>



