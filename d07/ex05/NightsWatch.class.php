<?php
class NightsWatch{
	public function recruit($person){
	$array = new array();
		if(get_class($person) === 'IFighter'){
			$array[] = $person;
		}
	}	
	public function fight(){
		foreach ($array as $person) {
			$person->fight();
		}
	}
}
?>