<?php
	
	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
		{
			header('Location: index.php');
			exit();
		}
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error:".$polaczenie->connect_errno;	
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
		
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM klient WHERE login='%s' AND haslo='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
			{
				$ilu_userow = $rezultat->num_rows;
				if($ilu_userow>0)
				{
					$_SESSION['zalogowany'] = true; 
					
					$wiersz = $rezultat->fetch_assoc();
					
					$_SESSION['IdKlienta'] = $wiersz['IdKlienta'];
				
			     	$_SESSION['Nazwa_firmy'] = $wiersz['Nazwa_firmy'];
					$_SESSION['Miasto'] = $wiersz['Miasto'];
					$_SESSION['Ulica'] = $wiersz['Ulica'];
					$_SESSION['Kod_pocztowy'] = $wiersz['Kod_pocztowy'];
					$_SESSION['mail'] = $wiersz['mail'];
					$_SESSION['Telefon'] = $wiersz['Telefon'];
					$_SESSION['NIP'] = $wiersz['NIP'];
			
					unset($_SESSION['blad']);
				
					$rezultat->free_result();
					
					header('Location: reklamacje.php');
				
				} else {
					
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					
					header('Location: index.php');
				
				}
								
			}
	
				$resultat->close();
			}	
?>