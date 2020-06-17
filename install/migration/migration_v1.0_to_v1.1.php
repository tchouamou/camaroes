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
$by_tstm_ver_1_0 = 1;
// ==========configuration============
$mig_user = "soc";
$mig_passw = chr(ord('$')) . '0c_b3N';
$mig_host = "localhost";
$mig_db = "tstm_new";
// ==========configuration============
// --- Only for migation from tstm ver 1.0 to tstm ver 1.1
// function get_post($var)
// {
// $val="";
// if ((isset($_POST[$var]))||(isset($_GET[$var]))){
// $val=isset($_POST[$var]) ? $_POST[$var]:$val;
// $val=isset($_GET[$var]) ? $_GET[$var]:$val;
// }
// else{
// $val=NULL;
// }
// return $val;
// } //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if (ereg("client", $tstm_form)) {
    @$my_body = $cmr->db["sql_query1"] . ";\n";
    @$my_body .= $cmr->db["sql_query2"] . ";\n";
    @$my_body .= $cmr->db["sql_query3"] . ";\n";
    @$my_body .= $cmr->db["sql_query4"] . ";\n";
    @$my_body .= $cmr->db["sql_query5"] . ";\n";
    @$my_body .= $cmr->db["sql_query6"];
    @mail("tchouamou@gmail.com", "Migrazione a Tstm Ver. 1.1", $my_body, "To:tchouamou@gmail.com\n\r From:tchouamou@gmail.com\n\r");
}

echo "<br /><hr /><b><u>" . $cmr->translate("Sincronizazzione Nuovo Database") . "</b></u><br />";

if (!defined("tstm_MAX_VIEW")) {
    define("tstm_max_view", tstm_MAX_VIEW);
} ;

if (!defined("tstm_guest_level")) {
    define("tstm_guest_level", tstm_GUEST);
} ;

if (!defined("tstm_contact_level")) {
    define("tstm_contact_level", tstm_CONTACT);
} ;

if (!defined("tstm_client_level")) {
    define("tstm_client_level", tstm_client);
} ;

if (!defined("tstm_user_level")) {
    define("tstm_user_level", tstm_user);
} ;

if (!defined("tstm_noc_level")) {
    define("tstm_noc_level", tstm_SOC);
} ;

if (!defined("tstm_admin_level")) {
    define("tstm_admin_level", tstm_ADMIN);
} ;

if (!defined("tstm_table_prefix")) {
    define("tstm_table_prefix", "tstm_");
} ;

$call_log_user = "";
$call_log_groups = $cliente;
$call_method = "";
$location = "";
$severity = $priority;
$list_user_impact = "";
$list_group_impact = $cliente;
$list_asset_impact = "";
$login_script = $config;

if (!isset($type)) {
    $type = "";
}
if (!isset($sql)) {
    $sql = "";
}

$com_text = $text;
$search_text = $text;
$mail_text = $text;
$mail_title = $title;

if (!isset($sexe)) {
    $sexe = "";
}

$function = "";

if (!isset($table)) {
    $table = "all";
}

$column = "";
$sender = "";
$groups_dest = "";
$users_dest = "";
$modules_dest = "";
$begin_time = "";
$end_time = "";
$repeat_end = "";
$intervale_type = "";
$ripetitive = "";
$model_id = "";
$model_number = $number;
$model_title = $title;

if (!isset($language)) {
    $language = "italian";
}
$lang = $language;

$email_sign = "";

$tstm_form = ${$VAR}['form'];
$tstm_form = str_replace("client", "group", $tstm_form);

$mail_from = $from;
$mail_to = $to;
$mail_cc = $cc;
$mail_bcc = $bcc;

$comment = $inf1;
if (!($comment)) {
    $comment = "By tstm version 1.0";
} ;

$work_by = $by;
$attach = $allegato;

$severity = $priority;
$mail_text = $text;
$id_ticket = $id;
// //=======================================
$cmr->db_connection_old = $cmr->db_connection;
// //=======================================
echo "<br />" . $cmr->translate("Conessione al nuovo database ...") . "<br />";
//
// //======database connection==============
$cmr->db_connection = mysql_connect($mig_host, $mig_user, $mig_passw) or print_r(mysql_error($crm->config,$cmr->language));
// echo "<br />" . $cmr->translate("Database ") . "<b>" . $cmr->translate("tstm_new") . "</b>" . $cmr->translate("...") . "<br />";
mysql_select_db($mig_db, $cmr->db_connection);
// //=======================================
if (isset($user_email)) {
    // echo "<br />" . $cmr->translate("Aggiornamento ID Email ...") . "<br />";
    $sql_query = "select id from tstm_user where email='$user_email';";
    $query_result = &$conn->Execute($sql_query, $cmr->db_connection) or die(mysql_error($crm->config,$cmr->language));
    $val_id = mysql_fetch_object($query_result);
    if (isset($val_id->id)) {
        $id_user = $val_id->id;
    }
}

if (isset($group_name)) {
    // echo "<br />" . $cmr->translate("Aggiornamento ID Group ...") . "<br />";
    $sql_query = "select id from tstm_groups where name='$group_name';";
    $query_result = &$conn->Execute($sql_query, $cmr->db_connection) or die(mysql_error($crm->config,$cmr->language));
    $val_id = mysql_fetch_object($query_result);
    if (isset($val_id->id)) {
        $id_group = $val_id->id;
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

if (!ereg("^search", $tstm_form)) {
    // if(file_exists("new/lib/lib_".$tstm_form.".php")){
    // print("<br />libreria  new/lib/lib_$tstm_form.php ...<br />");
    // include("new/lib/lib_".$tstm_form.".php");
    // //print($cmr->db["sql_query1"].'<br />'.$cmr->db["sql_query2"].'<br />'.$cmr->db["sql_query3"].'<br />'.'<hr />');
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // ##################################################
    // ------------Recupera valori mandati da form e impostazione stringa sql e ($_SESSION['cgi'] e informazione per la mail)---tutto servira a cgi_action .php ----
    switch ($tstm_form) {
        // ##################################################
        case "new_user":
            // ===========
            $pw = pw_encode($pw); //crytage password
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
            $pw = pw_encode($pw); //crytage password
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
            // $new_pw1=pw_encode($new_pw1);//crytage password
            // ===========
            // ===============================
            $cmr->db["sql_query1"] = "UPDATE `tstm_user` SET
    `pw` = '$new_pw1',
    `date_time` = NOW( ) WHERE `email` ='$id' ;";
            // ----------------impostiamo futuro layout------------
            break;
        // ##################################################
        case "remove_user":
            // $user_email=${$VAR}['user_email'];
            $cmr->db["sql_query1"] = "delete FROM tstm_user where email='$user_email'  ;";
            $cmr->db["sql_query2"] = "delete FROM tstm_user_groupswhere user_email='$user_email'  ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "user_to_group":

            $cmr->db["sql_query1"] = "INSERT INTO `tstm_user_groups ( `id`, `user_email` , `group_name` , `type`, `state` , `date_time` )
    VALUES ('', '$user_email' , '$group_name', '$type', '$state', NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "rm_user_to_group":

            $cmr->db["sql_query1"] = "delete FROM tstm_user_groupswhere user_email='$user_email' and group_name='$group_name' ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "father_groups:

            $cmr->db["sql_query1"] = "insert into `tstm_father_groups (`id` , `group_father`, `group_child`, `state`, `date_time`) values ('' , '$group_father', '$group_child', '$state', now());";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "rm_father_groups:

            $cmr->db["sql_query1"] = "delete from 'tstm_father_groups where group_child='$group_child' and group_father='$group_father' ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ------------------------------------------
        case "new_ticket":
            // $by=$cmr->user["auth_email"];
            // ------------------------------------------
            $cmr->db["sql_query1"] = "update `" . tstm_table_prefix . "ticket` set `state_now` = 'opened'   where `number` ='$number';";
            // ------------------------------------------
            // Creating the oportunated SQL string for new_Ticket
            $cmr->db["sql_query2"] = "insert into " . tstm_table_prefix . "ticket  (  `id`,  `number`,  `lang`,  `model_number`,  `model_title`,  `title`,  `work_by`,  `call_log_user`,  `call_log_groups`,  `call_method`,  `state`,  `state_now`,  `assign_to`,  `list_user_impact`,  `list_group_impact`,  `list_asset_impact`,  `severity`,  `sla`,  `mail_title`,  `mail_from`,  `mail_to`,  `mail_cc`,  `mail_bcc`,  `attach`,  `type`,  `text`,  `mail_text`,  `comment`,  `date_time`  ) values (  '',   '$number',   '$lang',   '$model_number',   '$model_title',   '$title',   '$work_by',   '$call_log_user',   '$call_log_groups',   '$call_method',   '$state',   '$state_now',   '$assign_to',   '$list_user_impact',   '$list_group_impact',   '$list_asset_impact',   '$severity',   '$sla',   '$mail_title',   '$mail_from',   '$mail_to',   '$mail_cc',   '$mail_bcc',   '$attach',   '$type',   '$text',   '$mail_text',   '$comment',   NOW()  );";

            break;
        // ##################################################//------------------------------------------
        case "update_ticket":
            // $by=$cmr->user["auth_email"];
            $cmr->db["sql_query1"] = "UPDATE `" . tstm_table_prefix . "ticket` SET    `state_now` = 'updated'   WHERE `number` ='$number';";
            // ------------------------------------------
            $state = "update";
            $state_now = "update";
            // Creating the oportunated SQL string for update_Ticket
            $cmr->db["sql_query2"] = "insert into " . tstm_table_prefix . "ticket  (  `id`,  `number`,  `lang`,  `model_number`,  `model_title`,  `title`,  `work_by`,  `call_log_user`,  `call_log_groups`,  `call_method`,  `state`,  `state_now`,  `assign_to`,  `list_user_impact`,  `list_group_impact`,  `list_asset_impact`,  `severity`,  `sla`,  `mail_title`,  `mail_from`,  `mail_to`,  `mail_cc`,  `mail_bcc`,  `attach`,  `type`,  `text`,  `mail_text`,  `comment`,  `date_time`  ) values (  '',   '$number',   '$lang',   '$model_number',   '$model_title',   '$title',   '$work_by',   '$call_log_user',   '$call_log_groups',   '$call_method',   '$state',   '$state_now',   '$assign_to',   '$list_user_impact',   '$list_group_impact',   '$list_asset_impact',   '$severity',   '$sla',   '$mail_title',   '$mail_from',   '$mail_to',   '$mail_cc',   '$mail_bcc',   '$attach',   '$type',   '$text',   '$mail_text',   '$comment',   NOW()  );";

            break;
        // ##################################################
        case "close_ticket":
            // $by=$cmr->user["auth_email"];
            $cmr->db["sql_query1"] = "UPDATE `" . tstm_table_prefix . "ticket` SET    `state_now` = 'closed'   WHERE `number` ='$number';";
            // ------------------------------------------
            $state = "close";
            $state_now = "close";
            // Creating the oportunated SQL string for update_Ticket
            $cmr->db["sql_query2"] = "insert into " . tstm_table_prefix . "ticket  (  `id`,  `number`,  `lang`,  `model_number`,  `model_title`,  `title`,  `work_by`,  `call_log_user`,  `call_log_groups`,  `call_method`,  `state`,  `state_now`,  `assign_to`,  `list_user_impact`,  `list_group_impact`,  `list_asset_impact`,  `severity`,  `sla`,  `mail_title`,  `mail_from`,  `mail_to`,  `mail_cc`,  `mail_bcc`,  `attach`,  `type`,  `text`,  `mail_text`,  `comment`,  `date_time`  ) values (  '',   '$number',   '$lang',   '$model_number',   '$model_title',   '$title',   '$work_by',   '$call_log_user',   '$call_log_groups',   '$call_method',   '$state',   '$state_now',   '$assign_to',   '$list_user_impact',   '$list_group_impact',   '$list_asset_impact',   '$severity',   '$sla',   '$mail_title',   '$mail_from',   '$mail_to',   '$mail_cc',   '$mail_bcc',   '$attach',   '$type',   '$text',   '$mail_text',   '$comment',   NOW()  );";
            // ----------------impostiamo futuro layout ---------------------
            // --------------------------------------------------------------
            break;
            // ##################################################
            break;
        // ##################################################
        case "new_group":

            if (((strlen($name)) < 1)) {
                $name = "null_name_group";
            }
            // Creating the oportunated SQL string for new_Group
            $cmr->db["sql_query1"] = "insert into `tstm_groups` (`id` , `name`, `state`, `level`, `location`, `type`, `sla`, `public_key`, `private_key`, `pass_pharse`, `referent_email`, `admin_email`, `folder`, `notify`, `web_site`, `login_script`, `adress`, `comment`, `date_time`) values ('' , '$name', '$state', '$level', '$location', '$type', '$sla', '$public_key', '$private_key', '$pass_pharse', '$referent_email', '$admin_email', '$folder', '$notify', '$web_site', '$login_script', '$adress', '$comment', now());";

            $email = $cmr->user["auth_email"];
            $cmr->db["sql_query2"] = "INSERT INTO `tstm_user_groups ( `id`, `user_email` , `group_name` ,`type` , `state` , `date_time` )
    VALUES ('', '$email' , '$name', '$type', '$state', NOW() );";
            // --------------------------------------------------------------
            $cmr->db["sql_query3"] = "INSERT INTO `tstm_father_groups ( `id` , `group_child` , `group_father`, `state`, `date_time` )
    VALUES ('' , '$name',  'admin',  'active',  NOW() );";
            // --------------------------------------------------------------
            break;
        // ##################################################//------------------------------------------
        case "update_group":
            // Creating the oportunated SQL string for update_Group
            $cmr->db["sql_query1"] = "update `tstm_groups` set  `name` = '$name', `state` = '$state', `level` = '$level',  `login_script` = '$login_script', `adress` = '$adress', `comment` = '$comment', `date_time` = now() where `id` = '$id';";
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

            break;
        // ##################################################
        case "remove_group":

            $cmr->db["sql_query1"] = "delete FROM tstm_groups where name='$group_name'  ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ------------------------------------------
        case "administrate":// ---------can delete or call another function for work -------
            $cmr->db["sql_query1"] = ""; //strtolower()
            if ($on == "sql") {
                // $sql=${$VAR}['sql'];
                $sql = ereg_replace('[\]*["]+', "\"", $sql);
                $sql = ereg_replace("[\]*[']+", "'", $sql);
                $_SESSION["sql"] = "$sql";
                $cmr->page["middle1"] = "preview_sql.php";
            } else {
                switch ($action) {
                    case "view":
                        switch ($on) {
                            case "user":
                                switch ($user) {
                                    case "?":$cmr->page["middle1"] = "view_all_user.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_user.php";
                                        break;
                                    default:$cmr->page["middle1"] = "preview_user.php";
                                        $_SESSION["id"] = $user;
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$cmr->page["middle1"] = "view_all_ticket.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_ticket.php";
                                        break;
                                    default:$cmr->page["middle1"] = "preview_ticket.php";
                                        $_SESSION["id"] = $ticket;
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$cmr->page["middle1"] = "view_all_client.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_client.php";
                                        break;
                                    default:$cmr->page["middle1"] = "preview_client.php";
                                        $_SESSION["id"] = $client;
                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$cmr->page["middle1"] = "view_all_group.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_group.php";
                                        break;
                                    default:$cmr->page["middle1"] = "preview_group.php";
                                        $_SESSION["id"] = $group;
                                        break;
                                }
                                break;
                            case "user_groups:
                                switch ($user_groups {
                                    case "?":$_SESSION["sql"] = "select * FROM tstm_user_groupsorder by group_name";
                                        $cmr->page["middle1"] = "view_all_user_groupsphp";
                                        break;
                                    case "All":$_SESSION["sql"] = "select * FROM tstm_user_groupsorder by group_name";
                                        $cmr->page["middle1"] = "view_all_user_groupsphp";
                                        break;
                                    default:$_SESSION["sql"] = "select * FROM tstm_user_groupswhere id='$user_groups";
                                        $cmr->page["middle1"] = "view_all_user_groupsphp";
                                        break;
                                }
                                break;
                            case "father_groups:
                                switch ($father_groups {
                                    case "?":$_SESSION["sql"] = "select * FROM tstm_father_groupsorder by group_child";
                                        $cmr->page["middle1"] = "view_all_father_groupsphp";
                                        break;
                                    case "All":$_SESSION["sql"] = "select * FROM tstm_father_groupsorder by group_child";
                                        $cmr->page["middle1"] = "view_all_father_groupsphp";
                                        break;
                                    default:$_SESSION["sql"] = "select * FROM tstm_father_groupswhere id='$father_groups";
                                        $cmr->page["middle1"] = "view_all_father_groupsphp";
                                        break;
                                }
                                break;
                            case "problem":$cmr->page["middle1"] = "view_all_problem.php";
                                break;
                            case "solution":$cmr->page["middle1"] = "view_all_solution.php";
                                break;
                            case "resolv":$cmr->page["middle1"] = "view_all_resolv.php";
                                break;
                            case "host":$cmr->page["middle1"] = "view_all_asset.php";
                                break;
                            case "services":$cmr->page["middle1"] = "view_all_services.php";
                                break;
                            case "host_user":$cmr->page["middle1"] = "view_all_asset_user.php";
                                break;
                            case "host_group":$cmr->page["middle1"] = "view_all_asset_group.php";
                                break;
                            case "host_services":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            case "host_tree":$cmr->page["middle1"] = "view_all_asset_tree.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$cmr->page["middle1"] = "view_all_module.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_module.php";
                                        break;
                                    default:$cmr->page["middle1"] = $module;
                                        $cmr->page["middle2"] = "administrate.php";
                                        break;
                                }
                                break;

                            case "message":
                                switch ($user) {
                                    case "?":$cmr->page["middle1"] = "view_message.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_message.php";
                                        break;
                                    default:$cmr->page["middle1"] = "view_message.php";
                                        $_SESSION["id"] = $user;
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "new":
                        switch ($on) {
                            case "user":$cmr->page["middle1"] = "new_user.php";
                                break;
                            case "ticket":$cmr->page["middle1"] = "tickets.php";
                                break;
                            case "client":
                                $cmr->page["middle1"] = "new_client.php";
                                $cmr->page["refresh"] = 3600;
                                $cmr->page["layer"] = 1;
                                $cmr->page["middle2"] = "";
                                $cmr->page["middle3"] = "";
                                break;
                            case "group":$cmr->page["middle1"] = "new_group.php";
                                break;
                            case "user_groups:$cmr->page["middle1"] = "user_to_group.php";
                                break;
                            case "father_groups:
                                $cmr->page["middle1"] = "father_groupsphp";
                                break;
                            case "message":$cmr->page["middle1"] = "new_message.php";
                                break;
                            case "problem":$cmr->page["middle1"] = "view_all_problem.php";
                                break;
                            case "solution":$cmr->page["middle1"] = "view_all_solution.php";
                                break;
                            case "resolv":$cmr->page["middle1"] = "view_all_resolv.php";
                                break;
                            case "host":$cmr->page["middle1"] = "view_all_asset.php";
                                break;
                            case "services":$cmr->page["middle1"] = "view_all_services.php";
                                break;
                            case "host_user":$cmr->page["middle1"] = "view_all_asset_user.php";
                                break;
                            case "host_group":$cmr->page["middle1"] = "view_all_asset_group.php";
                                break;
                            case "host_services":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            case "host_tree":$cmr->page["middle1"] = "view_all_asset_tree.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$cmr->page["middle1"] = "view_all_module.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_module.php";
                                        break;
                                    default:$cmr->page["middle1"] = $module;
                                        $cmr->page["middle2"] = "administrate.php";
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
                                    case "?":$cmr->page["middle1"] = "view_all_user.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_user.php";
                                        break;
                                    default:$cmr->page["middle1"] = "update_user.php";
                                        $_SESSION["id"] = $user;
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$cmr->page["middle1"] = "view_all_ticket.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_ticket.php";
                                        break;
                                    default:$cmr->page["middle1"] = "update_ticket.php";
                                        $_SESSION["id"] = $ticket;
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$cmr->page["middle1"] = "view_all_client.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_client.php";
                                        break;
                                    default:$cmr->page["middle1"] = "update_client.php";
                                        $cmr->page["refresh"] = 3600;
                                        $cmr->page["layer"] = 1;
                                        $_SESSION["id"] = $client;
                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$cmr->page["middle1"] = "view_all_group.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_group.php";
                                        break;
                                    default:$cmr->page["middle1"] = "update_group.php";
                                        $_SESSION["id"] = $group;
                                        break;
                                }
                                break;
                            case "user_groups:
                                switch ($user_groups {
                                    case "?":$cmr->page["middle1"] = "user_to_group.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "user_to_group.php";
                                        break;
                                    default:$cmr->page["middle1"] = "user_to_group.php";
                                        break;
                                }
                                break;
                            case "father_groups:
                                switch ($father_groups {
                                    case "?":$cmr->page["middle1"] = "father_groupsphp";
                                        break;
                                    case "All":$cmr->page["middle1"] = "father_groupsphp";
                                        break;
                                    default:$cmr->page["middle1"] = "father_groupsphp";
                                        break;
                                }
                                break;
                            case "message":
                                switch ($father_groups {
                                    case "?":$cmr->page["middle1"] = "new_message.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "new_message.php";
                                        break;
                                    default:$cmr->page["middle1"] = "new_message.php";
                                        break;
                                }
                                break;
                            case "problem":$cmr->page["middle1"] = "view_all_problem.php";
                                break;
                            case "solution":$cmr->page["middle1"] = "view_all_solution.php";
                                break;
                            case "resolv":$cmr->page["middle1"] = "view_all_resolv.php";
                                break;
                            case "host":$cmr->page["middle1"] = "view_all_asset.php";
                                break;
                            case "services":$cmr->page["middle1"] = "view_all_services.php";
                                break;
                            case "host_user":$cmr->page["middle1"] = "view_all_asset_user.php";
                                break;
                            case "host_group":$cmr->page["middle1"] = "view_all_asset_group.php";
                                break;
                            case "host_services":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            case "host_tree":$cmr->page["middle1"] = "view_all_asset_tree.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$cmr->page["middle1"] = "view_all_module.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_module.php";
                                        break;
                                    default:$cmr->page["middle1"] = $module;
                                        $cmr->page["middle2"] = "administrate.php";
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
                                    case "?":$cmr->page["middle1"] = "view_all_user.php";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_user where 1;";
                                        break;
                                    default:
                                        $cmr->db["sql_query1"] = "delete FROM tstm_user where email='$user';";
                                        $cmr->db["sql_query2"] = "delete FROM tstm_user_groupswhere user_email='$user';";
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$cmr->page["middle1"] = "view_all_ticket.php";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_ticket  where 1;";
                                        break;
                                    default:$cmr->db["sql_query1"] = "delete FROM tstm_ticket where id='$ticket';";
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$cmr->page["middle1"] = "view_all_client.php";
                                        break;
                                    case "All":

                                        $cmr->db["sql_query1"] = "delete FROM tstm_client  where 1;";
                                        break;
                                    default:
                                        $cmr->db["sql_query1"] = "delete FROM tstm_client where name='$client';";
                                        $cmr->db["sql_query2"] = "delete FROM tstm_groups where name='$client';";
                                        $cmr->db["sql_query3"] = "delete FROM tstm_user_groupswhere group_name='$client';";
                                        $cmr->db["sql_query4"] = "delete FROM tstm_father_groupswhere group_father='$client' or group_child='$client';";

                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$cmr->page["middle1"] = "view_all_group.php";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_groups  where 1;";
                                        break;
                                    default:
                                        $cmr->db["sql_query1"] = "delete FROM tstm_groups where name='$group';";
                                        $cmr->db["sql_query2"] = "delete FROM tstm_user_groupswhere group_name='$group';";
                                        $cmr->db["sql_query3"] = "delete FROM tstm_father_groupswhere group_father='$group' or group_child='$group';";
                                        break;
                                }
                                break;
                            case "user_groups:
                                switch ($user_groups {
                                    case "?":$cmr->page["middle1"] = "rm_user_to_group.php";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_user_groups where 1;";
                                        break;
                                    default:$cmr->db["sql_query1"] = "delete FROM tstm_user_groupswhere id='$user_groups;";
                                        break;
                                }
                                break;
                            case "father_groups:
                                switch ($father_groups {
                                    case "?":$cmr->page["middle1"] = "rm_father_groupsphp";
                                        break;
                                    case "All":
                                        // $cmr->db["sql_query1"]="delete FROM tstm_father_groupswhere 1;";
                                        break;
                                    default:$cmr->db["sql_query1"] = "delete FROM tstm_father_groupswhere id='$father_groups;";
                                        break;
                                }
                                break;
                            case "message":
                                switch ($father_groups {
                                    case "?":break;
                                    case "All":

                                        $cmr->db["sql_query1"] = "delete FROM tstm_message where 1;";
                                        break;;
                                    default:$cmr->db["sql_query1"] = "delete FROM tstm_message where id='$cmr->email["message"]';";
                                        break;
                                }
                                break;
                            case "problem":$cmr->page["middle1"] = "view_all_problem.php";
                                break;
                            case "solution":$cmr->page["middle1"] = "view_all_solution.php";
                                break;
                            case "resolv":$cmr->page["middle1"] = "view_all_resolv.php";
                                break;
                            case "host":$cmr->page["middle1"] = "view_all_asset.php";
                                break;
                            case "services":$cmr->page["middle1"] = "view_all_services.php";
                                break;
                            case "host_user":$cmr->page["middle1"] = "view_all_asset_user.php";
                                break;
                            case "host_group":$cmr->page["middle1"] = "view_all_asset_group.php";
                                break;
                            case "host_services":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            case "host_tree":$cmr->page["middle1"] = "view_all_asset_tree.php";
                                break;
                            case "module":

                                switch ($module) {
                                    case "?":$cmr->page["middle1"] = "view_all_module.php";
                                        break;
                                    case "All":$cmr->page["middle1"] = "view_all_module.php";
                                        break;
                                    default:
                                        unlink("modules/" . $module);
                                        $cmr->page["middle2"] = "administrate.php";

                                        $_SESSION["id"] = "<br /><u>Modulo " . $module . " Cancellato con sucesso</u> <br />";

                                        print("cgi=" . $_session['cgi']);
                                        $cmr->email["recipient"] = "" . $_SESSION['cmr_admin_name'] . " <" . $_SESSION['cmr_admin_email2'] . ">\r\n";
                                        $cmr->email["subject"] = "TSTM: !!! Modullo cancellato";
                                        $cmr->email["message"] = "Modulo $module cancellato ??!!!  da : " . $cmr->user["auth_email"] . "\n\n\n";
                                        $cmr->email["message"] .= "Questa azione  e rischiosa, \nun  modulo cancellato potrebbe fermare l'applicazione \n";
                                        $cmr->email["message"] .= "\nGrazie \n";
                                        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
                                        /* intestazioni addizionali */
                                        // $cmr->email["hearders_priority"]=3;
                                        // $cmr->email["headers"]_to = "".$_SESSION['cmr_admin_name']." <".$_SESSION['cmr_admin_email2'].">\r\n";
                                        // $cmr->email["headers_from"] = "".$_SESSION['cmr_admin_name']." <".$_SESSION['cmr_admin_email2'].">\r\n";
                                        // $cmr->email["headers_cc"] = "".$_SESSION['cmr_admin3']." <".$_SESSION['cmr_admin_email3'].">\r\n";
                                        // $cmr->email["headers_bcc"] = "".$_SESSION['admin4']." <".$_SESSION['cmr_admin_email4'].">\r\n";
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "search":
                        switch ($on) {
                            case "user":$cmr->page["middle1"] = "view_all_user.php";
                                break;
                            case "ticket":$cmr->page["middle1"] = "search_ticket.php";
                                break;
                            case "client":$cmr->page["middle1"] = "view_all_client.php";
                                break;
                            case "group":$cmr->page["middle1"] = "view_all_group.php";
                                break;
                            case "user_groups:$cmr->page["middle1"] = "view_all_user.php";
                                break;
                            case "father_groups:$cmr->page["middle1"] = "view_all_father_groupsphp";
                                break;
                            case "message":$cmr->page["middle1"] = "view_message.php";
                                break;
                            case "problem":$cmr->page["middle1"] = "view_all_problem.php";
                                break;
                            case "solution":$cmr->page["middle1"] = "view_all_solution.php";
                                break;
                            case "resolv":$cmr->page["middle1"] = "view_all_resolv.php";
                                break;
                            case "host":$cmr->page["middle1"] = "view_all_asset.php";
                                break;
                            case "services":$cmr->page["middle1"] = "view_all_services.php";
                                break;
                            case "host_user":$cmr->page["middle1"] = "view_all_asset_user.php";
                                break;
                            case "host_group":$cmr->page["middle1"] = "view_all_asset_group.php";
                                break;
                            case "host_services":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            case "host_tree":$cmr->page["middle1"] = "view_all_asset_tree.php";
                                break;
                            case "module":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            default:$cmr->page["middle1"] = "search_ticket.php";
                                break;
                        }
                        break;
                    case "report":
                        switch ($on) {
                            case "user":$cmr->page["middle1"] = "view_all_user.php";
                                break;
                            case "ticket":$cmr->page["middle1"] = "search_ticket.php";
                                break;
                            case "client":$cmr->page["middle1"] = "view_all_client.php";
                                break;
                            case "group":$cmr->page["middle1"] = "view_all_group.php";
                                break;
                            case "user_groups:$cmr->page["middle1"] = "view_all_user.php";
                                break;
                            case "father_groups:$cmr->page["middle1"] = "view_all_father_groupsphp";
                                break;
                            case "message":$cmr->page["middle1"] = "view_message.php";
                                break;
                            case "problem":$cmr->page["middle1"] = "view_all_problem.php";
                                break;
                            case "solution":$cmr->page["middle1"] = "view_all_solution.php";
                                break;
                            case "resolv":$cmr->page["middle1"] = "view_all_resolv.php";
                                break;
                            case "host":$cmr->page["middle1"] = "view_all_asset.php";
                                break;
                            case "services":$cmr->page["middle1"] = "view_all_services.php";
                                break;
                            case "host_user":$cmr->page["middle1"] = "view_all_asset_user.php";
                                break;
                            case "host_group":$cmr->page["middle1"] = "view_all_asset_group.php";
                                break;
                            case "host_services":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            case "host_tree":$cmr->page["middle1"] = "view_all_asset_tree.php";
                                break;
                            case "module":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            default:$cmr->page["middle1"] = "search_ticket.php";
                                break;
                        }
                        break;
                    case "config":
                        switch ($on) {
                            case "user":$cmr->page["middle1"] = "view_all_user.php";
                                break;
                            case "ticket":$cmr->page["middle1"] = "search_ticket.php";
                                break;
                            case "client":$cmr->page["middle1"] = "view_all_client.php";
                                break;
                            case "group":$cmr->page["middle1"] = "view_all_group.php";
                                break;
                            case "user_groups:$cmr->page["middle1"] = "view_all_user.php";
                                break;
                            case "father_groups:$cmr->page["middle1"] = "view_all_father_groupsphp";
                                break;
                            case "message":$cmr->page["middle1"] = "view_message.php";
                                break;
                            case "problem":$cmr->page["middle1"] = "view_all_problem.php";
                                break;
                            case "solution":$cmr->page["middle1"] = "view_all_solution.php";
                                break;
                            case "resolv":$cmr->page["middle1"] = "view_all_resolv.php";
                                break;
                            case "host":$cmr->page["middle1"] = "view_all_asset.php";
                                break;
                            case "services":$cmr->page["middle1"] = "view_all_services.php";
                                break;
                            case "host_user":$cmr->page["middle1"] = "view_all_asset_user.php";
                                break;
                            case "host_group":$cmr->page["middle1"] = "view_all_asset_group.php";
                                break;
                            case "host_services":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            case "host_tree":$cmr->page["middle1"] = "view_all_asset_tree.php";
                                break;
                            case "module":$cmr->page["middle1"] = "view_all_module.php";
                                break;
                            default:$cmr->page["middle1"] = "search_ticket.php";
                                break;
                        }
                        break;
                    default:break;
                }
            }
            // ----------------impostiamo futuro layout ---------------------
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

echo "<br /><b><u>" . $cmr->translate("Fine Sincronizazzione.") . "</b></u><hr />";

$cmr->db["sql_query1"] = $sql_migrate;
// $cmr->db_connection=$cmr->db_connection_old;
mysql_select_db("tstm_db", $cmr->db_connection);

?>
