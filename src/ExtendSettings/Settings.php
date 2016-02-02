<?php

namespace ExtendSettings;

/**
 * Extendable class for setting public variables
 *
 * Buy me ramen(Paypal)! manualpayments@gmail.com
 *
 * @link       http://iautomation.us/
 * @package    DynamicHtml
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Joshua McKenzie <josh@ia.lc>
 */
class Settings {
	/**
	 * Determines if variable is public
	 * @param  string  $name variable name
	 * @return boolean       public or not
	 */
	protected function isVisible($name){
		$class = get_called_class();
		if(isset($class::$$name))return true;
		if(isset($this) and isset($this->$name))return true;
		return false;
	}
	/**
	 * Determines if variable is static
	 * @param  string  $name variable name
	 * @return boolean       static or not
	 */
	protected function isStatic($name){
		$class = get_called_class();
		if(isset($class::$$name))return true;
		return false;
	}
	/**
	 * Gets a public variable value
	 * @param  string $name variable name
	 * @return mixed        variable value
	 */
	public function &getSetting($name){
		if(!$this->isVisible($name))return null;
		$class = get_called_class();
		if($this->isStatic($name))return $class::$$name;
		else return $this->$name;
	}
	/**
	 * Sets a public variable
	 * @param string $name  variable name
	 * @param value  $value variable value
	 */
	public function setSetting($name, $value){
		if(!$this->isVisible($name))return null;
		$setting = &$this->getSetting($name);
		$setting = $value;
	}
	/**
	 * Sets muliple public variables
	 * @param array $ar array of name=>value key pairs representing the variables and their values
	 */
	public function setSettings($ar=[]){
		foreach($ar as $name=>$value)
			$this->setSetting($name, $value);
	}
}