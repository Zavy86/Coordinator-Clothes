<?php
/**
 * Clothes - Brand
 *
 * @package Coordinator\Modules\Clothes
 * @author  Manuel Zavatta <manuel.zavatta@gmail.com>
 * @link    http://www.zavynet.org
 */

/**
 * Clothes Brand class
 */
class cClothesBrand{

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
  * @return object Clothes Brand object
  */
 public function debug(){return $this;}

 /**
  * Clothes Brand class
  *
  * @param integer $brand Clothes Brand object or ID
  * @return boolean
  */
 public function __construct($brand){
  // get object
  if(is_numeric($brand)){$brand=$GLOBALS['database']->queryUniqueObject("SELECT * FROM `clothes_brands` WHERE `id`='".$brand."'");}
  if(!$brand->id){return false;}
  // set properties
  $this->id=(int)$brand->id;
  $this->name=stripslashes($brand->name);
  $this->description=stripslashes($brand->description);
  $this->addFkUser=(int)$brand->addFkUser;
  $this->updTimestamp=(int)$brand->updTimestamp;
  $this->updFkUser=(int)$brand->updFkUser;
  $this->deleted=(int)$brand->deleted;
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