<div id="details">
	<h1><?php echo $name ?></h1>
	
	<form id="detail-form" action="index.php?page=products&action=add&id=<?php echo $id ?>" method="POST"> 
		<table>
			<tr>
				<th></th>
				<th></th>
			<tr>
				<td><img src=<?php echo $largeImage ?>></td>
				<td>
					<h2>Beschrijving</h2><br />
					<?php echo $longDescription ?><br />
					<br />
					<p>Prijs: €<?php echo $price ?>,00 incl. BTW</p>
					<br />
					<button type="submit" name="submit">Plaats in winkelwagen</button>
				</td>	
			</tr>
			<tr>
				<td><?php echo $shortDescription ?></td>
				<td></td>	
			</tr>
		</table>
	</form>
</div>