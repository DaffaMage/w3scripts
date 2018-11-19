<HTML>
	<head>
		<title>Warcraft 3 Armor</title>
	</head>
	
	<style>
	/* Body of HTML */
	body {
		background-color: #6699FF;
	}
	</style>

	<body>
		<form action="w3armor.php">
			<label for ="armtype">Search for :</label><br>
			<input type="radio" name="scantype" value="armorval">Armor Value<br>
			<input type="radio" name="scantype" value="armorper">Armor Percentage<br>
			<input type="radio" name="scantype" value="armormod">Armor Modifier<br>
	
			<div class="armor">
				<label for ="value">Armor :</label>
				<input type="number" value="0" id="aval" name="aval" min="-9999" max="9999" step="1">
				<br>
		
				<label for ="percentage">Percentage :</label>
				<input type="number" value="0" id="aper" name="aper" min="-100" max="100" step="0.01">
				<br>
		
				<label for="modifier">Modifier : </label>
				<input type="number" value="0.06" min="-1" max="1" step="0.01" id="amod" name="amod">
				<br>
		
				<button type="submit">Check Result!</button>
			</div>
		</form>
		
		<?php
			error_reporting(0);
			if ($_GET["scantype"]=="armorper"){
				$armor = $_GET["aval"];
				$modifier = $_GET["amod"];
				$percentage =  (($armor * $modifier) / ( 1 + $armor * $modifier ))*100;
			}
			if ($_GET["scantype"]=="armorval"){
				$modifier = $_GET["amod"];
				$percentage =  $_GET["aper"];
				$armor = $percentage / ($modifier - $percentage * $modifier);
			}
			if ($_GET["scantype"]=="armormod"){
				$armor = $_GET["aval"];
				$percentage =  $_GET["aper"];
				$modifier = $percentage / ($armor - $percentage * $armor);
			}
		?>
		
		Armor : <?php echo $armor; ?><br>
		Percentage: <?php echo $percentage; ?>%<br>
		Modifier: <?php echo $modifier; ?><br>
	</body>
	
</HTML>