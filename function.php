<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * function.php
 *   --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









function.php,  2011-Oct
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*=================================================================*/
/*=================================================================*/
function __autoload($class_to_load = "") {
//     if(!class_exists($class_to_load)) include_once $class_to_load . '.php';
}
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_get_global"))){
function cmr_get_global($string)
{
	return $GLOBALS[$string];
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_search"))){
function cmr_search($pattern, $string)
{
	return @preg_match("/" . $pattern . "/", $string);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_search_replace"))){
function cmr_search_replace($pattern, $replacement, $subject)
{
	return preg_replace("/" . $pattern . "/", $replacement, $subject);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_split"))){
function cmr_split($pattern, $string)
{
	return preg_split("/" . $pattern . "/", $string);
}
}
/*=================================================================*/
if(!(function_exists("cmr_searchi"))){
function cmr_searchi($pattern, $string)
{
	return preg_match("/" . $pattern . "/i", $string);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_searchi_replace"))){
function cmr_searchi_replace($pattern, $replacement, $subject)
{
	return preg_replace("/" . $pattern . "/i", $replacement, $subject);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_spliti"))){
function cmr_spliti($pattern, $string)
{
	return preg_split("/" . $pattern . "/i", $string);
}
}
/*=================================================================*/
if(!(function_exists("cmr_get_debug"))){
function cmr_get_debug($value = "")
{
	if($value) return $GLOBALS["cmr"]->debug[$value];
	return $GLOBALS["cmr"]->debug;
}
}
/*=================================================================*/
if(!(function_exists("cmr_set_debug"))){
function cmr_set_debug($key = "", $value = "")
{
	if($key) return ($GLOBALS["cmr"]->debug[$key] = $value);
	return array_push ($GLOBALS["cmr"]->debug, $value);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_info_print"))){
function cmr_info_print($value = "")
{
	if(cmr_get_user("authorisation") > cmr_get_config("cmr_noc_type"))
	return print($value);
	return false;
}
}
/*=================================================================*/

if(!(function_exists("get_post1"))){
function get_post1($arg, $method = "")
{
$return_val = "";
	    if(empty($method)) $method = isset($_GET[$arg]) ? "get" : "post";

	    if($method == "get"){
	        $return_val = isset($_GET[$arg]) ? $_GET[$arg] : $return_val;
	    }else{
	        $return_val = isset($_POST[$arg]) ? $_POST[$arg] : $return_val;
	    }

return $return_val;
}
}
/*=================================================================*/
if(!(function_exists("cmr_escape"))){
function cmr_escape($arg = "")
{
   if(function_exists("get_magic_quotes_gpc"))
   if(get_magic_quotes_gpc()) $arg = stripslashes($arg);

   if((cmr_get_db_connection())){
	switch(cmr_get_config("db_type")){
      case "mysqli":  return addslashes($arg);
      break;
      case "mysql":  return addslashes($arg);
      break;
      case "maxdb":  return maxdb_real_escape_string($arg);
      break;
      case "pg":  return pg_escape_string($arg);
      break;
      case "db2":  return db2_escape_string($arg);
      break;
      case "dbx":  return dbx_escape_string($arg);
      break;
      case "mysql":  return mysqli_escape_string($arg);
      break;
      case "mysql":  return ingres_escape_string($arg);
      break;
      case "sqlite":  return sqlite_escape_string($arg);
      break;
      default:  return addslashes($arg);
	}
	}

   return addslashes($arg);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_unescape"))){
function cmr_unescape($arg = "")
{
   if(function_exists("get_magic_quotes_gpc"))
   if(get_magic_quotes_gpc()) $arg = stripslashes($arg);
   return ($arg);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("my_ereg_replace"))){
function my_ereg_replace($item1, $item2){
    return cmr_search_replace($item2, "", $item1);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("image_exists"))){
function image_exists($images){
// 	if(file_exists($images))
	if($images){
	$array_extension = array(".jpg", ".png", ".gif", ".bmp", ".svg", "jpeg", "jpe");
	$extention = strrchr($images, ".");
	return in_array($extention, $array_extension);
	}
    return false;
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * language_text()
 *
 * @param mixed $title1
 * @param mixed $title2
 * @return
 **/
if(!(function_exists("language_text"))){
function language_text($title1, $title2)
{
    $return_text = "&nbsp;" . (ucfirst($title2)) . "&nbsp;"; //--with the good language --
    if(($title1) || ($title1 == "0")) $return_text = ucfirst($title1);

    return $return_text;
}
}
 /*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_get_path"))){
function cmr_get_path($arg="", $cmr_config = array())
{
	if($arg == "index") $arg = "";
    if(empty($cmr_config))
    if(cmr_get_config()) $cmr_config = cmr_get_config();
	if(empty($arg)) return $cmr_config["cmr_path"];
	if($cmr_config["cmr_" . $arg . "_path"]) return $cmr_config["cmr_" . $arg . "_path"];
return "";
}
}
 /*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_get_ext"))){
function cmr_get_ext($arg="", $cmr_config = array())
{
    if(empty($cmr_config))
    if(cmr_get_config()) $cmr_config = cmr_get_config();
	if($cmr_config["cmr_" . $arg . "_ext"]) return $cmr_config["cmr_" . $arg . "_ext"];
return "";
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_pure_name"))){
function cmr_pure_name($cmr_config = array(), $cmrmodule = "")
{
    if(empty($cmrmodule)) return $cmrmodule;
//     $cmrmodule = str_replace("\\", "/", $cmrmodule);
//     if(cmr_search("/", $cmrmodule)) $cmrmodule = substr($cmrmodule, strrpos($cmrmodule, "/") + 1);

    $root_name = basename($cmrmodule);

	if(empty($cmr_config["cmr_loader_prefix"]))
	$cmr_config["cmr_loader_prefix"] = "^new_|^update_|^delete_|^search_|^view_|^preview_|^report_|^menu_|^get_new_|^get_update_|^get_delete_|^get_search_|^get_view_|^get_report_";
	$partner = $cmr_config["cmr_loader_prefix"];

    if(!empty($cmr_config["cmr_table_prefix"])) $partner = $cmr_config["cmr_table_prefix"] . "|" . $partner;

   return $root_name;
}
}
/*=================================================================*/
/*=================================================================*/


if(!(function_exists("parse_module"))){
function parse_module($modulelink)
{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	 @list($mod_total_name, $conf_name, $other) = explode("|", $modulelink);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$module = array();
	$module["link"] = $modulelink;
    $module["other"] = $other;
    $module["param"] = "";
    $module["title"] = "";
    $module["conf_name"] = "";
    $module["name"] = $mod_total_name;
    $module["conf_name"] = $conf_name;
    $module["extension"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(cmr_search("[?]", $mod_total_name)){
        $module["param"] = substr($mod_total_name, strrpos($mod_total_name, "?") + 1);
        $module["name"] = substr($mod_total_name, 0, strrpos($mod_total_name, "?"));
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(cmr_search("[.]", $mod_total_name)){
        $module["extension"] = substr($module["name"], strrpos($module["name"], ".") + 1);
        $module["name"] = substr($module["name"], 0, strrpos($module["name"], "."));
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $module["title"] = ucfirst(cmr_translate(basename($module["name"])));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   return $module;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_header"))){
function cmr_header($locate)
{
    if(!cmr_cli()) return header($locate);
   return $locate;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_setcookie"))){
function cmr_setcookie($name = "camaroes", $value = "camaroes", $time = 3600)
{
   @ setcookie(strval($name), strval($value), intval($time));
   return $name;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_remote_user"))){
function cmr_remote_user()
{
        $user = cmr_cli() ? $_SERVER["REMOTE_USER"] : $_SERVER["USER"];
   return $user;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_gethostbyaddr"))){
function cmr_gethostbyaddr($host="")
{
	if(!cmr_cli()) return gethostbyaddr($host);
   return $host;
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * string_unique()
 *
 * @param mixed $text
 * @return
 **/
if(!(function_exists("string_unique"))){
function string_unique($text, $separator = "[,;:]")
{
	$return_text = trim($text);
	if((cmr_search($separator, $return_text)) && (strlen($return_text) > strlen($separator))){
	$array_text = cmr_split($separator, $return_text);
	$array_text = array_map("trim", $array_text);
	foreach($array_text as $value)
	if(strlen($value)>0) $array_return[] = trim($value);

	$array_text = array_unique($array_text);
    $return_text = implode(",", $array_return);

	}
 return trim($return_text);
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * xml_to_xls()
 *
 * @param mixed $xml
 * @return
 **/
if(!(function_exists("xml_to_xls"))){
function xml_to_xls($xml)
{
 return $xml;
}
}
/*=================================================================*/
/*=================================================================*/
// * HTTP Protocol defined status codes
if(!(function_exists("http_send_status"))){
function http_send_status($cmr_config, $number)
{
    if($cmr_config[$number]){
        cmr_header($cmr_config[$number]);
	    }else{
		cmr_header("HTTP/1.0 100 Continue");
	    }
    return $cmr_config[$number];
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_date_interval"))){
function cmr_date_interval($date1 = "", $date2 = "", $format = "d")
{
	$text = "";
	if(empty($date2)) $date2 = date("Y-m-d h:i:s");
	$intervale1 = strtotime($date1);
	$intervale2 = strtotime($date2);
	$intervale = ($intervale2 - $intervale1);
	switch($format){
		case "y":
			$text = $intervale % (60 * 60 * 24 * 365) . " (year)";
		break;

		case "m":
			$text = $intervale % (60 * 60 * 24 * 30) . " (month)";
		break;

		case "w":
			$text = $intervale % (60 * 60 * 24 * 7) . " (week)";
		break;

		case "d":
		default:
			$text = $intervale % (60 * 60 * 24) . " (day)";
		break;
		}

   return ($text);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("unix_timestamp"))){
function unix_timestamp($times)
{
// 	return cmr_date_interval($times, "", "d");
    $times = trim(strval($times)) . "00000000000000";
    $times = str_replace(":", "", $times);
    $times = str_replace(" ", "", $times);
    $times = str_replace("-", "", $times);
    $times = substr($times, 0, 4) . substr($times, 4, 2) . substr($times, 6, 2) . substr($times, 8, 2) . substr($times, 10, 2) . substr($times, 12, 2);
   return $times;
} /*=================================================================*/
} /*=================================================================*/
/*=================================================================*/
if(!(function_exists("conv_unix_timestamp"))){
function conv_unix_timestamp($times)
{
// 	return cmr_date_interval($times, "", "d");
    $times = trim(strval($times)) . "00000000000000";
    $times = str_replace(":", "", $times);
    $times = str_replace(" ", "", $times);
    $times = str_replace("-", "", $times);
    $times = substr($times, 0, 4) . "-" . substr($times, 4, 2) . "-" . substr($times, 6, 2) . " " . substr($times, 8, 2) . ":" . substr($times, 10, 2) . ":" . substr($times, 12, 2);
   return $times;
} /*=================================================================*/
} /*=================================================================*/
if(!(function_exists("conv_timestamp"))){
function conv_timestamp($times)
{
// 	return cmr_date_interval($times, "", "d");
    // $times=date("F d Y H:i:s.", $times);
    $times = trim(strval($times)) . "00000000000000";
    $times = str_replace(":", "", $times);
    $times = str_replace(" ", "", $times);
    $times = str_replace("-", "", $times);

//     $count = date("(Y) (M) (D) (H) (M)", time() - time((substr($times, 0, 14))));

    $times = strftime("%a,%d %b %y %Hh:%M", strtotime(substr($times, 0, 4) . "-" . substr($times, 4, 2) . "-" . substr($times, 6, 2) . " " . substr($times, 8, 2) . ":" . substr($times, 10, 2) . ":" . substr($times, 12, 2)));
//     $times = date("D j M Y, G:i", mktime(substr($times, 8, 2), substr($times, 12, 2), substr($times, 6, 2), substr($times, 8, 2), substr($times, 0, 4)));

    return $times;
} /*=================================================================*/
} /*=================================================================*/
if(!(function_exists("cmr_basename"))){
function cmr_basename($filename = ""){
    if(empty($filename)) return "";
    $base_name = basename($filename);
    if(cmr_search(".", $base_name))
    $cmr_name = substr($base_name, 0, strrpos($base_name, "."));
    if(empty($cmr_name)) return strtolower($base_name);
   return strtolower($cmr_name);
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_good_file"))){
function cmr_good_file($file_list = array(), $type="")
{
	$good_path = "";
	foreach($file_list as $one_file){
		if($one_file) $good_path = realpath(trim($one_file));
		if(file_exists($good_path)){
// 			array_push ($GLOBALS["cmr"]->debug, realpath($good_path));
			cmr_set_debug("", realpath($good_path));

			if(empty($type)) return $good_path;
			if(is_file($good_path) && ($type == "file")) return $good_path;
			if(is_dir($good_path) && ($type == "dir")) return $good_path;
		}
	}
   return $good_path;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_look_file"))){
function cmr_look_file($file_name = "", $some_dirs = "")
{
	if(empty($some_dirs)) return cmr_good_file("./" . $file_name);
	$file_list = array();
	$array_dir = explode(",", $some_dirs);// $division->load_themes($cmr->themes);
	foreach($array_dir as $one_dir) $file_list[] = trim($one_dir) . "/" . $file_name;

   return cmr_good_file($file_list);
}
}
/*=================================================================*/
/*=================================================================*/
/**
* cmr_getdir_all()
* receive an array of files and folders path and return recursively an array with all files and folders in these path structture
*
* @param mixed $cmr_config
* @param mixed $array_path
* @param string $only_property
* @return
*/
if(!(function_exists("cmr_getdir_all"))){
function cmr_getdir_all($array_path, $only_property = "")
{
    $array_path = is_array($array_path) ? $array_path:array($array_path);
    $array_content = array();
    $array_type = array();
    $array_len = array();
    $pile_dir = array();
    $num_files = 0;
    // print_r($cmr_config["cmr_max_num_files"]);exit;
    foreach($array_path as $path){
        $path = realpath($path);
        array_unshift($pile_dir, $path);
//  && ($num_files < $cmr_config["cmr_max_num_files"])
        while ((count($pile_dir) > 0)){
            $the_path = array_shift($pile_dir);
            if(!is_dir($the_path)){
                $array_content[] = realpath($the_path);
                $array_type[] = "file";
                $array_len[] = empty($only_property)?strlen($the_path):filesize($the_path);
                $num_files++;
            } elseif(is_dir($the_path)){
                $array_content[] = realpath($the_path);
                $array_type[] = "dir";
                $array_len[] = empty($only_property)?strlen($the_path):filesize($the_path);
                $num_files++;
                $dir = opendir($the_path);

								if($dir)
                while ($file = readdir($dir)){
                    if(($file != ".") && ($file != "..")){
                        $array_content[] = realpath($the_path . "/" . $file);
                        $array_len[] = empty($only_property)?strlen(realpath($the_path . "/" . $file)):filesize(realpath($the_path . "/" . $file));
                        $num_files++;
                        if(is_dir($the_path . "/" . $file)){
                            array_unshift($pile_dir, $the_path . "/" . $file);
                            $array_type[] = "dir";
                        }else{
                            $array_type[] = "file";
                        }
                    }
                }
                closedir($dir);
            }
        }
    };

    if(!empty($only_property)){
        return array("total" => count($array_type), "total_size" => array_sum($array_len), "count" => array_count_values($array_type));
    }

    array_multisort($array_type, SORT_ASC, SORT_STRING, $array_len, SORT_ASC, SORT_STRING, $array_content, SORT_ASC, SORT_STRING);

    return array_unique($array_content);
}
}
/*=================================================================*/
/*=================================================================*/
/**
* cmr_copy()
* copy source file to destination
*
* @param mixed $source
* @param mixed $dest
* @return
*/
if(!(function_exists("cmr_copy"))){
function cmr_copy($source, $dest)
{
    if(!empty($dest)){
        $source = realpath($source);
        if($source == realpath($dest)){
            return true;
        } elseif(is_dir($dest)){
            return copy($source, $dest . "/" . basename($source));
        }

        return copy($source, $dest);
     }
    return false;
}
}
/*=================================================================*/
/*=================================================================*/
/**
* cmr_dir_copy()
* copy source folder to destination
*
* @param mixed $cmr_config
* @param mixed $source
* @param mixed $dest
* @return
*/
if(!(function_exists("cmr_dir_copy"))){
function cmr_dir_copy($source, $dest)
{
    $source = realpath($source);
    $dest = ($dest);

    if((is_dir($source) && (!is_dir($dest)))) mkdir($dest);

    $base_dir = substr($source, 0, strlen($source) - strlen(basename($source)));
    $base_dir = realpath($base_dir);

    if($source == $dest){
        return true;
    } elseif(!is_dir($source)){
        return cmr_copy($source, $dest);
    }

        $array_source = cmr_getdir_all($source);
        foreach($array_source as $value){
            if(is_dir($value))
                if(!is_dir($dest . "/" . substr($value, strlen($base_dir), strlen($value))))
                if(mkdir($dest . "/" . substr($value, strlen($base_dir), strlen($value)))){
                    cmr_info_print("<br /> creating dir [" . realpath($dest . "/" . substr($value, strlen($base_dir), strlen($value))) . "];");
                }else{
                    cmr_info_print("<br /> Dir [" . $dest . "/" . substr($value, strlen($base_dir), strlen($value)) . "] can't be created !!?;");
                }
        }
        $array_source = cmr_getdir_all($source);
        foreach($array_source as $value){
            if(!is_dir($value))
                if(copy(realpath($value), ($dest . "/" . substr($value, strlen($base_dir), strlen($value))))){
                    cmr_info_print("<br /> copying file [" . realpath($value) . "] -> [" . realpath($dest . "/" . substr($value, strlen($base_dir), strlen($value))) . "];");
                }else{
                    cmr_info_print("<br /> File [" . realpath($value) . "] can't be copy to -> [" . $dest . "/" . substr($value, strlen($base_dir), strlen($value)) . "]!!?;");
                }
        }

    return true;
}
}
/*=================================================================*/
/*=================================================================*/
/**
* cmr_dir_remove()
* remove a folder
*
* @param mixed $cmr_config
* @param mixed $source_dir
* @return
*/
if(!(function_exists("cmr_dir_remove"))){
function cmr_dir_remove($source_dir)
{
    if((!$source_dir) || (realpath($source_dir) == realpath(".")) || (realpath($source_dir) == realpath("..")) || (realpath($source_dir) == realpath("/"))){
        cmr_info_print("<br />  [" . $source_dir . "]; can't be removed !!?");
        return false;
    }
    $source_dir = realpath(($source_dir));
    if(!is_dir($source_dir)) return unlink($source_dir);

    $array_source = cmr_getdir_all($source_dir);
        foreach($array_source as $value){
            if(!is_dir($value))
                if(unlink($value)){
                    cmr_info_print("<br /> file [" . $value . "]; deleted");
                }else{
                    cmr_info_print("<br /> File [" . $value . "]; can't be deleted !!?");
                }
        }

        $i = 5;
        $finish = false;
        while (!$finish || ($i > 5)){
            $finish = true;
            $i--;
            $array_source = cmr_getdir_all($source_dir);
            $array_source = array_reverse($array_source);
            foreach($array_source as $value){
                if(is_dir($value))
                    if(rmdir($value)){
                        cmr_info_print("<br /> dir [" . $value . "] removed;");
                    }else{
                        $finish = false;
                        cmr_info_print("<br /> Dir [" . $value . "]; can't be removed !!?");
                   }
            }
        }
    return true;
}
}
/*=================================================================*/
/*=================================================================*/
/**
* cmr_dir_move()
* move a folder
*
* @param mixed $cmr_config
* @param mixed $source
* @param mixed $dest
* @return
*/
if(!(function_exists("cmr_dir_move"))){
function cmr_dir_move($source, $dest)
{
    if($source == $dest) return true;
    if(cmr_dir_copy($source, $dest)){
        return cmr_dir_remove($source);
    };
    return false;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_error_log"))){
function cmr_error_log($cmr_config = array(), $cmr_session = array(), $log_text)
{
	   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(empty($cmr_config["cmr_log_path"])) $cmr_config["cmr_log_path"] = "";
    if(empty($cmr_session["user_email"])) $cmr_session["user_email"] = "guest@localhost";
    $log_text = date("Y-m-d H:i:s") . " " . $_SERVER['REMOTE_ADDR'] . " User=" . $cmr_session["user_email"] . " " . $log_text . "\n";;
    // --3 log files  every monthh----------
    $log_file = $cmr_config["cmr_log_path"] . "log/cmr_" . substr(date("Y_m_d"), 0, 9) . "x.log";
	   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(!empty($cmr_config["cmr_use_log"])){
	    if(!empty($cmr_config["cmr_log_to_file"])){
			if(!is_writable($log_file)) fopen($log_file, "w");
		    if(is_writable($log_file)){
			    touch($log_file);
			    error_log ($log_text, 3, $log_file);
		    }else{
			    $cmr_config["cmr_log_to_system"] = 1;
		    }
		}
		   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    if(!empty($cmr_config["cmr_log_to_email"])) error_log ("\n" . $log_text, 1, $cmr_config["cmr_log_to_email"]);
	    if(!empty($cmr_config["cmr_log_to_system"])) error_log ("\n" . $log_text, 0, $cmr_config["cmr_log_to_system"]);
	    if(!empty($cmr_config["cmr_log_to_host"])) error_log ("\n" . $log_text, 2, $cmr_config["cmr_log_to_host"]);
    }
	   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// STDERR Un descripteur de fichier d�j� disponible vers stderr. Cela �vite de l'ouvrir avec
// $stderr = fopen('php://stderr', 'w');

    // error_log ("Problemi seri, FOO esauriti!", 1, "operator@mydomain.com");
    // error_log ("Problema!", 2, "127.0.0.1:7000");
    // error_log ("Problema!", 2, "loghost");
    // error_log ("Problema!", 3, "/var/tmp/my-errors.log");
    return $log_text;
} /*=================================================================*/
} /*=================================================================*/

if(!function_exists("save_cookie_status")){
	function save_cookie_status($cmr_config = array(), $cook_name, $action = "1")
	{
	   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$interval = time() + intval($cmr_config["cmr_cookie_time_out"]);
		$value = get_post($cook_name);
	    if($action > 1) $interval = time() + intval($action);

	    if($action){
			$_COOKIE[$cook_name] = $value; //cmr_info_print("<br />creating cookie: \$cook_name=$cook_name, \$value=$value, \$action=$action<br />");
	        cmr_setcookie($cook_name, $value, $interval);
	    }else{
			$_COOKIE[$cook_name] = ""; //cmr_info_print("<br />deleting cookie: \$cook_name=$cook_name, \$value=$value, \$action=$action<br />");
	        cmr_setcookie($cook_name, "", time());
	    }
	   // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	 return true;
	}
};
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_error"))){
function cmr_error($cmr_config = array(), $error_code = "-1", $error_mssg = "No Message", $resolv = "Contact administrator")
	{
	    cmr_error_log($cmr_config, cmr_get_session(), "Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . $error_mssg);
	    cmr_info_print("<u>error message,</u> code:" . $error_code . "<br />" . $error_mssg . "<br />" . $resolv);
	    // die(" <br >".E_ERROR." <br >".E_WARNING." <br >".E_PARSE." <br >".E_NOTICE." <br >".__FUNCTION__." <br >".__FILE__." <br >".__LINE__." <br >");
	    return ($error_code);
	}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_file_exists"))){
function cmr_file_exists($file_name = "")
	{
	    if(file_exists($file_name)) return true;
	    cmr_error_log(cmr_get_config(), cmr_get_session(),  "Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "File [" . $file_name . "]  Can not  be found");
	    return false;
	}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_callback"))){
function cmr_callback($buffer)
	{
	    return ($buffer);
	}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("die_install"))){
function die_install($cmr_config = array(), $send_text_error="")
	{
	    cmr_error_log($cmr_config, cmr_get_session(),  "Database error, Redirect to installation script");
	    cmr_error_log($cmr_config, cmr_get_session(),  $send_text_error);
	    die("<font color=\"blue\">".$send_text_error." </font> <a href=\"index.php?cmr_mode=install\"> New install </a>");
	    return true;
	}
}
/*=================================================================*/
/*=================================================================*/

if(!(function_exists("cmr_get_session"))){
function cmr_get_session($value = "")
{
	if($value) return $GLOBALS["cmr"]->session[$value];
	return $GLOBALS["cmr"]->session;
}
}

/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_include_conf"))){
function cmr_include_conf($cmr_config = array(), $file_name, $cmr_array = array(), $action = "const") // -- per interpretare i files di configurazioni ---
{


//return parse_ini_file($file_name);

    if(!file_exists($file_name)){
	    @ touch($file_name);
			cmr_error_log($cmr_config, cmr_get_session(),  "Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "File [" . $file_name . "]  Can not  be found");
        return $cmr_array;
    }else{// $division->load_themes($cmr->themes);




	    if(!in_array(realpath($file_name), cmr_get_debug()))
	    cmr_set_debug("", realpath($file_name));
// 	    array_push ($GLOBALS["cmr"]->debug, realpath($file_name));
        if(is_file($file_name)) $array_file_contents = file($file_name);
        $run_lines = array(";");
        $array_lines_file = array();
    }

if(!empty($array_file_contents)){
    foreach ($array_file_contents as $num_of_line => $the_line){
//         if(cmr_search("^[\#,\'\"\*\+;\<\>/\\?\$]", trim($the_line)) || cmr_search("^//", trim($the_line)))
        if(!cmr_search("^[a-z_A-Z]", trim($the_line))){
            $run_lines[] = $array_file_contents[$num_of_line];
//             $array_lines_file[$num_of_line] = "";
        } elseif(cmr_search("^[$]", trim($the_line))){
            /**
             * define a var  if not exit with the value taked in the file file_name
             * format: $var_name===cmr_get_file(file_name)
             */
            $run_lines[$num_of_line] = trim($the_line);
        } elseif(cmr_search("==cmr_get_file", trim($the_line))){
            /**
             * define a var  if not exit with the value taked in the file file_name
             * format: var_name===cmr_get_file(file_name)
             */
            $key = trim(substr($the_line, 0, strpos($the_line, "==cmr_get_file")));
            $val = trim(substr($the_line, strpos($the_line, "==cmr_get_file") + 16));
            $val = trim(substr($val, 0, strpos($val, ")")));
//             $array_lines_file[$num_of_line] = "\$cmr_array[\"$key\"]=\"" . file_get_contents($val) . "\"";
				    if(cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+$", $key)){
					     $array_lines_file[$num_of_line] = "if(!(defined(\"".$key."\"))){define(\"".$key."\", \"" . file_get_contents($val) . "\");}";
					}else{
					 $run_lines[] = $array_file_contents[$num_of_line];
				 	    }
        } elseif(cmr_search("=cmr_get_file", trim($the_line))){
            /**
             * define a session var   with the value taked in the file file_name
             * format: key_cmr_array_name===cmr_get_file(file_name)
             */
            $key = trim(substr($the_line, 0, strpos($the_line, "=cmr_get_file")));
            $val = trim(substr($the_line, strpos($the_line, "=cmr_get_file") + 15));
            $val = trim(substr($val, 0, strpos($val, ")")));
                if(cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+$", $key)){
			      $array_lines_file[$num_of_line] = "\$cmr_array[\"$key\"].=\"" . file_get_contents($val) . "\"";
					}else{
				 $run_lines[] = $array_file_contents[$num_of_line];
			 	    }
        } elseif(cmr_search("===", trim($the_line))){
            /**
             * define a var  if not exit with the value of another constant
             * format: new_var_name===other_constant
             */
            $key = trim(substr($the_line, 0, strpos($the_line, "===")));
            $val = trim(substr($the_line, strpos($the_line, "===") + 3));
                if(cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+$", $key)){
			      $array_lines_file[$num_of_line] = "\$cmr_array[\"$key\"]=\"$val\"";
					}else{
				 $run_lines[] = $array_file_contents[$num_of_line];
			 	    }
//             $array_lines_file[$num_of_line] = "if(!(defined(\"$key\"))){define(\"$key\", \"" . constant($val) . "\");}";
        } elseif(cmr_search("==", trim($the_line))){
            /**
             * define a new var  if not exit with the value val
             * format: var_name==val
             */
            $key = trim(substr($the_line, 0, strpos($the_line, "==")));
            $val = trim(substr($the_line, strpos($the_line, "==") + 2));
                /**
                 * define a new var  if not exit with the value val
                 * format: var_name==val
                 */
//             $array_lines_file[$num_of_line] = "\$cmr_array[\"$key\"]=\"$val\"";
                    if(cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+$", $key)){
				      $array_lines_file[$num_of_line] = "if(!(defined(\"$key\"))){define(\"$key\", \"$val\");}";
					}else{
					 $run_lines[] = $array_file_contents[$num_of_line];
				 	    }
        } elseif(cmr_search("=[$]|=[\$]|=\s*[\$]|=[:space:]*[\$]", trim($the_line)) && cmr_search("^[a-zA-Z0-9_@&\-]", trim($the_line))){
            /**
             * add a string to an existing session val
             * format: key_cmr_array_name= $val
             */
            $key = trim(substr($the_line, 0, strpos($the_line, "=")));
            $val = trim(substr($the_line, strpos($the_line, "=") + 1));
                if(cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+$", $key)){
			      $array_lines_file[$num_of_line] = "\$cmr_array[\"$key\"] = $val";
					}else{
					 $run_lines[] = $array_file_contents[$num_of_line];
				 	    }
        } elseif(cmr_search("\.=", trim($the_line))){
            /**
             * add a string to an existing session val
             * format: key_cmr_array_name.=val
             */
            $key = trim(substr($the_line, 0, strpos($the_line, ".=")));
            $val = trim(substr($the_line, strpos($the_line, ".=") + 2));
                if(cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+$", $key)){
			      $array_lines_file[$num_of_line] = "\$cmr_array[\"$key\"].=\"$val\"";
					}else{
					 $run_lines[] = $array_file_contents[$num_of_line];
				 	    }
        } elseif(cmr_search("=", trim($the_line)) && cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+", trim($the_line))){
            /**
             * define a session var   with the value val
             * format: key_cmr_array_name=val
             */
            $key = trim(substr($the_line, 0, strpos($the_line, "=")));
            $val = trim(substr($the_line, strpos($the_line, "=") + 1));

            if($action == "var"){
                /**
                 * define a session var   with the valureturn e val
                 * format: key_cmr_array_name=val
                 */
                    if(cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+$", $key)){
				      $array_lines_file[$num_of_line] = "\$cmr_array[\"$key\"]=\"$val\"";
					}else{
					 $run_lines[] = $array_file_contents[$num_of_line];
				 	    }
            } elseif($action == "const"){
                    /**
                     * define a new var  if not exit with the value val
                     * format: var_name==val
                     */
                 if(cmr_search("^[a-z_A-Z][a-zA-Z0-9_@&-]+$", $key)){
	                  $array_lines_file[$num_of_line] = "\$cmr_array[\"$key\"]=\"$val\"";
					}else{
					 $run_lines[] = $array_file_contents[$num_of_line];
				 	    }
//                    $array_lines_file[$num_of_line] = "if(!(defined(\"$key\"))){define(\"$key\", \"$val\");}";
            }
        }else{
	        $run_lines[] = $array_file_contents[$num_of_line];
	        }
    }
    // ---------



    // =============
//     print("<pre>");
//     print_r($array_lines_file);
//     print_r($run_lines);
//     print("<br />".$text2."<br />");
//     print("</pre>");
    // =============

    // =============
    $text2 = implode(";", $run_lines);
    // =============


    // =============
    foreach($array_lines_file as $val_run){
	    //echo($val_run . ";<br />");
	    if(!empty($val_run)) @eval($val_run . ";");
	}
    // =============
 //exit;

    // =============
    //if(!empty($text2)) @eval($text2);
    // ============


}


	return $cmr_array;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("auth_method"))){
function auth_method($cmr_config = array(), $adress = "unknown_adress", $name = "unknown_host")
{
// --chosing authentification method by host ip or hostname---
    if((defined("cmr_no_auth"))) $cmr_config["cmr_no_auth"] = cmr_no_auth;
    if((defined("cmr_apache_auth"))) $cmr_config["cmr_apache_auth"] = cmr_apache_auth;
    if((defined("cmr_normal_auth"))) $cmr_config["cmr_normal_auth"] = cmr_normal_auth;
    if((defined("cmr_url_auth"))) $cmr_config["cmr_url_auth"] = cmr_url_auth;
    if((defined("cmr_radius_auth"))) $cmr_config["cmr_radius_auth"] = cmr_radius_auth;
    if((defined("cmr_other_auth"))) $cmr_config["cmr_other_auth"] = cmr_other_auth;
    if((defined("cmr_ip_auth"))) $cmr_config["cmr_ip_auth"] = cmr_ip_auth;
    if((defined("cmr_cookie_auth"))) $cmr_config["cmr_cookie_auth"] = cmr_cookie_auth;


	foreach($cmr_config as $method => $val_method){
		if(cmr_search("cmr_no_auth|cmr_apache_auth|cmr_normal_auth|cmr_ip_auth|cmr_radius_auth|cmr_url_auth|cmr_other_auth", $method))
	    if(!($val_method)){
		    $cmr_config[$method] = "0";
		}else{
		    $array_val = explode(",", $val_method);
		    foreach($array_val as $val){
				if($method == "cmr_ip_auth") list($user, $val) = explode(";", $val);
			    $val = trim($val);
		        $val = cmr_search_replace("[*]", ".*", $val);
		        $val = cmr_search_replace("[.][.][*]", ".*", $val);
		        $val = "^" . trim($val);

		        if(($val) && (cmr_searchi($val, $name) || cmr_searchi($val, $adress) || ($val == "*") || ($val == "1") || ($val_method == "*") || ($val_method == "1"))){
				    $cmr_config["cmr_no_auth"] = "0";
				    $cmr_config["cmr_apache_auth"] = "0";
				    $cmr_config["cmr_normal_auth"] = "*";
				    $cmr_config["cmr_url_auth"] = "0";
				    $cmr_config["cmr_radius_auth"] = "0";
				    $cmr_config["cmr_other_auth"] = "0";
				    $cmr_config["cmr_ip_auth"] = "0";
				    $cmr_config["cmr_cookie_auth"] = "0";
					if($method == "cmr_ip_auth") $cmr_config["cmr_auth_user"] = trim($user);
				    $cmr_config[$method] = "1";
		        }
		    }
		}
	}

    return $cmr_config;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_preload_config"))){
function cmr_preload_config($cmr_config = array(), $list_conf="")
    {
			if(empty($list_conf)) $list_conf = $cmr_config["cmr_preload_conf"];
			if(empty($list_conf)) return  $cmr_config;
			if(empty($cmr_config["cmr_path"])) $cmr_config["cmr_path"] = "";
			if(empty($cmr_config["cmr_conf_path"])) $cmr_config["cmr_conf_path"] = "";


		    $array_conf = cmr_split("[,;]", $list_conf);
		    $array_conf = array_unique ($array_conf);
		    foreach($array_conf as $conf){
			    if(!empty($conf))
		        if(file_exists($cmr_config["cmr_conf_path"] . "conf.d/" . trim($conf))){
		            $cmr_config = cmr_include_conf($cmr_config, $cmr_config["cmr_conf_path"] . "conf.d/" . trim($conf), $cmr_config, "var");
		        }elseif(file_exists($cmr_config["cmr_path"] . trim($conf))){
		            $cmr_config = cmr_include_conf($cmr_config, $cmr_config["cmr_path"] . trim($conf), $cmr_config, "var");
			    }else{
		            $cmr_config = cmr_include_conf($cmr_config, trim($conf), $cmr_config, "var");
				}
		    }
   return $cmr_config;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_init_mode"))){
function cmr_init_mode($cmr_config = array(), $charset = "iso-8859-1")
    {
/*==================*/
//          $_SESSION=$cmr->load_cookie();
//          $cmr->secure_all();
          /*==================*/
//             set_magic_quotes_runtime(0);// Disable magic_quotes_runtime
			set_time_limit(0); // Unlimited execution time
            setlocale(LC_ALL, trim($cmr_config["cmr_local"]));
            setlocale(LC_TIME, trim($cmr_config["cmr_local"]));
            putenv('GDFONTPATH=' . realpath( $cmr_config["cmr_gd_font_path"]));
          /*==================*/
//          error_reporting (constant(trim($cmr_config["error_reporting"])));
//          error_reporting (E_ERROR | E_WARNING | E_PARSE);// This will NOT report uninitialized variables
//          ini_set("memory_limit", "160M");
//          ini_set("magic_quotes_gpc", "Off");
//          ini_set("variables_order", "GPCS");
            ini_set("allow_call_time_pass_reference", "Off");
//          ini_set("short_open_tag", "On");
//          ini_set("disable_functions", "");
//          ini_set("disable_classes ", "");
//          ini_set("expose_php ", "On");
//             ini_set("max_execution_time ", "3000");
            ini_set("max_input_time", trim($cmr_config["max_input_time"]));
            //ini_set("memory_limit", trim($cmr_config["memory_limit"]));
//          ini_set("display_errors", "Off");
//          ini_set("display_startup_errors", "Off");
//          ini_set("ignore_repeated_errors", "On");
//          ini_set("track_errors", "Off");
//          ini_set("html_errors", "On");
//          ini_set("docref_root", "/phpmanual/");
//          ini_set("docref_ext", ".html");
//          ini_set("error_prepend_string", "<font color=ff0000>");
//          ini_set("error_append_string", "</font>");
//          ini_set("error_log", "filename|syslog");
//          ini_set("arg_separator.output", "&amp;");
//          ini_set("arg_separator.input", ";&");
            ini_set("post_max_size", trim($cmr_config["post_max_size"]));
//          ini_set("auto_prepend_file", "");
//          ini_set("auto_append_file", "");
//          ini_set("default_mimetype", "text/html");
	        ini_set("default_charset", $charset);
         	ini_set("file_uploads", "On");
            ini_set("upload_max_filesize", trim($cmr_config["upload_max_filesize"]));
         	ini_set("allow_url_fopen", "On");
//          ini_set("magic_quotes_sybase", "Off");
if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
            ini_set("include_path", ini_get('include_path') . ";.;.\PEAR\;c:\php\includes");
//          @ if(!extension_loaded("mysql.dll")) dl("mysql.dll");
//          @ if(!extension_loaded("php_imap.dll")) dl("php_imap.dll");
//          @ if(!extension_loaded("php_zip.dll")) dl("php_zip.dll");
//          @ if(!extension_loaded("php_bz2.dll")) dl("php_bz2.dll");
//          @ if(!extension_loaded("php_gd2.dll")) dl("php_gd2.dll");
//          @ if(!extension_loaded("php_snmp.dll")) dl("php_snmp.dll");
//          @ if(!extension_loaded("php_sockets.dll")) dl("php_sockets.dll");
//          @ if(!extension_loaded("php_openssl.dll")) dl("php_openssl.dll");
//          @ if(!extension_loaded("php_ldap.dll")) dl("php_ldap.dll");
//          @ if(!extension_loaded("php_pdf.dll")) dl("php_pdf.dll");
//          @ if(!extension_loaded("php_pgsql.dll")) dl("php_pgsql.dll");
//          @ if(!extension_loaded("php_mssql.dll")) dl("php_mssql.dll");
//          @ if(!extension_loaded("php_msql.dll")) dl("php_msql.dll");
//          @ if(!extension_loaded("php_oracle.dll")) dl("php_oracle.dll");
//          @ if(!extension_loaded("php_db.dll")) dl("php_db.dll");
//          @ if(!extension_loaded("php_dba.dll")) dl("php_dba.dll");
//          @ if(!extension_loaded("php_dbase.dll")) dl("php_dbase.dll");
//          @ if(!extension_loaded("php_dbx.dll")) dl("php_dbx.dll");
//          @ if(!extension_loaded("php_oci8.dll")) dl("php_oci8.dll");
//          @ if(!extension_loaded("php_java.dll")) dl("php_java.dll");
//          @ if(!extension_loaded("php_w32api.dll")) dl("php_w32api.dll");
//          @ if(!extension_loaded("php_xmlrpc.dll")) dl("php_xmlrpc.dll");
//          @ if(!extension_loaded("php_xslt.dll")) dl("php_xslt.dll");
//          @ if(!extension_loaded("php_printer.dll")) dl("php_printer.dll");


//          @ if(!extension_loaded("php_cpdf.dll")) dl("php_cpdf.dll");
//          @ if(!extension_loaded("php_crack.dll")) dl("php_crack.dll");
//          @ if(!extension_loaded("php_curl.dll")) dl("php_curl.dll");
//          @ if(!extension_loaded("php_domxml.dll")) dl("php_domxml.dll");
//          @ if(!extension_loaded("php_exif.dll")) dl("php_exif.dll");
//          @ if(!extension_loaded("php_fdf.dll")) dl("php_fdf.dll");
//          @ if(!extension_loaded("php_filepro.dll")) dl("php_filepro.dll");
//          @ if(!extension_loaded("php_gettext.dll")) dl("php_gettext.dll");
//          @ if(!extension_loaded("php_hyperwave.dll")) dl("php_hyperwave.dll");
//          @ if(!extension_loaded("php_iconv.dll")) dl("php_iconv.dll");
//          @ if(!extension_loaded("php_ifx.dll")) dl("php_ifx.dll");
//          @ if(!extension_loaded("php_iisfunc.dll")) dl("php_iisfunc.dll");
//          @ if(!extension_loaded("php_interbase.dll")) dl("php_interbase.dll");
//          @ if(!extension_loaded("php_mbstring.dll")) dl("php_mbstring.dll");
//          @ if(!extension_loaded("php_mcrypt.dll")) dl("php_mcrypt.dll");
//          @ if(!extension_loaded("php_mhash.dll")) dl("php_mhash.dll");
//          @ if(!extension_loaded("php_mime_magic.dll")) dl("php_mime_magic.dll");
//          @ if(!extension_loaded("php_ming.dll")) dl("php_ming.dll");
//          @ if(!extension_loaded("php_shmop.dll")) dl("php_shmop.dll");
//          @ if(!extension_loaded("php_sybase_ct.dll")) dl("php_sybase_ct.dll");
//          @ if(!extension_loaded("php_yaz.dll")) dl("php_yaz.dll");


}else{
            ini_set("include_path", ini_get('include_path') . ":.:./PEAR/:/usr/share/php:/usr/share/tstm-new/pear");
//             @ if(!extension_loaded("mysql.so")) load_ext("mysql");
//             @ if(!extension_loaded("imap.so")) load_ext("imap");
//             @ if(!extension_loaded("zip.so")) load_ext("zip");
//             @ if(!extension_loaded("bz2")) load_ext("bz2");
//             @ if(!extension_loaded("gd2")) load_ext("gd2");
//          @ if(!extension_loaded("snmp.so")) load_ext("snmp");
//          @ if(!extension_loaded("sockets.so")) load_ext("sockets");
//          @ if(!extension_loaded("openssl.so")) load_ext("openssl");
//          @ if(!extension_loaded("ldap.so")) load_ext("ldap");
//             @ if(!extension_loaded("pdf.so")) load_ext("pdf");
//          @ if(!extension_loaded("pgsql.so")) load_ext("pgsql");
//          @ if(!extension_loaded("mssql.so")) load_ext("mssql");
//          @ if(!extension_loaded("msql.so")) load_ext("msql");
//          @ if(!extension_loaded("oracle.so")) load_ext("oracle");
//          @ if(!extension_loaded("db.so")) load_ext("db");
//          @ if(!extension_loaded("dba.so")) load_ext("dba");
//          @ if(!extension_loaded("dbase.so")) load_ext("dbase");
//          @ if(!extension_loaded("dbx.so")) load_ext("dbx");
//          @ if(!extension_loaded("oci8")) load_ext("oci8");
//          @ if(!extension_loaded("java.so")) load_ext("java");
//          @ if(!extension_loaded("w32api")) load_ext("w32api");
//          @ if(!extension_loaded("xmlrpc.so")) load_ext("xmlrpc");
//          @ if(!extension_loaded("xslt.so")) load_ext("xslt");
//          @ if(!extension_loaded("printer.so")) load_ext("printer");


//          @ if(!extension_loaded("cpdf.so")) load_ext("cpdf");
//          @ if(!extension_loaded("crack.so")) load_ext("crack");
//          @ if(!extension_loaded("curl.so")) load_ext("curl");
//          @ if(!extension_loaded("domxml.so")) load_ext("domxml");
//          @ if(!extension_loaded("exif.so")) load_ext("exif");
//          @ if(!extension_loaded("fdf.so")) load_ext("fdf");
//          @ if(!extension_loaded("filepro.so")) load_ext("filepro");
//          @ if(!extension_loaded("gettext.so")) load_ext("gettext");
//          @ if(!extension_loaded("hyperwave.so")) load_ext("hyperwave");
//          @ if(!extension_loaded("iconv.so")) load_ext("iconv");
//          @ if(!extension_loaded("ifx.so")) load_ext("ifx");
//          @ if(!extension_loaded("iisfunc.so")) load_ext("iisfunc");
//          @ if(!extension_loaded("interbase.so")) load_ext("interbase");
//          @ if(!extension_loaded("mbstring.so")) load_ext("mbstring");
//          @ if(!extension_loaded("mcrypt.so")) load_ext("mcrypt");
//          @ if(!extension_loaded("mhash.so")) load_ext("mhash");
//          @ if(!extension_loaded("mime")) load_ext("mime_magic");
//          @ if(!extension_loaded("ming.so")) load_ext("ming");
//          @ if(!extension_loaded("shmop.so")) load_ext("shmop");
//          @ if(!extension_loaded("sybase")) load_ext("sybase_ct");
//          @ if(!extension_loaded("yaz.so")) load_ext("yaz");
}


   return true;
}
}
/*=================================================================*/
/*=================================================================*/
?>
