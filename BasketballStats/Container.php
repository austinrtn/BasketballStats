<?php
	include_once 'includes/dbh.inc.php';
?>

<?php

	$sql = "SELECT * FROM players WHERE 1";				
	$players1 = $db->query($sql);
	$players2 = $db->query($sql);

	
	if(isset($_GET['players1List'])) {
		$userQuery = "SELECT * FROM players WHERE players.id = :players_id";
	
		$selPlayer1 = $db->prepare($userQuery);
		$selPlayer1->execute(['players_id' => $_GET['players1List']]);
		
		$selectedPlayer1 = $selPlayer1->fetch(PDO::FETCH_ASSOC);
			
	}		
	
	if(isset($_GET['players2List'])) {
		$userQuery = " SELECT * FROM players WHERE players.id = :players_id";
	
		$selPlayer2 = $db->prepare($userQuery);
		$selPlayer2->execute(['players_id' => $_GET['players2List']]);
		
		$selectedPlayer2 = $selPlayer2->fetch(PDO::FETCH_ASSOC);
	}
	
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title> </title>
		
		<style>
		
			p{
			position: relative;
			}
			div{
				display: inline-block;
			
			}
		</style>
	</head>
	
	<body>
		<form action="Container.php" method="get">
		
			<select name="players1List">
				<option value="">Player 1</option>
				
				<?php foreach($players1->fetchAll() as $player1): ?>
					<option value="<?php echo $player1['id'] ?>"><?php echo $player1['first_name'] . " " . $player1['last_name']; ?></option>
				<?php endforeach; ?>
	
			</select>
			
			<select name="players2List">
					<option value="">Player 2</option>		
					
					<?php foreach($players2->fetchAll() as $player2): ?>
						<option value="<?php echo $player2['id'] ?>"><?php echo $player2['first_name'] . " " . $player2['last_name']; ?></option>
					<?php endforeach; ?>
		
				</select>
				
			<input type="submit" value="Compare">

		</form>
		
		<br> <br>
		
		<?php 
		
			if(isset($_GET['players1List']) && isset($_GET['players2List'])) {
			
				echo "<p>";
				
					//NAME			
					echo "&emsp; &emsp; &ensp; &ensp; Name: &ensp;"  .  $selectedPlayer1['first_name'] . " " . $selectedPlayer1['last_name'] . 
					" &ensp;|&ensp; " . $selectedPlayer2['first_name'] . " " . $selectedPlayer2['last_name'] . "</br>";
							
					//TEAM 			
					echo  "&emsp; &emsp; &ensp; &emsp;Team: &emsp;" . $selectedPlayer1['team'] . " &ensp;|&ensp; " . $selectedPlayer2['team']. "</div> </br>";

					
					//PPG
					echo " Points per game: &ensp;" . $selectedPlayer1['points_per_game'] . " &ensp;|&ensp; " . $selectedPlayer2['points_per_game'] . "</br>";
					
					//SHOOTING %
					echo " Shooting Percent: &ensp;" . $selectedPlayer1['shooting_percentage'] . " &ensp;|&ensp; " . $selectedPlayer2['shooting_percentage'] . "</br>";				
					
					//ASSIST PG
					//ASSIST PG
					echo "Assists per game: &ensp;" . $selectedPlayer1['assists_per_game'] . " &ensp;|&ensp; " . $selectedPlayer2['assists_per_game'] . "</br>";
					
					//REBOUND PG
					echo "Rebounds per game: &ensp;" . $selectedPlayer1['rebounds_per_game'] . " &ensp;|&ensp; " . $selectedPlayer2['rebounds_per_game'] . "</br>";

					//BLOCKS PG
					echo "&ensp;Blocks per game: &ensp;" . $selectedPlayer1['blocks_per_game'] . " &ensp;|&ensp; " . $selectedPlayer2['blocks_per_game'] . "</br>";

					//STEALS PG
					echo "&emsp;Steals per game: &ensp;" . $selectedPlayer1['steals_per_game'] . " &ensp;|&ensp; " . $selectedPlayer2['steals_per_game'] . "</br>";
				
				echo "</p>";

			}	
		
		
		?>
				
	</body>	
</html>