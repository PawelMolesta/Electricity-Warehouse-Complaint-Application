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
			
	    <div class="menu"><br /><b><a href="reklamacje.php">Powrót.</a></b></div> 
		<div class="menu"><br /><b><a href="zamowienia.php" title="Zobacz wszystkie zamówienia.">Zamówienia.</a></b></div>
		<div class="menu"><br/><b><a href="logout.php" title="Wyloguj teraz!">Wyloguj się!</a></b>
		</div>
				
		</div>
		
			<div id="content" >
	<h2>Formularz reklamacyjny:</h2>
	
<form action="" method="post" name="kontakt" id="form"><table>
	<tr><td>Nazwa firmy: </td><td><input type="text" name="nazwa_firmy" class="pole_input"/></td></tr>
	<tr><td>Email: </td><td><input type="text" name="email" class="pole_input" /></td></tr>
	<tr><td>Temat: </td><td><input type="text" name="temat" class="pole_input" /></td></tr>
	<tr><td>Numer zamówienia: </td><td><input type="text" name="numer_zamowienia" class="pole_input" /></td></tr>
	<tr><td>Opis reklamowanego towaru: </td><td><textarea name="opis" id="textarea" class="pole_input"></textarea></td></tr>
</table>
	 <input type="submit" value="Wyślij reklamację" name="wyslij">
		 
</form>

<?php
	if(isset($_POST['wyslij'])) 
	{
		if(!empty($_POST['nazwa_firmy']) && !empty($_POST['temat']) && !empty($_POST['opis'])) 
	{
		$nazwa_firmy = htmlspecialchars(trim($_POST['nazwa_firmy']));
		$opis = htmlspecialchars(trim($_POST['opis']));
		$temat = htmlspecialchars(trim($_POST['temat']));
		$numer_zamowienia = htmlspecialchars(trim($_POST['numer_zamowienia']));
		$email = htmlspecialchars(trim($_POST['email']));
		$do_kogo = 'prious.one@gmail.com';
		$msg = "
			System reklamacyjny hurtowni elektrycznej:
			E-Maila nadała firma".$nazwa_firmy."
			Kontakt :".$email."
			Temat: ".$temat."
			Numer zamówienia: ".$numer_zamowienia."
			Opis reklamowanego towaru: ".$opis."
			";
		if(mail($do_kogo,$temat,$msg));
			echo 'Wiadomość została wysłana poprawnie';
			}
			else 
			{
			echo 'Email nie został wysłany, upewnij się, że pola nie pozostały puste!';}
			}
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