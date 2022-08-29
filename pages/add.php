<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lisää uusi</title>
		<link rel="stylesheet" href="../style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 
	</head>
	<body>
		<header>
			<div>
				<a href="../index.php">Ranen raudat | vaihtoautot helposti</a>
			</div>
			<div>
				<a href="./add.php" id="add_item">Lisää uusi</a>
			</div>
		</header>
		
		<?php
			include_once("../config.php");

			if(isset($_POST['Submit']))
			{
				$make = $_POST['make'];
				$model = $_POST['model'];
				$vm = $_POST['vm'];
				$km = $_POST['km'];
				$info = $_POST['info'];
				$price = $_POST['price'];

				if(empty($make) || empty($model) || empty($vm) || empty($km) || empty($info) || empty($price))
				{
					if(empty($make))
					{
						echo "<font color='red'>Merkki field is empty.</font><br/>";
					}
					if(empty($model))
					{
						echo "<font color='red'>Malli field is empty.</font><br/>";
					}
					if (empty($vm))
					{
						echo "<font color='red'> Vuosimalli field is empty.</font><br/>";
					}
					if (empty($km))
					{
						echo "<font color='red'> Kilometrit field is empty.</font><br/>";
					}
					if (empty($info))
					{
						echo "<font color='red'> Lisätiedot field is empty.</font><br/>";
					}
					if (empty($price))
					{
						echo "<font color='red'> Hinta field is empty.</font><br/>";
					}
					echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
				} 
				else
				{        
					$sql = "INSERT INTO vaihtoautot(make, model, vm, km, info, price) VALUES(:make, :model, :vm, :km, :info, :price)";
					$query = $dbConnection->prepare($sql);	
					$query->bindparam(':make', $make);
					$query->bindparam(':model', $model);
					$query->bindparam(':vm', $vm);
					$query->bindparam(':km', $km);
					$query->bindparam(':info', $info);
					$query->bindparam(':price', $price);
					$query->execute();
					
					echo "<font color='green'>Data added successfully.";
					echo "<br/><a href='../index.php'>View Result</a>";
				}
			}
		?>
		<footer>
			<div>
				<p>Created by: Juho Hesso</p>
			</div>
			<div class="github">
				<a href="https://www.github.com/jhesso">github</a>
			</div>
		</footer>
	</body>
</html>