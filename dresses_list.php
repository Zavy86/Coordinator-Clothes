<?php
/**
 * Clothes - Dresses List
 *
 * @package Coordinator\Modules\Clothes
 * @author  Manuel Zavatta <manuel.zavatta@gmail.com>
 * @link    http://www.zavynet.org
 */
 $authorization="clothes-dresses_view";
 // include module template
 require_once(MODULE_PATH."template.inc.php");
 // definitions
 $users_array=array();
 // set html title
 $html->setTitle(api_text("dresses_list"));
 // build grid object
 $table=new cTable(api_text("dresses_list-tr-unvalued"));
 $table->addHeader("&nbsp;",null,16);
 $table->addHeader(api_text("dresses_list-th-owner"),"nowrap");
 $table->addHeader(api_text("dresses_list-th-name"),"nowrap");
 $table->addHeader(api_text("dresses_list-th-description"),null,"100%");
 $table->addHeader("&nbsp;",null,16);
 // cycle all clothes
 foreach(api_clothes_dresses(true) as $dress_obj){
  // add user to array if not exist
  if(!array_key_exists($dress_obj->fkUser,$users_array)){$users_array[$dress_obj->fkUser]=new cUser($dress_obj->fkUser);}
  // build operation button
  $ob=new cOperationsButton();
  $ob->addElement("?mod=clothes&scr=dress_edit&idLocation=".$dress_obj->id,"fa-pencil",api_text("dresses_list-td-edit"));
  if($dress_obj->deleted){$ob->addElement("?mod=clothes&scr=submit&act=dress_undelete&idLocation=".$dress_obj->id,"fa-trash-o",api_text("dresses_list-td-undelete"),true,api_text("dresses_list-td-undelete-confirm"));}
  else{$ob->addElement("?mod=clothes&scr=submit&act=dress_delete&idLocation=".$dress_obj->id,"fa-trash",api_text("dresses_list-td-delete"),true,api_text("dresses_list-td-delete-confirm"));}
  // check deleted
  if($dress_obj->deleted){$tr_class="deleted";}else{$tr_class=null;}
  // make dress row
  $table->addRow($tr_class);
  $table->addRowField(api_link("?mod=clothes&scr=dresses_view&idDress=".$dress_obj->id,api_icon("fa-search",null,"hidden-link"),api_text("dresses_list-td-view")));
  $table->addRowField($users_array[$dress_obj->fkUser]->fullname,"nowrap");
  $table->addRowField($dress_obj->name,"nowrap");
  $table->addRowField($dress_obj->description,"truncate-ellipsis");
  $table->addRowField($ob->render(),"text-right");
 }
 // build grid object
 $grid=new cGrid();
 $grid->addRow();
 $grid->addCol($table->render(),"col-xs-12");
 // add content to html
 $html->addContent($grid->render());
 // renderize html
 $html->render();
?>