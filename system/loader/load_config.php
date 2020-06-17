<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * load_config.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.












load_config.php, Ver 3.03
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
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/template_load_config" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/template_load_config" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/template_load_config" . $cmr->get_ext("template");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$conf_win = new class_windows($cmr->page, $cmr->module, $cmr->themes);
$conf_win->template = $conf_win->load_template($file_list);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_name = realpath($cmr->post_var["file_name"]);
$conf_win->prints["match_file_name"] = $file_name;



if(!file_exists($file_name)){
    $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "File [" . $file_name . "]  Can not  be found");
    echo "file [" . $file_name . "] not found !!!..<br />";
    return $file_name;
}else{
	$prefix = substr(basename($file_name), 0, 3);
    $lines = file($file_name);
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$conf_win->prints["match_prefix_file_name"] = "file_name_" . $prefix;
	$conf_win->print_template("template1");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    foreach ($lines as $line_num => $line){
        if(cmr_search("^[\#,\'\"\*\+;\<\>/\\?]", trim($line)) || cmr_search("^//", trim($line))){
            // $line=cmr_search_replace("^[\#,\'\"\*\+;\<\>/\\?]", "#", trim($line));
            // $line=cmr_search_replace("^//", "#", trim($line));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_value_comment1"] = htmlentities($line);
			$conf_win->prints["match_value_comment2"] = " ";
			$conf_win->prints["match_name_comment1"] = $prefix . "_key_" . $line_num;;
			$conf_win->prints["match_name_comment2"] = $prefix . "_val_" . $line_num;;
			$conf_win->prints["match_comment"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template2");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        } elseif(cmr_search("==cmr_get_file", $line)){
            /**
             * define a constant const_name if not exit with the value taked in the file file_name
             * format: const_name===cmr_get_file(file_name)
             */
            $key = trim(substr($line, 0, strpos($line, "==cmr_get_file")));
            $val = trim(substr($line, strpos($line, "==cmr_get_file") + 16));
            $val = trim(substr($val, 0, strpos($val, ")")));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_label"] = $key;
			$conf_win->prints["match_operator1"] = "==cmr_get_file";
			$conf_win->prints["match_operator2"] = "";
			$conf_win->prints["match_type_key1"] = "hidden";
			$conf_win->prints["match_type_key2"] = "text";
			$conf_win->prints["match_value_key1"] = $key . "==cmr_get_file";
			$conf_win->prints["match_value_key2"] = htmlentities($val);
			$conf_win->prints["match_name_key1"] = $prefix . "_key_" . $line_num;;
			$conf_win->prints["match_name_key2"] = $prefix . "_val_" . $line_num;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        } elseif(cmr_search("=cmr_get_file", $line)){
            /**
             * define a session var   with the value taked in the file file_name
             * format: key_session_name===cmr_get_file(file_name)
             */
            $key = trim(substr($line, 0, strpos($line, "=cmr_get_file")));
            $val = trim(substr($line, strpos($line, "=cmr_get_file") + 15));
            $val = trim(substr($val, 0, strpos($val, ")")));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_label"] = $key;
			$conf_win->prints["match_operator1"] = "=cmr_get_file";
			$conf_win->prints["match_operator2"] = "";
			$conf_win->prints["match_type_key1"] = "hidden";
			$conf_win->prints["match_type_key2"] = "text";
			$conf_win->prints["match_value_key1"] = $key . "=cmr_get_file";
			$conf_win->prints["match_value_key2"] = htmlentities($val);
			$conf_win->prints["match_name_key1"] = $prefix . "_key_" . $line_num;;
			$conf_win->prints["match_name_key2"] = $prefix . "_val_" . $line_num;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        } elseif(cmr_search("===", $line) && cmr_search("^[a-zA-Z0-9_@&\-]", trim($line))){
            /**
             * define a constant  if not exit with the value of another constant
             * format: new_const_name===other_constant
             */
            $key = trim(substr($line, 0, strpos($line, "===")));
            $val = trim(substr($line, strpos($line, "===") + 3));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_label"] = $key;
			$conf_win->prints["match_operator1"] = "===";
			$conf_win->prints["match_operator2"] = "";
			$conf_win->prints["match_type_key1"] = "hidden";
			$conf_win->prints["match_type_key2"] = "text";
			$conf_win->prints["match_value_key1"] = $key . "===";
			$conf_win->prints["match_value_key2"] = htmlentities($val);
			$conf_win->prints["match_name_key1"] = $prefix . "_key_" . $line_num;;
			$conf_win->prints["match_name_key2"] = $prefix . "_val_" . $line_num;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        } elseif(cmr_search("==", $line) && cmr_search("^[a-zA-Z0-9_@&-]", trim($line))){
            /**
             * define a new constant  if not exit with the value val
             * format: const_name==val
             */
            $key = trim(substr($line, 0, strpos($line, "==")));
            $val = trim(substr($line, strpos($line, "==") + 2));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_label"] = $key;
			$conf_win->prints["match_operator1"] = "==";
			$conf_win->prints["match_operator2"] = "";
			$conf_win->prints["match_type_key1"] = "hidden";
			$conf_win->prints["match_type_key2"] = "text";
			$conf_win->prints["match_value_key1"] = $key . "==";
			$conf_win->prints["match_value_key2"] = htmlentities($val);
			$conf_win->prints["match_name_key1"] = $prefix . "_key_" . $line_num;;
			$conf_win->prints["match_name_key2"] = $prefix . "_val_" . $line_num;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        } elseif(cmr_search("\.=", $line) && cmr_search("^[a-zA-Z0-9_@&\-]", trim($line))){
            /**
             * add a string to an existing session val
             * format: key_session_name.=val
             */
            $key = trim(substr($line, 0, strpos($line, ".=")));
            $val = trim(substr($line, strpos($line, ".=") + 2));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_label"] = $key;
			$conf_win->prints["match_operator1"] = ".=";
			$conf_win->prints["match_operator2"] = "";
			$conf_win->prints["match_type_key1"] = "hidden";
			$conf_win->prints["match_type_key2"] = "text";
			$conf_win->prints["match_value_key1"] = $key . ".=";
			$conf_win->prints["match_value_key2"] = htmlentities($val);
			$conf_win->prints["match_name_key1"] = $prefix . "_key_" . $line_num;;
			$conf_win->prints["match_name_key2"] = $prefix . "_val_" . $line_num;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        } elseif(cmr_search("=", $line) && cmr_search("^[a-zA-Z0-9_@&-]", trim($line))){
            /**
             * define a session var   with the value val
             * format: key_session_name=val
             */
            $key = trim(substr($line, 0, strpos($line, "=")));
            $val = trim(substr($line, strpos($line, "=") + 1));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_label"] = $key;
			$conf_win->prints["match_operator1"] = "=";
			$conf_win->prints["match_operator2"] = "";
			$conf_win->prints["match_type_key1"] = "hidden";
			$conf_win->prints["match_type_key2"] = "text";
			$conf_win->prints["match_value_key1"] = $key . "=";
			$conf_win->prints["match_value_key2"] = htmlentities($val);
			$conf_win->prints["match_name_key1"] = $prefix . "_key_" . $line_num;;
			$conf_win->prints["match_name_key2"] = $prefix . "_val_" . $line_num;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }else{
            /**
             * define a session var   with the value val
             * format: key_session_name=val
             */
            $key = trim($line);
            $val = " ";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_label"] = $key;
			$conf_win->prints["match_operator1"] = "";
			$conf_win->prints["match_operator2"] = "";
			$conf_win->prints["match_type_key1"] = "hidden";
			$conf_win->prints["match_type_key2"] = "hidden";
			$conf_win->prints["match_value_key1"] = $key . "=";
			$conf_win->prints["match_value_key2"] = " ";
			$conf_win->prints["match_name_key1"] = $prefix . "_key_" . $line_num;;
			$conf_win->prints["match_name_key2"] = $prefix . "_val_" . $line_num;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }
    }

if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_noc_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->prints["match_label"] = ($key+1);
			$conf_win->prints["match_operator1"] = $cmr->translate(" key");
			$conf_win->prints["match_operator2"] = $cmr->translate(" value");
			$conf_win->prints["match_type_key1"] = "text";
			$conf_win->prints["match_type_key2"] = "text";
			$conf_win->prints["match_value_key1"] = "";
			$conf_win->prints["match_value_key2"] = " ";
			$conf_win->prints["match_name_key1"] = $prefix . "_key_" . ($line_num+1);
			$conf_win->prints["match_name_key2"] = $prefix . "_val_" . ($line_num+1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$conf_win->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
}
			$conf_win->print_template("template4");

?>
