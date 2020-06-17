<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_update_user.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.












get_update_user.php,Ver 3.0  2011-Sep-Fri 21:50:34  
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
// case "update_user"://When Working in data send by  form [update_user.php]
// -----------------------------------------------------
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "user" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_user" . $cmr->get_ext("conf"));
$cmr->config = $mod->load_conf("conf_user_groups" . $cmr->get_ext("conf"));
// -----------------------------------------------------
// -----------------------------------------------------
$cmr->action["to_load"] = "user.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
$post = new user_class();

////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
////$post->set_cmr_email($cmr->get_user("auth_email"));
////$post->set_cmr_group($cmr->get_user("auth_group"));
////$post->set_cmr_type($cmr->get_user("auth_type"));
////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));

////$post->set_cmr_config($cmr->config);
////$post->set_cmr_user($cmr->user);
// -----------------------------------------------------
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [update_user.php]
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





// //     $uid = trim(get_post('uid')); //Getting variable [$uid] sended by form [new_user.php]
// $post->name = get_post('name'); //Getting variable [$post->name] sended by form [new_user.php]
// $post->last_name = get_post('last_name'); //Getting variable [$post->last_name] sended by form [new_user.php]
// $post->sexe = get_post('sexe'); //Getting variable [$post->sexe] sended by form [new_user.php]
// $post->role = get_post('role'); //Getting variable [$post->role] sended by form [new_user.php]
// $post->sla = get_post('sla'); //Getting variable [$post->sla] sended by form [new_user.php]
// //     $pw = get_post('pw'); //Getting variable [$pw] sended by form [new_user.php]
// //     $user_email = get_post('email'); //Getting variable [$user_email] sended by form [new_user.php]
// $post->email_sign = get_post('email_sign'); //Getting variable [$post->email_sign] sended by form [new_user.php]
// $post->tel = get_post('tel'); //Getting variable [$post->tel] sended by form [new_user.php]
// $post->cel = get_post('cel'); //Getting variable [$post->cel] sended by form [new_user.php]
// $post->adress = get_post('adress'); //Getting variable [$post->adress] sended by form [new_user.php]
// $post->location = get_post('location'); //Getting variable [$post->location] sended by form [new_user.php]
// $post->state = get_post('state'); //Getting variable [$post->state] sended by form [new_user.php]
// $post->type = get_post('type'); //Getting variable [$post->type] sended by form [new_user.php]
// $post->status = get_post('status'); //Getting variable [$post->status] sended by form [new_user.php]
// $post->lang = get_post('lang'); //Getting variable [$post->lang] sended by form [new_user.php]
// $post->style = get_post('style'); //Getting variable [$post->style] sended by form [new_user.php]
// $post->login_script = get_post('login_script'); //Getting variable [$post->login_script] sended by form [new_user.php]
// $post->comment = get_post('comment'); //Getting variable [$post->comment] sended by form [new_user.php]

// $post->certificate = get_post('certificate');
// $post->photo = get_post('photo');
// $post->my_master = get_post('my_master');
// $post->nickname = get_post('nickname');

// $post->allow_type = get_post('allow_type');
// $post->allow_email = get_post('allow_email');
// $post->allow_groups = get_post('allow_groups');

// $send_email = get_post('send_email');

// ----------------------------
$id_user = get_post('id_user'); //Getting variable [$id_user] sended by form [update_user.php]

$public_key = get_post('public_key'); //Getting variable [$public_key] sended by form [new_user.php]
$private_key = get_post('private_key'); //Getting variable [$private_key] sended by form [new_user.php]
$pass_phrase = get_post('pass_phrase'); //Getting variable [$pass_phrase] sended by form [new_user.php]
// $pw=pw_encode($pw);//crytage password
// ===========
// ===========
if($cmr->get_user("authorisation") < $cmr->get_conf("cmr_noc_type")){
	$group_name = $cmr->get_user("auth_groups");
	$group_name0 = $cmr->get_user("auth_groups");
	$id_user = $cmr->get_user("auth_id");
}
// ===========
	$post->id = $id_user;
// ===========
// ===========
$uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "id", $id_user);
// ----------------------------
// $send_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id_user);
$user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id_user);
// ----------------------------
// ===========
// ===========
// ===========
// ===========
// ----------------------------
// if(((strlen($uid)) < 1))$uid = "null_uid_user";
// if(((strlen($post->name)) < 1))  $post->name = "null_name_user";
// if(((strlen($user_email)) < 3)) $user_email = $uid . "_mail@localhost";
// ----------------------------
if($cmr->get_user("authorisation") < $cmr->get_conf("cmr_admin_type"));
if($post->type > $cmr->user["authorisation"]) $post->type = $cmr->user["authorisation"];
// ----------------------------
$cmr->action["table_name"] = "user_groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "update";
$cmr_accept = $cmr->where_query();
$array_column = array();
// ----------------------------
// Creating the appropriate SQL string for update_User
// $cmr->query[0] = $post->query_update($id_user);
// $cmr->query[0] = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "user SET  ";

// $array_column["id"] = $id_user;
// $array_column["uid"] = $uid;
$array_column["name"] = $post->name;
$array_column["last_name"] = $post->last_name;
$array_column["sexe"] = $post->sexe;
$array_column["role"] = $post->role;
$array_column["sla"] = $post->sla;
// $array_column["pw"] = $pw;
// $array_column["email"] = $user_email;
$array_column["email_sign"] = $post->email_sign;
$array_column["tel"] = $post->tel;
$array_column["cel"] = $post->cel;
$array_column["adress"] = $post->adress;
$array_column["location"] = $post->location;
$array_column["state"] = $post->state;
if($cmr->get_user("authorisation") > $post->type);
$array_column["type"] = $post->type;
$array_column["status"] = $post->status;
$array_column["lang"] = $post->lang;
$array_column["style"] = $post->style;
//
$array_column["login_script"] = $post->login_script;
$array_column["email_sign"] = $post->email_sign;
// $array_column["public_key"] = $public_key;
// $array_column["private_key"] = $private_key;
// $array_column["pass_phrase"] = $pass_phrase;
$array_column["comment"] = $post->comment;

// $cmr->query[0] .= "date_time = now()  where " . $cmr_accept . " and  id = '" . cmr_escape($id_user) . "';";
$array_column["date_time"] = date("Y-m-d h:i:s");;
$array_id["key"] = "id";
$array_id["value"] = $id_user;
// ===========
// ===========
$cmr->query[0] = cmr_query_update($array_column, $array_id, $id_user, $cmr->get_conf("cmr_table_prefix") ."user", $cmr_accept);
// ===========
// ===========

$group_name0 = get_post('group_name2'); //Getting variable [$group_name] sended by form [update_user.php]
// ===========
// ===========
$group_name = explode("\n", trim($group_name0));
if(is_array($group_name)) $group_name = array_unique($group_name);
$group_name_set = "'" . implode("','", $group_name) . "'";
// ===========
is_array($group_name) ? $text_group = implode("> ", array_unique($group_name)) : $text_group = trim(($group_name));
// ===========
// ===========
if(empty($_SESSION["__update__"]["group_name2"])) $_SESSION["__update__"]["group_name2"] = "";
// ===========
if($_SESSION["__update__"]["group_name2"] != $group_name0){
$cmr->action["table_name"] = "user_groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "delete";
$cmr_accept = $cmr->where_query();

$query_delete = "DELETE FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups ";
$query_delete .= " WHERE " . $cmr_accept;
$query_delete .= " AND group_name NOT IN (" . $group_name_set . ") ";
$query_delete .= " AND user_email = '" . cmr_escape($user_email) . "';";
$sql_delete = &$cmr->db_connection->Execute($query_delete) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
}
// ===========
// $query_delete = cmr_query_delete($array_id, "", $cmr->get_conf("cmr_table_prefix") . "user_groups", $cmr_accept);
// ===========

if($_SESSION["__update__"]["group_name2"] != $group_name0)
foreach($group_name as $sel_key => $sel_val){
if(!empty($sel_val)){
// $cmr->query[] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "user_groups ( id, user_email , group_name , type , state , date_time )
// VALUES ('', '" . cmr_escape($user_email) . "' , '" . cmr_escape(trim($sel_val)) . "', 'normal', '" . cmr_escape($post->state) . "', NOW() );"; //--------define next layout ----------
$post1->user_email = cmr_escape($user_email);
$post1->group_name = cmr_escape(trim($sel_val));
$post1->state = cmr_escape($post->state);
$cmr->query[] = $post1->query_insert();
}
}
// ----------------------------
// ----------------------------
$cmr->action["table_name"] = "user_groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "update";
$cmr_accept = $cmr->where_query();
$array_column = array();
// ----------------------------
// $query_update = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "user_groups SET ";
// $query_update .= " state = '" . cmr_escape($post->state) . "', ";
// $query_update .= " date_time = NOW() ";
// $query_update .= " WHERE (" . $cmr_accept . " and (user_email = '" . cmr_escape($user_email) . "'));";
// $cmr->query[] = $query_update;
// ----------------------------
$array_column["state"] = $post->state;
$array_column["date_time"] = date("Y-m-d h:i:s");
$array_id["key"] = "user_email";
$array_id["value"] = $user_email;
// ===========
// ===========
$cmr->query[] = cmr_query_update($array_column, $array_id, "", $cmr->get_conf("cmr_table_prefix") ."user_groups", $cmr_accept);
// ===========
// ===========

/*
Creating the appropriate Message to be send to the administrator
*/
// $cmr->email["headers_severity"]=3;
// $cmr->email["headers_to"] = "". $cmr->get_conf("cmr_log_name")." <". $cmr->get_conf("cmr_log_email").">\n";
// $cmr->email["headers_from"] = "". $cmr->get_conf("cmr_admin_name")." <".$cmr->config["cmr_from_email"].">\n";
// $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"]." <".$cmr->config["cmr_cc_email"].">\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"]." <".$cmr->config["cmr_bcc_email"].">\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_from_name"]." <". $cmr->get_conf("cmr_admin_email").">\n";
if($post->type > $cmr->get_conf("cmr_user_type")){
$cmr->email["headers_cc"] = "<" . $user_email . ">," ; //. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\n";
}
$cmr->email["subject"] = $cmr->config["cmr_company_name3"] . ":  " . $cmr->translate("updated") . "  " . $cmr->translate("user") . " [" . $user_email . "]";

$cmr->email["message"] = $cmr->translate("was_update") . "  user da : " . $cmr->get_user("auth_email") . "\n\n\n";
$cmr->email["message"] .= $cmr->translate("user")  . "  " . $cmr->translate("update_success");
$cmr->email["message"] .= "\n" . $cmr->translate("uid: ") . $uid;
$cmr->email["message"] .= "\n" . $cmr->translate("name: ") . $post->name;
$cmr->email["message"] .= "\n" . $cmr->translate("last_name: ") . $post->last_name;
$cmr->email["message"] .= "\n" . $cmr->translate("sexe: ") . $post->sexe;
$cmr->email["message"] .= "\n" . $cmr->translate("role: ") . $post->role;
$cmr->email["message"] .= "\n" . $cmr->translate("group: ")  . $text_group;
$cmr->email["message"] .= "\n" . $cmr->translate("sla: ") . $post->sla;

$cmr->email["message"] .= "\n" . $cmr->translate("email: ") . $user_email;
$cmr->email["message"] .= "\n" . $cmr->translate("email_sign: ") . $post->email_sign;
$cmr->email["message"] .= "\n" . $cmr->translate("tel: ") . $post->tel;
$cmr->email["message"] .= "\n" . $cmr->translate("cel: ") . $post->cel;
$cmr->email["message"] .= "\n" . $cmr->translate("adress: ") . $post->adress;
$cmr->email["message"] .= "\n" . $cmr->translate("location: ") . $post->location;
$cmr->email["message"] .= "\n" . $cmr->translate("state: ") . $post->state;
$cmr->email["message"] .= "\n" . $cmr->translate("type: ") . $post->type;
$cmr->email["message"] .= "\n" . $cmr->translate("status: ") . $post->status;
$cmr->email["message"] .= "\n" . $cmr->translate("lang: ") . $post->lang;
$cmr->email["message"] .= "\n" . $cmr->translate("style: ") . $post->style;
$cmr->email["message"] .= "\n" . $cmr->translate("login_script: ") . $post->login_script;
$cmr->email["message"] .= "\n" . $cmr->translate("public_key: ") . $public_key;
$cmr->email["message"] .= "\n" . $cmr->translate("private_key: ") . $private_key;
$cmr->email["message"] .= "\n" . $cmr->translate("pass_phrase: ") . $pass_phrase;
$cmr->email["message"] .= "\n" . $cmr->translate("comment: ") . $post->comment;
// $cmr->email["message"] .= "\n" . $cmr->translate("date_time: ") . $date_time;
$cmr->email["message"] .= "\n" . $cmr->translate("thanks") . "  --\n";
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\n";

/*
Creating the appropriate Message to be view for confirmation
*/
$cmr->output[0] = "<p><b>" . $cmr->translate("user")  . $cmr->translate("update_success") . "  </b><br />";
$cmr->output[0] .= "<b>" . $cmr->translate("uid") . ": </b>" . htmlentities($uid) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("name") . ": </b>" . htmlentities($post->name) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("last_name") . ": </b>" . htmlentities($post->last_name) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("sexe") . ": </b>" . htmlentities($post->sexe) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("role") . ": </b>" . htmlentities($post->role) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("group: ") . "</b><br />" . htmlentities($text_group) . "<br />" .
$cmr->output[0] .= "<b>" . $cmr->translate("sla") . ": </b>" . htmlentities($post->sla) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("email") . ": </b>" . htmlentities($user_email) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("email_sign") . ": </b>" . htmlentities($post->email_sign) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("tel") . ": </b>" . htmlentities($post->tel) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("cel") . ": </b>" . htmlentities($post->cel) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("adress") . ": </b>" . htmlentities($post->adress) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("location") . ": </b>" . htmlentities($post->location) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("state") . ": </b>" . htmlentities($post->state) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("status") . ": </b>" . htmlentities($post->status) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("type") . ": </b>" . htmlentities($post->type) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("language") . ": </b>" . htmlentities($post->lang) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("style") . ": </b>" . htmlentities($post->style) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("login_script") . ": </b>" . htmlentities($post->login_script) . "<br />";
// $cmr->output[0] .= "<b>" . $cmr->translate("public_key") . ": </b>" . htmlentities($public_key) . "<br />";
// $cmr->output[0] .= "<b>" . $cmr->translate("private_key") . ": </b>" . htmlentities($private_key) . "<br />";
// $cmr->output[0] .= "<b>" . $cmr->translate("pass_phrase") . ": </b>" . htmlentities($pass_phrase) . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("comment") . ": </b>" . htmlentities($post->comment) . "<br />";
$cmr->output[0] .= $cmr->translate("thanks") . "  --<br /></p>";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $id_user . "' ,'update'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$user_email = $user_email;
 /*
Select next module to be run
*/
// $cmr->page["middle1"] = "run_result.php";
;
// $cmr->debug_print();exit;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
