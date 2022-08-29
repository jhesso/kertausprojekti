<?php
include_once("../config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $make=$_POST['make'];
    $model=$_POST['model'];
	$vm=$_POST['vm'];
	$km=$_POST['km'];
	$info=$_POST['info'];
	$price=$_POST['price'];
    
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
    }
	else
	{    
        $sql = "UPDATE vaihtoautot SET make=:make, model=:model, vm=:vm, km=:km, info=:info, price=:price WHERE id=:id";
        $query = $dbConnection->prepare($sql);        
        $query->bindparam(':id', $id);
        $query->bindparam(':make', $make);
        $query->bindparam(':model', $model);
		$query->bindparam(':vm', $vm);
		$query->bindparam(':km', $km);
		$query->bindparam(':info', $info);
		$query->bindparam(':price', $price);
        $query->execute();
        header("Location: ../index.php");
    }
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM vaihtoautot WHERE id=:id";
$query = $dbConnection->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $make = $row['make'];
    $model = $row['model'];
	$vm = $row['vm'];
	$km = $row['km'];
	$info = $row['info'];
	$price = $row['price'];
}
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Muokkaa</title>
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
		<form action="edit.php" method="post" merkki="form1">
			<table width="25%" border="0">
				<tr>
					<td>Merkki</td>
					<td><input type="text" name="make" value="<?php echo $make;?>"></td>
				</tr>
				<tr>
					<td>Malli</td>
					<td><input type="text" name="model" value="<?php echo $model;?>"></td>
				</tr>
				<tr>
					<td>Vuosimalli</td>
					<td><input type="text" name="vm" value="<?php echo $vm;?>"></td>
				</tr>
				<tr>
					<td>Kilometrit</td>
					<td><input type="text" name="km" value="<?php echo $km;?>"></td>
				</tr>
				<tr>
					<td>Lisätiedot</td>
					<td><input type="text" name="info" value="<?php echo $info;?>"></td>
				</tr>
				<tr>
					<td>Hinta</td>
					<td><input type="text" name="price" value="<?php echo $price;?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
					<td><input type="submit" name="update" value="Muokkaa"></td>
				</tr>
			</table>
		</form>
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