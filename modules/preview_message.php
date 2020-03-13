<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_message.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.





Notice: Undefined index: match_list_link1 in C:\Users\Eric\Desktop\camaroes\modules\preview_message.php on line 149

Notice: Undefined variable: result_mess in C:\Users\Eric\Desktop\camaroes\modules\preview_message.php on line 191

Notice: Undefined index: comment in C:\Users\Eric\Desktop\camaroes\modules\preview_message.php on line 224


Notice: Undefined index: match_list_link in C:\Users\Eric\Desktop\camaroes\function\func_output.php(123) : regexp code on line 1

 
 






















preview_message.php,Ver 3.0  2011-Jul-Thu 09:15:12
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_comment.php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_message")) $cmr->post_var["id_message"] = get_post("id_message");
if(empty($cmr->post_var["id_message"])) $cmr->post_var["id_message"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "message", "id");
if(empty($cmr->post_var["id_message"])){
	print($cmr->translate("No message selected! clic here => "));
	print($cmr->module_link("modules/view_message.php?conf_name=conf_message" . $cmr->get_ext("conf") . "&id_message=", 1));
	print($cmr->translate(" to select one."));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;



$division->module["title"]= $cmr->translate($mod->base_name); 
// $division->module["text"] = "";





// 












$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_class_div"] = "preview_message_div";

$division->prints["match_preview_message_title1"] = ""; 
$division->prints["match_preview_message_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_preview_message_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_preview_message_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/reply_message.php?conf_name=conf.d/modules/conf_reply_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/search_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/preview_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/report_message.php?id_message=".$cmr->post_var["id_message"]."&layer=2", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(3);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/email_message.php?conf_name=conf.d/modules/conf_email_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/message_from_model.php?conf_name=conf.d/modules/conf_message_from_model.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$division->prints["match_link_list"] = $lk->list_link();
$division->prints["match_list_link"] = $lk->list_link();

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/view_my_message.php?conf_name=conf.d/modules/conf_my_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/view_received_message.php?conf_name=conf.d/modules/conf_received_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/view_unread_message.php?conf_name=conf.d/modules/conf_unread_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/view_sended_message.php?conf_name=conf.d/modules/conf_sended_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/view_current_message.php?conf_name=conf.d/modules/conf_current_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/view_date_message.php?conf_name=conf.d/modules/conf_date_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$lk->add_link("modules/view_model_message.php?conf_name=conf.d/modules/conf_model_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
$division->prints["match_list_link1"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "message";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------
// $cmr->query["preview"] = "SELECT * FROM  " . $cmr->get_conf("cmr_table_prefix") . "message  ";
// $cmr->query["preview"] .=" WHERE (id = " . sprintf("'%s'", cmr_escape($cmr->post_var["id_message"]));
// $cmr->query["preview"] .= ")  ";
// $cmr->query["preview"] .= " AND " . $cmr->action["where"];

// // -----------
// $cmr->db["result"]["preview"] = &$cmr->db_connection->Execute($cmr->query["preview"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// -----------

$GLOBALS["current_message_id"] = $cmr->post_var["id_message"];
//----------
$pdf_data_text = "";
//----------

// $result_mess = cmrdb_fetch_object($cmr->db["result"]["preview"]) ;
$result_value = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "message", "*", "id", $cmr->post_var["id_message"]);

if($result_value["id"]) $cmr->post_var["id_message"] = $result_value["id"];


//----------
$pdf_data_text .= "\n:" . $result_value["date_time"] ."\:" . $result_value["title"] . "\n:\n" . serialize ($result_value) .  "\n===========================\n";
//----------

// show_hide("header", "begin", 0);
  $division->prints["match_legend_header"] = $cmr->translate("header");
  $division->prints["match_legend_allow"] = $cmr->translate("allow");
    
  $division->prints["match_label_id"] = $cmr->translate("id");  
  $division->prints["match_value_id"] = $result_value["id"];
  $division->prints["match_label_date_time"] = $cmr->translate("date_time");  
  $division->prints["match_value_date_time"] = date_time_link($cmr->config, $cmr->page, $cmr->language, strval($result_value["date_time"]));
  $division->prints["match_label_sender"] = $cmr->translate("sender");  
  $division->prints["match_value_sender"] = user_info_link($cmr->config, $cmr->page, $cmr->language, $result_value["sender"]);
  
  $division->prints["match_legend_route"] = $cmr->translate("route");
  $division->prints["match_label_groups_dest"] = $cmr->translate("groups dest");  
  $division->prints["match_value_groups_dest"] = list_group_link($cmr->config, $cmr->page, $cmr->language, $result_value["groups_dest"]);
  $division->prints["match_label_users_dest"] = $cmr->translate("users dest");  
  $division->prints["match_value_users_dest"] = list_user_groups_link($cmr->config, $cmr->page, $cmr->language, $result_value["users_dest"]);
  $division->prints["match_label_modules_dest"] = $cmr->translate("modules dest");  
  $division->prints["match_value_modules_dest"] = $cmr->module_link($result_value["modules_dest"]);
// show_hide("header", "end", 0);
  $division->prints["match_legend_text"] = $cmr->translate("text");
  $division->prints["match_label_title"] = $cmr->translate("title");  
  $division->prints["match_value_title"] = $result_value["title"];
  $division->prints["match_value_text"] = wordwrap(htmlentities($result_value["text"], 100));
  $division->prints["match_legend_attach"] = $cmr->translate("attach");
  $division->prints["match_value_attach"] = "";
  if($result_value["attach"]){
  $division->prints["match_value_attach"] = list_attach_link($result_value["attach"], "", ", ");
  }
// show_hide("comment", "begin", 0);
  $division->prints["match_label_comment"] = $cmr->translate("comment");
  $division->prints["match_value_comment"] =  "";// wordwrap($result_value["comment"], 100);
  $division->prints["match_comment_hidden"] = input_hidden("<input type=\"hidden\" name=\"cmr_get_data\" value=\"comment\" />");
  $division->prints["match_comment_hidden_id"] = input_hidden("<input type=\"hidden\" name=\"id_message\" value=\"" . $result_value["id"] . "\" />");
  $division->prints["match_comment_submit"] = $cmr->translate("add comment");
        
// show_hide("comment", "end", 0);
    print("<br \>");
// show_hide("property", "begin", 0);
  $division->prints["match_legend_scheduling"] = $cmr->translate("scheduling");
  $division->prints["match_label_begin_time"] = $cmr->translate("begin_time");  
  $division->prints["match_value_begin_time"] = date_time_link($cmr->config, $cmr->page, $cmr->language, strval($result_value["begin_time"]));
  $division->prints["match_label_end_time"] = $cmr->translate("end_time");  
  $division->prints["match_value_end_time"] = date_time_link($cmr->config, $cmr->page, $cmr->language, strval($result_value["end_time"]));
  $division->prints["match_label_intervale"] = $cmr->translate("intervale");  
  $division->prints["match_value_intervale"] = $result_value["intervale"];
  $division->prints["match_legend_properties"] = $cmr->translate("properties");
  $division->prints["match_legend_info"] = $cmr->translate("info");
  $division->prints["match_label_priority"] = $cmr->translate("priority");  
  $division->prints["match_value_priority"] = $result_value["priority"];
  $division->prints["match_label_type"] = $cmr->translate("type");  
  $division->prints["match_value_type"] = $result_value["type"];
  $division->prints["match_label_state"] = $cmr->translate("state");  
  $division->prints["match_value_state"] = $result_value["state"];
  $division->prints["match_label_my_master"] = $cmr->translate("my_master");  
  $division->prints["match_value_my_master"] = $result_value["my_master"];
    if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
  $division->prints["match_legend_allow"] = $cmr->translate("allow");
//   $division->prints["match_label_allow_type"] = $cmr->translate("allow_type");  
//   $division->prints["match_value_allow_type"] = $result_value["allow_type"];
//   $division->prints["match_label_allow_email"] = $cmr->translate("allow_email");  
//   $division->prints["match_label_allow_groups"] = $cmr->translate("allow_groups");  
    }
// show_hide("property", "end", 0);
// show_hide("email", "begin", 0);
  $division->prints["match_legend_mail"] = $cmr->translate("mail to");
  $division->prints["match_label_title"] = $cmr->translate("title");  
  $division->prints["match_value_title"] = $result_value["title"];
  $division->prints["match_label_mail_from"] = $cmr->translate("from");  
  $division->prints["match_value_mail_from"] = list_user_groups_link($cmr->config, $cmr->page, $cmr->language, $result_value["sender"]);
  $division->prints["match_label_mail_to"] = $cmr->translate("to");  
  $division->prints["match_value_mail_to"] = list_user_groups_link($cmr->config, $cmr->page, $cmr->language, $result_value["mail_to"]);
  $division->prints["match_label_mail_cc"] = $cmr->translate("cc");  
  $division->prints["match_value_mail_cc"] = list_user_groups_link($cmr->config, $cmr->page, $cmr->language, $result_value["mail_cc"]);
    
  $division->prints["match_label_mail_text"] = $cmr->translate("mail text");  
  $division->prints["match_value_mail_text"] = $result_value["text"];
  
    if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")) 
  $division->prints["match_label_mail_bcc"] = $cmr->translate("bcc");  
  $division->prints["match_value_mail_bcc"] = list_user_groups_link($cmr->config, $cmr->page, $cmr->language, $result_value["mail_bcc"]);
    
// show_hide("email", "end", 0);
// --------------------

$division->prints["match_pdf_title"] = $cmr->translate("message") . ":[" . $result_value["title"] . "]";
$division->prints["match_pdf_author"] = $cmr->get_user("auth_email");
$division->prints["match_pdf_file"] = "";
$division->prints["match_pdf_links"] = "";
$division->prints["match_pdf_data_type"] = "text";
$division->prints["match_pdf_dim_col"] = "0";
$division->prints["match_pdf_header"] = "[" . $result_value["title"] . "]";

$division->prints["match_pdf_data"] = wordwrap(htmlentities($pdf_data_text, 80));
$division->prints["match_pdf_confirm"] = $cmr->translate("confirm");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ------readed----
if(empty($GLOBALS["message_read"])) $GLOBALS["message_read"] = array();
    $GLOBALS["current_message_id"] = $result_value["id"];
if(!in_array ($result_value["id"], $GLOBALS["message_read"])){
    $cmr->db_connection->Execute("INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "history (id, user_email, table_name, line_id, action, date_time) VALUES ('', '" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "message', '" . $result_value["id"] . "' ,'read'");
    $cmr->post_var["current_message_id"] = $cmr->post_var["id_message"];
    array_push ($GLOBALS["message_read"], $result_value["id"]);
}


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
$division->prints["message_story"] = $cmr->translate("Story of message ") . " [" . $result_value["title"] . "]";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_message_id"] = $cmr->post_var["id_message"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_preview_message" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_preview_message" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_preview_message" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_preview_message" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);

$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template2");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template3");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!








// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "comment";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Comment of message ") . " [" . $result_value["title"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List comment of message ") . " [" . $result_value["title"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "comment ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (";
$cmr->query[$cmr->action["table_name"]] .= " (line_id = '" . $cmr->post_var["id_message"] . "') ";
$cmr->query[$cmr->action["table_name"]] .= " AND (table_name = '" . $cmr->get_conf("cmr_table_prefix") . "message') ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_detail";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 50;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module")."modules/view_comment.php";
$file_list[] = $cmr->get_path("module")."modules/auto/view_comment.php";

$view_comment_file = cmr_good_file($file_list);
if(file_exists($view_comment_file))  if(cmr_match_include($division->template, "match_include1")) include($view_comment_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ------story--------

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "message";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Story of message ") . " [" . $result_value["title"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Story of message ") . " [" . $result_value["title"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "message ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (((id!='" . $cmr->post_var["id_message"] . "') AND (my_master = '" . $cmr->post_var["id_message"] . "')) ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_detail";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 50;
}



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_message.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_message.php";
$view_message_file = cmr_good_file($file_list);

if(file_exists($view_message_file)) if(cmr_match_include($division->template, "match_include2")) include($view_message_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->action["table_name"] = "message";
// $cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Analyse of " . $cmr->action["table_name"]);
// $cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Procedure analyse of " . $cmr->action["table_name"]);;
// $cmr->action[$cmr->action["table_name"] . "_title2"] = "";
// $cmr->action["column"] = "";
// $cmr->action["action"] = "select";
// $cmr->action["where"] = $cmr->where_query();
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->post_var["sql"] = "SELECT *  FROM  " . $cmr->get_conf("cmr_table_prefix") . $cmr->action["table_name"]." procedure analyse() ";


// if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_developer_type")){
// 	if(cmr_match_include($division->template, "match_include3")) include($cmr->get_path("module") ."modules/admin/preview_sql.php");
// }
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
