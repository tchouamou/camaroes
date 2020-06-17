<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_tree.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_tree_db.php,Ver 3.0  2011-Sep 22:32:40  
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(fopen("PEAR.php", "r", TRUE) && fopen("DB.php", "r", TRUE))){
    include($cmr->get_path("module") . "modules/admin/login_db.php");
    return 0;
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr_data = cmr_db_init_data($cmr->db_connection, $cmr->config, $cmr->post_var, $cmr->db, $result_type)
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$val_table = array();
if(empty($cmr->post_var["current_dbms"])) $cmr->post_var["current_dbms"] = $cmr->get_conf("db_type");
if(empty($cmr->post_var["current_database"])) $cmr->post_var["current_database"] = $cmr->get_conf("db_name");
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
$database = $cmr->post_var["current_database"];
$table_name = $cmr->post_var["current_table"];
$base_name = $mod->base_name;
$val_table["_database_"] = $database;
$val_table["_table_"] = $table_name;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_template($cmr->themes);
// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->module_link("modules/database/login_db.php", "", $cmr->translate("DBMS"));
$division->module["title"] .= " => " . $cmr->module_link("modules/database/databases.php?current_dbms=" . $cmr->post_var["current_dbms"], "", $cmr->post_var["current_dbms"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/tables.php?current_database=" . $cmr->post_var["current_database"], "", $cmr->post_var["current_database"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"], "", $cmr->post_var["current_table"]);
// $division->module["text"] = "";
// $division->themes["text_align"] = "center";






$division->themes["header_visible"] = 1;
$division->themes["header_tools_left"] = 0;
$division->themes["header_tools_right"] = 0;
$division->themes["header_bgcolor"] = "#000000";
$division->themes["header_color"] = "#FFFFFF";
$division->themes["header_align"] = "left";
$division->themes["header_border"] = "1";
$division->themes["header_bgimage_left"] = "@";
$division->themes["header_bgimage_middle"] = "@";
$division->themes["header_bgimage_right"] = "@";
$division->themes["header_mouse_effect"] = "1";
print($division->show_noclose());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<fieldset class="bubble"><legend><?php  print($cmr->translate("links:"));?></legend>
<p align="center">
</p>
</fieldset>
<?php 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="menu_tree_db_div">
<?php 
$myDirPath = "phplayersmenu/";
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;
if(!file_exists($myDirPath . "lib/template.inc.php")) return;
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;


include_once ($myDirPath . "libjs/layersmenu-browser_detection.js"); 

include_once ($myDirPath . "lib/template.inc.php");	// taken from PHPLib
include_once ($myDirPath . "lib/layersmenu.inc.php");
include_once ($myDirPath . "lib/layersmenu-noscript.inc.php");

//$mid = new LayersMenu(140, 20, 20);
$mid = new XLayersMenu();


/* TO USE RELATIVE PATHS: */
$mid->setDirroot("./");
$mid->setLibdir($myDirPath . "lib/");
$mid->setLibjsdir($myDirPath . "libjs/");
$mid->setLibjswww($myDirPath . "/libjs/");
$mid->setImgdir($myDirPath . "images/");
$mid->setImgwww($myDirPath . "images/");
$mid->setTpldir($myDirPath . "templates/");



$mid->setDownArrowImg("down-nautilus.png");
$mid->setForwardArrowImg("forward-nautilus.png");
$mid->setForwardArrow(" --&gt;");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$menustring = "";
$menustring .= ".|Login db|index.php?module_name=modules/database/login_db.php|Login |gnome-starthere-mini.png|\n";
$menustring .= ".|Databases |index.php?module_name=modules/database/detail_dbms.php|Databases |gnome-starthere-mini.png|\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$object_database = (sql_run("array", $database_conn, "show_databases"));
if(!empty($object_database))
foreach($object_database[0] as $val_database){
	$menustring .= "..|$val_database |index.php?module_name=modules/database/detail_database.php&current_database=$val_database|$val_database |gnome-starthere-mini.png|\n";
	$object_tables = sql_run("array", $database_conn, $action = "show_tables", "", $val_database);
	if(!empty($object_tables))
	foreach($object_tables[0] as $val_tables){
		$menustring .= "...|$val_tables |index.php?module_name=modules/database/detail_table.php&current_table=$val_tables&current_database=$val_database|$val_tables |gnome-starthere-mini.png|\n";
		$object_columns = sql_run("array", $database_conn, $action = "show_columns", "", $val_database, $val_tables);
		foreach($object_columns[0] as $val_columns){
// 			$menustring .= "....|$val_columns |index.php?module_name=modules/database/update_columns.php&current_columns=$val_columns&current_table=$val_tables&current_database=$val_database|$val_columns |gnome-starthere-mini.png|\n";
		}
	}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["sql_xml"] = "0";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(file_exists($cmr->get_path("module") ."modules/database/result_sql.php")){
$menustring .= ".|DATA |index.php?module_name=modules/database/result_sql.php&sql=SELECT NOW();|NOW() |gnome-starthere-mini.png|\n";
$menustring .= ".|DATABASES |index.php?module_name=modules/database/result_sql.php&sql=SHOW DATABASES;|Databases |gnome-starthere-mini.png|\n";
$menustring .= ".|PRIVILEGES |index.php?module_name=modules/database/result_sql.php&sql=SHOW PRIVILEGES;|PRIVILEGES |gnome-starthere-mini.png|\n";
$menustring .= ".|GRANTS |index.php?module_name=modules/database/result_sql.php&sql=SHOW GRANTS;|GRANTS |gnome-starthere-mini.png|\n";
$menustring .= ".|STATUS |index.php?module_name=modules/database/result_sql.php&sql=SHOW STATUS;|STATUS |gnome-starthere-mini.png|\n";
$menustring .= ".|OPEN TABLES |index.php?module_name=modules/database/result_sql.php&sql=SHOW OPEN TABLES ;|OPEN TABLES |gnome-starthere-mini.png|\n";
$menustring .= ".|PROCESSLIST |index.php?module_name=modules/database/result_sql.php&sql=SHOW PROCESSLIST;|PROCESSLIST |gnome-starthere-mini.png|\n";
$menustring .= ".|WARNINGS |index.php?module_name=modules/database/result_sql.php&sql=SHOW WARNINGS;|WARNINGS |gnome-starthere-mini.png|\n";
$menustring .= ".|ERRORS |index.php?module_name=modules/database/result_sql.php&sql=SHOW ERRORS;|ERRORS |gnome-starthere-mini.png|\n";
$menustring .= ".|CHARACTER SET |index.php?module_name=modules/database/result_sql.php&sql=SHOW CHARACTER SET;|CHARACTER |gnome-starthere-mini.png|\n";
$menustring .= ".|VARIABLES |index.php?module_name=modules/database/result_sql.php&sql=SHOW VARIABLES;|VARIABLES |gnome-starthere-mini.png|\n";
// $menustring .= ".|PROFILES |index.php?module_name=modules/database/result_sql.php&sql=SHOW PROFILES ALL;|PROFILES |gnome-starthere-mini.png|\n";
$menustring .= ".|TRIGGERS |index.php?module_name=modules/database/result_sql.php&sql=SHOW TRIGGERS;|TRIGGERS |gnome-starthere-mini.png|\n";
$menustring .= ".|COLLATION |index.php?module_name=modules/database/result_sql.php&sql=SHOW COLLATION;|COLLATION |gnome-starthere-mini.png|\n";
$menustring .= ".|MUTEX STATUS |index.php?module_name=modules/database/result_sql.php&sql=SHOW MUTEX STATUS;|MUTEX |gnome-starthere-mini.png|\n";
$menustring .= ".|ENGINES |index.php?module_name=modules/database/result_sql.php&sql=SHOW ENGINES;|ENGINES |gnome-starthere-mini.png|\n";
$menustring .= ".|VERSION |index.php?module_name=modules/database/result_sql.php&sql=SELECT VERSION();|VERSION |gnome-starthere-mini.png|\n";
}
$menustring .= ".|Exit |index.php?conf=exit|Exit |gnome-starthere-mini.png|\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($menustring)) $menustring = "menu_tree=.|Home |index.php?conf=init|Home |gnome-starthere-mini.png|\n";
$mid->setMenuStructureString($menustring);
$mid->parseStructureForMenu("vermenu1");
$mid->newTreeMenu("vermenu1");
$mid->printTreeMenu("vermenu1"); 
?>
</div>
<?php /*close_box();*/ print($division->close());
?>

