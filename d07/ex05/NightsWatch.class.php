<?php
class NightsWatch{
	private $array = array();
	public function recruit($person){
		if(is_subclass_of($person, 'IFighter')){
			$this->$array[] = $person;
		}
	}
	
	public function fight(){
		foreach ($this->$array as $person) {
			$person->fight();
		}
	}
}
?>