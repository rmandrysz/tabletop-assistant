<?php

	session_start();
	
	if(isset($_SESSION['logged']) && $_SESSION['logged']){

		header("Location: main.php");
		
		exit();

	}
	
	require_once "begin.html";
?>


		
<div id="login">
	<form class="loginform" action="login.php" method="POST">
	
		<?php
		
			if(isset($_SESSION['registered'])){
				
				echo "<label class='positiveprompt'>Account created succesfully!</label>";
				unset($_SESSION['registered']);
				
			}
		
		?>

		<label>Login:	<br> <input type="text" name=login value="<?php
						
			if(isset($_SESSION['loginremember'])){
							
				echo $_SESSION['loginremember'];
				unset($_SESSION['loginremember']);
							
			}
					
		?>"></label>
		<label>Password: <br><input name=pass type=password></label>
		<label><input type=submit class="form_submit" value="Log in"></label>
					
				
	<?php 
					
		if(isset($_SESSION['logerr'])){
						
			echo "<span class='error'>".$_SESSION['logerr']."</span>";
			unset($_SESSION['logerr']);
						
		}
					
	?>
	
	<label>Not yet registered? <br><a href="register.php">Create an account!</a></label>
	
	</form>
				
				

</div>
		
<?php

	require_once "end.html";

?>