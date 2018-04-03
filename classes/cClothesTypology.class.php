<?php
/**
 * Clothes - Typology
 *
 * @package Coordinator\Modules\Clothes
 * @author  Manuel Zavatta <manuel.zavatta@gmail.com>
 * @link    http://www.zavynet.org
 */

/**
 * Clothes Typology class
 */
class cClothesTypology{

 /** Properties */
 protected $id;
 protected $name;
 protected $description;
 protected $addFkUser;
 protected $updTimestamp;
 protected $updFkUser;
 protected $deleted;

 /**
  * Debug
  *
  * @return object Clothes Typology object
  */
 public function debug(){return $this;}

 /**
  * Clothes Typology class
  *
  * @param integer $typology Clothes Typology object or ID
  * @return boolean
  */
 public function __construct($typology){
  // get object
  if(is_numeric($typology)){$typology=$GLOBALS['database']->queryUniqueObject("SELECT * FROM `clothes_typologies` WHERE `id`='".$typology."'");}
  if(!$typology->id){return false;}
  // set properties
  $this->id=(int)$typology->id;
  $this->name=stripslashes($typology->name);
  $this->description=stripslashes($typology->description);
  $this->addFkUser=(int)$typology->addFkUser;
  $this->updTimestamp=(int)$typology->updTimestamp;
  $this->updFkUser=(int)$typology->updFkUser;
  $this->deleted=(int)$typology->deleted;
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