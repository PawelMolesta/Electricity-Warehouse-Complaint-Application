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
	
</head>

<body>

		<div id="container">
	
			<div id="logo">
	
		<h1>System reklamacyjny hurtowni elektrycznej. </h1>
	
			</div>
		

		<div id="navy">
		<div class="menu"><br /><b><a href="zamowienia.php" title="Zobacz wszystkie zamówienia.">Zamówienia.</a></b> </div>
		<div class="menu"><br /><b><a href="nowareklamacja.php" title="Złóż nową reklamację.">Nowa reklamacja.</a></b></div>
		<div class="menu"><br/><b><a href="logout.php" title="Wyloguj teraz!">Wyloguj się!</a></b></div>
		
		</div>
	
		<div id="content" >
	<?php
	echo "<h2>Witaj "."<b>".$_SESSION['Nazwa_firmy'].'</b>!</h2>';
	echo "<b>Adres</b>: ".$_SESSION['Ulica'];
    echo ", ".$_SESSION['Miasto'];
	echo ", ".$_SESSION['Kod_pocztowy'];
	echo "<br /><b>Kontakt</b>: ".$_SESSION['mail'];
	echo " | <b>tel.</b>: ".$_SESSION['Telefon'];
	echo "<br /><b>NIP</b>: ".$_SESSION['NIP'];
	?>
		</div>
		
	<div id="ad">
		<img src="reklama.jpg"/>
	</div>
	
	<div id="footer">
		Najlepsza hurtownia elektryczna w Polsce! &copy; Wszelkie prawa zastrzeżone
	</div>
	
	
		</div>

	</body>

</html>