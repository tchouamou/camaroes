<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * download.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.




download.php, Ver 3.03 
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
// $division->module["name"]= $cmr->get_module("name");
$division->module["title"] = $cmr->translate("download");
// $division->module["text"] = "";




print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/download.php?conf_name=conf.d/modules/conf_download.ini&refresh=", 1);;
$lk->add_link("modules/upload.php?conf_name=conf.d/modules/conf_upload.ini&refresh=", 1);

print($lk->open_module_tab(0));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($cmr->module["base_name"]));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
<div id="download_div">
 <?php  print($cmr->translate("from"));?>:
	<select class="select_class" name="destination"  id="destination" onchange="link_conf('destination','current_destination');" width="200">
	<?php 
		print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "name,state", "column", $cmr->config["db_name"], "name", $cmr->config["cmr_max_view"], "name", "35") );
		print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email,state", "column", $cmr->config["db_name"], "email", $cmr->config["cmr_max_view"], "email", "35") );
	?>
	</select>
<?php

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$auth_group = $cmr->get_user("auth_group");
$auth_uid = $cmr->get_user("auth_uid");
$current_destination = get_post("current_destination");
if($current_destination){
	if(cmr_search("@", $current_destination)){
		$auth_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "email", $current_destination);
		$auth_group = "";
	}else{
		$auth_group = get_post("current_destination");
		$auth_uid = "";
	}
}


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_path = $cmr->get_path("home") . "download/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($auth_group){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_path = $cmr->get_path("home") . "home/groups/" . $auth_group . "/download/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_path = $cmr->get_path("home") . "home/groups/" . $auth_group . "/uploaded/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_path = $cmr->get_path("home") . "home/groups/" . $auth_group . "/attach/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($auth_uid){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_path = $cmr->get_path("home") . "home/users/" . $auth_uid . "/uploaded/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_path = $cmr->get_path("home") . "home/users/" . $auth_uid . "/download/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_path = $cmr->get_path("home") . "home/users/" . $auth_uid . "/attach/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// print("<hr />" . $cmr->translate("db Download") . "<hr />");
// show_download($cmr->config, $cmr->db_connection, $cmr->get_conf("cmr_table_prefix") . "download", true);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
</div> 
<?php
print($lk->close_module_tab());
print($division->close());
?>
