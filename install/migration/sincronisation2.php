<?php
defined("cmr_online") or die("Application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * sincronisation2.php
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

sincronisation2.php,  2007-Feb-Tue 0:12:13
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
$syn1["cmr_application"] = "Tstm Version 1.0";                $syn2["cmr_application"] = "Tstm Version 1.0";                 
$syn1["cmr_db_user"] = "soc";                                 $syn2["cmr_db_user"] = "soc";                    
$syn1["cmr_db_passw"] = chr(ord('$')) . '0c_b3N';             $syn2["cmr_db_passw"] = chr(ord('$')) . '0c_b3N';
$syn1["cmr_db_host"] = "localhost";                           $syn2["cmr_db_host"] = "localhost";              
$syn1["cmr_db_port"] = "";                                    $syn2["cmr_db_port"] = "";              
$syn1["cmr_db_socket"] = "";                                  $syn2["cmr_db_socket"] = "";              
$syn1["cmr_db_name"] = "camaroes_db";                         $syn2["cmr_db_name"] = "camaroes_db";              
// ==========configuration============

$syn1["cmr_table"][]="tstm_client";      $syn2["cmr_table"][]="tstm_client";
$syn1["tstm_client"][]="id";      $syn2["tstm_client"][]="id";
$syn1["tstm_client"][]="uid";      $syn2["tstm_client"][]="uid";
$syn1["tstm_client"][]="name";      $syn2["tstm_client"][]="name";
$syn1["tstm_client"][]="state";      $syn2["tstm_client"][]="state";
$syn1["tstm_client"][]="adress";      $syn2["tstm_client"][]="adress";
$syn1["tstm_client"][]="date_time";      $syn2["tstm_client"][]="date_time";
$syn1["tstm_client"][]="rif_scc";      $syn2["tstm_client"][]="rif_scc";
$syn1["tstm_client"][]="contact";      $syn2["tstm_client"][]="contact";
$syn1["tstm_client"][]="tel";      $syn2["tstm_client"][]="tel";
$syn1["tstm_client"][]="cel";      $syn2["tstm_client"][]="cel";
$syn1["tstm_client"][]="email";      $syn2["tstm_client"][]="email";
$syn1["tstm_client"][]="folder";      $syn2["tstm_client"][]="folder";
$syn1["tstm_client"][]="nagios_group";      $syn2["tstm_client"][]="nagios_group";
$syn1["tstm_client"][]="nessus_ip";      $syn2["tstm_client"][]="nessus_ip";
$syn1["tstm_client"][]="inf";      $syn2["tstm_client"][]="inf";
$syn1["tstm_client"][]="sla";      $syn2["tstm_client"][]="sla";




$syn1["cmr_table"][]="tstm_command";      $syn2["cmr_table"][]="tstm_command";
$syn1["tstm_command"][]="id";      $syn2["tstm_command"][]="id";
$syn1["tstm_command"][]="command_name";      $syn2["tstm_command"][]="command_name";
$syn1["tstm_command"][]="command_line";      $syn2["tstm_command"][]="command_line";
$syn1["tstm_command"][]="inf";      $syn2["tstm_command"][]="inf";
$syn1["tstm_command"][]="date_time";      $syn2["tstm_command"][]="date_time";




$syn1["cmr_table"][]="tstm_father_group";      $syn2["cmr_table"][]="tstm_father_group";
$syn1["tstm_father_group"][]="id";      $syn2["tstm_father_group"][]="id";
$syn1["tstm_father_group"][]="group_father";      $syn2["tstm_father_group"][]="group_father";
$syn1["tstm_father_group"][]="group_child";      $syn2["tstm_father_group"][]="group_child";
$syn1["tstm_father_group"][]="state";      $syn2["tstm_father_group"][]="state";
$syn1["tstm_father_group"][]="date_time";      $syn2["tstm_father_group"][]="date_time";




$syn1["cmr_table"][]="tstm_group";      $syn2["cmr_table"][]="tstm_group";
$syn1["tstm_group"][]="id";      $syn2["tstm_group"][]="id";
$syn1["tstm_group"][]="name";      $syn2["tstm_group"][]="name";
$syn1["tstm_group"][]="state";      $syn2["tstm_group"][]="state";
$syn1["tstm_group"][]="level";      $syn2["tstm_group"][]="level";
$syn1["tstm_group"][]="config";      $syn2["tstm_group"][]="config";
$syn1["tstm_group"][]="inf";      $syn2["tstm_group"][]="inf";
$syn1["tstm_group"][]="nagios_group";      $syn2["tstm_group"][]="nagios_group";
$syn1["tstm_group"][]="date_time";      $syn2["tstm_group"][]="date_time";



$syn1["cmr_table"][]="tstm_host";      $syn2["cmr_table"][]="tstm_host";
$syn1["tstm_host"][]="id";      $syn2["tstm_host"][]="id";
$syn1["tstm_host"][]="mac_adress";      $syn2["tstm_host"][]="mac_adress";
$syn1["tstm_host"][]="name";      $syn2["tstm_host"][]="name";
$syn1["tstm_host"][]="ip";      $syn2["tstm_host"][]="ip";
$syn1["tstm_host"][]="nat_ip";      $syn2["tstm_host"][]="nat_ip";
$syn1["tstm_host"][]="type";      $syn2["tstm_host"][]="type";
$syn1["tstm_host"][]="os";      $syn2["tstm_host"][]="os";
$syn1["tstm_host"][]="state";      $syn2["tstm_host"][]="state";
$syn1["tstm_host"][]="login_id";      $syn2["tstm_host"][]="login_id";
$syn1["tstm_host"][]="login_pw";      $syn2["tstm_host"][]="login_pw";
$syn1["tstm_host"][]="check_command";      $syn2["tstm_host"][]="check_command";
$syn1["tstm_host"][]="inf";      $syn2["tstm_host"][]="inf";
$syn1["tstm_host"][]="date_time";      $syn2["tstm_host"][]="date_time";




$syn1["cmr_table"][]="tstm_host_dependence";      $syn2["cmr_table"][]="tstm_host_dependence";
$syn1["tstm_host_dependence"][]="id";      $syn2["tstm_host_dependence"][]="id";
$syn1["tstm_host_dependence"][]="first_host_id";      $syn2["tstm_host_dependence"][]="first_host_id";
$syn1["tstm_host_dependence"][]="second_host_id";      $syn2["tstm_host_dependence"][]="second_host_id";
$syn1["tstm_host_dependence"][]="first_host_name";      $syn2["tstm_host_dependence"][]="first_host_name";
$syn1["tstm_host_dependence"][]="second_host_name";      $syn2["tstm_host_dependence"][]="second_host_name";
$syn1["tstm_host_dependence"][]="state";      $syn2["tstm_host_dependence"][]="state";
$syn1["tstm_host_dependence"][]="date_time";      $syn2["tstm_host_dependence"][]="date_time";




$syn1["cmr_table"][]="tstm_host_group";      $syn2["cmr_table"][]="tstm_host_group";
$syn1["tstm_host_group"][]="id";      $syn2["tstm_host_group"][]="id";
$syn1["tstm_host_group"][]="host_id";      $syn2["tstm_host_group"][]="host_id";
$syn1["tstm_host_group"][]="host_name";      $syn2["tstm_host_group"][]="host_name";
$syn1["tstm_host_group"][]="group_name";      $syn2["tstm_host_group"][]="group_name";
$syn1["tstm_host_group"][]="date_time";      $syn2["tstm_host_group"][]="date_time";




$syn1["cmr_table"][]="tstm_host_services";      $syn2["cmr_table"][]="tstm_host_services";
$syn1["tstm_host_services"][]="id";      $syn2["tstm_host_services"][]="id";
$syn1["tstm_host_services"][]="host_id";      $syn2["tstm_host_services"][]="host_id";
$syn1["tstm_host_services"][]="host_name";      $syn2["tstm_host_services"][]="host_name";
$syn1["tstm_host_services"][]="service_name";      $syn2["tstm_host_services"][]="service_name";
$syn1["tstm_host_services"][]="state";      $syn2["tstm_host_services"][]="state";
$syn1["tstm_host_services"][]="date_time";      $syn2["tstm_host_services"][]="date_time";





$syn1["cmr_table"][]="tstm_host_user";      $syn2["cmr_table"][]="tstm_host_user";
$syn1["tstm_host_user"][]="id";      $syn2["tstm_host_user"][]="id";
$syn1["tstm_host_user"][]="user_email";      $syn2["tstm_host_user"][]="user_email";
$syn1["tstm_host_user"][]="host_id";      $syn2["tstm_host_user"][]="host_id";
$syn1["tstm_host_user"][]="host_ip";      $syn2["tstm_host_user"][]="host_ip";
$syn1["tstm_host_user"][]="date_time";      $syn2["tstm_host_user"][]="date_time";





$syn1["cmr_table"][]="tstm_message";      $syn2["cmr_table"][]="tstm_message";
$syn1["tstm_message"][]="id";      $syn2["tstm_message"][]="id";
$syn1["tstm_message"][]="sender";      $syn2["tstm_message"][]="sender";
$syn1["tstm_message"][]="title";      $syn2["tstm_message"][]="title";
$syn1["tstm_message"][]="text";      $syn2["tstm_message"][]="text";
$syn1["tstm_message"][]="groups_dest";      $syn2["tstm_message"][]="groups_dest";
$syn1["tstm_message"][]="user_dest";      $syn2["tstm_message"][]="user_dest";
$syn1["tstm_message"][]="modules_dest";      $syn2["tstm_message"][]="modules_dest";
$syn1["tstm_message"][]="ripetitive";      $syn2["tstm_message"][]="ripetitive";
$syn1["tstm_message"][]="ripeat_end";      $syn2["tstm_message"][]="ripeat_end";
$syn1["tstm_message"][]="begin_time";      $syn2["tstm_message"][]="begin_time";
$syn1["tstm_message"][]="end_time";      $syn2["tstm_message"][]="end_time";
$syn1["tstm_message"][]="intervale";      $syn2["tstm_message"][]="intervale";
$syn1["tstm_message"][]="priority";      $syn2["tstm_message"][]="priority";
$syn1["tstm_message"][]="state";      $syn2["tstm_message"][]="state";
$syn1["tstm_message"][]="date_time";      $syn2["tstm_message"][]="date_time";





$syn1["cmr_table"][]="tstm_message_read";      $syn2["cmr_table"][]="tstm_message_read";
$syn1["tstm_message_read"][]="id";      $syn2["tstm_message_read"][]="id";
$syn1["tstm_message_read"][]="user_email";      $syn2["tstm_message_read"][]="user_email";
$syn1["tstm_message_read"][]="id_message";      $syn2["tstm_message_read"][]="id_message";
$syn1["tstm_message_read"][]="date_time";      $syn2["tstm_message_read"][]="date_time";




$syn1["cmr_table"][]="tstm_services";      $syn2["cmr_table"][]="tstm_services";
$syn1["tstm_services"][]="id";      $syn2["tstm_services"][]="id";
$syn1["tstm_services"][]="name";      $syn2["tstm_services"][]="name";
$syn1["tstm_services"][]="port";      $syn2["tstm_services"][]="port";
$syn1["tstm_services"][]="protocol";      $syn2["tstm_services"][]="protocol";
$syn1["tstm_services"][]="check_command";      $syn2["tstm_services"][]="check_command";
$syn1["tstm_services"][]="inf";      $syn2["tstm_services"][]="inf";
$syn1["tstm_services"][]="date_time";      $syn2["tstm_services"][]="date_time";





$syn1["cmr_table"][]="tstm_session";      $syn2["cmr_table"][]="tstm_session";
$syn1["tstm_session"][]="id";      $syn2["tstm_session"][]="id";
$syn1["tstm_session"][]="session_id";      $syn2["tstm_session"][]="session_id";
$syn1["tstm_session"][]="user_email";      $syn2["tstm_session"][]="user_email";
$syn1["tstm_session"][]="state";      $syn2["tstm_session"][]="state";
$syn1["tstm_session"][]="auto_login";      $syn2["tstm_session"][]="auto_login";
$syn1["tstm_session"][]="date_time";      $syn2["tstm_session"][]="date_time";



$syn1["cmr_table"][]="tstm_ticket";      $syn2["cmr_table"][]="tstm_ticket";
$syn1["tstm_ticket"][]="id";      $syn2["tstm_ticket"][]="id";
$syn1["tstm_ticket"][]="number";      $syn2["tstm_ticket"][]="number";
$syn1["tstm_ticket"][]="title";      $syn2["tstm_ticket"][]="title";
$syn1["tstm_ticket"][]="group";      $syn2["tstm_ticket"][]="group";
$syn1["tstm_ticket"][]="by";      $syn2["tstm_ticket"][]="by";
$syn1["tstm_ticket"][]="date_time";      $syn2["tstm_ticket"][]="date_time";
$syn1["tstm_ticket"][]="state";      $syn2["tstm_ticket"][]="state";
$syn1["tstm_ticket"][]="state_now";      $syn2["tstm_ticket"][]="state_now";
$syn1["tstm_ticket"][]="assign_to";      $syn2["tstm_ticket"][]="assign_to";
$syn1["tstm_ticket"][]="priority";      $syn2["tstm_ticket"][]="priority";
$syn1["tstm_ticket"][]="expire";      $syn2["tstm_ticket"][]="expire";
$syn1["tstm_ticket"][]="mail_from";      $syn2["tstm_ticket"][]="mail_from";
$syn1["tstm_ticket"][]="mail_to";      $syn2["tstm_ticket"][]="mail_to";
$syn1["tstm_ticket"][]="mail_cc";      $syn2["tstm_ticket"][]="mail_cc";
$syn1["tstm_ticket"][]="mail_bcc";      $syn2["tstm_ticket"][]="mail_bcc";
$syn1["tstm_ticket"][]="allegato";      $syn2["tstm_ticket"][]="allegato";
$syn1["tstm_ticket"][]="type";      $syn2["tstm_ticket"][]="type";
$syn1["tstm_ticket"][]="resolv_id";      $syn2["tstm_ticket"][]="resolv_id";
$syn1["tstm_ticket"][]="text";      $syn2["tstm_ticket"][]="text";





$syn1["cmr_table"][]="tstm_ticket_read";      $syn2["cmr_table"][]="tstm_ticket_read";
$syn1["tstm_ticket_read"][]="id";      $syn2["tstm_ticket_read"][]="id";
$syn1["tstm_ticket_read"][]="user_email";      $syn2["tstm_ticket_read"][]="user_email";
$syn1["tstm_ticket_read"][]="ticket_id";      $syn2["tstm_ticket_read"][]="ticket_id";
$syn1["tstm_ticket_read"][]="date_time";      $syn2["tstm_ticket_read"][]="date_time";





$syn1["cmr_table"][]="tstm_user";      $syn2["cmr_table"][]="tstm_user";
$syn1["tstm_user"][]="id";      $syn2["tstm_user"][]="id";
$syn1["tstm_user"][]="uid";      $syn2["tstm_user"][]="uid";
$syn1["tstm_user"][]="name";      $syn2["tstm_user"][]="name";
$syn1["tstm_user"][]="last_name";      $syn2["tstm_user"][]="last_name";
$syn1["tstm_user"][]="pw";      $syn2["tstm_user"][]="pw";
$syn1["tstm_user"][]="email";      $syn2["tstm_user"][]="email";
$syn1["tstm_user"][]="tel";      $syn2["tstm_user"][]="tel";
$syn1["tstm_user"][]="cel";      $syn2["tstm_user"][]="cel";
$syn1["tstm_user"][]="state";      $syn2["tstm_user"][]="state";
$syn1["tstm_user"][]="level";      $syn2["tstm_user"][]="level";
$syn1["tstm_user"][]="lang";      $syn2["tstm_user"][]="lang";
$syn1["tstm_user"][]="style";      $syn2["tstm_user"][]="style";
$syn1["tstm_user"][]="config";      $syn2["tstm_user"][]="config";
$syn1["tstm_user"][]="public_key";      $syn2["tstm_user"][]="public_key";
$syn1["tstm_user"][]="private_key";      $syn2["tstm_user"][]="private_key";
$syn1["tstm_user"][]="pass_phrase";      $syn2["tstm_user"][]="pass_phrase";
$syn1["tstm_user"][]="inf";      $syn2["tstm_user"][]="inf";
$syn1["tstm_user"][]="date_time";      $syn2["tstm_user"][]="date_time";


      



$syn1["cmr_table"][]="tstm_user_group";      $syn2["cmr_table"][]="tstm_user_group";
$syn1["tstm_user_group"][]="id";      $syn2["tstm_user_group"][]="id";
$syn1["tstm_user_group"][]="user_email";      $syn2["tstm_user_group"][]="user_email";
$syn1["tstm_user_group"][]="group_name";      $syn2["tstm_user_group"][]="group_name";
$syn1["tstm_user_group"][]="type";      $syn2["tstm_user_group"][]="type";
$syn1["tstm_user_group"][]="state";      $syn2["tstm_user_group"][]="state";
$syn1["tstm_user_group"][]="date_time";      $syn2["tstm_user_group"][]="date_time";
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>
