<!DOCTYPE html>
<html>

<head>
	<title>Webshop</title>
	
	<meta name="description" content="Webshop software"/>
    <meta name="keywords" content="webshop, software, microsoft, mac"/>
	<link href="./styles/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="header">
	
	<?php require 'view' . DIRECTORY_SEPARATOR . 'header.php'; ?>
	
</div>

<div class="headerft">


</div>

<div class="main">

	<?php require($page); ?>

</div>

<div class="footer">

</div>

</body>

</html>