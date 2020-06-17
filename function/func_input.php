<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        function_loader.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/


/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























function_loader.php,Ver 3.0  2011-Nov-Wed 22:19:05  
*/

// function load_ext($toload)
// function cmr_load_cookie($cmr_config = array())
// function cmr_load_notify($cmr_config, $cmr_user, $subject_templates="", $pattern_templates="")
// function cmr_getput_template($file_tpl, $limit_tpl="", $array_value=array())
// function cmr_load_module_need($cmr_config = array(), $cmr_language = array(), $cmr_page = array(), $cmrmodule = "user.php")
// function cmr_load_help_need($cmr_config = array(), $cmr_help = array(), $cmrmodule = "user.php")
// function cmr_load_conf_need($cmr_config = array(), $cmrmodule = "user.ini")
// function cmr_load_lang_need($cmr_config = array(), $cmr_language = array(), $cmr_page = array(), $cmrmodule = "user.ini")
// function cmr_conf_exist($cmr_conf_file = "config.inc.php")
// function cmr_load_param($cmr_config = array(), $cmr_post_var = array(), $list_param)
// function get_post($arg, $method = "", $pre_match = "")
// function get_pre_match($pre_match)
// function get_post_files($cmr_config = array(), $cmr_post_files = array(), $file_need="")
// function cmr_get_param($arg="")
// function cmr_cli()


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/../control.php"); //to control access in the module
include_once(dirname(__FILE__) . "/func_security.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*=================================================================*/
if(!(function_exists("cmr_get_config"))){
function cmr_get_config($value = "")
{
	if($value) return $GLOBALS["cmr"]->config[$value];
	return $GLOBALS["cmr"]->config;
}
}
 /*=================================================================*/
if(!(function_exists("cmr_get_themes"))){
function cmr_get_themes($value = "")
{
	if($value) return $GLOBALS["cmr"]->themes[$value];
	return $GLOBALS["cmr"]->themes;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_page"))){
function cmr_get_page($value = "")
{
	if($value) return $GLOBALS["cmr"]->page[$value];
	return $GLOBALS["cmr"]->page;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_language"))){
function cmr_get_language($value = "")
{
	if($value) return $GLOBALS["cmr"]->language[$value];
	return $GLOBALS["cmr"]->language;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_help"))){
function cmr_get_help($value = "")
{
	if($value) return $GLOBALS["cmr"]->help[$value];
	return $GLOBALS["cmr"]->help;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_buffer"))){
function cmr_get_buffer($value = "")
{
	if($value) return $GLOBALS["cmr"]->buffer[$value];
	return $GLOBALS["cmr"]->buffer;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_db_connection"))){
function cmr_get_db_connection($value = "")
{
	return $GLOBALS["cmr"]->db_connection;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_db"))){
function cmr_get_db($value = "")
{
	if($value) return $GLOBALS["cmr"]->db[$value];
	return $GLOBALS["cmr"]->db;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_user"))){
function cmr_get_user($value = "")
{
	if($value) return $GLOBALS["cmr"]->user[$value];
	return $GLOBALS["cmr"]->user;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_group"))){
function cmr_get_group($value = "")
{
	if($value) return $GLOBALS["cmr"]->group[$value];
	return $GLOBALS["cmr"]->group;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_report"))){
function cmr_get_report($value = "")
{
	if($value) return $GLOBALS["cmr"]->report[$value];
	return $GLOBALS["cmr"]->report;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_post_files"))){
function cmr_get_post_files($value = "")
{
	if($value) return $GLOBALS["cmr"]->post_files[$value];
	return $GLOBALS["cmr"]->post_files;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_post_var"))){
function cmr_get_post_var($value = "")
{
	if($value) return $GLOBALS["cmr"]->post_var[$value];
	return $GLOBALS["cmr"]->post_var;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_session"))){
function cmr_get_session($value = "")
{
	if($value) return $GLOBALS["cmr"]->session[$value];
	return $GLOBALS["cmr"]->session;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_cookies"))){
function cmr_get_cookies($value = "")
{
	if($value) return $GLOBALS["cmr"]->cookies[$value];
	return $GLOBALS["cmr"]->cookies;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_imap"))){
function cmr_get_imap($value = "")
{
	if($value) return $GLOBALS["cmr"]->imap[$value];
	return $GLOBALS["cmr"]->imap;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_email"))){
function cmr_get_email($value = "")
{
	if($value) return $GLOBALS["cmr"]->email[$value];
	return $GLOBALS["cmr"]->email;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_notify"))){
function cmr_get_notify($value = "")
{
	if($value) return $GLOBALS["cmr"]->notify[$value];
	return $GLOBALS["cmr"]->notify;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_event"))){
function cmr_get_event($value = "")
{
	if($value) return $GLOBALS["cmr"]->event[$value];
	return $GLOBALS["cmr"]->event;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_prints"))){
function cmr_get_prints($value = "")
{
	if($value) return $GLOBALS["cmr"]->prints[$value];
	return $GLOBALS["cmr"]->prints;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_action"))){
function cmr_get_action($value = "")
{
	if($value) return $GLOBALS["cmr"]->action[$value];
	return $GLOBALS["cmr"]->action;
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_module"))){
function cmr_get_module($value = "")
{
	if($value) return $GLOBALS["cmr"]->module[$value];
	return $GLOBALS["cmr"]->module;
}
}
/*=================================================================*/
/*=================================================================*/




/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_set_session"))){
function cmr_set_session($key = "", $value = "")
{
	if($key) return ($GLOBALS["cmr"]->session[$key] = $value);
// 	return ($GLOBALS["cmr"]->session[] = $value);
	return array_push ($GLOBALS["cmr"]->session, $value);
}
}
/*=================================================================*/
if(!(function_exists("cmr_set_post_var"))){
function cmr_set_post_var($key = "", $value = "")
{
	if($key) return ($GLOBALS["cmr"]->post_var[$key] = $value);
	return array_push ($GLOBALS["cmr"]->post_var, $value);
}
}
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/







/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_cli"))){
function cmr_cli()
{
   return (!empty($_SERVER["argc"]) && ($_SERVER["argc"] > 0) && (0));
}
}
 /*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_get_param"))){
function cmr_get_param($arg="")
{

	$param = array();
	//=====
	if(cmr_cli()){
	!empty($arg) or $arg= $_SERVER["argv"];
	$param["PHP_SELF"] = $arg[0];
		$i=0;
		while($i < count($arg)){
		$i++;
		 if(cmr_search("^--", $arg[$i])){
			 $param[cmr_search_replace("^--", "", $arg[$i])] = $arg[$i+1];
			 $i++;
			 } 
		elseif(cmr_search("^-", $arg[$i])){
			 $param[cmr_search_replace("^-", "", $arg[$i])] = $arg[$i+1];
			 $i++;
		 }else{
			 }
		}
	}
	//=====
   return $param;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("get_post_files"))){
function get_post_files($cmr_config = array(), $cmr_post_files = array(), $file_need="")
{
if(!(empty($_FILES))){
	if(!(get_post("MAX_FILE_SIZE"))) return "";
	$filesize = get_post("MAX_FILE_SIZE");
    $cmr_post_files["email_attach"] = array();
	get_post("call_log_group") ? $group_name = strtolower(get_post("call_log_group")) : $group_name = "";
    
	$dir_path = cmr_get_path("index") . "home/";
    if(!file_exists($dir_path)) mkdir($dir_path);
    
	$dir_path = cmr_get_path("index") . "home/groups/";
    if(!file_exists($dir_path)) mkdir($dir_path);
    
	$dir_path = cmr_get_path("index") . "home/users/";
    if(!file_exists($dir_path)) mkdir($dir_path);
    
	$dir_path = cmr_get_path("index") . "home/groups/" . $group_name;
    if(!file_exists($dir_path)) mkdir($dir_path);
    
	$dir_path = cmr_get_path("index") . "home/groups/" . $group_name . "/attach/";
    if(!file_exists($dir_path)) mkdir($dir_path);
    
    if(empty($cmr_post_files["attachment_location"])) $cmr_post_files["attachment_location"] = cmr_get_path("index") . "home/groups/";
	$dir_path = $cmr_post_files["attachment_location"];
    if(!file_exists($dir_path)) mkdir($dir_path);
    
    // ==============================================================
    if(!is_writable($cmr_post_files["attachment_location"])) $cmr_post_files["attachment_location"] = dirname(tempnam ($cmr_post_files["attachment_location"], "cmr_")) . "/";
	if(!is_writable($cmr_post_files["attachment_location"])) $cmr_post_files["attachment_location"] = getenv("TMP")."/";
    // ==============================================================
    // ======= usefull for email attachment =========================
    $cmr_post_files["files_path"] = array();
    $cmr_post_files["files_name"] = array();
    $cmr_post_files["files_type"] = array();
    // ==============================================================
    foreach($_FILES as $key => $val){
        $filename = "";

        if((isset($_FILES[$key]['name']) && ($_FILES[$key]['error'] == UPLOAD_ERR_OK))){
            $filetype = $_FILES[$key]['type'];
            $filename = $_FILES[$key]['name'];
            if(strpos($file_need, $filename)>=0){
                // ====== control if file already exist========
                while (file_exists($cmr_post_files["attachment_location"] . $filename)){
                    $filename = substr($filename, 0, strpos($filename, ".")) . "_" . date("ymdhis") . substr($filename, strpos($filename, "."));
                }
                // ==============================================================
            $cmr_post_files["files_name"][$key] = $filename; //----------
            if(is_uploaded_file($_FILES[$key]['tmp_name'])){
                // ==================wil be use in mail.php ===================
                $f_size = filesize($_FILES[$key]['tmp_name']) + 1;
                $fp = fopen($_FILES[$key]['tmp_name'], 'r');
                // ============================================================
                $cmr_post_files["content"][$key] = chunk_split(base64_encode(fread($fp, $f_size)));
                // ==================save a copy off attachment===================
                if(!(move_uploaded_file($_FILES[$key]['tmp_name'], $cmr_post_files["attachment_location"] . $filename)))
                  $cmr_post_files["attachment_location"] = dirname($_FILES[$key]['tmp_name']);
                // ======= usefull for email attachment =========================
                $cmr_post_files["email_attach"][$key] = realpath($cmr_post_files["attachment_location"] . $filename); //attachment path
                $cmr_post_files["files_path"][$key] = realpath($cmr_post_files["attachment_location"] . $filename);
                $cmr_post_files["files_name"][$key] = $filename;
                $cmr_post_files["files_type"][$key] = $_FILES[$key]['type'];
                // ==============================================================
                fclose($fp);
                // ===============================================================
             }
           }
        }
      }

    (empty($cmr_post_files["files_name"])) ? $cmr_post_files["attachment"] = "" : $cmr_post_files["attachment"] = implode(", ", $cmr_post_files["files_path"]); //--to be insert in the ticket---
}
    return $cmr_post_files;
}
}
 /*=================================================================*/
/*=================================================================*/
if(!(function_exists("get_pre_match"))){
function get_pre_match($pre_match)
{
    // ========================================
	// #@seach.php@:@text(reg_exp,len)base64_decode(@;@//
	// #@seach.php@:@text('.*',1000)??????????????
	// #@new_user.php@:@name@,@reg_exp@,@len@;@email@,@reg_exp@,@len@;@uid@,@reg_exp@,@len@;@pw@,@reg_exp@,@len@;@
	// reg exp (is code base64)
    // ========================================
        $array_pre_match = explode("@#@", $pre_match); //diviso per ogni (form) o (riga)
        if(isset($array_pre_match)){
            foreach($array_pre_match as $var_form){
                $pos = strpos($var_form, "@:@");
                $cmr_frm = substr($var_form, 0, $pos-1);
                $rest_var = substr($var_form, $pos + 1);

                if(($cmr_frm) && (($cmr_frm) == (get_post("class_module")))){
                    $array_var = explode("@;@", $rest_var);

                    if(!empty($var_mactch)) 
                    foreach($array_var as $var_mactch){
                        if($var_mactch == $arg){
                            list($var_name, $match_exp, $var_len) = explode("@,@", $var_mactch);
                            // $match_exp=base64_decode($match_exp);
                            if($var_name){
                                if(!$var_len){
                                    $var_len = 254;
                                }

                                if(!$match_exp){
                                    $match_exp = ".*";
                                }

                                if(preg_match_all($match_exp, get_post($arg), $matches)){ // --recursive--
                                    return $matches[0];
                                    // return html_control(control_magic_quote(control_len($matches[0], $var_len)));
                                }
                            }
                        }
                    }
                }
            }
        }
return $pre_match;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("get_post"))){
function get_post($arg, $method = "", $pre_match = "")
{
    
// ========================================
if($pre_match) $parsed_match = get_pre_match($pre_match);
//======
$return_val = null;
//======
 if(cmr_cli()){
//======
		$serv = $_SERVER["argv"];
		foreach($_SERVER["argv"] as $key => $return_value){
		 if(cmr_search("^--" . $arg, $return_value)) return ($serv[intval($key) +1]);
		 if(cmr_search("^-" . $arg, $return_value)) return ($serv[intval($key) +1]);
		}
		 if($arg == "cmr_sid")  $return_val = session_id();
		 
		 
//     if(version_compare(phpversion(),'4.3.0','<')){
//         define('STDIN',fopen("php://stdin","r"));
//         define('STDOUT',fopen("php://stout","r"));
//         define('STDERR',fopen("php://sterr","r"));
//         register_shutdown_function( create_function( '' , 'fclose(STDIN); fclose(STDOUT); fclose(STDERR); return true;' ) );
//     }
		/* get some STDIlogiN up to 256 bytes */
// 	    $str = fgets(STDIN,256);

// 		$stdout = fopen('php://stdout', 'w');
// 		fwrite($stdout, "\n" . $arg."=?");
// 		fclose($stdout);
		print("\n\n" . $arg."=?");
		$stdin = fopen('php://stdin', 'r');
		$return_val = trim(fgets($stdin));
		fclose($stdin);
		
		print("\n[value=" . $return_val."]");
		
		 $return_val = empty($return_val) ? "admin" : $return_val;
// 		 ($arg != "cod") or $return_val = 2;
// 		 ($arg != "vals") or $return_val = null;
// 		 ($arg != "keys") or $return_val = null;
// 		 ($arg != "conf") or $return_val = null;
	    $return_val = isset($arg) ? $return_val : $_SESSION[$method . "_" . $arg];//--permit to set get var usefull for command mode--
		
    //======
}else{
    //======
	    if(empty($method)) $method = isset($_GET[$arg]) ? "get" : "post";
	    
	    if($method == "get"){
	        $return_val = isset($_GET[$arg]) ? $_GET[$arg] : $return_val;
	    }else{
	        $return_val = isset($_POST[$arg]) ? $_POST[$arg] : $return_val;
	    } 
	    (is_array($return_val)) ? array_walk($return_val, 'html_control') : $return_val = html_control($return_val);
    //======
}
    //======
        
//====== getting encode inputs
if(empty($return_val)){
	$name1 = "cmr_" . md5("cmr_" . $arg);
    if(isset($_POST[$name1])){
		$value1 = $_POST[$name1];
	    $return_val = empty($_SESSION[$name1][$value1]) ? $return_val : ($_SESSION[$name1][$value1]);
	}
}
//======
 
// 	print("\$name1=".htmlentities($name1).";<br />");
// 	print("\$value1=".htmlentities($value1).";<br />");
// 	print("$arg=".htmlentities($_session[$name1][$value1]).";<br />");
// $return_val = control_magic_quote($return_val, "mysql");
return $return_val;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_load_param"))){
function cmr_load_param($cmr_config = array(), $cmr_post_var = array(), $list_param)
{
   @ $array_param = explode("&", $list_param);
    $i = 0;
    while ((isset($array_param[$i])) && ($array_param[$i])){
        @ list($key, $value) = explode("=", $array_param[$i]);
        /**
         * Important for the security **************************
         */
        if(($key) && cmr_searchi("'" . $key . "'", $cmr_config["cmr_var_restrict"])){
            cmr_error_log($cmr_config, cmr_get_session(), "Script=" . ___FILE___ . "  Line=" . __LINE__ . " : " . " Security alert, trying to change the restrict var name:" . $key);
			die(" Security alert, trying to change the restrict var name:" . $key);
        }
        /**
         * Important for the security **************************
         */
        empty($key) or $cmr_post_var[$key] = $value; //!!!!!!assign here!!!!!!
        // -------------------
        $i++;
    }
return $cmr_post_var;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_conf_exist"))){
function cmr_conf_exist($cmr_conf_file = "config.inc.php")
{

// Checks for configuration file, if none found loads installation page
if(!file_exists($cmr_conf_file) || filesize($cmr_conf_file) < 10){
	if(($_GET["cmr_mode"] != "install")&&($_POST["cmr_mode"] != "install")) 
	cmr_header("Location: index.php?cmr_mode=install");
// 	cmr_header("Location: " .  $_SERVER['PHP_SELF'] . "?cmr_mode=install");
   return  false;
	exit();
}
   return  true;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("load_lang_need"))){
function cmr_load_lang_need($cmr_config = array(), $cmr_language = array(), $cmr_page = array(), $cmrmodule = "user.ini")
{

    $root_name = cmr_pure_name($cmr_config, $cmrmodule);
    if(cmr_search(".", $root_name)) $root_name = substr($root_name, 0, strrpos($root_name, "."));
    $lang_name = "lang_" . $root_name . $cmr_config["cmr_lang_ext"];    

//     if(!empty($cmr_language["load_lang_" . cmr_basename($root_name)])) return $cmr_language;
    // -------
	   $file_lang = "";
	   $file_list = array();
	   $file_list[] = $cmrmodule;
	   $file_list[] = cmr_get_path("index") . $cmrmodule;
	   $file_list[] = cmr_get_path("lang") . "languages/" . $cmr_page["language"] . "/" . $lang_name;
	   $file_list[] = cmr_get_path("lang") . "languages/" . $cmr_page["language"] . "/auto/" . $lang_name;
	   
	   $file_lang = cmr_good_file($file_list, "file");
    // -------
//     echo "<br />--[".cmr_get_path("lang") . "languages/" . $cmr_page["language"] . "/" . $lang_name."]--";
    // -------
    if(file_exists($file_lang) && (empty($cmr_config["load_lang_" . $root_name])))  $cmr_language = cmr_include_conf($cmr_config, $file_lang, $cmr_language, "var");
    // -------
   return $cmr_language;
} 
} 
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("load_conf_"))){
function cmr_load_conf_need($cmr_config = array(), $cmrmodule = "user.ini")
{

//     $root_name = str_replace("\\", "/", $cmrmodule);
//     if(cmr_search("/", $conf_name)){
//     $root_name = substr($root_name, strrpos($root_name, "/") + 1);
// 	}
	
    $root_name = cmr_pure_name($cmr_config, $cmrmodule);
    if(cmr_search(".", $root_name)) $root_name = substr($root_name, 0, strrpos($root_name, "."));
    $conf_name = "conf_" . $root_name . $cmr_config["cmr_conf_ext"];
    
    // -------
//     // if(!empty($cmr_config["version_" . cmr_basename($root_name)])) return $cmr_config;
    // -------
	   $file_conf = "";
	   $file_list = array();
	   $file_list[0] = $cmrmodule;
	   $file_list[1] = cmr_get_path("index") . $cmrmodule;
	   $file_list[2] = cmr_get_path("conf") . "conf.d/modules/" . $root_name . $cmr_config["cmr_conf_ext"];
	   $file_list[3] = cmr_get_path("conf") . "conf.d/modules/auto/" . $root_name . $cmr_config["cmr_conf_ext"];
	   $file_list[4] = cmr_get_path("conf") . "conf.d/modules/" . $conf_name;
	   $file_list[5] = cmr_get_path("conf") . "conf.d/modules/auto/" . $conf_name;
	   
	   $file_conf = cmr_good_file($file_list, "file");
    // -------
	    if(is_file($file_list[5])) $cmr_config = cmr_include_conf($cmr_config, $file_list[5], $cmr_config, "var");
	    if(is_file($file_list[4])) $cmr_config = cmr_include_conf($cmr_config, $file_list[4], $cmr_config, "var");
	    if(is_file($file_list[3])) $cmr_config = cmr_include_conf($cmr_config, $file_list[3], $cmr_config, "var");
	    if(is_file($file_list[2])) $cmr_config = cmr_include_conf($cmr_config, $file_list[2], $cmr_config, "var");
	    if(is_file($file_list[1])) $cmr_config = cmr_include_conf($cmr_config, $file_list[1], $cmr_config, "var");
	    if(is_file($file_list[0])) $cmr_config = cmr_include_conf($cmr_config, $file_list[0], $cmr_config, "var");
	    if(is_file($file_conf)) $cmr_config = cmr_include_conf($cmr_config, $file_conf, $cmr_config, "var");
    // -------
	    
//     echo "<br />--[" . $conf_name."]--";
   return $cmr_config;
} 
} 
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("load_help_need"))){
function cmr_load_help_need($cmr_config = array(), $cmr_help = array(), $cmrmodule = "user.php")
{

    $root_name = cmr_pure_name($cmr_config, $cmrmodule);
    if(cmr_search(".", $root_name)) $root_name = substr($root_name, 0, strrpos($root_name, "."));

    $help_name = "help_" . $root_name . $cmr_config["cmr_help_ext"];
//     if(!empty($cmr_help["load_" . cmr_basename($root_name)])) return $cmr_help;
    // -------
	   $file_help = "";
	   $file_list = array();
	   $file_list[] = $cmrmodule;
	   $file_list[] = cmr_get_path("index") . $cmrmodule;
	   $file_list[] = cmr_get_path("help") . "help/" . $help_name;
	   $file_list[] = cmr_get_path("help") . "help/auto/" . $help_name;
	   $file_list[] = cmr_get_path("index") . $cmrmodule;
	   $file_list[] = $cmrmodule;
	   
	   $file_help = cmr_good_file($file_list, "file");
    // -------
// 	if(file_exists($file_help)) include_once($file_help);
    // -------

   return $cmr_help;
} 
} 
/*=================================================================*/
/*=================================================================*/
/**
 * load_module_need($cmr_config = array(), $cmr_language = array(), $cmr_page = array(), $cmrmodule=="user.php")
 *
 * @param mixed $cmrmodule["name"]
 * @param array $array_table
 * @return
 */
if(!(function_exists("load_module_need"))){
function cmr_load_module_need($cmr_config = array(), $cmr_language = array(), $cmr_page = array(), $cmrmodule = "user.php")
{

// $cmr_class = load_class_need($cmr_config, $cmrmodule);
// $cmr_func = load_func_need($cmr_config, $cmrmodule);
$cmr_language = cmr_load_lang_need($cmr_config, $cmr_language, $cmr_page, $cmrmodule);
$cmr_config = cmr_load_conf_need($cmr_config, $cmrmodule);
$cmr_help = cmr_load_help_need($cmr_config, $cmrmodule);

   return  array_merge($cmr_config, $cmr_language, $cmr_func, $cmr_class, $cmr_help);
} 
} 
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_getput_template"))){
function cmr_getput_template($file_tpl, $limit_tpl="", $array_value=array())
    {
    print($file_tpl . " [". __FILE__ . "] , [". __LINE__ . "]<br />");
    $r_text = $file_tpl;
	if(file_exists(substr($file_tpl, 0, 254))){
// 		array_push ($GLOBALS["cmr"]->debug, realpath($file_tpl));
	    cmr_set_debug("", realpath($file_tpl));
		$r_text = file_get_contents($file_tpl);
	}
   return  cmr_print_template($r_text, $limit_tpl, $array_value);
    }
    }
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("db_load_notify"))){
function db_load_notify($cmr_config = array(), $cmr_user = array(), $conn, $source = "", $action = "", $language = "english")
{
$notify = array();
$data = array();
// =============================================
// eval_notify($conn, $source = "", $destination = "", $action = "", $language = "english");
// =============================================
	$notify["to_email"]["template"] = "";
	$notify["to_email"]["headers_severity"] = "";
	$notify["to_email"]["headers_to"] = "";
	$notify["to_email"]["headers_from"] = "";
	$notify["to_email"]["headers_cc"] = "";
	$notify["to_email"]["headers_bcc"] = "";
	$notify["to_email"]["subject"] = "";
	$notify["to_email"]["message"] = "";
	$notify["to_page"] = "";
	$notify["to_log"] = "";
	$notify["to_db"] = "";
	$notify["to_sms"] = "";
	$notify["to_flux"] = "";
	$notify["to_rss"] = "";
	$notify["to_other"] = "";
	// =============================================
	$db_host = $cmr_config["db_host"];
	$db_name = $cmr_config["db_name"];
	$db_user = $cmr_config["db_user"];
	$db_pw = $cmr_config["db_pw"];
	$auth_email = $cmr_user["auth_email"];
	$auth_group = $cmr_user["auth_group"];
	$cmr_prefix = $cmr_config["cmr_table_prefix"];
	// =============================================
	$cmr_action["table_name"] = $cmr_config["cmr_table_prefix"] . "notify";
	$cmr_action["column"] = "mail_from,mail_to,mail_cc,mail_bcc";
	$cmr_action["action"] = "select";
	
if($conn){
foreach(array("to_email", "to_page", "to_log", "to_db", "to_sms", "to_flux", "to_rss", "to_other") as $destination){
	$sql_data["valid"] = cmr_where_query($cmr_config, $cmr_user, $cmr_action, $conn);
	$sql_data["limit"] = "1";
	$sql_data["sql_where"] = " state = 'enable' AND source = '" . $source . "' AND destination = '" . $destination . "' AND action = '" . $action . "' AND language = '" . $language . "' ";
	$sql_data["order"] = "";
	$data = sql_run("array_assoc", $conn, "select", "", $cmr_config["db_name"], $cmr_config["cmr_table_prefix"] . "notify", "*", $sql_data);
	// =============================================
	if($destination == "to_email"){
	    if(!empty($data[0]["mail_to"])) $notify["to_email"]["headers_to"] = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $data[0]["mail_to"]);
	    if(!empty($data[0]["mail_from"])) $notify["to_email"]["headers_from"] = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $data[0]["mail_from"]);
	    if(!empty($data[0]["mail_cc"])) $notify["to_email"]["headers_cc"] = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $data[0]["mail_cc"]);
	    if(!empty($data[0]["mail_bcc"])) $notify["to_email"]["headers_bcc"] = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $data[0]["mail_bcc"]);
	    if(!empty($data[0]["title"])) $notify["to_email"]["subject"] = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $data[0]["title"]);
	    if(!empty($data[0]["text"])) $notify["to_email"]["message"] = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $data[0]["text"]);
	}else{
		if(!empty($data[0]["text"])) $notify[$destination] = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $data[0]["text"]);
	}
	// =============================================
}
}
// =============================================
		
return $notify;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_load_notify"))){
function cmr_load_notify($cmr_config = array(), $cmr_user = array(), $subject_templates = "", $pattern_templates = "", $action_type = "", $action_limit = "")
    {
	    $notify = array();
	    $matches = array();
		// =============================================
// 		$notify = db_load_notify($cmr_config, $cmr_user, cmr_get_db_connection(), $cmr_config["cmr_table_prefix"] . $action_type, $action_limit, cmr_get_page("language"));
// 		if($notify) return $notify;
		// =============================================
        $notify["to_email"]["template"] = "";
        $notify["to_email"]["headers_severity"] = "";
        $notify["to_email"]["headers_to"] = "";
        $notify["to_email"]["headers_from"] = "";
        $notify["to_email"]["headers_cc"] = "";
        $notify["to_email"]["headers_bcc"] = "";
        $notify["to_email"]["subject"] = "";
        $notify["to_email"]["message"] = "";
        $notify["to_page"] = "";
        $notify["to_log"] = "";
        $notify["to_db"] = "";
        $notify["to_sms"] = "";
        $notify["to_flux"] = "";
        $notify["to_rss"] = "";
        $notify["to_other"] = "";
		// =============================================
			
		// =============================================
		$db_host = $cmr_config["db_host"];
		$db_name = $cmr_config["db_name"];
		$db_user = $cmr_config["db_user"];
		$db_pw = $cmr_config["db_pw"];
		$auth_email = $cmr_user["auth_email"];
		$auth_group = $cmr_user["auth_group"];
		$cmr_prefix = $cmr_config["cmr_table_prefix"];
		// =============================================
		if(file_exists($subject_templates)){
// 			$pattern=file_get_contents($pattern_templates);	
			$subject = file_get_contents($subject_templates);	
// 			array_push ($GLOBALS["cmr"]->debug, realpath($subject_templates));
	    	cmr_set_debug("", realpath($subject_templates));
			
			if($action_limit){
				preg_match("|<" . $action_limit . ">(?P<" . $action_limit . ">.*)</" . $action_limit . ">|sieU", $subject, $matches);
		        $subject = $matches[$action_limit];
        	}
			
			preg_match("|<to_email>(?P<to_email>.*)</to_email>|sieU", $subject, $matches);
	        $notify["to_email"]["template"] = $matches["to_email"];
			preg_match("|<headers_severity>(?P<headers_severity>.*)</headers_severity>|sieU", $subject, $matches);
			if(!empty($matches["headers_severity"])) $notify["to_email"]["headers_severity"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["headers_severity"]));
			preg_match("|<headers_to>(?P<headers_to>.*)</headers_to>|sieU", $subject, $matches);
			if(!empty($matches["headers_to"])) $notify["to_email"]["headers_to"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["headers_to"]));
			preg_match("|<headers_from>(?P<headers_from>.*)</headers_from>|sieU", $subject, $matches);
			if(!empty($matches["headers_from"])) $notify["to_email"]["headers_from"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["headers_from"]));
			preg_match("|<headers_cc>(?P<headers_cc>.*)</headers_cc>|sieU", $subject, $matches);
			if(!empty($matches["headers_cc"])) $notify["to_email"]["headers_cc"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["headers_cc"]));
			preg_match("|<headers_bcc>(?P<headers_bcc>.*)</headers_bcc>|sieU", $subject, $matches);
			if(!empty($matches["headers_bcc"])) $notify["to_email"]["headers_bcc"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["headers_bcc"]));
			preg_match("|<subject>(?P<subject>.*)</subject>|sieU", $subject, $matches);
			if(!empty($matches["subject"])) $notify["to_email"]["subject"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["subject"]));
			preg_match("|<message>(?P<message>.*)</message>|sieU", $subject, $matches);
			if(!empty($matches["message"])) $notify["to_email"]["message"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["message"]));
			preg_match("|<to_page>(?P<to_page>.*)</to_page>|sieU", $subject, $matches);
			if(!empty($matches["to_page"])) $notify["to_page"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["to_page"]));
			preg_match("|<to_log>(?P<to_log>.*)</to_log>|sieU", $subject, $matches);
			if(!empty($matches["to_log"])) $notify["to_log"] = stripslashes(preg_replace("/(\{\{)([^}{]*)(\}\})/sieU", "run_code('{{\\2}}', '', '$db_host', '$db_user', '$db_pw', '$db_name', '$cmr_prefix', '$auth_email', '$auth_group')", $matches["to_log"]));
			preg_match("|<to_db>(?P<to_db>.*)</to_db>|sieU", $subject, $matches);
	        $notify["to_db"] = $matches["to_db"];
			preg_match("|<to_sms>(?P<to_sms>.*)</to_sms>|sieU", $subject, $matches);
	        $notify["to_sms"] = $matches["to_sms"];
			preg_match("|<to_flux>(?P<to_flux>.*)</to_flux>|sieU", $subject, $matches);
	        $notify["to_flux"] = $matches["to_flux"];
			preg_match("|<to_rss>(?P<to_rss>.*)</to_rss>|sieU", $subject, $matches);
	        $notify["to_rss"] = $matches["to_rss"];
			preg_match("|<to_other>(?P<to_other>.*)</to_other>|sieU", $subject, $matches);
	        $notify["to_other"] = $matches["to_other"];
	        
		}
		
		
		
		if($action_type){
			if(!($cmr_config["log_to_page" . $action_type])) $notify["to_page"] = "";
			if(!($cmr_config["log_to_log" . $action_type])) $notify["to_log"] = "";
			if(!($cmr_config["log_to_email" . $action_type])) $notify["to_email"] = "";
			if(!($cmr_config["log_to_db" . $action_type])) $notify["to_email"] = "";
			if(!($cmr_config["log_to_sms" . $action_type])) $notify["to_email"] = "";
			if(!($cmr_config["log_to_flux" . $action_type])) $notify["to_email"] = "";
			if(!($cmr_config["log_to_rss" . $action_type]))$ $notify["to_email"] = "";
			if(!($cmr_config["log_to_other" . $action_type])) $notify["to_email"] = "";
		}
		
		
		
   return $notify;
    }
    }
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_load_cookie"))){
function cmr_load_cookie($cmr_config = array())
    {
		if(!empty($cmr_config["cmr_use_cookie"])){
		foreach($_COOKIE as $key => $value){ 
		 	$_SESSION[$key] = $value; //----loading cookies var in table _SESSION
		}
		}
   return $_SESSION;
    }
    }
/*=================================================================*/
if(!(function_exists("load_ext"))){
    function load_ext($toload)
    {
        if(!extension_loaded($toload)){
            // if either returns true dl() will produce a FATAL error
            if((ini_get('enable_dl') != 1) || (ini_get('safe_mode') == 1)) return false;
            if(OS_WINDOWS){
                $extension = '.dll';
            } elseif(PHP_OS == 'HP-UX'){
                $extension = '.sl';
            } elseif(PHP_OS == 'AIX'){
                $extension = '.a';
            } elseif(PHP_OS == 'OSX'){
                $extension = '.bundle';
            }else{
                $extension = '.so';
            }
            if(OS_WINDOWS) return @dl('php_'.$toload.$extension);
            return @dl($toload.$extension);
        }
        return true;
    }
    }
/*=================================================================*/
if(!(function_exists("cmr_view_post_var"))){
function cmr_view_post_var($post_var = array(), $table_name = "", $base_name = "", $column_id = "", $date_time_base1 = "")
{
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(get_post("search_text")) $post_var["search_text"] = get_post("search_text");
	if(get_post("id_" . $table_name)) $post_var["id_" . $table_name] = get_post("id_" . $table_name);
	if(get_post($base_name . "_not")) $post_var[$base_name . "_not"] = get_post($base_name . "_not");
	if(get_post($base_name . "_order")) $post_var[$base_name . "_order"] = get_post($base_name . "_order");
	if(get_post($base_name . "_desc")) $post_var[$base_name . "_desc"] = get_post($base_name . "_desc");
	if(get_post($base_name . "_mode")) $post_var[$base_name . "_mode"] = get_post($base_name . "_mode");
	if(get_post($base_name . "_page")) $post_var[$base_name . "_page"] = get_post($base_name . "_page");
	if(get_post($base_name . "_limit")) $post_var[$base_name . "_limit"] = get_post($base_name . "_limit");
	if(get_post("__all__" . $base_name)) $post_var[$base_name . "_search"] = get_post("__all__" . $base_name);
	if(get_post($date_time_base1 . "1")) $post_var[$date_time_base1 . "1"] = get_post($date_time_base1 . "1");
	if(get_post($date_time_base1 . "2")) $post_var[$date_time_base1 . "2"] = get_post($date_time_base1 . "2");
	if(get_post($base_name . "_columns")) $post_var[$base_name . "_columns"] = get_post($base_name . "_columns");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	if(empty($post_var[$base_name . "_not"])) $post_var[$base_name . "_not"] = "";
	if(empty($post_var[$base_name . "_desc"])) $post_var[$base_name . "_desc"] = "desc";
	if(empty($post_var[$base_name . "_order"])) $post_var[$base_name . "_order"] = $column_id;
	if(empty($post_var["search_text"])) $post_var["search_text"] = "";
	if(empty($post_var["id_" . $table_name])) $post_var["id_" . $table_name] = "";
	if(empty($post_var[$base_name . "_mode"])) $post_var[$base_name . "_mode"] = "link_tab";
	if(empty($post_var[$base_name . "_limit"])) $post_var[$base_name . "_limit"] = 50;
	if(empty($post_var[$base_name . "_search"])) $post_var[$base_name . "_search"] = "";
	if(empty($post_var[$base_name . "_page"])) $post_var[$base_name . "_page"] = 0;
	if(empty($post_var[$base_name . "_columns"])) $post_var[$base_name . "_columns"] = 6;
	if(empty($post_var[$date_time_base1 . "1"])) $post_var[$date_time_base1 . "1"] = "";
	if(empty($post_var[$date_time_base1 . "2"])) $post_var[$date_time_base1 . "2"] = "";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$post_var[$base_name . "_desc"] = (trim($post_var[$base_name . "_desc"]) == "asc") ? "ASC" : "DESC";
	$post_var[$base_name . "_not"] = (empty($post_var[$base_name . "_not"])) ? "" : " NOT ";
	if(intval($post_var[$base_name . "_limit"]) < 2) $post_var[$base_name . "_limit"] = 50;
	if(intval($post_var[$base_name . "_page"] < 1)) $post_var[$base_name . "_page"] = 0;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if($post_var["id_" . $table_name]=="_all_"){
		$post_var[$date_time_base1 . "1"] = "";
		$post_var[$date_time_base1 . "2"] = "";
	}
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
        return $post_var;
}
}

?>
