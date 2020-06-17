<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_ticket.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_search_ticket.php,Ver 3.0  2011-Jun-Mon 19:06:13
*/

/**
 * Information about
 * $cmr->post_var["sql_ticket"] and $cmr->post_var["sql"] Is used for keeping
 * the query string you will be run in the module view_search.php
 *
 * $cmr->post_var["search_text"] Is used for keeping
 * the string value off the text to search
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "search_ticket"://When Working in data send by  form [search_ticket.php]
// ----------------            
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "ticket" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_ticket" . $cmr->get_ext("conf"));
$cmr->help = $cmr->load_help_need("ticket" . $cmr->get_ext("help"));
			
$cmr->action["module_name"] = "ticket.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// ----------------            
$post = new ticket_class();
$post->prefix  = $cmr->get_conf("cmr_table_prefix");
// -----------------------------------------------------

$post->id = get_post('id', 'post', $cmr->session['pre_match']); //Getting variable [$post->id] sended by form search_ticket.php]

$post->number = get_post('number', 'post', $cmr->session['pre_match']); //Getting variable [$post->number] sended by form search_ticket.php]

$post->lang = get_post('lang', 'post', $cmr->session['pre_match']); //Getting variable [$post->lang] sended by form search_ticket.php]

$post->title = get_post('title', 'post', $cmr->session['pre_match']); //Getting variable [$post->title] sended by form search_ticket.php]

$post->work_by = get_post('work_by', 'post', $cmr->session['pre_match']); //Getting variable [$post->work_by] sended by form search_ticket.php]

$post->call_log_user = get_post('call_log_user', 'post', $cmr->session['pre_match']); //Getting variable [$post->call_log_user] sended by form search_ticket.php]

$post->call_log_group = get_post('call_log_group', 'post', $cmr->session['pre_match']); //Getting variable [$post->call_log_group] sended by form search_ticket.php]

$post->call_method = get_post('call_method', 'post', $cmr->session['pre_match']); //Getting variable [$post->call_method] sended by form search_ticket.php]

$post->state = get_post('state', 'post', $cmr->session['pre_match']); //Getting variable [$post->state] sended by form search_ticket.php]

$post->state_now = get_post('state_now', 'post', $cmr->session['pre_match']); //Getting variable [$post->state_now] sended by form search_ticket.php]

$post->assign_to = get_post('assign_to', 'post', $cmr->session['pre_match']); //Getting variable [$post->assign_to] sended by form search_ticket.php]

$post->list_user_impact = get_post('list_user_impact', 'post', $cmr->session['pre_match']); //Getting variable [$post->list_user_impact] sended by form search_ticket.php]

$post->list_group_impact = get_post('list_group_impact', 'post', $cmr->session['pre_match']); //Getting variable [$post->list_group_impact] sended by form search_ticket.php]

$post->list_asset_impact = get_post('list_asset_impact', 'post', $cmr->session['pre_match']); //Getting variable [$post->list_asset_impact] sended by form search_ticket.php]

$post->severity = get_post('severity', 'post', $cmr->session['pre_match']); //Getting variable [$post->severity] sended by form search_ticket.php]

$post->sla = get_post('sla', 'post', $cmr->session['pre_match']); //Getting variable [$post->sla] sended by form search_ticket.php]

$post->mail_title = get_post('mail_title', 'post', $cmr->session['pre_match']); //Getting variable [$post->mail_title] sended by form search_ticket.php]

$post->mail_from = get_post('mail_from', 'post', $cmr->session['pre_match']); //Getting variable [$post->mail_from] sended by form search_ticket.php]

$post->mail_to = get_post('mail_to', 'post', $cmr->session['pre_match']); //Getting variable [$post->mail_to] sended by form search_ticket.php]

$post->mail_cc = get_post('mail_cc', 'post', $cmr->session['pre_match']); //Getting variable [$post->mail_cc] sended by form search_ticket.php]

$post->mail_bcc = get_post('mail_bcc', 'post', $cmr->session['pre_match']); //Getting variable [$post->mail_bcc] sended by form search_ticket.php]

$post->attach = get_post('attach', 'post', $cmr->session['pre_match']); //Getting variable [$post->attach] sended by form search_ticket.php]

$post->type = get_post('type', 'post', $cmr->session['pre_match']); //Getting variable [$post->type] sended by form search_ticket.php]

$post->text = get_post('text', 'post', $cmr->session['pre_match']); //Getting variable [$post->text] sended by form search_ticket.php]

$post->mail_text = get_post('mail_text', 'post', $cmr->session['pre_match']); //Getting variable [$post->mail_text] sended by form search_ticket.php]

$post->my_master = get_post('my_master', 'post', $cmr->session['pre_match']); //Getting variable [$post->my_master] sended by form search_ticket.php]

$post->allow_type = get_post('allow_type', 'post', $cmr->session['pre_match']); //Getting variable [$post->allow_type] sended by form search_ticket.php]

$post->allow_email = get_post('allow_email', 'post', $cmr->session['pre_match']); //Getting variable [$post->allow_email] sended by form search_ticket.php]

$post->allow_groups = get_post('allow_groups', 'post', $cmr->session['pre_match']); //Getting variable [$post->allow_groups] sended by form search_ticket.php]

$post->comment = get_post('comment', 'post', $cmr->session['pre_match']); //Getting variable [$post->comment] sended by form search_ticket.php]

$post->date_time = get_post('date_time', 'post', $cmr->session['pre_match']); //Getting variable [$post->date_time] sended by form search_ticket.php]


$cmr->post_var["sql_table"] = "ticket";
$cmr->post_var["search_text"] = "";

/*
Creating the appropriate SQL string for  searching in ticket
*/
$cmr->post_var["sql_ticket"] = "";

// $str_search = 'select * from  ' . $cmr->config['cmr_table_prefix'] . 'ticket   where ( (1) ';

// 
// if(strlen($post->id) > 0){
// //     $str_search .= 'and id like (\'%' . $post->id . '%\') ';
//     $str_search .= sprintf('and id like (\'%' . %s . '%\') ', cmr_escape($post->id));
// }
// 
// if(strlen($post->number) > 0){
// //     $str_search .= 'and number like (\'%' . $post->number . '%\') ';
//     $str_search .= sprintf('and number like (\'%' . %s . '%\') ', cmr_escape($post->number));
// }
// 
// if(strlen($post->lang) > 0){
// //     $str_search .= 'and lang like (\'%' . $post->lang . '%\') ';
//     $str_search .= sprintf('and lang like (\'%' . %s . '%\') ', cmr_escape($post->lang));
// }
// 
// if(strlen($post->title) > 0){
// //     $str_search .= 'and title like (\'%' . $post->title . '%\') ';
//     $str_search .= sprintf('and title like (\'%' . %s . '%\') ', cmr_escape($post->title));
// }
// 
// if(strlen($post->work_by) > 0){
// //     $str_search .= 'and work_by like (\'%' . $post->work_by . '%\') ';
//     $str_search .= sprintf('and work_by like (\'%' . %s . '%\') ', cmr_escape($post->work_by));
// }
// 
// if(strlen($post->call_log_user) > 0){
// //     $str_search .= 'and call_log_user like (\'%' . $post->call_log_user . '%\') ';
//     $str_search .= sprintf('and call_log_user like (\'%' . %s . '%\') ', cmr_escape($post->call_log_user));
// }
// 
// if(strlen($post->call_log_group) > 0){
// //     $str_search .= 'and call_log_group like (\'%' . $post->call_log_group . '%\') ';
//     $str_search .= sprintf('and call_log_group like (\'%' . %s . '%\') ', cmr_escape($post->call_log_group));
// }
// 
// if(strlen($post->call_method) > 0){
// //     $str_search .= 'and call_method like (\'%' . $post->call_method . '%\') ';
//     $str_search .= sprintf('and call_method like (\'%' . %s . '%\') ', cmr_escape($post->call_method));
// }
// 
// if(strlen($post->state) > 0){
// //     $str_search .= 'and state like (\'%' . $post->state . '%\') ';
//     $str_search .= sprintf('and state like (\'%' . %s . '%\') ', cmr_escape($post->state));
// }
// 
// if(strlen($post->state_now) > 0){
// //     $str_search .= 'and state_now like (\'%' . $post->state_now . '%\') ';
//     $str_search .= sprintf('and state_now like (\'%' . %s . '%\') ', cmr_escape($post->state_now));
// }
// 
// if(strlen($post->assign_to) > 0){
// //     $str_search .= 'and assign_to like (\'%' . $post->assign_to . '%\') ';
//     $str_search .= sprintf('and assign_to like (\'%' . %s . '%\') ', cmr_escape($post->assign_to));
// }
// 
// if(strlen($post->list_user_impact) > 0){
// //     $str_search .= 'and list_user_impact like (\'%' . $post->list_user_impact . '%\') ';
//     $str_search .= sprintf('and list_user_impact like (\'%' . %s . '%\') ', cmr_escape($post->list_user_impact));
// }
// 
// if(strlen($post->list_group_impact) > 0){
// //     $str_search .= 'and list_group_impact like (\'%' . $post->list_group_impact . '%\') ';
//     $str_search .= sprintf('and list_group_impact like (\'%' . %s . '%\') ', cmr_escape($post->list_group_impact));
// }
// 
// if(strlen($post->list_asset_impact) > 0){
// //     $str_search .= 'and list_asset_impact like (\'%' . $post->list_asset_impact . '%\') ';
//     $str_search .= sprintf('and list_asset_impact like (\'%' . %s . '%\') ', cmr_escape($post->list_asset_impact));
// }
// 
// if(strlen($post->severity) > 0){
// //     $str_search .= 'and severity like (\'%' . $post->severity . '%\') ';
//     $str_search .= sprintf('and severity like (\'%' . %s . '%\') ', cmr_escape($post->severity));
// }
// 
// if(strlen($post->sla) > 0){
// //     $str_search .= 'and sla like (\'%' . $post->sla . '%\') ';
//     $str_search .= sprintf('and sla like (\'%' . %s . '%\') ', cmr_escape($post->sla));
// }
// 
// if(strlen($post->mail_title) > 0){
// //     $str_search .= 'and mail_title like (\'%' . $post->mail_title . '%\') ';
//     $str_search .= sprintf('and mail_title like (\'%' . %s . '%\') ', cmr_escape($post->mail_title));
// }
// 
// if(strlen($post->mail_from) > 0){
// //     $str_search .= 'and mail_from like (\'%' . $post->mail_from . '%\') ';
//     $str_search .= sprintf('and mail_from like (\'%' . %s . '%\') ', cmr_escape($post->mail_from));
// }
// 
// if(strlen($post->mail_to) > 0){
// //     $str_search .= 'and mail_to like (\'%' . $post->mail_to . '%\') ';
//     $str_search .= sprintf('and mail_to like (\'%' . %s . '%\') ', cmr_escape($post->mail_to));
// }
// 
// if(strlen($post->mail_cc) > 0){
// //     $str_search .= 'and mail_cc like (\'%' . $post->mail_cc . '%\') ';
//     $str_search .= sprintf('and mail_cc like (\'%' . %s . '%\') ', cmr_escape($post->mail_cc));
// }
// 
// if(strlen($post->mail_bcc) > 0){
// //     $str_search .= 'and mail_bcc like (\'%' . $post->mail_bcc . '%\') ';
//     $str_search .= sprintf('and mail_bcc like (\'%' . %s . '%\') ', cmr_escape($post->mail_bcc));
// }
// 
// if(strlen($post->attach) > 0){
// //     $str_search .= 'and attach like (\'%' . $post->attach . '%\') ';
//     $str_search .= sprintf('and attach like (\'%' . %s . '%\') ', cmr_escape($post->attach));
// }
// 
// if(strlen($post->type) > 0){
// //     $str_search .= 'and type like (\'%' . $post->type . '%\') ';
//     $str_search .= sprintf('and type like (\'%' . %s . '%\') ', cmr_escape($post->type));
// }
// 
// if(strlen($post->text) > 0){
// //     $str_search .= 'and text like (\'%' . $post->text . '%\') ';
//     $str_search .= sprintf('and text like (\'%' . %s . '%\') ', cmr_escape($post->text));
// }
// 
// if(strlen($post->mail_text) > 0){
// //     $str_search .= 'and mail_text like (\'%' . $post->mail_text . '%\') ';
//     $str_search .= sprintf('and mail_text like (\'%' . %s . '%\') ', cmr_escape($post->mail_text));
// }
// 
// if(strlen($post->my_master) > 0){
// //     $str_search .= 'and my_master like (\'%' . $post->my_master . '%\') ';
//     $str_search .= sprintf('and my_master like (\'%' . %s . '%\') ', cmr_escape($post->my_master));
// }
// 
// if(strlen($post->allow_type) > 0){
// //     $str_search .= 'and allow_type like (\'%' . $post->allow_type . '%\') ';
//     $str_search .= sprintf('and allow_type like (\'%' . %s . '%\') ', cmr_escape($post->allow_type));
// }
// 
// if(strlen($post->allow_email) > 0){
// //     $str_search .= 'and allow_email like (\'%' . $post->allow_email . '%\') ';
//     $str_search .= sprintf('and allow_email like (\'%' . %s . '%\') ', cmr_escape($post->allow_email));
// }
// 
// if(strlen($post->allow_groups) > 0){
// //     $str_search .= 'and allow_groups like (\'%' . $post->allow_groups . '%\') ';
//     $str_search .= sprintf('and allow_groups like (\'%' . %s . '%\') ', cmr_escape($post->allow_groups));
// }
// 
// if(strlen($post->comment) > 0){
// //     $str_search .= 'and comment like (\'%' . $post->comment . '%\') ';
//     $str_search .= sprintf('and comment like (\'%' . %s . '%\') ', cmr_escape($post->comment));
// }
// 
// if(strlen($post->date_time) > 0){
// //     $str_search .= 'and date_time like (\'%' . $post->date_time . '%\') ';
//     $str_search .= sprintf('and date_time like (\'%' . %s . '%\') ', cmr_escape($post->date_time));
// }
// 

// $str_search .= ' ) ';

$cmr->query[0]  = $post->query_search();


// $cmr->post_var["sql_ticket"] = $str_search;
$cmr->post_var["sql_ticket"] = $cmr->query[0];


$cmr->post_var['search_text'] .= '<b>id</b>=' . $post->id . '; ';

$cmr->post_var['search_text'] .= '<b>number</b>=' . $post->number . '; ';

$cmr->post_var['search_text'] .= '<b>lang</b>=' . $post->lang . '; ';

$cmr->post_var['search_text'] .= '<b>title</b>=' . $post->title . '; ';

$cmr->post_var['search_text'] .= '<b>work_by</b>=' . $post->work_by . '; ';

$cmr->post_var['search_text'] .= '<b>call_log_user</b>=' . $post->call_log_user . '; ';

$cmr->post_var['search_text'] .= '<b>call_log_group</b>=' . $post->call_log_group . '; ';

$cmr->post_var['search_text'] .= '<b>call_method</b>=' . $post->call_method . '; ';

$cmr->post_var['search_text'] .= '<b>state</b>=' . $post->state . '; ';

$cmr->post_var['search_text'] .= '<b>state_now</b>=' . $post->state_now . '; ';

$cmr->post_var['search_text'] .= '<b>assign_to</b>=' . $post->assign_to . '; ';

$cmr->post_var['search_text'] .= '<b>list_user_impact</b>=' . $post->list_user_impact . '; ';

$cmr->post_var['search_text'] .= '<b>list_group_impact</b>=' . $post->list_group_impact . '; ';

$cmr->post_var['search_text'] .= '<b>list_asset_impact</b>=' . $post->list_asset_impact . '; ';

$cmr->post_var['search_text'] .= '<b>severity</b>=' . $post->severity . '; ';

$cmr->post_var['search_text'] .= '<b>sla</b>=' . $post->sla . '; ';

$cmr->post_var['search_text'] .= '<b>mail_title</b>=' . $post->mail_title . '; ';

$cmr->post_var['search_text'] .= '<b>mail_from</b>=' . $post->mail_from . '; ';

$cmr->post_var['search_text'] .= '<b>mail_to</b>=' . $post->mail_to . '; ';

$cmr->post_var['search_text'] .= '<b>mail_cc</b>=' . $post->mail_cc . '; ';

$cmr->post_var['search_text'] .= '<b>mail_bcc</b>=' . $post->mail_bcc . '; ';

$cmr->post_var['search_text'] .= '<b>attach</b>=' . $post->attach . '; ';

$cmr->post_var['search_text'] .= '<b>type</b>=' . $post->type . '; ';

$cmr->post_var['search_text'] .= '<b>text</b>=' . $post->text . '; ';

$cmr->post_var['search_text'] .= '<b>mail_text</b>=' . $post->mail_text . '; ';

$cmr->post_var['search_text'] .= '<b>my_master</b>=' . $post->my_master . '; ';

$cmr->post_var['search_text'] .= '<b>allow_type</b>=' . $post->allow_type . '; ';

$cmr->post_var['search_text'] .= '<b>allow_email</b>=' . $post->allow_email . '; ';

$cmr->post_var['search_text'] .= '<b>allow_groups</b>=' . $post->allow_groups . '; ';

$cmr->post_var['search_text'] .= '<b>comment</b>=' . $post->comment . '; ';

$cmr->post_var['search_text'] .= '<b>date_time</b>=' . $post->date_time . '; ';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "ticket', '" . $cmr->get_session("id") . "' ,'search'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// Configuration of the next windows to be view
// $cmr->page["middle1"] = "view_search.php";

// -----------------------------------------------------
// $cmr->page["middle2"] = "modules/view_search.php";
// $post->close();
// -----------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["sql"] = $cmr->post_var["sql_ticket"];
$cmr->page["middle1"] = $cmr->get_path("module") . "modules/view_search.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
