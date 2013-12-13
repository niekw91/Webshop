<!DOCTYPE html>
<html>

<head>
	<!--<link rel="stylesheet" type="text/css" href="../styles/HeaderStyle.css"/>-->
	<style>
	* {
		margin: 0px;
		padding: 0px;
	}

	/* Navigation menu rules */

	ul {
		list-style-type: none;
		font-size: 11px;
	}
	
	#navmenu {
		position: relative;
		width: 1060px;
		margin-top: 0;
		padding: 20px;
		margin: auto auto;
		height: 80px;
	}
	
	ul#navmenu li {
		width: 185px;
		text-align: center;
		position: relative;
		float: left;
		margin-right: 4px;
	}

	ul#navmenu a {
		text-decoration: none;
		display: block;
		width: 150px;
		height: 25px;
		line-height: 25px;
		background-color: #FFF;
		border: 1px solid #CCC;
		border-radius: 5px;
	}
	
	ul#navmenu .sub1 a {
		margin-top: 3px;
	}
	
	ul#navmenu .sub2 a {
		margin-left: 8px;
	}
	
	ul#navmenu li:hover > a {
		background-color: #CFC;
	}
	
	ul#navmenu ul.sub1 {
		display: none;
		position: absolute;
		top: 26 px;
		left: 0px;
	}
	
	ul#navmenu ul.sub2 {
		display: none;
		position: absolute;
		top: 0px;
		left: 150px;
	}
	
	ul#navmenu li:hover .sub1 {
		display: block;
	}
	
	ul#navmenu .sub1 li:hover .sub2 {
		display: block;
	}
	
	.darrow {
		font-size: 7pt;
		position: absolute;
		top: 6px;
		right: 40px;
		color: #ABC;
	}
	
	.rarrow {
		font-size: 7pt;
		position: absolute;
		top: 9px;
		right: 40px;
		color: #ABC;
	}
	
	</style>
</head>

<body>

<ul id="navmenu">
	<li><a href="#">Home</a></li>
	<li><a href="#">Producten</a><span class="darrow">&#9660;</span>
		<ul class="sub1">
			<li><a href="#">Besturingssystemen</a><span class="rarrow">&#9654;</span>
				<ul class="sub2">
					<li><a href="#">Windows</a>
					<li><a href="#">Mac</a>
				</ul>
			</li>
			<li><a href="#">Beveiliging</a></li>
			<li><a href="#">Kantoor</a></li>
			<li><a href="#">Videobewerking</a></li>
			<li><a href="#">Muziek</a></li>
			<li><a href="#">Financieen</a></li>
			<li><a href="#">Onderwijs</a></li>
		</ul>
	</li>
	<li><a href="#">Deals</a><span class="darrow">&#9660;</span>
		<ul class="sub1">
			<li><a href="#">Uitverkoop</a></li>
			<li><a href="#">Dagaanbieding</a></li>
		</ul>
	</li>
	<li><a href="#">Ondersteuning</a></li>
</ul>

</body>

</html>
