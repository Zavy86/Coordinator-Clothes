<?php
/**
 * Clothes - Dress
 *
 * @package Coordinator\Modules\Clothes
 * @author  Manuel Zavatta <manuel.zavatta@gmail.com>
 * @link    http://www.zavynet.org
 */

/**
 * Clothes Dress class
 */
class cClothesDress{

 /** Properties */
 protected $id;
 protected $fkUser;
 protected $fkBrand;
 protected $fkTypology;
 protected $name;
 protected $description;
 protected $color_primary;
 protected $color_secondary;
 protected $addTimestamp;
 protected $addFkUser;
 protected $updTimestamp;
 protected $updFkUser;
 protected $deleted;

 protected $brand;

 /** @todo verificare
 protected $zones_array;*/

 /**
  * Debug
  *
  * @return object Clothes Dress object
  */
 public function debug(){return $this;}

 /**
  * Clothes Dress class
  *
  * @param integer $dress Clothes Dress object or ID
  * @param boolean $sub_objects Build sub objects
  * @return boolean
  */
 public function __construct($dress,$sub_objects=false){
  // get object
  if(is_numeric($dress)){$dress=$GLOBALS['database']->queryUniqueObject("SELECT * FROM `clothes_dresses` WHERE `id`='".$dress."'");}
  if(!$dress->id){return false;}
  // set properties
  $this->id=(int)$dress->id;
  $this->fkUser=(int)$dress->fkUser;
  $this->fkTypology=(int)$dress->fkTypology;
  $this->fkBrand=(int)$dress->fkBrand;
  $this->name=stripslashes($dress->name);
  $this->description=stripslashes($dress->description);
  $this->color_primary=api_clothes_color(stripslashes($dress->color_primary));
  $this->color_secondary=api_clothes_color(stripslashes($dress->color_secondary));
  $this->addTimestamp=(int)$dress->addTimestamp;
  $this->addFkUser=(int)$dress->addFkUser;
  $this->updTimestamp=(int)$dress->updTimestamp;
  $this->updFkUser=(int)$dress->updFkUser;
  $this->deleted=(int)$dress->deleted;
  // get sub objects
  if($sub_objects){
   $this->brand_obj=new cClothesBrand($this->fkBrand);
   $this->typology_obj=new cClothesTypology($this->fkTypology);
  }
  // get zones
  /*$this->zones_array=array();
  $zones_results=$GLOBALS['database']->queryObjects("SELECT * FROM `clothes_dresses_zones` WHERE `fkDress`='".$this->id."' ORDER BY `order`");
  foreach($zones_results as $zone){$this->zones_array[$zone->id]=new cClothesDressZone($zone);}*/
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