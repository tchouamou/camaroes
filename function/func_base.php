<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_base.php
 *   ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























func_base.php,Ver 3.0  2011-July 10:36:59
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*=================================================================*/
if(!(function_exists("get_db_drivers"))){
function get_db_drivers($cmr_config = array())
{
$dir = @opendir($cmr_config["cmr_func_path"] . "adodb/drivers/");
$array_driver = array();
while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..")){
       $array_driver[] = str_replace("adodb-", "", str_replace(".inc.php", "", $file));
    }
}
return $array_driver;
}
}
/*=================================================================*/
if(!(function_exists("get_modules_list"))){
function get_modules_list($cmr_config = array())
{
	$array_value = array();
	$dir = @opendir($cmr_config["cmr_path"] . "modules/");
	while ($file = readdir($dir)){
	if(($file != ".") && ($file != "..") && (is_file($cmr_config["cmr_path"] . "modules/" . $file))){
    $array_value[1][] = substr($file, 0, 28);
    $array_value[2][] = substr($file, 0, 28);
	}
	}
return $array_value;
}
}
/*=================================================================*/
if(!(function_exists("get_page_list"))){
function get_page_list($cmr_config = array())
{
	$array_value = array();
    $dir = @opendir($cmr_config["cmr_path"] . "page");
    while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..")){
    $array_value[1][] = trim($file);
    $array_value[2][] = trim($file);
	}
	}
return $array_value;
}
}
/*=================================================================*/
if(!(function_exists("get_languages_list"))){
function get_languages_list($cmr_config = array())
{
	$array_value = array();
    $dir = opendir($cmr_config["cmr_path"] . "languages");
    while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..") && (is_dir($cmr_config["cmr_path"] . "languages/" . $file))){
    $array_value[1][] = trim($file);
    $array_value[2][] = trim($file);
	}
	}
return $array_value;
}
}
/*=================================================================*/
if(!(function_exists("get_themes_list"))){
function get_themes_list($cmr_config = array())
{
	$array_value = array();
    $dir = @opendir($cmr_config["cmr_path"] . "themes");
    while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..")&& (is_dir($cmr_config["cmr_path"] . "themes/" . $file))){
    $array_value[1][] = trim($file);
    $array_value[2][] = cmr_translate($file);
	}
	}
return $array_value;
}
}
/*=================================================================*/
if(!(function_exists("create_account_folder"))){
function create_account_folder($cmr_config = array(), $mode, $name)
{
$cmr_config["cmr_max_num_files"]=1000;
if(file_exists($cmr_config["cmr_home_path"] . "home/groups/default/")){
	if($mode == "group"){
	    return cmr_dir_copy($cmr_config["cmr_home_path"] . "home/groups/default/", $cmr_config["cmr_home_path"] . "home/groups/" . $name);
		}
	    return cmr_dir_copy($cmr_config["cmr_home_path"] . "home/users/default/", $cmr_config["cmr_home_path"] . "home/users/" . $name);

	}
    //----------------------------
    if(!file_exists($cmr_config["cmr_path"] . "home/")){
        mkdir($cmr_config["cmr_path"] . "home/");
    }
    if(!file_exists($cmr_config["cmr_path"] . "home/groups/")){
        mkdir($cmr_config["cmr_path"] . "home/groups/");
    }
    if(!file_exists($cmr_config["cmr_path"] . "home/users/")){
        mkdir($cmr_config["cmr_path"] . "home/users/");
    }
    //----------------------------
	if($mode == "group"){
	    if(!file_exists($cmr_config["cmr_path"] . "home/groups/" . $name)){
	        mkdir($cmr_config["cmr_path"] . "home/groups/" . $name);
	    }
		}else{
	    if(!file_exists($cmr_config["cmr_path"] . "home/users/" . $name)){
	        mkdir($cmr_config["cmr_path"] . "home/users/" . $name);
	    }
	}
    //----------------------------
	if($mode == "group"){
	        return ($cmr_config["cmr_path"] . "home/groups/" . $name);
		}else{
	        return ($cmr_config["cmr_path"] . "home/users/" . $name);
	}

return ($cmr_config["cmr_path"] . "home/groups/" . $name);
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * save_config()
 *
 * @param mixed $conn
 * @param string $type
 * @param string $group
 * @return
 **/
if(!(function_exists("save_config"))){
function save_config($cmr_config = array(), $cmr_page = array(), $cmr_user = array(), $conn, $type = "user", $group = "")
{
    $text_f = "\n\n";

    if(empty($type)) $type = $type = "user";

    if(empty($group)) $group = $cmr_user["auth_group"];

    if(!file_exists($cmr_config["cmr_path"] . "home/groups/" . $cmr_user["auth_group"])){
        create_account_folder($cmr_config, "group", $cmr_user["auth_group"]);
    }
    if(!file_exists($cmr_config["cmr_path"] . "home/users/" . $cmr_user["auth_uid"])){
        create_account_folder($cmr_config, "user", $cmr_user["auth_uid"]);
    }

    foreach ($cmr_page as $key => $elem){
        if("layer" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("refresh" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("style" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("auth_theme" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("page_title" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("language" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("template" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("list_module" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("not_list_module" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("current_tab" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("bgcolor" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
        if("background" == $key) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }

    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^head[1-9]+", $key)) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }

    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^left[1-9]+", $key)) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }

    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^middle[1-9]+", $key))  $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }
    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^right[1-9]+", $key)) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }

    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^foot[1-9]+", $key)) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }

    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^t_.+", $key)) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }

    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^tab_.+", $key)) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }

    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^menu_left[1-9]+", $key)) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }

    $text_f .= "\n\n";
    foreach ($cmr_page as $key => $elem){
        if(cmr_search("^menu_tree", $key)) $text_f .= "\$cmr_array[\"" . $key . "\"]=\"" . $elem . "\";\n";
    }
    $text_f .= "\n\n";

    $text_f .= "\n\n";
    // $text_f.="\$cmr_array[\"" . $cmr_user["auth_group"]."\"]=\"'" . $cmr_user["auth_group"]."', " . $cmr_user["auth_list_group"]."\";\n";
    $text_f .= "\n\n";
    $text_f .= "\n\n";
    // print($text_f;  die(e_error." <br \>".e_warning." <br \>".e_parse." <br \>".e_notice." <br \>".__function__." <br \>".__file__." <br \>".__line__." <br \>"));
    if($type == "default"){
        $text_f = "<?php \n" . $text_f . "?> \n";
        $fich = fopen($cmr_config["cmr_home_path"] . "home/groups/" . $group . "/" . $cmr_config["cmr_page_filename"], "w");
        fputs($fich, $text_f);
        fclose($fich);
        return 1;
    }
    // ======connesssione al database==============
    // include($cmr_config["cmr_path"] ."connect.php");
    // =============================================
//     $conn->SetFetchMode(ADODB_FETCH_ASSOC);
    if($type == "group"){
        $fich = fopen($cmr_config["cmr_home_path"] . "home/groups/" . $group . "/" . $cmr_config["cmr_page_filename"], "w");
        fputs($fich, $text_f);
        fclose($fich);

//         $sql_result = &$conn->Execute("update " . $cmr_config["cmr_table_prefix"] . "groups set login_script='" . (str_replace("cmr_array", "cmr->page", $text_f)) . "' where name='" . cmr_escape($group) . "'") or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->ErrorMsg());
		$sql_data["severity"] = "";
		$sql_data["valid"] = 1;
		$sql_data["new_field"] = "='" . (str_replace("cmr_array", "cmr->page", $text_f)) . "'";
		$sql_data["new_type"] = "";
		$sql_data["sql_where"] = "='" . cmr_escape($group) . "'";
		$sql_result = sql_run("result", $conn, "update", "", $cmr_config["db_name"], $cmr_config["cmr_table_prefix"] . "groups", "login_script");

        return 1;
    }
    $email = $cmr_user["auth_email"];

    if($type == "user"){
        $fich = fopen($cmr_config["cmr_home_path"] . "home/users/" . $cmr_user["auth_uid"] . "/" . $cmr_config["cmr_page_filename"], "w");
        fputs($fich, $text_f);
        fclose($fich);

//         $sql_result = &$conn->Execute("update " . $cmr_config["cmr_table_prefix"] . "user set login_script='" . (str_replace("cmr_array", "cmr->page", $text_f)) . "' where email='" . cmr_escape($email) . "'") or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->ErrorMsg());
		$sql_data["severity"] = "";
		$sql_data["valid"] = 1;
		$sql_data["new_field"] = "='" . (str_replace("cmr_array", "cmr->page", $text_f)) . "'";
		$sql_data["new_type"] = "";
		$sql_data["sql_where"] = "='" . cmr_escape($email) . "'";
		$sql_result = sql_run("result", $conn, "update", "", $cmr_config["db_name"], $cmr_config["cmr_table_prefix"] . "user", "email");

   }
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * run_code()
 *
 * @param string $code
 * @param string $conn
 * @return
 **/
if(!(function_exists("run_code"))){
function run_code($code = "", $conn = "", $hostname = "localhost", $username = "root", $password = "", $database = "camaroes_db", $prefix = "cmr_", $user = "guest", $group = "guest")
{
// // =====================test code========================
// $cmr_hostname = $cmr->get_conf("db_host");
// $cmr_database = $cmr->get_conf("db_name");
// $cmr_username = $cmr->get_conf("db_user");
// $cmr_password = $cmr->get_conf("db_pw");
// $cmr_user = $cmr->get_user("auth_email");
// $cmr_group = $cmr->get_user("auth_group");
// $cmr_prefix = $cmr->get_conf("cmr_table_prefix");
//
// $array_code[] = "{{date_time}}";
// $array_code[] = "{{date}}";
// $array_code[] = "{{time}}";
// $array_code[] = "{{my_ip}}";
// $array_code[] = "{{user_email}}";
// $array_code[] = "{{user_name}}";
// $array_code[] = "{{user_last_name}}";
// $array_code[] = "{{user_lang}}";
// $array_code[] = "{{user_comment}}";
// $array_code[] = "{{user_tel}}";
// $array_code[] = "{{user_cel}}";
// $array_code[] = "{{user_function}}";
// $array_code[] = "{{user_location}}";
// $array_code[] = "{{user_email_sign}}";
// $array_code[] = "{{groups_name}}";
// $array_code[] = "{{groups_email_sign}}";
// $array_code[] = "{{ticket_number}}";
// $array_code[] = "{{ticket_title}}";
// $array_code[] = "{{ticket_text}}";
// $array_code[] = "{{ticket_assign_to}}";
// $array_code[] = "{{ticket_severity}}";
// $array_code[] = "{{ticket_state}}";
// $array_code[] = "{{ticket_type}}";
// $array_code[] = "{{ticket_list_user_inpact}}";
// $array_code[] = "{{ticket_list_group_inpact}}";
// $array_code[] = "{{ticket_list_asset_inpact}}";
// $array_code[] = "{{ticket_sla}}";
// $array_code[] = "{{ticket_lang}}";
// $array_code[] = "{{ticket_call_log_group}}";
// $array_code[] = "{{ticket_comment}}";
// $array_code[] = "{{ticket_call_log_user}}";
// $array_code[] = "{{ticket_mail_from}}";
// $array_code[] = "{{ticket_mail_to}}";
// $array_code[] = "{{ticket_mail_cc}}";
// $array_code[] = "{{ticket_mail_bcc}}";
// $array_code[] = "{{ticket_list_user_impact}}";
// $array_code[] = "{{ticket_list_group_impact}}";
// $array_code[] = "{{ticket_list_asset_impact}}";
// $array_code[] = "{{ticket_assign_to}}";
// $array_code[] = "{{ticket_attach1}}";
// $array_code[] = "{{ticket_attach2}}";
// $array_code[] = "{{ticket_attach3}}";
// $array_code[] = "{{ticket_attach4}}";
// $array_code[] = "{{ticket_attach}}";
// $array_code[] = "{{url_page_description}}";
// foreach($array_code as $key => $value){
// $test_code = run_code($value, 0, $cmr_hostname, $cmr_username, $cmr_password, $cmr_database, $cmr_prefix, $cmr_user, $cmr_group);
// print("\$test_code=$value, \$value=$test_code;<br />");
// }
// // =============================================

    if(empty($code)){
        return $code;
    }else{

		$sql_data["valid"] = 1;
		$sql_data["order"] = "";
		$sql_data["host"] = $hostname;
		$sql_data["user"] = $username;
		$sql_data["pw"] = $password;
		$sql_data["sql_where"] = "code='" . ($code) . "'";
		$obj_code = sql_run("array_assoc", $conn, "select", "", $database, $prefix . "code", "script", $sql_data);


        if($obj_code){
            // =======================================
            $eval_result = "";
            eval($obj_code[0]["script"]);
            if(!empty($eval_result)) return $eval_result;
            // =======================================
        }
// ================================================
// ================================================
// ================================================
//       empty($eval_result){
      if(cmr_search("^{{my_", $code)){
	      $param = substr($code, 5);
	      $param = substr($param, 0,-2);
		  $sql_data["sql_where"] = "email='" . trim($user) . "'";
		  $valuser = sql_run("array_assoc", $conn, "select", "", $database, $prefix . "user", "*", $sql_data);
	      if(!cmr_searchi("^db_|^php_|_pw|password|_user_name|_uid|^imap_|^pop3_|^nntp_|certificate|_port|_code",$param))
          return $valuser[0][$param];
//         } elseif(cmr_search("^{{user_", $code)){
// 	      $param = substr($code, 7);
// 	      $param = substr($param, 0,-2);
// 		  $sql_data["sql_where"] = "email='" . trim($user) . "'";
// 		  $valuser = sql_run("array_assoc", $conn, "select", "", $database, $prefix . "user", "*", $sql_data);
//        return $valuser[$param];
        } elseif(cmr_search("^{{groups_", $code)){
	      $param = substr($code, 9);
	      $param = substr($param, 0,-2);
		  $sql_data["sql_where"] = "name='" . trim($group) . "'";
		  $valgroup = sql_run("array_assoc", $conn, "select", "", $database, $prefix . "groups", "*", $sql_data);
          return $valgroup[0][$param];
        } elseif(cmr_search("^{{user_", $code)){
	      $param = substr($code, 7);
	      $param = substr($param, 0,-2);
	      if(!cmr_searchi("^db_|^php_|_pw|password|_user_name|_uid|^imap_|^pop3_|^nntp_|certificate|_port|_code",$param))
            return cmr_get_user($param);
        } elseif(cmr_search("^{{groups_", $code)){
	      $param = substr($code, 9);
	      $param = substr($param, 0,-2);
	      if(!cmr_searchi("^db_|^php_|_pw|password|_user_name|_uid|^imap_|^pop3_|^nntp_|certificate|_port|_code",$param))
            return cmr_get_group($param);
        } elseif(cmr_search("^{{conf_", $code)){
	      $param = substr($code, 7);
	      $param = substr($param, 0,-2);
	      if(!cmr_searchi("^db_|^php_|_pw|password|_user_name|_uid|^imap_|^pop3_|^nntp_|certificate|_port|_code",$param))
            return cmr_get_config($param);
        } elseif(cmr_search("^{{lang_", $code)){
	      $param = substr($code, 7);
	      $param = substr($param, 0,-2);
	      return cmr_translate($param, "english", cmr_get_page("language"), cmr_get_language());
        } elseif(cmr_search("^{{sess_", $code)){
	      $param = substr($code, 7);
	      $param = substr($param, 0,-2);
            return cmr_get_session($param);
        } elseif(cmr_search("^{{glob_", $code)){
	      $param = substr($code, 7);
	      $param = substr($param, 0,-2);
	      if(!cmr_searchi("^db_|^php_|_pw|password|_user_name|_uid|^imap_|^pop3_|^nntp_|certificate|_port|_code",$param))
            return $GLOBALS[$param];
        } elseif(cmr_search("^{{mod_", $code)){
	      $param = substr($code, 6);
	      $param = substr($param, 0,-2);
//             include($param);
            return $code;
        } elseif(cmr_search("^{{link_", $code)){
	      $param = substr($code, 7);
	      $param = substr($param, 0,-2);
// 	      			$link=file_get_contents($param);
//             		return $link;
        }
        // elseif(cmr_search("^{{session_", $code)){return "";}
        elseif(cmr_search("^{{get_", $code)){
	      $param = substr($code, 6);
	      $param = substr($param, 0,-2);
            return get_post($param);
        } elseif(cmr_search("^{{ticket_", $code)){
	      $param = substr($code, 9);
	      $param = substr($param, 0,-2);
            return get_post($param);
        }else{
            switch ($code){
                case "{{who_is_source}}":
// 	      			$param=file_get_contents("http://ripe.net/".get_post("title");
//             		return $param;
                break;
                case "{{who_is_dest}}":
// 	      			$param=file_get_contents("http://ripe.net/".get_post("title");
//             		return $param;
                break;
                case "{{iss_event_download}}":
// 	      			$param=file_get_contents("http://iss.net/".get_post("title");
//             		return $param;
                break;
                default:
                    return $code;
                break;
            }
        }
            // =======================================
    }
    return $code;
}
}
/*=================================================================*/
function add_option($option = "", $value = "", $text = "", $selected = "")
    {
   return "<option value=\"" . $value . "\" " . $selected . ">" . $text . "</option>";
    }
/*=================================================================*/
function add_line($value = "", $option = "")
    {
   return "<tr " . $option . ">" . $value . "</tr>";
    }
/*=================================================================*/
function add_cell($value = "", $option = "")
    {
   return "<td " . $option . ">" . $value . "</td>";
    }
/*=================================================================*/
function add_list($value = "", $option = "")
    {
   return "<li " . $option . ">" . $value . "</li>";
    }
/*=================================================================*/
/*=================================================================*/
/**
 * show_hide()
 *
 * @param mixed $the_name
 * @param mixed $the_title
 * @param mixed $action
 * @return $value
 **/
if(!(function_exists("show_hide"))){
function show_hide($the_name="_", $action="begin", $columns=0)
{
$value = "";

if($action == "begin"){

if(!empty($columns)){
 	$value .= "<tr align=\"left\">";
//  	$value .= "<td align=\"left\">" . $the_name . ":</td>";
 	$value .= "<td colspan=\"" . ($columns) . "\"  align=\"left\">";
}
 	$value .= "<input type=\"button\" value=\"+\" id=\"hide_" . $the_name . "\" onclick=\"show('extra_" . $the_name . "');show('hide_" . $the_name . "');hide('hide_" . $the_name . "');\">";
 	$value .= "<input class=\"hidded\" type=\"button\" value=\"-\" id=\"show_" . $the_name . "\" onclick=\"hide('extra_" . $the_name . "');show('hide_" . $the_name . "');hide('show_" . $the_name . "');\">";

// $value .= "<div id=\"hide_" . $the_name . "\"><a onclick=\"show('extra_" . $the_name . "');hide('hide_" . $the_name . "');show('show_" . $the_name . "');\">+</a></div>";
// $value .= "<div id=\"show_" . $the_name . "\" style=\"visibility:hidden; display:none\">";
// $value .= "<a onclick=\"hide('extra_" . $the_name . "');hide('show_" . $the_name . "');show('hide_" . $the_name . "');\">";
// $value .= "-</a>";
// $value .= "</div>";
if($columns) $value .= "</td>";
//  	$value .= "</tr>";


//  	$value .= "<tr align=\"left\">";
if($columns) $value .= "<td align=\"left\" colspan=\"" . $columns . "\">";

 	$value .= "<div id=\"extra_" . $the_name . "\" style=\"visibility:hidden; display:none\">";
 	$value .= "<table class=\"normal_text\" border=\"1\" align=\"left\">";
 	$value .= "<tr>";
 	$value .= "<td align=\"left\">";
}else{
 	$value = "</td>";
 	$value .= "</tr>";
 	$value .= "</table>";
 	$value .= "</div>";
 	$value .= "<br />";

if(!empty($columns)){
 	$value .= "</td>";
 	$value .= "</tr>";
}
}
 return $value;
}
}
/*=================================================================*/
/*=================================================================*/

/**
 * cmrprint_select()
 *
 * @param mixed $the_file
 * @return
 **/
if(!(function_exists("cmr_print_select"))){
function cmrprint_select($cmr_string, $name="select1", $multiple="")
{
$select = "";
if(!empty($cmr_string)&&($name!="func_id")&&($name!="func_date_time")){
 $partition = explode(",", $cmr_string);
 $select = "<span onclick=\"show('id_func_" . $name  . "')\">";
 $select .= "<select class=\"hidded\" name=\"" . $name . "\" id=\"id_func_" . $name . "\" " . $multiple . " >";
 $select .= "<option value=\"\"></option>";

	 foreach($partition as $key => $value){
	 $select .= "<option value=\"".trim($value)."\">".trim($value)."</option>";
	 }
 $select .= "</select></span>";
//  $select .= "<a href=\"javascript:popUp(\"ajax.php?action=add_text&select_ id=id_func_" . $name . "\",500,400,false,false,true,false);\" title=\"More\" id=\"button_" . $name . "\" target=\"camaroes\" ondblclick=\"zoom_id('id_func_" . $name . "');\" >+</a>";
 }
 return $select;
}
}
/*=================================================================*/
/*=================================================================*/

/**
 * cmr_view_header()
 *
 * @param mixed $get_column
 * @param mixed $module_column
 * @return
 **/
if(!(function_exists("cmr_view_header"))){
function cmr_view_header($get_column = "", $module_column = "", $page_mode = "")
{

// 	if($page_mode == "link_print") return "<td> </td>";

	$return_val = "";
	$return_val .= "<td onclick=\"show('" . $module_column . "')\" class=\"rown2\" align=\"center\">";
	$return_val .= "<input ";
	if(strlen($get_column) == 0)  $return_val .= "class=\"hidded\" ";
	$return_val .= " type=\"text\" size=\"8\" ";
	$return_val .= " name=\"" . $module_column . "\" ";
	$return_val .= " id=\"" . $module_column . "\" ";
	$return_val .= " value=\"" . $get_column . "\" ";
	$return_val .= " /></td>";
 return $return_val;
}
}

/*=================================================================*/
/*=================================================================*/

/**
 * cmr_view_header()
 *
 * @param mixed $get_column
 * @param mixed $module_column
 * @return
 **/
if(!(function_exists("cmr_view_header_links"))){
function cmr_view_header_links($module_link = "", $module_column = "")
{
	$return_val = "";
	$return_val .= "<td class=\"rown3\">";
	$return_val .= $module_link;
	$return_val .= $module_column;
	$return_val .= "</td>";
 return $return_val;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("search_func_column"))){
        function search_func_column($function = "=", $column = "")
        {
// cmr_search_operator=EXACT, LIKE,LIKE %...%,NOT LIKE,=,!=,REGEXP,NOT REGEXP,IN,NOT IN,IS NULL,IS NOT NULL
		switch(strtolower(trim($function))){
			case "exact":
			case "=":
				return " =" . sprintf("%s" , ($column));
			break;
			case "!=":
				return " !=" . sprintf("%s" , ($column));
			break;
			case "like":
				return " LIKE ('%" . sprintf("%s" , ($column)) . "%')";
			break;
			case "one_word":
				return " LIKE ('%" . sprintf("%s" , (str_replace(" ", "%", $column))) . "%')";
			break;
			case "all_word":
				return " LIKE ('%" . sprintf("%s" , (str_replace(" ", "%", $column))) . "%')";
			break;
			case "regexp":
				return " REGEXP ('" . sprintf("%s" , ($column)) . "')";
			break;
			default:
				return " LIKE ('%" . sprintf("%s" , (str_replace(" ", "%", $column))) . "%')";
			break;
			}
				return " LIKE ('%" . sprintf("%s" , (str_replace(" ", "%", $column))) . "%')";
}
}
/*=================================================================*/
/*=================================================================*/

if(!(function_exists("select_order"))){
    /**
     * select_order()
     *
     * @param array $cmr_language
     * @param array $array_value1
     * @param array $array_value2
     * @param string $translate
     * @return
     **/
    function select_order($cmr_language = array(), $array_value1 = array(),  $array_value2 = array(), $translate = "", $width = "100")
    {
	$str_value = "";
	$array_key = array();
	$alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

	    if(!empty($cmr_language["cmr_alphabet"])) $alphabet = explode(",", $cmr_language["cmr_alphabet"]);

	    foreach($alphabet as $caracter){

		    $count = 0;

		if(!empty($array_value2)){
			reset($array_value2);
		    foreach($array_value2 as $key => $value){
		    if(cmr_searchi("^" . $caracter, $value)){
		    if($count == 0){
			    $count++;
			    $str_value .= "<optgroup label=\"- " . strtoupper($caracter) . " -\">";
			    }

			 if($translate){
				 $str_value .= "<option value=\"" . $array_value1[$key] . "\">" .  substr(cmr_translate($value, "english", cmr_get_page("language")), 0, $width) . "</option>";
			 }else{
				 $str_value .= "<option value=\"" . $array_value1[$key] . "\">" . substr($value, 0, $width) . "</option>";
				 }


			$array_key[$key] = 1;
		    }else{
			if(empty($array_key[$key])) $array_key[$key]=0;
			    }
	 		}
	 	 }
		    if($count > 0) $str_value .= "</optgroup>";
	    }



		    if(in_array(0, $array_key)){
			if(in_array(1, $array_key)) $str_value .= "<optgroup label=\"- " .  cmr_translate("others", "english", cmr_get_page("language")) . " -\">";

			foreach($array_key as $key => $value){
			if($value==0){
			 if($translate){
				 $str_value .= "<option value=\"" . $array_value1[$key] . "\">" .  substr(cmr_translate($array_value2[$key], "english", cmr_get_page("language")), 0, $width) . "</option>";
			 }else{
				 $str_value .= "<option value=\"" . $array_value1[$key] . "\">" . substr($array_value2[$key], 0, $width) . "</option>";
				 }
			 }
			}


			if(in_array(1, $array_key)) $str_value .= "</optgroup>";
			}




        return $str_value;
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("show_column"))){
    /**
     * show_column_value()
     *
     * @param string $table
     * @param string $text
     * @return
     **/
    function show_column_value($column = "cmr_user.date_time", $text = "", $line_id = "")
    {
		    $cmr_config = array();
		    $cmr_page = array();
		    $cmr_language = array();
		    $to_return = $text;

	    switch(strtolower($column)){
		    case "id":
		    case "pwd":
		    case "passwd":
		    case "password":
		    $to_return = "***";
		    break;

		    case "email":
		    case "allow_email":
		    case "user_email":
		    case "mail_from":
		    case "mail_to":
		    case "mail_cc":
		    case "mail_bcc":
        	$to_return = list_user_link(cmr_get_config(), cmr_get_page(), cmr_get_language(), $text);
		    break;

		    case "file":
        	$to_return = list_file_link(cmr_get_config(), cmr_get_page(), cmr_get_language(), $text);
		    break;

		    case "group":
		    case "groups":
		    case "group_name":
		    case "allow_groups":
        	$to_return = list_group_link(cmr_get_config(), cmr_get_page(), cmr_get_language(), $text);
		    break;

		    case "attach":
		    case "attachment":
		    case "allegato":
        	$to_return = list_attach_link(cmr_get_config(), cmr_get_page(), cmr_get_language(), $text);
		    break;

		    case "date_time":
		    case "date":
		    case "time":
		    case "timestamp":
        	$to_return = date_link(cmr_get_config(), cmr_get_page(), cmr_get_language(), $text);
		    break;

		    case "allow_type":
        	$to_return = list_type_link(cmr_get_config(), cmr_get_page(), cmr_get_language(), $text);
		    break;

		    case "comment":
        	$to_return = "<pre>" . $text . "</pre>";
        	$to_return .= "<p align=\"center\">";
        	$to_return .= "<form action=\"index.php\" method=\"post\" >";
        	$to_return .= input_hidden("<input type=\"hidden\" name=\"cmr_get_data\" value=\"get_data/get_comment.php\" />");
        	$to_return .= input_hidden("<input type=\"hidden\" name=\"line_id\" value=\"" . $line_id . "\" />");
        	$to_return .= input_hidden("<input type=\"hidden\" name=\"table_name\" value=\"" . cmr_get_action("table_name") . "\" />");
        	$to_return .= "<br /><input type=\"file\" name=\"attach1\"  id=\"attach1\" /><br />";
        	$to_return .= "<textarea name=\"text\"  rows=\"2\" cols=\"50\"></textarea>";
        	$to_return .= "<br /> <input type=\"submit\" value=\"" . cmr_translate("add comment") . "\" />";
        	$to_return .= "</form></p>";
		    break;


		    case "image":
		    case "picture":
		    case "photo":
		    $to_return = $text . "<br /><img class=\"cmr_image\" src=\"" . $text . "\" /><br />";
		    break;

		    case "certificate":
		    case "my_md5":
		    case "my_master":
		    case "my_slave":
		    $to_return = $text;
		    break;

		    default:
		    $to_return = htmlentities($text);
		    break;
		    }
        return $to_return;
        /*=================================================================*/
    }
}
/*=================================================================*/
/*=================================================================*/
/**
 * extend_textarea()
 *
 * @param text $mail_text
 * @return
 **/
if(!(function_exists("extend_textarea"))){
function extend_textarea($mail_text, $id_text, $cmr_language = array())
{
// <!--input type="button" value="<_php print($cmr_language["print"]);
// ?_>" onclick="print_val('mail_text')" />
// &nbsp;&nbsp;&nbsp;&nbsp;
// <b><_php print($cmr_language["mail_text"]);
// ?_></b>
// <select name="text_area_type" id="extend_id" onchange="show_extend('extend_id' , 'email_zone', 'html_zone');" >
// <option value="normal" ><_php print($cmr_language["normal"]);
// ?_></option>
// <option value="extend" ><_php print($cmr_language["extend"]);
// ?_></option>
// </select>
// <!--?php
// //==============================================================
// //==============================================================
// //=============== zone=====================================
// //==============================================================
// //==============================================================
// ?-->
// <!--div id="email_zone"  >
// <textarea  name="mail_text" id="mail_text"  rows="25" cols="115">
// <_php print($mail_text);
// ?_>
// </textarea>
// </div>
// <!--?php
// //==============================================================
// //==============================================================
// //===============end  zone=============================
// //==============================================================
// //==============================================================
// ?-->
// <!--?php
// //=============================================================
// //=============================================================
// //===============html  extend zone=============================
// //=============================================================
// //=============================================================
// ?-->
// <!--div id="html_zone" class="hidded" >
// <textarea rows="35" name="html_text" id="html_text" cols="100">
// <_php print($mail_text);
// ?_>
// </textarea>
// </div-->

}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * cmr_get_view_columns()
 *
 * @param
 * @return
 **/
if(!(function_exists("cmr_get_view_columns"))){
function cmr_get_view_columns($cmr_config = array(), $page_columns = "", $table_name = "")
{
$i_col = 1;
$array_column = array();
while ((!empty($cmr_config["column" . $i_col . "_" . $table_name])) && ($i_col <= intval($page_columns))){
	$array_column[$cmr_config["column" . $i_col . "_" . $table_name]] = $cmr_config["column" . $i_col . "_" . $table_name];
	$i_col++;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($array_column) $array_column = array_unique($array_column);
return $array_column;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * cmr_get_view_date_time()
 *
 * @param
 * @return
 **/
if(!(function_exists("cmr_get_view_date_time"))){
function cmr_get_view_date_time($cmr_post_var = array(), $cmr_prints = array(), $date_time_base = "")
{
	empty($cmr_post_var[$date_time_base . "1"]) ? $get_column1 = "" : $get_column1 = $cmr_post_var[$date_time_base . "1"];
	empty($cmr_post_var[$date_time_base . "2"]) ? $get_column2 = "" : $get_column2 = $cmr_post_var[$date_time_base . "2"];
	$cmr_prints["match_date_value1"] = $get_column1;
	$cmr_prints["match_date_value2"] = $get_column2;
	if(strlen($get_column1) == 0) $cmr_prints["match_date_style1"] = "class=\"hidded\" ";
	if(strlen($get_column2) == 0) $cmr_prints["match_date_style2"] = "class=\"hidded\" ";
return $cmr_prints;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
