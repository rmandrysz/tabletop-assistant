<?php
	
	session_start();
	
	if(isset($_POST['login'])){
		
		$valid = true;
		
		$login = $_POST['login'];
		$password = $_POST['pass'];
		$password2 = $_POST['pass2'];
		
		if((strlen($login)<3) || (strlen($login)>20)){
			
			$_SESSION['loginerr'] = "Login has to be 3 to 20 characters long";
			$valid = false;
			
		}
		
		if(!ctype_alnum($login)){
			
			$_SESSION['loginerr'] = "Login has to consist of alphanumerical characters only";
			$valid = false;
			
		}
		
		if((strlen($password)<8)){
			
			$_SESSION['passerr'] = "Password has to be at least 8 characters long";
			$valid = false;
			
		}
		
		if($password!=$password2){
			
			$_SESSION['pass2err'] = "The two passwords have to be identical";
			$valid = false;
			
		}
		
		$passhash = password_hash($password, PASSWORD_DEFAULT);
		
		if(!isset($_POST['terms'])){
			
			$_SESSION['termserr'] = "To create an account You have to accept the Terms of Use";
			$valid = false;
			
		}
		
		require_once "connect.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try{
			
			$connection = new mysqli($host, $dbuser, $dbpassword, $dbname);
			if($connection->connect_errno){
				
				throw new Exception(mysqli_connect_errno());
				
			}
			else{
				
				$outcome = $connection->query("SELECT id FROM users WHERE login='$login'");
				
				if(!$outcome) throw new Exception($connection->error);
				
				else{
					
					if($outcome->num_rows){
						
						$_SESSION['loginerr'] = "Login already taken";
						$valid = false;
						
					}
					
				}
				
			}
			
		}
		catch(Exception $e){
			
			echo "<span class='error'>Server error. Please try to register again or wait a few minutes. We apologise for any inconveniences caused.</span>";
			//echo "Dev info: ".$e;
		}
		
		
		if($valid){
			
			if($connection->query("INSERT INTO users VALUES(NULL,'$login','$passhash')")){
					
				unset($_SESSION['logged']);
				
				$_SESSION['registered'] = true;
				
				header("Location: index.php");
			
			}
			
			else throw new Exception($connection->error);
				
		} else {
			
			$_SESSION['loginremember'] = $login;
			$_SESSION['passwordremember'] = $password;
			$_SESSION['password2remember'] = $password2;
			if(isset($_POST['terms']))	$_SESSION['termsremember'] = true;
			
		}
		
		
		
	}
	
	require_once "begin.html";
	
?>
		
<div id="main">	
	
	<div id="register">
		<form class="loginform" method="POST">

			<label>Login:<br> <input type="text" name=login value="<?php
				
				if(isset($_SESSION['loginremember'])){
					
					echo $_SESSION['loginremember'];
					unset($_SESSION['loginremember']);
						
				}
				
			?>"></label>
				
			<?php
				
				if(isset($_SESSION['loginerr'])){
						
					echo "<span class='error'>".$_SESSION['loginerr']."</span>";
					unset($_SESSION['loginerr']);
						
				}
				
			?>
				
			<label>Password:<br> <input name=pass type=password value="<?php
					
				if(isset($_SESSION['passwordremember'])){
						
					echo $_SESSION['passwordremember'];
					unset($_SESSION['passwordremember']);
						
				}
				
			?>"></label>
				
			<?php
				
				if(isset($_SESSION['passerr'])){
						
					echo "<span class='error'>".$_SESSION['passerr']."</span>";
					unset($_SESSION['passerr']);
						
				}
				
			?>
				
			<label>Repeat password:<br><input name=pass2 type=password value="<?php
					
				if(isset($_SESSION['password2remember'])){
						
					echo $_SESSION['password2remember'];
					unset($_SESSION['password2remember']);
					
				}
				
			?>"></label>
				
			<?php
				
				if(isset($_SESSION['pass2err'])){
						
					echo "<span class='error'>".$_SESSION['pass2err']."</span>";
					unset($_SESSION['pass2err']);
						
				}
				
			?>
				
			<label class="checklabel"><input type="checkbox" name=terms <?php
					
				if(isset($_SESSION['termsremember'])){
						
					echo "checked";
					unset($_SESSION['termsremember']);
						
				}
				
			?>><span class="checkmark"></span>I accept the Terms of Use</label>
				
			<?php
				
				if(isset($_SESSION['termserr'])){
						
					echo "<span class='error'>".$_SESSION['termserr']."</span>";
					unset($_SESSION['termserr']);
						
				}
				
			?>
				
				
			<label><input type=submit class="form_submit" value="Create an account"></label>
			
			<label><a href="index.php">Back to the log in screen</a></label>
				
		</form>
		
			
	</div>
	
</div>

<?php

	require_once "end.html";

?>