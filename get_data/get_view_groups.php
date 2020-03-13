<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_view_groups.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_view_groups.php, Ver 3.03, 2011-Aug-Thu 04:00:21  
*/

/**
 * Information about
 * $cmr->query[0] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->output[0] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->email["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$table_name = "groups";
$column_id = "id";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "" . $table_name . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_" . $table_name . $cmr->get_ext("conf"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$check_action = get_post("check_action");
$num_view = get_post("num_view");
$module_name = get_post("class_module");

$array_check = array();
$list_check = "''";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
if($module_name){
$file_list[] = $module_name;
$file_list[] = $cmr->get_path("module") . $module_name;
$file_list[] = $cmr->get_path("index") . $module_name;
}
$file_list[] = $cmr->get_path("module") . "modules/view_" . $table_name . ".php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_" . $table_name . ".php";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$count = 0;
while($count <= $num_view){
 $val_check = get_post("" . $table_name . "_check_" . $count);
	if(strlen($val_check)){
  		$list_check .= ", '" . cmr_escape($val_check) . "'";
  		$array_check[] = cmr_escape($val_check);
		}
 $count++;
}

$cmr->post_var["id_" . $table_name] = $list_check;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!





// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*
Creating the appropriate SQL string for  groups
*/
switch ($check_action){
	
    case "update";
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$i_col = 1;
		$array_column = array();
		$one_column = $cmr->config["column" . $i_col . "_" . $table_name];
		while ((isset($cmr->config["column" . $i_col . "_" . $table_name])) && ($i_col <= 100)){
			$array_column[] = $cmr->config["column" . $i_col . "_" . $table_name];
		 $i_col++;
		}
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$array_column = array_unique($array_column);
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$array_new_value = array();
		$count = 0;
		while($count <= $num_view){
		$val_check = get_post("" . $table_name . "_check_" . $count);
		if(strlen($val_check))
			foreach($array_column as $key => $one_column){
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			 $array_new_value[$val_check][$one_column] = get_post("" . $table_name . "_" . $count . "_" . $one_column);
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			}
		$count++;
		}
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->query = array();
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->action["table_name"] = "" . $table_name;
		$cmr->action["column"] = "";
		$cmr->action["action"] = "update";
		$cmr->action["where"] = $cmr->where_query();
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		foreach($array_new_value as $key => $value){
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$array_id["key"] = $column_id;
			$array_id["value"] = $key;
            $cmr->query[] = cmr_query_update($value, $array_id, $key, $cmr->config["cmr_table_prefix"] . $table_name, $cmr->action["where"]);
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		}
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			
    break;
        
        
        
    case "delete";
		$id_groups = get_post("id_groups");
		
		/*
		Creating the appropriate SQL string for  delete_group
		*/
		$group_name = $cmr->get_column("cmr_group", "name", "id", $id_groups);
		
		if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
		$cmr->query[0] = "delete from  " . $cmr->get_conf("cmr_table_prefix") . "groups  where  id = '" . cmr_escape($id_groups) . "';";
		$cmr->query[1] = "delete from  " . $cmr->get_conf("cmr_table_prefix") . "user_groups where  group_name = '" . cmr_escape($group_name) . "';";
		$cmr->query[2] = "delete from  " . $cmr->get_conf("cmr_table_prefix") . "father_groups where  group_father = '" . cmr_escape($group_name) . "';";
		$cmr->query[3] = "delete from  " . $cmr->get_conf("cmr_table_prefix") . "father_groups where  group_chield = '" . cmr_escape($group_name) . "';";
		}
		/*
		Creating the appropriate Message to be send to the administrator
		*/
		
		$cmr->email["headers_severity"] = 3;
		$cmr->email["headers_to"] = "" . $cmr->get_conf("cmr_log_name") . " <" . $cmr->get_conf("cmr_log_email") . ">\r\n";
		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
		// $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"]." <".$cmr->config["cmr_cc_email"].">\r\n";
		// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"]." <".$cmr->config["cmr_bcc_email"].">\r\n";
		//$cmr->email["headers_bcc"] = "" . $cmr->config["cmr_from_name"] . " <" . $cmr->get_conf("cmr_admin_email") . ">\r\n";r->config["cmr_bcc_email"] . ">\r\n";
		
		$cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ":  " . $cmr->translate("deleted") . "  group";
		$cmr->email["message"] = $cmr->translate("group") . " [$group_name]" . $cmr->translate("was_delete group by ") . " : " . $cmr->get_user("auth_email") . "\n\n\n";
		$cmr->email["message"] .= $cmr->translate("group") . "  " . $cmr->translate("delete_success") . "  " . $cmr->translate("thanks") . "  --\n";
		$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
		
		/*
		Creating the appropriate Message to be view for confirmation
		*/
		$cmr->output[0] = "<p><b>" . $cmr->translate("group") . "  [$group_name]" . $cmr->translate("delete_success") . " </b><br /><br /> " . $cmr->translate("thanks") . "  --<br /></p>";
		/*
		Select next module to be run
		*/
		// $cmr->page["middle1"] = "run_result.php";
		
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "groups', '" . cmr_escape($id_groups) . "' ,'delete'");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
		$cmr->page["middle2"] = $mod->path;
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//      $list_check = $cmr->tranlete("No object selected");
// 		if($array_check) $list_check = "";
// 		foreach($array_check as $key => $value){
// 		if($value){
// 		$object = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . $table_name, "name,state,level", "" . $column_id, $value);
// 		if(empty($object)) $object = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . $table_name, "*", "" . $column_id, $value);
// 		$object_explode = implode($object , "|");
// 		$list_check .= "<br />" . substr($object_explode, 0, 50);
// 		}
// 		}
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        break;
        
    case "policy":
        break;
        
    case "comment":
        break;


    case "select":
    case "view":
    case "print":
    case "filter":
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->action["table_name"] = "" . $table_name;
		$cmr->action["column"] = "";
		$cmr->action["action"] = "select";
		$cmr->action["where"] = $cmr->where_query();
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$data["valid"] = $cmr->action["where"];
		$data["sql_where"] = $column_id . " IN (" . $list_check . ")";
		$cmr->query[$table_name] = sql_run("query", "", "select", "", $cmr->config["db_name"], $cmr->config["cmr_table_prefix"] . $table_name, "*", "", "", "", "", "", $data);
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	    $cmr->post_var["sql"] = $cmr->query[0];
// 	    $cmr->page["middle1"] = $cmr->get_path("module") . "modules/admin/preview_sql.php";
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    break;
        
    default:		
	$cmr->page["middle1"] = cmr_good_file($file_list);
    break;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
switch ($check_action){
    case "update";
    case "delete";
	if(strlen($list_check) > 2){
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . $table_name . "', '" . cmr_escape($list_check) . "' ,'" . $check_action . "'");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		/*
		Creating the appropriate notification Message to be send to the administrator group
		*/
		file_exists($cmr->config["notify_view_" . $table_name]) ? $templates_notify = $cmr->config["notify_view_" . $table_name] : $templates_notify = $cmr->good_file("notify",  "" . $table_name);
		$cmr->notify = $cmr->load_notify($templates_notify, "" . $table_name, "action_view");
		
		$cmr->output[0] = $cmr->notify["to_page"];
		$cmr->output[1] = $cmr->notify["to_log"];
		$cmr->email = $cmr->notify["to_email"];
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	   }else{
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->page["middle1"] = cmr_good_file($file_list);
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	   }
        break;
        
        case "policy":
		$cmr->output[0] = code_link($cmr->config, $cmr->page, $cmr->language, "modules/new_policy.php?table_name=" . $table_name . "&line_id=" . $list_check, "", $cmr->translate(" Click here to continue "), "", "", "", " class=\"link\" ");
		$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
        break;
        
        case "comment":
		$cmr->output[0] = code_link($cmr->config, $cmr->page, $cmr->language, "modules/new_comment.php?table_name=" . $table_name . "&line_id=" . $list_check, "", $cmr->translate(" Click here to continue "), "", "", "", " class=\"link\" ");
		$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
        break;

	    case "select":
	    case "view":
	    case "print":
	    case "filter":
// 	    $cmr->page["middle1"] = $cmr->get_path("module") . "modules/admin/preview_sql.php";
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$file_list = array();
		$file_list[] = $cmr->get_path("module") . "modules/view_" . $table_name . ".php";
		$file_list[] = $cmr->get_path("module") . "modules/auto/view_" . $table_name . ".php";
		
		$file_path = cmr_good_file($file_list);
		if(file_exists($file_path)) $cmr->page["middle1"] = $file_path;
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        break;
        
    default:		
	/*
	Select next module to be run
	*/
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->page["middle1"] = cmr_good_file($file_list);
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    break;
}

	

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
