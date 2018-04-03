<?php
/**
 * Clothes - Template
 *
 * @package Coordinator\Modules\Clothes
 * @author  Manuel Zavatta <manuel.zavatta@gmail.com>
 * @link    http://www.zavynet.org
 */
 // check authorizations /** @todo fare API */
 if($authorization){if(!api_checkAuthorization(MODULE,$authorization)){api_alerts_add(api_text("alert_unauthorized",array(MODULE,$authorization)),"danger");api_redirect("?mod=clothes&scr=dashboard");}}
 // build html object
 $html=new cHTML($module_name);
 // build nav object
 $nav=new cNav("nav-tabs");
 $nav->setTitle(api_text("clothes"));
 // dashboard
 $nav->addItem(api_icon("fa-th-large",null,"test hidden-link"),"?mod=clothes&scr=dashboard");
 // dresses
 if(substr(SCRIPT,0,7)=="dresses"){
  // list
  $nav->addItem(api_text("nav-dresses-list"),"?mod=clothes&scr=dresses_list");
  // selected dress /** @todo integrare bene */
  if($dress_obj->id && in_array(SCRIPT,array("dresses_view","dresses_edit"))){
   // dress operations
   $nav->addItem(api_text("nav-operations"),null,null,"active");
   $nav->addSubItem(api_text("nav-dresses-operations-edit"),"?mod=clothes&scr=dresses_edit&idDress=".$dress_obj->id);
  }
 }
 // management
 if(api_checkAuthorization(MODULE,"clothes-manage")){
  $nav->addItem(api_text("nav-management"));
  $nav->addSubItem(api_text("brands_list"),"?mod=clothes&scr=brands_list");
 }
 // add nav to html
 $html->addContent($nav->render(false));
?>