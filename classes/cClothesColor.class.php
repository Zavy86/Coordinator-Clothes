<?php
/**
 * Clothes - Color
 *
 * @package Coordinator\Modules\Clothes
 * @author  Manuel Zavatta <manuel.zavatta@gmail.com>
 * @link    http://www.zavynet.org
 */

/**
 * Clothes Color class
 */
class cClothesColor{

 /** Properties */
 protected $color;
 protected $code;
 protected $name;
 protected $icon;
 protected $label;
 protected $family_code;
 protected $family_name;

 /**
  * Debug
  *
  * @return object Clothes Color object
  */
 public function debug(){return $this;}

 /**
  * Clothes Color class
  *
  * @param integer $color Clothes Color code
  * @return boolean
  */
 public function __construct($color){
  // get available colors
  $available_color=api_clothes_availableColors();
  // check if color is in array
  if(in_array(strtolower($color),$available_color)){return false;}
  // set properties
  $this->color=stripslashes($available_color[strtolower($color)]);
  $this->code=strtolower($color);
  $this->name=api_text("color-".$this->code);
  $this->icon=api_icon("fa-square",$this->code,null,"color:".$this->color);
  $this->label=$this->icon." ".$this->name;
  if(strpos($color,"-")===FALSE){$this->family_code=$this->code;}
  else{$this->family_code=strtolower(substr($this->code,0,strpos($this->code,"-")));}
  $this->family_name=api_text("color-".$this->family_code);
  return true;
 }

 /**
  * Get
  *
  * @param string $property Property name
  * @return string Property value
  */
 public function __get($property){return $this->$property;}

}
?>