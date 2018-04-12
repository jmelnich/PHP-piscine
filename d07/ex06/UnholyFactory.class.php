<?php
class UnholyFactory {
	private $arrFighters = array();
	public function absorb($class) {
		$classParent = get_parent_class($class);
		$className = get_class($class);
		if($classParent !== 'Fighter') {
			print ("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		} 
		else if (!in_array($class, $this->arrFighters)){
			$this->arrFighters[$class->getType()] = $class;
			print("(Factory absorbed a fighter of type " . $class->getType() . ")" . PHP_EOL);
		} else {
			print("(Factory already absorbed a fighter of type " . $class->getType() . ")". PHP_EOL);
		}
	}
	public function fabricate($rf) {
		if (!isset($this->arrFighters[$rf])) {
			print("(Factory hasn't absorbed any fighter of type " . $rf . ")" . PHP_EOL);
		}
		else {

			print("(Factory fabricates a fighter of type " . $rf . ")" . PHP_EOL);
			return $this->arrFighters[$rf];
		}
	}
}
?>