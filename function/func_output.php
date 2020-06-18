<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        function_output.php
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






function_output.php,Ver 3.0  2011-Nov-Wed 22:19:05
*/

// function change_a($strlink, $mod_middle){
// function cmr_get_data_event($cmr_config = array(), $cmr_session = array(), $cmr_event = array())
// function cmr_debug_print($cmr_debug = array(), $class_module = array(), $cmr_config = array(), $cmr_themes = array(), $cmr_page = array(), $cmr_db = array(), $cmr_user = array(), $cmr_group = array(), $cmr_post_var = array(), $cmr_post_files = array(), $cmr_session = array(), $cmr_query = array(), $cmr_language = array())
// function cmr_print_template($template, $position = "", $array_match = array())
// function cmr_match_include($template = "", $position = "")
// function cmr_print_r($info)
// function cmr_print_token($info)



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/../control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*=================================================================*/
/*=================================================================*/
/**
* cmr_print_token()
* Print in good format an array
*
* @param mixed $info
* @return
*/
if(!(function_exists("cmr_print_token"))){
function cmr_print_token($info)
{
echo "<ul>";
if($info){
	foreach($info as $key => $value){
        if(is_array($value)){
            echo "[<b>" . $key . "</b>:" . token_name($key) . "<br />(<li>";
            cmr_print_token($value);
            echo "</li>)]; <br />";
    }else{
            echo "<b>" . $key . "</b>=" . token_name($value) . "; ";
    }
}
}
echo "</ul>";
   return $info;
}
}
/*=================================================================*/
/*=================================================================*/
/**
* cmr_print_r()
* Print in good format an array
*
* @param mixed $info
* @return
*/
if(!(function_exists("cmr_print_r"))){
function cmr_print_r($info)
{
echo "<ul>";
if(is_array($info)){
	foreach($info as $key => $value){
        if(is_string($value) || is_int($value) || is_real($value) || is_bool($value)){
            echo "<li><b>" . ($key) . "</b>=" . (($value)) . ";</li>";
    }else{
            echo "<li>[<b>" . $key . "</b>:<br />(";
            cmr_print_r($value);
            echo ")];</li>";
    }
}
}else{
            echo "<li>"; print_r($info); echo "<li>";
	}
echo "</ul>";
   return $info;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_match_include"))){
function cmr_match_include($template = "", $position = "")
    {
   return strpos($template, $position);
}
}
// 			$template1 = stristr($template, "<".$position.">");
// 			$template2 = stristr($template, "</".$position.">");
// 			$len0 = strlen($position);
// 			$len1 = strlen($template1);
// 			$len2 = strlen($template2);
// 			$len = strlen($template);
// 			$template = substr($template, $len1, $len - $len2);
//if(!empty($array_match)) $template = preg_replace("/(\{)([^}{ ]*)(\})/siU", "\$array_match['\\2']", $template);

/*=================================================================*/
if(!(function_exists("cmr_print_template"))){
function cmr_print_template($template, $position = "", $array_match = array())
    {
		if(($position)){
		    preg_match("|(<".$position.">)(.*)(</".$position.">)|siU", $template, $matches);
		    (empty($matches[2])) ? $template = "" : $template = $matches[2];
			}
	  if(($array_match)) {
	  $template = preg_replace_callback("/(\{)([^}{ ]*)(\})/siU", function ($m) use ($array_match) {return ($array_match[$m[2]]);}, ($template));
    }
		return str_replace(array("<template>","<template1>","</template>","</template1>"), array("","","",""), $template);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_prints"))){
function cmr_prints($text = "", $array_val = array())
{
	print("<hr /><b>" . $text . "</b><hr />");
	cmr_print_r($array_val);
   return true;
}
}
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_debug_print"))){
function cmr_debug_print($cmr_debug = array(), $class_module = array(), $cmr_config = array(), $cmr_themes = array(), $cmr_page = array(), $cmr_db = array(), $cmr_user = array(), $cmr_group = array(), $cmr_post_var = array(), $cmr_post_files = array(), $cmr_session = array(), $cmr_query = array(), $cmr_language = array())
{
echo "<hr /><b>" . cmr_translate("INCLUDED FILES") . "</b><hr />";
cmr_print_r(get_included_files());
echo "<hr /><b>" . cmr_translate("CMR DEBUG") . "</b><hr />";
cmr_print_r($cmr_debug);
echo "<hr /><b>" . cmr_translate("CMR APPLICATION CONFIGURATION") . "</b><hr />";
cmr_print_r($cmr_config);
echo "<hr /><b>" . cmr_translate("CMR MODULE") . "</b><hr />";
cmr_print_r($class_module);
echo "<hr /><b>" . cmr_translate("CMR THEMES") . "</b><hr />";
cmr_print_r($cmr_themes);
echo "<hr /><b>" . cmr_translate("CMR PAGE") . "</b><hr />";
cmr_print_r($cmr_page);
echo "<hr /><b>" . cmr_translate("CMR DATABASE") . "</b><hr />";
cmr_print_r($cmr_db);
echo "<hr /><b>" . cmr_translate("CMR QUERY") . "</b><hr />";
cmr_print_r($cmr_query);
echo "<hr /><b>" . cmr_translate("CMR USER") . "</b><hr />";
cmr_print_r($cmr_user);
echo "<hr /><b>" . cmr_translate("CMR GROUP") . "</b><hr />";
cmr_print_r($cmr_group);
echo "<hr /><b>" . cmr_translate("CMR POST VAR") . "</b><hr />";
cmr_print_r($cmr_post_var);
echo "<hr /><b>" . cmr_translate("CMR POST FILES") . "</b><hr />";
cmr_print_r($cmr_post_files);
echo "<hr /><b>" . cmr_translate("CMR SESSION") . "</b><hr />";
cmr_print_r($cmr_session);
echo "<hr /><b>" . cmr_translate("SERVER") . "</b><hr />";
cmr_print_r($_SERVER);
echo "<hr /><b>" . cmr_translate("ENV") . "</b><hr />";
cmr_print_r($_ENV);
echo "<hr /><b>" . cmr_translate("COOKIES") . "</b><hr />";
cmr_print_r($_COOKIE);
echo "<hr /><b>" . cmr_translate("PHP EXTENTION LOAD") . "</b><hr />";
cmr_print_r(get_loaded_extensions());
echo "<hr /><b>" . cmr_translate("PHP CONFIGURATION OPTION") . "</b><hr />";
cmr_print_r(ini_get_all());
// echo "<hr /><b>" . cmr_translate("LANGUAGES") . "</b><hr />";
// cmr_print_r($cmr_language);
// echo "<hr /><b>" . cmr_translate("SESSION") . "</b><hr />";
// print_r($_SESSION["ahref"]);
echo "<hr /><b>" . cmr_translate("END") . "</b><hr />";
   return  1;
}
}
/*=================================================================*/

// ======================================================
if(!(function_exists("cmr_win_die"))){
function cmr_win_die($comment){
	print("<table border=\"1\"><tr><th>");
	print("!! EVENT !!");
	print("</th></tr><tr><td>");
	print(str_replace("!!? (control session.cache_limiter, session.cache_expire) !,", "", $comment));
	print("</td></tr></table>");
  exit;
  return  true;
}
}
// ======================================================

/*=================================================================*/
if(!(function_exists("cmr_get_data_event"))){
function cmr_get_data_event($cmr_config = array(), $cmr_session = array(), $cmr_event = array())
    {

	@ cmr_error_log($cmr_config, $cmr_session, "Script=" . $cmr_event["script"] . " Line=" . $cmr_event["line"] . " : " . $cmr_event["comment"]);

	switch($cmr_event["name"]){

		    case "get_not_found":
	            syslog (LOG_WARNING, "get_not_found");
			 	die("<br />".$cmr_event["comment"]."!, click <a href=\"" .  $_SERVER['PHP_SELF'] . $cmr_event["data"] . "\" > Here </a>  to login before continue ");
		    break;

		    case "login_request":
		    case "login_apache":
		    case "login_radius":
		    case "login_other":
		    case "login_url":
		    case "login_no":
		    case "login_ip":
		    case "login_cookie":
		    case "logout_request":
		    case "wrong_ip_account":
		    case "wrong_account":
//			    echo "<script language=\"javascript\">alert('" . $cmr_event["comment"] . "');</script>";
			    cmr_header("Location: " .  $_SERVER['PHP_SELF'] . $cmr_event["data"]);
		    break;

		    case "wrong_account_object":
		    case "wrong_cookie_account":
		    case "wrong_guest_account":
		    case "wrong_url_account":
		    case "empty_user":
		    case "user_not_found":
		    case "not_authorized":
		    case "var_restrict":
//			    echo "<script language=\"javascript\">alert('" . $cmr_event["comment"] . "');</script>";
			 	cmr_win_die($cmr_event["comment"]."!, click <a href=\"" .  $_SERVER['PHP_SELF'] . $cmr_event["data"] . "\" > Here </a>  to login before continue ");
		    break;


		    case "wrong_sessionid":
		    case "not_allow_session":
			 	cmr_win_die($cmr_event["comment"]."!, click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
		    break;

		    case "wrong_sid_send":
		    case "good_login":
		    case "login_form":
		    case "logout":
		    default:
		    break;
		}

      return  true;
}
}
/*=================================================================*/

// ======================================================
function change_a($strlink, $mod_middle){
    if(!((cmr_searchi("index.php\?cod=", $strlink)) || (cmr_searchi("download.php", $strlink)))){
        if((cmr_searchi("index.php", $strlink))){
            $strlink = cmr_searchi_replace("index.php", $mod_middle , $strlink);
            // $strlink=cmr_searchi_replace("index.php",substr(0,strpos("?", $cmr->get_page("middle1")), $cmr->get_page("middle1")), $strlink);
    }
        $strlink = "index.php?middle1=" . $strlink;
}
    return $strlink;
}
// ======================================================

/*=================================================================*/
?>
