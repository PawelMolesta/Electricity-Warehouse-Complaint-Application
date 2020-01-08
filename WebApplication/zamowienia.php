<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}	
	

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>System reklamacyjny firmy NAME</title>
	<meta name="description" content="Najlepszy system reklamacyjny dla hurtowni. "/>
	<meta name="keywords" content="reklamacje, hurtownia, hurtownia elektryczna, system rekamacyjny "/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	
	<style>
	
	#navy
{
	float: left;
	background-color: darkgrey;
	width: 200px;
	min-height: 850px;
	padding: 10px;
}
	
	</style>
</head>

<body>

		<div id="container">
	
			<div id="logo">
	
		<h1>System reklamacyjny hurtowni elektrycznej. </h1>
	
			</div>
		
			<div id="navy">
		<div class="menu"><br /> <b><a href="reklamacje.php">Powrót.</a></b></div>
		<div class="menu"><br /><b><a href="nowareklamacja.php" title="Złóż nową reklamację.">Nowa reklamacja.</a></b></div>
		<div class="menu"><br/><b><a href="logout.php" title="Wyloguj teraz!">Wyloguj się!</a></b></div>
			
			</div>
			
		<div id="content" >
	<h2>Wszystkie zamówienia: </h2>
	
	
 <?php
	require_once "connect.php";
	$firma = $_SESSION['zalogowany'];
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$resultat = @$polaczenie->query(
	"SELECT Z.IdZamowienia, Z.data_zamowienia, K.Nazwa_firmy, K.Miasto, T.Nazwa_towaru, T.Symbol_towaru, TZ.Ilosc 
	FROM zamowienia AS Z INNER JOIN klient AS K ON K.idKlienta=Z.idKlienta 
	INNER JOIN towarwzamowieniu AS TZ ON Z.IdZamowienia=TZ.IdZamowienia 
	INNER JOIN towar AS T ON TZ.IdTowaru=T.idTowaru 
	WHERE K.idKlienta=$firma ORDER BY Z.IdZamowienia ASC;");
	
	echo "<table border='1'>
		<th><h1 style='color:#ff9900; font-size: 20px;'>Nr FV</h1>
		</th><th><h1 style='color:#ff9900; font-size: 20px;'>Miasto</h1>
		</th><th><h1 style='color:#ff9900; font-size: 20px;'>Nazwa firmy</h1>
		</th><th><h1 style='color:#ff9900; font-size: 20px;'>Data zamówienia</h1>
		</th><th><h1 style='color:#ff9900; font-size: 20px;'>Nazwa towaru</h1>
		</th><th><h1 style='color:#ff9900; font-size: 20px;'>Symbol towaru</h1>
		</th><th><h1 style='color:#ff9900; font-size: 20px;'>Liczba sztuk</h1></th>";
	
	while($wiersz = $resultat->fetch_assoc())
	{
		echo '<tr>';
			echo '<td>'.$wiersz['IdZamowienia'].'</td>';
			echo '<td>'.$wiersz['Miasto'].'</td>';
			echo '<td>'.$wiersz['Nazwa_firmy'].'</td>';
			echo '<td>'.$wiersz['data_zamowienia'].'</td>';
			echo '<td>'.$wiersz['Nazwa_towaru'].'</td>';
			echo '<td>'.$wiersz['Symbol_towaru'].'</td>';
			echo '<td>'.$wiersz['Ilosc'].'</td>';
		echo '</tr>';
	}
	echo '</table>';
	$resultat->close();

?>
			</div>
			
			<div id="footer">
				Najlepsza hurtownia elektryczna w Polsce! &copy; Wszelkie prawa zastrzeżone
			</div>
			
			
		</div>
		
	</body>
	
</html>