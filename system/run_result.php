<?php
defined("cmr_online") or die("Application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * run_result.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










run_result.php,  2011-Oct
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->module["name"] = $mod->name;
$division->module["base_name"] = strtolower(substr($mod->name, 0, strrpos($mod->name, ".")));
// $division->module["text"] = "";
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
$division->module["title"] = date("l d, M Y"); 
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_@_table_@_title1"] = ""; 
$division->prints["match_@_table_@_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_@_table_@_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_@_table_@_title2"] = $cmr->translate($mod->base_name . "_title");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/template_run_result" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/template_run_result" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/template_run_result" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_close_windows"] = $division->close(); 

$division->prints["match_execute_query"] = ""; 
$division->prints["match_result_query"] = ""; 
$division->prints["match_output_message"] = ""; 

// $division->prints["match_execute_query"] .= $mod->sql_run($cmr->query, $cmr->output, $cmr->session, $cmr->db_connection);
// ============ ".action_db." ==============
if(empty($cmr->output[0])) $cmr->output[0] = "";
$count=0;
$cmr->action["affected_rows"] = 0;
while(isset($cmr->query[$count])){
 if(!empty($cmr->query[$count])){
	 if((substr(strtolower(trim($cmr->query[$count])),0,7) != "select ") && ($cmr->session["type"] == "read_only")){
// 		 $division->prints["match_execute_query"] .= "("<br />" . $cmr->translate("can not be run, read only user!"));
		 $division->prints["match_execute_query"] .= ("<br />" . $cmr->translate("read_only_user"));
		 }else{
//     $division->prints["match_execute_query"] .= "("<br /><b>".$cmr->translate("query")."(".$count."):</b>" . substr($cmr->query[$count], 0, 25) . "   ....<br />");
    $result_query = sql_run("result", $cmr->db_connection, "sql", $cmr->query[$count]);
//     $result_query = &$cmr->db_connection->Execute($cmr->query[$count]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg()); // or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
	    if($result_query) 
	    {
		    $cmr->db["affected_row"][$count] = $result_query->RecordCount();;
		    $cmr->action["affected_rows"] += $cmr->db["affected_row"][$count];
		}
	}
	
}
    $count++;
}
// ============ ".action_db." ==============

// $division->prints["match_result_query"] .= $mod->run_message($cmr->query, $cmr->db, $cmr->session, $cmr->output, $cmr->db_connection);
// =======================
if(!empty($cmr->db["result"][0])){
    //  Query to be run 
    // if( (!cmr_searchi("^search", $cmr->form))&&($cmr->form !="report_periodic"))
	    if(isset($cmr->query[0]) && ($cmr->query[0])){
	        // ----successo------------------
	        $division->prints["match_result_query"] .= ("<br /><b>" . $cmr->translate("action_db_success") . ".</b><br />");
	        $division->prints["match_result_query"] .= ("<br /><b>" . $cmr->action["affected_rows"] . " " . $cmr->translate("affected_rows") . ".</b><br />");
	        // --log action-----
	        $cmr->event_log("Script=" . __FILE__ . " : " . $cmr->translate("action_db") . " : " . substr($cmr->output[1], 0, 80));
	    } //--------fallito-----------
	    else { 
	        $division->prints["match_result_query"] .= ("<br /><span class=\"blink\"> " . $cmr->translate("no_write_db") . "  .</span><br />");
	        // --log action-----
	        $cmr->event_log("Script=" . __FILE__ . " : " . $cmr->translate("no_write_db") . " : " . substr($cmr->output[1], 0, 80));
	    };
}
// =======================



// $division->prints["match_output_message"] .= $mod->output_text($cmr->output);
// =======================
if(!empty($cmr->output[0])){
    // Text to be write 
    // -- run result (preview) from loader_get.php ---------
    $division->prints["match_output_message"] .= ("<pre>" . html_control(wordwrap(substr($cmr->output[0], 0, 10000), 100, "\n")) . "</pre>");
}
// =======================
$division->print_template("template1");


// $mod->action_run($cmr->output);
// =======================
if(empty($cmr->output[1])) $cmr->output[1] = $cmr->output[0];
// =======================
if(($cmr->get_action("form_action_run"))){
$division->print_template("template2");
    // Script to be run 
	if(cmr_match_include($division->template, "match_include1")) 
    print(eval($cmr->get_action("form_action_run")));
$division->print_template("template3");
}
// =======================
 

// $mod->action_include($cmr->query, $cmr->action);
// =======================
if(($cmr->get_action("form_action_include"))){
    // Script to be include 
$division->print_template("template2");
	if(file_exists($cmr->get_action("form_action_include"))) 
	if(cmr_match_include($division->template, "match_include2")) 
    include($cmr->get_action("form_action_include"));
$division->print_template("template3");
}
// =======================


// // $mod->send_email($cmr->email, $cmr->post_files);
// =======================
if((!empty($cmr->email["subject"])) && (!empty($cmr->email["message"]) && (!empty($cmr->config["cmr_use_email"])))){
$division->print_template("template2");
	if(cmr_match_include($division->template, "match_include3")) 
	include($cmr->get_path("index") . "system/generate/email.php");
$division->print_template("template3");
}
// =======================


// $mod->sincronise($cmr->query, $cmr->db, $cmr->db_connection);

// =======================
if(!empty($cmr->db["result"][0])) 
if(!empty($cmr->query[0]) && ($cmr->get_conf("cmr_sincronisation"))){	
$division->print_template("template2");
    // usefull for sincronisation use 
	@ list($type_migration, $migration) = explode("|", $cmr->get_conf("cmr_sincronisation"));
	if(!empty($migration)) 
	if(file_exists($migration)) 
	if(cmr_match_include($division->template, "match_include4")) 
	include_once($migration);
    // usefull for sincronisation use 
$division->print_template("template3");
}
// =======================




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template4");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// =======================
 $cmr->post_var["cmr_get_data"] = "";
// =======================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
