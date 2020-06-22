<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_client.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_client.php,Ver 3.0  2011-Sep 22:32:40  
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->load_themes($cmr->themes);
$division->module["name"] = $mod->name; 



$division->module["title"]=cmr_search_replace("_", " ", $cmr->translate($mod->base_name));//$division->module["title"] = "Left Menu"; 
$division->module["title"] = $cmr->translate("group");
//$division->module["text"] = "";




















 
print($division->show_noclose()); 

// print("<b>");
// print($cmr->language['" . $mod->base_name . "_title']);
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->language['" . $mod->base_name . "_text']);
// print("</p>");
?>

<div id="menu_client_div"> 
<ul class="cmr_menu">




 <li>
  <a href="index.php?conf=init"><?php print($cmr->translate(" |home| "));?></a>
 </li>




<?php 
$array_modules = array();
$num_modules=0;
// $cmr->query["sql"] = "SELECT * FROM  " . $cmr->get_conf("cmr_table_prefix") . "groups WHERE ( " . $cmr->get_conf("cmr_table_prefix") . "groups.name IN (" . $cmr->get_user("auth_list_group") . "));";
// 
// $result_query = &$cmr->db_connection->query($cmr->query["sql"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// //-----------
// if($result_query)
// while ($val = $result_query->FetchNextObject(false)){
// 				$array_modules["name"][] = $val->name;
// 	  $num_modules++;
//   }; 
//-----------
// -----------
$cmr->action["table_name"] = $cmr->get_conf("cmr_table_prefix") . "groups";
$cmr->action["column"] = "name";
$cmr->action["action"] = "select";
$sql_data["valid"] = $cmr->where_query();
$sql_data["order"] = "ORDER BY name";
$result_query = sql_run("array", $cmr->db_connection, "select", "", $cmr->get_conf("db_name"), $cmr->get_conf("cmr_table_prefix") . "groups", "name", $sql_data);
// -----------
$array_modules["name"] = $result_query[0];
// -----------








$im = 0;
$num_modules = 0;
// ====================================================
sort($array_modules["name"], SORT_ASC);
// ====================================================
// ====================================================
// ====================================================
// ====================================================
    foreach ($array_modules["name"] as $key => $value){
		
		print("<li>");
		   print($cmr->module_icon($array_modules["name"][$key], "16"));
		   print(group_info_link($cmr->config, $cmr->page, $cmr->language, $array_modules["name"][$key]));
		print("</li>");
		
    };
// ====================================================
// ====================================================
// ====================================================
// ====================================================
// ====================================================

		
		print("<li>");
		   print($cmr->module_icon("modules/menu_list.php", "16") . $cmr->module_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini"));
		print("</li>");
		
?>


 <li>
  <a href="index.php?cmr_mode=logout" ><?php print($cmr->translate("|exit|"));?></a>
 </li>




</ul>
</div> 

<?php  print($division->close()); ?>
