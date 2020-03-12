<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_new_groups.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











get_new_groups.php,Ver 3.0  2011-Sep-Fri 21:50:26  
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
// case "@_form_@"://When Working in data send by  form [new_groups.php]
// -----------------------------------------------------
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "groups" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_groups" . $cmr->get_ext("conf"));
$cmr->config = $mod->load_conf("conf_user_groups" . $cmr->get_ext("conf"));
$cmr->config = $mod->load_conf("conf_father_groups" . $cmr->get_ext("conf"));
// -----------------------------------------------------
// -----------------------------------------------------
$cmr->action["to_load"] = "groups.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
$post = new groups_class();

////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
////$post->set_cmr_email($cmr->get_user("auth_email"));
////$post->set_cmr_group($cmr->get_user("auth_group"));
////$post->set_cmr_type($cmr->get_user("auth_type"));
////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));

////$post->set_cmr_config($cmr->config);
////$post->set_cmr_user($cmr->user);
// -----------------------------------------------------
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [new_groups.php]
// -----------------------------------------------------
// -----------------------------------------------------
// -----------------------------------------------------
$cmr->action["to_load"] = "user_groups.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
$post1 = new user_groups_class();

$post1->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
$post1->set_cmr_email($cmr->get_user("auth_email"));
$post1->set_cmr_group($cmr->get_user("auth_group"));
$post1->set_cmr_type($cmr->get_user("auth_type"));
$post1->set_cmr_list_group($cmr->get_user("auth_list_group"));

$post1->set_cmr_config($cmr->config);
$post1->set_cmr_user($cmr->user);
// -----------------------------------------------------
// -----------------------------------------------------
$cmr->action["to_load"] = "father_groups.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
$post2 = new father_groups_class();

$post2->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
$post2->set_cmr_email($cmr->get_user("auth_email"));
$post2->set_cmr_group($cmr->get_user("auth_group"));
$post2->set_cmr_type($cmr->get_user("auth_type"));
$post2->set_cmr_list_group($cmr->get_user("auth_list_group"));

$post2->set_cmr_config($cmr->config);
$post2->set_cmr_user($cmr->user);
// -----------------------------------------------------




// $post->state = get_post('state'); //Getting variable [$post->state] sended by form [new_groups.php]
// $post->location = get_post('location'); //Getting variable [$post->location] sended by form [new_groups.php]
// $post->pass_phrase = get_post('pass_phrase'); //Getting variable [$post->pass_phrase] sended by form [new_groups.php]
// $post->email_sign = get_post('email_sign'); //Getting variable [$post->email_sign] sended by form [new_groups.php]
// $post->group_email = get_post('group_email'); //Getting variable [$post->group_email] sended by form [new_groups.php]
// $post->admin_email = get_post('admin_email'); //Getting variable [$post->admin_email] sended by form [new_groups.php]
// $post->home = get_post('home'); //Getting variable [$post->home] sended by form [new_groups.php]
// $post->notify = get_post('notify'); //Getting variable [$post->notify] sended by form [new_groups.php]
// $post->web_site = get_post('web_site'); //Getting variable [$post->web_site] sended by form [new_groups.php]
// $post->type = get_post('type'); //Getting variable [$post->type] sended by form [new_groups.php]
// $post->sla = get_post('sla'); //Getting variable [$post->sla] sended by form [new_groups.php]
// $post->public_key = get_post('public_key'); //Getting variable [$post->public_key] sended by form [new_groups.php]
// $post->private_key = get_post('private_key'); //Getting variable [$post->private_key] sended by form [new_groups.php]
// $post->login_script = get_post('login_script'); //Getting variable [$post->login_script] sended by form [new_groups.php]
// $post->adress = get_post('adress'); //Getting variable [$post->adress] sended by form [new_groups.php]



$group_name = get_post('name'); //Getting variable [$group_name] sended by form [new_groups.php]

if(((strlen($group_name)) < 1)) $group_name = "null_group";
// ----------------------------
if($cmr->get_user("authorisation") < $cmr->get_conf("cmr_admin_type"));
if($post->type > $cmr->user["authorisation"]) $post->type = $cmr->user["authorisation"];
// ----------------------------


// ===========
$cmr->user["auth_list_group"] .= ", '" . $group_name . "'";
// ===========
$cmr_accept = cmr_where_query($cmr->get_conf("cmr_table_prefix") . "groups", $cmr->user["auth_email"], $cmr->user["auth_group"], $cmr->user["auth_type"], $cmr->user["auth_list_group"], $cmr->db_connection);
// ===========
// ===========


// Creating the appropriate SQL string for new_Group
$cmr->query[0] = $post->query_insert();
// $cmr->query[0] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "groups  (
// id ,name ,state ,type ,location , ,sla ,public_key ,private_key ,pass_phrase ,email_sign ,group_email ,admin_email ,home ,notify ,web_site ,login_script ,adress ,my_master ,allow_type ,allow_email ,allow_groups ,comment ,date_time
// ) VALUES (
// '' ,'" . cmr_escape($group_name) . "', '" . cmr_escape($post->state) . "', '" . cmr_escape($post->type) . "', '" . cmr_escape($post->location) . "', '" . "' ,'" . cmr_escape($post->sla) . "', '" . cmr_escape($post->public_key) . "', '" . cmr_escape($post->private_key) . "', '" . cmr_escape($post->pass_phrase) . "', '" . cmr_escape($post->email_sign) . "', '" . cmr_escape($post->group_email) . "', '" . cmr_escape($post->admin_email) . "', '" . cmr_escape($post->home) . "', '" . cmr_escape($post->notify) . "', '" . cmr_escape($post->web_site) . "', '" . cmr_escape($post->login_script) . "', '" . cmr_escape($post->adress) . "', '" . cmr_escape($post->my_master) . "', '" . cmr_escape($post->allow_type) . "', '" . cmr_escape($post->allow_email) . "', '" . cmr_escape($post->allow_groups) . "', '" . cmr_escape($post->comment) . "' ,NOW()
//   );";
// ----------------------------
// $cmr->query[] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "father_groups ( id , group_child , group_father, state, date_time ) "
// ." VALUES ('' , '" . cmr_escape($group_name) . "', 'admin', 'enable', NOW());";
$post2->group_child = cmr_escape($group_name);
$post2->group_father = "admin";
$post2->state = "enable";
if($post->type <= $cmr->get_conf("cmr_admin_type"))
$cmr->query[] = $post2->query_insert();
// ----------------------------
// $cmr->query[].="INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "father_groups ( id , group_child , group_father, state, date_time ) "
// ." VALUES ('' , '" . cmr_escape($group_name) . "', '". $cmr->get_conf("cmr_admin_group") ."', 'enable', NOW());";
$post2->group_child = cmr_escape($group_name);
$post2->group_father = $cmr->get_conf("cmr_admin_group");
$post2->state = "enable";
if($post->type < $cmr->get_conf("cmr_admin_type"))
$cmr->query[] = $post2->query_insert();
// ----------------------------
// $cmr->query[].="INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "father_groups ( id , group_child , group_father, state, date_time ) "
// ." VALUES ('' , '" . cmr_escape($group_name) . "', '". $cmr->user["auth_group"] ."', 'enable', NOW());";
$post2->group_child = cmr_escape($group_name);
$post2->group_father = $cmr->user["auth_group"];
$post2->state = "enable";
if($post->type < $cmr->get_conf("cmr_admin_type"))
$cmr->query[] = $post2->query_insert();
// ----------------------------
// ===========
// ===========
// ===========
// ===========
$user_email0 = trim(get_post('user_email1')); //Getting variable [$user_email] sended by form [new_groups.php]
$group_father0 = trim(get_post('group_father1')); //Getting variable [$group_father] sended by form [new_groups.php]
$group_child0= trim(get_post('group_child1')); //Getting variable [$group_child1] sended by form [new_groups.php]
// ----------------------------
// ===========
$user_email = explode("\n", trim($user_email0));
$group_father = explode("\n", trim($group_father0));
$group_child = explode("\n", trim($group_child0));
// ----------------------------
// ===========
if(is_array($user_email)) $user_email = array_unique($user_email);
if(is_array($group_father)) $group_father = array_unique($group_father);
if(is_array($group_child)) $group_child = array_unique($group_child);
// ----------------------------
// ===========
is_array($email_name) ? $text_email = implode("> ", array_unique($user_email)) : $text_email = trim(($user_email));
is_array($father_name) ? $text_father = implode("> ", array_unique($group_father)) : $text_father = trim(($group_father));
is_array($child_name) ? $text_child = implode("> ", array_unique($group_child)) : $text_child = trim(($group_child));
// ===========
// ----------------------------
// ----------------------------
// ===========
foreach($group_child as $sel_key => $sel_val){
if(!empty($sel_val)){
// $cmr->query[] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "father_groups ( id , group_child , group_father, state, date_time ) ".
// " VALUES ('' , '" . cmr_escape(trim($sel_val)) . "', '" . cmr_escape($group_name) . "', 'enable', NOW());";
$post2->group_child = cmr_escape(trim($sel_val));
$post2->group_father = cmr_escape($group_name);
$post2->state = cmr_escape($post->state);
$cmr->query[] = $post2->query_insert();
}
}
// ----------------------------
foreach($group_father as $sel_key => $sel_val){
if(!empty($sel_val)){
// $cmr->query[] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "father_groups ( id , group_child , group_father, state, date_time ) ".
// " VALUES ('' , '" . cmr_escape($group_name) . "', '" . cmr_escape(trim($sel_val)) . "', 'enable', NOW());";
$post2->group_child = cmr_escape($group_name);
$post2->group_father = cmr_escape(trim($sel_val));
$post2->state = cmr_escape($post->state);
$cmr->query[] = $post2->query_insert();
}
}
// ----------------------------
foreach($user_email as $sel_key => $sel_val){
if(!empty($sel_val)){
// $cmr->query[] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "user_groups ( id, user_email , group_name, state , date_time ) ".
// " VALUES ('', '" . cmr_escape(trim($sel_val)) . "' , '" . cmr_escape($group_name) . "', '" . cmr_escape($post->type) . "', '" . cmr_escape($post->state) . "', NOW() );";
$post1->user_email = cmr_escape(trim($sel_val));
$post1->group_name = cmr_escape($group_name);
$post1->state = cmr_escape($post->state);
$cmr->query[] = $post1->query_insert();
}
}
// ----------------------------
// ===========
// ===========
// ===========
// ===========
// ----------------------------
// $email = $cmr->get_user("auth_email");
// $cmr->query[3] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "user_groups ( id, user_email , group_name ,type , state , date_time )
//     VALUES ('', '" . cmr_escape($email) . "' , '" . cmr_escape($group_name) . "', '" . cmr_escape($post->type) . "', '" . cmr_escape($post->state) . "', NOW() );";
// ----------------------------

//######################################################
$post->home = create_account_folder($cmr->config, "group", $group_name);
//######################################################
        /*
Creating the appropriate Message to be send to the administrator
*/
 // $cmr->email["headers_severity"]=3;
 // $cmr->email["headers_to"] = "". $cmr->get_conf("cmr_log_name")." <". $cmr->get_conf("cmr_log_email").">\n";
 // $cmr->email["headers_from"] = "". $cmr->get_conf("cmr_admin_name")." <".$cmr->config["cmr_from_email"].">\n";
 // $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"]." <".$cmr->config["cmr_cc_email"].">\n";
 // $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"]." <".$cmr->config["cmr_bcc_email"].">\n";
 // $cmr->email["headers_bcc"] = "".$cmr->config["cmr_from_name"]." <". $cmr->get_conf("cmr_admin_email").">\n";
$cmr->email["subject"] = $cmr->config["cmr_company_name3"] . ": " . $cmr->translate("Nuovo group") . " [" . $group_name . "]";

$cmr->email["message"] = $cmr->translate("create_new") . "  " . $cmr->translate("group by") . " : " . $cmr->get_user("auth_email") . "\n\n\n";
$cmr->email["message"] .= $cmr->translate("group")  . "  " . $cmr->translate("create_success");
$cmr->email["message"] .= "\n" . $cmr->translate("name: ") . $group_name;
$cmr->email["message"] .= "\n" . $cmr->translate("state: ") . $post->state;
$cmr->email["message"] .= "\n" . $cmr->translate("type: ") . $post->type;
$cmr->email["message"] .= "\n" . $cmr->translate("user of group: ")  . implode("> ", $user_email);
$cmr->email["message"] .= "\n" . $cmr->translate("father of group: ")  . implode("> ", $group_father);
$cmr->email["message"] .= "\n" . $cmr->translate("child of group: ")  . implode("> ", $group_child);
$cmr->email["message"] .= "\n" . $cmr->translate("location: ") . $post->location;
$cmr->email["message"] .= "\n" . $cmr->translate("pass_phrase: ") . $post->pass_phrase;
$cmr->email["message"] .= "\n" . $cmr->translate("email_sign: ") . $post->email_sign;
$cmr->email["message"] .= "\n" . $cmr->translate("group_email: ") . $post->group_email;
$cmr->email["message"] .= "\n" . $cmr->translate("admin_email: ") . $post->admin_email;
$cmr->email["message"] .= "\n" . $cmr->translate("home: ") . $post->home;
$cmr->email["message"] .= "\n" . $cmr->translate("notify: ") . $post->notify;
$cmr->email["message"] .= "\n" . $cmr->translate("web_site: ") . $post->web_site;
$cmr->email["message"] .= "\n" . $cmr->translate("type: ") . $post->type;
$cmr->email["message"] .= "\n" . $cmr->translate("sla: ") . $post->sla;
$cmr->email["message"] .= "\n" . $cmr->translate("public_key: ") . $post->public_key;
$cmr->email["message"] .= "\n" . $cmr->translate("private_key: ") . $post->private_key;
$cmr->email["message"] .= "\n" . $cmr->translate("login_script: ") . $post->login_script;
$cmr->email["message"] .= "\n" . $cmr->translate("adress: ") . $post->adress;
$cmr->email["message"] .= "\n" . $cmr->translate("comment: ") . $post->comment;
// $cmr->email["message"] .= "\n" . $cmr->translate("date_time: ") . $date_time . "\n";
$cmr->email["message"] .= $cmr->translate("thanks") . "  --\n";
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\n";

/*
Creating the appropriate Message to be view for confirmation
*/

$cmr->output[0] = "<p><b>" . $cmr->translate("group") . "</b>  " . $cmr->translate("create_success") . " </b><br />";
$cmr->output[0] .= "<b>" . $cmr->translate("name")  . " :</b>" . $group_name . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("state")  . " :</b>" . $post->state . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("user of group ")  . " :</b>" . implode("> ", $user_email) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("father of group ")  . " :</b>" . implode("> ", $group_father) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("child of group ")  . " :</b>" . implode("> ", $group_child) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("location")  . " :</b>" . $post->location . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("pass_phrase")  . " :</b>" . $post->pass_phrase . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("email_sign")  . " :</b>" . $post->email_sign . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("group_email")  . " :</b>" . $post->group_email . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("admin_email")  . " :</b>" . $post->admin_email . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("home")  . " :</b>" . $post->home . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("notify")  . " :</b>" . $post->notify . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("web_site")  . " :</b>" . $post->web_site . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("type")  . " :</b>" . $post->type . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("sla")  . " :</b>" . $post->sla . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("public_key")  . " :</b>" . $post->public_key . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("private_key")  . " :</b>" . $post->private_key . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("login_script")  . " :</b>" . $post->login_script . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("adress")  . " :</b>" . $post->adress . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("comment")  . " :</b>" . $post->comment . "<br />";
// $cmr->output[0] .= "<b>" . $cmr->translate("date_time")  . " :</b>" . $date_time . "<br />";
$cmr->output[0] .= $cmr->translate("thanks") . "  --<br /></p>";
                                                        /*
Select next module to be run
*/
// $cmr->page["middle1"] = "run_result.php";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "groups', '" . $cmr->get_session("id") . "' ,'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
