<div id="cart">
	<h1>Winkelwagen</h1>
	<?php 
	
	if(isset($_SESSION['cart'])) {
			foreach($products as $value) {
			?>
				<p><?php echo $value['name'] ?> x <?php echo $_SESSION['cart'][$value['id']]['quantity'] ?></p>
			<?php
			}
	?>
		<hr />
		<a href="index.php?page=cart">Ga naar winkelwagen</a>
	<?php
	} else {
		echo "<p>Winkelwagen is leeg</p>";
	}
	?>
</div>

<h1>Welkom</h2>
