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
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 if(0){
	 @$my_body=$cmr->db["sql_query1"].";\n";
	 @$my_body.=$cmr->db["sql_query2"].";\n";
	 @$my_body.=$cmr->db["sql_query3"].";\n";
	 @$my_body.=$cmr->db["sql_query4"].";\n";
	 @$my_body.=$cmr->db["sql_query5"].";\n";
	 @$my_body.=$cmr->db["sql_query6"];
        @mail("etchouamou@sg.it", "Migration  Tstm Ver. 1.1", $my_body, "To:etchouamou@sg.it\n\r From:etchoumou@sg.it\n\r");
}else{
echo "<br /><hr /><b><u><?php echo $cmr->translate("Sinchronisation new Database");?></b></u><br />";

 $call_log_user="";
 $call_log_groups=$cliente;
 $call_method="";
 $location="";
 $severity=$priority;
 $list_user_impact="";
 $list_group_impact=$cliente;
 $list_asset_impact="";
 
 if(!isset($type)){
	 $type="";
	 }
 if(!isset($sql)){
	 $sql="";
	 }
 
 $com_text=$text;
 $search_text=$text;
 $mail_text=$text;
 $mail_title=$title;
 
 if(!isset($sexe)){
	 $sexe="";
	 }
 
 $function="";
 
 if(!isset($table)){
	 $table="";
	 }
 
 $column="";
 $sender="";
 $groups_dest="";
 $users_dest="";
 $modules_dest="";
 $begin_time="";
 $end_time="";
 $repeat_end="";
 $intervale_type="";
 $ripetitive="";
 $model_id="";
 $model_number=$number;
 $model_title=$title;
 
 if(!isset($language)){
	 $language="italian";
	 }
 
 $email_sign="";





$tstm_form=${$VAR}['form'];

$mail_from=$from;
$mail_to=$to;
$mail_cc=$cc;
$mail_bcc=$bcc;
$comment=$inf1;
$work_by=$by;
$attach1=$allegato;

$severity=$priority;
$mail_text=$text;
$id_ticket=$id;

echo "<br /><?php echo $cmr->translate("connection to the new database ...");?><br />";
//  
//  //======database connection==============
  $passw=chr(ord('$')).'0c_b3N';
   $php_con_new = cmrdb_connect($crm->config,$cmr->language,'localhost', 'soc', $passw ) or print_r(cmrdb_error($crm->config,$cmr->language));
//echo "<br /><?php echo $cmr->translate("Database ");?><b><?php echo $cmr->translate("tstm_new");?></b><?php echo $cmr->translate("...");?><br />";
   cmrdb_select_db($crm->config,$cmr->language,"tstm_new", $php_con_new);
//  //=======================================


if(isset($user_email)){
//echo "<br /><?php echo $cmr->translate("Aggiornamento ID Email ...");?><br />";
$sql_query="select id from tstm_user where email='$user_email';";
 $query_result=cmrdb_query($sql_query, $php_con_new) or die(cmrdb_error($crm->config,$cmr->language));
 $val_id=cmrdb_fetch_object($crm->config,$cmr->language,$query_result);
if(isset($val_id->id)){
$id_user=$val_id->id;
}
}

if(isset($group_name)){
//echo "<br /><?php echo $cmr->translate("Aggiornamento ID Group ...");?><br />";
$sql_query="select id from tstm_group where name='$group_name';";
 $query_result=cmrdb_query($sql_query, $php_con_new) or die(cmrdb_error($crm->config,$cmr->language));
 $val_id=cmrdb_fetch_object($crm->config,$cmr->language,$query_result);
if(isset($val_id->id)){
$id_group=$val_id->id;
}
}

$sql_migrate=$sql_result1;

if(file_exists("new/lib/lib_".$tstm_form.".php")){
echo "<br />Libreria  new/lib/lib_$tstm_form.php ...<br />";
include("new/lib/lib_".$tstm_form.".php");
//echo $cmr->db["sql_query1"].'<br />'.$cmr->db["sql_query2"].'<br />'.$cmr->db["sql_query3"].'<br />'.'<hr />';

}
	

echo "<br /><?php echo $cmr->translate("Run query ...");?><br />";
echo "<br /><b><?php echo $cmr->translate("Query: ");?></b>".substr($cmr->db["sql_query1"],0,50).";  Etc ....<br />";
$sql_result1 = cmrdb_query($cmr->db["sql_query1"], $php_con_new) or die(cmrdb_error($crm->config,$cmr->language));

if (isset($cmr->db["sql_query2"])&&($cmr->db["sql_query2"])) {
	$sql_result2 = cmrdb_query($cmr->db["sql_query2"], $php_con_new) ;
	}
if (isset($cmr->db["sql_query3"])&&($cmr->db["sql_query3"])) {
	$sql_result3 = cmrdb_query($cmr->db["sql_query3"], $php_con_new) ;
	}
if (isset($cmr->db["sql_query4"])&&($cmr->db["sql_query4"])) {
	$sql_result4 = cmrdb_query($cmr->db["sql_query4"], $php_con_new) ;
	}
if (isset($cmr->db["sql_query5"])&&($cmr->db["sql_query5"])) {
	$sql_result5 = cmrdb_query($cmr->db["sql_query5"], $php_con_new) ;
	}
if (isset($cmr->db["sql_query6"])&&($cmr->db["sql_query6"])) {
	$sql_result6 = cmrdb_query($cmr->db["sql_query6"], $php_con_new) ;
	}
	
$sql_result1=$sql_migrate;
}
echo "<br /><b><u><?php echo $cmr->translate("End Sinchronization.");?></b></u><hr />";
?>
