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
	
		
	
	</div>

	
	<div id="main">
	
		<label id="dice_label"><input type="checkbox" id="dice_check"><span id="dice_box"></span>
		
		
		</input></label>
		
		<div id="dice_menu">
		
		
			<div id="d4_container" class="dice_container">
			
				<img src="layout_imgs/d4.png" class="dice_img"/>
				
				<label><input type="number" min="0" value=0 id="d4_input"></input>d4</label>
				<label class="modifier_label"><span class="modifier_span">modifier</span><input type="number" id="d4_mod" value=0 minlength="1"></input></label>
				<button id="roll_d4" class="roll_button">roll</button>
				<div class="tooldiv"><p id="d4_result" class="roll_result"><span class="tooltip"></span></p></div>
				
			</div>
			
			<div id="d6_container" class="dice_container">
			
				<img src="layout_imgs/d6.png" class="dice_img"/>
				
				<label><input type="number" min="0" value=0 id="d6_input"></input>d6</label>
				<label class="modifier_label"><span class="modifier_span">modifier</span><input type="number" id="d6_mod" value=0 minlength="1"></input></label>
				<button id="roll_d6" class="roll_button">roll</button>
				<div class="tooldiv"><p id="d6_result" class="roll_result"><span class="tooltip"></span></p></div>
				
			</div>
			
			<div id="d8_container" class="dice_container">
			
				<img src="layout_imgs/d8.png" class="dice_img"/>
				
				<label><input type="number" min="0" value=0 id="d8_input"></input>d8</label>
				<label class="modifier_label"><span class="modifier_span">modifier</span><input type="number" id="d8_mod" value=0 minlength="1"></input></label>
				<button id="roll_d8" class="roll_button">roll</button>
				<div class="tooldiv"><p id="d8_result" class="roll_result"><span class="tooltip"></span></p></div>
				
			</div>
			
			<div id="d10_container" class="dice_container">
			
				<img src="layout_imgs/d10.png" class="dice_img"/>
				
				<label><input type="number" min="0" value=0 id="d10_input"></input>d10</label>
				<label class="modifier_label"><span class="modifier_span">modifier</span><input type="number" id="d10_mod" value=0 minlength="1"></input></label>
				<button id="roll_d10" class="roll_button">roll</button>
				<div class="tooldiv"><p id="d10_result" class="roll_result"><span class="tooltip"></span></p></div>
				
			</div>
			
			<div id="d12_container" class="dice_container">
			
				<img src="layout_imgs/d12.png" class="dice_img"/>
				
				<label><input type="number" min="0" value=0 id="d12_input"></input>d12</label>
				<label class="modifier_label"><span class="modifier_span">modifier</span><input type="number" id="d12_mod" value=0 minlength="1"></input></label>
				<button id="roll_d12" class="roll_button">roll</button>
				<div class="tooldiv"><p id="d12_result" class="roll_result"><span class="tooltip"></span></p></div>
				
			</div>
			
			<div id="d20_container" class="dice_container">
			
				<img src="layout_imgs/d20.png" class="dice_img"/>
				
				<label><input type="number" min="0" value=0 id="d20_input"></input>d20</label>
				<label class="modifier_label"><span class="modifier_span">modifier</span><input type="number" id="d20_mod" value=0 minlength="1"></input></label>
				<button id="roll_d20" class="roll_button">roll</button>
				<div class="tooldiv"><p id="d20_result" class="roll_result"><span class="tooltip"></span></p></div>
				
			</div>
			
			<div id="d100_container" class="dice_container">
			
				<img src="layout_imgs/d100.png" class="dice_img"/>
				
				<label><input type="number" min="0" value=0 id="d100_input"></input>d100</label>
				<label class="modifier_label"><span class="modifier_span">modifier</span><input type="number" id="d100_mod" value=0 minlength="1"></input></label>
				<button id="roll_d100" class="roll_button">roll</button>
				<div class="tooldiv"><p id="d100_result" class="roll_result"><span class="tooltip"></span></p></div>
				
			</div>
		
		</div>		
		
			
			
		</div>
			
	</div>
		
		<?php
		
	
		require_once "end.html";
	
	?>