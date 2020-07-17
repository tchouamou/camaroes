<?php
 defined("cmr_online") or define("cmr_online", 1);
/**
 * camaroes_class.php
 *  --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











camaroes_class.php,  2011-Oct
*/

      /*==================*/

//   ___  __     __   ____  ____
//  / __)(  )   / _\ / ___)/ ___)
// ( (__ / (_/\/    \\___ \\___ \
//  \___)\____/\_/\_/(____/(____/

/**
* Class PhpExplorator
*
* @package
* @author Tchouamou Eric Herve  (tchouamou@gmail.com)
* @copyright Copyright (c) 2011
* @version $Id$
* @access public
*/
//0000000000000000000000000000000000000000000000000000000000000000000000000000
//00000000000000000000000000       Camaroes     000000000000000000000000000000
//0000000000000000000000000000000000000000000000000000000000000000000000000000
class camaroes
{
    /*==================*/
    public $db_connection = null; //database connection


    public $config = array("cmr_version" => '3.1'); //config array()
    public $user = array("user_email" => '', "auth_email" => '', "auth_id" => '', "auth_uid" => '', "auth_group" => '', "auth_group_path" => '', "auth_user_path" => '', "group_name" => '', "authorisation" => '') ; //user array()
    public $page = array("html_meta_author" => '', "html_meta_date" => '', "html_meta_content_type=" => '', "html_meta_content_type=" => '', "html_meta_keyword" => '', "html_meta_description" => '', "html_header_lang" => '', "html_general_align" => '', "page_title=" => '', "refresh" => '', "tab" => '', "dekstop" => '', "tab_mode" => '', "current_tab" => '', "default_search" => '', "task" => '',  "right1" => '', "foot1" => '', "middle1" => '', "head1" => '', "left1" => '', "cmr_jscrip" => '', "cmr_themes=" => '', "cmr_see_time=" => '', "cmr_see_lang=" => '', "cmr_see_refresh=" => '', "cmr_see_theme=" => '', "cmr_see_action=" => '', "cmr_see_tab=" => '', "cmr_tiny_editor=" => '', "cmr_image_1" => '', "cmr_image_2" => '', "cmr_image_3" => '', "cmr_image_4" => '', "cmr_ajax_engine" => '', "cmr_clock_engine" => ''); //page array()
    public $language = array("cmr_charset" => ''); //language array()
    public $themes = array("win_type" => '', "html_class" => '', "cmr_style" => '', "header_visible" => '', "header_tools_left" => '', "header_tools_right" => '', "header_mouse_effect" => '', "background" => '', "width" => '', "bgcolor" => '', "border" => '', "bordercolor" => '', "text_font" => '', "text_color" => '', "text_size" => '', "text_align" => '', "header_bgcolor" => '', "header_color" => '', "header_align" => '', "header_border" => '', "header_bgimage_left" => '', "header_bgimage_middle" => '', "header_bgimage_right" => ''); //themes array()

    public $query = array("report" => ''); //alll current sql query

    public $post_var = array("conf" => '', "cod" => '', "keys" => '', "values" => '', "vals" => '', "action_cod" => '', "middle1" => '') ; //post_var array()
    public $session = array("user_email" => '', "connect_from" => '', "type" => '', "pre_match" => '') ; //session array()
    public $db = array("db_type" => '', "db_host" => '', "db_name" => '', "db_user" => '', "db_pw" => '') ; //db array()
    public $action = array("cron_text" => '', "form_action_run" => '', "form_action_include" => '') ; //action array()
    public $post_files = array("attachment" => '', "attachment_location" => '') ; //post_files array()
    public $notify = array("to_page" => array(), "to_email" => array(), "to_log" => array()) ; //notify array()
    public $module = array("name" => '', "path" => '', "base_name" => '', "text" => '', "title" => '', "url" => '', "conf_file" => '', "script" => '', "param" => '', "position" => '', "header_icon" => '', "need_type" => '') ; //module array()
    public $group = array("name" => '', "authorisation" => '') ; //group array()
    public $prints = array() ; //prints array()
    public $buffer = array(); //buffer html content

    public $help = array(); //help array()
    public $cookies = array() ; //cookies array()
    public $email = array() ; //email array()
    public $imap = array() ; //imap array()
    public $event = array() ; //event array()
    public $report = array(); //report array()
    public $debug = array() ; //debug array()

    public $input = array(); //all input array()
    public $output = array(); //all output array()
    public $object = array() ; //action array()




    //00000000000000000000000000
    //00000000000000000000000000
public function __construct($cmr_global = array()) // --constructor--
{
    return $this->camaroes($cmr_global);
}
    //00000000000000000000000000
    //00000000000000000000000000
public function camaroes($cmr_global = array()) // --constructor--
{
    if (!empty($cmr_global)) {
        $this->config = $cmr_global["config"];//config array()
    $this->themes = $cmr_global["themes"];//themes array()
    $this->page = $cmr_global["page"];//page array()
    $this->language = $cmr_global["language"];//language array()
    $this->help = $cmr_global["help"];//help array()

    $this->buffer = $cmr_global["buffer"];  //buffer html content
        $this->db_connection = $cmr_global["db_connection"];
        ; //database connection
    $this->db = $cmr_global["db"];//db array()
    $this->user = $cmr_global["user"];//user array()
    $this->group = $cmr_global["group"];//group array()

    $this->report = $cmr_global["report"];//report array()

        $this->post_files = $cmr_global["post_files"];//post_files array()
    $this->post_var = $cmr_global["post_var"];//post_var array()
    $this->session = $cmr_global["session"];//session array()
    $this->cookies = $cmr_global["cookies"];//cookies array()
    $this->imap = $cmr_global["imap"];//email array()
    $this->email = $cmr_global["email"];//email array()
    $this->notify = $cmr_global["notify"];//email array()
    $this->event = $cmr_global["event"];//event array()
    $this->prints = $cmr_global["prints"];//event array()
    $this->debug = $cmr_global["debug"];//event array()

    $this->action = $cmr_global["action"];//action array()
    $this->module = $cmr_global["module"];//module array()
    }


    return $this;
}
    //00000000000000000000000000
    //00000000000000000000000000
    /*==================*/
    public function load_session_mode()
    {
        if (function_exists("cmr_load_session_mode")) {
            cmr_load_session_mode($this->config);
        }
        return true;
    }
    /*==================*/
    /*==================*/
    /*==================*/
    public function input_session($param = "")
    {
        return cmr_load_session($param, $this->config);
    }
    /*==================*/
    public function put_session($cmr_data = array(), $param = "")
    {
        return cmr_put_session($this->config, $cmr_data, $param);
    }
    /*==================*/

    public function save_session($option1 = "")
    {
        if ($option1) {
            return cmr_put_session($this->config, $this->$option1, $option1);
        }
        cmr_put_session($this->config, $this->config, "config");
        cmr_put_session($this->config, $this->themes, "themes");
        cmr_put_session($this->config, $this->page, "page");
        cmr_put_session($this->config, $this->language, "language");
        cmr_put_session($this->config, $this->db, "db");
        cmr_put_session($this->config, $this->imap, "imap");
        cmr_put_session($this->config, $this->user, "user");
        cmr_put_session($this->config, $this->group, "group");
        cmr_put_session($this->config, $this->post_var, "post_var");
        cmr_put_session($this->config, $this->session, "session");
        // 	cmr_put_session($this->config, $this->others, "others");

        return  true;
    }
    /*==================*/
    public function load_session($option1 = "")
    {
        if ($option1) {
            return $this->config = cmr_load_session($option1, $this->$option1);
        }
        $this->config = cmr_load_session("config", $this->config);
        $this->themes = cmr_load_session("themes", $this->config);
        $this->page = cmr_load_session("page", $this->config);
        $this->language = cmr_load_session("language", $this->config);
        $this->db = cmr_load_session("db", $this->config);
        $this->imap = cmr_load_session("imap", $this->config);
        $this->user = cmr_load_session("user", $this->config);
        $this->group = cmr_load_session("group", $this->config);
        $this->post_var = cmr_load_session("post_var", $this->config);
        $this->session = cmr_load_session("session", $this->config);
        return true;
    }
    /*==================*/
    public function get_param($arg = "")
    {
        return cmr_get_param($arg);
    }
    /*==================*/
    /*==================*/
    public function cli()
    {
        return cmr_cli();
    }
    /*==================*/
    public function translate($text)
    {
        if (empty($this->page["language"])) {
            $this->page["language"] = "english";
        }
        if (function_exists("cmr_translate")) {
            $param = cmr_translate($text, "english", $this->page["language"], $this->language);
        }
        return $param;
    }
    /*==================*/
    public function gener_code($cmr_code)
    {
        $cmr_img_code = substr((base64_encode(md5(date("s") . $cmr_code . rand()))), 5, 5);
        if (!function_exists("imagecreate")) {
            $cmr_img_code = (rand(1, 5) > 3)?"2NhM2":"GUyYz";
        }
        return $cmr_img_code;
    }
    /*==================*/
    public function connect($cmr_db = array())
    {
        if (function_exists("connect_to_db")) {
            $this->db_connection = connect_to_db($this->config, $cmr_db);
        }
        return $this->db_connection;
    }
    /*==================*/
    /*==================*/
    public function tree_group($str_list = "")
    {
        return calcul_tree_group($this->config, $this->db_connection, $str_list);
    }
    /*==================*/
    /*==================*/
    public function save_conf($type = "user", $group = "")
    {
        return save_config($this->config, $this->page, $this->user, $this->db_connection, $type, $group);
    }
    /*==================*/
    /*==================*/
    public function down_attachment($file_data = "", $file_name = "", $type = "")
    {
        return download_attachment($this->config, $file_data = "", $file_name = "", $type = "");
    }
    /*==================*/
    /*==================*/
    public function down_file($the_file = "")
    {
        return download_file($this->config, $the_file);
    }
    /*==================*/
    /*==================*/
    public function new_login()
    {
        if (function_exists("cmr_new_login")) {
            return cmr_new_login($this->config, $this->user);
        }
        return true;
    }
    /*==================*/
    /*==================*/
    public function event_log($values = "")
    {
        return cmr_error_log($this->config, $this->session, $values);
    }
    /*==================*/
    /*==================*/
    public function log_to_db($values = "")
    {
        return cmr_log_to_db($this->db_connection, $this->config["cmr_table_prefix"], $values);
    }
    /*==================*/
    public function run_query($sql_query)
    {
        if (!empty($sql_query)) {
            $this->output[] = &$database_conn->Execute($sql_query, $this->db_connection) or  print($database_conn->ErrorMsg());
        } else {
            foreach ($this->query as $key => $val) {
                $this->output[] = &$database_conn->Execute($val, $this->db_connection) or  print($database_conn->ErrorMsg());
            }
        }
        return $this->output;
    }
    /*==================*/
    public function send_email($email = null)
    {
        if (($email)) {
            $mssge = mail($email["recipient"], $email["subject"], $email["body"], $email["headers_all"]);
        } else {
            $mssge = mail($this->email["recipient"], $this->email["subject"], $this->email["body"], $this->email["headers_all"]);
        }
        return $mssge;
    }
    /*==================*/
    public function conf_exist($cmr_conf_file = "config.inc.php")
    {
        return  cmr_conf_exist($cmr_conf_file);
    }
    /*==================*/
    /*==================*/
    public function include_conf($file_name, $cmr_array = array(), $action = "const")
    {
        return cmr_include_conf($this->config, $file_name, $cmr_array, $action);
    }
    /*==================*/
    public function preload_config($list_conf = "")
    {
        return cmr_preload_config($this->config, $list_conf);
    }
    /*==================*/
    /*==================*/
    public function load_template($file_tpl, $limit_tpl = "")
    {
        return cmr_getput_template($file_tpl, $limit_tpl, $this->prints);
    }
    /*==================*/
    /*==================*/
    public function pure_name($cmrmodule = "")
    {
        return cmr_pure_name($this->config, $cmrmodule);
    }
    /*==================*/
    public function load_lang_need($cmrmodule = "")
    {
        return cmr_load_lang_need($this->config, $this->language, $this->page, $cmrmodule);
    }
    /*==================*/
    public function load_conf_need($cmrmodule = "")
    {
        return cmr_load_conf_need($this->config, $cmrmodule);
    }
    /*==================*/
    public function load_help_need($cmrmodule = "")
    {
        return cmr_load_help_need($this->config, $this->help, $cmrmodule);
    }
    /*==================*/
    /*==================*/
    public function update_mess()
    {
        return update_messages($this->config, $this->db_connection);
    }
    /*==================*/
    public function module_mess($module = "", $user = "", $group = "")
    {
        return module_message($this->config, $this->db_connection, $module, $user, $group);
    }
    /*==================*/
    public function exist_mess($module = "", $user = "", $group = "")
    {
        return exist_message($this->config, $module, $user, $group);
    }
    /*==================*/
    public function show_mess($module = "", $user = "", $group = "")
    {
        return show_message($this->config, $this->db_connection, $module, $user, $group);
    }
    /*==================*/
    public function user_mess($user = "", $group = "")
    {
        return user_message($this->config, $this->db_connection, $user, $group);
    }
    /*==================*/
    /*==================*/
    /*==================*/
    public function load_module_need()
    {
        return cmr_load_module_need($this->config, $this->language, $this->page, $this->module);
    }
    /*==================*/
    public function load_notify($subject_templates = "", $begin_text = "", $action_limit = "")
    {
        $notify = db_load_notify($this->config, $this->user, $this->db_connection, $this->config["cmr_table_prefix"] . $begin_text, $action_limit, $this->page["language"]);
        if ($notify) {
            return $notify;
        }
        $pattern_templates = $this->get_path("notify") . "templates/notify/format_notify.xml";
        return cmr_load_notify($this->config, $this->user, $subject_templates, $pattern_templates, $begin_text, $action_limit);
    }
    /*==================*/
    public function secure_all()
    {
        if (isset($this->config["cmr_secure_mode"])) {  /*======================BLOCK HACKING==============================*/
            include_once(cmr_get_path("index") . "control.php");
            secure_all_var();
        }
        return true;
    }
    /*==================*/
    public function load_cookie()
    {
        return cmr_load_cookie($this->config);
    }
    /*==================*/
    public function debug_print()
    {
        if (!isset($this->user["authorisation"]) || (intval($this->user["authorisation"]) >= intval($this->config["cmr_guest_type"]))) {
            // 	cmr_debug_print($this->debug, $this->module, $this->config, $this->themes, $this->page, $this->db, $this->user, $this->group, $this->post_var, $this->post_files, $this->session, $this->query, $this->language);

            cmr_prints($this->translate("BEGIN"));
            cmr_prints($this->translate("INCLUDED FILES"), get_included_files());
            cmr_prints($this->translate("CMR _GET"), $_GET);
            cmr_prints($this->translate("CMR _POST"), $_POST);
            cmr_prints($this->translate("CMR _SESSION"), $_SESSION);
            cmr_prints($this->translate("CMR _COOKIE"), $_COOKIE);
            cmr_prints($this->translate("CMR _SERVER"), $_SERVER);
            cmr_prints($this->translate("CMR DEBUG"), $this->debug);
            cmr_prints($this->translate("CMR APPLICATION CONFIGURATION"), $this->config);
            cmr_prints($this->translate("CMR MODULE"), $this->module);
            cmr_prints($this->translate("CMR THEMES"), $this->themes);
            cmr_prints($this->translate("CMR PAGE"), $this->page);
            cmr_prints($this->translate("CMR DATABASE"), $this->db);
            cmr_prints($this->translate("CMR QUERY"), $this->query);
            cmr_prints($this->translate("CMR USER"), $this->user);
            cmr_prints($this->translate("CMR GROUP"), $this->group);
            cmr_prints($this->translate("CMR POST VAR"), $this->post_var);
            cmr_prints($this->translate("CMR POST FILES"), $this->post_files);
            cmr_prints($this->translate("CMR SESSION"), $this->session);
            cmr_prints($this->translate("SERVER"), $_SERVER);
            cmr_prints($this->translate("ENV"), $_ENV);
            cmr_prints($this->translate("COOKIES"), $_COOKIE);
            cmr_prints($this->translate("PHP EXTENTION LOAD"), get_loaded_extensions());
            cmr_prints($this->translate("PHP CONFIGURATION OPTION"), ini_get_all());
            cmr_prints($this->translate("END"));
        } else {
            print("<br />" . $this->translate("User not allow") . "<br />" . $this->translate("current type") . "=" . $this->get_user("auth_type") . "<br />");
            print($this->translate("need type") . "=" . $this->get_conf("cmr_guest_type") . "<br />");
        }

        return $this;
    }
    /*==================*/
    /*==================*/
    public function good_file($type = "", $action = "")
    {
        $file_list = array();
        switch ($type) {
            case "notify":
            $file_list[] = $this->get_conf("notify_" . $action);
            $file_list[] = $this->get_user("auth_user_path") . "templates/notify/notify_" . $action . $this->get_ext("notify");
            $file_list[] = $this->get_user("auth_group_path") . "templates/notify/notify_" . $action . $this->get_ext("notify");
            if (!empty($this->config["notify_" . $action])) {
                $file_list[] = $this->get_conf("notify_" . $action);
                $file_list[] = $this->get_path("template") . $this->get_conf("notify_" . $action);
            }
            $file_list[] = $this->get_path("notify") . "templates/notify/" . $this->get_page("language") . "/notify_" . $action . $this->get_ext("notify");
            $file_list[] = $this->get_path("notify") . "templates/notify/" . $this->get_page("language") . "/auto/notify_" . $action . $this->get_ext("notify");
            $file_list[] = $this->get_path("notify")  ."templates/notify/auto/notify_" . $action . $this->get_ext("notify");
            break;

            case "template":
            $file_list[] = $this->get_user("auth_user_path") . "templates/modules/template_" . $action . $this->get_ext("template");
            $file_list[] = $this->get_user("auth_group_path") . "templates/modules/template_" . $action . $this->get_ext("template");
            if (!empty($this->config["template_" . $action])) {
                $file_list[] = $this->get_conf("template_" . $action);
                $file_list[] = $this->get_path("template") . $this->get_conf("template_" . $action);
            }
            $file_list[] = $this->get_path("template") . "templates/modules/template_" . $action . $this->get_ext("template");
            $file_list[] = $this->get_path("template") . "templates/modules/auto/template_" . $action . $this->get_ext("template");
            break;

            default:
            break;
        }
        return cmr_good_file($file_list);
    }
    /*==================*/
    /*==================*/
    public function run_event()
    {
        return cmr_get_data_event($this->config, $this->session, $this->event);
    }
    /*==================*/
    /*==================*/
    public function download_data($data = "\n", $the_file)
    {
        return export($this->config, $data, substr($the_file, strrpos($the_file, ".")), $the_file);
    }
    /*==================*/
    public function module_icon($module, $size = "16")
    {
        return class_module_icon($this->config, $module, $size = "16");
    }
    /*==================*/
    public function module_link($module, $image = "", $text = "", $img_heigth = "20", $img_right = "90", $link_layer = "middle1", $other_a_link = "", $other_img = "")
    {
        return code_link($this->config, $this->page, $this->language, $module, $image, $text, $img_heigth, $img_right, $link_layer, $other_a_link, $other_img);
    }
    /*==================*/
    public function update_page($win_action = "", $win_pos = "") // ----
    {
        return change_page($this->page, $this->module, $this->themes, $win_action, $win_pos);
    }
    /*==================*/
    public function link_default($val_table)
    {
        $mode = $this->page["__mode__"];
        $table = $this->page["__table__"];
        if ((($mode == "link_update") || ($mode == "link_print")) && ($table != "table")) {
            $table = "";
        }

        switch ($table) {
         case "ticket":
            if (function_exists("ticket_link_tab")) {
                if ($mode == "link_tab") {
                    return ticket_link_tab($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("ticket_link_detail")) {
                if ($mode == "link_detail") {
                    return ticket_link_detail($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("ticket_link_default")) {
                return ticket_link_default($this->config, $this->page, $this->language, $val_table);
            }
         break;
         case "message":
            if (function_exists("message_link_tab")) {
                if ($mode == "link_tab") {
                    return message_link_tab($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("message_link_detail")) {
                if ($mode == "link_detail") {
                    return message_link_detail($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("message_link_default")) {
                return message_link_default($this->config, $this->page, $this->language, $val_table);
            }
         break;
         case "download":
            if (function_exists("download_link_tab")) {
                if ($mode == "link_tab") {
                    return download_link_tab($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("download_link_detail")) {
                if ($mode == "link_detail") {
                    return download_link_detail($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("download_link_default")) {
                return download_link_default($this->config, $this->page, $this->language, $val_table);
            }
         break;
         case "table":
            if (function_exists("table_link_tab")) {
                if ($mode == "link_tab") {
                    return table_link_tab($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("table_link_tab")) {
                if ($mode == "link_print") {
                    return table_link_tab($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("table_link_tab")) {
                if ($mode == "link_update") {
                    return table_link_tab($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("table_link_detail")) {
                if ($mode == "link_detail") {
                    return table_link_detail($this->config, $this->page, $this->language, $val_table);
                }
            }
            if (function_exists("table_link_default")) {
                return table_link_default($this->config, $this->page, $this->language, $val_table);
            }
         break;
         default:
            if ($mode == "link_default") {
                return cmr_link_default($this->config, $this->page, $this->language, $val_table);
            }
            if ($mode == "link_detail") {
                return cmr_link_detail($this->config, $this->page, $this->language, $val_table);
            }
            if ($mode == "link_tab") {
                return cmr_link_tab($this->config, $this->page, $this->language, $val_table);
            }
            if ($mode == "link_update") {
                return cmr_link_tab($this->config, $this->page, $this->language, $val_table);
            }
            if ($mode == "link_print") {
                return cmr_link_tab($this->config, $this->page, $this->language, $val_table);
            }
            return cmr_link_default($this->config, $this->page, $this->language, $val_table);
         break;
     }

        return cmr_link_default($this->config, $this->page, $this->language, $val_table);
    }
    /*==================*/
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /*==================*/
    public function get_title($base_name = "")
    {
        $title = "-";
        if (isset($this->language[$base_name])) {
            $title = ($this->translate($base_name));
        }

        // 	if(isset($this->language[$base_name . "_title"]))
        if (0) {
            $text = "</br><fieldset class=\"bubble\"><legend>" . $title . "</legend>";
            $text .= ($this->translate($base_name . "_title"));
            $text .= "</fieldset></br>";
        } else {
            $text = "<br /><b>" . $title . "</b><br />";
        }
        return $text;
    }
    /*==================*/
    /*==================*/
    public function get_column($table = "", $col_need = "", $key = "", $value = "")
    {
        return return_key($this->config, $this->user, $this->db_connection, $table, $col_need, $key, $value);
    }
    /*==================*/
    /*==================*/
    public function print_select($table = "cmr_user", $column = "name", $action = "type", $db_name = "mysql", $col_id = "", $limit = "1000", $order = "id", $width = "100")
    {
        return cmr_print_select($this->config, $this->language, $this->db_connection, $table, $column, $action, $db_name, $col_id, $limit, $order, $width);
    }
    /*==================*/
    /*==================*/
    public function print_value($table_name = "cmr_user", $column_name = "", $column_val = "", $column_type = "type", $column_foreign = "0", $col_id = "", $limit = "1000", $order = "id", $width = "100")
    {
        return cmr_print_value($this->config, $this->language, $this->db_connection, $table_name, $column_name, $column_val, $column_type, $column_foreign, $col_id, $limit, $order, $width);
    }
    /*==================*/
    /*==================*/
    public function next_preview_bar($base_name = "", $num_page = 2)
    {
        return show_next_preview_bar($this->config, $this->language, $this->page, $this->module["name"], $this->post_var[$base_name . "_page"], $num_page, $this->module["position"], "&search_text=" . $this->post_var["search_text"] . "");
    }
    /*==================*/
    /*==================*/
    public function view_assign_del($base_mode = "", $run_mode = array())
    {
        return button_assign_del($this->config, $this->language, $this->page, $this->module["name"], $base_mode, $this->module["position"], $run_mode);
    }
    /*==================*/
    /*==================*/
    public function readed_line($table = "")
    {
        return cmr_readed_line($this->config, $this->user, $this->db_connection, $table);
    }
    /*==================*/
    /*==================*/
    public function where_query()
    {
        return cmr_where_query($this->config, $this->user, $this->action, $this->db_connection);
    }
    /*==================*/
    /*==================*/
    public function sql_view($cmr_query = "", $table_name = "", $base_name = "", $date_time1 = "")
    {
        return cmr_sql_view($this->config, $this->post_var, $this->action, $this->db_connection, $cmr_query, $table_name, $base_name, $date_time1);
    }
    /*==================*/
    /*==================*/
    /*====== GET =======*/
    /*==================*/
    /*==================*/
    public function get_path($param = "")
    {
        if ($param == "index") {
            return $this->config["cmr_path"];
        }
        if (empty($param)) {
            return $this->config["cmr_path"];
        }
        return $this->config["cmr_" . $param . "_path"];
    } // function to get the config  value of the key ($param).
    public function get_ext($param = "")
    {
        return $this->config["cmr_" . $param . "_ext"];
    } // function to get the config  value of the key ($param).
    public function get_conf($param = "")
    {
        if (isset($this->config[$param])) {
            return $this->config[$param];
        }
    } // function to get the config  value of the key ($param).
    public function get_theme($param = "")
    {
        return $this->themes[$param];
    } // function to get the themes  value of the key ($param).
    public function get_page($param = "")
    {
        //return $this->page[$param];
        return isset($this->page[$param])?($this->page[$param]):"";
    } // function to get the page  value of the key ($param).
    public function get_language($param = "")
    {
        return $this->language[$param];
    } // function to get the language  value of the key ($param).
    public function get_help($param = "")
    {
        return $this->help[$param];
    } // function to get the help  value of the key ($param).

    public function get_buffer($param = "")
    {
        return $this->buffer[$param];
    } // function to get the buffer html content of the key ($param).
    public function get_db_connection()
    {
        return $this->db_connection;
    } // function to get the database connection
    public function get_db($param = "")
    {
        return $this->db[$param];
    } // function to get the db  value of the key ($param).
    public function get_user($param = "")
    {
        return isset($this->user[$param])?($this->user[$param]):"";
    } // function to get the user  value of the key ($param).
    public function get_group($param = "")
    {
        return $this->group[$param];
    } // function to get the group  value of the key ($param).

    public function get_report($param = "")
    {
        return $this->report[$param];
    } // function to get the report  value of the key ($param).

    public function get_post_files($param = "")
    {
        return $this->post_files[$param];
    } // function to get the post_files  value of the key ($param).
    public function get_post_var($param = "")
    {
        return $this->post_var[$param];
    } // function to get the post_var  value of the key ($param).
    public function get_session($param = "")
    {
        return $this->session[$param];
    } // function to get the session  value of the key ($param).
    public function get_cookies($param = "")
    {
        return $this->cookies[$param];
    } // function to get the cookies  value of the key ($param).
    public function get_imap($param = "")
    {
        return $this->imap[$param];
    } // function to get the imap  value of the key ($param).
    public function get_email($param = "")
    {
        return $this->email[$param];
    } // function to get the email  value of the key ($param).
    public function get_notify($param = "")
    {
        return $this->notify[$param];
    } // function to get the email  value of the key ($param).
    public function get_event($param = "")
    {
        return $this->event[$param];
    } // function to get the event  value of the key ($param).
    public function get_prints($param = "")
    {
        return $this->prints[$param];
    } // function to get the event  value of the key ($param).

    public function get_action($param = "")
    {
        return $this->action[$param];
    } // function to get the action  value of the key ($param).
    public function get_module($param = "")
    {
        return $this->module[$param];
    } // function to get the module  value of the key ($param).
public function print_template($part = "", $template = "", $prints = array()) // ----
{
    // if(empty($template)) $template = $this->template;
    if (empty($prints)) {
        $prints = $this->prints;
    }
    return print(cmr_print_template($template, $part, $prints));
}
    /*==================*/
    /*==================*/
    /*====== SET =======*/
    /*==================*/
    /*==================*/
    public function set_config($param, $value = "")
    {
        return ($this->config[$param] = $value);
    } // function to set $this->config[$param] with the value ($value).
    public function set_themes($param, $value = "")
    {
        return ($this->themes[$param] = $value);
    } // function to set $this->themes[$param] with the value ($value).
    public function set_page($param, $value = "")
    {
        return ($this->page[$param] = $value);
    } // function to set $this->page[$param] with the value ($value).
    public function set_language($param, $value = "")
    {
        return ($this->language[$param] = $value);
    } // function to set $this->language[$param] with the value ($value).
    public function set_help($param, $value = "")
    {
        return ($this->help[$param] = $value);
    } // function to set $this->help[$param] with the value ($value).

    public function set_buffer($param, $value = "")
    {
        return ($this->buffer[$param] = $value);
    } // function to set $this->buffer html content
    public function set_db_connection($value = "")
    {
        return ($this->db_connection= $value);
    } // function to set $this->database connection
    public function set_db($param, $value = "")
    {
        return ($this->db[$param] = $value);
    } // function to set $this->db[$param] with the value ($value).
    public function set_user($param, $value = "")
    {
        return ($this->user[$param] = $value);
    } // function to set $this->user[$param] with the value ($value).
    public function set_group($param, $value = "")
    {
        return ($this->group[$param] = $value);
    } // function to set $this->group[$param] with the value ($value).

    public function set_report($param, $value = "")
    {
        return ($this->report[$param] = $value);
    } // function to set $this->report[$param] with the value ($value).
    public function set_post_files($param, $value = "")
    {
        return ($this->post_files[$param] = $value);
    } // function to set $this->post_files[$param] with the value ($value).
    public function set_post_var($param, $value = "")
    {
        return ($this->post_var[$param] = $value);
    } // function to set $this->post_var[$param] with the value ($value).
    public function set_session($param, $value = "")
    {
        return ($this->session[$param] = $value);
    } // function to set $this->session[$param] with the value ($value).
    public function set_cookies($param, $value = "")
    {
        return ($this->cookies[$param] = $value);
    } // function to set $this->cookies[$param] with the value ($value).
    public function set_imap($param, $value = "")
    {
        return ($this->imap[$param] = $value);
    } // function to set $this->imap[$param] with the value ($value).
    public function set_email($param, $value = "")
    {
        return ($this->email[$param] = $value);
    } // function to set $this->email[$param] with the value ($value).
    public function set_notify($param, $value = "")
    {
        return ($this->notify[$param] = $value);
    } // function to set $this->email[$param] with the value ($value).
    public function set_event($param, $value = "")
    {
        return ($this->event[$param] = $value);
    } // function to set $this->event[$param] with the value ($value).
    public function set_prints($param, $value = "")
    {
        return ($this->prints[$param] = $value);
    } // function to set $this->event[$param] with the value ($value).

    public function set_action($param, $value = "")
    {
        return ($this->action[$param] = $value);
    } // function to set $this->action[$param] with the value ($value).
    public function set_module($param, $value = "")
    {
        return ($this->module[$param] = $value);
    } // function to set $this->module[$param] with the value ($value).
    /*==================*/
    /*==================*/
    /*==================*/
    //00000000000000000000000000
    public function show($param="")
    {
        if ($param) {
            cmr_print_r($this->$param);
        } else {
            cmr_prints($this->translate("BEGIN"));
            cmr_prints($this->translate("INCLUDED FILES"), get_included_files());
            //cmr_print_r($this->translate("CMR get_declared_classes"), get_declared_classes());
            //cmr_print_r($this->translate("CMR get_object_vars"), get_object_vars($this));
            //cmr_print_r($this->translate("CMR get_class_methods"), get_class_methods($this));
            cmr_prints($this->translate("CMR DB"), $this->db);
            cmr_prints($this->translate("CMR USER"), $this->user);
            cmr_prints($this->translate("CMR GROUP"), $this->group);
            cmr_prints($this->translate("CMR _GET"), $_GET);
            cmr_prints($this->translate("CMR _POST"), $_POST);
            cmr_prints($this->translate("CMR _SESSION"), $_SESSION);
            cmr_prints($this->translate("CMR _COOKIE"), $_COOKIE);
            cmr_prints($this->translate("CMR _SERVER"), $_SERVER);
            cmr_prints($this->translate("CMR POST_VAR"), $this->post_var);
            cmr_prints($this->translate("CMR THEMES"), $this->themes);
            cmr_prints($this->translate("CMR PAGE"), $this->page);
            cmr_prints($this->translate("CMR CONFIG"), $this->config);
        }
        return true;
    }
    //00000000000000000000000000
    //00000000000000000000000000
    public function close()
    {
        /*==================*/
        // 	unset($_SESSION["info"]);
        /*==================*/
        /*==================*/
        $this->save_session();
        /*==================*/
        $this->email = array();
        $this->buffer = array();
        //$_SESSION = array();
        //$_COOKIE = array();
        return true;
    }
    //00000000000000000000000000
}
//0000000000000000000000000000000000000000000000000000000000000000000000000000
//000000000000000000000000000         End       000000000000000000000000000000
//0000000000000000000000000000000000000000000000000000000000000000000000000000
