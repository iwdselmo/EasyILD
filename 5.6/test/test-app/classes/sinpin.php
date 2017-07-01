<?php
	class Sinpin {
		public static function RateLookUp($get) {
			$AgentRateLookUp = new AgentRateLookUp($get); 
	
			return $AgentRateLookUp->process();
		}
		
		public static function ReCharge($get) {
			$AgentReCharge = new AgentReCharge($get); 
			
			return $AgentReCharge->process();
		}
		
		public static function AccountBalance($get) {
			$AgentAccountBalance = new AgentAccountBalance($get); 
			
			return $AgentAccountBalance->process();
		}
	} 
?>