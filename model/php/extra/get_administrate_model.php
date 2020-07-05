<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_administrate.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 2.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (C) 2011, Tchouamou Eric Herve <tchouamou@gmail.com>
All rights reserved.



























get_administrate.php,v 1.5  @_date_time_@
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

// case "administrate"://----can delete or call another function for work ----
$action = trim(get_post("action"));
$on = trim(get_post("on"));
// $cmr->session['pre_match']
%_foreach_table_%
if(get_post('@_table_@')){
    $@_table_@ = get_post('@_table_@', 'post'); //Getting variable [$@_table_@] sended by form [administrate.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
cmrdb_query("INSERT IGNORE INTO " . $cmr->config["cmr_table_prefix"] . "history (id, user_email, table_name, line_id, action, date_time) VALUES ('', '" . $cmr->get_user("auth_email") . "', '" . $cmr->config["cmr_table_prefix"] . $on . "', '" . $@_table_@ . "', '" . $action . "',  NOW());", $cmr->db_connection) or db_die(__LINE__  . " - "  . __FILE__ . ": " . cmrdb_error());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
%%_foreach_table_%%

$cmr->query[0] = ""; //strtolower()
if($on == "sql"){
    $sql = get_post("sql");
    $sql = cmr_search_replace('[\]*["]+', "\"", $sql);
    $sql = cmr_search_replace("[\]*[']+", "'", $sql);
    $cmr->post_var["sql"] = $sql;
    $cmr->page['middle1'] = "modules/admin/preview_sql.php";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
cmrdb_query("INSERT IGNORE INTO " . $cmr->config["cmr_table_prefix"] . "history (id, user_email, table_name, line_id, action, date_time) VALUES ('', '" . $cmr->get_user("auth_email") . "', '" . $on . "', '" . $cmr->get_session("id") . "', '" . $sql . "',  NOW());", $cmr->db_connection) or db_die(__LINE__  . " - "  . __FILE__ . ": " . cmrdb_error());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
//----------------------------
	$cmr->action["table_name"] = "";
	$cmr->action["column"] = "";
	$cmr->action["action"] = "delete";
// 	$cmr->action["where"] = cmr_where_query($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
//----------------------------
    switch ($action){
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "new":
            switch ($on){
                %_foreach_table_%
                // ------------------
                case '@_table_@' : $cmr->page['middle1'] = 'modules/new_@_table_@.php';
                    break;
                    // ------------------
                    %%_foreach_table_%%
                default:
                    $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                    break;
            }
            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "update":;
            switch ($on){
                %_foreach_table_%
                // ------------------
                case '@_table_@':
                    switch ($@_table_@){
                        case '?' : $cmr->page['middle1'] = 'modules/viell_all_@_table_@.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/update_@_table_@.php';
                            $cmr->post_var['id_@_table_@'] = $@_table_@;
                            break;
                    }
                    break;
                    // ------------------
                    %%_foreach_table_%%
                default:
                    $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                    break;
            }
            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "delete":;
            switch ($on){
                %_foreach_table_%
                // ------------------
                case '@_table_@':
                    switch ($@_table_@){
                        case '?' : $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                            break;

                        default:
                // ------------------
				$cmr->action['table_name']='@_table_@';
				$cmr->action['where']=cmr_where_query($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
                // ------------------
            $data['severity'] = '';
            $data['new_field'] = '';
            $data['new_type'] = '';
            $data['valid'] = $cmr->action['where'];
            $data['sql_where'] = '@_column_id_@=' . $@_table_@;
            $cmr->query[0] = sql_run('query', '', 'delete', '', $cmr->config['db_name'], $cmr->config['cmr_table_prefix'] . '@_table_@', '', '', '', '', '', '', $data);
//            $cmr->query[0] = 'DELETE FROM ' . $cmr->config['cmr_table_prefix'] . '@_table_@ ';
//                             $cmr->query[0] .= 'WHERE '.$cmr->action['where'].' AND @_column_id_@=' . $@_table_@ . ';';
                            $cmr->page['middle1'] = 'modules/run_result.php';
                            break;
                    }
                    break;
                    // ------------------
                    %%_foreach_table_%%
                default:
                    $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                    break;
            }
            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "view":;
            switch ($on){
                %_foreach_table_%
                // ------------------
                case '@_table_@':
                    switch ($@_table_@){
                        case '?' : $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                            break;
                        case 'All' : $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                            break;
                        default : $cmr->page['middle1'] = 'modules/preview_@_table_@.php';
                            $cmr->post_var['id_@_table_@'] = $@_table_@;
                            break;
                    }
                    break;
                    // ------------------
                    %%_foreach_table_%%
                default:
                    $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "search":;
            switch ($on){
                %_foreach_table_%
                // ------------------
                case '@_table_@' : $cmr->page['middle1'] = 'modules/search_@_table_@.php';
                    break;
                    // ------------------
                    %%_foreach_table_%%
                default:
                    $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        case "report":;
            switch ($on){
                %_foreach_table_%
                // ------------------
                case '@_table_@' : $cmr->page['middle1'] = 'modules/report_@_table_@.php';
                    break;
                    // ------------------
                    %%_foreach_table_%%
                default:
                    $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                    break;
            }

            break;
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        default:
            switch ($on){
                %_foreach_table_%
                case '@_table_@':
                    // ------------------
                    $filename = $cmr->config['class_modules_path'] . 'modules/' . $action . '_' . $on . 'php';
                    if(file_exists($filename)){
                        $cmr->page['middle1'] = $filename;
                        $cmr->post_var['id_@_table_@'] = $@_table_@;
                    }
                    break;
                    // ------------------
                    %%_foreach_table_%%
                default:
                    $cmr->page['middle1'] = 'modules/view_@_table_@.php';
                    break;
            }

            break;
            //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    }
}
// ---------------------
if(!empty($cmr->query[0])){
$query=$cmr->query[0];// Globas access
/*
Creating the appropriate notification Message to be send to the administrator group
*/
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/notify/notify_administrate_" . $cmr->get_ext("notify");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/notify/notify_administrate_" . $cmr->get_ext("notify");
$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/notify_administrate_" . $cmr->get_ext("notify");
$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/auto/notify_administrate_" . $cmr->get_ext("notify");
$file_list[] = $cmr->get_path("notify")  ."templates/notify/auto/notify_administrate_" . $cmr->get_ext("notify");
$templates_notify=cmr_good_file($file_list);

$cmr->notify = $cmr->load_notify($templates_notify);
if(($cmr->get_conf("log_to_page_administrate"))) $cmr->output[0] = $cmr->notify["to_page"];
if(($cmr->get_conf("log_to_log_administrate"))) $cmr->output[1] = $cmr->notify["to_log"];
if(($cmr->get_conf("log_to_email_administrate"))) $cmr->email = $cmr->notify["to_email"];
if(($cmr->get_conf("log_to_db_administrate")));
// if(($cmr->get_conf("log_to_sms_administrate")));
// if(($cmr->get_conf("log_to_flux_administrate")));
// if(($cmr->get_conf("log_to_rss_administrate")));
// if(($cmr->get_conf("log_to_other_administrate")));


}

/*
Select next module who will trait these var
*/
// $cmr->page["middle1"] = "run_result.php";


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["middle1"] = $cmr->get_module("path");
// include_once($cmr->get_conf("cmr_path") . "system/run_result.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
