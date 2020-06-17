<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_windows.php
 *   ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










class_windows.php,Ver 3.0  2011-July 10:36:59
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class class_modules
 *
 * @code_link() function  who take in input a page name and create and html link to this page
 */


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/../control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(class_exists("class_module"))){

/**
 * class_module
 *
 * @package
 * @author Administrator
 * @copyright Copyright (c) 2011
 * @version $Id$
 * @access public
 **/

 class class_module {
    var $config = array();

//   all files path are relatively refered to the application path in the main configuration file, files will be look also in [auto] dir
//   where to find the module
    var $path = "";
    var $script = "";
    var $param = "";
    var $name = "";
    var $base_name = "";
    var $pure_name = "";
    var $url = "";
    var $conf_file = "";
    var $position = "";
    var $rown_position = "";
    var $col_position = "";
    var $header_icon = "images/icon/16x16.png";
    var $need_type = "6";

    var $get_name = "";
    var $get_base_name = "";
    var $get_pure_name = "";
    var $template = "";

//   after an action, define where to send logs for this module
    var $log_to_email = "";
    var $log_to_page = "";
    var $log_to_log = "";
    var $log_to_db = "";
    var $log_to_sms = "";
    var $log_to_flux = "";
    var $log_to_rss = "";
    var $log_to_other = "";

//   you can use more than one file separated by comma [,] (usefull for the loader[loader_mod.php])
    var $function = "";
    var $class = "";
    var $language = "english";
    var $help = "";

//   use only one file (usefull for the module [menu_@_table_@.php][destop.php] and other link and menu to the module)
    var $image = "images/icon/32x32.png";
    var $small_image = "images/icon/16x16.png";

//   use only one file (usefull for The script  file [get_x.php])
    var $notify_file = "";

//   use only one file (usefull for the module [x.php])
    var $template_file = "";
//   use only one file (usefull for manage data post from module[x.php])
    var $get_file = "";
//   user type need to can use each of these module (Security)
    var $type = "0";
//   user type need to can run each of these get module (Security)
    var $type_get = "0";

//   define variable and his match value to be accept from the module (Security)
    var $match = ".*";

    var $match_get = ".*";


//   define witch user IP cannot run the module(Security)
//    var $deny_ip = "172.*
    var $deny_ip = "";

    var $deny_ip_get = "";

//   define witch user IP can run the module (Security)
   //allow_ip = "*
    var $allow_ip = "";

    var $allow_ip_get = "";

//   only for infomation use
    var $encoding = "iso-8859-1";
    var $author = "Tchouamou Eric Herve";
    var $creationDate = "";
    var $copyright = "(C) 2004-2011 Open Source . All rights reserved.";
    var $license = "http://www.gnu.org/copyleft/gpl.html GNU/GPL";
    var $authorEmail = "tchouamou@gmail.com";
    var $authorUrl = "http://sourceforge.net/users/tchouamoueric/";
    var $version = "3.0";
/*=================================================================*/
/*=================================================================*/



    //00000000000000000000000000
	function __construct($config = array(), $module = array()) // --constructor--
	{
	   return $this->class_module($config, $module);
	}
    //00000000000000000000000000
/*=================================================================*/
/*=================================================================*/
    /**
     * class_module::class_module()
     *
     **/
    function class_module($config = array(), $module = array()) // --contructor--
    {
    $this->config = $config;
    if($module){
	    if(isset($module["path"])) $this->path = $module["path"];
	    if(isset($module["script"])) $this->script = $module["script"];
	    if(isset($module["param"])) $this->param = $module["param"];
	    if(isset($module["name"])) $this->name = $module["name"];
	    if(isset($module["base_name"])) $this->base_name = $module["base_name"];
	    if(isset($module["pure_name"])) $this->pure_name = $module["pure_name"];
	    if(isset($module["url"])) $this->url = $module["url"];
	    if(isset($module["conf_file"])) $this->conf_file = $module["conf_file"];
	    if(isset($module["position"])) $this->position = $module["position"];
	    if(isset($module["rown_position"])) $this->rown_position = $module["rown_position"];
	    if(isset($module["col_position"])) $this->col_position = $module["col_position"];
	    if(isset($module["need_type"])) $this->need_type = $module["need_type"];
	    if(isset($module["header_icon"])) $this->header_icon = $module["header_icon"];
	    if(isset($module["need_type"])) $this->need_type = $module["need_type"];

	    if(isset($module["get_name"])) $this->get_name = $module["get_name"];
	    if(isset($module["get_base_name"])) $this->get_base_name = $module["get_base_name"];
	    if(isset($module["get_pure_name"])) $this->get_pure_name = $module["get_pure_name"];

//   after an action, define where to send logs for this module
	    if(isset($config["log_to_email" . $this->base_name])) $this->log_to_email = $config["log_to_email" . $this->base_name];
	    if(isset($config["log_to_page" . $this->base_name])) $this->log_to_page = $config["log_to_page" . $this->base_name];
	    if(isset($config["log_to_log" . $this->base_name])) $this->log_to_log = $config["log_to_log" . $this->base_name];
	    if(isset($config["log_to_db" . $this->base_name])) $this->log_to_db = $config["log_to_db" . $this->base_name];
	    if(isset($config["log_to_sms" . $this->base_name])) $this->log_to_sms = $config["log_to_sms" . $this->base_name];
	    if(isset($config["log_to_flux" . $this->base_name])) $this->log_to_flux = $config["log_to_flux" . $this->base_name];
	    if(isset($config["log_to_rss" . $this->base_name])) $this->log_to_rss = $config["log_to_rss" . $this->base_name];
	    if(isset($config["log_to_other" . $this->base_name])) $this->log_to_other = $config["log_to_other" . $this->base_name];

//   you can use more than one file separated by comma [,] (usefull for the loader[loader_mod.php])
	    if(isset($config["function" . $this->base_name])) $this->function = $config["function" . $this->base_name];
	    if(isset($config["class" . $this->base_name])) $this->class = $config["class" . $this->base_name];
	    if(isset($config["language" . $this->base_name])) $this->language = $config["language" . $this->base_name];
	    if(isset($config["help" . $this->base_name])) $this->help = $config["help" . $this->base_name];

//   use only one file (usefull for the module [menu_@_table_@.php][destop.php] and other link and menu to the module)
	    if(isset($config["image" . $this->base_name])) $this->image = $config["image" . $this->base_name];
	    if(isset($config["small_image" . $this->base_name])) $this->small_image = $config["small_image" . $this->base_name];

//   use only one file (usefull for The script  file [get_x.php])
	    if(isset($config["notify_file" . $this->base_name])) $this->notify_file = $config["notify_file" . $this->base_name];

//   use only one file (usefull for the module [x.php])
	    if(isset($config["template_file" . $this->base_name])) $this->template_file = $config["template_file" . $this->base_name];
//   use only one file (usefull for manage data post from module[x.php])
	    if(isset($config["get_file" . $this->base_name])) $this->get_file = $config["get_file" . $this->base_name];
//   user type need to can use each of these module (Security)
	    if(isset($config["type" . $this->base_name])) $this->type = $config["type" . $this->base_name];
//   user type need to can run each of these get module (Security)
	    if(isset($config["type_get" . $this->base_name])) $this->type_get = $config["type_get" . $this->base_name];

//   define variable and his match value to be accept from the module (Security)
	    if(isset($config["match" . $this->base_name])) $this->match = $config["match" . $this->base_name];

	    if(isset($config["match_get" . $this->base_name])) $this->match_get = $config["match_get" . $this->base_name];


//   define witch user IP cannot run the module(Security)
//	    if(isset($config["path" . $this->base_name])) $this->deny_ip = "172.*
	    if(isset($config["deny_ip" . $this->base_name])) $this->deny_ip = $config["deny_ip" . $this->base_name];

	    if(isset($config["deny_ip_get" . $this->base_name])) $this->deny_ip_get = $config["deny_ip_get" . $this->base_name];

//   define witch user IP can run the module (Security)
   //allow_ip = "*
	    if(isset($config["allow_ip" . $this->base_name])) $this->allow_ip = $config["allow_ip" . $this->base_name];

	    if(isset($config["allow_ip_get" . $this->base_name])) $this->allow_ip_get = $config["allow_ip_get" . $this->base_name];

//   only for infomation use
	    if(isset($config["encoding" . $this->base_name])) $this->encoding = $config["encoding" . $this->base_name];
	    if(isset($config["author" . $this->base_name])) $this->author = $config["author" . $this->base_name];
	    if(isset($config["creationDate" . $this->base_name])) $this->creationDate = $config["creationDate" . $this->base_name];
	    if(isset($config["copyright" . $this->base_name])) $this->copyright = $config["copyright" . $this->base_name];
	    if(isset($config["license" . $this->base_name])) $this->license = $config["license" . $this->base_name];
	    if(isset($config["authorEmail" . $this->base_name])) $this->authorEmail = $config["authorEmail" . $this->base_name];
	    if(isset($config["authorUrl" . $this->base_name])) $this->authorUrl = $config["authorUrl" . $this->base_name];
	    if(isset($config["version" . $this->base_name])) $this->version = $config["version" . $this->base_name];
    // ------------
	}
    // ------------
    }
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function good_file($cmr_user = array(), $language = "", $type = "", $action = "")
{
 		$file_list = array();
 		switch($type){
	 		case "notify":
			$file_list[] = $cmr_user["auth_user_path"] . "templates/notify/notify_" . $action . $this->config["cmr_notify_ext"];
			$file_list[] = $cmr_user["auth_group_path"] . "templates/notify/notify_" . $action . $this->config["cmr_notify_ext"];
			if(!empty($this->config["notify_" . $action])){
				$file_list[] = $this->config["notify_" . $action];
				$file_list[] = $this->config["cmr_template_path"] . $this->config["notify_" . $action];
			}
			$file_list[] = $this->config["cmr_notify_path"] . "templates/notify/" . $language . "/notify_" . $action . $this->config["cmr_notify_ext"];
			$file_list[] = $this->config["cmr_notify_path"] . "templates/notify/" . $language . "/auto/notify_" . $action . $this->config["cmr_notify_ext"];
			$file_list[] = $this->config["cmr_notify_path"]  ."templates/notify/auto/notify_" . $action . $this->config["cmr_notify_ext"];
			break;

	 		case "template":
			$file_list[] = $cmr_user["auth_user_path"] . "templates/modules/template_" . $action . $this->config["cmr_template_ext"];
			$file_list[] = $cmr_user["auth_group_path"] . "templates/modules/template_" . $action . $this->config["cmr_template_ext"];
			if(!empty($this->config["template_" . $action])){
				$file_list[] = $this->config["template_" . $action];
				$file_list[] = $this->config["cmr_template_path"] . $this->config["template_" . $action];
			}
			$file_list[] = $this->config["cmr_template_path"] . "templates/modules/template_" . $action . $this->config["cmr_template_ext"];
			$file_list[] = $this->config["cmr_template_path"] . "templates/modules/auto/template_" . $action . $this->config["cmr_template_ext"];
			break;


			default:
			break;
		}
		return cmr_good_file($file_list);
    }
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function load_lang($cmr_language = array(), $language = "", $cmrmodule = "user.ini")
{

    $root_name = cmr_pure_name($this->config, $cmrmodule);
    if(cmr_search(".", $root_name)) $root_name = substr($root_name, 0, strrpos($root_name, "."));
    $lang_name = "lang_" . $root_name . $this->config["cmr_lang_ext"];

//     if(!empty($cmr_language["load_lang_" . cmr_basename($root_name)])) return $cmr_language;
    // -------
	   $file_lang = "";
	   $file_list = array();
	   $file_list[] = $cmrmodule;
	   $file_list[] = $this->config["cmr_path"] . $cmrmodule;
	   $file_list[] = $this->config["cmr_lang_path"] . "languages/" . $language . "/" . $lang_name;
	   $file_list[] = $this->config["cmr_lang_path"] . "languages/" . $language . "/auto/" . $lang_name;

	   $file_lang = cmr_good_file($file_list, "file");
    // -------
//     echo "<br />--[".$this->config["cmr_lang_path"] . "languages/" . $language . "/" . $lang_name."]--";
    // -------
    if(file_exists($file_lang) && (empty($this->config["load_lang_" . $root_name])))  $cmr_language = cmr_include_conf($this->config, $file_lang, $cmr_language, "var");
    // -------
   return $cmr_language;
}
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function load_conf($cmrmodule = "user.ini")
{

//     $root_name = str_replace("\\", "/", $cmrmodule);
//     if(cmr_search("/", $conf_name)){
//     $root_name = substr($root_name, strrpos($root_name, "/") + 1);
// 	}

    $root_name = cmr_pure_name($this->config, $cmrmodule);
    if(cmr_search(".", $root_name)) $root_name = substr($root_name, 0, strrpos($root_name, "."));
    $conf_name = "conf_" . $root_name . $this->config["cmr_conf_ext"];

    // -------
//     // if(!empty($this->config["version_" . cmr_basename($root_name)])) return $this->config;
    // -------
	   $file_conf = "";
	   $file_list = array();
	   $file_list[0] = $cmrmodule;
	   $file_list[1] = $this->config["cmr_path"] . $cmrmodule;
	   $file_list[2] = $this->config["cmr_conf_path"] . "conf.d/modules/" . $root_name . $this->config["cmr_conf_ext"];
	   $file_list[3] = $this->config["cmr_conf_path"] . "conf.d/modules/auto/" . $root_name . $this->config["cmr_conf_ext"];
	   $file_list[4] = $this->config["cmr_conf_path"] . "conf.d/modules/" . $conf_name;
	   $file_list[5] = $this->config["cmr_conf_path"] . "conf.d/modules/auto/" . $conf_name;

	   $file_conf = cmr_good_file($file_list, "file");
    // -------
	    if(is_file($file_list[5])) $this->config = cmr_include_conf($this->config, $file_list[5], $this->config, "var");
	    if(is_file($file_list[4])) $this->config = cmr_include_conf($this->config, $file_list[4], $this->config, "var");
	    if(is_file($file_list[3])) $this->config = cmr_include_conf($this->config, $file_list[3], $this->config, "var");
	    if(is_file($file_list[2])) $this->config = cmr_include_conf($this->config, $file_list[2], $this->config, "var");
	    if(is_file($file_list[1])) $this->config = cmr_include_conf($this->config, $file_list[1], $this->config, "var");
	    if(is_file($file_list[0])) $this->config = cmr_include_conf($this->config, $file_list[0], $this->config, "var");
	    if(is_file($file_conf)) $this->config = cmr_include_conf($this->config, $file_conf, $this->config, "var");
    // -------

//     echo "<br />--[".$conf_name."]--";
   return $this->config;
}
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function load_help($cmrmodule = "user.php")
{
	$cmr_help = array();
    $root_name = cmr_pure_name($this->config, $cmrmodule);
    if(cmr_search(".", $root_name)) $root_name = substr($root_name, 0, strrpos($root_name, "."));

    $help_name = "help_" . $root_name . $this->config["cmr_help_ext"];
//     if(!empty($cmr_help["load_" . cmr_basename($root_name)])) return $cmr_help;
    // -------
	   $file_help = "";
	   $file_list = array();
	   $file_list[] = $cmrmodule;
	   $file_list[] = $this->config["cmr_path"] . $cmrmodule;
	   $file_list[] = $this->config["cmr_help_path"] . "help/" . $help_name;
	   $file_list[] = $this->config["cmr_help_path"] . "help/auto/" . $help_name;
	   $file_list[] = $this->config["cmr_path"] . $cmrmodule;
	   $file_list[] = $cmrmodule;

	   $file_help = cmr_good_file($file_list, "file");
    // -------
// 	if(file_exists($file_help)) include_once($file_help);
    // -------

   return $cmr_help;
}
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
/**
 *
 * @param mixed $cmrmodule
 * @param array $array_table
 * @return
 */
function load_need($cmr_language = array(), $cmr_page = array(), $cmrmodule = "user.php")
{

// $cmr_class = load_class_need($this->config, $cmrmodule);
// $cmr_func = load_func_need($this->config, $cmrmodule);
$cmr_language = cmr_load_lang_need($this->config, $cmr_language, $cmr_page, $cmrmodule);
$this->config = cmr_load_conf_need($this->config, $cmrmodule);
$cmr_help = cmr_load_help_need($this->config, $cmrmodule);

   return  array_merge($this->config, $cmr_language, $cmr_help);
}
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function getput_template($file_tpl, $limit_tpl = "", $array_value = array())
    {
    print($file_tpl . " [" . __FILE__ . "] , [" . __LINE__ . "]<br />");
    $r_text = $file_tpl;
	if(file_exists(substr($file_tpl, 0, 254))){
// 		array_push ($GLOBALS["cmr"]->debug, realpath($file_tpl));
		cmr_set_debug("", realpath($file_tpl));

		$r_text = file_get_contents($file_tpl);
	}
   return  $this->print_template($r_text, $limit_tpl, $array_value);
    }
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function match_include($position = "", $template = "")
    {
   if(empty($template)) $template = $this->template;
   return strpos($template, $position);
    }
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
//function print_template($template, $position = "", $array_match = array())
//    {
//		if(!empty($position)){
//		    preg_match("|<" . $position . ">(.*)</" . $position . ">|sieU", $template, $matches);
//		    (empty($matches[1])) ? $template = "" : $template = $matches[1];

// 			$template1 = stristr($template, "<".$position.">");
// 			$template2 = stristr($template, "</".$position.">");
// 			$len0 = strlen($position);
// 			$len1 = strlen($template1);
// 			$len2 = strlen($template2);
// 			$len = strlen($template);
// 			$template = substr($template, $len1, $len - $len2);
//			}

	// if(!empty($array_match)) $template = preg_replace("/(\{)([^}{ ]*)(\})/sieU", "\$array_match['\\2']", $template);
  // return $template;
//    }
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function load_notify($cmr_user = array(), $subject_templates = "", $action_type = "", $action_limit = "")
    {
	$notify = db_load_notify($this->config, $cmr_user, cmr_get_db_connection(), $this->config["cmr_table_prefix"] . $action_type, $action_limit, $this->language);
	if($notify) return $notify;
	return  cmr_load_notify($this->config, $cmr_user, $subject_templates, "", $action_type, $action_limit);
    }
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function sql_run($cmr_query = array(), $cmr_output = array(), $cmr_session = array(), $cmr_db_connection = NULL)
{
if(empty($cmr_output[0])) $cmr_output[0] = "";
$count=0;
$cmr_action["affected_rows"] = 0;
while(isset($cmr_query[$count])){
 if(!empty($cmr_query[$count])){
	 if((substr(strtolower(trim($cmr_query[$count])),0,7) != "select ") && ($cmr_session["type"] == "read_only")){
// 		 $template .= "("<br />" . cmr_translate("can not be run, read only user!"));
		 $template .= ("<br />" . cmr_translate("read_only_user"));
		 }else{
//     $template .= "("<br /><b>".cmr_translate("query")."(".$count."):</b>" . substr($cmr_query[$count], 0, 25) . "   ....<br />");
    $result_query = sql_run("result", $cmr_db_connection, "sql", $cmr_query[$count]);
//     $result_query = &$cmr_db_connection->Execute($cmr_query[$count]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr_db_connection->ErrorMsg()); // or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr_db_connection->ErrorMsg());
    if($result_query) $cmr_db["affected_row"][$count] = $result_query->RecordCount();;
	$cmr_action["affected_rows"] += $cmr_db["affected_row"][$count];
	}

}
    $count++;
}
   return $template;
}
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function run_message($cmr_query = array(), $cmr_db = array(), $cmr_session = array(), $cmr_output = array(), $cmr_db_connection = NULL)
{
if(!empty($cmr_db["result"][0])){
    //  Query to be run
    // if( (!cmr_searchi("^search", $cmr_form))&&($cmr_form !="report_periodic"))
	    if(isset($cmr_query[0]) && ($cmr_query[0])){
	        // ----successo------------------
	        $template .= ("<br /><b>" . cmr_translate("action_db_success") . ".</b><br />");
	        $template .= ("<br /><b>" . $cmr_action["affected_rows"] . " " . cmr_translate("affected_rows") . ".</b><br />");
	        // --log action-----
	        cmr_error_log($this->config, $cmr_session, "Script=" . __FILE__ . " : " . cmr_translate("action_db") . " : " . substr($cmr_output[1], 0, 80));
	    } //--------fallito-----------
	    else {
	        $template .= ("<br /><span class=\"blink\"> " . cmr_translate("no_write_db") . "  .</span><br />");
	        // --log action-----
	        cmr_error_log($this->config, $cmr_session, "Script=" . __FILE__ . " : " . cmr_translate("no_write_db") . " : " . substr($cmr_output[1], 0, 80));
	    };
}
   return $template;
}
/*=================================================================*/
/*=================================================================*/



/*=================================================================*/
/*=================================================================*/
function output_text($cmr_output = array())
{
	if(!empty($cmr_output[0])){
	    $template .= ("<pre>" . html_control(wordwrap(substr($cmr_output[0], 0, 10000), 100, "\n")) . "</pre>");
	}
   return $template;
}
/*=================================================================*/
/*=================================================================*/


/*=================================================================*/
/*=================================================================*/
function action_run($cmr_output = array())
{
	if(empty($cmr_output[1])) $cmr_output[1] = $cmr_output[0];
	if($this->match_include("match_include1"))
	if(($cmr_action["form_action_run"])){
	    // Script to be run
	    print(eval($cmr_action["form_action_run"]));
	}
   return $template;
}
/*=================================================================*/
/*=================================================================*/


/*=================================================================*/
/*=================================================================*/
function action_include($cmr_query = array(), $cmr_action = array())
{
	if($this->match_include("match_include2"))
	if(($cmr_action["form_action_include"])){
	    // Script to be include
		if(file_exists($cmr_action["form_action_include"]))
	    include($cmr_action["form_action_include"]);
	}
   return $template;
}
/*=================================================================*/
/*=================================================================*/


/*=================================================================*/
/*=================================================================*/
function send_email($cmr_email = array(), $cmr_post_file = array())
{
if($this->match_include("match_include3"))
if((isset($cmr_email["subject"])) && (isset($cmr_email["message"]) && ($this->config["cmr_use_email"]))){
// 	include($this->config["cmr_path"] . "system/generate/email.php");

        // ------------------------------------------
			$cmr_email["boundary"] = "--" . md5(uniqid("cmr_boundary"));
			$cmr_email["ctencoding"] = "8bit";
			$cmr_email["disposition"] = "attachment"; //"inline";
			$cmr_email["headers_content"] = "text/plain";
			$cmr_email["headers_mime"] = "1.0";
			$cmr_email["herders_charset"] = "iso-8859-1";
			$cmr_email["MSMail_severity"] = "Normal";
			$cmr_email["headers_severity"] = "3";
        // ------------------------------------------

        // ------------------------------------------
			$cmr_email["recipient"] = $cmr_email["recipient"] . " \r\n";
			$cmr_email["email_bcc"] = "From: " . $cmr_email["headers_from"] . " \r\n";
			$cmr_email["email_to"] = "To: " . $cmr_email["headers_to"] . " \r\n";
			$cmr_email["email_cc"] = "Cc: " . $cmr_email["headers_cc"] . " \r\n";
			$cmr_email["email_bcc"] = "Bcc: " . $cmr_email["headers_bcc"] . " \r\n";
        // ------------------------------------------

        // ------------------------------------------
			$cmr_email["body"] = "";
			if(sizeof($cmr_post_file["content"][0])){ // Attachment version of message
			        $cmr_email["body"] .= "--".$cmr_email["boundary"] ."\r\n";
			        $cmr_email["body"] .= "Content-Type: ".$cmr_email["headers_content"] ."; charset=".$cmr_email["herders_charset"]."\r\n";
			        $cmr_email["body"] .= "Content-Transfer-Encoding: base64\r\n\r\n";
			        $cmr_email["body"] .= chunk_cmr_split(base64_encode("\r\n".$cmr_email["message"] .""));
// 			        $cmr_email["body"] .= $val;
			    foreach($cmr_post_file["content"] as $key => $val){
			        // Attachment
			        $cmr_email["body"] .= "--".$cmr_email["boundary"] ."\r\n";
			        $cmr_email["body"] .= "Content-type: " . $cmr_post_file["files_type"][$key] . " ;\n name=\"" . $cmr_post_file["files_name"][$key] . "\"\n";
			        $cmr_email["body"] .= "Content-Transfer-Encoding: base64\n";
			        $cmr_email["body"] .= "Content-Disposition: ".$cmr_email["disposition"] .";\n  filename=\"" . $cmr_post_file["files_name"][$key] . "\"\n";
// 			        $cmr_email["body"] .= chunk_cmr_split(base64_encode(file_get_contents($val)));
			        $cmr_email["body"] .= $val;
			    };
// 			        $cmr_email["body"] .= "--".$cmr_email["boundary"] ."\r\n";
// 			    	$cmr_email["body"] = "\r\n".$cmr_email["message"];
			}else{
// 			    $cmr_email["headers_all"] = "Content-Type: ".$cmr_email["headers_content"] ."; charset=".$cmr_email["herders_charset"]."\r\n";
// 			    $cmr_email["headers_all"] .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
				$cmr_email["body"] .= "\r\n".$cmr_email["message"];
			} //text version of message
			// ======================================================
			// $cmr_email["email_bcc"].= "Reply-To: ".$cmr_email["email_bcc"]_reply_to." \r\n";
			// ======================================================
			// ======================================================
			$cmr_email["headers_all"] = $cmr_email["email_bcc"] . $cmr_email["email_to"] . $cmr_email["email_cc"] . $cmr_email["email_bcc"];
			$cmr_email["headers_all"] .= "Mime-Version: ".$cmr_email["headers_mime"]." \r\n";

			if(@sizeof($cmr_post_file["content"][0])){
			    $cmr_email["headers_all"] .= "Content-Type: multipart/mixed; boundary = ".$cmr_email["boundary"] ."\r\n\r\n";
				$cmr_email["headers_all"] .= "Content-Transfer-Encoding: ".$cmr_email["ctencoding"]."\r\n";
			}else{
// 			    $cmr_email["headers_all"] .= "Content-Type: multipart/mixed; charset=".$cmr_email["herders_charset"]."\r\n";
			    $cmr_email["headers_all"] .= "Content-Type: ".$cmr_email["headers_content"] ."; charset=".$cmr_email["herders_charset"]."\r\n";
			    $cmr_email["headers_all"] .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
			}

			$cmr_email["headers_all"] .= "X-severity: ".$cmr_email["headers_severity"]."\r\n";
			// $cmr_email["headers_all"].= "X-Mailer: Php/libMailv1.3\r\n";
			$cmr_email["headers_all"] .= "X-MSMail-severity: ".$cmr_email["MSMail_severity"]."\r\n";
			$cmr_email["headers_all"] .= "Return-Path: " . $this->config["cmr_from_email"] . "\r\n";
			// $cmr_email["headers_all"].= "X-Sender: " . $this->config["cmr_from_email"] ."\r\n";
			// $cmr_email["headers_all"].= "X-Originating-IP: [62.152.110.67]\r\n";
			// $cmr_email["headers_all"].= "X-Originating-Email: ".$this->config["cmr_from_email"] ."\r\n";
        // ------------------------------------------

        // ------------------------------------------
		$output = mail($cmr_email["recipient"], $cmr_email["subject"], $cmr_email["body"], $cmr_email["headers_all"]);
	}
   return $output;
}
/*=================================================================*/
/*=================================================================*/


/*=================================================================*/
/*=================================================================*/
function sincronise($cmr_query = array(), $cmr_db = array(), $cmr_db_connection = NULL)
{
if(!empty($cmr_db["result"][0]))
if($this->match_include("match_include4"))
if(!empty($cmr_query[0]) && ($this->config["cmr_sincronisation"])){
    // usefull for sincronisation use
	@ list($type_migration, $migration) = explode("|", $this->config["cmr_sincronisation"]);
	if(!empty($migration))
	if(file_exists($migration))
	include_once($migration);
    // usefull for sincronisation use
}
   return $template;
}
/*=================================================================*/
/*=================================================================*/
    // ------------
    /**
     * class_module::close()
     *
     * @return
     **/

    function close() // ----
    {
	    unset($this->name);
	    unset($this->path);
	    unset($this->script);
	    unset($this->url);
     return FALSE;
    }
    // ------------

}
}
?>
