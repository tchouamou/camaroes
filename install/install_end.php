<?php
/**
 * template_install_end.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






template_install_end.php,  2011-Oct
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
include_once(dirname(__FILE__) ."/../control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_encoding"] = $cmr->get_language("cmr_charset");
$cmr->prints["match_language"] = $cmr->get_language("cmr_language");
$cmr->prints["match_www_path"] = "";
// $cmr->prints["match_html_header_lang"] = $cmr->get_conf("html_header_lang");
$cmr->prints["match_content_type"] = $cmr->get_conf("html_meta_content_type");
$cmr->prints["match_keyword"] = $cmr->get_conf("html_meta_keyword");
$cmr->prints["match_description"] = $cmr->get_conf("html_meta_description");
$cmr->prints["match_author"] = $cmr->get_conf("html_meta_author");
$cmr->prints["match_date"] = $cmr->get_conf("html_meta_date");
$cmr->prints["match_refresh"] = $cmr->get_page("refresh");
$cmr->prints["match_bgcolor"] = $cmr->get_theme("bgcolor");
$cmr->prints["match_background"] = $cmr->get_theme("background");
$cmr->prints["match_no_java"] = $cmr->translate("no_java");
$cmr->prints["match_logo_icon"] = $cmr->get_conf("cmr_logo_icon");

$cmr->prints["match_style"] = $cmr->get_path("www") . $cmr->get_theme("cmr_style");
$cmr->prints["match_javascript"] = $cmr->get_path("www") . $cmr->get_page("cmr_jscrip");

$cmr->prints["match_clock_engine"] = ";";
if(($cmr->get_conf("cmr_clock_engine"))) 
$cmr->prints["match_clock_engine"] = $cmr->get_page("cmr_clock_engine")."; ";

$cmr->prints["match_ajax_engine"] = ";";
if(($cmr->get_conf("cmr_ajax_engine"))) $cmr->prints["match_ajax_engine"] = "ajax_event('". $cmr->get_page("cmr_ajax_engine")."')";

$cmr->prints["match_onload"] = ";";
$cmr->prints["match_noscript"] = $cmr->translate("!!! Need java script to run well !!!");
$cmr->prints["match_sound"] = 0;
if($cmr->get_conf('cmr_exec_sound')) $cmr->prints["match_sound"] = "";
// // print("<embed src=\"". $cmr->get_conf("cmr_audio_sound") ."\" hidden=\"true\" height=\"60\" width=\"135\" autostart=\"true\" loop=\"false\" playcount=\"1\" volume=\"10\" starttime=\"00:11\" endtime=\"00:16\"/>");
// // print("<noembed>";style=\"visibility :hidden); display:none\"
// print("<bgsound src=\"". $cmr->get_conf("cmr_audio_sound") ."\"  loop=\"1\" />");
// // print("</noembed>");
$cmr->page["middle1"] = "install_end";
if(($cmr->get_page("page_title"))&&(strlen($cmr->page["page_title"])>2)){
	$cmr->prints["match_title"] = ucfirst(cmr_search_replace("_", " ", $cmr->get_page("page_title")))." (" . $cmr->config["cmr_company_name3"] . ") " . $cmr->get_conf("cmr_version");
	}else{
	$cmr->prints["match_title"] = "(" . $cmr->config["cmr_company_name3"] . ") " . ucfirst(cmr_search_replace("_", " ", substr($cmr->get_page("middle1"), 0, strrpos($cmr->get_page("middle1"), ".")))) . " - Ver. " . $cmr->get_conf("cmr_version");
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("template") . "templates/template_install_end" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/origin/template_install_end" . $cmr->get_ext("template"); 
$template_install_end_file = cmr_good_file($file_list);
$template_install_end = file_get_contents($template_install_end_file);  
$cmr->print_template("template1", $template_install_end);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// --------------
$mod->name = 'Install';
$mod->rown_position = 'head';
$mod->col_position = "1";
// ===============================================
// ===============================================
// ===============================================
include_once($cmr->get_path("module") . "modules/guest/page_header.php");
// ===============================================
// ===============================================
// ===============================================
// ===============================================
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->themes["win_type"] = "default";
// $division->load_template($cmr->themes);

$division->themes["path"] = "install/install.php";
$division->module["name"] = "install.php";
$division->themes["module_positionx"] = "middle";
$division->themes["module_positiony"] = "1";

$division->module["title"] = $cmr->translate("Install");
// $division->module["text"] = $str;




$division->themes["background"]= "";
$division->bgcolor = "#E0E0E0";



$division->themes["header_tools_right"] = 0;

$cmr->prints["match_open_windows"] = $division->show_noclose();
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
$install_prints = "";
   $install_prints .= ("<fieldset class=\"bubble\"><legend>" . $cmr->translate("install database") . "</legend>");
   
   $install_prints .= (show_hide("install_db", "begin") . "<ul>"); 
   
   $run_install_query = run_install_query($sql_query_array, $cmr->db_connection);
   $total = $run_install_query[0];
   $install_prints .= $run_install_query[1];
//     foreach($sql_query_array as $sql_query){
//         if($sql_query){
//             $result_query = &$cmr->db_connection->Execute($sql_query . ";")  or $install_prints .= ("<li><b><p>!!! " . $cmr->db_connection->ErrorMsg() . " !!!?</p></b><li>");
//             (empty($result_query)) ? $install_prints .= ("<li class=\"alert\">" . $sql_query . ";</li>") : $total += $result_query->RecordCount();/*, $db_con)*/
//         }
//         $install_prints .= ("<li>" . $sql_query . ";</li>");
//     }
    
    
   $install_prints .= ("</ul>" . show_hide("install_db", "end")); 
   $install_prints .= ("</fieldset>");
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
        $install_prints .= ("<fieldset class=\"bubble\"><legend>" . $cmr->translate("update user") . "</legend><ul>");
/*=================================================================*/
//     if($good_database){
		/*===============================*/
		$list_user["developer"] = pw_encode($cmr_pw_developer);
		$list_user["admin"] = pw_encode($cmr_pw_admin);
		$list_user["operator"] = pw_encode($cmr_pw_operator);
		$list_user["tecnician"] = pw_encode($cmr_pw_tecnician);
		$list_user["client"] = pw_encode($cmr_pw_client);
		$list_user["demo"] = pw_encode($cmr_pw_demo);
				
		/*===============================*/
		foreach($list_user as $key => $value){
			$affected = cmr_update_pw($cmr->db_connection, $db_table_prefix . "user", $key, $value);
            ($affected) ? $total += $affected:$install_prints .= ("<li class=\"alert\">" . $cmr->translate("!!password not set for:") . $key . ";</li>");
			}
		/*===============================*/
			
        $install_prints .= ("</ul></fieldset>");
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
$install_prints .= ("<fieldset class=\"bubble\"><legend>" . $cmr->translate("update config") . "</legend>");


	/*=================================================================*/
    $good_config = true;
	$install_prints .= ("<fieldset class=\"bubble\"><legend>" . $cmr->translate("backup") . "</legend>");
    $install_prints .= (show_hide("backup", "begin") . "<ul>"); 
    foreach($list_config as $key => $value){
    if(file_exists($value)){
	    if(rename($value, $value."_" . date("y_m_d_h_i") . ".bak")){
	        $install_prints .= ("<li>" .  $cmr->translate("backup copy of file ") . " [" . $value . "] " .  $cmr->translate("created =>["). $value."_" . date("y_m_d_h_i") . ".bak]<li>");
	    }else{
	        $install_prints .= ("<li class=\"alert\">" .  $cmr->translate("backup copy of file ") . " [" . $value . "] " .  $cmr->translate("can not be created ??!!!!"). "<li>");
		    $good_config = false;
	    }
     }else{
        $install_prints .= ("<li>" .  $cmr->translate("file ") . " [" . $value . "] " .  $cmr->translate("not exist backup not need .....") . "<li>");
	    }
	}
   $install_prints .= ("</ul>" . show_hide("backup", "end")); 
   $install_prints .= ("</fieldset>");
	/*=================================================================*/
        
    
    
    
/*=================================================================*/
/*=================================================================*/
    foreach($list_config as $key => $value){
        $install_prints .= ("<fieldset class=\"bubble\"><legend>" . $value . "</legend>");
    	$install_prints .= (show_hide($key, "begin") . "<ul>"); 
        $chmod = @ chmod($value, 0775);
        if(!$chmod) $install_prints .= ("<li class=\"alert\"><br />" .  $cmr->translate("mode 0775 not set for file ") . " [" . $value . "] ??!!!! <br />");
        $fich = @ fopen($value, "w+");
        if(@ fwrite($fich, $config_text[$key])){
            $install_prints .= ("<li><b>" . $cmr->translate("file ") . " [" . $value . "] " . $cmr->translate("successfully created"). " </b>.......</li>");
        }else{
            $install_prints .= ("<li class=\"alert\"><br />" .  $cmr->translate("file ") . " [" . $value . "] " . $cmr->translate("not created ??!!!!"). " <br />");
            $install_prints .= ("<span>" .  $cmr->translate("use the next text to manualy change the file ") . " [" . $value . "]  </span>");
            $install_prints .= ("<textarea name=\"temp_textarea$key\">" .  htmlentities($config_text[$key]) . "</textarea>");
            $install_prints .= ("</li>");
    		$good_config = false;
        }
//         fclose($value);
   		$install_prints .= ("</ul>" . show_hide($key, "end")); 
        $install_prints .= ("</fieldset>");
     }
/*=================================================================*/
        $install_prints .= ("</fieldset>");
/*=================================================================*/
    
    $good_database = ($total > 1);

/*=================================================================*/
$install_prints .= ("<fieldset class=\"bubble\"><legend>" . $cmr->translate("conclusion") . "</legend><ul>");
if(($good_database)){
    $install_prints .= ("<li><h1>!!! " .  $cmr->translate("Database Instalation ok") . "  </h1></li>");
}else{
    $install_prints .= ("<li><span class=\"alert\">!!! " .  $cmr->translate("Database Instalation procedure maybe failled !!!? ") . ("<a href=\"index.php?cmr_mode=install_all\" ><span class=\"blink\">" .  $cmr->translate("install again") . "</span></a> ") .  $cmr->translate(" or ") . " <a href=\"index.php?cmr_mode=login\" ><span class=\"blink\">" .  $cmr->translate("try login") . "</span></a>" . "  </span></li>");
}

if(($good_config)){
    $install_prints .= ("<li><h1>!!! " .  $cmr->translate("config Instalation ok") . "  </h1></li>");
}else{
    $install_prints .= ("<li><span class=\"alert\">!!! " .  $cmr->translate("config Instalation procedure maybe failled !!!? ") . ("<a href=\"index.php?cmr_mode=install_all\" ><span class=\"blink\">" .  $cmr->translate("install again") . "</span></a> ") .  $cmr->translate(" or ") . " <a href=\"index.php?cmr_mode=login\" ><span class=\"blink\">" .  $cmr->translate("try login") . "</span></a>" . "  </span></li>");
}
$install_prints .= ("</ul></fieldset>");
/*=================================================================*/
/*=================================================================*/
$cmr->prints["match_install_run"] = $install_prints;
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
$cmr->prints["match_label_now"] = "";
$cmr->prints["match_label_login"] = "";
$cmr->prints["match_value_total"] = "";
$cmr->prints["match_label_db_socket"] = "";
$cmr->prints["match_value_db_socket"] = "";
$cmr->prints["match_value_mail_host"] = "";
$cmr->prints["match_value_mail_port"] = "";
$cmr->prints["match_label_smtp_username"] = "";
$cmr->prints["match_value_mail_username"] = "";
$cmr->prints["match_label_smtp_password"] = "";
$cmr->prints["match_value_mail_password"] = "";
$cmr->prints["match_legend_account"] = "";
$cmr->prints["match_password_for"] = "";
$cmr->prints["match_password_for"] = "";
$cmr->prints["match_password_for"] = "";
$cmr->prints["match_password_for"] = "";
$cmr->prints["match_password_for"] = "";
$cmr->prints["match_value_pw_client"] = "";
$cmr->prints["match_password_for"] = "";
$cmr->prints["match_value_pw_demo"] = "";
$cmr->prints["match_password_for"] = "";
$cmr->prints["match_label_path_www"] = "";
$cmr->prints["match_value_path_www"] = "";
$cmr->prints["match_label_path_session"] = "";
$cmr->prints["match_value_path_session"] = "";
$cmr->prints["match_label_path_images"] = "";
$cmr->prints["match_value_path_images"] = "";
$cmr->prints["match_label_path_gd_font"] = "";
$cmr->prints["match_legend_link"] = "";







$cmr->prints["match_legend_db"] = $cmr->translate("Insert (Database name), (Database user) and (Database password)");
$cmr->prints["match_label_db"] = $cmr->translate("Database already exist?:");
$cmr->prints["match_label_db_name"] = $cmr->translate("Database Name:");
$cmr->prints["match_label_db_user"] = $cmr->translate("Database User:");
$cmr->prints["match_label_db_pw"] = $cmr->translate("Database Password:");
$cmr->prints["match_label_db_soket"] = $cmr->translate("Database Socket:");
$cmr->prints["match_label_db_type"] = $cmr->translate("Database type: ");
$cmr->prints["match_label_mysql"] = $cmr->translate("mysql");
$cmr->prints["match_label_db_host"] = $cmr->translate("Database Host(IP or name): ");
$cmr->prints["match_label_db_port"] = $cmr->translate("Database port: ");
$cmr->prints["match_label_db_prefix"] = $cmr->translate("Database table prefix: ");
$cmr->prints["match_label_default_table"] = $cmr->translate("Default Database Table: ");

$cmr->prints["match_legend_source"] = $cmr->translate("Or run ");
$cmr->prints["match_link_source"] = $cmr->translate("this sql text");
$cmr->prints["match_label_source"] = $cmr->translate(" with phpmyadmin or another sql tool");
$cmr->prints["match_label_how_to"] = $cmr->translate("how to install tstm");

$cmr->prints["match_legend_smtp"] = $cmr->translate("SMTP Config (use default)");
$cmr->prints["match_label_smtp_server"] = $cmr->translate("SMTP server: ");
$cmr->prints["match_label_smtp_port"] = $cmr->translate("SMTP port: ");
$cmr->prints["match_label_smtp_user"] = $cmr->translate("SMTP Username: ");
$cmr->prints["match_label_smtp_pw"] = $cmr->translate("SMTP Password: ");

$cmr->prints["match_legend_user_account"] = $cmr->translate("To your next login, insert password to use for default application users (to be change [Security]!!)");
$cmr->prints["match_label_pw_user"] = $cmr->translate("Password to use for user :");
$cmr->prints["match_legend_contact"] = $cmr->translate("Contact Config (change to your contact)");
$cmr->prints["match_label_group"] = $cmr->translate("Operator group: ");
$cmr->prints["match_label_email"] = $cmr->translate("Email: ");
$cmr->prints["match_label_user1"] = $cmr->translate("Operator User1: ");
$cmr->prints["match_label_user2"] = $cmr->translate("Operator User2: ");
$cmr->prints["match_label_user3"] = $cmr->translate("Operator User3: ");
$cmr->prints["match_label_user4"] = $cmr->translate("Operator User4: ");
$cmr->prints["match_label_log_user1"] = $cmr->translate("Log User1: ");
$cmr->prints["match_label_log_user2"] = $cmr->translate("Log User2: ");

$cmr->prints["match_legend_company"] = $cmr->translate("Company Config (change to your company)");
$cmr->prints["match_label_project_name"] = $cmr->translate("Company Project Name: ");
$cmr->prints["match_label_portal_name"] = $cmr->translate("Company Portal Name: ");
$cmr->prints["match_label_portal_title"] = $cmr->translate("Company Portal Title: ");
$cmr->prints["match_label_short_name"] = $cmr->translate("Company Short Name: ");
$cmr->prints["match_label_adress"] = $cmr->translate("Company adress: ");
$cmr->prints["match_label_tel"] = $cmr->translate("Company tel: ");
$cmr->prints["match_label_fax"] = $cmr->translate("Company fax: ");
$cmr->prints["match_label_cell"] = $cmr->translate("Company cell: ");
$cmr->prints["match_label_website"] = $cmr->translate("Company website: ");

$cmr->prints["match_legend_path"] = $cmr->translate("Path Config (use default)");
$cmr->prints["match_label_path"] = $cmr->translate("Do not use [\\]!! (for windows use:[/])");
$cmr->prints["match_label_application_url"] = $cmr->translate("Application Url: ");

$cmr->prints["match_label_path_main"] = $cmr->translate("Application Main path: ");
$cmr->prints["match_label_path_home"] = $cmr->translate("Home path: ");
$cmr->prints["match_label_path_mod"] = $cmr->translate("Modules Files path: ");
$cmr->prints["match_label_path_templ"] = $cmr->translate("Templates Files path: ");
$cmr->prints["match_label_path_func"] = $cmr->translate("Functions path: ");
$cmr->prints["match_label_path_class"] = $cmr->translate("Class path: ");
$cmr->prints["match_label_path_conf"] = $cmr->translate("Configuration files path: ");
$cmr->prints["match_label_path_lang"] = $cmr->translate("Language Files path: ");
$cmr->prints["match_label_path_img"] = $cmr->translate("Images path: ");
$cmr->prints["match_label_path_db"] = $cmr->translate("Internal Database Files path: ");
$cmr->prints["match_label_path_get_data"] = $cmr->translate("Get data Files path: ");
$cmr->prints["match_label_path_notify"] = $cmr->translate("Notify path: ");
$cmr->prints["match_label_path_log"] = $cmr->translate("Logs path: ");
$cmr->prints["match_label_path_model"] = $cmr->translate("Models Files path: ");
$cmr->prints["match_label_path_help"] = $cmr->translate("Helps Files path: ");
$cmr->prints["match_label_path_theme"] = $cmr->translate("Themes Files path: ");
$cmr->prints["match_label_path_tab"] = $cmr->translate("Tab path: ");

$cmr->prints["match_label_path_tmp"] = $cmr->translate("Font path: ");
$cmr->prints["match_label_path_font"] = $cmr->translate("gd font path: ");
$cmr->prints["match_label_path_temp"] = $cmr->translate("Temp path: ");
$cmr->prints["match_label_path_sess"] = $cmr->translate("Session path: ");

$cmr->prints["match_legend_other_config"] = $cmr->translate("Other Config (use default)");
$cmr->prints["match_label_language"] = $cmr->translate("Language:");
$cmr->prints["match_label_default"] = $cmr->translate("default");
$cmr->prints["match_label_theme"] = $cmr->translate("Themes :");
$cmr->prints["match_label_config_file"] = $cmr->translate("Config Files:");







$cmr->prints["match_value_config_file"] = $cmr->config["cmr_main_config"];
$cmr->prints["match_value_db"] = $cmr->translate("Database already exist?:");
$cmr->prints["match_value_db_name"] = $db_name;
$cmr->prints["match_value_db_user"] = $db_user;
//$cmr->prints["match_value_db_pw"] = $db_pw;
$cmr->prints["match_value_db_soket"] = $db_socket;
$cmr->prints["match_value_db_type"] = $db_type;

$cmr->prints["match_value_db_host"] = $db_host;
$cmr->prints["match_value_db_port"] = $db_port;
//$cmr->prints["match_value_db_prefix"] = $db_prefix;
//$cmr->prints["match_value_default_table"] = $db_default_table;

$cmr->prints["match_value_source"] = $cmr->translate(" with phpmyadmin or another sql tool");
$cmr->prints["match_value_how_to"] = $cmr->translate("how to install tstm");

$cmr->prints["match_value_smtp_server"] = $cmr_mail_host;
$cmr->prints["match_value_smtp_port"] = $cmr_mail_port;
$cmr->prints["match_value_smtp_username"] = $cmr_mail_username;
$cmr->prints["match_value_smtp_password"] = $cmr_mail_password;

$cmr->prints["match_value_pw_user"] = $cmr->translate("Password to use for user :");
$cmr->prints["match_value_group"] = $cmr->translate("Operator group: ");
$cmr->prints["match_value_email"] = $cmr->translate("Email: ");
$cmr->prints["match_value_pw_developer"] = $cmr_pw_developer;
$cmr->prints["match_value_pw_admin"] = $cmr_pw_admin;
$cmr->prints["match_value_pw_operator"] = $cmr_pw_operator;
$cmr->prints["match_value_pw_tecnician"] = $cmr_pw_tecnician;
$cmr->prints["match_value_pw_user"] = $cmr_pw_user;
$cmr->prints["match_value_pw_guest"] = $cmr_pw_guest;

$cmr->prints["match_value_log_user1"] = $cmr->translate("Log User1: ");
$cmr->prints["match_value_log_user2"] = $cmr->translate("Log User2: ");

$cmr->prints["match_value_project_name"] = $cmr->translate("Company Project Name: ");
$cmr->prints["match_value_portal_name"] = $cmr->translate("Company Portal Name: ");
$cmr->prints["match_value_portal_title"] = $cmr->translate("Company Portal Title: ");
$cmr->prints["match_value_short_name"] = $cmr->translate("Company Short Name: ");
$cmr->prints["match_value_adress"] = $cmr->translate("Company adress: ");
$cmr->prints["match_value_tel"] = $cmr->translate("Company tel: ");
$cmr->prints["match_value_fax"] = $cmr->translate("Company fax: ");
$cmr->prints["match_value_cell"] = $cmr->translate("Company cell: ");
$cmr->prints["match_value_website"] = $cmr->translate("Company website: ");

$cmr->prints["match_value_path"] = $cmr->translate("Do not use [\\]!! (for windows use:[/])");
$cmr->prints["match_value_application_url"] = $cmr_www_path;

$cmr->prints["match_value_path_main"] = $cmr_path;
$cmr->prints["match_value_path_home"] = $cmr_home_path;
$cmr->prints["match_value_path_mod"] = $class_modules_path;
$cmr->prints["match_value_path_templ"] = $cmr_template_path;
$cmr->prints["match_value_path_func"] = $cmr_func_path;
$cmr->prints["match_value_path_class"] = $cmr_class_path;
$cmr->prints["match_value_path_conf"] = $cmr_conf_path;
$cmr->prints["match_value_path_lang"] = $cmr_lang_path;
$cmr->prints["match_value_path_img"] = $cmr_images_path;
$cmr->prints["match_value_path_db"] = $cmr_db_path;
$cmr->prints["match_value_path_get_data"] = $cmr_get_data_path;
$cmr->prints["match_value_path_notify"] = $cmr_notify_path;
$cmr->prints["match_value_path_log"] = $cmr_log_path;
$cmr->prints["match_value_path_model"] = $cmr_model_path;
$cmr->prints["match_value_path_help"] = $cmr_help_path;
$cmr->prints["match_value_path_theme"] = $cmr_themes_path;
$cmr->prints["match_value_path_tab"] = $cmr_tab_path;

$cmr->prints["match_value_path_font"] = $cmr_font_path;
$cmr->prints["match_value_path_gd_font"] = $cmr_gd_font_path;
$cmr->prints["match_value_path_temp"] = $cmr_temp_path;
$cmr->prints["match_value_path_sess"] = $cmr_session_path;

// $cmr->prints["match_value_language"] = $cmr->translate("Language:");
// $cmr->prints["match_value_default"] = $cmr->translate("default");
// $cmr->prints["match_value_theme"] = $cmr->translate("Themes :");
// $cmr->prints["match_value_config_file"] = $cmr->translate("Config Files:");

$cmr->prints["match_legend_restart"] = $cmr->translate(" To restart the instalation procedure.");
$cmr->prints["match_label_click_here"] = $cmr->translate("click here");
$cmr->prints["match_label_restart"] = $cmr->translate(" To restart the instalation procedure.");
$cmr->prints["match_label_thanks"] = $cmr->translate("Thanks.");

$cmr->prints["match_legend_end_install"] = $cmr->translate("End Inttall.");
$cmr->prints["match_label_end_install"] = $cmr->translate("End install.");
$cmr->prints["match_legend_run"] = $cmr->translate("Run	.");
$cmr->prints["match_link_click_here"] = $cmr->translate("Clisk here .");

$cmr->prints["match_label_or"] = $cmr->translate("Or ");
$cmr->prints["match_label_affected_rown"] = ($total);



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_link_login"] ="<a href=\"index.php?cmr_mode=login&force_login=yes\" ><big>" . $cmr->translate("Login") . "</big></a>";
$cmr->prints["match_link_logout"] ="<a href=\"index.php?cmr_mode=logout\" ><big>" . $cmr->translate("logout") . "</big></a>";

if(($cmr->get_conf("cmr_allow_forget_account")))
$cmr->prints["match_link_forget_account"] = "<a href=\"index.php?cmr_mode=forget_account\" ><big>" . $cmr->translate("Forget Account") . "</big></a>";

if(($cmr->get_conf("cmr_allow_inscription")))
$cmr->prints["match_link_inscription"] = "<a href=\"index.php?cmr_mode=inscription\" ><big>" . $cmr->translate("New account") . "</big></a>";

if(($cmr->get_conf("cmr_allow_validation")))
$cmr->prints["match_link_validation"] = "<a href=\"index.php?cmr_mode=validation\" ><big>" . $cmr->translate("Account Validation") . "</big></a>";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template2", $template_install_end);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "footer";
$mod->rown_position = "foot";
$mod->col_position = "1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($template_install_end, "match_include1")) include($cmr->get_path("module") . "modules/guest/page_footer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template3", $template_install_end);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
