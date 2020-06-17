<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_update_administrate.php
 * ---------
  * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_update_administrate.php,Ver 3.0  2011-Jun-Tue 10:23:18
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
/*$need_type= $cmr->get_conf("cmr_admin_type");*/
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
/*cmr->session["pre_match"].="";*/
// !!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "administrate"://----can delete or call another function for work ----
$action = trim(get_post("action"));
$on = trim(get_post("on"));


if(get_post('account')){
    $account = get_post('account', 'post', $cmr->session['pre_match']); //Getting variable [$account] sended by form [administrate.php]
}

if(get_post('asset')){
    $asset = get_post('asset', 'post', $cmr->session['pre_match']); //Getting variable [$asset] sended by form [administrate.php]
}

if(get_post('certificate')){
    $certificate = get_post('certificate', 'post', $cmr->session['pre_match']); //Getting variable [$certificate] sended by form [administrate.php]
}

if(get_post('code')){
    $code = get_post('code', 'post', $cmr->session['pre_match']); //Getting variable [$code] sended by form [administrate.php]
}

if(get_post('command')){
    $command = get_post('command', 'post', $cmr->session['pre_match']); //Getting variable [$command] sended by form [administrate.php]
}

if(get_post('contact')){
    $contact = get_post('contact', 'post', $cmr->session['pre_match']); //Getting variable [$contact] sended by form [administrate.php]
}

if(get_post('cron')){
    $cron = get_post('cron', 'post', $cmr->session['pre_match']); //Getting variable [$cron] sended by form [administrate.php]
}

if(get_post('download')){
    $download = get_post('download', 'post', $cmr->session['pre_match']); //Getting variable [$download] sended by form [administrate.php]
}

if(get_post('email')){
    $email = get_post('email', 'post', $cmr->session['pre_match']); //Getting variable [$email] sended by form [administrate.php]
}

if(get_post('escalation')){
    $escalation = get_post('escalation', 'post', $cmr->session['pre_match']); //Getting variable [$escalation] sended by form [administrate.php]
}

if(get_post('faq')){
    $faq = get_post('faq', 'post', $cmr->session['pre_match']); //Getting variable [$faq] sended by form [administrate.php]
}

if(get_post('father_groups')){
    $father_groups = get_post('father_groups', 'post', $cmr->session['pre_match']); //Getting variable [$father_groups] sended by form [administrate.php]
}

if(get_post('forum')){
    $forum = get_post('forum', 'post', $cmr->session['pre_match']); //Getting variable [$forum] sended by form [administrate.php]
}

if(get_post('generator')){
    $generator = get_post('generator', 'post', $cmr->session['pre_match']); //Getting variable [$generator] sended by form [administrate.php]
}

if(get_post('groups')){
    $groups = get_post('groups', 'post', $cmr->session['pre_match']); //Getting variable [$groups] sended by form [administrate.php]
}

if(get_post('message')){
    $message = get_post('message', 'post', $cmr->session['pre_match']); //Getting variable [$message] sended by form [administrate.php]
}

if(get_post('message_read')){
    $message_read = get_post('message_read', 'post', $cmr->session['pre_match']); //Getting variable [$message_read] sended by form [administrate.php]
}

if(get_post('nagios')){
    $nagios = get_post('nagios', 'post', $cmr->session['pre_match']); //Getting variable [$nagios] sended by form [administrate.php]
}

if(get_post('nessus')){
    $nessus = get_post('nessus', 'post', $cmr->session['pre_match']); //Getting variable [$nessus] sended by form [administrate.php]
}

if(get_post('rss')){
    $rss = get_post('rss', 'post', $cmr->session['pre_match']); //Getting variable [$rss] sended by form [administrate.php]
}

if(get_post('services')){
    $services = get_post('services', 'post', $cmr->session['pre_match']); //Getting variable [$services] sended by form [administrate.php]
}

if(get_post('session')){
    $session = get_post('session', 'post', $cmr->session['pre_match']); //Getting variable [$session] sended by form [administrate.php]
}

if(get_post('sla')){
    $sla = get_post('sla', 'post', $cmr->session['pre_match']); //Getting variable [$sla] sended by form [administrate.php]
}

if(get_post('software')){
    $software = get_post('software', 'post', $cmr->session['pre_match']); //Getting variable [$software] sended by form [administrate.php]
}

if(get_post('statistic')){
    $statistic = get_post('statistic', 'post', $cmr->session['pre_match']); //Getting variable [$statistic] sended by form [administrate.php]
}

if(get_post('ticket')){
    $ticket = get_post('ticket', 'post', $cmr->session['pre_match']); //Getting variable [$ticket] sended by form [administrate.php]
}

if(get_post('ticket_read')){
    $ticket_read = get_post('ticket_read', 'post', $cmr->session['pre_match']); //Getting variable [$ticket_read] sended by form [administrate.php]
}

if(get_post('translate')){
    $translate = get_post('translate', 'post', $cmr->session['pre_match']); //Getting variable [$translate] sended by form [administrate.php]
}

if(get_post('user')){
    $user = get_post('user', 'post', $cmr->session['pre_match']); //Getting variable [$user] sended by form [administrate.php]
}

if(get_post('user_groups')){
    $user_groups = get_post('user_groups', 'post', $cmr->session['pre_match']); //Getting variable [$user_groups] sended by form [administrate.php]
}

if(get_post('x_code_source')){
    $x_code_source = get_post('x_code_source', 'post', $cmr->session['pre_match']); //Getting variable [$x_code_source] sended by form [administrate.php]
}

if(get_post('x_comment')){
    $x_comment = get_post('x_comment', 'post', $cmr->session['pre_match']); //Getting variable [$x_comment] sended by form [administrate.php]
}

if(get_post('x_contents')){
    $x_contents = get_post('x_contents', 'post', $cmr->session['pre_match']); //Getting variable [$x_contents] sended by form [administrate.php]
}

if(get_post('x_files')){
    $x_files = get_post('x_files', 'post', $cmr->session['pre_match']); //Getting variable [$x_files] sended by form [administrate.php]
}

if(get_post('x_images')){
    $x_images = get_post('x_images', 'post', $cmr->session['pre_match']); //Getting variable [$x_images] sended by form [administrate.php]
}

if(get_post('x_links')){
    $x_links = get_post('x_links', 'post', $cmr->session['pre_match']); //Getting variable [$x_links] sended by form [administrate.php]
}

if(get_post('x_menu')){
    $x_menu = get_post('x_menu', 'post', $cmr->session['pre_match']); //Getting variable [$x_menu] sended by form [administrate.php]
}

if(get_post('x_modules')){
    $x_modules = get_post('x_modules', 'post', $cmr->session['pre_match']); //Getting variable [$x_modules] sended by form [administrate.php]
}

if(get_post('x_object')){
    $x_object = get_post('x_object', 'post', $cmr->session['pre_match']); //Getting variable [$x_object] sended by form [administrate.php]
}

if(get_post('x_pages')){
    $x_pages = get_post('x_pages', 'post', $cmr->session['pre_match']); //Getting variable [$x_pages] sended by form [administrate.php]
}

if(get_post('x_sites')){
    $x_sites = get_post('x_sites', 'post', $cmr->session['pre_match']); //Getting variable [$x_sites] sended by form [administrate.php]
}

if(get_post('x_template')){
    $x_template = get_post('x_template', 'post', $cmr->session['pre_match']); //Getting variable [$x_template] sended by form [administrate.php]
}

if(get_post('x_text')){
    $x_text = get_post('x_text', 'post', $cmr->session['pre_match']); //Getting variable [$x_text] sended by form [administrate.php]
}


$cmr->query[0] = ""; //strtolower()
if($on == "sql"){
    $sql = get_post("sql");
    $sql = cmr_search_replace('[\]*["]+', "\"", $sql);
    $sql = cmr_search_replace("[\]*[']+", "'", $sql);
    $cmr->post_var["sql"] = $sql;
    $cmr->page['middle1'] = "modules/admin/preview_sql.php";
}else{
    switch ($action){
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "new":
            switch ($on){
                
                // ------------------
                case 'account' : $cmr->page['middle1'] = 'modules/new_account.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset' : $cmr->page['middle1'] = 'modules/new_asset.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate' : $cmr->page['middle1'] = 'modules/new_certificate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'code' : $cmr->page['middle1'] = 'modules/new_code.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'command' : $cmr->page['middle1'] = 'modules/new_command.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact' : $cmr->page['middle1'] = 'modules/new_contact.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron' : $cmr->page['middle1'] = 'modules/new_cron.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'download' : $cmr->page['middle1'] = 'modules/new_download.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'email' : $cmr->page['middle1'] = 'modules/new_email.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation' : $cmr->page['middle1'] = 'modules/new_escalation.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq' : $cmr->page['middle1'] = 'modules/new_faq.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups' : $cmr->page['middle1'] = 'modules/new_father_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum' : $cmr->page['middle1'] = 'modules/new_forum.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator' : $cmr->page['middle1'] = 'modules/new_generator.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups' : $cmr->page['middle1'] = 'modules/new_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message' : $cmr->page['middle1'] = 'modules/new_message.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read' : $cmr->page['middle1'] = 'modules/new_message_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios' : $cmr->page['middle1'] = 'modules/new_nagios.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus' : $cmr->page['middle1'] = 'modules/new_nessus.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss' : $cmr->page['middle1'] = 'modules/new_rss.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'services' : $cmr->page['middle1'] = 'modules/new_services.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'session' : $cmr->page['middle1'] = 'modules/new_session.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla' : $cmr->page['middle1'] = 'modules/new_sla.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'software' : $cmr->page['middle1'] = 'modules/new_software.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic' : $cmr->page['middle1'] = 'modules/new_statistic.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket' : $cmr->page['middle1'] = 'modules/new_ticket.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read' : $cmr->page['middle1'] = 'modules/new_ticket_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate' : $cmr->page['middle1'] = 'modules/new_translate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user' : $cmr->page['middle1'] = 'modules/new_user.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups' : $cmr->page['middle1'] = 'modules/new_user_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source' : $cmr->page['middle1'] = 'modules/new_x_code_source.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment' : $cmr->page['middle1'] = 'modules/new_x_comment.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents' : $cmr->page['middle1'] = 'modules/new_x_contents.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files' : $cmr->page['middle1'] = 'modules/new_x_files.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images' : $cmr->page['middle1'] = 'modules/new_x_images.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links' : $cmr->page['middle1'] = 'modules/new_x_links.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu' : $cmr->page['middle1'] = 'modules/new_x_menu.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules' : $cmr->page['middle1'] = 'modules/new_x_modules.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object' : $cmr->page['middle1'] = 'modules/new_x_object.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages' : $cmr->page['middle1'] = 'modules/new_x_pages.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites' : $cmr->page['middle1'] = 'modules/new_x_sites.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template' : $cmr->page['middle1'] = 'modules/new_x_template.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text' : $cmr->page['middle1'] = 'modules/new_x_text.php';
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }
            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "update":;
            switch ($on){
                
                // ------------------
                case 'account':
                    switch ($account){
                        case '?' : $cmr->page['middle1'] = 'modules/view_account.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_account.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_account.php';
                            $cmr->post_var['id_account'] = $account;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset':
                    switch ($asset){
                        case '?' : $cmr->page['middle1'] = 'modules/view_asset.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_asset.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_asset.php';
                            $cmr->post_var['id_asset'] = $asset;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate':
                    switch ($certificate){
                        case '?' : $cmr->page['middle1'] = 'modules/view_certificate.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_certificate.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_certificate.php';
                            $cmr->post_var['id_certificate'] = $certificate;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'code':
                    switch ($code){
                        case '?' : $cmr->page['middle1'] = 'modules/view_code.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_code.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_code.php';
                            $cmr->post_var['id_code'] = $code;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'command':
                    switch ($command){
                        case '?' : $cmr->page['middle1'] = 'modules/view_command.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_command.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_command.php';
                            $cmr->post_var['id_command'] = $command;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact':
                    switch ($contact){
                        case '?' : $cmr->page['middle1'] = 'modules/view_contact.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_contact.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_contact.php';
                            $cmr->post_var['id_contact'] = $contact;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron':
                    switch ($cron){
                        case '?' : $cmr->page['middle1'] = 'modules/view_cron.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_cron.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_cron.php';
                            $cmr->post_var['id_cron'] = $cron;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'download':
                    switch ($download){
                        case '?' : $cmr->page['middle1'] = 'modules/view_download.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_download.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_download.php';
                            $cmr->post_var['id_download'] = $download;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'email':
                    switch ($email){
                        case '?' : $cmr->page['middle1'] = 'modules/view_email.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_email.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_email.php';
                            $cmr->post_var['id_email'] = $email;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation':
                    switch ($escalation){
                        case '?' : $cmr->page['middle1'] = 'modules/view_escalation.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_escalation.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_escalation.php';
                            $cmr->post_var['id_escalation'] = $escalation;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq':
                    switch ($faq){
                        case '?' : $cmr->page['middle1'] = 'modules/view_faq.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_faq.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_faq.php';
                            $cmr->post_var['id_faq'] = $faq;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups':
                    switch ($father_groups){
                        case '?' : $cmr->page['middle1'] = 'modules/view_father_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_father_groups.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_father_groups.php';
                            $cmr->post_var['id_father_groups'] = $father_groups;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum':
                    switch ($forum){
                        case '?' : $cmr->page['middle1'] = 'modules/view_forum.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_forum.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_forum.php';
                            $cmr->post_var['id_forum'] = $forum;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator':
                    switch ($generator){
                        case '?' : $cmr->page['middle1'] = 'modules/view_generator.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_generator.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_generator.php';
                            $cmr->post_var['id_generator'] = $generator;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups':
                    switch ($groups){
                        case '?' : $cmr->page['middle1'] = 'modules/view_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_groups.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_groups.php';
                            $cmr->post_var['id_groups'] = $groups;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'message':
                    switch ($message){
                        case '?' : $cmr->page['middle1'] = 'modules/view_message.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_message.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_message.php';
                            $cmr->post_var['id_message'] = $message;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read':
                    switch ($message_read){
                        case '?' : $cmr->page['middle1'] = 'modules/view_message_read.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_message_read.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_message_read.php';
                            $cmr->post_var['id_message_read'] = $message_read;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios':
                    switch ($nagios){
                        case '?' : $cmr->page['middle1'] = 'modules/view_nagios.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_nagios.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_nagios.php';
                            $cmr->post_var['id_nagios'] = $nagios;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus':
                    switch ($nessus){
                        case '?' : $cmr->page['middle1'] = 'modules/view_nessus.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_nessus.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_nessus.php';
                            $cmr->post_var['id_nessus'] = $nessus;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss':
                    switch ($rss){
                        case '?' : $cmr->page['middle1'] = 'modules/view_rss.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_rss.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_rss.php';
                            $cmr->post_var['id_rss'] = $rss;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'services':
                    switch ($services){
                        case '?' : $cmr->page['middle1'] = 'modules/view_services.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_services.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_services.php';
                            $cmr->post_var['id_services'] = $services;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'session':
                    switch ($session){
                        case '?' : $cmr->page['middle1'] = 'modules/view_session.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_session.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_session.php';
                            $cmr->post_var['id_session'] = $session;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla':
                    switch ($sla){
                        case '?' : $cmr->page['middle1'] = 'modules/view_sla.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_sla.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_sla.php';
                            $cmr->post_var['id_sla'] = $sla;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'software':
                    switch ($software){
                        case '?' : $cmr->page['middle1'] = 'modules/view_software.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_software.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_software.php';
                            $cmr->post_var['id_software'] = $software;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic':
                    switch ($statistic){
                        case '?' : $cmr->page['middle1'] = 'modules/view_statistic.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_statistic.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_statistic.php';
                            $cmr->post_var['id_statistic'] = $statistic;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket':
                    switch ($ticket){
                        case '?' : $cmr->page['middle1'] = 'modules/view_ticket.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_ticket.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_ticket.php';
                            $cmr->post_var['id_ticket'] = $ticket;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read':
                    switch ($ticket_read){
                        case '?' : $cmr->page['middle1'] = 'modules/view_ticket_read.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_ticket_read.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_ticket_read.php';
                            $cmr->post_var['id_ticket_read'] = $ticket_read;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate':
                    switch ($translate){
                        case '?' : $cmr->page['middle1'] = 'modules/view_translate.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_translate.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_translate.php';
                            $cmr->post_var['id_translate'] = $translate;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'user':
                    switch ($user){
                        case '?' : $cmr->page['middle1'] = 'modules/view_user.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_user.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_user.php';
                            $cmr->post_var['id_user'] = $user;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups':
                    switch ($user_groups){
                        case '?' : $cmr->page['middle1'] = 'modules/view_user_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_user_groups.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_user_groups.php';
                            $cmr->post_var['id_user_groups'] = $user_groups;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source':
                    switch ($x_code_source){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_code_source.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_code_source.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_code_source.php';
                            $cmr->post_var['id_x_code_source'] = $x_code_source;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment':
                    switch ($x_comment){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_comment.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_comment.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_comment.php';
                            $cmr->post_var['id_x_comment'] = $x_comment;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents':
                    switch ($x_contents){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_contents.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_contents.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_contents.php';
                            $cmr->post_var['id_x_contents'] = $x_contents;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files':
                    switch ($x_files){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_files.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_files.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_files.php';
                            $cmr->post_var['id_x_files'] = $x_files;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images':
                    switch ($x_images){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_images.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_images.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_images.php';
                            $cmr->post_var['id_x_images'] = $x_images;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links':
                    switch ($x_links){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_links.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_links.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_links.php';
                            $cmr->post_var['id_x_links'] = $x_links;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu':
                    switch ($x_menu){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_menu.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_menu.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_menu.php';
                            $cmr->post_var['id_x_menu'] = $x_menu;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules':
                    switch ($x_modules){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_modules.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_modules.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_modules.php';
                            $cmr->post_var['id_x_modules'] = $x_modules;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object':
                    switch ($x_object){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_object.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_object.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_object.php';
                            $cmr->post_var['id_x_object'] = $x_object;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages':
                    switch ($x_pages){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_pages.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_pages.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_pages.php';
                            $cmr->post_var['id_x_pages'] = $x_pages;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites':
                    switch ($x_sites){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_sites.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_sites.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_sites.php';
                            $cmr->post_var['id_x_sites'] = $x_sites;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template':
                    switch ($x_template){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_template.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_template.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_template.php';
                            $cmr->post_var['id_x_template'] = $x_template;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text':
                    switch ($x_text){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_text.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_text.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_x_text.php';
                            $cmr->post_var['id_x_text'] = $x_text;
                            break;
                    }
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }
            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "delete":;
            switch ($on){
                
                // ------------------
                case 'account':
                    switch ($account){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_account.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_account.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'account where id=' . $account . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset':
                    switch ($asset){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_asset.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_asset.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'asset where id=' . $asset . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate':
                    switch ($certificate){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_certificate.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_certificate.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'certificate where id=' . $certificate . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'code':
                    switch ($code){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_code.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_code.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'code where id=' . $code . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'command':
                    switch ($command){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_command.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_command.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'command where id=' . $command . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact':
                    switch ($contact){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_contact.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_contact.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'contact where id=' . $contact . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron':
                    switch ($cron){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_cron.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_cron.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'cron where id=' . $cron . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'download':
                    switch ($download){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_download.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_download.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'download where id=' . $download . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'email':
                    switch ($email){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_email.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_email.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'email where id=' . $email . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation':
                    switch ($escalation){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_escalation.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_escalation.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'escalation where id=' . $escalation . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq':
                    switch ($faq){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_faq.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_faq.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'faq where id=' . $faq . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups':
                    switch ($father_groups){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_father_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_father_groups.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'father_groups where id=' . $father_groups . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum':
                    switch ($forum){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_forum.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_forum.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'forum where id=' . $forum . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator':
                    switch ($generator){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_generator.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_generator.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'generator where id=' . $generator . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups':
                    switch ($groups){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_groups.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'groups where id=' . $groups . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'message':
                    switch ($message){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_message.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_message.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'message where id=' . $message . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read':
                    switch ($message_read){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_message_read.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_message_read.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'message_read where id=' . $message_read . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios':
                    switch ($nagios){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_nagios.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_nagios.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'nagios where id=' . $nagios . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus':
                    switch ($nessus){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_nessus.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_nessus.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'nessus where id=' . $nessus . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss':
                    switch ($rss){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_rss.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_rss.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'rss where id=' . $rss . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'services':
                    switch ($services){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_services.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_services.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'services where id=' . $services . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'session':
                    switch ($session){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_session.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_session.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'session where id=' . $session . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla':
                    switch ($sla){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_sla.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_sla.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'sla where id=' . $sla . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'software':
                    switch ($software){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_software.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_software.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'software where id=' . $software . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic':
                    switch ($statistic){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_statistic.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_statistic.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'statistic where id=' . $statistic . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket':
                    switch ($ticket){
                        case '?' : $cmr->page['middle1'] = 'modules/view_ticket.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_ticket.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'ticket where id=' . $ticket . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read':
                    switch ($ticket_read){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_ticket_read.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_ticket_read.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'ticket_read where id=' . $ticket_read . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate':
                    switch ($translate){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_translate.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_translate.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'translate where id=' . $translate . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'user':
                    switch ($user){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_user.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_user.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'user where id=' . $user . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups':
                    switch ($user_groups){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_user_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_user_groups.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'user_groups where id=' . $user_groups . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source':
                    switch ($x_code_source){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_code_source.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_code_source.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_code_source where id=' . $x_code_source . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment':
                    switch ($x_comment){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_comment.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_comment.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_comment where id=' . $x_comment . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents':
                    switch ($x_contents){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_contents.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_contents.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_contents where id=' . $x_contents . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files':
                    switch ($x_files){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_files.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_files.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_files where id=' . $x_files . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images':
                    switch ($x_images){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_images.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_images.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_images where id=' . $x_images . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links':
                    switch ($x_links){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_links.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_links.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_links where id=' . $x_links . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu':
                    switch ($x_menu){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_menu.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_menu.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_menu where id=' . $x_menu . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules':
                    switch ($x_modules){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_modules.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_modules.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_modules where id=' . $x_modules . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object':
                    switch ($x_object){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_object.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_object.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_object where id=' . $x_object . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages':
                    switch ($x_pages){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_pages.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_pages.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_pages where id=' . $x_pages . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites':
                    switch ($x_sites){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_sites.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_sites.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_sites where id=' . $x_sites . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template':
                    switch ($x_template){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_template.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_template.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_template where id=' . $x_template . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text':
                    switch ($x_text){
                        case '?' : $cmr->page['middle1'] = 'modules/delete_x_text.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/delete_x_text.php';
                            break;

                        default:
                            $cmr->query[0] = 'delete from ' . $cmr->config['cmr_table_prefix'] . 'x_text where id=' . $x_text . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }
            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "view":;
            switch ($on){
                
                // ------------------
                case 'account':
                    switch ($account){
                        case '?' : $cmr->page['middle1'] = 'modules/view_account.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_account.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_account.php';
                            $cmr->post_var['id_account'] = $account;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset':
                    switch ($asset){
                        case '?' : $cmr->page['middle1'] = 'modules/view_asset.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_asset.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_asset.php';
                            $cmr->post_var['id_asset'] = $asset;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate':
                    switch ($certificate){
                        case '?' : $cmr->page['middle1'] = 'modules/view_certificate.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_certificate.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_certificate.php';
                            $cmr->post_var['id_certificate'] = $certificate;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'code':
                    switch ($code){
                        case '?' : $cmr->page['middle1'] = 'modules/view_code.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_code.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_code.php';
                            $cmr->post_var['id_code'] = $code;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'command':
                    switch ($command){
                        case '?' : $cmr->page['middle1'] = 'modules/view_command.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_command.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_command.php';
                            $cmr->post_var['id_command'] = $command;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact':
                    switch ($contact){
                        case '?' : $cmr->page['middle1'] = 'modules/view_contact.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_contact.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_contact.php';
                            $cmr->post_var['id_contact'] = $contact;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron':
                    switch ($cron){
                        case '?' : $cmr->page['middle1'] = 'modules/view_cron.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_cron.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_cron.php';
                            $cmr->post_var['id_cron'] = $cron;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'download':
                    switch ($download){
                        case '?' : $cmr->page['middle1'] = 'modules/view_download.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_download.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_download.php';
                            $cmr->post_var['id_download'] = $download;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'email':
                    switch ($email){
                        case '?' : $cmr->page['middle1'] = 'modules/view_email.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_email.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_email.php';
                            $cmr->post_var['id_email'] = $email;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation':
                    switch ($escalation){
                        case '?' : $cmr->page['middle1'] = 'modules/view_escalation.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_escalation.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_escalation.php';
                            $cmr->post_var['id_escalation'] = $escalation;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq':
                    switch ($faq){
                        case '?' : $cmr->page['middle1'] = 'modules/view_faq.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_faq.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_faq.php';
                            $cmr->post_var['id_faq'] = $faq;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups':
                    switch ($father_groups){
                        case '?' : $cmr->page['middle1'] = 'modules/view_father_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_father_groups.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_father_groups.php';
                            $cmr->post_var['id_father_groups'] = $father_groups;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum':
                    switch ($forum){
                        case '?' : $cmr->page['middle1'] = 'modules/view_forum.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_forum.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_forum.php';
                            $cmr->post_var['id_forum'] = $forum;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator':
                    switch ($generator){
                        case '?' : $cmr->page['middle1'] = 'modules/view_generator.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_generator.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_generator.php';
                            $cmr->post_var['id_generator'] = $generator;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups':
                    switch ($groups){
                        case '?' : $cmr->page['middle1'] = 'modules/view_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_groups.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_groups.php';
                            $cmr->post_var['id_groups'] = $groups;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'message':
                    switch ($message){
                        case '?' : $cmr->page['middle1'] = 'modules/view_message.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_message.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_message.php';
                            $cmr->post_var['id_message'] = $message;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read':
                    switch ($message_read){
                        case '?' : $cmr->page['middle1'] = 'modules/view_message_read.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_message_read.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_message_read.php';
                            $cmr->post_var['id_message_read'] = $message_read;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios':
                    switch ($nagios){
                        case '?' : $cmr->page['middle1'] = 'modules/view_nagios.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_nagios.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_nagios.php';
                            $cmr->post_var['id_nagios'] = $nagios;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus':
                    switch ($nessus){
                        case '?' : $cmr->page['middle1'] = 'modules/view_nessus.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_nessus.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_nessus.php';
                            $cmr->post_var['id_nessus'] = $nessus;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss':
                    switch ($rss){
                        case '?' : $cmr->page['middle1'] = 'modules/view_rss.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_rss.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_rss.php';
                            $cmr->post_var['id_rss'] = $rss;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'services':
                    switch ($services){
                        case '?' : $cmr->page['middle1'] = 'modules/view_services.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_services.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_services.php';
                            $cmr->post_var['id_services'] = $services;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'session':
                    switch ($session){
                        case '?' : $cmr->page['middle1'] = 'modules/view_session.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_session.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_session.php';
                            $cmr->post_var['id_session'] = $session;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla':
                    switch ($sla){
                        case '?' : $cmr->page['middle1'] = 'modules/view_sla.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_sla.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_sla.php';
                            $cmr->post_var['id_sla'] = $sla;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'software':
                    switch ($software){
                        case '?' : $cmr->page['middle1'] = 'modules/view_software.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_software.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_software.php';
                            $cmr->post_var['id_software'] = $software;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic':
                    switch ($statistic){
                        case '?' : $cmr->page['middle1'] = 'modules/view_statistic.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_statistic.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_statistic.php';
                            $cmr->post_var['id_statistic'] = $statistic;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket':
                    switch ($ticket){
                        case '?' : $cmr->page['middle1'] = 'modules/view_ticket.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_ticket.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_ticket.php';
                            $cmr->post_var['id_ticket'] = $ticket;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read':
                    switch ($ticket_read){
                        case '?' : $cmr->page['middle1'] = 'modules/view_ticket_read.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_ticket_read.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_ticket_read.php';
                            $cmr->post_var['id_ticket_read'] = $ticket_read;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate':
                    switch ($translate){
                        case '?' : $cmr->page['middle1'] = 'modules/view_translate.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_translate.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_translate.php';
                            $cmr->post_var['id_translate'] = $translate;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'user':
                    switch ($user){
                        case '?' : $cmr->page['middle1'] = 'modules/view_user.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_user.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_user.php';
                            $cmr->post_var['id_user'] = $user;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups':
                    switch ($user_groups){
                        case '?' : $cmr->page['middle1'] = 'modules/view_user_groups.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_user_groups.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_user_groups.php';
                            $cmr->post_var['id_user_groups'] = $user_groups;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source':
                    switch ($x_code_source){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_code_source.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_code_source.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_code_source.php';
                            $cmr->post_var['id_x_code_source'] = $x_code_source;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment':
                    switch ($x_comment){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_comment.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_comment.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_comment.php';
                            $cmr->post_var['id_x_comment'] = $x_comment;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents':
                    switch ($x_contents){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_contents.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_contents.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_contents.php';
                            $cmr->post_var['id_x_contents'] = $x_contents;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files':
                    switch ($x_files){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_files.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_files.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_files.php';
                            $cmr->post_var['id_x_files'] = $x_files;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images':
                    switch ($x_images){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_images.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_images.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_images.php';
                            $cmr->post_var['id_x_images'] = $x_images;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links':
                    switch ($x_links){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_links.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_links.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_links.php';
                            $cmr->post_var['id_x_links'] = $x_links;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu':
                    switch ($x_menu){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_menu.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_menu.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_menu.php';
                            $cmr->post_var['id_x_menu'] = $x_menu;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules':
                    switch ($x_modules){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_modules.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_modules.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_modules.php';
                            $cmr->post_var['id_x_modules'] = $x_modules;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object':
                    switch ($x_object){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_object.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_object.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_object.php';
                            $cmr->post_var['id_x_object'] = $x_object;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages':
                    switch ($x_pages){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_pages.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_pages.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_pages.php';
                            $cmr->post_var['id_x_pages'] = $x_pages;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites':
                    switch ($x_sites){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_sites.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_sites.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_sites.php';
                            $cmr->post_var['id_x_sites'] = $x_sites;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template':
                    switch ($x_template){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_template.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_template.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_template.php';
                            $cmr->post_var['id_x_template'] = $x_template;
                            break;
                    }
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text':
                    switch ($x_text){
                        case '?' : $cmr->page['middle1'] = 'modules/view_x_text.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_x_text.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_x_text.php';
                            $cmr->post_var['id_x_text'] = $x_text;
                            break;
                    }
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "search":;
            switch ($on){
                
                // ------------------
                case 'account' : $cmr->page['middle1'] = 'modules/search_account.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset' : $cmr->page['middle1'] = 'modules/search_asset.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate' : $cmr->page['middle1'] = 'modules/search_certificate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'code' : $cmr->page['middle1'] = 'modules/search_code.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'command' : $cmr->page['middle1'] = 'modules/search_command.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact' : $cmr->page['middle1'] = 'modules/search_contact.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron' : $cmr->page['middle1'] = 'modules/search_cron.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'download' : $cmr->page['middle1'] = 'modules/search_download.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'email' : $cmr->page['middle1'] = 'modules/search_email.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation' : $cmr->page['middle1'] = 'modules/search_escalation.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq' : $cmr->page['middle1'] = 'modules/search_faq.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups' : $cmr->page['middle1'] = 'modules/search_father_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum' : $cmr->page['middle1'] = 'modules/search_forum.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator' : $cmr->page['middle1'] = 'modules/search_generator.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups' : $cmr->page['middle1'] = 'modules/search_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message' : $cmr->page['middle1'] = 'modules/search_message.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read' : $cmr->page['middle1'] = 'modules/search_message_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios' : $cmr->page['middle1'] = 'modules/search_nagios.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus' : $cmr->page['middle1'] = 'modules/search_nessus.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss' : $cmr->page['middle1'] = 'modules/search_rss.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'services' : $cmr->page['middle1'] = 'modules/search_services.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'session' : $cmr->page['middle1'] = 'modules/search_session.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla' : $cmr->page['middle1'] = 'modules/search_sla.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'software' : $cmr->page['middle1'] = 'modules/search_software.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic' : $cmr->page['middle1'] = 'modules/search_statistic.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket' : $cmr->page['middle1'] = 'modules/search_ticket.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read' : $cmr->page['middle1'] = 'modules/search_ticket_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate' : $cmr->page['middle1'] = 'modules/search_translate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user' : $cmr->page['middle1'] = 'modules/search_user.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups' : $cmr->page['middle1'] = 'modules/search_user_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source' : $cmr->page['middle1'] = 'modules/search_x_code_source.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment' : $cmr->page['middle1'] = 'modules/search_x_comment.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents' : $cmr->page['middle1'] = 'modules/search_x_contents.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files' : $cmr->page['middle1'] = 'modules/search_x_files.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images' : $cmr->page['middle1'] = 'modules/search_x_images.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links' : $cmr->page['middle1'] = 'modules/search_x_links.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu' : $cmr->page['middle1'] = 'modules/search_x_menu.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules' : $cmr->page['middle1'] = 'modules/search_x_modules.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object' : $cmr->page['middle1'] = 'modules/search_x_object.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages' : $cmr->page['middle1'] = 'modules/search_x_pages.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites' : $cmr->page['middle1'] = 'modules/search_x_sites.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template' : $cmr->page['middle1'] = 'modules/search_x_template.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text' : $cmr->page['middle1'] = 'modules/search_x_text.php';
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "report":;
            switch ($on){
                
                // ------------------
                case 'account' : $cmr->page['middle1'] = 'modules/report_account.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset' : $cmr->page['middle1'] = 'modules/report_asset.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate' : $cmr->page['middle1'] = 'modules/report_certificate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'code' : $cmr->page['middle1'] = 'modules/report_code.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'command' : $cmr->page['middle1'] = 'modules/report_command.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact' : $cmr->page['middle1'] = 'modules/report_contact.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron' : $cmr->page['middle1'] = 'modules/report_cron.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'download' : $cmr->page['middle1'] = 'modules/report_download.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'email' : $cmr->page['middle1'] = 'modules/report_email.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation' : $cmr->page['middle1'] = 'modules/report_escalation.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq' : $cmr->page['middle1'] = 'modules/report_faq.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups' : $cmr->page['middle1'] = 'modules/report_father_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum' : $cmr->page['middle1'] = 'modules/report_forum.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator' : $cmr->page['middle1'] = 'modules/report_generator.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups' : $cmr->page['middle1'] = 'modules/report_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message' : $cmr->page['middle1'] = 'modules/report_message.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read' : $cmr->page['middle1'] = 'modules/report_message_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios' : $cmr->page['middle1'] = 'modules/report_nagios.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus' : $cmr->page['middle1'] = 'modules/report_nessus.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss' : $cmr->page['middle1'] = 'modules/report_rss.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'services' : $cmr->page['middle1'] = 'modules/report_services.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'session' : $cmr->page['middle1'] = 'modules/report_session.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla' : $cmr->page['middle1'] = 'modules/report_sla.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'software' : $cmr->page['middle1'] = 'modules/report_software.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic' : $cmr->page['middle1'] = 'modules/report_statistic.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket' : $cmr->page['middle1'] = 'modules/report_ticket.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read' : $cmr->page['middle1'] = 'modules/report_ticket_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate' : $cmr->page['middle1'] = 'modules/report_translate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user' : $cmr->page['middle1'] = 'modules/report_user.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups' : $cmr->page['middle1'] = 'modules/report_user_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source' : $cmr->page['middle1'] = 'modules/report_x_code_source.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment' : $cmr->page['middle1'] = 'modules/report_x_comment.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents' : $cmr->page['middle1'] = 'modules/report_x_contents.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files' : $cmr->page['middle1'] = 'modules/report_x_files.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images' : $cmr->page['middle1'] = 'modules/report_x_images.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links' : $cmr->page['middle1'] = 'modules/report_x_links.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu' : $cmr->page['middle1'] = 'modules/report_x_menu.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules' : $cmr->page['middle1'] = 'modules/report_x_modules.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object' : $cmr->page['middle1'] = 'modules/report_x_object.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages' : $cmr->page['middle1'] = 'modules/report_x_pages.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites' : $cmr->page['middle1'] = 'modules/report_x_sites.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template' : $cmr->page['middle1'] = 'modules/report_x_template.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text' : $cmr->page['middle1'] = 'modules/report_x_text.php';
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "config":;
            switch ($on){
                
                // ------------------
                case 'account' : $cmr->page['middle1'] = 'modules/config_account.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset' : $cmr->page['middle1'] = 'modules/config_asset.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate' : $cmr->page['middle1'] = 'modules/config_certificate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'code' : $cmr->page['middle1'] = 'modules/config_code.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'command' : $cmr->page['middle1'] = 'modules/config_command.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact' : $cmr->page['middle1'] = 'modules/config_contact.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron' : $cmr->page['middle1'] = 'modules/config_cron.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'download' : $cmr->page['middle1'] = 'modules/config_download.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'email' : $cmr->page['middle1'] = 'modules/config_email.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation' : $cmr->page['middle1'] = 'modules/config_escalation.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq' : $cmr->page['middle1'] = 'modules/config_faq.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups' : $cmr->page['middle1'] = 'modules/config_father_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum' : $cmr->page['middle1'] = 'modules/config_forum.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator' : $cmr->page['middle1'] = 'modules/config_generator.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups' : $cmr->page['middle1'] = 'modules/config_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message' : $cmr->page['middle1'] = 'modules/config_message.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read' : $cmr->page['middle1'] = 'modules/config_message_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios' : $cmr->page['middle1'] = 'modules/config_nagios.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus' : $cmr->page['middle1'] = 'modules/config_nessus.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss' : $cmr->page['middle1'] = 'modules/config_rss.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'services' : $cmr->page['middle1'] = 'modules/config_services.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'session' : $cmr->page['middle1'] = 'modules/config_session.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla' : $cmr->page['middle1'] = 'modules/config_sla.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'software' : $cmr->page['middle1'] = 'modules/config_software.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic' : $cmr->page['middle1'] = 'modules/config_statistic.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket' : $cmr->page['middle1'] = 'modules/config_ticket.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read' : $cmr->page['middle1'] = 'modules/config_ticket_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate' : $cmr->page['middle1'] = 'modules/config_translate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user' : $cmr->page['middle1'] = 'modules/config_user.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups' : $cmr->page['middle1'] = 'modules/config_user_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source' : $cmr->page['middle1'] = 'modules/config_x_code_source.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment' : $cmr->page['middle1'] = 'modules/config_x_comment.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents' : $cmr->page['middle1'] = 'modules/config_x_contents.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files' : $cmr->page['middle1'] = 'modules/config_x_files.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images' : $cmr->page['middle1'] = 'modules/config_x_images.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links' : $cmr->page['middle1'] = 'modules/config_x_links.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu' : $cmr->page['middle1'] = 'modules/config_x_menu.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules' : $cmr->page['middle1'] = 'modules/config_x_modules.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object' : $cmr->page['middle1'] = 'modules/config_x_object.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages' : $cmr->page['middle1'] = 'modules/config_x_pages.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites' : $cmr->page['middle1'] = 'modules/config_x_sites.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template' : $cmr->page['middle1'] = 'modules/config_x_template.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text' : $cmr->page['middle1'] = 'modules/config_x_text.php';
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "import":;
            switch ($on){
                
                // ------------------
                case 'account' : $cmr->page['middle1'] = 'modules/import_account.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset' : $cmr->page['middle1'] = 'modules/import_asset.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate' : $cmr->page['middle1'] = 'modules/import_certificate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'code' : $cmr->page['middle1'] = 'modules/import_code.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'command' : $cmr->page['middle1'] = 'modules/import_command.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact' : $cmr->page['middle1'] = 'modules/import_contact.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron' : $cmr->page['middle1'] = 'modules/import_cron.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'download' : $cmr->page['middle1'] = 'modules/import_download.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'email' : $cmr->page['middle1'] = 'modules/import_email.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation' : $cmr->page['middle1'] = 'modules/import_escalation.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq' : $cmr->page['middle1'] = 'modules/import_faq.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups' : $cmr->page['middle1'] = 'modules/import_father_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum' : $cmr->page['middle1'] = 'modules/import_forum.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator' : $cmr->page['middle1'] = 'modules/import_generator.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups' : $cmr->page['middle1'] = 'modules/import_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message' : $cmr->page['middle1'] = 'modules/import_message.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read' : $cmr->page['middle1'] = 'modules/import_message_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios' : $cmr->page['middle1'] = 'modules/import_nagios.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus' : $cmr->page['middle1'] = 'modules/import_nessus.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss' : $cmr->page['middle1'] = 'modules/import_rss.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'services' : $cmr->page['middle1'] = 'modules/import_services.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'session' : $cmr->page['middle1'] = 'modules/import_session.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla' : $cmr->page['middle1'] = 'modules/import_sla.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'software' : $cmr->page['middle1'] = 'modules/import_software.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic' : $cmr->page['middle1'] = 'modules/import_statistic.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket' : $cmr->page['middle1'] = 'modules/import_ticket.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read' : $cmr->page['middle1'] = 'modules/import_ticket_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate' : $cmr->page['middle1'] = 'modules/import_translate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user' : $cmr->page['middle1'] = 'modules/import_user.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups' : $cmr->page['middle1'] = 'modules/import_user_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source' : $cmr->page['middle1'] = 'modules/import_x_code_source.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment' : $cmr->page['middle1'] = 'modules/import_x_comment.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents' : $cmr->page['middle1'] = 'modules/import_x_contents.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files' : $cmr->page['middle1'] = 'modules/import_x_files.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images' : $cmr->page['middle1'] = 'modules/import_x_images.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links' : $cmr->page['middle1'] = 'modules/import_x_links.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu' : $cmr->page['middle1'] = 'modules/import_x_menu.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules' : $cmr->page['middle1'] = 'modules/import_x_modules.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object' : $cmr->page['middle1'] = 'modules/import_x_object.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages' : $cmr->page['middle1'] = 'modules/import_x_pages.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites' : $cmr->page['middle1'] = 'modules/import_x_sites.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template' : $cmr->page['middle1'] = 'modules/import_x_template.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text' : $cmr->page['middle1'] = 'modules/import_x_text.php';
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "export":;
            switch ($on){
                
                // ------------------
                case 'account' : $cmr->page['middle1'] = 'modules/export_account.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'asset' : $cmr->page['middle1'] = 'modules/export_asset.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'certificate' : $cmr->page['middle1'] = 'modules/export_certificate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'code' : $cmr->page['middle1'] = 'modules/export_code.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'command' : $cmr->page['middle1'] = 'modules/export_command.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'contact' : $cmr->page['middle1'] = 'modules/export_contact.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'cron' : $cmr->page['middle1'] = 'modules/export_cron.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'download' : $cmr->page['middle1'] = 'modules/export_download.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'email' : $cmr->page['middle1'] = 'modules/export_email.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'escalation' : $cmr->page['middle1'] = 'modules/export_escalation.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'faq' : $cmr->page['middle1'] = 'modules/export_faq.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'father_groups' : $cmr->page['middle1'] = 'modules/export_father_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'forum' : $cmr->page['middle1'] = 'modules/export_forum.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'generator' : $cmr->page['middle1'] = 'modules/export_generator.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'groups' : $cmr->page['middle1'] = 'modules/export_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message' : $cmr->page['middle1'] = 'modules/export_message.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'message_read' : $cmr->page['middle1'] = 'modules/export_message_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nagios' : $cmr->page['middle1'] = 'modules/export_nagios.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'nessus' : $cmr->page['middle1'] = 'modules/export_nessus.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'rss' : $cmr->page['middle1'] = 'modules/export_rss.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'services' : $cmr->page['middle1'] = 'modules/export_services.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'session' : $cmr->page['middle1'] = 'modules/export_session.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'sla' : $cmr->page['middle1'] = 'modules/export_sla.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'software' : $cmr->page['middle1'] = 'modules/export_software.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'statistic' : $cmr->page['middle1'] = 'modules/export_statistic.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket' : $cmr->page['middle1'] = 'modules/export_ticket.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'ticket_read' : $cmr->page['middle1'] = 'modules/export_ticket_read.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'translate' : $cmr->page['middle1'] = 'modules/export_translate.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user' : $cmr->page['middle1'] = 'modules/export_user.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'user_groups' : $cmr->page['middle1'] = 'modules/export_user_groups.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_code_source' : $cmr->page['middle1'] = 'modules/export_x_code_source.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_comment' : $cmr->page['middle1'] = 'modules/export_x_comment.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_contents' : $cmr->page['middle1'] = 'modules/export_x_contents.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_files' : $cmr->page['middle1'] = 'modules/export_x_files.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_images' : $cmr->page['middle1'] = 'modules/export_x_images.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_links' : $cmr->page['middle1'] = 'modules/export_x_links.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_menu' : $cmr->page['middle1'] = 'modules/export_x_menu.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_modules' : $cmr->page['middle1'] = 'modules/export_x_modules.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_object' : $cmr->page['middle1'] = 'modules/export_x_object.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_pages' : $cmr->page['middle1'] = 'modules/export_x_pages.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_sites' : $cmr->page['middle1'] = 'modules/export_x_sites.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_template' : $cmr->page['middle1'] = 'modules/export_x_template.php';
                    break;
                    // ------------------
                    
                // ------------------
                case 'x_text' : $cmr->page['middle1'] = 'modules/export_x_text.php';
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        default:
            switch ($on){
                
                case 'account':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_account'] = $account;
                    }
                    break;
                    // ------------------
                    
                case 'asset':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_asset'] = $asset;
                    }
                    break;
                    // ------------------
                    
                case 'certificate':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_certificate'] = $certificate;
                    }
                    break;
                    // ------------------
                    
                case 'code':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_code'] = $code;
                    }
                    break;
                    // ------------------
                    
                case 'command':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_command'] = $command;
                    }
                    break;
                    // ------------------
                    
                case 'contact':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_contact'] = $contact;
                    }
                    break;
                    // ------------------
                    
                case 'cron':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_cron'] = $cron;
                    }
                    break;
                    // ------------------
                    
                case 'download':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_download'] = $download;
                    }
                    break;
                    // ------------------
                    
                case 'email':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_email'] = $email;
                    }
                    break;
                    // ------------------
                    
                case 'escalation':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_escalation'] = $escalation;
                    }
                    break;
                    // ------------------
                    
                case 'faq':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_faq'] = $faq;
                    }
                    break;
                    // ------------------
                    
                case 'father_groups':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_father_groups'] = $father_groups;
                    }
                    break;
                    // ------------------
                    
                case 'forum':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_forum'] = $forum;
                    }
                    break;
                    // ------------------
                    
                case 'generator':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_generator'] = $generator;
                    }
                    break;
                    // ------------------
                    
                case 'groups':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_groups'] = $groups;
                    }
                    break;
                    // ------------------
                    
                case 'message':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_message'] = $message;
                    }
                    break;
                    // ------------------
                    
                case 'message_read':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_message_read'] = $message_read;
                    }
                    break;
                    // ------------------
                    
                case 'nagios':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_nagios'] = $nagios;
                    }
                    break;
                    // ------------------
                    
                case 'nessus':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_nessus'] = $nessus;
                    }
                    break;
                    // ------------------
                    
                case 'rss':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_rss'] = $rss;
                    }
                    break;
                    // ------------------
                    
                case 'services':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_services'] = $services;
                    }
                    break;
                    // ------------------
                    
                case 'session':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_session'] = $session;
                    }
                    break;
                    // ------------------
                    
                case 'sla':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_sla'] = $sla;
                    }
                    break;
                    // ------------------
                    
                case 'software':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_software'] = $software;
                    }
                    break;
                    // ------------------
                    
                case 'statistic':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_statistic'] = $statistic;
                    }
                    break;
                    // ------------------
                    
                case 'ticket':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_ticket'] = $ticket;
                    }
                    break;
                    // ------------------
                    
                case 'ticket_read':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_ticket_read'] = $ticket_read;
                    }
                    break;
                    // ------------------
                    
                case 'translate':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_translate'] = $translate;
                    }
                    break;
                    // ------------------
                    
                case 'user':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_user'] = $user;
                    }
                    break;
                    // ------------------
                    
                case 'user_groups':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_user_groups'] = $user_groups;
                    }
                    break;
                    // ------------------
                    
                case 'x_code_source':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_code_source'] = $x_code_source;
                    }
                    break;
                    // ------------------
                    
                case 'x_comment':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_comment'] = $x_comment;
                    }
                    break;
                    // ------------------
                    
                case 'x_contents':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_contents'] = $x_contents;
                    }
                    break;
                    // ------------------
                    
                case 'x_files':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_files'] = $x_files;
                    }
                    break;
                    // ------------------
                    
                case 'x_images':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_images'] = $x_images;
                    }
                    break;
                    // ------------------
                    
                case 'x_links':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_links'] = $x_links;
                    }
                    break;
                    // ------------------
                    
                case 'x_menu':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_menu'] = $x_menu;
                    }
                    break;
                    // ------------------
                    
                case 'x_modules':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_modules'] = $x_modules;
                    }
                    break;
                    // ------------------
                    
                case 'x_object':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_object'] = $x_object;
                    }
                    break;
                    // ------------------
                    
                case 'x_pages':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_pages'] = $x_pages;
                    }
                    break;
                    // ------------------
                    
                case 'x_sites':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_sites'] = $x_sites;
                    }
                    break;
                    // ------------------
                    
                case 'x_template':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_template'] = $x_template;
                    }
                    break;
                    // ------------------
                    
                case 'x_text':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_x_text'] = $x_text;
                    }
                    break;
                    // ------------------
                    
                default:
                    $cmr->page['middle1'] = 'modules/view_x_text.php';
                    break;
            }

            break;
            //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    }
}
// --------next box ----------
$cmr->output[0] = $cmr->query[0];
// ---------------------
if($cmr->query[0] != ""){
    $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
    $cmr->email["subject"] = "" . $cmr->get_conf("application_short_name") . ": Eseguito azione administrativa";
    $cmr->email["message"] = "".$cmr->translate["sistem administrator"]."  (" . $cmr->get_user("auth_email") . ")\n\n\n  ".$cmr->translate[" run the next action"]."  \n\nSQL : $cmr->query[0] \n";
    $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
		/* intestazioni addizionali */
// 		$cmr->email["headers_severity"] = 3;
// 		$cmr->email["headers_to"] = "" ;//. $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
// 		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
// 		$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
// 		$cmr->email["headers_bcc"] = "";
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["middle1"] = $mod->path;
// include_once($cmr->get_path("index") . "system/run_result.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
