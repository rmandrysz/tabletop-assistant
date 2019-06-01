var is_on = 0;
var height;

$(document).ready(function(){
	
	
	$("#left").load("left.php");
	
	$("#dice_box").click(function(){
		
		if(is_on == 0){
			
			$("#dice_menu").css("top", "0");
			
			setTimeout(function(){
				
				$("#dice_menu").css("position", "fixed")
				
			}, 250);
			
			
		}
		
		else {
			
			$("#dice_menu").css("position", "absolute");
			
			height = $("#dice_menu").css("height");
			
			$("#dice_menu").css("top", "-"+height);
			
		}
		
		is_on = 1 - is_on;
		
	});
	
	$("#roll_d4").click(function(){ dice_roll(4); });
	$("#roll_d6").click(function(){ dice_roll(6); });
	$("#roll_d8").click(function(){ dice_roll(8); });
	$("#roll_d10").click(function(){ dice_roll(10); });
	$("#roll_d12").click(function(){ dice_roll(12); });
	$("#roll_d20").click(function(){ dice_roll(20); });
	$("#roll_d100").click(function(){ dice_roll(100); });
	
	
	const numInputs = document.querySelectorAll('input[type=number]');

	numInputs.forEach(function (input) {
	  input.addEventListener('change', function (e) {
		if (e.target.value == '') {
		  e.target.value = 0
		}
	  })
})
	
});

function dice_roll(die_sides){
	
	var result = 0;
	var roll = 0;
	var tooltip = "";
	var id = "#d" + die_sides;
	
	var no_of_rolls;
	
	no_of_rolls = $(id + "_input").val();
	
	for(var i=0; i<no_of_rolls; i++){
		
		roll = Math.floor((Math.random()*die_sides)+1);
		result += roll;
		tooltip += roll+";  ";
		
	}
	
	result += Number($(id + "_mod").val());
	
	if($("#d" + die_sides + "_mod").val() > 0)	{
		
		tooltip += "+" + $(id + "_mod").val() + ";  ";
		
	}
	
	else if( $(id + "_mod").val() < 0) {
		
		tooltip += $(id + "_mod").val() + ";  ";
		
	}
	
	if(result < 1){
		
		result = 1;
		
		tooltip += "Minimal result is 1";
		
	}
	
	
	$(id + "_result").html("Result: " + result + "<span class='tooltip'>Rolls: " + tooltip + "</span>");
	
	
	
}