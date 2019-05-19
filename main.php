<?php
	
	session_start();
	
	if(!isset($_SESSION['logged'])){
		
		header("Location: index.php");
		
		exit();
		
	}
	require_once "begin.html";
	
	?>
	
	<script src="jquery_main.js"></script>
	
	<div id="left">
	
		<?php
			
			echo "<label>Logged in as: ".$_SESSION['user']."!</label>";
			
		?>
	
	</div>

	
	<div id="main">
	
		<label id="dice_label"><input type="checkbox" id="dice_check"><span id="dice_box"></span>
		
		
		</input></label>
		
		<div id="dice_menu">
		
			<div id="d4_container" class="dice_container">
			
				<p>D4 container!</p>
				<label><input type="number" min="0" value=0></input>d4</label><button id="roll_d4" class="roll_button">roll</button>
				<p id="d4_result" class="roll_result"></p>
				
			</div>
			
			<div id="d6_container" class="dice_container">
			
				<p>D6 container!</p>
				<label><input type="number" min="0" value=0></input>d6</label><button id="roll_d6" class="roll_button">roll</button>
				<p id="d6_result" class="roll_result"></p>
				
			</div>
			
			<div id="d8_container" class="dice_container">
			
				<p>D8 container!</p>
				<label><input type="number" min="0" value=0></input>d8</label><button id="roll_d8" class="roll_button">roll</button>
				<p id="d8_result" class="roll_result"></p>
				
			</div>
			
			<div id="d10_container" class="dice_container">
			
				<p>D10 container!</p>
				<label><input type="number" min="0" value=0></input>d10</label><button id="roll_d10" class="roll_button">roll</button>
				<p id="d10_result" class="roll_result"></p>
				
			</div>
			
			<div id="d12_container" class="dice_container">
			
				<p>D12 container!</p>
				<label><input type="number" min="0" value=0></input>d12</label><button id="roll_d12" class="roll_button">roll</button>
				<p id="d12_result" class="roll_result"></p>
				
			</div>
			
			<div id="d20_container" class="dice_container">
			
				<p>D20 container!</p>
				<label><input type="number" min="0" value=0></input>d20</label><button id="roll_d20" class="roll_button">roll</button>
				<p id="d20_result" class="roll_result"></p>
				
			</div>
			
			<div id="d100_container" class="dice_container">
			
				<p>D100 container!</p>
				<label><input type="number" min="0" value=0></input>d100</label><button id="roll_d100" class="roll_button">roll</button>
				<p id="d100_result" class="roll_result"></p>
				
			</div>
		
		</div>		
		
			
			<br>
			
			<label><a href="logout.php">Log out</a><label>
			
		</div>
			
	</div>
		
		<?php
		
	
		require_once "end.html";
	
	?>