<?php
include_once("conn.php");

$ids = $_POST["id"];
$product = $_POST["product"];
$barcode = $_POST["barcode"];
$price = $_POST["price"];

$total = 0;

foreach($barcode as $index => $value) $total = $total + $price[$index];

$sql = "INSERT INTO trans (total) VALUES ('".$total."')";

if ($conn->query($sql) === TRUE) {
	$last_id = $conn->insert_id;
	foreach($barcode as $index => $value) {
		$each_barcode = $value;
		$each_product = $product[$index];
		$each_price = $price[$index];
		$sql = "INSERT INTO trans_details (id, product, barcode, price)
		VALUES (".$last_id.",'".$each_product."', '".$each_barcode."', '".$each_price."')";
		$conn->query($sql);
	}
	echo "Transaction Created Succesfully, Click the link to buy again <a href = 'trans.php'>Link</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



?>
