<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_security.php
 *   --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








func_security.php,  2011-Oct
*/

// function cmr_auth_basic($cmr_config = array(), $PHP_SELF)
// function cmr_policy($cmr_config = array(), $mod = "", $policy = "", $type)
// function input_hidden($param, $cmr_config = array()) // decode with functin get_post()
// function cmr_var_name($pre_val = "", $matches_value = "", $quote=""){
// function add_encode_post_var($cmr_config = array(), $cmr_post_var = array(), $pre_match = "")
// function accept_mod($cmr_config = array(),  $module_name)
// function secure_return_href($cmr_config = array(), $to_return)
// function decode_url($cmr_config = array(), $to_code = "")
// function encode_url($cmr_config = array(), $to_code = "")
// function html_control($doc_html, $type = 0)
// function cmr_where_query($cmr_config = array(), $cmr_user = array(), $cmr_action = array(), $conn=NULL)
// function control_magic_quote($val, $mode = "")
// function control_len($data, $length = 254)
// function secure_all_var()
// function pw_decode($pass)
// function pw_encode($pass)

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/../function.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


/*=================================================================*/
/*=================================================================*/
if(!(function_exists("pw_encode"))){
function pw_encode($pass)
{
    return md5($pass);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("pw_decode"))){
function pw_decode($pass)
{
    return $pass;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("secure_all_var"))){
function secure_all_var()
{
    if(get_magic_quotes_gpc()){
        @ array_walk($_GET, 'stripslashes');
        @ array_walk($_POST, 'stripslashes');
        @ array_walk($_REQUEST, 'stripslashes');
        @ array_walk($_COOKIE, 'stripslashes');
    }
    return true;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("control_len"))){
function control_len($data, $length = 254)
{
	if(is_array($data))
	foreach($data as $key => $value)  $data[$key] = control_len($value, $length);

    $data = substr($data, 0, $length);
    return $data;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("control_magic_quote"))){
function control_magic_quote($val, $mode = "")
{
	if(is_array($val))
	foreach($val as $key => $value)  $val[$key] = control_magic_quote($value, $mode);
    // Stripslashes
    if(get_magic_quotes_gpc()) $val = stripslashes($val);
    // Protection if not numeric
    if(!is_numeric($val))
        if(($mode == "mysql")&&(function_exists("cmr_escape"))){
            $val = cmr_escape($val);
        }
//         else {
//             $val = addslashes($val);
//         }
    // ========================================
    // print($val;exit);
    return $val;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("html_control"))){
function html_control($doc_html, $type = 1)
{
	if(is_array($doc_html))
	foreach($doc_html as $key => $value)  $doc_html[$key] = html_control($value, $type);

    if($type){
        $doc_html = cmr_searchi_replace("<script", "<(script)", $doc_html);
        $doc_html = cmr_searchi_replace("<iframe", "<(iframe)", $doc_html);
        $doc_html = cmr_searchi_replace("<form", "<(form)", $doc_html);
        $doc_html = cmr_searchi_replace("<input", "<(input)", $doc_html);
        $doc_html = cmr_searchi_replace("<textarea", "<(teaxtarea)", $doc_html);
        $doc_html = cmr_searchi_replace("<applet", "<(applet)", $doc_html);
        $doc_html = cmr_searchi_replace("<object", "<(object)", $doc_html);
    }
    if($type > 1){
        $doc_html = strip_tags($doc_html, '<b><high><medium><low><h1><b><i><a><ul><li><pre><hr><blockquote><img><p><table><tr><td>');
    }
    if($type > 2){
        $doc_html = strip_tags($doc_html, '<high><medium><low>');
    }
    if($type > 3){
        $doc_html = htmlentities($doc_html);
    }

    return ($doc_html);
} /*=================================================================*/
} /*=================================================================*/
if(!(function_exists("base64_encode_url"))){
function encode_url($cmr_config = array(), $to_code = "")
{
// 	rawurlencode // base64_encode
    $to_code = $cmr_config["cmr_url_separator"] . $to_code . $cmr_config["cmr_url_separator"];
    if(!(empty($cmr_config["cmr_code_url"]))){
        return (urlencode(str_rot13($to_code)));
    }else{
        return ($to_code);
    }
} /*=================================================================*/
} /*=================================================================*/
if(!(function_exists("base64_decode_url"))){
function decode_url($cmr_config = array(), $to_code = "")
{
    if(!(empty($cmr_config["cmr_code_url"]))){
        return (str_rot13(urlencode($to_code)));
    }else{
        return ($to_code);
    }
} /*=================================================================*/
} /*=================================================================*/
/**
 * secure_return_href()
 *
 * @return
 **/
if(!(function_exists("secure_return_href"))){
function secure_return_href($secure = 0, $to_return)
{
	if($secure){
		$_SESSION["ahref"][md5($to_return)] = $to_return;
   		return "index.php?action_cod=" . md5($to_return);
    	}
  		return $to_return . "&amp;cmr_sid=" . session_id();
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_get_action_code"))){
function secure_get_href($post_var)
{
// -------------------
if(!empty($_SESSION["ahref"][$post_var["action_cod"]])){
	// -------------------
	// $post_var["action_cod"] = get_post("action_cod", "get");
	$to_parse = $_SESSION["ahref"][$post_var["action_cod"]];
	$to_parse = trim(html_entity_decode(substr($to_parse, strpos($to_parse, "?") + 1)));
	// -------------------
	parse_str($to_parse, $parsed);
	$post_var = array_merge($post_var, $parsed);
}
    return $post_var;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("accept_mod"))){
function accept_mod($cmr_config = array(), $cmr_user = array(), $module_name)
{
//----------------------
if(empty($cmr_config["cmr_secure_mode"])) return 1;
if(empty($cmr_config["host_name"])) $cmr_config["host_name"] = "";
//----------------------

//----------------------
$module_name = str_replace("\\", "/", $module_name);
if(cmr_search("/", $module_name)) $module_name = substr($module_name, strrpos($module_name, "/") + 1);
$module_base_name = cmr_basename($module_name);
//----------------------

//----------------------
if(empty($cmr_config["type_" . $module_base_name])) $cmr_config["type_" . $module_base_name] = intval($cmr_config["cmr_developer_type"]);
if(empty($cmr_user)) $cmr_user = cmr_get_user();
$need_type = intval($cmr_config["type_" . $module_base_name]);
$my_type = intval($cmr_user["authorisation"]);
//----------------------

//----------------------
if($my_type >= $cmr_config["cmr_developer_type"]) return 1;
//----------------------

//----------------------
if(($need_type) && (is_resource(cmr_get_db_connection())))
return cmr_policy($cmr_config, $module_base_name, $need_type, $my_type);
//----------------------

//----------------------
@$allow_mod_ip = $cmr_config["allow_" . $module_base_name];
@$deny_mod_ip = $cmr_config["deny_ip" . $module_base_name];

$allow_mod_ip = trim(implode("|", explode(", ", $allow_mod_ip)));
$deny_mod_ip = trim(implode("|", explode(", ", $deny_mod_ip)));

$allow_mod_ip = cmr_search_replace("[*]", ".*", $allow_mod_ip);
$deny_mod_ip = cmr_search_replace("[.][.][*]", ".*", $deny_mod_ip);
//----------------------

//----------------------
if(empty($my_type)) $my_type = "0";
if(empty($need_type)) $need_type = $my_type;
//----------------------

//----------------------
$ip = "127.0.0.1";
if(!empty($_SERVER['REMOTE_HOST']))  $ip = $_SERVER['REMOTE_HOST'];
$host = $cmr_config["host_name"];
//----------------------

//----------------------
if(strlen($module_name) < 2) return 0;
//----------------------

//----------------------
if(!empty($ip)){
    if((!empty($cmr_config["deny_ip" . $module_base_name])) && ($deny_mod_ip) && (cmr_searchi($deny_mod_ip, $ip))){
        cmr_error_log($cmr_config, cmr_get_session(),  "Cannot load module [" . $module_name . "], " . $ip . " in deny_ip list");
        return 0;
    }
}
//----------------------

//----------------------
if(!empty($host)){
    if((!empty($cmr_config["deny_ip" . $module_base_name])) && ($deny_mod_ip) && (cmr_searchi($deny_mod_ip, $host))){
        cmr_error_log($cmr_config, cmr_get_session(),  "Cannot load module [" . $module_name . "], " . $host . " in deny_ip list");
        return 0;
    }
 }
//----------------------

//----------------------
if($my_type >= intval($cmr_config["cmr_admin_type"])) return 1;
//----------------------

if(isset($need_type) && (($need_type) <= ($my_type))){
	//----------------------
	if(!empty($cmr_config["allow_ip_" . $module_base_name]) && ($allow_mod_ip)){
	     if(cmr_searchi($allow_mod_ip, $ip)) return 1;
	     if(cmr_searchi($allow_mod_ip, $host)) return 1;
	}
 return 1;
//----------------------
}

//----------------------
//----------------------




    return 1;
} /*=================================================================*/
} /*=================================================================*/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("add_encode_post_var"))){
function add_encode_post_var($cmr_config = array(), $cmr_post_var = array(), $pre_match = "")
{
     // ===============================================================
$array_key = "";
if((!empty($cmr_post_var["sid"])) && ($cmr_post_var["sid"] != session_id())){
// 	    event["id"] = "25";
// 	    event["name"] = "wrong_sid_send";
// 	    event["line"]=__LINE__;
// 	    event["script"]=___FILE___;
// 	    event["data"] = "";
// 	    event["comment"] = " Wrong session id[".$cmr_post_var["sid"]."]  send, the good one is ".session_id();
// 	    run_event();
    cmr_error_log($cmr_config, cmr_get_session(), "Script=" . ___FILE___ . "  Line=" . __LINE__ . " : " . " Wrong session id[".$cmr_post_var["sid"]."]  send, the good one is ".session_id());
// 	die("Trying to send a bad session when getting data (id ".$cmr_post_var["sid"].")!=".session_id().", or cookies are not activated,  click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
// 	session_id()=$cmr_post_var["sid"];
}
       // ===============================================================

if(((isset($cmr_post_var["values"]) && isset($cmr_post_var["encode"]) && isset($cmr_post_var["keys"])))){
    // ------ param from link----------
    if((isset($cmr_post_var["encode"])) && ($cmr_post_var["encode"] == "1")){ // --if code------
        $array_val = explode($cmr_config["cmr_url_separator"], decode_url($cmr_config,  $cmr_post_var["values"]));
        $array_key = explode($cmr_config["cmr_url_separator"], decode_url($cmr_config,  $cmr_post_var["keys"]));
    } elseif((isset($cmr_post_var["encode"])) && ($cmr_post_var["encode"] == "2")){
    }else{
        // -- code param--------
       @ $array_val = explode($cmr_config["cmr_url_separator"], $cmr_post_var["values"]);
       @ $array_key = explode($cmr_config["cmr_url_separator"], $cmr_post_var["keys"]);
    }
        // ===============================================================



// cod=0&keys=page_title::middle1&vals=new_ticket::modules/new_ticket.php?&cmr_sid=65f777de4c69f137247b2c5d6cff8474
// 		print_r($array_key);
// 		print("<hr />");
// 		print_r($array_val);
// 		exit;
	if($array_key)
    foreach($array_key as $key => $val_key){
        /**
         * Important for the security **************************
         */
        if(($val_key) && cmr_searchi("'" . $val_key . "'", $cmr_config["cmr_var_restrict"])){
            cmr_error_log($cmr_config, cmr_get_session(), "Script=" . ___FILE___ . "  Line=" . __LINE__ . " : " . " Security alert, trying to change the restrict var name:" . $key);
			die(" Security alert, trying to change the restrict var name:" . $val_key);
        }
        /**
         * Important for the security **************************
         */
        // ---- assign information in table inf[]-----
        if(!empty($array_val[$key])) if(cmr_search(".+\?", ($array_val[$key]))){ // --module name --
            // -------------------
            @list($cmr_post_var[($val_key)], $other) = explode("?", $array_val[$key]); //!!!!!!!!assign here!!!!!!!!
            $cmr_post_var = cmr_load_param($cmr_config, $cmr_post_var, $other);
//             if(!$cmr_post_var[($val_key)]){
//                 unset($cmr_post_var[($val_key)]);
                // unset($cmr_post_var[($val_key)]);
//             }
            // -------------------
            if((isset($other)) && ($other != "")){
                // -- sended param (configuration file)
               @ $other1 = explode("&", $other);
                $cmr_post_var = cmr_load_param($cmr_config, $cmr_post_var, $other1);
                // --end sended param after module name;
            };
        }else{
                    empty($val_key) or $cmr_post_var[$val_key] = $array_val[$key]; //!!!!!!assign here!!!!!!
        }

        $key++;
    };
}else { // ---cod and keys and vals are not send --------
}
// ============================================
    return $cmr_post_var;
}
}
// ============================================
// ============================================
if(!(function_exists("cmr_var_name"))){
function cmr_var_name($pre_val = "", $matches_value = "", $quote = ""){
// 	global $match_quote;
// 	global $the_quote;
	$i = 0;
	while(isset($GLOBALS["match_" . $i])){
		$i++;
	}
	$GLOBALS["match_" . $i] = $matches_value;
	$GLOBALS["match_quote_" . $i] = $quote;
   return stripslashes($pre_val . $quote . "@_" . $i . "_@" . $quote);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("input_hidden"))){
function input_hidden($param, $secure_mode = "") // decode with functin get_post()
{
if(empty($secure_mode)) $secure_mode = cmr_get_config("cmr_secure_mode");
if(empty($secure_mode)) return $param;
// echo "\$param=".htmlentities($param).";<br />";
	$param = trim($param);

	$type = substr(stristr($param, " type="),6,10);
// 	echo "\$type=".htmlentities($type).";<br />";

	$param = preg_replace('/([^\\\])"(.*[^\\\])(")/sU', "cmr_var_name('\\1', '\\2', '\\3')", $param);
	$param = preg_replace("/([^\\\])'(.*[^\\\])(')/sU", "cmr_var_name('\\1', '\\2', '\\3')", $param);
// 	$param = cmr_search_replace("/[[:space:]]+/eU", " ", $param);
// echo "\$param=".htmlentities($param).";<br />";
	$param = preg_replace("/[\\n\\t\\f]+/U", " ", $param);
	$param = str_replace("  ", " ", $param);
// 	$param = str_replace("'", '"', $param);
	$param = cmr_search_replace(" =|= | = ", "=", $param);
	$param = cmr_search_replace("\"|'", "", $param);
// echo "\$param=".htmlentities($param).";<br />";

	$name = substr(stristr($param, " name="),6);
// echo "\$name=".htmlentities($name).";<br />";
	$name = substr($name, 0, strpos($name, "_@")+2);
// echo "\$name=".htmlentities($name).";<br />";


	$value = substr(stristr($param, " value="),7);
// echo "\$value=".htmlentities($value).";<br />";
	$value = substr($value, 0, strpos($value, "_@")+2);
// echo "\$value=".htmlentities($value).";<br />";



if(empty($GLOBALS["match_" . cmr_search_replace("@_|_@", "", $name)]))  $GLOBALS["match_" . cmr_search_replace("@_|_@", "", $name)] = "";
if(empty($GLOBALS["match_" . cmr_search_replace("@_|_@", "", $value)]))  $GLOBALS["match_" . cmr_search_replace("@_|_@", "", $value)] = "";

$name1 = $GLOBALS["match_" . cmr_search_replace("@_|_@", "", $name)];
$value1 = $GLOBALS["match_" . cmr_search_replace("@_|_@", "", $value)];

   return  cmr_input_hidden($name1, $value1, $type);
}
}

/*=================================================================*/
/*=================================================================*/

if(!(function_exists("cmr_input_hidden"))){
    /**
     * cmr_input_hidden()
     *
     * @return
     **/
function cmr_input_hidden($name, $value = "", $type = "hidden") // decode with functin get_post()
{
	$name1 = "cmr_" . md5("cmr_" . $name);
	$value1 = "cmr_" . md5("cmr_" . $value);
	$_SESSION[$name1][$value1] = $value;
// echo "\$name1=".htmlentities($name1).";<br />";
// echo "\$value1=".htmlentities($value1).";";exit;

	if(cmr_search("checkbox", $type)) return "<input type=\"checkbox\" name=\"" . $name1 . "\" value=\"" . $value1 . "\" />";
	if(cmr_search("hidden", $type)) return "<input type=\"hidden\" name=\"" . $name1 . "\" value=\"" . $value1 . "\" />";


   return  "<input type=\"hidden\" name=\"" . $name1 . "\" value=\"" . $value1 . "\" />";
}
}

/*=================================================================*/
/*=================================================================*/
/*=================================================================*/

if(!(function_exists("cmr_where_query"))){
    /**
     * cmr_where_query()
     *
     * @return
     **/
 function cmr_where_query($cmr_config = array(), $cmr_user = array(), $cmr_action = array(), $conn = NULL)
 {
    $where_query = array();
    $accept_table = "";
    $accept_right = "";
    $a = 1;
    if(empty($cmr_config) || empty($cmr_user) || empty($cmr_action)) return " (1) ";
    if(empty($cmr_user["cmr_secure_mode"])) return " (1) ";
    if(empty($cmr_user["authorisation"])) $cmr_user["authorisation"] = "0";
    if(empty($cmr_user["auth_list_group"])) $cmr_user["auth_list_group"] = "'guest'";
    if(empty($cmr_user["auth_email"])) $cmr_user["auth_email"] = "guest@localhost";
    if(intval($cmr_user["authorisation"]) > intval($cmr_config["cmr_admin_type"])) return " (1) ";

    $cmr_action["table_name"] = trim($cmr_action["table_name"]);
    $cmr_action["action"] = trim(strtolower($cmr_action["action"]));

    if(empty($cmr_action["table_name"])) return " (1) ";

    $where_query[0] = " (0) ";//all negated
    $where_query[1] = " (1) ";//all accepted
    $where_query[2] = " (1) ";//all accept

    $cmr_action["table_name"] = cmr_searchi_replace("^" . $cmr_config["cmr_table_prefix"], "", $cmr_action["table_name"]);

	if(!($cmr_action["column"]) && ($cmr_config["cmr_secure_mode"])){

		if($cmr_config["cmr_column_control"]){
		$array_table = explode(";", $cmr_config["cmr_column_control"]);
		foreach($array_table as $key => $value){
			if($value) list($the_table, $the_columns) = explode(":", $value);
			$arra_control[trim($the_table)] = trim($the_columns);
		}
		}else{
			$arra_control["account"] = "user_email";
			$arra_control["contact"] = "email";
			$arra_control["comment"] = "sender";
			$arra_control["certificate"] = "user_email";
			$arra_control["cve_action"] = "user_email,group_name";
			$arra_control["email"] = "mail_from,mail_to,mail_cc,mail_bcc";
			$arra_control["father_groups"] = "group_father,group_child";
			$arra_control["groups"] = "name,admin_email";
			$arra_control["history"] = "user_email";
			$arra_control["message"] = "sender,mail_to,mail_cc,mail_bcc,users_dest,groups_dest";
			$arra_control["monitor"] = "group_name";
			$arra_control["notify"] = "mail_from,mail_to,mail_cc,mail_bcc";
			$arra_control["policy"] = "allow_email,allow_groups";
			$arra_control["session"] = "user_email";
			$arra_control["sla"] = "user_email,group_name";
			$arra_control["ticket"] = "call_log_group,work_by,assign_to,call_log_user,call_log_group,mail_from,mail_to,mail_cc,mail_bcc";
			$arra_control["user"] = "email";
			$arra_control["user_groups"] = "user_email,group_name";
			$arra_control["va"] = "group_name";
			}



		if(!empty($arra_control[trim($cmr_action["table_name"])])) $cmr_action["column"] = $arra_control[trim($cmr_action["table_name"])];


	}


	if(!empty($cmr_action["column"])){
	$a = 2;
	$cmr_column = trim($cmr_action["column"]);
	if(cmr_search(",", $cmr_column)){
	    $array_column = explode(",", $cmr_column);
    	$where_query[2] = " ((0) ";
	    foreach($array_column as $key => $cmr_column){
	        $cmr_column = trim($cmr_column);
		    $where_query[2] .= " OR (" . $cmr_config["cmr_table_prefix"] . $cmr_action["table_name"] . "." . $cmr_column . " IN (" . $cmr_user["auth_list_group"] . ")) ";
		    $where_query[2] .= " OR (" . $cmr_config["cmr_table_prefix"] . $cmr_action["table_name"] . "." . $cmr_column . "='" . $cmr_user["auth_email"] . "') ";
		}
    	$where_query[2] .= ") ";
    }else{
	    $where_query[2] = " ((" . $cmr_config["cmr_table_prefix"] . $cmr_action["table_name"] . "." . $cmr_column . " IN (" . $cmr_user["auth_list_group"] . ")) ";
	    $where_query[2] .= " OR (" . $cmr_config["cmr_table_prefix"] . $cmr_action["table_name"] . "." . $cmr_column . "='" . $cmr_user["auth_email"] . "')) ";
	}
	}



	if(($conn) && ($a != 2)){
	$a = 2;
	cmr_db_policy($cmr_config, $cmr_user, $cmr_action, $conn) ? $where_query[2] = " (1) " : $where_query[2] = " (0) ";
	}else{
	$cfg_query_accept = $cmr_config["cmr_query_type_" . intval($cmr_user["authorisation"])];
	$array_accept = explode(";", trim($cfg_query_accept));
	foreach($array_accept as $key => $policy){
	 if(strpos($policy, ":")) list($accept_table, $accept_right) = explode(":", trim($policy));
	 $accept_table = strtolower("'" . str_replace(",", "','", str_replace(" ", "", $accept_table)) . "'");
	 $accept_right = strtolower("'" . str_replace(",", "','", str_replace(" ", "", $accept_right)) . "'");
	 if(stristr($accept_table, "'" . $cmr_action["table_name"] . "'") || stristr($accept_table, "'all'")){
	     if(stristr($accept_right, "'+" . $cmr_action["action"] . "'") || stristr($accept_right, "'+all'")){
		  $a = 1;
	     }elseif(stristr($accept_right, "'-" . $cmr_action["action"] . "'") || stristr($accept_right, "'-all'")){
		  $a = 0;
	   }elseif(stristr($accept_right, "'" . $cmr_action["action"] . "'") || stristr($accept_right, "'all'")){
		  $a = 2;
	   }
	  }
	  }
	}
//     echo("<br />\$authorisation=" . $cmr_user["authorisation"] . ";\$where_query=[" . $where_query[$a] . "]");

    return $where_query[$a] ;
 }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_policy"))){
    /**
     * cmr_policy()
     *
     * @param array $cmr_config
     * @param string $mod
     * @param string $policy
     * @return
     **/
 function cmr_policy($cmr_config = array(), $mod = "", $policy = "", $type)
 {


	$db_policy = 1;
	if(empty($cmr_config["cmr_secure_mode"])) return $db_policy;
	if(is_resource(cmr_get_db_connection())){
		$cmr_user = cmr_get_user();
		//     $cmr_user["authorisation"] = $type;
		$cmr_action["source"] = "";
		$cmr_action["line"] = "";
		$cmr_action["action"] = $policy;
		$cmr_action["table_name"] = $mod;
		$db_policy = cmr_db_policy($cmr_config, $cmr_user, $cmr_action, cmr_get_db_connection());
	}

    if(intval($type) >= intval($cmr_config["cmr_admin_type"])) return (1 && $db_policy);
    if(empty($mod) || empty($policy) || empty($cmr_config)) return (1 && $db_policy);
    if(intval($type) >= intval($cmr_config["cmr_admin_type"])) return (1 && $db_policy);

	$policy = strtolower(trim(str_replace(" ", "", $policy)));
	$policy = "'" . (str_replace(",", "','", $policy)) . "'";

	if((stristr($policy, "'+" . $mod))) return (1 && $db_policy);
	if((stristr($policy, "'" . $mod))) return (1 && $db_policy);
	if((stristr($policy, "'-" . $mod))) return (0 || $db_policy);

	if(stristr($policy, "'*'")) return (1 && $db_policy);
	if(stristr($policy, "'+all'")) return (1 && $db_policy);
	if(stristr($policy, "'-all'")) return (0 || $db_policy);


   return (1 && $db_policy);

 }/*=================================================================*/
}/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_new_login"))){
function cmr_new_login($cmr_config = array(), $cmr_user=array())
{
$user_url = get_post("auth_user_send", "get");
$pw_url = get_post("auth_pw_send", "get");
$cmr_mode = get_post("cmr_mode", "get");
$login = get_post("login"); //--send by form login.php --

// ======================================================================
return  (
        ((!empty($user_url)) && (isset($pw_url)) && (!empty($cmr_config["cmr_url_auth"]))) ||
        (!empty($_SERVER['PHP_AUTH_USER']) && (empty($cmr_user["auth_user_send"]))) ||
        (!empty($_SERVER['REMOTE_USER']) && (empty($cmr_user["auth_user_send"]))) ||
        ((!empty($cmr_config["cmr_ip_auth"])) && (!empty($cmr_config["cmr_auth_user"])) && (empty($cmr_user["auth_user_send"]))) ||
        (!empty($login)) ||
        (!empty($cmr_mode))
        );



//         (empty($cmr_user["object"]))
// //         (defined("cmr_no_user") && (cmr_no_user) && (!isset($cmr_user["auth_user_send"]))) ||
return true;
}
}
/*=================================================================*/
if(!(function_exists("cmr_auth_basic"))){
function cmr_auth_basic($cmr_config = array(), $PHP_SELF)
{
    @cmr_header('WWW-Authenticate: Basic realm="Trouble Shooting ticket Manager  Inserire ID corretto" ');
    @cmr_header('HTTP/1.0 401 Unauthorized');
    // --------------
    cmr_error_log($cmr_config, cmr_get_session(),  "Apache authentification not Completed");
    die("login failled, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
    // --------------
	// 	cmr_header("Location:" .  $_SERVER['PHP_SELF'] . "?cmr_mode=logout");
	// 	include_once(cmr_get_path("index") . "logout.php");
	// die(E_ERROR." <br \>".E_WARNING." <br \>".E_PARSE." <br \>".E_NOTICE." <br \>".__FUNCTION__." <br \>".__FILE__." <br \>".__LINE__." <br \>");;
} /*=================================================================*/
} /*=================================================================*/
?>
