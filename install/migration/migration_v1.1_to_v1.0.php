<?php
/**
 * migration.php
 *         --------
 * begin    : July 2005 - July 2009
 * copyright   : Camaroes Ver 2.0.3 (C) 2005-2009 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/* vim: set expandtab tabstop=4 shiftwidth=4: */
/*
Copyright (c) 2009, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions
are met:

1. Redistributions of source code must retain the above copyright
 notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
 notice, this list of conditions and the following disclaimer in the
 documentation and/or other materials provided with the distribution.
3. The names of the authors may not be used to endorse or promote products
 derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS AS IS AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

This code cannot simply be copied and put under the GNU Public License or
any other GPL-like (LGPL, GPL2) License.

migration.php,  2009-Feb-Tue 0:12:13
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class open_windows
 *
 * @open _windows Class use to make module windows
 * @a _link() function who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// --- Only for migation from tstm ver 1.0 to tstm ver 1.1
// ==========configuration============
$by_tstm_ver_2_0 = 1;
$mig_user = "soc";
$mig_host = "localhost";
$mig_passw = chr(ord('$')) . '0c_b3N';
$mig_db = "tstm_db";
// ==========configuration============
if (0) {
    @$my_body = $cmr->db["sql_query1"] . ";\n";
    @$my_body .= $cmr->db["sql_query2"] . ";\n";
    @$my_body .= $cmr->db["sql_query3"] . ";\n";
    @$my_body .= $cmr->db["sql_query4"] . ";\n";
    @$my_body .= $cmr->db["sql_query5"] . ";\n";
    @$my_body .= $cmr->db["sql_query6"];
    @mail("tchouamou@gmail.com", "Migrazione a Tstm Ver. 1.1", $my_body, "To:tchouamou@gmail.com\n\r From:tchouamou@gmail.com\n\r");
} else {
    echo "<br /><hr /><b><u>" . $cmr->translate("Sincronisation old Database Ver 1.0") . "</b></u><br />";

    if (!defined("tstm_MAX_VIEW")) {
        define("tstm_MAX_VIEW", tstm_max_view);
    } ;

    if (!defined("tstm_GUEST")) {
        define("tstm_GUEST", tstm_guest_level);
    } ;

    if (!defined("tstm_CONTACT")) {
        define("tstm_CONTACT", tstm_contact_level);
    } ;

    if (!defined("tstm_client")) {
        define("tstm_client", tstm_client_level);
    } ;

    if (!defined("tstm_user")) {
        define("tstm_user", tstm_user_level);
    } ;

    if (!defined("tstm_SOC")) {
        define("tstm_SOC", tstm_noc_level);
    } ;

    if (!defined("tstm_ADMIN")) {
        define("tstm_ADMIN", tstm_admin_level);
    } ;

    $cliente = $call_log_groups;
    $from = $mail_from;
    $to = $mail_to;
    $cc = $mail_cc;
    $bcc = $mail_bcc;
    $inf1 = $comment;
    $by = $work_by;
    $config = $login_script;

    @ $allegato = $attach;
    $filename = $attach;
    $resolv_id = "By Tstm Ver 2.0.3";

    $priority = $severity;

    $form = ${$VAR}['tstm_form'];
    $form = $tstm_form;
    ${$VAR}['form'] = ${$VAR}['tstm_form'];

    if (isset(${$VAR}['mail_text'])) {
        $text = $mail_text;
    }
    if (isset(${$VAR}['search_text'])) {
        $text = $search_text;
    }
    if (isset(${$VAR}['id_ticket'])) {
        $id = $id_ticket;
    }
    if (isset(${$VAR}['id_ticket'])) {
        $id = $id_ticket;
    }
    // $title=$title;
    if (!isset($type)) {
        $type = "";
    }
    if (!isset($sql)) {
        $sql = "";
    }

    if (!isset($table)) {
        $table = "";
    }

    if (!isset($language)) {
        $language = "italian";
    }
    $lang = $language;
    $email_sign = "";
    $user_email = "";
    $group_name = "";
    // //=======================================
    $cmr->db_connection_old = $cmr->db_connection;
    // //=======================================
    echo "<br />" . $cmr->translate("Conessione al old database ver 1.0...") . "<br />";
    //
    // //======database connection==============
    $cmr->db_connection = mysql_connect($crm->config,$cmr->language,$mig_host, $mig_user, $mig_passw) or print_r(mysql_error($crm->config,$cmr->language));
    // echo "<br />" . $cmr->translate("Database ") . "<b>" . $cmr->translate("tstm_new") . "</b>" . $cmr->translate("...") . "<br />";
    mysql_select_db($mig_db, $cmr->db_connection);
    // //=======================================
    if (isset(${$VAR}['id_user'])) {
        // echo "<br />" . $cmr->translate("Aggiornamento ID Email ...") . "<br />";
        $id = ${$VAR}['id_user'];
        $sql_query = "select email from tstm_user where id='$id';";
        $query_result = &$conn->Execute($sql_query, $cmr->db_connection) or die(mysql_error($crm->config,$cmr->language));
        $val_id = mysql_fetch_object($crm->config,$cmr->language,$query_result);
        if (isset($val_id->email)) {
            $user_email = $val_id->email;
        }
    }

    if (isset(${$VAR}['id_group'])) {
        // echo "<br />" . $cmr->translate("Aggiornamento ID Group ...") . "<br />";
        $id = ${$VAR}['id_group'];
        $sql_query = "select name from tstm_group where id='$id';";
        $query_result = &$conn->Execute($sql_query, $cmr->db_connection) or die(mysql_error($crm->config,$cmr->language));
        $val_id = mysql_fetch_object($crm->config,$cmr->language,$query_result);
        if (isset($val_id->name)) {
            $group_name = $val_id->name;
        }
    }

    @$sql_migrate = $cmr->db["sql_query1"] . ";";
    @$sql_migrate .= $cmr->db["sql_query2"] . ";";
    @$sql_migrate .= $cmr->db["sql_query3"] . ";";
    @$sql_migrate .= $cmr->db["sql_query4"] . ";";
    @$sql_migrate .= $cmr->db["sql_query5"] . ";";
    @$sql_migrate .= $cmr->db["sql_query6"] . ";";

    $cmr->db["sql_query1"] = "";
    $cmr->db["sql_query2"] = "";
    $cmr->db["sql_query3"] = "";
    $cmr->db["sql_query4"] = "";
    $cmr->db["sql_query5"] = "";
    $cmr->db["sql_query6"] = "";
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // ##################################################
    // ------------Recupera valori mandati da form e impostazione stringa sql e ($inf['cgi'] e informazione per la mail)---tutto servira a cgi_action .php ----
    switch ($form) {
        // ##################################################
        case "new_user":
            // ===========
            $pw = pw_encode($crm->config,$cmr->language,$pw); //crytage password
            // ===========
            if (((strlen($uid)) < 1)) {
                $uid = "null_uid_user";
            }
            if (((strlen($name)) < 1)) {
                $name = "null_name_user";
            }
            if (((strlen($email)) < 3)) {
                $email = $uid . "_mail@localhost";
            }
            // --------------------------------------------------------------
            $cmr->db["sql_query1"] = "INSERT INTO `tstm_user` (`id`, `uid`, `name`, `last_name`, `pw`, `email`, `tel`, `cel`, `state`, `level`, `lang`, `style`,  `config`, `public_key`, `private_key`, `pass_phrase`,  `inf`, `date_time`)
    VALUES ('', '$uid', '$name', '$last_name', '$pw', '$email', '$tel', '$cel', '$state', '$level', '$lang', '$style',  '$config', '$public_key', '$private_key', '$pass_phrase', '$inf1', NOW());";
            // --------------------------------------------------------------
            $cmr->db["sql_query2"] = "INSERT INTO `tstm_user_groups ( `id`, `user_email` , `group_name` , `state` , `date_time` )
    VALUES ('', '$email' , '$group', '$state', NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "update_user":
            // ===========
            $pw = pw_encode($crm->config,$cmr->language,$pw); //crytage password
            // ===========
            if (((strlen($uid)) < 1)) {
                $uid = "null_uid_user";
            }
            if (((strlen($name)) < 1)) {
                $name = "null_name_user";
            }
            if (((strlen($email)) < 3)) {
                $email = $uid . "_mail@localhost";
            }

            $cmr->db["sql_query1"] = "UPDATE `tstm_user` SET
    `name` = '$name',
    `last_name` = '$last_name',
    `tel` = '$tel',
    `cel` = '$cel',
    `state` = '$state',
    `level` = '$level',
    `lang` = '$lang',
    `style` = '$style',
    `config` = '$config',
    `public_key` = '$public_key',
    `private_key` = '$private_key',
    `pass_phrase` = '$pass_phrase',
    `inf` = '$inf1',
    `date_time` = NOW( ) WHERE `email` ='$id' ;";
            // --------------------------------------------------------------
            $cmr->db["sql_query2"] = "UPDATE `tstm_user_groups SET
    `user_email` ='$email',
    `date_time` = NOW( )
    WHERE `user_email` = '$user_email';";
            // --------------------------------------------------------------
            $cmr->db["sql_query3"] = "INSERT INTO `tstm_user_groups ( `id`, `user_email` , `group_name` , `state` , `date_time` )
    VALUES ('', '$email' , '$group', '$state', NOW() );";
            // ----------------impostiamo futuro layout------------
            break;
        // ##################################################
        // ##################################################
        case "change_pw":
            // ===========
            // $new_pw1=pw_encode($crm->config,$cmr->language,$new_pw1);//crytage password
            // ===========
            // ===============================
            $cmr->db["sql_query1"] = "UPDATE `tstm_user` SET
    `pw` = '$new_pw1',
    `date_time` = NOW( ) WHERE `email` ='$id' ;";
            // ----------------impostiamo futuro layout------------
            break;
        // ##################################################
        case "delete_user":
            // $user_email=${$VAR}['user_email'];
            $cmr->db["sql_query1"] = "delete FROM tstm_user where email='$user_email'  ;";
            $cmr->db["sql_query2"] = "delete FROM tstm_user_groupswhere user_email='$user_email'  ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "new_user_groups:

            $cmr->db["sql_query1"] = "INSERT INTO `tstm_user_groups ( `id`, `user_email` , `group_name` , `type`, `state` , `date_time` )
    VALUES ('', '$user_email' , '$group_name', '$type', '$state', NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "delete_user_groups:

            $cmr->db["sql_query1"] = "delete FROM tstm_user_groupswhere user_email='$user_email' and group_name='$group_name' ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "new_father_groups:

            $cmr->db["sql_query1"] = "INSERT INTO `tstm_father_groups ( `id` , `group_child` , `group_father`, `state`, `date_time` )
    VALUES ('' , '$group_child',  '$group_father',  '$state',  NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "delete_father_groups:

            $cmr->db["sql_query1"] = "delete from 'tstm_father_groups where group_child='$group_child' and group_father='$group_father' ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ------------------------------------------
        case "new_ticket":
            // $by=$inf['auth_email'];
            // ------------------------------------------
            $cmr->db["sql_query1"] = "UPDATE `tstm_ticket` SET    `state_now` = 'opened'   WHERE `number` ='$number';";
            // ------------------------------------------
            $cmr->db["sql_query2"] = "INSERT INTO `tstm_ticket` ( `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text`)
    VALUES ('', '$number' , '$title' , '$cliente' , '$by' , NOW( ) , '$state' , '$state_now' , '$assign_to', '$priority' , NOW( ), '$from' , '$to' , '$cc' , '$bcc' , '$filename' , '$type', '$resolv_id', '$text' )";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "update_ticket":
            // $by=$inf['auth_email'];
            // ------------------------------------------
            $cmr->db["sql_query1"] = "UPDATE `tstm_ticket` SET    `state_now` = 'updated'   WHERE `number` ='$number';";
            // ------------------------------------------
            $cmr->db["sql_query2"] = "INSERT INTO `tstm_ticket` ( `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text`)
    VALUES ('', '$number' , '$title' , '$cliente' , '$by' , NOW( ) , '$state' , '$state_now' , '$assign_to', '$priority' , NOW( ), '$from' , '$to' , '$cc' , '$bcc' , '$filename' , '$type', '$resolv_id', '$text' )";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "close_ticket":
            // $by=$inf['auth_email'];
            // --------------------------------------------------------------
            $cmr->db["sql_query1"] = "UPDATE `tstm_ticket` SET    `state_now` = 'closed'   WHERE `number` ='$number';";
            // ------------------------------------------
            // ------------------------------------------
            $cmr->db["sql_query2"] = "INSERT INTO `tstm_ticket` ( `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text`)
    VALUES ('', '$number' , '$title' , '$cliente' , '$by' , NOW( ) , '$state_now' , '$state_now' , '$assign_to', '$priority' , NOW( ), '$from' , '$to' , '$cc' , '$bcc' , '$filename' , '$type', '$resolv_id', '$text' )";
            // ----------------impostiamo futuro layout ---------------------
            $inf["middle1"] = "cgi_action.php";
            // --------------------------------------------------------------
            break;
            // ##################################################
            break;
        // ##################################################
        case "new_group":

            if (((strlen($name)) < 1)) {
                $name = "null_name_group";
            }

            $cmr->db["sql_query1"] = "INSERT INTO `tstm_group` ( `id` , `name` , `state` , `level` ,`config` , `inf` , `nagios_group`, `date_time` )
    VALUES ('', '$name', '$state', '$level','$config', '$inf1', '$nagios_group', NOW( ))";
            // --------------------------------------------------------------
            $email = $inf['auth_email'];
            $cmr->db["sql_query2"] = "INSERT INTO `tstm_user_groups ( `id`, `user_email` , `group_name` , `type` , `state` , `date_time` )
    VALUES ('', '$email' , '$name', '$state', NOW() );";
            // --------------------------------------------------------------
            $cmr->db["sql_query3"] = "INSERT INTO `tstm_father_groups ( `id` , `group_child` , `group_father`, `state`, `date_time` )
    VALUES ('' , '$name',  'admin',  'active',  NOW() );";
            $inf["middle1"] = "cgi_action.php";
            $inf['cgi'] = "<p><b>" . $cmr->translate("Gruppo Creato con Successo ") . "</b><br /><br /><br />
        <b>" . $cmr->translate("Group Name: ") . "</b>$name;<br />
        <b>" . $cmr->translate("Group Level: ") . "</b>$level;<br />
        <b>" . $cmr->translate("State: ") . "</b>$state<br />
        <b>" . $cmr->translate("Info: ") . "</b>$inf1<br /><br />
        <br />Grazie ---<br /></p>";
            // --------------------------------------------------------------
            break;
        // ##################################################
        //------------------------------------------
        case "update_group":

            if (((strlen($name)) < 1)) {
                $uid = "null_name_group";
            }

            $cmr->db["sql_query1"] = "UPDATE `tstm_group` SET
    `name` ='$name',
    `level` ='$level',
    `config` = '$config',
    `state` = '$state',
    `nagios_group` = '$nagios_group',
    `inf` = '$inf1',
    `date_time` = NOW( )
    WHERE `name` = '$id' ;";
            // --------------------------------------------------------------
            $cmr->db["sql_query2"] = "UPDATE `tstm_user_groups SET
    `group_name` ='$name',
    `state` = '$state',
    `date_time` = NOW( )
    WHERE `group_name` = '$id';";
            // --------------------------------------------------------------
            $cmr->db["sql_query3"] = "UPDATE `tstm_father_groups SET
    `group_father` ='$name',
    `state` = '$state',
    `date_time` = NOW( )
    WHERE `group_father` = '$id';";
            // --------------------------------------------------------------
            $cmr->db["sql_query4"] = "UPDATE `tstm_father_groups SET
    `group_child` ='$name',
    `state` = '$state',
    `date_time` = NOW( )
    WHERE `group_child` = '$id';";
            // --------------------------------------------------------------
            $cmr->db["sql_query5"] = "INSERT INTO `tstm_father_groups ( `id` , `group_child` , `group_father`, `state`, `date_time` )
    VALUES ('' , '$name',  'admin',  'active',  NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "delete_group":

            $cmr->db["sql_query1"] = "delete FROM tstm_group where name='$group_name'  ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ------------------------------------------
        case "administrate":// ---------can delete or call another function for work -------
            $cmr->db["sql_query1"] = ""; //strtolower()
            if ($on == "sql") {
                // $sql=${$VAR}['sql'];
                $sql = ereg_replace('[\]*["]+', "\"", $sql);
                $sql = ereg_replace("[\]*[']+", "'", $sql);
                $inf["sql"] = "$sql";
                $inf["middle1"] = "preview_sql.php";
            } else {
                switch ($action) {
                    case "view":
                        switch ($on) {
                            case "user":
                                switch ($user) {
                                    case "?":$inf["middle1"] = "preview_all_user.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_user.php";
                                        break;
                                    default:$inf["middle1"] = "preview_user.php";
                                        $inf["id"] = $user;
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$inf["middle1"] = "preview_all_ticket.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_ticket.php";
                                        break;
                                    default:$inf["middle1"] = "preview_ticket.php";
                                        $inf["id"] = $ticket;
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$inf["middle1"] = "preview_all_client.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_client.php";
                                        break;
                                    default:$inf["middle1"] = "preview_client.php";
                                        $inf["id"] = $client;
                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$inf["middle1"] = "preview_all_group.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_group.php";
                                        break;
                                    default:$inf["middle1"] = "preview_group.php";
                                        $inf["id"] = $group;
                                        break;
                                }
                                break;
                            case "user_groups:
                                switch ($user_groups {
                                    case "?":$inf["sql"] = "select * FROM tstm_user_groupsorder by group_name";
                                        $inf["middle1"] = "preview_all_user_groupsphp";
                                        break;
                                    case "All":$inf["sql"] = "select * FROM tstm_user_groupsorder by group_name";
                                        $inf["middle1"] = "preview_all_user_groupsphp";
                                        break;
                                    default:$inf["sql"] = "select * FROM tstm_user_groupswhere id='$user_groups";
                                        $inf["middle1"] = "preview_all_user_groupsphp";
                                        break;
                                }
                                break;
                            case "new_father_groups:
                                switch ($father_groups {
                                    case "?":$inf["sql"] = "select * FROM tstm_father_groupsorder by group_child";
                                        $inf["middle1"] = "preview_all_father_groupsphp";
                                        break;
                                    case "All":$inf["sql"] = "select * FROM tstm_father_groupsorder by group_child";
                                        $inf["middle1"] = "preview_all_father_groupsphp";
                                        break;
                                    default:$inf["sql"] = "select * FROM tstm_father_groupswhere id='$father_groups";
                                        $inf["middle1"] = "preview_all_father_groupsphp";
                                        break;
                                }
                                break;
                            case "problem":$inf["middle1"] = "preview_all_problem.php";
                                break;
                            case "solution":$inf["middle1"] = "preview_all_solution.php";
                                break;
                            case "resolv":$inf["middle1"] = "preview_all_resolv.php";
                                break;
                            case "host":$inf["middle1"] = "preview_all_host.php";
                                break;
                            case "services":$inf["middle1"] = "preview_all_services.php";
                                break;
                            case "host_user":$inf["middle1"] = "preview_all_host_user.php";
                                break;
                            case "host_group":$inf["middle1"] = "preview_all_host_group.php";
                                break;
                            case "host_services":$inf["middle1"] = "preview_all_module.php";
                                break;
                            case "host_dependence":$inf["middle1"] = "preview_all_host_dependence.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$inf["middle1"] = "preview_all_module.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_module.php";
                                        break;
                                    default:$inf["middle1"] = $module;
                                        $inf["middle2"] = "administrate.php";
                                        break;
                                }
                                break;

                            case "message":
                                switch ($user) {
                                    case "?":$inf["middle1"] = "view_message.php";
                                        break;
                                    case "All":$inf["middle1"] = "view_message.php";
                                        break;
                                    default:$inf["middle1"] = "view_message.php";
                                        $inf["id"] = $user;
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "new":
                        switch ($on) {
                            case "user":$inf["middle1"] = "new_user.php";
                                break;
                            case "ticket":$inf["middle1"] = "tickets.php";
                                break;
                            case "client":
                                $inf["middle1"] = "new_client.php";
                                $inf["refresh"] = 3600;
                                $inf["layer"] = 1;
                                $inf["middle2"] = "";
                                $inf["middle3"] = "";
                                break;
                            case "group":$inf["middle1"] = "new_group.php";
                                break;
                            case "user_groups:$inf["middle1"] = "user_to_group.php";
                                break;
                            case "new_father_groups:
                                $inf["middle1"] = "father_groupsphp";
                                break;
                            case "message":$inf["middle1"] = "new_message.php";
                                break;
                            case "problem":$inf["middle1"] = "preview_all_problem.php";
                                break;
                            case "solution":$inf["middle1"] = "preview_all_solution.php";
                                break;
                            case "resolv":$inf["middle1"] = "preview_all_resolv.php";
                                break;
                            case "host":$inf["middle1"] = "preview_all_host.php";
                                break;
                            case "services":$inf["middle1"] = "preview_all_services.php";
                                break;
                            case "host_user":$inf["middle1"] = "preview_all_host_user.php";
                                break;
                            case "host_group":$inf["middle1"] = "preview_all_host_group.php";
                                break;
                            case "host_services":$inf["middle1"] = "preview_all_module.php";
                                break;
                            case "host_dependence":$inf["middle1"] = "preview_all_host_dependence.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$inf["middle1"] = "preview_all_module.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_module.php";
                                        break;
                                    default:$inf["middle1"] = $module;
                                        $inf["middle2"] = "administrate.php";
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "update":
                        switch ($on) {
                            case "user":
                                switch ($user) {
                                    case "?":$inf["middle1"] = "preview_all_user.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_user.php";
                                        break;
                                    default:$inf["middle1"] = "update_user.php";
                                        $inf["id"] = $user;
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$inf["middle1"] = "preview_all_ticket.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_ticket.php";
                                        break;
                                    default:$inf["middle1"] = "update_ticket.php";
                                        $inf["id"] = $ticket;
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$inf["middle1"] = "preview_all_client.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_client.php";
                                        break;
                                    default:$inf["middle1"] = "update_client.php";
                                        $inf["refresh"] = 3600;
                                        $inf["layer"] = 1;
                                        $inf["id"] = $client;
                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$inf["middle1"] = "preview_all_group.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_group.php";
                                        break;
                                    default:$inf["middle1"] = "update_group.php";
                                        $inf["id"] = $group;
                                        break;
                                }
                                break;
                            case "user_groups:
                                switch ($user_groups {
                                    case "?":$inf["middle1"] = "user_to_group.php";
                                        break;
                                    case "All":$inf["middle1"] = "user_to_group.php";
                                        break;
                                    default:$inf["middle1"] = "user_to_group.php";
                                        break;
                                }
                                break;
                            case "new_father_groups:
                                switch ($father_groups {
                                    case "?":$inf["middle1"] = "father_groupsphp";
                                        break;
                                    case "All":$inf["middle1"] = "father_groupsphp";
                                        break;
                                    default:$inf["middle1"] = "father_groupsphp";
                                        break;
                                }
                                break;
                            case "message":
                                switch ($father_groups {
                                    case "?":$inf["middle1"] = "new_message.php";
                                        break;
                                    case "All":$inf["middle1"] = "new_message.php";
                                        break;
                                    default:$inf["middle1"] = "new_message.php";
                                        break;
                                }
                                break;
                            case "problem":$inf["middle1"] = "preview_all_problem.php";
                                break;
                            case "solution":$inf["middle1"] = "preview_all_solution.php";
                                break;
                            case "resolv":$inf["middle1"] = "preview_all_resolv.php";
                                break;
                            case "host":$inf["middle1"] = "preview_all_host.php";
                                break;
                            case "services":$inf["middle1"] = "preview_all_services.php";
                                break;
                            case "host_user":$inf["middle1"] = "preview_all_host_user.php";
                                break;
                            case "host_group":$inf["middle1"] = "preview_all_host_group.php";
                                break;
                            case "host_services":$inf["middle1"] = "preview_all_module.php";
                                break;
                            case "host_dependence":$inf["middle1"] = "preview_all_host_dependence.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$inf["middle1"] = "preview_all_module.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_module.php";
                                        break;
                                    default:$inf["middle1"] = $module;
                                        $inf["middle2"] = "administrate.php";
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "delete":
                        switch ($on) {
                            case "user":
                                switch ($user) {
                                    case "?":$inf["middle1"] = "preview_all_user.php";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_user where 1;";$inf["middle1"]="cgi_action.php";
                                        break;
                                    default:
                                        $cmr->db["sql_query1"] = "delete FROM tstm_user where email='$user';";
                                        $cmr->db["sql_query2"] = "delete FROM tstm_user_groupswhere user_email='$user';";
                                        $inf["middle1"] = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$inf["middle1"] = "preview_all_ticket.php";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_ticket  where 1;";$inf["middle1"]="cgi_action.php";
                                        break;
                                    default:$cmr->db["sql_query1"] = "delete FROM tstm_ticket where id='$ticket';";
                                        $inf["middle1"] = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$inf["middle1"] = "preview_all_client.php";
                                        break;
                                    case "All":

                                        $cmr->db["sql_query1"] = "delete FROM tstm_client  where 1;";
                                        $inf["middle1"] = "cgi_action.php";
                                        break;
                                    default:
                                        $cmr->db["sql_query1"] = "delete FROM tstm_client where name='$client';";
                                        $cmr->db["sql_query2"] = "delete FROM tstm_group where name='$client';";
                                        $cmr->db["sql_query3"] = "delete FROM tstm_user_groupswhere group_name='$client';";
                                        $cmr->db["sql_query4"] = "delete FROM tstm_father_groupswhere group_father='$client' or group_child='$client';";

                                        $inf["middle1"] = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$inf["middle1"] = "preview_all_group.php";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_group  where 1;";$inf["middle1"]="cgi_action.php";
                                        break;
                                    default:
                                        $cmr->db["sql_query1"] = "delete FROM tstm_group where name='$group';";
                                        $cmr->db["sql_query2"] = "delete FROM tstm_user_groupswhere group_name='$group';";
                                        $cmr->db["sql_query3"] = "delete FROM tstm_father_groupswhere group_father='$group' or group_child='$group';";
                                        $inf["middle1"] = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "user_groups:
                                switch ($user_groups {
                                    case "?":$inf["middle1"] = "rm_user_to_group.php";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_user_groups where 1;";$inf["middle1"]="cgi_action.php";
                                        break;
                                    default:$cmr->db["sql_query1"] = "delete FROM tstm_user_groupswhere id='$user_groups;";
                                        $inf["middle1"] = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "new_father_groups:
                                switch ($father_groups {
                                    case "?":$inf["middle1"] = "rm_father_groupsphp";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_father_groupswhere 1;";$inf["middle1"]="cgi_action.php";
                                        break;
                                    default:$cmr->db["sql_query1"] = "delete FROM tstm_father_groupswhere id='$father_groups;";
                                        $inf["middle1"] = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "message":
                                switch ($father_groups {
                                    case "?":break;
                                    case "All":

                                        $cmr->db["sql_query1"] = "delete FROM tstm_message where 1;";
                                        $inf["middle1"] = "cgi_action.php";
                                        break;;
                                    default:$cmr->db["sql_query1"] = "delete FROM tstm_message where id='$cmr->email["message"]';";
                                        $inf["middle1"] = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "problem":$inf["middle1"] = "preview_all_problem.php";
                                break;
                            case "solution":$inf["middle1"] = "preview_all_solution.php";
                                break;
                            case "resolv":$inf["middle1"] = "preview_all_resolv.php";
                                break;
                            case "host":$inf["middle1"] = "preview_all_host.php";
                                break;
                            case "services":$inf["middle1"] = "preview_all_services.php";
                                break;
                            case "host_user":$inf["middle1"] = "preview_all_host_user.php";
                                break;
                            case "host_group":$inf["middle1"] = "preview_all_host_group.php";
                                break;
                            case "host_services":$inf["middle1"] = "preview_all_module.php";
                                break;
                            case "host_dependence":$inf["middle1"] = "preview_all_host_dependence.php";
                                break;
                            case "module":

                                switch ($module) {
                                    case "?":$inf["middle1"] = "preview_all_module.php";
                                        break;
                                    case "All":$inf["middle1"] = "preview_all_module.php";
                                        break;
                                    default:
                                        unlink("modules/" . $module);
                                        $inf["middle2"] = "administrate.php";
                                        $inf["middle1"] = "cgi_action.php";
                                        $inf["id"] = "<br /><u>Modulo " . $module . " Cancellato con sucesso</u> <br />";

                                        print("cgi=" . $inf['cgi']);
                                        $cmr->email["recipient"] = "" . $inf['cmr_admin_name'] . " <" . $inf['cmr_admin_email2'] . ">\r\n";
                                        $cmr->email["subject"] = "TSTM: !!! Modullo cancellato";
                                        $cmr->email["message"] = "Modulo $module cancellato ??!!!  da : " . $inf['auth_email'] . "\n\n\n";
                                        $cmr->email["message"] .= "Questa azione  e rischiosa, \nun  modulo cancellato potrebbe fermare l'applicazione \n";
                                        $cmr->email["message"] .= "\nGrazie \n";
                                        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
                                        /* intestazioni addizionali */
                                        // $cmr->email["hearders_priority"]=3;
                                        // $cmr->email["headers"]_to = "".$inf['cmr_admin_name']." <".$inf['cmr_admin_email2'].">\r\n";
                                        // $cmr->email["headers_from"] = "".$inf['cmr_admin_name']." <".$inf['cmr_admin_email2'].">\r\n";
                                        // $cmr->email["headers_cc"] = "".$inf['cmr_admin3']." <".$inf['cmr_admin_email3'].">\r\n";
                                        // $cmr->email["headers_bcc"] = "".$inf['admin4']." <".$inf['cmr_admin_email4'].">\r\n";
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "search":
                        switch ($on) {
                            case "user":$inf["middle1"] = "preview_all_user.php";
                                break;
                            case "ticket":$inf["middle1"] = "search_ticket.php";
                                break;
                            case "client":$inf["middle1"] = "preview_all_client.php";
                                break;
                            case "group":$inf["middle1"] = "preview_all_group.php";
                                break;
                            case "user_groups:$inf["middle1"] = "preview_all_user.php";
                                break;
                            case "new_father_groups:$inf["middle1"] = "preview_all_father_groupsphp";
                                break;
                            case "message":$inf["middle1"] = "view_message.php";
                                break;
                            case "problem":$inf["middle1"] = "preview_all_problem.php";
                                break;
                            case "solution":$inf["middle1"] = "preview_all_solution.php";
                                break;
                            case "resolv":$inf["middle1"] = "preview_all_resolv.php";
                                break;
                            case "host":$inf["middle1"] = "preview_all_host.php";
                                break;
                            case "services":$inf["middle1"] = "preview_all_services.php";
                                break;
                            case "host_user":$inf["middle1"] = "preview_all_host_user.php";
                                break;
                            case "host_group":$inf["middle1"] = "preview_all_host_group.php";
                                break;
                            case "host_services":$inf["middle1"] = "preview_all_module.php";
                                break;
                            case "host_dependence":$inf["middle1"] = "preview_all_host_dependence.php";
                                break;
                            case "module":$inf["middle1"] = "preview_all_module.php";
                                break;
                            default:$inf["middle1"] = "search_ticket.php";
                                break;
                        }
                        break;
                    case "report":
                        switch ($on) {
                            case "user":$inf["middle1"] = "preview_all_user.php";
                                break;
                            case "ticket":$inf["middle1"] = "search_ticket.php";
                                break;
                            case "client":$inf["middle1"] = "preview_all_client.php";
                                break;
                            case "group":$inf["middle1"] = "preview_all_group.php";
                                break;
                            case "user_groups:$inf["middle1"] = "preview_all_user.php";
                                break;
                            case "new_father_groups:$inf["middle1"] = "preview_all_father_groupsphp";
                                break;
                            case "message":$inf["middle1"] = "view_message.php";
                                break;
                            case "problem":$inf["middle1"] = "preview_all_problem.php";
                                break;
                            case "solution":$inf["middle1"] = "preview_all_solution.php";
                                break;
                            case "resolv":$inf["middle1"] = "preview_all_resolv.php";
                                break;
                            case "host":$inf["middle1"] = "preview_all_host.php";
                                break;
                            case "services":$inf["middle1"] = "preview_all_services.php";
                                break;
                            case "host_user":$inf["middle1"] = "preview_all_host_user.php";
                                break;
                            case "host_group":$inf["middle1"] = "preview_all_host_group.php";
                                break;
                            case "host_services":$inf["middle1"] = "preview_all_module.php";
                                break;
                            case "host_dependence":$inf["middle1"] = "preview_all_host_dependence.php";
                                break;
                            case "module":$inf["middle1"] = "preview_all_module.php";
                                break;
                            default:$inf["middle1"] = "search_ticket.php";
                                break;
                        }
                        break;
                    case "config":
                        switch ($on) {
                            case "user":$inf["middle1"] = "preview_all_user.php";
                                break;
                            case "ticket":$inf["middle1"] = "search_ticket.php";
                                break;
                            case "client":$inf["middle1"] = "preview_all_client.php";
                                break;
                            case "group":$inf["middle1"] = "preview_all_group.php";
                                break;
                            case "user_groups:$inf["middle1"] = "preview_all_user.php";
                                break;
                            case "new_father_groups:$inf["middle1"] = "preview_all_father_groupsphp";
                                break;
                            case "message":$inf["middle1"] = "view_message.php";
                                break;
                            case "problem":$inf["middle1"] = "preview_all_problem.php";
                                break;
                            case "solution":$inf["middle1"] = "preview_all_solution.php";
                                break;
                            case "resolv":$inf["middle1"] = "preview_all_resolv.php";
                                break;
                            case "host":$inf["middle1"] = "preview_all_host.php";
                                break;
                            case "services":$inf["middle1"] = "preview_all_services.php";
                                break;
                            case "host_user":$inf["middle1"] = "preview_all_host_user.php";
                                break;
                            case "host_group":$inf["middle1"] = "preview_all_host_group.php";
                                break;
                            case "host_services":$inf["middle1"] = "preview_all_module.php";
                                break;
                            case "host_dependence":$inf["middle1"] = "preview_all_host_dependence.php";
                                break;
                            case "module":$inf["middle1"] = "preview_all_module.php";
                                break;
                            default:$inf["middle1"] = "search_ticket.php";
                                break;
                        }
                        break;
                    default:break;
                }
            }
            // ----------------impostiamo futuro layout ---------------------
            $inf['cgi'] = $cmr->db["sql_query1"];
            // --------------------------------------------------------------
            if ($cmr->db["sql_query1"] != "") {
            }
            break;

            break;
        // ------------------------------------------
        default:

            break;
            // ------------------------------------------
    } ;
    // ===============================================
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // if(file_exists("new/lib/lib_".$tstm_form.".php")){
    // print("<br />libreria  new/lib/lib_$tstm_form.php ...<br />");
    // include("new/lib/lib_".$tstm_form.".php");
    // //print($cmr->db["sql_query1"].'<br />'.$cmr->db["sql_query2"].'<br />'.$cmr->db["sql_query3"].'<br />'.'<hr />');
    // }
    echo "<br />" . $cmr->translate("Esecuzione query ...") . "<br />";
    echo "<br /><b>" . $cmr->translate("Query: ") . "</b>" . substr($cmr->db["sql_query1"], 0, 50) . ";  Etc ....<br />";
    $result_query1 = &$conn->Execute($cmr->db["sql_query1"], $cmr->db_connection) or die(mysql_error($crm->config,$cmr->language));

    if (isset($cmr->db["sql_query2"]) && ($cmr->db["sql_query2"])) {
        $result_query2 = &$conn->Execute($cmr->db["sql_query2"], $cmr->db_connection) ;
    }
    if (isset($cmr->db["sql_query3"]) && ($cmr->db["sql_query3"])) {
        $result_query3 = &$conn->Execute($cmr->db["sql_query3"], $cmr->db_connection) ;
    }
    if (isset($cmr->db["sql_query4"]) && ($cmr->db["sql_query4"])) {
        $result_query4 = &$conn->Execute($cmr->db["sql_query4"], $cmr->db_connection) ;
    }
    if (isset($cmr->db["sql_query5"]) && ($cmr->db["sql_query5"])) {
        $result_query5 = &$conn->Execute($cmr->db["sql_query5"], $cmr->db_connection) ;
    }
    if (isset($cmr->db["sql_query6"]) && ($cmr->db["sql_query6"])) {
        $result_query6 = &$conn->Execute($cmr->db["sql_query6"], $cmr->db_connection) ;
    }
}
$cmr->db["sql_query1"] = $sql_migrate;
// $cmr->db_connection=$cmr->db_connection_old;
mysql_select_db(db_name, $cmr->db_connection);

echo "<br /><b><u>" . $cmr->translate("End Sincronisation.") . "</b></u><hr />";

?>