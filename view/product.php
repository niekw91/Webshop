<?php

	if(isset($_GET['id'])) {
	
		$id=intval($_GET['id']);
		
		include_once("model/products.php");
		$productsModel = new Products;
		$result = $productsModel->getProduct($id);
		
		$id = $result->getId();
		$name = $result->getName();
		$shortDescription = $result->getShortDescription();
		$longDescription = $result->getLongDescription();
		$smallImage = $result->getSmallImage();
		$largeImage = $result->getLargeImage();
		$price = $result->getPrice();
	}
?>
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
				<td></td>
				<td><button type="submit" name="submit">Plaats in winkelwagen</button></td>	
			</tr>
		</table>
	</form>
</div>