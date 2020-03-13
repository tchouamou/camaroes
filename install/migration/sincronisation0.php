<?php
defined("cmr_online") or die("Application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * sincronisation0.php
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

sincronisation0.php,  2007-Feb-Tue 0:12:13
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
// ==========configuration============
$syn1["cmr_application"] = "Camaroes Version 2.0";            $syn2["cmr_application"] = "Camaroes Version 2.0";                 
$syn1["cmr_db_user"] = "soc";                                 $syn2["cmr_db_user"] = "soc";                    
$syn1["cmr_db_passw"] = chr(ord('$')) . '0c_b3N';             $syn2["cmr_db_passw"] = chr(ord('$')) . '0c_b3N';
$syn1["cmr_db_host"] = "localhost";                           $syn2["cmr_db_host"] = "localhost";              
$syn1["cmr_db_port"] = "";                                    $syn2["cmr_db_port"] = "";              
$syn1["cmr_db_socket"] = "";                                  $syn2["cmr_db_socket"] = "";              
$syn1["cmr_db_name"] = "camaroes_db";                         $syn2["cmr_db_name"] = "camaroes_db";              
// ==========configuration============

$syn1["cmr_table"][]="cmr_account";      $syn2["cmr_table"][]="cmr_account";
$syn1["cmr_account"][]="id";      $syn2["cmr_account"][]="id";
$syn1["cmr_account"][]="url";      $syn2["cmr_account"][]="url";
$syn1["cmr_account"][]="user_email";      $syn2["cmr_account"][]="user_email";
$syn1["cmr_account"][]="uid";      $syn2["cmr_account"][]="uid";
$syn1["cmr_account"][]="pw";      $syn2["cmr_account"][]="pw";
$syn1["cmr_account"][]="server";      $syn2["cmr_account"][]="server";
$syn1["cmr_account"][]="service";      $syn2["cmr_account"][]="service";
$syn1["cmr_account"][]="port";      $syn2["cmr_account"][]="port";
$syn1["cmr_account"][]="protocol";      $syn2["cmr_account"][]="protocol";
$syn1["cmr_account"][]="allow_level";      $syn2["cmr_account"][]="allow_level";
$syn1["cmr_account"][]="allow_email";      $syn2["cmr_account"][]="allow_email";
$syn1["cmr_account"][]="allow_groups";      $syn2["cmr_account"][]="allow_groups";
$syn1["cmr_account"][]="comment";      $syn2["cmr_account"][]="comment";
$syn1["cmr_account"][]="date_time";      $syn2["cmr_account"][]="date_time";



$syn1["cmr_table"][]="cmr_asset";      $syn2["cmr_table"][]="cmr_asset";
$syn1["cmr_asset"][]="id";      $syn2["cmr_asset"][]="id";
$syn1["cmr_asset"][]="serial";      $syn2["cmr_asset"][]="serial";
$syn1["cmr_asset"][]="mac_adress";      $syn2["cmr_asset"][]="mac_adress";
$syn1["cmr_asset"][]="name";      $syn2["cmr_asset"][]="name";
$syn1["cmr_asset"][]="location";      $syn2["cmr_asset"][]="location";
$syn1["cmr_asset"][]="ip";      $syn2["cmr_asset"][]="ip";
$syn1["cmr_asset"][]="nat_ip";      $syn2["cmr_asset"][]="nat_ip";
$syn1["cmr_asset"][]="mask";      $syn2["cmr_asset"][]="mask";
$syn1["cmr_asset"][]="gateway";      $syn2["cmr_asset"][]="gateway";
$syn1["cmr_asset"][]="dns1";      $syn2["cmr_asset"][]="dns1";
$syn1["cmr_asset"][]="dns2";      $syn2["cmr_asset"][]="dns2";
$syn1["cmr_asset"][]="type";      $syn2["cmr_asset"][]="type";
$syn1["cmr_asset"][]="os";      $syn2["cmr_asset"][]="os";
$syn1["cmr_asset"][]="state";      $syn2["cmr_asset"][]="state";
$syn1["cmr_asset"][]="login_id";      $syn2["cmr_asset"][]="login_id";
$syn1["cmr_asset"][]="login_pw";      $syn2["cmr_asset"][]="login_pw";
$syn1["cmr_asset"][]="check_command";      $syn2["cmr_asset"][]="check_command";
$syn1["cmr_asset"][]="certificate";      $syn2["cmr_asset"][]="certificate";
$syn1["cmr_asset"][]="my_master";      $syn2["cmr_asset"][]="my_master";
$syn1["cmr_asset"][]="allow_level";      $syn2["cmr_asset"][]="allow_level";
$syn1["cmr_asset"][]="allow_email";      $syn2["cmr_asset"][]="allow_email";
$syn1["cmr_asset"][]="allow_groups";      $syn2["cmr_asset"][]="allow_groups";
$syn1["cmr_asset"][]="my_software";      $syn2["cmr_asset"][]="my_software";
$syn1["cmr_asset"][]="my_service";      $syn2["cmr_asset"][]="my_service";
$syn1["cmr_asset"][]="comment";      $syn2["cmr_asset"][]="comment";
$syn1["cmr_asset"][]="date_time";      $syn2["cmr_asset"][]="date_time";




$syn1["cmr_table"][]="cmr_certificate";      $syn2["cmr_table"][]="cmr_certificate";
$syn1["cmr_certificate"][]="id";      $syn2["cmr_certificate"][]="id";
$syn1["cmr_certificate"][]="serial";      $syn2["cmr_certificate"][]="serial";
$syn1["cmr_certificate"][]="user_email";      $syn2["cmr_certificate"][]="user_email";
$syn1["cmr_certificate"][]="version";      $syn2["cmr_certificate"][]="version";
$syn1["cmr_certificate"][]="to_cn";      $syn2["cmr_certificate"][]="to_cn";
$syn1["cmr_certificate"][]="to_o";      $syn2["cmr_certificate"][]="to_o";
$syn1["cmr_certificate"][]="to_ou";      $syn2["cmr_certificate"][]="to_ou";
$syn1["cmr_certificate"][]="from_cn";      $syn2["cmr_certificate"][]="from_cn";
$syn1["cmr_certificate"][]="from_o";      $syn2["cmr_certificate"][]="from_o";
$syn1["cmr_certificate"][]="from_ou";      $syn2["cmr_certificate"][]="from_ou";
$syn1["cmr_certificate"][]="valid_from";      $syn2["cmr_certificate"][]="valid_from";
$syn1["cmr_certificate"][]="valid_to";      $syn2["cmr_certificate"][]="valid_to";
$syn1["cmr_certificate"][]="state";      $syn2["cmr_certificate"][]="state";
$syn1["cmr_certificate"][]="cert_pkcs";      $syn2["cmr_certificate"][]="cert_pkcs";
$syn1["cmr_certificate"][]="pub_key_pkcs";      $syn2["cmr_certificate"][]="pub_key_pkcs";
$syn1["cmr_certificate"][]="status";      $syn2["cmr_certificate"][]="status";
$syn1["cmr_certificate"][]="type";      $syn2["cmr_certificate"][]="type";
$syn1["cmr_certificate"][]="login_script";      $syn2["cmr_certificate"][]="login_script";
$syn1["cmr_certificate"][]="public_key";      $syn2["cmr_certificate"][]="public_key";
$syn1["cmr_certificate"][]="private_key";      $syn2["cmr_certificate"][]="private_key";
$syn1["cmr_certificate"][]="pass_phrase";      $syn2["cmr_certificate"][]="pass_phrase";
$syn1["cmr_certificate"][]="my_master";      $syn2["cmr_certificate"][]="my_master";
$syn1["cmr_certificate"][]="my_slave";      $syn2["cmr_certificate"][]="my_slave";
$syn1["cmr_certificate"][]="allow_level";      $syn2["cmr_certificate"][]="allow_level";
$syn1["cmr_certificate"][]="allow_email";      $syn2["cmr_certificate"][]="allow_email";
$syn1["cmr_certificate"][]="allow_groups";      $syn2["cmr_certificate"][]="allow_groups";
$syn1["cmr_certificate"][]="comment";      $syn2["cmr_certificate"][]="comment";
$syn1["cmr_certificate"][]="date_time";      $syn2["cmr_certificate"][]="date_time";




$syn1["cmr_table"][]="cmr_code";      $syn2["cmr_table"][]="cmr_code";
$syn1["cmr_code"][]="id";      $syn2["cmr_code"][]="id";
$syn1["cmr_code"][]="code";      $syn2["cmr_code"][]="code";
$syn1["cmr_code"][]="script";      $syn2["cmr_code"][]="script";
$syn1["cmr_code"][]="state";      $syn2["cmr_code"][]="state";
$syn1["cmr_code"][]="allow_level";      $syn2["cmr_code"][]="allow_level";
$syn1["cmr_code"][]="allow_email";      $syn2["cmr_code"][]="allow_email";
$syn1["cmr_code"][]="allow_groups";      $syn2["cmr_code"][]="allow_groups";
$syn1["cmr_code"][]="comment";      $syn2["cmr_code"][]="comment";
$syn1["cmr_code"][]="date_time";      $syn2["cmr_code"][]="date_time";





$syn1["cmr_table"][]="cmr_command";      $syn2["cmr_table"][]="cmr_command";
$syn1["cmr_command"][]="id";      $syn2["cmr_command"][]="id";
$syn1["cmr_command"][]="command_name";      $syn2["cmr_command"][]="command_name";
$syn1["cmr_command"][]="command_line";      $syn2["cmr_command"][]="command_line";
$syn1["cmr_command"][]="state";      $syn2["cmr_command"][]="state";
$syn1["cmr_command"][]="allow_level";      $syn2["cmr_command"][]="allow_level";
$syn1["cmr_command"][]="allow_email";      $syn2["cmr_command"][]="allow_email";
$syn1["cmr_command"][]="allow_groups";      $syn2["cmr_command"][]="allow_groups";
$syn1["cmr_command"][]="comment";      $syn2["cmr_command"][]="comment";
$syn1["cmr_command"][]="date_time";      $syn2["cmr_command"][]="date_time";






$syn1["cmr_table"][]="cmr_contact";      $syn2["cmr_table"][]="cmr_contact";
$syn1["cmr_contact"][]="id";      $syn2["cmr_contact"][]="id";
$syn1["cmr_contact"][]="uid";      $syn2["cmr_contact"][]="uid";
$syn1["cmr_contact"][]="name";      $syn2["cmr_contact"][]="name";
$syn1["cmr_contact"][]="last_name";      $syn2["cmr_contact"][]="last_name";
$syn1["cmr_contact"][]="sexe";      $syn2["cmr_contact"][]="sexe";
$syn1["cmr_contact"][]="function";      $syn2["cmr_contact"][]="function";
$syn1["cmr_contact"][]="email";      $syn2["cmr_contact"][]="email";
$syn1["cmr_contact"][]="email_sign";      $syn2["cmr_contact"][]="email_sign";
$syn1["cmr_contact"][]="tel";      $syn2["cmr_contact"][]="tel";
$syn1["cmr_contact"][]="cel";      $syn2["cmr_contact"][]="cel";
$syn1["cmr_contact"][]="adress";      $syn2["cmr_contact"][]="adress";
$syn1["cmr_contact"][]="location";      $syn2["cmr_contact"][]="location";
$syn1["cmr_contact"][]="country";      $syn2["cmr_contact"][]="country";
$syn1["cmr_contact"][]="type";      $syn2["cmr_contact"][]="type";
$syn1["cmr_contact"][]="state";      $syn2["cmr_contact"][]="state";
$syn1["cmr_contact"][]="status";      $syn2["cmr_contact"][]="status";
$syn1["cmr_contact"][]="lang";      $syn2["cmr_contact"][]="lang";
$syn1["cmr_contact"][]="style";      $syn2["cmr_contact"][]="style";
$syn1["cmr_contact"][]="public_key";      $syn2["cmr_contact"][]="public_key";
$syn1["cmr_contact"][]="my_master";      $syn2["cmr_contact"][]="my_master";
$syn1["cmr_contact"][]="my_slave";      $syn2["cmr_contact"][]="my_slave";
$syn1["cmr_contact"][]="allow_level";      $syn2["cmr_contact"][]="allow_level";
$syn1["cmr_contact"][]="allow_email";      $syn2["cmr_contact"][]="allow_email";
$syn1["cmr_contact"][]="allow_groups";      $syn2["cmr_contact"][]="allow_groups";
$syn1["cmr_contact"][]="comment";      $syn2["cmr_contact"][]="comment";
$syn1["cmr_contact"][]="date_time";      $syn2["cmr_contact"][]="date_time";





$syn1["cmr_table"][]="cmr_cron";      $syn2["cmr_table"][]="cmr_cron";
$syn1["cmr_cron"][]="id";      $syn2["cmr_cron"][]="id";
$syn1["cmr_cron"][]="name";      $syn2["cmr_cron"][]="name";
$syn1["cmr_cron"][]="command";      $syn2["cmr_cron"][]="command";
$syn1["cmr_cron"][]="at";      $syn2["cmr_cron"][]="at";
$syn1["cmr_cron"][]="type";      $syn2["cmr_cron"][]="type";
$syn1["cmr_cron"][]="state";      $syn2["cmr_cron"][]="state";
$syn1["cmr_cron"][]="allow_level";      $syn2["cmr_cron"][]="allow_level";
$syn1["cmr_cron"][]="allow_email";      $syn2["cmr_cron"][]="allow_email";
$syn1["cmr_cron"][]="allow_groups";      $syn2["cmr_cron"][]="allow_groups";
$syn1["cmr_cron"][]="comment";      $syn2["cmr_cron"][]="comment";
$syn1["cmr_cron"][]="date_time";      $syn2["cmr_cron"][]="date_time";





$syn1["cmr_table"][]="cmr_download";      $syn2["cmr_table"][]="cmr_download";
$syn1["cmr_download"][]="id";      $syn2["cmr_download"][]="id";
$syn1["cmr_download"][]="url";      $syn2["cmr_download"][]="url";
$syn1["cmr_download"][]="path";      $syn2["cmr_download"][]="path";
$syn1["cmr_download"][]="file_name";      $syn2["cmr_download"][]="file_name";
$syn1["cmr_download"][]="file_type";      $syn2["cmr_download"][]="file_type";
$syn1["cmr_download"][]="file_size";      $syn2["cmr_download"][]="file_size";
$syn1["cmr_download"][]="state";      $syn2["cmr_download"][]="state";
$syn1["cmr_download"][]="allow_level";      $syn2["cmr_download"][]="allow_level";
$syn1["cmr_download"][]="allow_email";      $syn2["cmr_download"][]="allow_email";
$syn1["cmr_download"][]="allow_groups";      $syn2["cmr_download"][]="allow_groups";
$syn1["cmr_download"][]="comment";      $syn2["cmr_download"][]="comment";
$syn1["cmr_download"][]="date_time";      $syn2["cmr_download"][]="date_time";




$syn1["cmr_table"][]="cmr_email";      $syn2["cmr_table"][]="cmr_email";
$syn1["cmr_email"][]="id";      $syn2["cmr_email"][]="id";
$syn1["cmr_email"][]="encoding";      $syn2["cmr_email"][]="encoding";
$syn1["cmr_email"][]="lang";      $syn2["cmr_email"][]="lang";
$syn1["cmr_email"][]="header";      $syn2["cmr_email"][]="header";
$syn1["cmr_email"][]="title";      $syn2["cmr_email"][]="title";
$syn1["cmr_email"][]="mail_title";      $syn2["cmr_email"][]="mail_title";
$syn1["cmr_email"][]="mail_from";      $syn2["cmr_email"][]="mail_from";
$syn1["cmr_email"][]="mail_to";      $syn2["cmr_email"][]="mail_to";
$syn1["cmr_email"][]="mail_cc";      $syn2["cmr_email"][]="mail_cc";
$syn1["cmr_email"][]="mail_bcc";      $syn2["cmr_email"][]="mail_bcc";
$syn1["cmr_email"][]="attach";      $syn2["cmr_email"][]="attach";
$syn1["cmr_email"][]="text";      $syn2["cmr_email"][]="text";
$syn1["cmr_email"][]="my_master";      $syn2["cmr_email"][]="my_master";
$syn1["cmr_email"][]="my_slave";      $syn2["cmr_email"][]="my_slave";
$syn1["cmr_email"][]="allow_level";      $syn2["cmr_email"][]="allow_level";
$syn1["cmr_email"][]="allow_email";      $syn2["cmr_email"][]="allow_email";
$syn1["cmr_email"][]="allow_groups";      $syn2["cmr_email"][]="allow_groups";
$syn1["cmr_email"][]="comment";      $syn2["cmr_email"][]="comment";
$syn1["cmr_email"][]="date_time";      $syn2["cmr_email"][]="date_time";





$syn1["cmr_table"][]="cmr_escalation";      $syn2["cmr_table"][]="cmr_escalation";
$syn1["cmr_escalation"][]="id";      $syn2["cmr_escalation"][]="id";
$syn1["cmr_escalation"][]="ticket_number";      $syn2["cmr_escalation"][]="ticket_number";
$syn1["cmr_escalation"][]="action";      $syn2["cmr_escalation"][]="action";
$syn1["cmr_escalation"][]="id_ticket";      $syn2["cmr_escalation"][]="id_ticket";
$syn1["cmr_escalation"][]="allow_level";      $syn2["cmr_escalation"][]="allow_level";
$syn1["cmr_escalation"][]="allow_email";      $syn2["cmr_escalation"][]="allow_email";
$syn1["cmr_escalation"][]="allow_groups";      $syn2["cmr_escalation"][]="allow_groups";
$syn1["cmr_escalation"][]="comment";      $syn2["cmr_escalation"][]="comment";
$syn1["cmr_escalation"][]="date_time";      $syn2["cmr_escalation"][]="date_time";





$syn1["cmr_table"][]="cmr_faq";      $syn2["cmr_table"][]="cmr_faq";
$syn1["cmr_faq"][]="id";      $syn2["cmr_faq"][]="id";
$syn1["cmr_faq"][]="name";      $syn2["cmr_faq"][]="name";
$syn1["cmr_faq"][]="argoment";      $syn2["cmr_faq"][]="argoment";
$syn1["cmr_faq"][]="question";      $syn2["cmr_faq"][]="question";
$syn1["cmr_faq"][]="response";      $syn2["cmr_faq"][]="response";
$syn1["cmr_faq"][]="state";      $syn2["cmr_faq"][]="state";
$syn1["cmr_faq"][]="allow_level";      $syn2["cmr_faq"][]="allow_level";
$syn1["cmr_faq"][]="allow_email";      $syn2["cmr_faq"][]="allow_email";
$syn1["cmr_faq"][]="allow_groups";      $syn2["cmr_faq"][]="allow_groups";
$syn1["cmr_faq"][]="comment";      $syn2["cmr_faq"][]="comment";
$syn1["cmr_faq"][]="date_time";      $syn2["cmr_faq"][]="date_time";





$syn1["cmr_table"][]="cmr_father_groups";      $syn2["cmr_table"][]="cmr_father_groups";
$syn1["cmr_father_groups"][]="id";      $syn2["cmr_father_groups"][]="id";
$syn1["cmr_father_groups"][]="group_father";      $syn2["cmr_father_groups"][]="group_father";
$syn1["cmr_father_groups"][]="group_child";      $syn2["cmr_father_groups"][]="group_child";
$syn1["cmr_father_groups"][]="state";      $syn2["cmr_father_groups"][]="state";
$syn1["cmr_father_groups"][]="date_time";      $syn2["cmr_father_groups"][]="date_time";
$syn1["cmr_father_groups"][]="allow_level";      $syn2["cmr_father_groups"][]="allow_level";
$syn1["cmr_father_groups"][]="allow_email";      $syn2["cmr_father_groups"][]="allow_email";
$syn1["cmr_father_groups"][]="allow_groups";      $syn2["cmr_father_groups"][]="allow_groups";
$syn1["cmr_father_groups"][]="comment";      $syn2["cmr_father_groups"][]="comment";





$syn1["cmr_table"][]="cmr_forum";      $syn2["cmr_table"][]="cmr_forum";
$syn1["cmr_forum"][]="id";      $syn2["cmr_forum"][]="id";
$syn1["cmr_forum"][]="name";      $syn2["cmr_forum"][]="name";
$syn1["cmr_forum"][]="argoment";      $syn2["cmr_forum"][]="argoment";
$syn1["cmr_forum"][]="text";      $syn2["cmr_forum"][]="text";
$syn1["cmr_forum"][]="my_master";      $syn2["cmr_forum"][]="my_master";
$syn1["cmr_forum"][]="allow_level";      $syn2["cmr_forum"][]="allow_level";
$syn1["cmr_forum"][]="allow_email";      $syn2["cmr_forum"][]="allow_email";
$syn1["cmr_forum"][]="allow_groups";      $syn2["cmr_forum"][]="allow_groups";
$syn1["cmr_forum"][]="comment";      $syn2["cmr_forum"][]="comment";
$syn1["cmr_forum"][]="date_time";      $syn2["cmr_forum"][]="date_time";





$syn1["cmr_table"][]="cmr_generator";      $syn2["cmr_table"][]="cmr_generator";
$syn1["cmr_generator"][]="id";      $syn2["cmr_generator"][]="id";
$syn1["cmr_generator"][]="db";      $syn2["cmr_generator"][]="db";
$syn1["cmr_generator"][]="table";      $syn2["cmr_generator"][]="table";
$syn1["cmr_generator"][]="column";      $syn2["cmr_generator"][]="column";
$syn1["cmr_generator"][]="code1";      $syn2["cmr_generator"][]="code1";
$syn1["cmr_generator"][]="code2";      $syn2["cmr_generator"][]="code2";
$syn1["cmr_generator"][]="code3";      $syn2["cmr_generator"][]="code3";
$syn1["cmr_generator"][]="allow_level";      $syn2["cmr_generator"][]="allow_level";
$syn1["cmr_generator"][]="allow_email";      $syn2["cmr_generator"][]="allow_email";
$syn1["cmr_generator"][]="allow_groups";      $syn2["cmr_generator"][]="allow_groups";
$syn1["cmr_generator"][]="comment";      $syn2["cmr_generator"][]="comment";
$syn1["cmr_generator"][]="date_time";      $syn2["cmr_generator"][]="date_time";





$syn1["cmr_table"][]="cmr_groups";      $syn2["cmr_table"][]="cmr_groups";
$syn1["cmr_groups"][]="id";      $syn2["cmr_groups"][]="id";
$syn1["cmr_groups"][]="name";      $syn2["cmr_groups"][]="name";
$syn1["cmr_groups"][]="state";      $syn2["cmr_groups"][]="state";
$syn1["cmr_groups"][]="level";      $syn2["cmr_groups"][]="level";
$syn1["cmr_groups"][]="location";      $syn2["cmr_groups"][]="location";
$syn1["cmr_groups"][]="type";      $syn2["cmr_groups"][]="type";
$syn1["cmr_groups"][]="sla";      $syn2["cmr_groups"][]="sla";
$syn1["cmr_groups"][]="public_key";      $syn2["cmr_groups"][]="public_key";
$syn1["cmr_groups"][]="private_key";      $syn2["cmr_groups"][]="private_key";
$syn1["cmr_groups"][]="pass_phrase";      $syn2["cmr_groups"][]="pass_phrase";
$syn1["cmr_groups"][]="email_sign";      $syn2["cmr_groups"][]="email_sign";
$syn1["cmr_groups"][]="referent_email";      $syn2["cmr_groups"][]="referent_email";
$syn1["cmr_groups"][]="admin_email";      $syn2["cmr_groups"][]="admin_email";
$syn1["cmr_groups"][]="folder";      $syn2["cmr_groups"][]="folder";
$syn1["cmr_groups"][]="notify";      $syn2["cmr_groups"][]="notify";
$syn1["cmr_groups"][]="web_site";      $syn2["cmr_groups"][]="web_site";
$syn1["cmr_groups"][]="login_script";      $syn2["cmr_groups"][]="login_script";
$syn1["cmr_groups"][]="adress";      $syn2["cmr_groups"][]="adress";
$syn1["cmr_groups"][]="my_master";      $syn2["cmr_groups"][]="my_master";
$syn1["cmr_groups"][]="my_slave";      $syn2["cmr_groups"][]="my_slave";
$syn1["cmr_groups"][]="allow_level";      $syn2["cmr_groups"][]="allow_level";
$syn1["cmr_groups"][]="allow_email";      $syn2["cmr_groups"][]="allow_email";
$syn1["cmr_groups"][]="allow_groups";      $syn2["cmr_groups"][]="allow_groups";
$syn1["cmr_groups"][]="comment";      $syn2["cmr_groups"][]="comment";
$syn1["cmr_groups"][]="date_time";      $syn2["cmr_groups"][]="date_time";




$syn1["cmr_table"][]="cmr_message";      $syn2["cmr_table"][]="cmr_message";
$syn1["cmr_message"][]="id";      $syn2["cmr_message"][]="id";
$syn1["cmr_message"][]="sender";      $syn2["cmr_message"][]="sender";
$syn1["cmr_message"][]="title";      $syn2["cmr_message"][]="title";
$syn1["cmr_message"][]="model_id";      $syn2["cmr_message"][]="model_id";
$syn1["cmr_message"][]="model_title";      $syn2["cmr_message"][]="model_title";
$syn1["cmr_message"][]="lang";      $syn2["cmr_message"][]="lang";
$syn1["cmr_message"][]="text";      $syn2["cmr_message"][]="text";
$syn1["cmr_message"][]="groups_dest";      $syn2["cmr_message"][]="groups_dest";
$syn1["cmr_message"][]="users_dest";      $syn2["cmr_message"][]="users_dest";
$syn1["cmr_message"][]="modules_dest";      $syn2["cmr_message"][]="modules_dest";
$syn1["cmr_message"][]="ripetitive";      $syn2["cmr_message"][]="ripetitive";
$syn1["cmr_message"][]="repeat_end";      $syn2["cmr_message"][]="repeat_end";
$syn1["cmr_message"][]="begin_time";      $syn2["cmr_message"][]="begin_time";
$syn1["cmr_message"][]="end_time";      $syn2["cmr_message"][]="end_time";
$syn1["cmr_message"][]="intervale";      $syn2["cmr_message"][]="intervale";
$syn1["cmr_message"][]="priority";      $syn2["cmr_message"][]="priority";
$syn1["cmr_message"][]="type";      $syn2["cmr_message"][]="type";
$syn1["cmr_message"][]="state";      $syn2["cmr_message"][]="state";
$syn1["cmr_message"][]="my_master";      $syn2["cmr_message"][]="my_master";
$syn1["cmr_message"][]="my_slave";      $syn2["cmr_message"][]="my_slave";
$syn1["cmr_message"][]="allow_level";      $syn2["cmr_message"][]="allow_level";
$syn1["cmr_message"][]="allow_email";      $syn2["cmr_message"][]="allow_email";
$syn1["cmr_message"][]="allow_groups";      $syn2["cmr_message"][]="allow_groups";
$syn1["cmr_message"][]="comment";      $syn2["cmr_message"][]="comment";
$syn1["cmr_message"][]="date_time";      $syn2["cmr_message"][]="date_time";






$syn1["cmr_table"][]="cmr_message_read";      $syn2["cmr_table"][]="cmr_message_read";
$syn1["cmr_message_read"][]="id";      $syn2["cmr_message_read"][]="id";
$syn1["cmr_message_read"][]="user_email";      $syn2["cmr_message_read"][]="user_email";
$syn1["cmr_message_read"][]="message_id";      $syn2["cmr_message_read"][]="message_id";
$syn1["cmr_message_read"][]="date_time";      $syn2["cmr_message_read"][]="date_time";





$syn1["cmr_table"][]="cmr_nagios";      $syn2["cmr_table"][]="cmr_nagios";
$syn1["cmr_nagios"][]="id";      $syn2["cmr_nagios"][]="id";
$syn1["cmr_nagios"][]="group_name";      $syn2["cmr_nagios"][]="group_name";
$syn1["cmr_nagios"][]="nagios_group";      $syn2["cmr_nagios"][]="nagios_group";
$syn1["cmr_nagios"][]="config";      $syn2["cmr_nagios"][]="config";
$syn1["cmr_nagios"][]="allow_level";      $syn2["cmr_nagios"][]="allow_level";
$syn1["cmr_nagios"][]="allow_email";      $syn2["cmr_nagios"][]="allow_email";
$syn1["cmr_nagios"][]="allow_groups";      $syn2["cmr_nagios"][]="allow_groups";
$syn1["cmr_nagios"][]="comment";      $syn2["cmr_nagios"][]="comment";
$syn1["cmr_nagios"][]="date_time";      $syn2["cmr_nagios"][]="date_time";





$syn1["cmr_table"][]="cmr_nessus";      $syn2["cmr_table"][]="cmr_nessus";
$syn1["cmr_nessus"][]="id";      $syn2["cmr_nessus"][]="id";
$syn1["cmr_nessus"][]="group_name";      $syn2["cmr_nessus"][]="group_name";
$syn1["cmr_nessus"][]="nessus_ip";      $syn2["cmr_nessus"][]="nessus_ip";
$syn1["cmr_nessus"][]="allow_level";      $syn2["cmr_nessus"][]="allow_level";
$syn1["cmr_nessus"][]="allow_email";      $syn2["cmr_nessus"][]="allow_email";
$syn1["cmr_nessus"][]="allow_groups";      $syn2["cmr_nessus"][]="allow_groups";
$syn1["cmr_nessus"][]="comment";      $syn2["cmr_nessus"][]="comment";
$syn1["cmr_nessus"][]="date_time";      $syn2["cmr_nessus"][]="date_time";






$syn1["cmr_table"][]="cmr_rss";      $syn2["cmr_table"][]="cmr_rss";
$syn1["cmr_rss"][]="id";      $syn2["cmr_rss"][]="id";
$syn1["cmr_rss"][]="version";      $syn2["cmr_rss"][]="version";
$syn1["cmr_rss"][]="title";      $syn2["cmr_rss"][]="title";
$syn1["cmr_rss"][]="link";      $syn2["cmr_rss"][]="link";
$syn1["cmr_rss"][]="language";      $syn2["cmr_rss"][]="language";
$syn1["cmr_rss"][]="rating";      $syn2["cmr_rss"][]="rating";
$syn1["cmr_rss"][]="state";      $syn2["cmr_rss"][]="state";
$syn1["cmr_rss"][]="feed_adress";      $syn2["cmr_rss"][]="feed_adress";
$syn1["cmr_rss"][]="type";      $syn2["cmr_rss"][]="type";
$syn1["cmr_rss"][]="text";      $syn2["cmr_rss"][]="text";
$syn1["cmr_rss"][]="allow_level";      $syn2["cmr_rss"][]="allow_level";
$syn1["cmr_rss"][]="allow_email";      $syn2["cmr_rss"][]="allow_email";
$syn1["cmr_rss"][]="allow_groups";      $syn2["cmr_rss"][]="allow_groups";
$syn1["cmr_rss"][]="comment";      $syn2["cmr_rss"][]="comment";
$syn1["cmr_rss"][]="date_time";      $syn2["cmr_rss"][]="date_time";






$syn1["cmr_table"][]="cmr_services";      $syn2["cmr_table"][]="cmr_services";
$syn1["cmr_services"][]="id";      $syn2["cmr_services"][]="id";
$syn1["cmr_services"][]="name";      $syn2["cmr_services"][]="name";
$syn1["cmr_services"][]="port";      $syn2["cmr_services"][]="port";
$syn1["cmr_services"][]="protocol";      $syn2["cmr_services"][]="protocol";
$syn1["cmr_services"][]="check_command";      $syn2["cmr_services"][]="check_command";
$syn1["cmr_services"][]="my_master";      $syn2["cmr_services"][]="my_master";
$syn1["cmr_services"][]="my_slave";      $syn2["cmr_services"][]="my_slave";
$syn1["cmr_services"][]="allow_level";      $syn2["cmr_services"][]="allow_level";
$syn1["cmr_services"][]="allow_email";      $syn2["cmr_services"][]="allow_email";
$syn1["cmr_services"][]="allow_groups";      $syn2["cmr_services"][]="allow_groups";
$syn1["cmr_services"][]="comment";      $syn2["cmr_services"][]="comment";
$syn1["cmr_services"][]="date_time";      $syn2["cmr_services"][]="date_time";




$syn1["cmr_table"][]="cmr_session";      $syn2["cmr_table"][]="cmr_session";
$syn1["cmr_session"][]="id";      $syn2["cmr_session"][]="id";
$syn1["cmr_session"][]="sessionid";      $syn2["cmr_session"][]="sessionid";
$syn1["cmr_session"][]="sessionip";      $syn2["cmr_session"][]="sessionip";
$syn1["cmr_session"][]="user_email";      $syn2["cmr_session"][]="user_email";
$syn1["cmr_session"][]="status";      $syn2["cmr_session"][]="status";
$syn1["cmr_session"][]="state";      $syn2["cmr_session"][]="state";
$syn1["cmr_session"][]="time_out";      $syn2["cmr_session"][]="time_out";
$syn1["cmr_session"][]="session_end";      $syn2["cmr_session"][]="session_end";
$syn1["cmr_session"][]="date_time";      $syn2["cmr_session"][]="date_time";




$syn1["cmr_table"][]="cmr_sla";      $syn2["cmr_table"][]="cmr_sla";
$syn1["cmr_sla"][]="id";      $syn2["cmr_sla"][]="id";
$syn1["cmr_sla"][]="user_email";      $syn2["cmr_sla"][]="user_email";
$syn1["cmr_sla"][]="group_name";      $syn2["cmr_sla"][]="group_name";
$syn1["cmr_sla"][]="asset_ip";      $syn2["cmr_sla"][]="asset_ip";
$syn1["cmr_sla"][]="user_type";      $syn2["cmr_sla"][]="user_type";
$syn1["cmr_sla"][]="group_type";      $syn2["cmr_sla"][]="group_type";
$syn1["cmr_sla"][]="asset_type";      $syn2["cmr_sla"][]="asset_type";
$syn1["cmr_sla"][]="ticket_type";      $syn2["cmr_sla"][]="ticket_type";
$syn1["cmr_sla"][]="ticket_call_method";      $syn2["cmr_sla"][]="ticket_call_method";
$syn1["cmr_sla"][]="ticket_state";      $syn2["cmr_sla"][]="ticket_state";
$syn1["cmr_sla"][]="ticket_severity";      $syn2["cmr_sla"][]="ticket_severity";
$syn1["cmr_sla"][]="ticket_assign_to";      $syn2["cmr_sla"][]="ticket_assign_to";
$syn1["cmr_sla"][]="num_user_impact";      $syn2["cmr_sla"][]="num_user_impact";
$syn1["cmr_sla"][]="num_group_impact";      $syn2["cmr_sla"][]="num_group_impact";
$syn1["cmr_sla"][]="num_asset_impact";      $syn2["cmr_sla"][]="num_asset_impact";
$syn1["cmr_sla"][]="sla";      $syn2["cmr_sla"][]="sla";
$syn1["cmr_sla"][]="comment";      $syn2["cmr_sla"][]="comment";
$syn1["cmr_sla"][]="date_time";      $syn2["cmr_sla"][]="date_time";





$syn1["cmr_table"][]="cmr_software";      $syn2["cmr_table"][]="cmr_software";
$syn1["cmr_software"][]="id";      $syn2["cmr_software"][]="id";
$syn1["cmr_software"][]="name";      $syn2["cmr_software"][]="name";
$syn1["cmr_software"][]="type";      $syn2["cmr_software"][]="type";
$syn1["cmr_software"][]="copyright";      $syn2["cmr_software"][]="copyright";
$syn1["cmr_software"][]="certificate";      $syn2["cmr_software"][]="certificate";
$syn1["cmr_software"][]="my_master";      $syn2["cmr_software"][]="my_master";
$syn1["cmr_software"][]="allow_level";      $syn2["cmr_software"][]="allow_level";
$syn1["cmr_software"][]="allow_email";      $syn2["cmr_software"][]="allow_email";
$syn1["cmr_software"][]="allow_groups";      $syn2["cmr_software"][]="allow_groups";
$syn1["cmr_software"][]="comment";      $syn2["cmr_software"][]="comment";
$syn1["cmr_software"][]="date_time";      $syn2["cmr_software"][]="date_time";




$syn1["cmr_table"][]="cmr_statistic";      $syn2["cmr_table"][]="cmr_statistic";
$syn1["cmr_statistic"][]="id";      $syn2["cmr_statistic"][]="id";
$syn1["cmr_statistic"][]="name";      $syn2["cmr_statistic"][]="name";
$syn1["cmr_statistic"][]="type";      $syn2["cmr_statistic"][]="type";
$syn1["cmr_statistic"][]="period_begin";      $syn2["cmr_statistic"][]="period_begin";
$syn1["cmr_statistic"][]="period_end";      $syn2["cmr_statistic"][]="period_end";
$syn1["cmr_statistic"][]="data";      $syn2["cmr_statistic"][]="data";
$syn1["cmr_statistic"][]="my_master";      $syn2["cmr_statistic"][]="my_master";
$syn1["cmr_statistic"][]="my_slave";      $syn2["cmr_statistic"][]="my_slave";
$syn1["cmr_statistic"][]="allow_level";      $syn2["cmr_statistic"][]="allow_level";
$syn1["cmr_statistic"][]="allow_email";      $syn2["cmr_statistic"][]="allow_email";
$syn1["cmr_statistic"][]="allow_groups";      $syn2["cmr_statistic"][]="allow_groups";
$syn1["cmr_statistic"][]="comment";      $syn2["cmr_statistic"][]="comment";
$syn1["cmr_statistic"][]="date_time";      $syn2["cmr_statistic"][]="date_time";





$syn1["cmr_table"][]="cmr_ticket";      $syn2["cmr_table"][]="cmr_ticket";
$syn1["cmr_ticket"][]="id";      $syn2["cmr_ticket"][]="id";
$syn1["cmr_ticket"][]="number";      $syn2["cmr_ticket"][]="number";
$syn1["cmr_ticket"][]="lang";      $syn2["cmr_ticket"][]="lang";
$syn1["cmr_ticket"][]="model_number";      $syn2["cmr_ticket"][]="model_number";
$syn1["cmr_ticket"][]="model_title";      $syn2["cmr_ticket"][]="model_title";
$syn1["cmr_ticket"][]="title";      $syn2["cmr_ticket"][]="title";
$syn1["cmr_ticket"][]="work_by";      $syn2["cmr_ticket"][]="work_by";
$syn1["cmr_ticket"][]="call_log_user";      $syn2["cmr_ticket"][]="call_log_user";
$syn1["cmr_ticket"][]="call_log_groups";      $syn2["cmr_ticket"][]="call_log_groups";
$syn1["cmr_ticket"][]="call_method";      $syn2["cmr_ticket"][]="call_method";
$syn1["cmr_ticket"][]="state";      $syn2["cmr_ticket"][]="state";
$syn1["cmr_ticket"][]="state_now";      $syn2["cmr_ticket"][]="state_now";
$syn1["cmr_ticket"][]="assign_to";      $syn2["cmr_ticket"][]="assign_to";
$syn1["cmr_ticket"][]="list_user_impact";      $syn2["cmr_ticket"][]="list_user_impact";
$syn1["cmr_ticket"][]="list_group_impact";      $syn2["cmr_ticket"][]="list_group_impact";
$syn1["cmr_ticket"][]="list_asset_impact";      $syn2["cmr_ticket"][]="list_asset_impact";
$syn1["cmr_ticket"][]="severity";      $syn2["cmr_ticket"][]="severity";
$syn1["cmr_ticket"][]="sla";      $syn2["cmr_ticket"][]="sla";
$syn1["cmr_ticket"][]="mail_title";      $syn2["cmr_ticket"][]="mail_title";
$syn1["cmr_ticket"][]="mail_from";      $syn2["cmr_ticket"][]="mail_from";
$syn1["cmr_ticket"][]="mail_to";      $syn2["cmr_ticket"][]="mail_to";
$syn1["cmr_ticket"][]="mail_cc";      $syn2["cmr_ticket"][]="mail_cc";
$syn1["cmr_ticket"][]="mail_bcc";      $syn2["cmr_ticket"][]="mail_bcc";
$syn1["cmr_ticket"][]="attach";      $syn2["cmr_ticket"][]="attach";
$syn1["cmr_ticket"][]="type";      $syn2["cmr_ticket"][]="type";
$syn1["cmr_ticket"][]="text";      $syn2["cmr_ticket"][]="text";
$syn1["cmr_ticket"][]="mail_text";      $syn2["cmr_ticket"][]="mail_text";
$syn1["cmr_ticket"][]="my_master";      $syn2["cmr_ticket"][]="my_master";
$syn1["cmr_ticket"][]="allow_level";      $syn2["cmr_ticket"][]="allow_level";
$syn1["cmr_ticket"][]="allow_email";      $syn2["cmr_ticket"][]="allow_email";
$syn1["cmr_ticket"][]="allow_groups";      $syn2["cmr_ticket"][]="allow_groups";
$syn1["cmr_ticket"][]="comment";      $syn2["cmr_ticket"][]="comment";
$syn1["cmr_ticket"][]="date_time";      $syn2["cmr_ticket"][]="date_time";





$syn1["cmr_table"][]="cmr_ticket_read";      $syn2["cmr_table"][]="cmr_ticket_read";
$syn1["cmr_ticket_read"][]="id";      $syn2["cmr_ticket_read"][]="id";
$syn1["cmr_ticket_read"][]="user_email";      $syn2["cmr_ticket_read"][]="user_email";
$syn1["cmr_ticket_read"][]="ticket_id";      $syn2["cmr_ticket_read"][]="ticket_id";
$syn1["cmr_ticket_read"][]="date_time";      $syn2["cmr_ticket_read"][]="date_time";





$syn1["cmr_table"][]="cmr_translate";      $syn2["cmr_table"][]="cmr_translate";
$syn1["cmr_translate"][]="id";      $syn2["cmr_translate"][]="id";
$syn1["cmr_translate"][]="code";      $syn2["cmr_translate"][]="code";
$syn1["cmr_translate"][]="language";      $syn2["cmr_translate"][]="language";
$syn1["cmr_translate"][]="text";      $syn2["cmr_translate"][]="text";
$syn1["cmr_translate"][]="translate_language";      $syn2["cmr_translate"][]="translate_language";
$syn1["cmr_translate"][]="translate_text";      $syn2["cmr_translate"][]="translate_text";
$syn1["cmr_translate"][]="date_time";      $syn2["cmr_translate"][]="date_time";




$syn1["cmr_table"][]="cmr_user";      $syn2["cmr_table"][]="cmr_user";
$syn1["cmr_user"][]="id";      $syn2["cmr_user"][]="id";
$syn1["cmr_user"][]="uid";      $syn2["cmr_user"][]="uid";
$syn1["cmr_user"][]="name";      $syn2["cmr_user"][]="name";
$syn1["cmr_user"][]="last_name";      $syn2["cmr_user"][]="last_name";
$syn1["cmr_user"][]="nickname";      $syn2["cmr_user"][]="nickname";
$syn1["cmr_user"][]="sexe";      $syn2["cmr_user"][]="sexe";
$syn1["cmr_user"][]="role";      $syn2["cmr_user"][]="role";
$syn1["cmr_user"][]="sla";      $syn2["cmr_user"][]="sla";
$syn1["cmr_user"][]="pw";      $syn2["cmr_user"][]="pw";
$syn1["cmr_user"][]="email";      $syn2["cmr_user"][]="email";
$syn1["cmr_user"][]="email_sign";      $syn2["cmr_user"][]="email_sign";
$syn1["cmr_user"][]="tel";      $syn2["cmr_user"][]="tel";
$syn1["cmr_user"][]="cel";      $syn2["cmr_user"][]="cel";
$syn1["cmr_user"][]="adress";      $syn2["cmr_user"][]="adress";
$syn1["cmr_user"][]="location";      $syn2["cmr_user"][]="location";
$syn1["cmr_user"][]="state";      $syn2["cmr_user"][]="state";
$syn1["cmr_user"][]="type";      $syn2["cmr_user"][]="type";
$syn1["cmr_user"][]="status";      $syn2["cmr_user"][]="status";
$syn1["cmr_user"][]="level";      $syn2["cmr_user"][]="level";
$syn1["cmr_user"][]="lang";      $syn2["cmr_user"][]="lang";
$syn1["cmr_user"][]="style";      $syn2["cmr_user"][]="style";
$syn1["cmr_user"][]="login_script";      $syn2["cmr_user"][]="login_script";
$syn1["cmr_user"][]="certificate";      $syn2["cmr_user"][]="certificate";
$syn1["cmr_user"][]="photo";      $syn2["cmr_user"][]="photo";
$syn1["cmr_user"][]="my_master";      $syn2["cmr_user"][]="my_master";
$syn1["cmr_user"][]="allow_level";      $syn2["cmr_user"][]="allow_level";
$syn1["cmr_user"][]="allow_email";      $syn2["cmr_user"][]="allow_email";
$syn1["cmr_user"][]="allow_groups";      $syn2["cmr_user"][]="allow_groups";
$syn1["cmr_user"][]="comment";      $syn2["cmr_user"][]="comment";
$syn1["cmr_user"][]="date_time";      $syn2["cmr_user"][]="date_time";





$syn1["cmr_table"][]="cmr_user_groups";      $syn2["cmr_table"][]="cmr_user_groups";
$syn1["cmr_user_groups"][]="id";      $syn2["cmr_user_groups"][]="id";
$syn1["cmr_user_groups"][]="user_email";      $syn2["cmr_user_groups"][]="user_email";
$syn1["cmr_user_groups"][]="group_name";      $syn2["cmr_user_groups"][]="group_name";
$syn1["cmr_user_groups"][]="type";      $syn2["cmr_user_groups"][]="type";
$syn1["cmr_user_groups"][]="state";      $syn2["cmr_user_groups"][]="state";
$syn1["cmr_user_groups"][]="date_time";      $syn2["cmr_user_groups"][]="date_time";
$syn1["cmr_user_groups"][]="allow_level";      $syn2["cmr_user_groups"][]="allow_level";
$syn1["cmr_user_groups"][]="allow_email";      $syn2["cmr_user_groups"][]="allow_email";
$syn1["cmr_user_groups"][]="allow_groups";      $syn2["cmr_user_groups"][]="allow_groups";
$syn1["cmr_user_groups"][]="comment";      $syn2["cmr_user_groups"][]="comment";




$syn1["cmr_table"][]="cmr_x_code_source";      $syn2["cmr_table"][]="cmr_x_code_source";
$syn1["cmr_x_code_source"][]="id";      $syn2["cmr_x_code_source"][]="id";
$syn1["cmr_x_code_source"][]="name";      $syn2["cmr_x_code_source"][]="name";
$syn1["cmr_x_code_source"][]="path";      $syn2["cmr_x_code_source"][]="path";
$syn1["cmr_x_code_source"][]="language";      $syn2["cmr_x_code_source"][]="language";
$syn1["cmr_x_code_source"][]="lang_version";      $syn2["cmr_x_code_source"][]="lang_version";
$syn1["cmr_x_code_source"][]="code_version";      $syn2["cmr_x_code_source"][]="code_version";
$syn1["cmr_x_code_source"][]="state";      $syn2["cmr_x_code_source"][]="state";
$syn1["cmr_x_code_source"][]="author";      $syn2["cmr_x_code_source"][]="author";
$syn1["cmr_x_code_source"][]="copyright";      $syn2["cmr_x_code_source"][]="copyright";





$syn1["cmr_x_code_source"][]="my_md5";      $syn2["cmr_x_code_source"][]="my_md5";
$syn1["cmr_x_code_source"][]="license";      $syn2["cmr_x_code_source"][]="license";
$syn1["cmr_x_code_source"][]="text";      $syn2["cmr_x_code_source"][]="text";
$syn1["cmr_x_code_source"][]="my_master";      $syn2["cmr_x_code_source"][]="my_master";
$syn1["cmr_x_code_source"][]="allow_level";      $syn2["cmr_x_code_source"][]="allow_level";
$syn1["cmr_x_code_source"][]="allow_email";      $syn2["cmr_x_code_source"][]="allow_email";
$syn1["cmr_x_code_source"][]="allow_groups";      $syn2["cmr_x_code_source"][]="allow_groups";
$syn1["cmr_x_code_source"][]="comment";      $syn2["cmr_x_code_source"][]="comment";
$syn1["cmr_x_code_source"][]="date_time";      $syn2["cmr_x_code_source"][]="date_time";





$syn1["cmr_table"][]="cmr_x_comment";      $syn2["cmr_table"][]="cmr_x_comment";
$syn1["cmr_x_comment"][]="id";      $syn2["cmr_x_comment"][]="id";
$syn1["cmr_x_comment"][]="name";      $syn2["cmr_x_comment"][]="name";
$syn1["cmr_x_comment"][]="encoding";      $syn2["cmr_x_comment"][]="encoding";
$syn1["cmr_x_comment"][]="language";      $syn2["cmr_x_comment"][]="language";
$syn1["cmr_x_comment"][]="state";      $syn2["cmr_x_comment"][]="state";
$syn1["cmr_x_comment"][]="allow_level";      $syn2["cmr_x_comment"][]="allow_level";
$syn1["cmr_x_comment"][]="allow_email";      $syn2["cmr_x_comment"][]="allow_email";
$syn1["cmr_x_comment"][]="allow_groups";      $syn2["cmr_x_comment"][]="allow_groups";
$syn1["cmr_x_comment"][]="date_time";      $syn2["cmr_x_comment"][]="date_time";





$syn1["cmr_table"][]="cmr_x_contents";      $syn2["cmr_table"][]="cmr_x_contents";
$syn1["cmr_x_contents"][]="id";      $syn2["cmr_x_contents"][]="id";
$syn1["cmr_x_contents"][]="name";      $syn2["cmr_x_contents"][]="name";
$syn1["cmr_x_contents"][]="path";      $syn2["cmr_x_contents"][]="path";
$syn1["cmr_x_contents"][]="template";      $syn2["cmr_x_contents"][]="template";
$syn1["cmr_x_contents"][]="title";      $syn2["cmr_x_contents"][]="title";
$syn1["cmr_x_contents"][]="text";      $syn2["cmr_x_contents"][]="text";
$syn1["cmr_x_contents"][]="state";      $syn2["cmr_x_contents"][]="state";
$syn1["cmr_x_contents"][]="allow_level";      $syn2["cmr_x_contents"][]="allow_level";
$syn1["cmr_x_contents"][]="allow_email";      $syn2["cmr_x_contents"][]="allow_email";
$syn1["cmr_x_contents"][]="allow_groups";      $syn2["cmr_x_contents"][]="allow_groups";
$syn1["cmr_x_contents"][]="comment";      $syn2["cmr_x_contents"][]="comment";
$syn1["cmr_x_contents"][]="date_time";      $syn2["cmr_x_contents"][]="date_time";




$syn1["cmr_table"][]="cmr_x_files";      $syn2["cmr_table"][]="cmr_x_files";
$syn1["cmr_x_files"][]="id";      $syn2["cmr_x_files"][]="id";
$syn1["cmr_x_files"][]="name";      $syn2["cmr_x_files"][]="name";
$syn1["cmr_x_files"][]="path";      $syn2["cmr_x_files"][]="path";
$syn1["cmr_x_files"][]="type";      $syn2["cmr_x_files"][]="type";
$syn1["cmr_x_files"][]="state";      $syn2["cmr_x_files"][]="state";
$syn1["cmr_x_files"][]="mine";      $syn2["cmr_x_files"][]="mine";
$syn1["cmr_x_files"][]="text";      $syn2["cmr_x_files"][]="text";
$syn1["cmr_x_files"][]="my_md5";      $syn2["cmr_x_files"][]="my_md5";
$syn1["cmr_x_files"][]="my_master";      $syn2["cmr_x_files"][]="my_master";
$syn1["cmr_x_files"][]="my_slave";      $syn2["cmr_x_files"][]="my_slave";
$syn1["cmr_x_files"][]="allow_level";      $syn2["cmr_x_files"][]="allow_level";
$syn1["cmr_x_files"][]="allow_email";      $syn2["cmr_x_files"][]="allow_email";
$syn1["cmr_x_files"][]="allow_groups";      $syn2["cmr_x_files"][]="allow_groups";
$syn1["cmr_x_files"][]="comment";      $syn2["cmr_x_files"][]="comment";
$syn1["cmr_x_files"][]="date_time";      $syn2["cmr_x_files"][]="date_time";




$syn1["cmr_table"][]="cmr_x_images";      $syn2["cmr_table"][]="cmr_x_images";
$syn1["cmr_x_images"][]="id";      $syn2["cmr_x_images"][]="id";
$syn1["cmr_x_images"][]="name";      $syn2["cmr_x_images"][]="name";
$syn1["cmr_x_images"][]="path";      $syn2["cmr_x_images"][]="path";
$syn1["cmr_x_images"][]="type";      $syn2["cmr_x_images"][]="type";
$syn1["cmr_x_images"][]="state";      $syn2["cmr_x_images"][]="state";
$syn1["cmr_x_images"][]="x_dim";      $syn2["cmr_x_images"][]="x_dim";
$syn1["cmr_x_images"][]="y_dim";      $syn2["cmr_x_images"][]="y_dim";
$syn1["cmr_x_images"][]="my_md5";      $syn2["cmr_x_images"][]="my_md5";
$syn1["cmr_x_images"][]="base64";      $syn2["cmr_x_images"][]="base64";
$syn1["cmr_x_images"][]="allow_level";      $syn2["cmr_x_images"][]="allow_level";
$syn1["cmr_x_images"][]="allow_email";      $syn2["cmr_x_images"][]="allow_email";
$syn1["cmr_x_images"][]="allow_groups";      $syn2["cmr_x_images"][]="allow_groups";
$syn1["cmr_x_images"][]="comment";      $syn2["cmr_x_images"][]="comment";
$syn1["cmr_x_images"][]="date_time";      $syn2["cmr_x_images"][]="date_time";





$syn1["cmr_table"][]="cmr_x_links";      $syn2["cmr_table"][]="cmr_x_links";
$syn1["cmr_x_links"][]="id";      $syn2["cmr_x_links"][]="id";
$syn1["cmr_x_links"][]="name";      $syn2["cmr_x_links"][]="name";
$syn1["cmr_x_links"][]="text";      $syn2["cmr_x_links"][]="text";
$syn1["cmr_x_links"][]="state";      $syn2["cmr_x_links"][]="state";
$syn1["cmr_x_links"][]="date_time";      $syn2["cmr_x_links"][]="date_time";
$syn1["cmr_x_links"][]="allow_level";      $syn2["cmr_x_links"][]="allow_level";
$syn1["cmr_x_links"][]="allow_email";      $syn2["cmr_x_links"][]="allow_email";
$syn1["cmr_x_links"][]="allow_groups";      $syn2["cmr_x_links"][]="allow_groups";
$syn1["cmr_x_links"][]="comment";      $syn2["cmr_x_links"][]="comment";





$syn1["cmr_table"][]="cmr_x_menu";      $syn2["cmr_table"][]="cmr_x_menu";
$syn1["cmr_x_menu"][]="id";      $syn2["cmr_x_menu"][]="id";
$syn1["cmr_x_menu"][]="name";      $syn2["cmr_x_menu"][]="name";
$syn1["cmr_x_menu"][]="path";      $syn2["cmr_x_menu"][]="path";
$syn1["cmr_x_menu"][]="template";      $syn2["cmr_x_menu"][]="template";
$syn1["cmr_x_menu"][]="list_link";      $syn2["cmr_x_menu"][]="list_link";
$syn1["cmr_x_menu"][]="language";      $syn2["cmr_x_menu"][]="language";
$syn1["cmr_x_menu"][]="state";      $syn2["cmr_x_menu"][]="state";
$syn1["cmr_x_menu"][]="text";      $syn2["cmr_x_menu"][]="text";
$syn1["cmr_x_menu"][]="date_time";      $syn2["cmr_x_menu"][]="date_time";
$syn1["cmr_x_menu"][]="my_master";      $syn2["cmr_x_menu"][]="my_master";
$syn1["cmr_x_menu"][]="allow_level";      $syn2["cmr_x_menu"][]="allow_level";
$syn1["cmr_x_menu"][]="allow_email";      $syn2["cmr_x_menu"][]="allow_email";
$syn1["cmr_x_menu"][]="allow_groups";      $syn2["cmr_x_menu"][]="allow_groups";
$syn1["cmr_x_menu"][]="comment";      $syn2["cmr_x_menu"][]="comment";




$syn1["cmr_table"][]="cmr_x_modules";      $syn2["cmr_table"][]="cmr_x_modules";
$syn1["cmr_x_modules"][]="id";      $syn2["cmr_x_modules"][]="id";
$syn1["cmr_x_modules"][]="name";      $syn2["cmr_x_modules"][]="name";
$syn1["cmr_x_modules"][]="path";      $syn2["cmr_x_modules"][]="path";
$syn1["cmr_x_modules"][]="template";      $syn2["cmr_x_modules"][]="template";
$syn1["cmr_x_modules"][]="language";      $syn2["cmr_x_modules"][]="language";
$syn1["cmr_x_modules"][]="state";      $syn2["cmr_x_modules"][]="state";
$syn1["cmr_x_modules"][]="text";      $syn2["cmr_x_modules"][]="text";
$syn1["cmr_x_modules"][]="date_time";      $syn2["cmr_x_modules"][]="date_time";
$syn1["cmr_x_modules"][]="my_master";      $syn2["cmr_x_modules"][]="my_master";
$syn1["cmr_x_modules"][]="allow_level";      $syn2["cmr_x_modules"][]="allow_level";
$syn1["cmr_x_modules"][]="allow_email";      $syn2["cmr_x_modules"][]="allow_email";
$syn1["cmr_x_modules"][]="allow_groups";      $syn2["cmr_x_modules"][]="allow_groups";
$syn1["cmr_x_modules"][]="comment";      $syn2["cmr_x_modules"][]="comment";




$syn1["cmr_table"][]="cmr_x_object";      $syn2["cmr_table"][]="cmr_x_object";
$syn1["cmr_x_object"][]="id";      $syn2["cmr_x_object"][]="id";
$syn1["cmr_x_object"][]="name";      $syn2["cmr_x_object"][]="name";
$syn1["cmr_x_object"][]="path";      $syn2["cmr_x_object"][]="path";
$syn1["cmr_x_object"][]="language";      $syn2["cmr_x_object"][]="language";
$syn1["cmr_x_object"][]="state";      $syn2["cmr_x_object"][]="state";
$syn1["cmr_x_object"][]="text";      $syn2["cmr_x_object"][]="text";
$syn1["cmr_x_object"][]="my_md5";      $syn2["cmr_x_object"][]="my_md5";
$syn1["cmr_x_object"][]="date_time";      $syn2["cmr_x_object"][]="date_time";
$syn1["cmr_x_object"][]="my_master";      $syn2["cmr_x_object"][]="my_master";
$syn1["cmr_x_object"][]="allow_level";      $syn2["cmr_x_object"][]="allow_level";
$syn1["cmr_x_object"][]="allow_email";      $syn2["cmr_x_object"][]="allow_email";
$syn1["cmr_x_object"][]="allow_groups";      $syn2["cmr_x_object"][]="allow_groups";
$syn1["cmr_x_object"][]="comment";      $syn2["cmr_x_object"][]="comment";





$syn1["cmr_table"][]="cmr_x_pages";      $syn2["cmr_table"][]="cmr_x_pages";
$syn1["cmr_x_pages"][]="id";      $syn2["cmr_x_pages"][]="id";
$syn1["cmr_x_pages"][]="name";      $syn2["cmr_x_pages"][]="name";
$syn1["cmr_x_pages"][]="path";      $syn2["cmr_x_pages"][]="path";
$syn1["cmr_x_pages"][]="template";      $syn2["cmr_x_pages"][]="template";
$syn1["cmr_x_pages"][]="header";      $syn2["cmr_x_pages"][]="header";
$syn1["cmr_x_pages"][]="footer";      $syn2["cmr_x_pages"][]="footer";
$syn1["cmr_x_pages"][]="list_module";      $syn2["cmr_x_pages"][]="list_module";
$syn1["cmr_x_pages"][]="language";      $syn2["cmr_x_pages"][]="language";
$syn1["cmr_x_pages"][]="my_master";      $syn2["cmr_x_pages"][]="my_master";
$syn1["cmr_x_pages"][]="allow_level";      $syn2["cmr_x_pages"][]="allow_level";
$syn1["cmr_x_pages"][]="allow_email";      $syn2["cmr_x_pages"][]="allow_email";
$syn1["cmr_x_pages"][]="allow_groups";      $syn2["cmr_x_pages"][]="allow_groups";
$syn1["cmr_x_pages"][]="comment";      $syn2["cmr_x_pages"][]="comment";
$syn1["cmr_x_pages"][]="date_time";      $syn2["cmr_x_pages"][]="date_time";






$syn1["cmr_table"][]="cmr_x_sites";      $syn2["cmr_table"][]="cmr_x_sites";
$syn1["cmr_x_sites"][]="id";      $syn2["cmr_x_sites"][]="id";
$syn1["cmr_x_sites"][]="name";      $syn2["cmr_x_sites"][]="name";
$syn1["cmr_x_sites"][]="path";      $syn2["cmr_x_sites"][]="path";
$syn1["cmr_x_sites"][]="language";      $syn2["cmr_x_sites"][]="language";
$syn1["cmr_x_sites"][]="state";      $syn2["cmr_x_sites"][]="state";
$syn1["cmr_x_sites"][]="index";      $syn2["cmr_x_sites"][]="index";
$syn1["cmr_x_sites"][]="list_page";      $syn2["cmr_x_sites"][]="list_page";
$syn1["cmr_x_sites"][]="my_master";      $syn2["cmr_x_sites"][]="my_master";
$syn1["cmr_x_sites"][]="allow_level";      $syn2["cmr_x_sites"][]="allow_level";
$syn1["cmr_x_sites"][]="allow_email";      $syn2["cmr_x_sites"][]="allow_email";
$syn1["cmr_x_sites"][]="allow_groups";      $syn2["cmr_x_sites"][]="allow_groups";
$syn1["cmr_x_sites"][]="comment";      $syn2["cmr_x_sites"][]="comment";
$syn1["cmr_x_sites"][]="date_time";      $syn2["cmr_x_sites"][]="date_time";





$syn1["cmr_table"][]="cmr_x_template";      $syn2["cmr_table"][]="cmr_x_template";
$syn1["cmr_x_template"][]="id";      $syn2["cmr_x_template"][]="id";
$syn1["cmr_x_template"][]="name";      $syn2["cmr_x_template"][]="name";
$syn1["cmr_x_template"][]="path";      $syn2["cmr_x_template"][]="path";
$syn1["cmr_x_template"][]="language";      $syn2["cmr_x_template"][]="language";
$syn1["cmr_x_template"][]="state";      $syn2["cmr_x_template"][]="state";
$syn1["cmr_x_template"][]="type";      $syn2["cmr_x_template"][]="type";
$syn1["cmr_x_template"][]="text";      $syn2["cmr_x_template"][]="text";
$syn1["cmr_x_template"][]="allow_level";      $syn2["cmr_x_template"][]="allow_level";
$syn1["cmr_x_template"][]="allow_email";      $syn2["cmr_x_template"][]="allow_email";
$syn1["cmr_x_template"][]="allow_groups";      $syn2["cmr_x_template"][]="allow_groups";
$syn1["cmr_x_template"][]="comment";      $syn2["cmr_x_template"][]="comment";
$syn1["cmr_x_template"][]="date_time";      $syn2["cmr_x_template"][]="date_time";





$syn1["cmr_table"][]="cmr_x_text";      $syn2["cmr_table"][]="cmr_x_text";
$syn1["cmr_x_text"][]="id";      $syn2["cmr_x_text"][]="id";
$syn1["cmr_x_text"][]="name";      $syn2["cmr_x_text"][]="name";
$syn1["cmr_x_text"][]="path";      $syn2["cmr_x_text"][]="path";
$syn1["cmr_x_text"][]="encoding";      $syn2["cmr_x_text"][]="encoding";
$syn1["cmr_x_text"][]="language";      $syn2["cmr_x_text"][]="language";
$syn1["cmr_x_text"][]="state";      $syn2["cmr_x_text"][]="state";
$syn1["cmr_x_text"][]="allow_level";      $syn2["cmr_x_text"][]="allow_level";
$syn1["cmr_x_text"][]="allow_email";      $syn2["cmr_x_text"][]="allow_email";
$syn1["cmr_x_text"][]="allow_groups";      $syn2["cmr_x_text"][]="allow_groups";
$syn1["cmr_x_text"][]="comment";      $syn2["cmr_x_text"][]="comment";
$syn1["cmr_x_text"][]="date_time";      $syn2["cmr_x_text"][]="date_time";

//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>