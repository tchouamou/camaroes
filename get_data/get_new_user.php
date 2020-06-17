<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_new_user.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_new_user.php,Ver 3.0  2011-Sep-Fri 21:50:35  
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
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [new_user.php]
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



// case "@_form_@"://When Working in data send by  form [new_user.php]

// $post->name = get_post('name'); //Getting variable [$post->name] sended by form [new_user.php]
// $post->last_name = get_post('last_name'); //Getting variable [$post->last_name] sended by form [new_user.php]
// $post->sexe = get_post('sexe'); //Getting variable [$post->sexe] sended by form [new_user.php]
// $post->role = get_post('role'); //Getting variable [$post->role] sended by form [new_user.php]
// $post->sla = get_post('sla'); //Getting variable [$post->sla] sended by form [new_user.php]
// $post->pw = get_post('pw'); //Getting variable [$post->pw] sended by form [new_user.php]
// $post->email = get_post('email'); //Getting variable [$post->email] sended by form [new_user.php]
// $post->email = get_post('email_sign'); //Getting variable [$post->email] sended by form [new_user.php]
// $post->tel = get_post('tel'); //Getting variable [$post->tel] sended by form [new_user.php]
// $post->cel = get_post('cel'); //Getting variable [$post->cel] sended by form [new_user.php]
// $post->adress = get_post('adress'); //Getting variable [$post->adress] sended by form [new_user.php]
// $post->location = get_post('location'); //Getting variable [$post->location] sended by form [new_user.php]
// $post->state = get_post('state'); //Getting variable [$post->state] sended by form [new_user.php]
// $post->status = get_post('status'); //Getting variable [$post->status] sended by form [new_user.php]
// $post->type = get_post('type'); //Getting variable [$post->type] sended by form [new_user.php]
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

$public_key = get_post('public_key'); //Getting variable [$public_key] sended by form [new_user.php]
$private_key = get_post('private_key'); //Getting variable [$private_key] sended by form [new_user.php]
$pass_phrase = get_post('pass_phrase'); //Getting variable [$pass_phrase] sended by form [new_user.php]

$send_email = get_post('send_email');

// ===========
if(get_post('id_user')) $post->id = get_post('id_user'); //Getting variable [$post->id] sended by form [new_user_groups.php]
if(get_post('id')) $post->id = get_post('id'); //Getting variable [$post->id] sended by form [new_user.php]
// ===========
$post->uid = trim(get_post('uid')); //Getting variable [$post->uid] sended by form [new_user.php]
$post->pw = pw_encode($post->pw); //crytage password
// ----------------------------
if($cmr->get_user("authorisation") < $cmr->get_conf("cmr_admin_type"));
if($post->type > $cmr->user["authorisation"]) $post->type = $cmr->user["authorisation"];
// ----------------------------
// ===========
// ===========
$post->email = trim($post->email);
$post->uid = trim($post->uid);
if(((strlen($post->email)) < 3)) $post->email = $post->uid . "_mail@localhost";
if(((strlen($post->uid)) < 1)) $post->uid = substr($post->email, 0, strpos($post->email, "@"));
if(((strlen($post->name)) < 1)) $post->name = $post->uid;
$post->comment = stripslashes($post->comment);
$post->comment = addslashes($post->comment);
// ----------------------------
//######################################################
$home = create_account_folder($cmr->config, "user", $post->uid);
//######################################################
// ----------------------------
$cmr->query[0] = $post->query_insert();
// ----------------------------
// Creating the appropriate SQL string for new_User
// $cmr->query[0] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "user  (
// id ,uid ,name ,last_name ,nickname ,sexe ,role ,sla ,pw ,email ,email_sign ,tel ,cel ,home ,adress ,location ,state ,type ,status ,type ,lang ,style ,login_script ,certificate ,photo ,my_master ,allow_type ,allow_email ,allow_groups ,comment ,date_time
// ) VALUES (
// '' ,'" . cmr_escape($post->uid) . "', '" . cmr_escape($post->name) . "', '" . cmr_escape($post->last_name) . "', '" . cmr_escape($post->nickname) . "', '" . cmr_escape($post->sexe) . "', '" . cmr_escape($post->role) . "', '" . cmr_escape($post->sla) . "', '" . $post->pw . "', '" . cmr_escape($post->email) . "', '" . cmr_escape($post->email) . "', '" . cmr_escape($post->tel) . "', '" . cmr_escape($post->cel) . "', '" . cmr_escape($home) . "', '" . cmr_escape($post->adress) . "', '" . cmr_escape($post->location) . "', '" . cmr_escape($post->state) . "', '" . cmr_escape($post->type) . "', '" . cmr_escape($post->status) . "', '" . cmr_escape($post->type) . "', '" . cmr_escape($post->lang) . "', '" . cmr_escape($post->style) . "', '" . cmr_escape($post->login_script) . "', '" . cmr_escape($post->certificate) . "', '" . cmr_escape($post->photo) . "', '" . cmr_escape($post->my_master) . "', '" . cmr_escape($post->allow_type) . "', '" . cmr_escape($post->allow_email) . "', '" . cmr_escape($post->allow_groups) . "', '" . cmr_escape($post->comment) . "' ,NOW()
//   );";
// ----------------------------

$group_name0 = get_post('group_name2'); //Getting variable [$group_name] sended by form [update_user.php]

// ===========
// ===========
$group_name = explode("\n", trim($group_name0));
if(is_array($group_name)) $group_name = array_unique($group_name);
// ===========
is_array($group_name) ? $text_group = implode("> ", array_unique($group_name)) : $text_group = trim(($group_name));
// ===========
// ===========

foreach($group_name as $sel_key => $sel_val){
if(!empty($sel_val)){
// $cmr->query[] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "user_groups ( id, user_email , group_name , type , state , date_time )
// VALUES ('', '" . cmr_escape($post->email) . "' , '" . cmr_escape(trim($sel_val)) . "', 'normal', '" . cmr_escape($post->state) . "', NOW() );"; //--------define next layout ----------
$post1->user_email = cmr_escape($post->email);
$post1->group_name = cmr_escape(trim($sel_val));
$post1->state = cmr_escape($post->state);
$cmr->query[] = $post1->query_insert();
}
}
// ----------------------------
// Creating the appropriate SQL string for new_User
// $cmr->query[] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "user  (
// id ,uid ,name ,last_name ,nickname ,sexe ,role ,sla ,pw ,email ,email_sign ,tel ,cel ,home ,adress ,location ,state ,type ,status ,type ,lang ,style ,login_script ,certificate ,photo ,my_master ,allow_type ,allow_email ,allow_groups ,comment ,date_time
// ) VALUES (
// '' ,'" . cmr_escape($post->uid) . "', '" . cmr_escape($post->name) . "', '" . cmr_escape($post->last_name) . "', '" . cmr_escape($post->nickname) . "', '" . cmr_escape($post->sexe) . "', '" . cmr_escape($post->role) . "', '" . cmr_escape($post->sla) . "', '" . $post->pw . "', '" . cmr_escape($post->email) . "', '" . cmr_escape($post->email) . "', '" . cmr_escape($post->tel) . "', '" . cmr_escape($post->cel) . "', '" . cmr_escape($home) . "', '" . cmr_escape($post->adress) . "', '" . cmr_escape($post->location) . "', '" . cmr_escape($post->state) . "', '" . cmr_escape($post->type) . "', '" . cmr_escape($post->status) . "', '" . cmr_escape($post->type) . "', '" . cmr_escape($post->lang) . "', '" . cmr_escape($post->style) . "', '" . cmr_escape($post->login_script) . "', '" . cmr_escape($post->certificate) . "', '" . cmr_escape($post->photo) . "', '" . cmr_escape($post->my_master) . "', '" . cmr_escape($post->allow_type) . "', '" . cmr_escape($post->allow_email) . "', '" . cmr_escape($post->allow_groups) . "', '" . cmr_escape($post->comment) . "' ,NOW()
//   );";
// ----------------------------


/*
Creating the appropriate Message to be send to the administrator
*/
if($post->type > $cmr->get_conf("cmr_user_type")){
$cmr->email["headers_cc"] = "<" . $post->email . ">," ; //. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\n";
}

$cmr->email["subject"] = $cmr->config["cmr_company_name3"] . ":" . $cmr->translate("Nuovo user") . " [" . $post->email . "]";

$cmr->email["message"] = $cmr->translate("create_new") . $cmr->translate(" user by : ") . $cmr->get_user("auth_email") . "\n\n\n";
$cmr->email["message"] .= $cmr->translate("user")  . "  " . $cmr->translate("create_success");
$cmr->email["message"] .= "\n" . $cmr->translate("uid: ") . $post->uid;
$cmr->email["message"] .= "\n" . $cmr->translate("name: ") . $post->name;
$cmr->email["message"] .= "\n" . $cmr->translate("last_name: ") . $post->last_name;
$cmr->email["message"] .= "\n" . $cmr->translate("sexe: ") . $post->sexe;
$cmr->email["message"] .= "\n" . $cmr->translate("role: ") . $post->role;
$cmr->email["message"] .= "\n" . $cmr->translate("group: ")  . $text_group;
$cmr->email["message"] .= "\n" . $cmr->translate("sla: ") . $post->sla;

$cmr->email["message"] .= "\n" . $cmr->translate("email: ") . $post->email;
$cmr->email["message"] .= "\n" . $cmr->translate("email_sign: ") . $post->email;
$cmr->email["message"] .= "\n" . $cmr->translate("tel: ") . $post->tel;
$cmr->email["message"] .= "\n" . $cmr->translate("cel: ") . $post->cel;
$cmr->email["message"] .= "\n" . $cmr->translate("adress: ") . $post->adress;
$cmr->email["message"] .= "\n" . $cmr->translate("location: ") . $post->location;
$cmr->email["message"] .= "\n" . $cmr->translate("state: ") . $post->state;
$cmr->email["message"] .= "\n" . $cmr->translate("type: ") . $post->type;
$cmr->email["message"] .= "\n" . $cmr->translate("status: ") . $post->status;
$cmr->email["message"] .= "\n" . $cmr->translate("type: ") . $post->type;
$cmr->email["message"] .= "\n" . $cmr->translate("lang: ") . $post->lang;
$cmr->email["message"] .= "\n" . $cmr->translate("style: ") . $post->style;
$cmr->email["message"] .= "\n" . $cmr->translate("login_script: ") . $post->login_script;
// $cmr->email["message"] .= "\n" . $cmr->translate("public_key: ") . $public_key;
// $cmr->email["message"] .= "\n" . $cmr->translate("private_key: ") . $private_key;
// $cmr->email["message"] .= "\n" . $cmr->translate("pass_phrase: ") . $pass_phrase;
$cmr->email["message"] .= "\n" . $cmr->translate("comment: ") . $post->comment;
// $cmr->email["message"] .= "\n" . $cmr->translate("date_time: ") . $date_time;
$cmr->email["message"] .= "\n" . $cmr->translate("thanks") . "  --\n";
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\n";

/*
Creating the appropriate Message to be view for confirmation
*/
$cmr->output[0] = "<p><b>" . $cmr->translate("user") . "</b>  " . $cmr->translate("create_success") . " </b><br />";
$cmr->output[0] .= "<b>" . $cmr->translate("uid") . ": </b>" . $post->uid . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("name") . ": </b>" . $post->name . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("last_name") . ": </b>" . $post->last_name . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("sexe") . ": </b>" . $post->sexe . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("role") . ": </b>" . $post->role . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("group: ") . "</b>" . $text_group . "<br />" .
$cmr->output[0] .= "<b>" . $cmr->translate("sla") . ": </b>" . $post->sla . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("email") . ": </b>" . $send_email . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("email_sign") . ": </b>" . $post->email . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("tel") . ": </b>" . $post->tel . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("cel") . ": </b>" . $post->cel . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("adress") . ": </b>" . $post->adress . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("location") . ": </b>" . $post->location . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("state") . ": </b>" . $post->state . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("type") . ": </b>" . $post->type . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("status") . ": </b>" . $post->status . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("language") . ": </b>" . $post->lang . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("style") . ": </b>" . $post->style . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("login_script") . ": </b>" . $post->login_script . "<br />";
// $cmr->output[0] .= "<b>" . $cmr->translate("public_key") . ": </b>" . $public_key . "<br />";
// $cmr->output[0] .= "<b>" . $cmr->translate("private_key") . ": </b>" . $private_key . "<br />";
// $cmr->output[0] .= "<b>" . $cmr->translate("pass_phrase") . ": </b>" . $pass_phrase . "<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("comment") . ": </b>" . $post->comment . "<br />";
$cmr->output[0] .= $cmr->translate("thanks") . "  --<br /></p>";

/*
Select next module to be run
*/
// $cmr->page["middle1"] = "run_result.php";

$post->email = $send_email;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $cmr->get_session("id") . "' ,'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
