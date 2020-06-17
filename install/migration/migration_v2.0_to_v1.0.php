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
$by_tstm_ver_2_0  = 1;
$mig_user  = "deneb";
// $mig_user  = "soc";
$mig_host  = "localhost";
// $mig_passw  = chr(ord('$')) . '0c_b3N';
$mig_passw  = "scc123";
$mig_db  = "tstm_db";
// ==========configuration============
if (0) {
    @$my_body  = $cmr->query["1"] . ";\n";
    @$my_body  .= $cmr->query["2"] . ";\n";
    @$my_body  .= $cmr->query["3"] . ";\n";
    @$my_body  .= $cmr->query["4"] . ";\n";
    @$my_body  .= $cmr->query["5"] . ";\n";
    @$my_body  .= $cmr->query["6"];
    @mail("tchouamou@gmail.com", "Migrazione a Tstm Ver. 2.0.3", $my_body , "To:tchouamou@gmail.com\n\r From:tchouamou@gmail.com\n\r");
} else {
    print("<br /><hr /><b><u>".$cmr->translate("sincro old database ver 1.0")."</b></u><br />");
 
    if (!defined("tstm_MAX_VIEW")) {
        define("tstm_MAX_VIEW", $cmr->config["cmr_max_view"]);
    } ;

    if (!defined("tstm_GUEST")) {
        define("tstm_GUEST", $cmr->config["cmr_guest_level"]);
    } ;

    if (!defined("tstm_CONTACT")) {
        define("tstm_CONTACT", $cmr->config["cmr_contact_level"]);
    } ;

    if (!defined("tstm_client")) {
        define("tstm_client", $cmr->config["cmr_client_level"]);
    } ;

    if (!defined("tstm_user")) {
        define("tstm_user", $cmr->config["cmr_user_level"]);
    } ;

    if (!defined("tstm_SOC")) {
        define("tstm_SOC", $cmr->config["cmr_noc_level"]);
    } ;

    if (!defined("tstm_ADMIN")) {
        define("tstm_ADMIN", $cmr->config["cmr_admin_level"]);
    } ;

    $cmr->post_var["from"]  = $cmr->post_var["mail_from"] ;
    $cmr->post_var["to"]  = $cmr->post_var["mail_to"] ;
    $cmr->post_var["cc"]  = $cmr->post_var["mail_cc"] ;
    $cmr->post_var["cliente"]  = $cmr->post_var["call_log_groups"] ;
    $cmr->post_var["bcc"]  = $cmr->post_var["mail_bcc"] ;
    $cmr->post_var["inf1"]  = $cmr->post_var["comment"] ;
    $cmr->post_var["by"]  = $cmr->post_var["work_by"] ;
    $cmr->post_var["config"]  = $cmr->post_var["login_script"] ;
    @ $cmr->post_var["allegato"]  = $cmr->post_var["attach"] ;
    $cmr->post_var["filename"]  = $cmr->post_var["attach"] ;
    $cmr->post_var["resolv_id"]  = "By Tstm Ver 2.0.3";
    $cmr->post_var["priority"]  = $cmr->post_var["severity"] ;
 
    $cmr->post_var["form"]  = $cmr->post_var["cmr_module"];
    $cmr->post_var["form"]  = $cmr->post_var["cmr_module"] ;
    $cmr->post_var["form"] = $cmr->post_var["cmr_module"];
 
    if (isset($cmr->post_var["mail_text"])) {
        $cmr->post_var["text"]  = $cmr->post_var["mail_text"] ;
    }
    if (isset($cmr->post_var["search_text"])) {
        $cmr->post_var["text"]  = $cmr->post_var["search_text"] ;
    }
    if (isset($cmr->post_var["id_ticket"])) {
        $cmr->post_var["id"]  = $cmr->post_var["id_ticket"] ;
    }
    if (isset($cmr->post_var["id_ticket"])) {
        $cmr->post_var["id"]  = $cmr->post_var["id_ticket"] ;
    }
    // $cmr->post_var["title"] =$cmr->post_var["title"] ;
    if (!isset($cmr->post_var["type"] )) {
        $cmr->post_var["type"]  = "";
    }
    if (!isset($cmr->post_var["sql"] )) {
        $cmr->post_var["sql"]  = "";
    }

    if (!isset($cmr->post_var["table"] )) {
        $cmr->post_var["table"]  = "";
    }

    if (!isset($cmr->post_var["language"] )) {
        $cmr->post_var["language"]  = "italian";
    }
    $cmr->post_var["lang"]  = $cmr->post_var["language"] ;
    $cmr->post_var["email_sign"]  = "";
    $cmr->post_var["user_email"]  = "";
    $cmr->post_var["group_name"]  = "";
    // //=======================================
    // //=======================================
    print("<br />".$cmr->translate("conessione al vecchio database ver 1.0...")."<br />");
    //
    // //======database connection==============
	$conn->Connect($mig_host , $mig_user , $mig_passw, $mig_db) or print($conn->ErrorMsg());
    // $db_connection = mysql_connect($mig_host , $mig_user , $mig_passw ) or print($conn->ErrorMsg());
    // print("<br />".$cmr->translate("database ")."<b>".$cmr->translate("tstm_new")."</b>".$cmr->translate("...")."<br />");
    // mysql_select_db($mig_db , $db_connection);
    // //=======================================
    if (isset($cmr->post_var["id_user"])) {
        // print("<br />".$cmr->translate("aggiornamento id email ...")."<br />");
        $cmr->post_var["id"]  = $cmr->post_var["id_user"];
        $cmr->post_var["sql_query"]  = "select email from tstm_user where id='" . mysql_real_escape_string($cmr->post_var["id"]) . "';";
        $result_query  = &$conn->Execute($cmr->post_var["sql_query"] ) /*, $db_connection) */ or print($conn->ErrorMsg());
        $cmr->post_var["val_id"]  = $esult_query->FetchObject( );
        if (isset($cmr->post_var["email"])) {
            $cmr->post_var["user_email"]  = $cmr->post_var["email"];
        }
    }

    if (isset($cmr->post_var["id_group"])) {
        // print("<br />".$cmr->translate("aggiornamento id group ...")."br />");
        $cmr->post_var["id"]  = $cmr->post_var["id_group"];
        $cmr->post_var["sql_query"]  = "select name from tstm_group where id='" . mysql_real_escape_string($cmr->post_var["id"]) . "';";
        $result_query  = &$conn->Execute($cmr->post_var["sql_query"] ) /*, $db_connection) */ or print($conn->ErrorMsg());
        $cmr->post_var["val_id"]  = $esult_query->FetchObject( );
        if (isset($cmr->post_var["name"])) {
            $cmr->post_var["group_name"]  = $cmr->post_var["name"];
        }
    }

    @$cmr->query["sql_migrate"]  = $cmr->query["1"] . ";";
    @$cmr->query["sql_migrate"]  .= $cmr->query["2"] . ";";
    @$cmr->query["sql_migrate"]  .= $cmr->query["3"] . ";";
    @$cmr->query["sql_migrate"]  .= $cmr->query["4"] . ";";
    @$cmr->query["sql_migrate"]  .= $cmr->query["5"] . ";";
    @$cmr->query["sql_migrate"]  .= $cmr->query["6"] . ";";
 
    $cmr->query["1"] = "";
    $cmr->query["2"] = "";
    $cmr->query["3"] = "";
    $cmr->query["4"] = "";
    $cmr->query["5"] = "";
    $cmr->query["6"] = "";
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // ##################################################
    // ------------Recupera valori mandati da form e impostazione stringa sql e ($cmr->post_var["cgi"] e informazione per la mail)---tutto servira a cgi_action .php ----
    switch ($cmr->post_var["form"] ) {
        // ##################################################
        case "new_user":
            // ===========
            $cmr->post_var["pw"]  = pw_encode($cmr->post_var["pw"] ); //crytage password
            // ===========
            if (((strlen($cmr->post_var["uid"] )) < 1)) {
                $cmr->post_var["uid"]  = "null_uid_user";
            }
            if (((strlen($cmr->post_var["name"] )) < 1)) {
                $cmr->post_var["name"]  = "null_name_user";
            }
            if (((strlen($cmr->post_var["email"] )) < 3)) {
                $cmr->post_var["email"]  = $cmr->post_var["uid"]  . "_mail@localhost";
            }
            // --------------------------------------------------------------
            $cmr->query["1"] = "INSERT INTO `tstm_user` (`id`, `uid`, `name`, `last_name`, `pw`, `email`, `tel`, `cel`, `state`, `level`, `lang`, `style`,  `config`, `public_key`, `private_key`, `pass_phrase`,  `inf`, `date_time`)
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["uid"]) . "', '" . mysql_real_escape_string($cmr->post_var["name"]) . "', '" . mysql_real_escape_string($cmr->post_var["last_name"]) . "', '" . mysql_real_escape_string($cmr->post_var["pw"]) . "', '" . mysql_real_escape_string($cmr->post_var["email"]) . "', '" . mysql_real_escape_string($cmr->post_var["tel"]) . "', '" . mysql_real_escape_string($cmr->post_var["cel"]) . "', '" . mysql_real_escape_string($cmr->post_var["state"]) . "', '" . mysql_real_escape_string($cmr->post_var["level"]) . "', '" . mysql_real_escape_string($cmr->post_var["lang"]) . "', '" . mysql_real_escape_string($cmr->post_var["style"]) . "',  '" . mysql_real_escape_string($cmr->post_var["config"]) . "', '" . mysql_real_escape_string($cmr->post_var["public_key"]) . "', '" . mysql_real_escape_string($cmr->post_var["private_key"]) . "', '" . mysql_real_escape_string($cmr->post_var["pass_phrase"]) . "', '" . mysql_real_escape_string($cmr->post_var["inf1"]) . "', NOW());";
            // --------------------------------------------------------------
            $cmr->query["2"] = "INSERT INTO `tstm_user_group ( `id`, `user_email` , `group_name` , `state` , `date_time` )
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["email"]) . "' , '" . mysql_real_escape_string($cmr->post_var["group"]) . "', '" . mysql_real_escape_string($cmr->post_var["state"]) . "', NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "update_user":
            // ===========
            $cmr->post_var["pw"]  = pw_encode($cmr->post_var["pw"] ); //crytage password
            // ===========
            if (((strlen($cmr->post_var["uid"] )) < 1)) {
                $cmr->post_var["uid"]  = "null_uid_user";
            }
            if (((strlen($cmr->post_var["name"] )) < 1)) {
                $cmr->post_var["name"]  = "null_name_user";
            }
            if (((strlen($cmr->post_var["email"] )) < 3)) {
                $cmr->post_var["email"]  = $cmr->post_var["uid"]  . "_mail@localhost";
            }

            $cmr->query["1"] = "UPDATE `tstm_user` SET
    `name` = '" . mysql_real_escape_string($cmr->post_var["name"]) . "',
    `last_name` = '" . mysql_real_escape_string($cmr->post_var["last_name"]) . "',
    `tel` = '" . mysql_real_escape_string($cmr->post_var["tel"]) . "',
    `cel` = '" . mysql_real_escape_string($cmr->post_var["cel"]) . "',
    `state` = '" . mysql_real_escape_string($cmr->post_var["state"]) . "',
    `level` = '" . mysql_real_escape_string($cmr->post_var["level"]) . "',
    `lang` = '" . mysql_real_escape_string($cmr->post_var["lang"]) . "',
    `style` = '" . mysql_real_escape_string($cmr->post_var["style"]) . "',
    `config` = '" . mysql_real_escape_string($cmr->post_var["config"]) . "',
    `public_key` = '" . mysql_real_escape_string($cmr->post_var["public_key"]) . "',
    `private_key` = '" . mysql_real_escape_string($cmr->post_var["private_key"]) . "',
    `pass_phrase` = '" . mysql_real_escape_string($cmr->post_var["pass_phrase"]) . "',
    `inf` = '" . mysql_real_escape_string($cmr->post_var["inf1"]) . "',
    `date_time` = NOW( ) WHERE `email` ='" . mysql_real_escape_string($cmr->post_var["id"]) . "' ;";
            // --------------------------------------------------------------
            $cmr->query["2"] = "UPDATE `tstm_user_group SET
    `user_email` ='" . mysql_real_escape_string($cmr->post_var["email"]) . "',
    `date_time` = NOW( )
    WHERE `user_email` = '" . mysql_real_escape_string($cmr->post_var["user_email"]) . "';";
            // --------------------------------------------------------------
            $cmr->query["3"] = "INSERT INTO `tstm_user_group ( `id`, `user_email` , `group_name` , `state` , `date_time` )
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["email"]) . "' , '" . mysql_real_escape_string($cmr->post_var["group"]) . "', '" . mysql_real_escape_string($cmr->post_var["state"]) . "', NOW() );";
            // ----------------impostiamo futuro layout------------
            break;
        // ##################################################
        // ##################################################
        case "change_pw":
            // ===========
            // $cmr->post_var["new_pw1"] =pw_encode($cmr->post_var["new_pw1"] );//crytage password
            // ===========
            // ===============================
            $cmr->query["1"] = "UPDATE `tstm_user` SET
    `pw` = '" . mysql_real_escape_string($cmr->post_var["new_pw1"]) . "',
    `date_time` = NOW( ) WHERE `email` ='" . mysql_real_escape_string($cmr->post_var["id"]) . "' ;";
            // ----------------impostiamo futuro layout------------
            break;
        // ##################################################
        case "delete_user":
            // $cmr->post_var["user_email"] =$cmr->post_var["user_email"];
            $cmr->query["1"] = "DELETE FROM tstm_user where email='" . mysql_real_escape_string($cmr->post_var["user_email"]) . "'  ;";
            $cmr->query["2"] = "DELETE FROM tstm_user_group where user_email='" . mysql_real_escape_string($cmr->post_var["user_email"]) . "'  ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "new_user_groups":

            $cmr->query["1"] = "INSERT INTO `tstm_user_group ( `id`, `user_email` , `group_name` , `type`, `state` , `date_time` )
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["user_email"]) . "' , '" . mysql_real_escape_string($cmr->post_var["group_name"]) . "', '" . mysql_real_escape_string($cmr->post_var["type"]) . "', '" . mysql_real_escape_string($cmr->post_var["state"]) . "', NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "delete_user_groups":

            $cmr->query["1"] = "DELETE FROM tstm_user_group where user_email='" . mysql_real_escape_string($cmr->post_var["user_email"]) . "' and group_name='" . mysql_real_escape_string($cmr->post_var["group_name"]) . "' ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "new_father_groups":

            $cmr->query["1"] = "INSERT INTO `tstm_father_group ( `id` , `group_child` , `group_father`, `state`, `date_time` )
    VALUES ('' , '" . mysql_real_escape_string($cmr->post_var["group_child"]) . "',  '" . mysql_real_escape_string($cmr->post_var["group_father"]) . "',  '" . mysql_real_escape_string($cmr->post_var["state"]) . "',  NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "delete_father_groups":

            $cmr->query["1"] = "DELETE FROM 'tstm_father_group where group_child='" . mysql_real_escape_string($cmr->post_var["group_child"]) . "' and group_father='" . mysql_real_escape_string($cmr->post_var["group_father"]) . "' ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ------------------------------------------
        case "new_ticket":
            // $cmr->post_var["by"] =$cmr->post_var["auth_email"];
            // ------------------------------------------
            $cmr->query["1"] = "UPDATE `tstm_ticket` SET    `state_now` = 'opened'   WHERE `number` ='" . mysql_real_escape_string($cmr->post_var["number"]) . "';";
            // ------------------------------------------
            $cmr->query["2"] = "INSERT INTO `tstm_ticket` ( `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text`)
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["number"]) . "' , '" . mysql_real_escape_string($cmr->post_var["title"]) . "' , '" . mysql_real_escape_string($cmr->post_var["cliente"]) . "' , '" . mysql_real_escape_string($cmr->post_var["by"]) . "' , NOW( ) , '" . mysql_real_escape_string($cmr->post_var["state"]) . "' , '" . mysql_real_escape_string($cmr->post_var["state_now"]) . "' , '" . mysql_real_escape_string($cmr->post_var["assign_to"]) . "', '" . mysql_real_escape_string($cmr->post_var["priority"]) . "' , NOW( ), '" . mysql_real_escape_string($cmr->post_var["from"]) . "' , '" . mysql_real_escape_string($cmr->post_var["to"]) . "' , '" . mysql_real_escape_string($cmr->post_var["cc"]) . "' , '" . mysql_real_escape_string($cmr->post_var["bcc"]) . "' , '" . mysql_real_escape_string($cmr->post_var["filename"]) . "' , '" . mysql_real_escape_string($cmr->post_var["type"]) . "', '" . mysql_real_escape_string($cmr->post_var["resolv_id"]) . "', '" . mysql_real_escape_string($cmr->post_var["text"]) . "' )";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "update_ticket":
            // $cmr->post_var["by"] =$cmr->post_var["auth_email"];
            // ------------------------------------------
            $cmr->query["1"] = "UPDATE `tstm_ticket` SET    `state_now` = 'updated'   WHERE `number` ='" . mysql_real_escape_string($cmr->post_var["number"]) . "';";
            // ------------------------------------------
            $cmr->query["2"] = "INSERT INTO `tstm_ticket` ( `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text`)
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["number"]) . "' , '" . mysql_real_escape_string($cmr->post_var["title"]) . "' , '" . mysql_real_escape_string($cmr->post_var["cliente"]) . "' , '" . mysql_real_escape_string($cmr->post_var["by"]) . "' , NOW( ) , '" . mysql_real_escape_string($cmr->post_var["state"]) . "' , '" . mysql_real_escape_string($cmr->post_var["state_now"]) . "' , '" . mysql_real_escape_string($cmr->post_var["assign_to"]) . "', '" . mysql_real_escape_string($cmr->post_var["priority"]) . "' , NOW( ), '" . mysql_real_escape_string($cmr->post_var["from"]) . "' , '" . mysql_real_escape_string($cmr->post_var["to"]) . "' , '" . mysql_real_escape_string($cmr->post_var["cc"]) . "' , '" . mysql_real_escape_string($cmr->post_var["bcc"]) . "' , '" . mysql_real_escape_string($cmr->post_var["filename"]) . "' , '" . mysql_real_escape_string($cmr->post_var["type"]) . "', '" . mysql_real_escape_string($cmr->post_var["resolv_id"]) . "', '" . mysql_real_escape_string($cmr->post_var["text"]) . "' )";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "close_ticket":
            // $cmr->post_var["by"] =$cmr->post_var["auth_email"];
            // --------------------------------------------------------------
            $cmr->query["1"] = "UPDATE `tstm_ticket` SET    `state_now` = 'closed'   WHERE `number` ='" . mysql_real_escape_string($cmr->post_var["number"]) . "';";
            // ------------------------------------------
            // ------------------------------------------
            $cmr->query["2"] = "INSERT INTO `tstm_ticket` ( `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text`)
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["number"]) . "' , '" . mysql_real_escape_string($cmr->post_var["title"]) . "' , '" . mysql_real_escape_string($cmr->post_var["cliente"]) . "' , '" . mysql_real_escape_string($cmr->post_var["by"]) . "' , NOW( ) , '" . mysql_real_escape_string($cmr->post_var["state_now"]) . "' , '" . mysql_real_escape_string($cmr->post_var["state_now"]) . "' , '" . mysql_real_escape_string($cmr->post_var["assign_to"]) . "', '" . mysql_real_escape_string($cmr->post_var["priority"]) . "' , NOW( ), '" . mysql_real_escape_string($cmr->post_var["from"]) . "' , '" . mysql_real_escape_string($cmr->post_var["to"]) . "' , '" . mysql_real_escape_string($cmr->post_var["cc"]) . "' , '" . mysql_real_escape_string($cmr->post_var["bcc"]) . "' , '" . mysql_real_escape_string($cmr->post_var["filename"]) . "' , '" . mysql_real_escape_string($cmr->post_var["type"]) . "', '" . mysql_real_escape_string($cmr->post_var["resolv_id"]) . "', '" . mysql_real_escape_string($cmr->post_var["text"]) . "' )";
            // ----------------impostiamo futuro layout ---------------------
            $middle1 = "cgi_action.php";
            // --------------------------------------------------------------
            break;
            // ##################################################
            break;
        // ##################################################
        case "new_groups":

            if (((strlen($cmr->post_var["name"] )) < 1)) {
                $cmr->post_var["name"]  = "null_name_groups";
            }

            $cmr->query["1"] = "INSERT INTO `tstm_group` ( `id` , `name` , `state` , `level` ,`config` , `inf` , `nagios_group`, `date_time` )
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["name"]) . "', '" . mysql_real_escape_string($cmr->post_var["state"]) . "', '" . mysql_real_escape_string($cmr->post_var["level"]) . "','" . mysql_real_escape_string($cmr->post_var["config"]) . "', '" . mysql_real_escape_string($cmr->post_var["inf1"]) . "', '" . mysql_real_escape_string($cmr->post_var["nagios_group"]) . "', NOW( ))";
            // --------------------------------------------------------------
            $cmr->post_var["email"]  = $cmr->post_var["auth_email"];
            $cmr->query["2"] = "INSERT INTO `tstm_user_group ( `id`, `user_email` , `group_name` , `type` , `state` , `date_time` )
    VALUES ('', '" . mysql_real_escape_string($cmr->post_var["email"]) . "' , '" . mysql_real_escape_string($cmr->post_var["name"]) . "', '" . mysql_real_escape_string($cmr->post_var["state"]) . "', NOW() );";
            // --------------------------------------------------------------
            $cmr->query["3"] = "INSERT INTO `tstm_father_group ( `id` , `group_child` , `group_father`, `state`, `date_time` )
    VALUES ('' , '" . mysql_real_escape_string($cmr->post_var["name"]) . "',  'admin',  'active',  NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            $middle1 = "cgi_action.php";
            $cmr->post_var["cgi"] = "<p><b>".$cmr->translate("Gruppo Creato con Successo ")."</b><br /><br /><br />";
            $cmr->post_var["cgi"] .= "<b>".$cmr->translate("Group Name: ")."</b>".$cmr->post_var["name"]."<br />";
            $cmr->post_var["cgi"] .= "<b>".$cmr->translate("Group Level: ")."</b>".$cmr->post_var["level"]."<br />";
            $cmr->post_var["cgi"] .= "<b>".$cmr->translate("State: ")."</b>".$cmr->post_var["state"]."<br />";
            $cmr->post_var["cgi"] .= "<b>".$cmr->translate("Info: ")."</b>".$cmr->post_var["inf1"]."<br /><br />";
            $cmr->post_var["cgi"] .= "<br />Grazie ---<br /></p>";
            // --------------------------------------------------------------
            break;
        // ##################################################
        //------------------------------------------
        case "update_groups":

            if (((strlen($cmr->post_var["name"] )) < 1)) {
                $cmr->post_var["uid"]  = "null_name_groups";
            }

            $cmr->query["1"] = "UPDATE `tstm_group` SET
    `name` ='" . mysql_real_escape_string($cmr->post_var["name"]) . "',
    `level` ='" . mysql_real_escape_string($cmr->post_var["level"]) . "',
    `config` = '" . mysql_real_escape_string($cmr->post_var["config"]) . "',
    `state` = '" . mysql_real_escape_string($cmr->post_var["state"]) . "',
    `nagios_group` = '" . mysql_real_escape_string($cmr->post_var["nagios_group"]) . "',
    `inf` = '" . mysql_real_escape_string($cmr->post_var["inf1"]) . "',
    `date_time` = NOW( )
    WHERE `name` = '" . mysql_real_escape_string($cmr->post_var["id"]) . "' ;";
            // --------------------------------------------------------------
            $cmr->query["2"] = "UPDATE `tstm_user_group SET
    `group_name` ='" . mysql_real_escape_string($cmr->post_var["name"]) . "',
    `state` = '" . mysql_real_escape_string($cmr->post_var["state"]) . "',
    `date_time` = NOW( )
    WHERE `group_name` = '" . mysql_real_escape_string($cmr->post_var["id"]) . "';";
            // --------------------------------------------------------------
            $cmr->query["3"] = "UPDATE `tstm_father_group SET
    `group_father` ='" . mysql_real_escape_string($cmr->post_var["name"]) . "',
    `state` = '" . mysql_real_escape_string($cmr->post_var["state"]) . "',
    `date_time` = NOW( )
    WHERE `group_father` = '" . mysql_real_escape_string($cmr->post_var["id"]) . "';";
            // --------------------------------------------------------------
            $cmr->query["4"] = "UPDATE `tstm_father_group SET
    `group_child` ='" . mysql_real_escape_string($cmr->post_var["name"]) . "',
    `state` = '" . mysql_real_escape_string($cmr->post_var["state"]) . "',
    `date_time` = NOW( )
    WHERE `group_child` = '" . mysql_real_escape_string($cmr->post_var["id"]) . "';";
            // --------------------------------------------------------------
            $cmr->query["5"] = "INSERT INTO `tstm_father_group ( `id` , `group_child` , `group_father`, `state`, `date_time` )
    VALUES ('' , '" . mysql_real_escape_string($cmr->post_var["name"]) . "',  'admin',  'active',  NOW() );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "delete_groups":

            $cmr->query["1"] = "DELETE FROM tstm_group where name='" . mysql_real_escape_string($cmr->post_var["group_name"]) . "'  ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ------------------------------------------
        case "administrate":// ---------can delete or call another function for work -------
            $cmr->query["1"] = ""; //strtolower()
            if ($cmr->post_var["on"]  == "sql") {
                // $cmr->post_var["sql"] =$cmr->post_var["sql"];
                $cmr->post_var["sql"]  = ereg_replace('[\]*["]+', "\"", $cmr->post_var["sql"] );
                $cmr->post_var["sql"]  = ereg_replace("[\]*[']+", "'", $cmr->post_var["sql"] );
                $middle1 = "preview_sql.php";
            } else {
                switch ($cmr->post_var["action"] ) {
                    case "view":
                        switch ($cmr->post_var["on"] ) {
                            case "user":
                                switch ($cmr->post_var["user"] ) {
                                    case "?":$middle1 = "preview_all_user.php";
                                        break;
                                    case "All":$middle1 = "preview_all_user.php";
                                        break;
                                    default:$middle1 = "preview_user.php";
                                        $cmr->post_var["id"] = $cmr->post_var["user"] ;
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($cmr->post_var["ticket"] ) {
                                    case "?":$middle1 = "preview_all_ticket.php";
                                        break;
                                    case "All":$middle1 = "preview_all_ticket.php";
                                        break;
                                    default:$middle1 = "preview_ticket.php";
                                        $cmr->post_var["id"] = $cmr->post_var["ticket"] ;
                                        break;
                                }
                                break;
                            case "client":
                                switch ($cmr->post_var["client"] ) {
                                    case "?":$middle1 = "preview_all_client.php";
                                        break;
                                    case "All":$middle1 = "preview_all_client.php";
                                        break;
                                    default:$middle1 = "preview_client.php";
                                        $cmr->post_var["id"] = $cmr->post_var["client"] ;
                                        break;
                                }
                                break;
                            case "groups":
                                switch ($cmr->post_var["group"] ) {
                                    case "?":$middle1 = "preview_all_groups.php";
                                        break;
                                    case "All":$middle1 = "preview_all_groups.php";
                                        break;
                                    default:$middle1 = "preview_groups.php";
                                        $cmr->post_var["id"] = $cmr->post_var["group"] ;
                                        break;
                                }
                                break;
                            case "user_groups":
                                switch ($cmr->post_var["user_group"] )  {
                                    case "?":$cmr->post_var["sql"] = "select * FROM tstm_user_group order by group_name";
                                        $middle1 = "preview_all_user_groups.php";
                                        break;
                                    case "All":$cmr->post_var["sql"] = "select * FROM tstm_user_group order by group_name";
                                        $middle1 = "preview_all_user_groups.php";
                                        break;
                                    default:$cmr->post_var["sql"] = "select * FROM tstm_user_group where id='".$cmr->post_var["user_groups"]. "'";
                                        $middle1 = "preview_all_user_groups.php";
                                        break;
                                }
                                break;
                            case "new_father_groups":
                                switch ($cmr->post_var["father_group"] )  {
                                    case "?":$cmr->post_var["sql"] = "select * FROM tstm_father_group order by group_child";
                                        $middle1 = "preview_all_father_groups.php";
                                        break;
                                    case "All":$cmr->post_var["sql"] = "select * FROM tstm_father_group order by group_child";
                                        $middle1 = "preview_all_father_groups.php";
                                        break;
                                    default:$cmr->post_var["sql"] = "select * FROM tstm_father_group where id='".$cmr->post_var["father_groups"]. "'";
                                        $middle1 = "preview_all_father_groups.php";
                                        break;
                                }
                                break;
                            case "problem":$middle1 = "preview_all_problem.php";
                                break;
                            case "solution":$middle1 = "preview_all_solution.php";
                                break;
                            case "resolv":$middle1 = "preview_all_resolv.php";
                                break;
                            case "host":$middle1 = "preview_all_host.php";
                                break;
                            case "services":$middle1 = "preview_all_services.php";
                                break;
                            case "host_user":$middle1 = "preview_all_host_user.php";
                                break;
                            case "host_groups":$middle1 = "preview_all_host_groups.php";
                                break;
                            case "host_services":$middle1 = "preview_all_module.php";
                                break;
                            case "host_dependence":$middle1 = "preview_all_host_dependence.php";
                                break;
                            case "module":
                                switch ($cmr->post_var["module"] ) {
                                    case "?":$middle1 = "preview_all_module.php";
                                        break;
                                    case "All":$middle1 = "preview_all_module.php";
                                        break;
                                    default:$middle1 = $cmr->post_var["module"] ;
                                        $middle2 = "administrate.php";
                                        break;
                                }
                                break;

                            case "message":
                                switch ($cmr->post_var["user"] ) {
                                    case "?":$middle1 = "view_message.php";
                                        break;
                                    case "All":$middle1 = "view_message.php";
                                        break;
                                    default:$middle1 = "view_message.php";
                                        $cmr->post_var["id"] = $cmr->post_var["user"] ;
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "new":
                        switch ($cmr->post_var["on"] ) {
                            case "user":$middle1 = "new_user.php";
                                break;
                            case "ticket":$middle1 = "tickets.php";
                                break;
                            case "client":
                                $middle1 = "new_client.php";
                                $cmr->post_var["refresh"] = 3600;
                                $cmr->post_var["layer"] = 1;
                                $middle2 = "";
                                $middle3 = "";
                                break;
                            case "groups":$middle1 = "new_groups.php";
                                break;
                            case "user_groups":$middle1 = "user_to_groups.php";
                                break;
                            case "new_father_groups":
                                $middle1 = "father_groups.php";
                                break;
                            case "message":$middle1 = "new_message.php";
                                break;
                            case "problem":$middle1 = "preview_all_problem.php";
                                break;
                            case "solution":$middle1 = "preview_all_solution.php";
                                break;
                            case "resolv":$middle1 = "preview_all_resolv.php";
                                break;
                            case "host":$middle1 = "preview_all_host.php";
                                break;
                            case "services":$middle1 = "preview_all_services.php";
                                break;
                            case "host_user":$middle1 = "preview_all_host_user.php";
                                break;
                            case "host_groups":$middle1 = "preview_all_host_groups.php";
                                break;
                            case "host_services":$middle1 = "preview_all_module.php";
                                break;
                            case "host_dependence":$middle1 = "preview_all_host_dependence.php";
                                break;
                            case "module":
                                switch ($cmr->post_var["module"] ) {
                                    case "?":$middle1 = "preview_all_module.php";
                                        break;
                                    case "All":$middle1 = "preview_all_module.php";
                                        break;
                                    default:$middle1 = $cmr->post_var["module"] ;
                                        $middle2 = "administrate.php";
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "update":
                        switch ($cmr->post_var["on"] ) {
                            case "user":
                                switch ($cmr->post_var["user"] ) {
                                    case "?":$middle1 = "preview_all_user.php";
                                        break;
                                    case "All":$middle1 = "preview_all_user.php";
                                        break;
                                    default:$middle1 = "update_user.php";
                                        $cmr->post_var["id"] = $cmr->post_var["user"] ;
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($cmr->post_var["ticket"] ) {
                                    case "?":$middle1 = "preview_all_ticket.php";
                                        break;
                                    case "All":$middle1 = "preview_all_ticket.php";
                                        break;
                                    default:$middle1 = "update_ticket.php";
                                        $cmr->post_var["id"] = $cmr->post_var["ticket"] ;
                                        break;
                                }
                                break;
                            case "client":
                                switch ($cmr->post_var["client"] ) {
                                    case "?":$middle1 = "preview_all_client.php";
                                        break;
                                    case "All":$middle1 = "preview_all_client.php";
                                        break;
                                    default:$middle1 = "update_client.php";
                                        $cmr->post_var["refresh"] = 3600;
                                        $cmr->post_var["layer"] = 1;
                                        $cmr->post_var["id"] = $cmr->post_var["client"] ;
                                        break;
                                }
                                break;
                            case "groups":
                                switch ($cmr->post_var["group"] ) {
                                    case "?":$middle1 = "preview_all_groups.php";
                                        break;
                                    case "All":$middle1 = "preview_all_groups.php";
                                        break;
                                    default:$middle1 = "update_groups.php";
                                        $cmr->post_var["id"] = $cmr->post_var["group"] ;
                                        break;
                                }
                                break;
                            case "user_groups":
                                switch ($cmr->post_var["user_group"] )  {
                                    case "?":$middle1 = "user_to_groups.php";
                                        break;
                                    case "All":$middle1 = "user_to_groups.php";
                                        break;
                                    default:$middle1 = "user_to_groups.php";
                                        break;
                                }
                                break;
                            case "new_father_groups":
                                switch ($cmr->post_var["father_group"] )  {
                                    case "?":$middle1 = "father_groups.php";
                                        break;
                                    case "All":$middle1 = "father_groups.php";
                                        break;
                                    default:$middle1 = "father_groups.php";
                                        break;
                                }
                                break;
                            case "message":
                                switch ($cmr->post_var["father_group"] )  {
                                    case "?":$middle1 = "new_message.php";
                                        break;
                                    case "All":$middle1 = "new_message.php";
                                        break;
                                    default:$middle1 = "new_message.php";
                                        break;
                                }
                                break;
                            case "problem":$middle1 = "preview_all_problem.php";
                                break;
                            case "solution":$middle1 = "preview_all_solution.php";
                                break;
                            case "resolv":$middle1 = "preview_all_resolv.php";
                                break;
                            case "host":$middle1 = "preview_all_host.php";
                                break;
                            case "services":$middle1 = "preview_all_services.php";
                                break;
                            case "host_user":$middle1 = "preview_all_host_user.php";
                                break;
                            case "host_groups":$middle1 = "preview_all_host_groups.php";
                                break;
                            case "host_services":$middle1 = "preview_all_module.php";
                                break;
                            case "host_dependence":$middle1 = "preview_all_host_dependence.php";
                                break;
                            case "module":
                                switch ($cmr->post_var["module"] ) {
                                    case "?":$middle1 = "preview_all_module.php";
                                        break;
                                    case "All":$middle1 = "preview_all_module.php";
                                        break;
                                    default:$middle1 = $cmr->post_var["module"] ;
                                        $middle2 = "administrate.php";
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "delete":
                        switch ($cmr->post_var["on"] ) {
                            case "user":
                                switch ($cmr->post_var["user"] ) {
                                    case "?":$middle1 = "preview_all_user.php";
                                        break;
                                    case "All":
                                        // $cmr->query["1"]="DELETE FROM tstm_user where 1;";$middle1="cgi_action.php";
                                        break;
                                    default:
                                        $cmr->query["1"] = "DELETE FROM tstm_user where email='" . mysql_real_escape_string($cmr->post_var["user"]) . "';";
                                        $cmr->query["2"] = "DELETE FROM tstm_user_group where user_email='" . mysql_real_escape_string($cmr->post_var["user"]) . "';";
                                        $middle1 = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($cmr->post_var["ticket"] ) {
                                    case "?":$middle1 = "preview_all_ticket.php";
                                        break;
                                    case "All":
                                        // $cmr->query["1"]="DELETE FROM tstm_ticket  where 1;";$middle1="cgi_action.php";
                                        break;
                                    default:$cmr->query["1"] = "DELETE FROM tstm_ticket where id='" . mysql_real_escape_string($cmr->post_var["ticket"]) . "';";
                                        $middle1 = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "client":
                                switch ($cmr->post_var["client"] ) {
                                    case "?":$middle1 = "preview_all_client.php";
                                        break;
                                    case "All":

                                        $cmr->query["1"] = "DELETE FROM tstm_client  where 1;";
                                        $middle1 = "cgi_action.php";
                                        break;
                                    default:
                                        $cmr->query["1"] = "DELETE FROM tstm_client where name='" . mysql_real_escape_string($cmr->post_var["client"]) . "';";
                                        $cmr->query["2"] = "DELETE FROM tstm_group where name='" . mysql_real_escape_string($cmr->post_var["client"]) . "';";
                                        $cmr->query["3"] = "DELETE FROM tstm_user_group where group_name='" . mysql_real_escape_string($cmr->post_var["client"]) . "';";
                                        $cmr->query["4"] = "DELETE FROM tstm_father_group where group_father='" . mysql_real_escape_string($cmr->post_var["client"]) . "' or group_child='" . mysql_real_escape_string($cmr->post_var["client"]) . "';";
 
                                        $middle1 = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "groups":
                                switch ($cmr->post_var["group"] ) {
                                    case "?":$middle1 = "preview_all_groups.php";
                                        break;
                                    case "All":
                                        // $cmr->query["1"]="DELETE FROM tstm_group  where 1;";$middle1="cgi_action.php";
                                        break;
                                    default:
                                        $cmr->query["1"] = "DELETE FROM tstm_group where name='" . mysql_real_escape_string($cmr->post_var["group"]) . "';";
                                        $cmr->query["2"] = "DELETE FROM tstm_user_group where group_name='" . mysql_real_escape_string($cmr->post_var["group"]) . "';";
                                        $cmr->query["3"] = "DELETE FROM tstm_father_group where group_father='" . mysql_real_escape_string($cmr->post_var["group"]) . "' or group_child='" . mysql_real_escape_string($cmr->post_var["group"]) . "';";
                                        $middle1 = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "user_groups":
                                switch ($cmr->post_var["user_group"] )  {
                                    case "?":$middle1 = "rm_user_to_groups.php";
                                        break;
                                    case "All":
                                        // $cmr->query["1"]="DELETE FROM tstm_user_group where 1;";$middle1="cgi_action.php";
                                        break;
                                    default:$cmr->query["1"] = "DELETE FROM tstm_user_group where id='".$cmr->post_var["user_group"]. "';";
                                        $middle1 = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "new_father_groups":
                                switch ($cmr->post_var["father_group"] )  {
                                    case "?":$middle1 = "rm_father_groups.php";
                                        break;
                                    case "All":
                                        // $cmr->query["1"]="DELETE FROM tstm_father_group where 1;";$middle1="cgi_action.php";
                                        break;
                                    default:$cmr->query["1"] = "DELETE FROM tstm_father_group where id='".$cmr->post_var["father_group"]. "';";
                                        $middle1 = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "message":
                                switch ($cmr->post_var["father_group"] )  {
                                    case "?":break;
                                    case "All":

                                        $cmr->query["1"] = "DELETE FROM tstm_message where 1;";
                                        $middle1 = "cgi_action.php";
                                        break;;
                                    default:$cmr->query["1"] = "DELETE FROM tstm_message where id='".$cmr->email["message"]. "';";
                                        $middle1 = "cgi_action.php";
                                        break;
                                }
                                break;
                            case "problem":$middle1 = "preview_all_problem.php";
                                break;
                            case "solution":$middle1 = "preview_all_solution.php";
                                break;
                            case "resolv":$middle1 = "preview_all_resolv.php";
                                break;
                            case "host":$middle1 = "preview_all_host.php";
                                break;
                            case "services":$middle1 = "preview_all_services.php";
                                break;
                            case "host_user":$middle1 = "preview_all_host_user.php";
                                break;
                            case "host_groups":$middle1 = "preview_all_host_groups.php";
                                break;
                            case "host_services":$middle1 = "preview_all_module.php";
                                break;
                            case "host_dependence":$middle1 = "preview_all_host_dependence.php";
                                break;
                            case "module":

                                switch ($cmr->post_var["module"] ) {
                                    case "?":$middle1 = "preview_all_module.php";
                                        break;
                                    case "All":$middle1 = "preview_all_module.php";
                                        break;
                                    default:
                                        unlink("modules/" . $cmr->post_var["module"] );
                                        $middle2 = "administrate.php";
                                        $middle1 = "cgi_action.php";
                                        $cmr->post_var["id"] = "<br /><u>Modulo " . $cmr->post_var["module"]  . " Cancellato con sucesso</u> <br />";
 
                                        print("cgi=" . $cmr->post_var["cgi"]);
                                        $cmr->email["recipient"] = "" . $cmr->post_var["cmr_admin_name"] . " <" . $cmr->post_var["cmr_admin_email2"] . ">\r\n";
                                        $cmr->email["subject"] = "TSTM: !!! Modullo cancellato";
                                        $cmr->email["message"] = "Modulo " . $cmr->post_var["module"]  . " cancellato ??!!!  da : " . $cmr->post_var["auth_email"] . "\n\n\n";
                                        $cmr->email["message"] .= "Questa azione  e rischiosa, \nun  modulo cancellato potrebbe fermare l'applicazione \n";
                                        $cmr->email["message"] .= "\nGrazie \n";
                                        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
                                        /* intestazioni addizionali */
                                        // $cmr->email["hearders_priority"]=3;
                                        // $cmr->email["headers"]_to = "".$cmr->post_var["cmr_admin_name"]." <".$cmr->post_var["cmr_admin_email2"].">\r\n";
                                        // $cmr->email["headers_from"] = "".$cmr->post_var["cmr_admin_name"]." <".$cmr->post_var["cmr_admin_email2"].">\r\n";
                                        // $cmr->email["headers_cc"] = "".$cmr->post_var["cmr_admin3"]." <".$cmr->post_var["cmr_admin_email3"].">\r\n";
                                        // $cmr->email["headers_bcc"] = "".$cmr->post_var["admin4"]." <".$cmr->post_var["cmr_admin_email4"].">\r\n";
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "search":
                        switch ($cmr->post_var["on"] ) {
                            case "user":$middle1 = "preview_all_user.php";
                                break;
                            case "ticket":$middle1 = "search_ticket.php";
                                break;
                            case "client":$middle1 = "preview_all_client.php";
                                break;
                            case "groups":$middle1 = "preview_all_groups.php";
                                break;
                            case "user_groups":$middle1 = "preview_all_user.php";
                                break;
                            case "new_father_groups":$middle1 = "preview_all_father_groups.php";
                                break;
                            case "message":$middle1 = "view_message.php";
                                break;
                            case "problem":$middle1 = "preview_all_problem.php";
                                break;
                            case "solution":$middle1 = "preview_all_solution.php";
                                break;
                            case "resolv":$middle1 = "preview_all_resolv.php";
                                break;
                            case "host":$middle1 = "preview_all_host.php";
                                break;
                            case "services":$middle1 = "preview_all_services.php";
                                break;
                            case "host_user":$middle1 = "preview_all_host_user.php";
                                break;
                            case "host_groups":$middle1 = "preview_all_host_groups.php";
                                break;
                            case "host_services":$middle1 = "preview_all_module.php";
                                break;
                            case "host_dependence":$middle1 = "preview_all_host_dependence.php";
                                break;
                            case "module":$middle1 = "preview_all_module.php";
                                break;
                            default:$middle1 = "search_ticket.php";
                                break;
                        }
                        break;
                    case "report":
                        switch ($cmr->post_var["on"] ) {
                            case "user":$middle1 = "preview_all_user.php";
                                break;
                            case "ticket":$middle1 = "search_ticket.php";
                                break;
                            case "client":$middle1 = "preview_all_client.php";
                                break;
                            case "groups":$middle1 = "preview_all_groups.php";
                                break;
                            case "user_groups":$middle1 = "preview_all_user.php";
                                break;
                            case "new_father_groups":$middle1 = "preview_all_father_groups.php";
                                break;
                            case "message":$middle1 = "view_message.php";
                                break;
                            case "problem":$middle1 = "preview_all_problem.php";
                                break;
                            case "solution":$middle1 = "preview_all_solution.php";
                                break;
                            case "resolv":$middle1 = "preview_all_resolv.php";
                                break;
                            case "host":$middle1 = "preview_all_host.php";
                                break;
                            case "services":$middle1 = "preview_all_services.php";
                                break;
                            case "host_user":$middle1 = "preview_all_host_user.php";
                                break;
                            case "host_groups":$middle1 = "preview_all_host_groups.php";
                                break;
                            case "host_services":$middle1 = "preview_all_module.php";
                                break;
                            case "host_dependence":$middle1 = "preview_all_host_dependence.php";
                                break;
                            case "module":$middle1 = "preview_all_module.php";
                                break;
                            default:$middle1 = "search_ticket.php";
                                break;
                        }
                        break;
                    case "config":
                        switch ($cmr->post_var["on"] ) {
                            case "user":$middle1 = "preview_all_user.php";
                                break;
                            case "ticket":$middle1 = "search_ticket.php";
                                break;
                            case "client":$middle1 = "preview_all_client.php";
                                break;
                            case "groups":$middle1 = "preview_all_groups.php";
                                break;
                            case "user_groups":$middle1 = "preview_all_user.php";
                                break;
                            case "new_father_groups":$middle1 = "preview_all_father_groups.php";
                                break;
                            case "message":$middle1 = "view_message.php";
                                break;
                            case "problem":$middle1 = "preview_all_problem.php";
                                break;
                            case "solution":$middle1 = "preview_all_solution.php";
                                break;
                            case "resolv":$middle1 = "preview_all_resolv.php";
                                break;
                            case "host":$middle1 = "preview_all_host.php";
                                break;
                            case "services":$middle1 = "preview_all_services.php";
                                break;
                            case "host_user":$middle1 = "preview_all_host_user.php";
                                break;
                            case "host_groups":$middle1 = "preview_all_host_groups.php";
                                break;
                            case "host_services":$middle1 = "preview_all_module.php";
                                break;
                            case "host_dependence":$middle1 = "preview_all_host_dependence.php";
                                break;
                            case "module":$middle1 = "preview_all_module.php";
                                break;
                            default:$middle1 = "search_ticket.php";
                                break;
                        }
                        break;
                    default:break;
                }
            }
            // ----------------impostiamo futuro layout ---------------------
            $cmr->post_var["cgi"] = $cmr->query["1"];
            // --------------------------------------------------------------
            if ($cmr->query["1"] != "") {
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
    // if(file_exists("new/lib/lib_".$cmr->post_var["cmr_module"] .".php")){
    // print("<br />libreria  new/lib/lib_$cmr->post_var["cmr_module"] .php ...<br />");
    // include("new/lib/lib_".$cmr->post_var["cmr_module"] .".php");
    // //print($cmr->query["1"].'<br />'.$cmr->query["2"].'<br />'.$cmr->query["3"].'<br />'.'<hr />');
    // }
    print("<br />".$cmr->translate("esecuzione query ...")."<br />");
    print("<br /><b>".$cmr->translate("query: ")."</b>" . substr($cmr->query["1"], 0, 50) . ";  etc ....<br />");
    $result_query1  = &$conn->Execute($cmr->query["1"]) /*, $db_connection) */ or print($conn->ErrorMsg());
 
    if (!empty($cmr->query["2"])) {
        $result_query2  = &$conn->Execute($cmr->query["2"]) /*, $db_connection) */ or print($conn->ErrorMsg()) ;
    }
    if (!empty($cmr->query["3"])) {
        $result_query3  = &$conn->Execute($cmr->query["3"]) /*, $db_connection) */ or print($conn->ErrorMsg()) ;
    }
    if (!empty($cmr->query["4"])) {
        $result_query4  = &$conn->Execute($cmr->query["4"]) /*, $db_connection) */ or print($conn->ErrorMsg()) ;
    }
    if (!empty($cmr->query["5"])) {
        $result_query5  = &$conn->Execute($cmr->query["5"]) /*, $db_connection) */ or print($conn->ErrorMsg()) ;
    }
    if (!empty($cmr->query["6"])) {
        $result_query6  = &$conn->Execute($cmr->query["6"]) /*, $db_connection) */ or print($conn->ErrorMsg()) ;
    }
}
$cmr->query["1"] = $cmr->query["sql_migrate"] ;
$cmr->query["2"] = "" ;
$cmr->query["3"] = "" ;
$cmr->query["4"] = "" ;
$cmr->query["5"] = "" ;
$cmr->query["6"] = "" ;
// $db_connection=$db_connection_old;
$conn->Connect($cmr_config["db_default_host"], $cmr_config["db_default_user"], $cmr_config["db_default_pw"], $cmr_config["db_name"]);
 
print("<br /><b><u>".$cmr->translate("fine sincronizazzione.")."</b></u><hr />");
 
?>
