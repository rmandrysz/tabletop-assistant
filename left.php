<?php

		session_start();
			
		echo "<label>Logged in as: ".$_SESSION['user']."!</label>";
			
?>
		
	<label><a href="logout.php">Log out</a><label>
	
	<ul class="left_menu">
	
		<a href="#nowa" class="left_link"><li>CHARACTER SHEETS<div class="line"><div></li></a>
		<a href="#nowa2" class="left_link"><li>CHARACTER CREATION<div class="line"><div></li></a>
	
	</ul>