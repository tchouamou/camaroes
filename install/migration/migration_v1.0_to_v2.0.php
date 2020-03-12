<?php
/**
 * migration.php
 *         --------
 * begin    : July 2005 - July 2007
 * copyright   : Camaroes Ver 2.0 (C) 2005-2007 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/* vim: set expandtab tabstop=4 shiftwidth=4: */
/*
Copyright (c) 2006, Tchouamou Eric Herve <tchouamou@gmail.com>
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

migration.php,  2007-Feb-Tue 0:12:13
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
// $mig_user = "soc";
// $mig_passw = chr(ord('$')) . '0c_b3N';
$mig_user  = "deneb";
$mig_passw  = "scc123";
$mig_host = "localhost";
$mig_db = "tstm_db2";

$post_var["cmr_module"] = ${$VAR}['form'];
$post_var["cmr_module"] = str_replace("client", "group", $post_var["cmr_module"]);
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
if (ereg("client", $post_var["cmr_module"])) {
    @$my_body = $sql_query1 . ";\n";
    @$my_body .= $sql_query2 . ";\n";
    @$my_body .= $sql_query3 . ";\n";
    @$my_body .= $sql_query4 . ";\n";
    @$my_body .= $sql_query5 . ";\n";
    @$my_body .= $sql_query6;
    @mail("etchouamou@sg.it", "Migrazione a Tstm Ver. 2.0", $my_body, "To:etchouamou@sg.it\n\r From:etchoumou@sg.it\n\r");
}

echo "<br /><hr /><b><u>sincronizazzione nuovo database</b></u><br />";

 $cmr_config["tstm_max_view"]=tstm_MAX_VIEW;
 $cmr_config["tstm_guest_level"]=tstm_GUEST;
 $cmr_config["tstm_contact_level"]=tstm_CONTACT;
 $cmr_config["tstm_client_level"]=tstm_client;
 $cmr_config["tstm_user_level"]=tstm_user;
 $cmr_config["tstm_noc_level"]=tstm_SOC;
 $cmr_config["tstm_admin_level"]=tstm_ADMIN;
 $cmr_config["tstm_table_prefix"]="cmr_";

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

$allow_level = "";
$allow_email = "";
$allow_groups = "";
$my_master = "";
$my_slave = "";
$nickname = "";
$role = "";
$sla = "";
$home = "";
$status = "";
$photo = "";
$certificate = "";


if (!isset($language)) {
    $language = "italian";
}
$lang = $language;

$email_sign = "";


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
$php_con_old = $php_con;
// //=======================================
echo "<br />conessione al nuovo database ...<br />";
//
// //======database connection==============
$php_con = mysql_connect($mig_host, $mig_user, $mig_passw) or print(mysql_error());
// echo "<br />database <b>camaroes_db</b>...<br />";
mysql_select_db($mig_db, $php_con);
// //=======================================
if (isset($user_email)) {
    // echo "<br />aggiornamento id email ...<br />";
    $sql_query = "select id from " . $cmr_config["tstm_table_prefix"] . "user where email='$user_email';";
    $query_result = mysql_query($sql_query, $php_con) or die(mysql_error());
    $val_id = mysql_fetch_object($query_result);
    if (isset($val_id->id)) {
        $id_user = $val_id->id;
    }
}

if (isset($group_name)) {
    // echo "<br />aggiornamento id group ...<br />";
    $sql_query = "select id from " . $cmr_config["tstm_table_prefix"] . "groups where name='$group_name';";
    $query_result = mysql_query($sql_query, $php_con) or print(mysql_error());
    $val_id = mysql_fetch_object($query_result);
    if (isset($val_id->id)) {
        $id_group = $val_id->id;
    }
}

@$sql_migrate = $sql_query1 . ";";
@$sql_migrate .= $sql_query2 . ";";
@$sql_migrate .= $sql_query3 . ";";
@$sql_migrate .= $sql_query4 . ";";
@$sql_migrate .= $sql_query5 . ";";
@$sql_migrate .= $sql_query6 . ";";

$sql_query1 = "";
$sql_query2 = "";
$sql_query3 = "";
$sql_query4 = "";
$sql_query5 = "";
$sql_query6 = "";

if (!ereg("^search", $post_var["cmr_module"])) {
    // if(file_exists("new/lib/lib_".$post_var["cmr_module"].".php")){
    // echo "<br />Libreria  new/lib/lib_$post_var["cmr_module"].php ...<br />";
    // include("new/lib/lib_".$post_var["cmr_module"].".php");
    // //echo $sql_query1.'<br />'.$sql_query2.'<br />'.$sql_query3.'<br />'.'<hr />';
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // ##################################################
    // ------------Recupera valori mandati da form e impostazione stringa sql e ($_SESSION['cgi'] e informazione per la mail)---tutto servira a cgi_action .php ----
    switch ($post_var["cmr_module"]) {
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
            $sql_query1 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "user` 
            (
`id` ,`uid` ,`name` ,`last_name` ,`nickname` ,`sexe` ,`role` ,`sla` ,`pw` ,`email` ,`email_sign` ,`tel` ,`cel` ,`home` ,`adress` ,`location` ,`state` ,`type` ,`status` ,`level` ,`lang` ,`style` ,`login_script` ,`certificate` ,`photo` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$uid' ,'$name' ,'$last_name' ,'$nickname' ,'$sexe' ,'$role' ,'$sla' ,'$pw' ,'$email' ,'$email_sign' ,'$tel' ,'$cel' ,'$home' ,'$adress' ,'$location' ,'$state' ,'$type' ,'$status' ,'$level' ,'$lang' ,'$style' ,'$login_script' ,'$certificate' ,'$photo' ,'$my_master' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
    );";            
            // --------------------------------------------------------------
            $sql_query2 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "user_groups 
            ( 
`id` ,`user_email` ,`group_name` ,`type` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$user_email' ,'$group_name' ,'$type' ,'$state' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
    );";
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

            $sql_query1 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "user` SET
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
    `comment` = '$inf1',
    `date_time` = NOW( ) WHERE `email` ='$id' LIMIT 1 ;";
            // --------------------------------------------------------------
            $sql_query2 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "user_groups SET
    `user_email` ='$email',
    `date_time` = NOW( )
    WHERE `user_email` = '$user_email';";
            // --------------------------------------------------------------
            $sql_query3 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "user_groups 
            ( 
`id` ,`user_email` ,`group_name` ,`type` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$user_email' ,'$group_name' ,'$type' ,'$state' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
    );";
            // ----------------impostiamo futuro layout------------
            break;
        // ##################################################
        // ##################################################
        case "change_pw":
            // ===========
            // $new_pw1=pw_encode($new_pw1);//crytage password
            // ===========
            // ===============================
            $sql_query1 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "user` SET
    `pw` = '$new_pw1',
    `date_time` = NOW( ) WHERE `email` ='$id' LIMIT 1 ;";
            // ----------------impostiamo futuro layout------------
            break;
        // ##################################################
        case "remove_user":
            // $user_email=${$VAR}['user_email'];
            $sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user where email='$user_email'  ;";
            $sql_query2 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user_groups where user_email='$user_email'  ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "user_to_group":

            $sql_query1 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "user_groups` 
            ( 
`id` ,`user_email` ,`group_name` ,`type` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$user_email' ,'$group_name' ,'$type' ,'$state' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
    );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "rm_user_to_group":

            $sql_query1 = "DELETE FROM `" . $cmr_config["tstm_table_prefix"] . "user_groups` where user_email='$user_email' and group_name='$group_name' ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################
        case "father_group":

            $sql_query1 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "father_groups` 
            (
`id` ,`group_father` ,`group_child` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$group_father' ,'$group_child' ,'$state' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
            );";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ##################################################//------------------------------------------
        case "rm_father_group":

            $sql_query1 = "DELETE FROM `" . $cmr_config["tstm_table_prefix"] . "father_groups` where group_child='$group_child' and group_father='$group_father' ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ------------------------------------------
        case "new_ticket":
            // $by=$auth_email;
            // ------------------------------------------
            $sql_query1 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "ticket` set `state_now` = 'opened'   where `number` ='$number';";
            // ------------------------------------------
            // Creating the oportunated SQL string for new_Ticket
            $sql_query2 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "ticket`  
            (  
`id` , `number` , `lang` , `title` , `work_by` , `call_log_user` , `call_log_groups` , `call_method` , `state` , `state_now` , `assign_to` , `list_user_impact` , `list_group_impact` , `list_asset_impact` , `severity` , `sla` , `mail_title` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `attach` , `type` , `text` , `mail_text` , `my_master` , `allow_level` , `allow_email` , `allow_groups` , `comment` , `date_time` 
) VALUES (
'' ,'$number' ,'$lang' ,'$title' ,'$work_by' ,'$call_log_user' ,'$call_log_groups' ,'$call_method' ,'$state' ,'$state_now' ,'$assign_to' ,'$list_user_impact' ,'$list_group_impact' ,'$list_asset_impact' ,'$severity' ,'$sla' ,'$mail_title' ,'$mail_from' ,'$mail_to' ,'$mail_cc' ,'$mail_bcc' ,'$attach' ,'$type' ,'$text' ,'$mail_text' ,'$my_master' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' , NOW() 
             );";    
            break;
        // ##################################################//------------------------------------------
        case "update_ticket":
            // $by=$auth_email;
            $sql_query1 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "ticket` SET    `state_now` = 'updated'   WHERE `number` ='$number';";
            // ------------------------------------------
            $state = "update";
            $state_now = "update";
            // Creating the oportunated SQL string for update_Ticket
            $sql_query2 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "ticket`  
            (  
`id` , `number` , `lang` , `title` , `work_by` , `call_log_user` , `call_log_groups` , `call_method` , `state` , `state_now` , `assign_to` , `list_user_impact` , `list_group_impact` , `list_asset_impact` , `severity` , `sla` , `mail_title` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `attach` , `type` , `text` , `mail_text` , `my_master` , `allow_level` , `allow_email` , `allow_groups` , `comment` , `date_time` 
) VALUES (
'' ,'$number' ,'$lang' ,'$title' ,'$work_by' ,'$call_log_user' ,'$call_log_groups' ,'$call_method' ,'$state' ,'$state_now' ,'$assign_to' ,'$list_user_impact' ,'$list_group_impact' ,'$list_asset_impact' ,'$severity' ,'$sla' ,'$mail_title' ,'$mail_from' ,'$mail_to' ,'$mail_cc' ,'$mail_bcc' ,'$attach' ,'$type' ,'$text' ,'$mail_text' ,'$my_master' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' , NOW() 
            );";



            break;
        // ##################################################
        case "close_ticket":
            // $by=$auth_email;
            $sql_query1 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "ticket` SET    `state_now` = 'closed'   WHERE `number` ='$number';";
            // ------------------------------------------
            $state = "close";
            $state_now = "close";
            // Creating the oportunated SQL string for update_Ticket
            $sql_query2 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "ticket`  
            (  
`id` , `number` , `lang` , `title` , `work_by` , `call_log_user` , `call_log_groups` , `call_method` , `state` , `state_now` , `assign_to` , `list_user_impact` , `list_group_impact` , `list_asset_impact` , `severity` , `sla` , `mail_title` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `attach` , `type` , `text` , `mail_text` , `my_master` , `allow_level` , `allow_email` , `allow_groups` , `comment` , `date_time` 
) VALUES (
'' ,'$number' ,'$lang' ,'$title' ,'$work_by' ,'$call_log_user' ,'$call_log_groups' ,'$call_method' ,'$state' ,'$state_now' ,'$assign_to' ,'$list_user_impact' ,'$list_group_impact' ,'$list_asset_impact' ,'$severity' ,'$sla' ,'$mail_title' ,'$mail_from' ,'$mail_to' ,'$mail_cc' ,'$mail_bcc' ,'$attach' ,'$type' ,'$text' ,'$mail_text' ,'$my_master' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' , NOW() 
             );";
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
            $sql_query1 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "groups` 
            (
`id` ,`name` ,`state` ,`level` ,`location` ,`type` ,`sla` ,`public_key` ,`private_key` ,`pass_phrase` ,`email_sign` ,`referent_email` ,`admin_email` ,`home` ,`notify` ,`web_site` ,`login_script` ,`adress` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$name' ,'$state' ,'$level' ,'$location' ,'$type' ,'$sla' ,'$public_key' ,'$private_key' ,'$pass_phrase' ,'$email_sign' ,'$referent_email' ,'$admin_email' ,'$home' ,'$notify' ,'$web_site' ,'$login_script' ,'$adress' ,'$my_master' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
            );";

            $email = $auth_email;
            $sql_query2 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "user_groups` 
            ( 
`id` ,`user_email` ,`group_name` ,`type` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$user_email' ,'$group_name' ,'$type' ,'$state' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
    );";
            // --------------------------------------------------------------
            $sql_query3 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "father_groups` 
            ( 
`id` ,`group_father` ,`group_child` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$group_father' ,'$group_child' ,'$state' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
    );";
            // --------------------------------------------------------------
            break;
        // ##################################################//------------------------------------------
        case "update_group":
            // Creating the oportunated SQL string for update_Group
            $sql_query1 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "groups` set  `name` = '$name', `state` = '$state', `level` = '$level',  `login_script` = '$login_script', `adress` = '$adress', `comment` = '$comment', `date_time` = now() where `id` = '$id';";
            // --------------------------------------------------------------
            $sql_query2 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "user_groups` SET
    `group_name` ='$name',
    `state` = '$state',
    `date_time` = NOW( )
    WHERE `group_name` = '$id';";
            // --------------------------------------------------------------
            $sql_query3 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "father_groups` SET
    `group_father` ='$name',
    `state` = '$state',
    `date_time` = NOW( )
    WHERE `group_father` = '$id';";
            // --------------------------------------------------------------
            $sql_query4 = "UPDATE `" . $cmr_config["tstm_table_prefix"] . "father_groups` SET
    `group_child` ='$name',
    `state` = '$state',
    `date_time` = NOW( )
    WHERE `group_child` = '$id';";
            // --------------------------------------------------------------
            $sql_query5 = "INSERT INTO `" . $cmr_config["tstm_table_prefix"] . "father_groups` 
            ( 
`id` ,`group_father` ,`group_child` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`
) VALUES (
'' ,'$group_father' ,'$group_child' ,'$state' ,'$allow_level' ,'$allow_email' ,'$allow_groups' ,'$comment' ,NOW()
    );";

            break;
        // ##################################################
        case "remove_group":

            $sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "groups where name='$group_name'  ;";
            // ----------------impostiamo futuro layout ---------------------
            break;
        // ------------------------------------------
        case "administrate":// ---------can delete or call another function for work -------
            $sql_query1 = ""; //strtolower()
            if ($on == "sql") {
                // $sql=${$VAR}['sql'];
                $sql = ereg_replace('[\]*["]+', "\"", $sql);
                $sql = ereg_replace("[\]*[']+", "'", $sql);
                $_SESSION["sql"] = "$sql";
                $middle1 = "preview_sql.php";
            } else {
                switch ($action) {
                    case "view":
                        switch ($on) {
                            case "user":
                                switch ($user) {
                                    case "?":$middle1 = "view_all_user.php";
                                        break;
                                    case "All":$middle1 = "view_all_user.php";
                                        break;
                                    default:$middle1 = "preview_user.php";
                                        $_SESSION["id"] = $user;
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$middle1 = "view_all_ticket.php";
                                        break;
                                    case "All":$middle1 = "view_all_ticket.php";
                                        break;
                                    default:$middle1 = "preview_ticket.php";
                                        $_SESSION["id"] = $ticket;
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$middle1 = "view_all_client.php";
                                        break;
                                    case "All":$middle1 = "view_all_client.php";
                                        break;
                                    default:$middle1 = "preview_client.php";
                                        $_SESSION["id"] = $client;
                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$middle1 = "view_all_group.php";
                                        break;
                                    case "All":$middle1 = "view_all_group.php";
                                        break;
                                    default:$middle1 = "preview_group.php";
                                        $_SESSION["id"] = $group;
                                        break;
                                }
                                break;
                            case "user_group":
                                switch ($user_group) {
                                    case "?":$_SESSION["sql"] = "select * FROM " . $cmr_config["tstm_table_prefix"] . "user_groups order by group_name";
                                        $middle1 = "view_all_user_groups.php";
                                        break;
                                    case "All":$_SESSION["sql"] = "select * FROM " . $cmr_config["tstm_table_prefix"] . "user_groups order by group_name";
                                        $middle1 = "view_all_user_groups.php";
                                        break;
                                    default:$_SESSION["sql"] = "select * FROM " . $cmr_config["tstm_table_prefix"] . "user_groups where id='$user_groups";
                                        $middle1 = "view_all_user_groups.php";
                                        break;
                                }
                                break;
                            case "father_group":
                                switch ($father_group) {
                                    case "?":$_SESSION["sql"] = "select * FROM " . $cmr_config["tstm_table_prefix"] . "father_groups order by group_child";
                                        $middle1 = "view_all_father_groups.php";
                                        break;
                                    case "All":$_SESSION["sql"] = "select * FROM " . $cmr_config["tstm_table_prefix"] . "father_groups order by group_child";
                                        $middle1 = "view_all_father_groups.php";
                                        break;
                                    default:$_SESSION["sql"] = "select * FROM " . $cmr_config["tstm_table_prefix"] . "father_groups where id='$father_groups";
                                        $middle1 = "view_all_father_groups.php";
                                        break;
                                }
                                break;
                            case "problem":$middle1 = "view_all_problem.php";
                                break;
                            case "solution":$middle1 = "view_all_solution.php";
                                break;
                            case "resolv":$middle1 = "view_all_resolv.php";
                                break;
                            case "host":$middle1 = "view_all_asset.php";
                                break;
                            case "services":$middle1 = "view_all_services.php";
                                break;
                            case "host_user":$middle1 = "view_all_asset_user.php";
                                break;
                            case "host_group":$middle1 = "view_all_asset_group.php";
                                break;
                            case "host_services":$middle1 = "view_all_module.php";
                                break;
                            case "host_tree":$middle1 = "view_all_asset_tree.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$middle1 = "view_all_module.php";
                                        break;
                                    case "All":$middle1 = "view_all_module.php";
                                        break;
                                    default:$middle1 = $module;
                                        $middle2 = "administrate.php";
                                        break;
                                }
                                break;

                            case "message":
                                switch ($user) {
                                    case "?":$middle1 = "view_message.php";
                                        break;
                                    case "All":$middle1 = "view_message.php";
                                        break;
                                    default:$middle1 = "view_message.php";
                                        $_SESSION["id"] = $user;
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "new":
                        switch ($on) {
                            case "user":$middle1 = "new_user.php";
                                break;
                            case "ticket":$middle1 = "tickets.php";
                                break;
                            case "client":
                                $middle1 = "new_client.php";
                                $refresh = 3600;
                                $layer = 1;
                                $middle2 = "";
                                $middle3 = "";
                                break;
                            case "group":$middle1 = "new_group.php";
                                break;
                            case "user_group":$middle1 = "user_to_group.php";
                                break;
                            case "father_group":
                                $middle1 = "father_groups.php";
                                break;
                            case "message":$middle1 = "new_message.php";
                                break;
                            case "problem":$middle1 = "view_all_problem.php";
                                break;
                            case "solution":$middle1 = "view_all_solution.php";
                                break;
                            case "resolv":$middle1 = "view_all_resolv.php";
                                break;
                            case "host":$middle1 = "view_all_asset.php";
                                break;
                            case "services":$middle1 = "view_all_services.php";
                                break;
                            case "host_user":$middle1 = "view_all_asset_user.php";
                                break;
                            case "host_group":$middle1 = "view_all_asset_group.php";
                                break;
                            case "host_services":$middle1 = "view_all_module.php";
                                break;
                            case "host_tree":$middle1 = "view_all_asset_tree.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$middle1 = "view_all_module.php";
                                        break;
                                    case "All":$middle1 = "view_all_module.php";
                                        break;
                                    default:$middle1 = $module;
                                        $middle2 = "administrate.php";
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
                                    case "?":$middle1 = "view_all_user.php";
                                        break;
                                    case "All":$middle1 = "view_all_user.php";
                                        break;
                                    default:$middle1 = "update_user.php";
                                        $_SESSION["id"] = $user;
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$middle1 = "view_all_ticket.php";
                                        break;
                                    case "All":$middle1 = "view_all_ticket.php";
                                        break;
                                    default:$middle1 = "update_ticket.php";
                                        $_SESSION["id"] = $ticket;
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$middle1 = "view_all_client.php";
                                        break;
                                    case "All":$middle1 = "view_all_client.php";
                                        break;
                                    default:$middle1 = "update_client.php";
                                        $refresh = 3600;
                                        $layer = 1;
                                        $_SESSION["id"] = $client;
                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$middle1 = "view_all_group.php";
                                        break;
                                    case "All":$middle1 = "view_all_group.php";
                                        break;
                                    default:$middle1 = "update_group.php";
                                        $_SESSION["id"] = $group;
                                        break;
                                }
                                break;
                            case "user_group":
                                switch ($user_group) {
                                    case "?":$middle1 = "user_to_group.php";
                                        break;
                                    case "All":$middle1 = "user_to_group.php";
                                        break;
                                    default:$middle1 = "user_to_group.php";
                                        break;
                                }
                                break;
                            case "father_group":
                                switch ($father_group) {
                                    case "?":$middle1 = "father_groups.php";
                                        break;
                                    case "All":$middle1 = "father_groups.php";
                                        break;
                                    default:$middle1 = "father_groups.php";
                                        break;
                                }
                                break;
                            case "message":
                                switch ($father_group) {
                                    case "?":$middle1 = "new_message.php";
                                        break;
                                    case "All":$middle1 = "new_message.php";
                                        break;
                                    default:$middle1 = "new_message.php";
                                        break;
                                }
                                break;
                            case "problem":$middle1 = "view_all_problem.php";
                                break;
                            case "solution":$middle1 = "view_all_solution.php";
                                break;
                            case "resolv":$middle1 = "view_all_resolv.php";
                                break;
                            case "host":$middle1 = "view_all_asset.php";
                                break;
                            case "services":$middle1 = "view_all_services.php";
                                break;
                            case "host_user":$middle1 = "view_all_asset_user.php";
                                break;
                            case "host_group":$middle1 = "view_all_asset_group.php";
                                break;
                            case "host_services":$middle1 = "view_all_module.php";
                                break;
                            case "host_tree":$middle1 = "view_all_asset_tree.php";
                                break;
                            case "module":
                                switch ($module) {
                                    case "?":$middle1 = "view_all_module.php";
                                        break;
                                    case "All":$middle1 = "view_all_module.php";
                                        break;
                                    default:$middle1 = $module;
                                        $middle2 = "administrate.php";
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
                                    case "?":$middle1 = "view_all_user.php";
                                        break;
                                    case "All":
                                        // $sql_query1="DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user where 1;";
                                        break;
                                    default:
                                        $sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user where email='$user';";
                                        $sql_query2 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user_groups where user_email='$user';";
                                        break;
                                }
                                break;
                            case "ticket":
                                switch ($ticket) {
                                    case "?":$middle1 = "view_all_ticket.php";
                                        break;
                                    case "All":
                                        // $sql_query1="DELETE FROM " . $cmr_config["tstm_table_prefix"] . "ticket  where 1;";
                                        break;
                                    default:$sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "ticket where id='$ticket';";
                                        break;
                                }
                                break;
                            case "client":
                                switch ($client) {
                                    case "?":$middle1 = "view_all_client.php";
                                        break;
                                    case "All":

                                        $sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "client  where 1;";
                                        break;
                                    default:
                                        $sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "client where name='$client';";
                                        $sql_query2 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "groups where name='$client';";
                                        $sql_query3 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user_groups where group_name='$client';";
                                        $sql_query4 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "father_groups where group_father='$client' or group_child='$client';";

                                        break;
                                }
                                break;
                            case "group":
                                switch ($group) {
                                    case "?":$middle1 = "view_all_group.php";
                                        break;
                                    case "All":
                                        // $sql_query1="DELETE FROM " . $cmr_config["tstm_table_prefix"] . "groups  where 1;";
                                        break;
                                    default:
                                        $sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "groups where name='$group';";
                                        $sql_query2 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user_groups where group_name='$group';";
                                        $sql_query3 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "father_groups where group_father='$group' or group_child='$group';";
                                        break;
                                }
                                break;
                            case "user_group":
                                switch ($user_group) {
                                    case "?":$middle1 = "rm_user_to_group.php";
                                        break;
                                    case "All":
                                        // $sql_query1="DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user_groups where 1;";
                                        break;
                                    default:$sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "user_groups where id='$user_groups;";
                                        break;
                                }
                                break;
                            case "father_group":
                                switch ($father_group) {
                                    case "?":$middle1 = "rm_father_groups.php";
                                        break;
                                    case "All":
                                        // $sql_query1="DELETE FROM " . $cmr_config["tstm_table_prefix"] . "father_groups where 1;";
                                        break;
                                    default:$sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "father_groups where id='$father_groups;";
                                        break;
                                }
                                break;
                            case "message":
                                switch ($father_group) {
                                    case "?":break;
                                    case "All":

                                        $sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "message where 1;";
                                        break;;
                                    default:$sql_query1 = "DELETE FROM " . $cmr_config["tstm_table_prefix"] . "message where id='$message';";
                                        break;
                                }
                                break;
                            case "problem":$middle1 = "view_all_problem.php";
                                break;
                            case "solution":$middle1 = "view_all_solution.php";
                                break;
                            case "resolv":$middle1 = "view_all_resolv.php";
                                break;
                            case "host":$middle1 = "view_all_asset.php";
                                break;
                            case "services":$middle1 = "view_all_services.php";
                                break;
                            case "host_user":$middle1 = "view_all_asset_user.php";
                                break;
                            case "host_group":$middle1 = "view_all_asset_group.php";
                                break;
                            case "host_services":$middle1 = "view_all_module.php";
                                break;
                            case "host_tree":$middle1 = "view_all_asset_tree.php";
                                break;
                            case "module":

                                switch ($module) {
                                    case "?":$middle1 = "view_all_module.php";
                                        break;
                                    case "All":$middle1 = "view_all_module.php";
                                        break;
                                    default:
                                        unlink("modules/" . $module);
                                        $middle2 = "administrate.php";

                                        $_SESSION["id"] = "<br /><u>Modulo " . $module . " Cancellato con sucesso</u> <br />";

                                        echo "cgi=" . $_SESSION['cgi'];
                                        $recipient = "" . $_SESSION['cmr_admin_name'] . " <" . $_SESSION['cmr_admin_email2'] . ">\r\n";
                                        $subject = "TSTM: !!! Modullo cancellato";
                                        $message = "Modulo $module cancellato ??!!!  da : " . $auth_email . "\n\n\n";
                                        $message .= "Questa azione  e rischiosa, \nun  modulo cancellato potrebbe fermare l'applicazione \n";
                                        $message .= "\nGrazie \n";
                                        $message .= "--\r\n"; // dlimiteur de signature
                                        /* intestazioni addizionali */
                                        // $hearders_priority=3;
                                        // $headers_to = "".$_SESSION['cmr_admin_name']." <".$_SESSION['cmr_admin_email2'].">\r\n";
                                        // $headers_from = "".$_SESSION['cmr_admin_name']." <".$_SESSION['cmr_admin_email2'].">\r\n";
                                        // $headers_cc = "".$_SESSION['cmr_admin3']." <".$_SESSION['cmr_admin_email3'].">\r\n";
                                        // $headers_bcc = "".$_SESSION['admin4']." <".$_SESSION['cmr_admin_email4'].">\r\n";
                                        break;
                                }
                                break;
                            default:break;
                        }
                        break;
                    case "search":
                        switch ($on) {
                            case "user":$middle1 = "view_all_user.php";
                                break;
                            case "ticket":$middle1 = "search_ticket.php";
                                break;
                            case "client":$middle1 = "view_all_client.php";
                                break;
                            case "group":$middle1 = "view_all_group.php";
                                break;
                            case "user_group":$middle1 = "view_all_user.php";
                                break;
                            case "father_group":$middle1 = "view_all_father_groups.php";
                                break;
                            case "message":$middle1 = "view_message.php";
                                break;
                            case "problem":$middle1 = "view_all_problem.php";
                                break;
                            case "solution":$middle1 = "view_all_solution.php";
                                break;
                            case "resolv":$middle1 = "view_all_resolv.php";
                                break;
                            case "host":$middle1 = "view_all_asset.php";
                                break;
                            case "services":$middle1 = "view_all_services.php";
                                break;
                            case "host_user":$middle1 = "view_all_asset_user.php";
                                break;
                            case "host_group":$middle1 = "view_all_asset_group.php";
                                break;
                            case "host_services":$middle1 = "view_all_module.php";
                                break;
                            case "host_tree":$middle1 = "view_all_asset_tree.php";
                                break;
                            case "module":$middle1 = "view_all_module.php";
                                break;
                            default:$middle1 = "search_ticket.php";
                                break;
                        }
                        break;
                    case "report":
                        switch ($on) {
                            case "user":$middle1 = "view_all_user.php";
                                break;
                            case "ticket":$middle1 = "search_ticket.php";
                                break;
                            case "client":$middle1 = "view_all_client.php";
                                break;
                            case "group":$middle1 = "view_all_group.php";
                                break;
                            case "user_group":$middle1 = "view_all_user.php";
                                break;
                            case "father_group":$middle1 = "view_all_father_groups.php";
                                break;
                            case "message":$middle1 = "view_message.php";
                                break;
                            case "problem":$middle1 = "view_all_problem.php";
                                break;
                            case "solution":$middle1 = "view_all_solution.php";
                                break;
                            case "resolv":$middle1 = "view_all_resolv.php";
                                break;
                            case "host":$middle1 = "view_all_asset.php";
                                break;
                            case "services":$middle1 = "view_all_services.php";
                                break;
                            case "host_user":$middle1 = "view_all_asset_user.php";
                                break;
                            case "host_group":$middle1 = "view_all_asset_group.php";
                                break;
                            case "host_services":$middle1 = "view_all_module.php";
                                break;
                            case "host_tree":$middle1 = "view_all_asset_tree.php";
                                break;
                            case "module":$middle1 = "view_all_module.php";
                                break;
                            default:$middle1 = "search_ticket.php";
                                break;
                        }
                        break;
                    case "config":
                        switch ($on) {
                            case "user":$middle1 = "view_all_user.php";
                                break;
                            case "ticket":$middle1 = "search_ticket.php";
                                break;
                            case "client":$middle1 = "view_all_client.php";
                                break;
                            case "group":$middle1 = "view_all_group.php";
                                break;
                            case "user_group":$middle1 = "view_all_user.php";
                                break;
                            case "father_group":$middle1 = "view_all_father_groups.php";
                                break;
                            case "message":$middle1 = "view_message.php";
                                break;
                            case "problem":$middle1 = "view_all_problem.php";
                                break;
                            case "solution":$middle1 = "view_all_solution.php";
                                break;
                            case "resolv":$middle1 = "view_all_resolv.php";
                                break;
                            case "host":$middle1 = "view_all_asset.php";
                                break;
                            case "services":$middle1 = "view_all_services.php";
                                break;
                            case "host_user":$middle1 = "view_all_asset_user.php";
                                break;
                            case "host_group":$middle1 = "view_all_asset_group.php";
                                break;
                            case "host_services":$middle1 = "view_all_module.php";
                                break;
                            case "host_tree":$middle1 = "view_all_asset_tree.php";
                                break;
                            case "module":$middle1 = "view_all_module.php";
                                break;
                            default:$middle1 = "search_ticket.php";
                                break;
                        }
                        break;
                    default:break;
                }
            }
            // ----------------impostiamo futuro layout ---------------------
            // --------------------------------------------------------------
            if ($sql_query1 != "") {
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
    echo "<br />esecuzione query ...<br />";
    echo "<br /><b>query: </b>" . substr($sql_query1, 0, 50) . ";  Etc ....<br />";
    $sql_result1 = mysql_query($sql_query1, $php_con) or die(mysql_error());

    if (isset($sql_query2) && ($sql_query2)) {
        $sql_result2 = mysql_query($sql_query2, $php_con) ;
    }
    if (isset($sql_query3) && ($sql_query3)) {
        $sql_result3 = mysql_query($sql_query3, $php_con) ;
    }
    if (isset($sql_query4) && ($sql_query4)) {
        $sql_result4 = mysql_query($sql_query4, $php_con) ;
    }
    if (isset($sql_query5) && ($sql_query5)) {
        $sql_result5 = mysql_query($sql_query5, $php_con) ;
    }
    if (isset($sql_query6) && ($sql_query6)) {
        $sql_result6 = mysql_query($sql_query6, $php_con) ;
    }
}

echo "<br /><b><u>fine sincronizazzione.</b></u><hr />";

$sql_query1 = $sql_migrate;
// $php_con=$php_con_old;
mysql_select_db($php_database, $php_con);

?>