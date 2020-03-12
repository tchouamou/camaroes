<?php
/**
 * install.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























install.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*==================LOAD LICENCE===================================*/
/*=================================================================*/
include_once($cmr->get_path("index") . "adodb/adodb.inc.php");
include_once($cmr->get_path("func") . "function/func_database.php");
/*=================================================================*/

if(get_post("class_module") == "install"){
$db_host = get_post("db_host");

$db_exist = get_post("db_exist");
$db_name = get_post("db_name");
$db_table_prefix = get_post("db_table_prefix");

$db_user = get_post("db_user");
$db_pw = get_post("db_pw");

$db_port = get_post("db_port");
if($db_port){
    $db_host = $db_host . ":" . $db_port;
}

$db_socket = get_post("db_socket");
if($db_socket){
    $db_host = $db_socket;
}

$db_type = get_post("db_type");
$cmr_lang = get_post("cmr_lang");
$cmr_theme = get_post("cmr_theme");

$cmr_main_config = get_post("cmr_main_config");
$cmr_database_config = get_post("cmr_database_config");
$cmr_smtp_config = get_post("cmr_smtp_config");
$cmr_compagny_config = get_post("cmr_compagny_config");


$cmr_path = get_post("cmr_path"); 
$cmr_www_path = get_post("cmr_www_path"); 
$cmr_log_path = get_post("cmr_log_path"); 
$cmr_class_path = get_post("cmr_class_path"); 
$cmr_tab_path = get_post("cmr_tab_path"); 
$cmr_notify_path = get_post("cmr_notify_path"); 
$cmr_home_path = get_post("cmr_home_path"); 
$cmr_session_path = get_post("cmr_session_path"); 
$class_modules_path = get_post("class_modules_path"); 
$cmr_db_path = get_post("cmr_db_path");
$cmr_help_path = get_post("cmr_help_path");
$cmr_func_path = get_post("cmr_func_path");
$cmr_conf_path = get_post("cmr_conf_path");
$cmr_images_path = get_post("cmr_images_path");
$cmr_lang_path = get_post("cmr_lang_path");
$cmr_themes_path = get_post("cmr_themes_path");
$cmr_get_data_path = get_post("cmr_get_data_path");
$cmr_temp_path = get_post("cmr_temp_path");
$cmr_template_path = get_post("cmr_template_path");
$cmr_model_path = get_post("cmr_model_path");
$cmr_gd_font_path = get_post("cmr_gd_font_path");
$cmr_font_path = get_post("cmr_font_path");

$cmr_pw_developer = get_post("cmr_pw_developer");
$cmr_pw_admin = get_post("cmr_pw_admin");
$cmr_pw_operator = get_post("cmr_pw_operator");
$cmr_pw_tecnician = get_post("cmr_pw_tecnician");
$cmr_pw_client = get_post("cmr_pw_client");
$cmr_pw_demo = get_post("cmr_pw_demo");
$cmr_pw_guest = get_post("cmr_pw_guest");
$cmr_pw_user = get_post("cmr_pw_user");

$cmr_mail_host = get_post("cmr_mail_host");
$cmr_mail_port = get_post("cmr_mail_port");
$cmr_mail_username = get_post("cmr_mail_username");
$cmr_mail_password = get_post("cmr_mail_password");


$cmr_admin_group = get_post("cmr_admin_group");
$cmr_admin_name = get_post("cmr_admin_name");
$cmr_admin_email = get_post("cmr_admin_email");
$cmr_from_name = get_post("cmr_from_name");
$cmr_from_email = get_post("cmr_from_email");
$cmr_cc_name = get_post("cmr_cc_name");
$cmr_cc_email = get_post("cmr_cc_email");
$cmr_bcc_name = get_post("cmr_bcc_name");
$cmr_bcc_email = get_post("cmr_bcc_email");
$cmr_log_name = get_post("cmr_log_name");
$cmr_log_email = get_post("cmr_log_email");
$cmr_company_name3 = get_post("cmr_company_name3");
$cmr_log_email1 = get_post("cmr_log_email1");
$cmr_company_name = get_post("cmr_company_name");
$cmr_company_name1 = get_post("cmr_company_name1");
$cmr_company_name2 = get_post("cmr_company_name2");
$cmr_company_name3 = get_post("cmr_company_name3");
$cmr_company_address = get_post("cmr_company_address");
$cmr_company_tel = get_post("cmr_company_tel");
$cmr_company_fax = get_post("cmr_company_fax");
$cmr_company_cel = get_post("cmr_company_cel");
$cmr_company_website = get_post("cmr_company_website");
/*=================================================================*/
$cmr->db["db_type"] = $db_type;
$cmr->db["db_name"] = $db_name;
$cmr->db["db_host"] = $db_host;
$cmr->db["db_user"] = $db_user;
$cmr->db["db_pw"] = $db_pw;
$cmr->db_connection = $cmr->connect($cmr->db);
// USE tstm;
// 	$cmr->db_connection = NewADOConnection($db_type);
//     $cmr->db_connection->Connect($db_host, $db_user, $db_pw, "") or $install_prints .= ("<h3>!!! " . $cmr->db_connection->ErrorMsg() . " !!!? </h3>");
$data = array();
if(!($db_exist)) $result_query = sql_run("result", $cmr->db_connection, "create_database", "", $db_name);
//         $result_query = &$cmr->db_connection->Execute("CREATE DATABASE IF NOT EXISTS " . $db_name . ";") /*, $db_con)*/ or $install_prints .= ("<h3>!!! " . $cmr->db_connection->ErrorMsg() . " !!!? </h3>");

$cmr->db_connection = $cmr->connect($cmr->db);

//     $sql_scheme = file_get_contents($cmr->get_conf("cmr_install_path") . "install/cmr_scheme.sql");
    $sql_scheme1 = file_get_contents($cmr->get_conf("cmr_install_path") . "install/cmr_scheme_create.sql");
    $sql_scheme2 = file_get_contents($cmr->get_conf("cmr_install_path") . "install/cmr_scheme_insert.sql");
//     $sql_scheme3 = file_get_contents($cmr->get_conf("cmr_install_path") . "install/cmr_scheme_insert3.sql");
    $sql_scheme = cmr_searchi_replace("^\s*--[^\n]*[\n]", " ", $sql_scheme1 . $sql_scheme2);
 
    $sql_scheme = str_replace("INSERT IGNORE INTO cmr_", "INSERT IGNORE INTO " . $db_table_prefix, $sql_scheme);
    $sql_scheme = str_replace("INSERT INTO cmr_", "INSERT INTO " . $db_table_prefix, $sql_scheme);
    $sql_scheme = str_replace("CREATE TABLE IF NOT EXISTS cmr_", "CREATE TABLE IF NOT EXISTS " . $db_table_prefix, $sql_scheme);
    $sql_scheme = str_replace("CREATE TABLE cmr_", "CREATE TABLE " . $db_table_prefix, $sql_scheme);

    $sql_query_array = cmr_split(";\s*\n", $sql_scheme);

    foreach($sql_query_array as $key => $sql_query){
        if(!cmr_searchi("select |insert |create |delete |update |default |use ", next($sql_query_array))){
            array_push ($sql_query_array, current($sql_query_array) . ";\n" . next($sql_query_array));
            $sql_query_array[$key] = "";
            $sql_query_array[$key + 1] = "";
        }
    }
/*=================================================================*/
 $list_config = array(0 => $cmr->get_conf("cmr_path") . "config.inc.php", 1 => $cmr_main_config, 2 => $cmr_database_config, 3 => $cmr_smtp_config, 4 => $cmr_compagny_config);
 $config_text = array();
/*=================================================================*/
    

    $config_text[0] = file_get_contents($cmr->get_conf("cmr_path") . "config.inc.php");
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"db_type\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_type\"]=\"" . $db_type . "\";\n", $config_text[0]);
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"db_port\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_port\"]=\"" . $db_port . "\";\n", $config_text[0]);
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"db_socket\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_socket\"]=\"" . $db_socket . "\";\n", $config_text[0]);
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"db_host\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_host\"]=\"" . $db_host . "\";\n", $config_text[0]);
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"db_name\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_name\"]=\"" . $db_name . "\";\n", $config_text[0]);
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"db_user\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_user\"]=\"" . $db_user . "\";\n", $config_text[0]);
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"db_pw\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_pw\"]=\"" . $db_pw . "\";\n", $config_text[0]);
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"cmr_table_prefix\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"cmr_table_prefix\"]=\"" . $db_table_prefix . "\";\n", $config_text[0]);
    $config_text[0] = cmr_searchi_replace("\$cmr->config\[\"cmr_main_config\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"cmr_main_config\"]=\"" . $cmr_main_config . "\";\n", $config_text[0]);

/*=================================================================*/

        
    

/*=================================================================*/
    $config_text[1] = file_get_contents($cmr->get_conf("cmr_main_config") . "");
    $config_text[1] = cmr_searchi_replace("cmr_default_lang[ \t]*=[^\n]*[\n]", "cmr_default_lang=" . $cmr_lang . "\n", $config_text[1]);
    
    $config_text[1] = cmr_searchi_replace("cmr_www_path[ \t]*=[^\n]*[\n]", "cmr_www_path=" . $cmr_www_path . "\n", $config_text[1]);
    
    $config_text[1] = cmr_searchi_replace("cmr_path[ \t]*=[^\n]*[\n]", "cmr_path=" . $cmr_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_log_path[ \t]*=[^\n]*[\n]", "cmr_log_path=" . $cmr_log_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_home_path[ \t]*=[^\n]*[\n]", "cmr_home_path=" . $cmr_home_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("class_modules_path[ \t]*=[^\n]*[\n]", "class_modules_path=" . $class_modules_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_db_path[ \t]*=[^\n]*[\n]", "cmr_db_path=" . $cmr_db_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_help_path[ \t]*=[^\n]*[\n]", "cmr_help_path=" . $cmr_help_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_func_path[ \t]*=[^\n]*[\n]", "cmr_func_path=" . $cmr_func_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_class_path[ \t]*=[^\n]*[\n]", "cmr_class_path=" . $cmr_class_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_conf_path[ \t]*=[^\n]*[\n]", "cmr_conf_path=" . $cmr_conf_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_images_path[ \t]*=[^\n]*[\n]", "cmr_images_path=" . $cmr_images_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_lang_path[ \t]*=[^\n]*[\n]", "cmr_lang_path=" . $cmr_lang_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_themes_path[ \t]*=[^\n]*[\n]", "cmr_themes_path=" . $cmr_themes_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_tab_path[ \t]*=[^\n]*[\n]", "cmr_tab_path=" . $cmr_tab_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_get_data_path[ \t]*=[^\n]*[\n]", "cmr_get_data_path=" . $cmr_get_data_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_notify_path[ \t]*=[^\n]*[\n]", "cmr_notify_path=" . $cmr_notify_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_session_path[ \t]*=[^\n]*[\n]", "cmr_session_path=" . $cmr_session_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_temp_path[ \t]*=[^\n]*[\n]", "cmr_temp_path=" . $cmr_temp_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_template_path[ \t]*=[^\n]*[\n]", "cmr_template_path=" . $cmr_template_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_model_path[ \t]*=[^\n]*[\n]", "cmr_model_path=" . $cmr_model_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_font_path[ \t]*=[^\n]*[\n]", "cmr_font_path=" . $cmr_font_path . "\n", $config_text[1]);
    $config_text[1] = cmr_searchi_replace("cmr_gd_font_path[ \t]*=[^\n]*[\n]", "cmr_gd_font_path=" . $cmr_gd_font_path . "\n", $config_text[1]);
    
    
    $config_text[2] = file_get_contents($cmr->get_conf("cmr_database_config") . "");
    $config_text[2] = cmr_searchi_replace("db_type[ \t]*=[^\n]*[\n]", "db_type=" . $db_type . "\n", $config_text[2]);
    $config_text[2] = cmr_searchi_replace("db_port[ \t]*=[^\n]*[\n]", "db_port=" . $db_port . "\n", $config_text[2]);
    $config_text[2] = cmr_searchi_replace("db_socket[ \t]*=[^\n]*[\n]", "db_socket=" . $db_socket . "\n", $config_text[2]);
    $config_text[2] = cmr_searchi_replace("db_host[ \t]*=[^\n]*[\n]", "db_host=" . $db_host . "\n", $config_text[2]);
    $config_text[2] = cmr_searchi_replace("db_name[ \t]*=[^\n]*[\n]", "db_name=" . $db_name . "\n", $config_text[2]);
    $config_text[2] = cmr_searchi_replace("db_user[ \t]*=[^\n]*[\n]", "db_user=" . $db_user . "\n", $config_text[2]);
    $config_text[2] = cmr_searchi_replace("db_pw[ \t]*=[^\n]*[\n]", "db_pw=" . $db_pw . "\n", $config_text[2]);
    $config_text[2] = cmr_searchi_replace("cmr_table_prefix[ \t]*=[^\n]*[\n]", "cmr_table_prefix=" . $db_table_prefix . "\n", $config_text[2]);

    
    
    $config_text[3] = file_get_contents($cmr->get_conf("cmr_smtp_config") . "");
    $config_text[3] = cmr_searchi_replace("cmr_mail_host[ \t]*=[^\n]*[\n]", "cmr_mail_host=" . $cmr_mail_host . "\n", $config_text[3]);
    $config_text[3] = cmr_searchi_replace("cmr_mail_port[ \t]*=[^\n]*[\n]", "cmr_mail_port=" . $cmr_mail_port . "\n", $config_text[3]);
    $config_text[3] = cmr_searchi_replace("cmr_mail_username[ \t]*=[^\n]*[\n]", "cmr_mail_username=" . $cmr_mail_username . "\n", $config_text[3]);
    $config_text[3] = cmr_searchi_replace("cmr_mail_password[ \t]*=[^\n]*[\n]", "cmr_mail_password=" . $cmr_mail_password . "\n", $config_text[3]);

    $config_text[4] = file_get_contents($cmr->get_conf("cmr_compagny_config") . "");
    $config_text[4] = cmr_searchi_replace("cmr_admin_group[ \t]*=[^\n]*[\n]", "cmr_admin_group=" . $cmr_admin_group . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_admin_name[ \t]*=[^\n]*[\n]", "cmr_admin_name=" . $cmr_admin_name . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_admin_email[ \t]*=[^\n]*[\n]", "cmr_admin_email=" . $cmr_admin_email . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_from_name[ \t]*=[^\n]*[\n]", "cmr_from_name=" . $cmr_from_name . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_from_email[ \t]*=[^\n]*[\n]", "cmr_from_email=" . $cmr_from_email . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_cc_name[ \t]*=[^\n]*[\n]", "cmr_cc_name=" . $cmr_cc_name . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_cc_email[ \t]*=[^\n]*[\n]", "cmr_cc_email=" . $cmr_cc_email . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_bcc_name[ \t]*=[^\n]*[\n]", "cmr_bcc_name=" . $cmr_bcc_name . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_bcc_email[ \t]*=[^\n]*[\n]", "cmr_bcc_email=" . $cmr_bcc_email . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_log_name[ \t]*=[^\n]*[\n]", "cmr_log_name=" . $cmr_log_name . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_log_email[ \t]*=[^\n]*[\n]", "cmr_log_email=" . $cmr_log_email . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_name3[ \t]*=[^\n]*[\n]", "cmr_company_name3=" . $cmr_company_name3 . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_log_email1[ \t]*=[^\n]*[\n]", "cmr_log_email1=" . $cmr_log_email1 . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_name[ \t]*=[^\n]*[\n]", "cmr_company_name=" . $cmr_company_name . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_name1[ \t]*=[^\n]*[\n]", "cmr_company_name1=" . $cmr_company_name1 . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_name2[ \t]*=[^\n]*[\n]", "cmr_company_name2=" . $cmr_company_name2 . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_name3[ \t]*=[^\n]*[\n]", "cmr_company_name3=" . $cmr_company_name3 . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_address[ \t]*=[^\n]*[\n]", "cmr_company_address=" . $cmr_company_address . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_tel[ \t]*=[^\n]*[\n]", "cmr_company_tel=" . $cmr_company_tel . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_fax[ \t]*=[^\n]*[\n]", "cmr_company_fax=" . $cmr_company_fax . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_cel[ \t]*=[^\n]*[\n]", "cmr_company_cel=" . $cmr_company_cel . "\n", $config_text[4]);
    $config_text[4] = cmr_searchi_replace("cmr_company_website[ \t]*=[^\n]*[\n]", "cmr_company_website=" . $cmr_company_website . "\n", $config_text[4]);
/*=================================================================*/
/*=================================================================*/
    include($cmr->get_conf("cmr_install_path") . "install/install_end.php");
/*=================================================================*/
    
    
    
/*=================================================================*/
}else{
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@
    include($cmr->get_conf("cmr_install_path") . "install/install_begin.php");
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
/*=================================================================*/

?>