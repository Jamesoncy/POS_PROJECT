<?php 
	include_once("conn.php");
	$sql = "SELECT * FROM trans";
	$result = $conn->query($sql);

?>

<center>
	<table>
		<tr>
			<td>
				ID
			</td>
			<td>
				Date
			</td>
			<td>
				Total
			</td>
			<td>
				Details
			</td>
		</tr>
		<?php 
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
				$sql2 = "SELECT * FROM trans_details where id = ".$row["id"];
				$result2 = $conn->query($sql2);
		?>
		<tr>
			<td>
				<?php echo $row["id"];?>
			</td>
			<td>
				<?php echo date("m/d/Y", strtotime($row["date_added"]));?>
			</td>
			<td>
				<?php echo number_format($row["total"],2);?>
			</td>
			<td>
				<?php 
					echo "<table>";
					while($row2 = $result2->fetch_assoc()) {
						echo "<tr><td>".$row2["barcode"]. "</td><td>".$row2["product"]."</td><td>". $row2["price"]."</td></tr>";
					}
					echo "</table></br>";
				?>
			</td>
		</tr>
		<?php }}?>

	</table>
</center>
