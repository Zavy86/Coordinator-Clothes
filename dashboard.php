<?php
/**
 * Clothes - Dashboard
 *
 * @package Coordinator\Modules\Clothes
 * @author  Manuel Zavatta <manuel.zavatta@gmail.com>
 * @link    http://www.zavynet.org
 */
 // include module template
 require_once(MODULE_PATH."template.inc.php");
 // set html title
 $html->setTitle(api_text("clothes"));
 // build dashboard object
 $dashboard=new cDashboard();
 // dresses list
 $dashboard->addTile("?mod=clothes&scr=dresses_list",api_text("dashboard-dresses-list"),api_text("dashboard-dresses-list-description"),(api_checkAuthorization(MODULE,"clothes-dresses_view")),"1x1","fa-book");
 // build grid object
 $grid=new cGrid();
 $grid->addRow();
 $grid->addCol($dashboard->render(),"col-xs-12");
 // add content to html
 $html->addContent($grid->render());
 // renderize html page
 $html->render();
?>