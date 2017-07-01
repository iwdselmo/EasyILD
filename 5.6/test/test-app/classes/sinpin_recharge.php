<?php
	class AgentReCharge extends SinpinBase {
		protected $fields = '', $request = '';
		protected $apikey = '', $username = '', $password = '';
		
		public function process()  {
			try {
				$ch = curl_init();
				
				curl_setopt($ch, CURLOPT_URL,"http://webservice.sinpin.com/". $this->request);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "apiKey=". $this->apikey ."&Username=". $this->username ."&Password=". $this->password . $this->fields);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				
				$server_output = curl_exec ($ch);
				
				curl_close ($ch);
				
				return $server_output;
			} catch (Exception $e) {	
				die(json_encode(array('error' => $e->getMessage())));
			}
		}
	}
?>