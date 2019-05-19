var is_on = 0;

$(document).ready(function(){
	
	$("#dice_box").click(function(){
		
		if(is_on == 0){
			
			$("#dice_menu").css("top", "0");
			
			setTimeout(function(){
				
				$("#dice_menu").css("position", "fixed")
				
			}, 250);
			
			
		}
		
		else {
			
			$("#dice_menu").css("position", "absolute");
			
			$("#dice_menu").css("top", "-27vh");
			
		}
		
		is_on = 1 - is_on;
		
	});
	
	$("#roll_d4").click(function(){ dice_roll(); });
	$("#roll_d6").click(function(){ dice_roll(); });
	$("#roll_d6").click(function(){ dice_roll(); });
	$("#roll_d10").click(function(){ dice_roll(); });
	$("#roll_d4").click(function(){ dice_roll(); });
	$("#roll_d4").click(function(){ dice_roll(); });
	$("#roll_d4").click(function(){ dice_roll(); });
	
});