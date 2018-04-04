<?php
/**
 * Clothes Functions
 *
 * @package Coordinator\Modules\Clothes
 * @author  Manuel Zavatta <manuel.zavatta@gmail.com>
 * @link    http://www.coordinator.it
 */

// include classes
require_once(ROOT."modules/clothes/classes/cClothesDress.class.php");
require_once(ROOT."modules/clothes/classes/cClothesBrand.class.php");
require_once(ROOT."modules/clothes/classes/cClothesColor.class.php");
require_once(ROOT."modules/clothes/classes/cClothesTypology.class.php");

/**
 * Clothes - Available Colors
 *
 * @return array Available Colors
 */
function api_clothes_availableColors(){
 // definitions
 $colors_array=array();
 $colors_array["white"]="#ffffff";
 $colors_array["white-ivory"]="#fffff0";
 $colors_array["white-smoke"]="#f5f5f5";
 $colors_array["pink"]="#ffc0cb";
 $colors_array["pink-hot"]="#ff69b4";
 $colors_array["pink-deep"]="#ff1493";
 $colors_array["red"]="#ff0000";
 $colors_array["red-salmon"]="#fa8072";
 $colors_array["red-maroon"]="#800000";
 $colors_array["orange"]="#ff4500";
 $colors_array["orange-sand"]="#f4a460";
 $colors_array["orange-coral"]="#ff7f50";
 $colors_array["yellow"]="#ffff00";
 $colors_array["yellow-gold"]="#ffd700";
 $colors_array["yellow-lemon"]="#fffacd";
 $colors_array["brown"]="#8b4513";
 $colors_array["brown-wood"]="#deb887";
 $colors_array["brown-sand"]="#d2b48c";
 $colors_array["blue"]="#0000ff";
 $colors_array["blue-sky"]="#1e90ff";
 $colors_array["blue-navy"]="#000080";
 $colors_array["cyan"]="#00ffff";
 $colors_array["cyan-acquamarine"]="#7fffd4";
 $colors_array["cyan-torquoise"]="#00ced1";
 $colors_array["green"]="#008000";
 $colors_array["green-dark"]="#006400";
 $colors_array["green-lime"]="#00ff00";
 $colors_array["purple"]="#800080";
 $colors_array["purple-lavanda"]="#e6e6fa";
 $colors_array["purple-violet"]="#8a2be2";
 $colors_array["gray"]="#808080";
 $colors_array["gray-light"]="#dcdcdc";
 $colors_array["gray-dark"]="#606060";
 $colors_array["black"]="#000000";
 $colors_array["black-shadow"]="#1a1a1a";
 $colors_array["black-smoked"]="#333333";
 // return
 return $colors_array;
}

/**
 * Clothes - Dresses
 *
 * @param boolean $deleted Show deleted dresses
 * @return array Locations objects
 */
function api_clothes_dresses($deleted=false){
 // definitions
 $dresses_array=array();
 // get dresses objects
 $dresses_results=$GLOBALS['database']->queryObjects("SELECT * FROM `clothes_dresses` ORDER BY `name`",$GLOBALS['debug']); /** @todo definire ordine di default */
 foreach($dresses_results as $dress){
  if(!$deleted && $dress->deleted){continue;}
  $dresses_array[$dress->id]=new cClothesDress($dress);
 }
 // return
 return $dresses_array;
}

?>