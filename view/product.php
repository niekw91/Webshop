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
					<?php echo $longDescription ?>
				</td>	
			</tr>
			<tr>
				<td><?php echo $shortDescription ?></td>
				<td><button type="submit" name="submit">Plaats in winkelwagen</button></td>	
			</tr>
		</table>
	</form>
</div>