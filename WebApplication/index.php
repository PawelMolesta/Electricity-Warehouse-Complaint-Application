<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] = true))
	{
		header('Location: reklamacje.php');
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
		</div>
	
	<div id="content">
	<form action="zaloguj.php" method="post">
	
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br />
		<input type="submit" value="Zaloguj się" />
	
	</form>
	<?php
	
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
		
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