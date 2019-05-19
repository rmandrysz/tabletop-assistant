<?php 

	session_start();
	
	if(!isset($_POST['login']) || !isset($_POST['pass'])){
		
		header("Location: index.php");
		exit();
		
	}

	require_once "connect.php";

	$connection = @new mysqli($host, $dbuser, $dbpassword, $dbname);
	
	if($connection->connect_errno!=0){
		
		echo "Error: ".$connection->connect_errno;
		
	}
	else{
		
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$pass = htmlentities($pass, ENT_QUOTES, "UTF-8");
		
		
		if($outcome = @$connection->query(sprintf("SELECT * FROM users WHERE login='%s'",
		mysqli_real_escape_string($connection, $login)))){
			
			$userno = $outcome->num_rows;
			
			if($userno){
				
				
				$row = $outcome->fetch_assoc();
				
				if(password_verify($pass, $row['haslo'])){
						
					$_SESSION['user'] = $row['login'];
					$_SESSION['id'] = $row['id'];
					
					unset($_SESSION['logerr']);
					
					$_SESSION['logged'] = true;
					
					$outcome->free();
					
					header('Location: main.php');
					
				}	else{
				
					$_SESSION['logged'] = false;
					
					$_SESSION['logerr'] = "Invalid login or password";
					header('Location: index.php');
					$_SESSION['loginremember'] = $login;
				}
				
			} else{
				
				$_SESSION['logged'] = false;
				
				$_SESSION['logerr'] = "Invalid login or password";
				$_SESSION['loginremember'] = $login;
				
				header('Location: index.php');
				
			}
			
		}
		
		$connection->close();
		
	}


?>