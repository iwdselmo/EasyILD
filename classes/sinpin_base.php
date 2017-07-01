<?php
	class SinpinBase{
		public function __construct(array $options){
			foreach($options as $k=>$v){
				if(isset($this->$k)){
					$this->$k = $v;
				}
			}
		}
	}
?>