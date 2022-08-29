 <!DOCTYPE html>

 <?php
 	include_once("config.php");
	$result = $dbConnection->query("SELECT * FROM vaihtoautot ORDER BY id DESC");
 ?>

 <html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Kertausprojekti</title>
		<link rel="stylesheet" href="./style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 
	</head>
	<body>
		<header>
			<div>
				<a href="./index.html">Ranen raudat | vaihtoautot helposti</a>
			</div>
			<div>
				<a href="./pages/add.html" id="add_item">Lisää uusi</a>
			</div>
		</header>
		<div>
			<div id="otsikot">
				<table width='80%' border=0>
					<tr>
						<td>Merkki</td>
						<td>Malli</td>
						<td>Vuosimalli</td>
						<td>Kilometrit</td>
						<td>Lisätiedot</td>
						<td>Hinta</td>
						<td>Muokkaa</td>
						<td>Poista</td>
					</tr>
					<?php     
						while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
							echo "<tr>";
							echo "<td>".$row['make']."</td>";
							echo "<td>".$row['model']."</td>";
							echo "<td>".$row['vm']."</td>";
							echo "<td>".$row['km']."</td>";
							echo "<td>".$row['info']."</td>";
							echo "<td>".$row['price']."</td>";
							echo "<td><a class='btn' href='./pages/edit.php>id=" .$row['id'] ."'>Muokkaa</a></td>";
							echo "<td><a class='btn' href='./pages/delete.php>id=" .$row['id'] ."'>Poista</a></td>";
							
							// echo "<td><button class=\"edit\" onclick=\"window.location.href=./pages/edit.php?id=$row[id]\">Muokkaa</button></td>";
							// echo "<td><button class=\"delete\" onclick=\"window.location.href=./pages/delete.php\">Poista</button></td>";
							// echo "<td><a href=\"./pages/edit.php?$row[id]\">Muokkaa</a>";
						}
					?>
				</table>
			</div>
		</div>
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