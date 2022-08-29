<?php
	include("../config.php");
	$id = $_GET['id'];
	$sql = "DELETE FROM vaihtoautot WHERE id=:id";
	$query = $dbConnection->prepare($sql);
	$query->execute(array(':id' => $id));
	header("Location:index.php");
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Poista</title>
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
				<a href="./add.html" id="add_item">Lisää uusi</a>
			</div>
		</header>
		<h1>Poista vaihtoauto</h1>
		<p>Vahvista teitojen poistaminen.</p>
		<button onclick="window.location.href='./delete.php'">poista</button>
		<button>peruuta</button>
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