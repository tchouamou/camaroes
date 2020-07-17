<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * template_login.php
 *  ----------------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










template_login.php,  2011-Oct
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        /*==================*/

    // --chosing authentification method by host ip or hostname---
// 	 if(cmr_new_login($cmr->config, $cmr->user))
     $_SESSION['host_name'] = gethostbyaddr($_SERVER['REMOTE_ADDR']); //--Critico--
     if (empty($_SESSION['host_name'])) {
         $_SESSION['host_name'] = $_SERVER['REMOTE_ADDR'];
     }
     if (empty($_SESSION['host_name'])) {
         $_SESSION['host_name'] = "remotehost";
     }
     $cmr->config = auth_method($cmr->config, $_SERVER['REMOTE_ADDR'], $_SESSION['host_name']);
        /*==================*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->post_var["login_to"] = get_post("login_to");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    switch (trim($cmr->post_var["login_to"])) {
        case "script_generator":
        case "button_generator":
        case "file_explorator":
        case "replace":
        case "email":
        case "message":
        case "ticket":
// 			$cmr->config["cmr_allow_forget_account"] = 1;
// 			$cmr->config["cmr_allow_inscription"] = 1;
// 			$cmr->config["cmr_allow_validation"] = 1;
            $cmr->config["cmr_allow_default_pw"] = 0;
            $cmr->config["cmr_allow_db_login"] = 0;
            $cmr->config["cmr_allow_theme_login"] = 1;
            $cmr->config["cmr_clock_engine"] = 1;
            $cmr->config["cmr_allow_select_login"] = 0;
// 			$cmr->config["cmr_allow_certificate_login"] = 1;
        break;

        case "database":
        case "report":
        case "admin":
            $cmr->config["cmr_allow_forget_account"] = 0;
// 			$cmr->config["cmr_allow_inscription"] = 1;
// 			$cmr->config["cmr_allow_validation"] = 1;
            $cmr->config["cmr_allow_default_pw"] = 0;
// 			$cmr->config["cmr_allow_db_login"] = 1;
            $cmr->config["cmr_allow_theme_login"] = 1;
            $cmr->config["cmr_clock_engine"] = 0;
// 			$cmr->config["cmr_allow_select_login"] = 1;
// 			$cmr->config["cmr_allow_certificate_login"] = 1;
        break;

        default:
// 			$cmr->config["cmr_allow_forget_account"] = 1;
// 			$cmr->config["cmr_allow_inscription"] = 1;
// 			$cmr->config["cmr_allow_validation"] = 1;
// 			$cmr->config["cmr_allow_default_pw"] = 1;
// 			$cmr->config["cmr_allow_db_login"] = 1;
            $cmr->config["cmr_allow_theme_login"] = 1;
            $cmr->config["cmr_clock_engine"] = 1;
// 			$cmr->config["cmr_allow_select_login"] = 1;
// 			$cmr->config["cmr_allow_certificate_login"] = 1;
        break;

        }

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


if (($cmr->get_conf("cmr_apache_auth"))) {
    // ================ APACHE AUTHENTIFICATION =========================
    $force_login = get_post("force_login");
    // ===============Last control===========================================
    if (($force_login == "yes") && (!isset($_COOKIE['force_login']))) {
        if ($force_login == "yes") {
            cmr_setcookie("force_login", "no", time() + 10);
        }
        cmr_auth_basic($cmr->config, $_SERVER['PHP_SELF']);
    }
    // ==================================================================

    // ==================================================================
    if (!(isset($_SERVER['PHP_AUTH_USER']))) {
        cmr_auth_basic($cmr->config, $_SERVER['PHP_SELF']);
    } else {
        $cmr->event["id"] = "1";
        $cmr->event["name"] = "login_apache";
        $cmr->event["line"]=__LINE__;
        $cmr->event["script"]=__FILE__;
        $cmr->event["data"] = "";
        $cmr->event["comment"] = "Apache authentification Auth_User=" . $_SERVER['PHP_AUTH_USER'];
        $cmr->run_event();
//         @ $cmr->event_log("Script=" . __FILE__ . " Line=" . __LINE__ . " : " . "Apache authentification Auth_User=" . $_SERVER['PHP_AUTH_USER']);
//         cmr_header("Location: " . $cmr->get_path("index") . "index.php");
    }
}
// ==================================================================
elseif (($cmr->get_conf("cmr_radius_auth"))) {
    // ==============Here Delete the Radius cookies to force uthentification================================
    // ==================== RADIUS AUTHENTIFICATION =====================
    $cmr->event["id"] = "2";
    $cmr->event["name"] = "login_radius";
    $cmr->event["line"]=__LINE__;
    $cmr->event["script"]=__FILE__;
    $cmr->event["data"] = "";
    $cmr->event["comment"] = "Radius authentification User=" . cmr_remote_user();
    $cmr->run_event();
//     @ $cmr->event_log("Script=" . __FILE__ . " Line=" . __LINE__ . " : " . "Radius authentification_User=" . cmr_remote_user());
//     cmr_header("Location: " . $cmr->get_path("index") . "index.php");
} elseif (($cmr->get_conf("cmr_other_auth"))) {
    // ==============Here Delete the other cookies to force uthentification================================
    // ==================== OTHER AUTHENTIFICATION =====================
    $cmr->event["id"] = "3";
    $cmr->event["name"] = "login_other";
    $cmr->event["line"]=__LINE__;
    $cmr->event["script"]=__FILE__;
    $cmr->event["data"] = "";
    $cmr->event["comment"] = "Other authentification User=" . cmr_remote_user();
    $cmr->run_event();
//     @ $cmr->event_log("Script=" . __FILE__ . " Line=" . __LINE__ . " : " . "Other authentification");
//     cmr_header("Location: " . $cmr->get_path("index") . "index.php");
} elseif (($cmr->get_conf("cmr_url_auth"))) {
    // ==================== URL AUTHENTIFICATION =====================
    $cmr->event["id"] = "4";
    $cmr->event["name"] = "login_url";
    $cmr->event["line"]=__LINE__;
    $cmr->event["script"]=__FILE__;
    $cmr->event["data"] = "?auth_user_send=" . $cmr->get_conf("cmr_default_user") . "&auth_pw_send=" . $cmr->get_conf("cmr_default_pw");
    $cmr->event["comment"] = "Url authentification [guest mode] User=". $cmr->get_conf("cmr_default_user");
    $cmr->run_event();
//     @ $cmr->event_log("Script=" . __FILE__ . " Line=" . __LINE__ . " : " . "Url authentification [guest mode]");
//     cmr_header("Location: " . $cmr->get_path("index") . "index.php?auth_user_send=" . $cmr->get_conf("cmr_default_user") . "&auth_pw_send=" . $cmr->get_conf("cmr_default_pw") . ");
} elseif (($cmr->get_conf("cmr_no_auth"))) {
    // ==================== NO AUTHENTIFICATION =====================
    $cmr->event["id"] = "5";
    $cmr->event["name"] = "login_no";
    $cmr->event["line"]=__LINE__;
    $cmr->event["script"]=__FILE__;
    $cmr->event["data"] = "?auth_user_send=" . $cmr->get_conf("cmr_default_user") . "&auth_pw_send=" . $cmr->get_conf("cmr_default_pw");
    $cmr->event["comment"] = "No authentification [guest mode] User=". $cmr->get_conf("cmr_default_user");
    $cmr->run_event();
//     @ $cmr->event_log("Script=" . __FILE__ . " Line=" . __LINE__ . " : " . "No authentification [guest mode]");
//     cmr_header("Location: " . $cmr->get_path("index") . "index.php?auth_user_send=" . $cmr->get_conf("cmr_default_user") . "&auth_pw_send=" . $cmr->get_conf("cmr_default_pw") . ");
    exit;
} elseif (($cmr->get_conf("cmr_ip_auth"))) {
    // ==================== IP AUTHENTIFICATION =====================
    $cmr->event["id"] = "6";
    $cmr->event["name"] = "login_ip";
    $cmr->event["line"]=__LINE__;
    $cmr->event["script"]=__FILE__;
    $cmr->event["data"] = "?auth_user_send=" . $cmr->get_conf("cmr_default_user") . "&auth_pw_send=" . $cmr->get_conf("cmr_default_pw");
    $cmr->event["comment"] = "Ip authentification User=". $cmr->get_conf("cmr_default_user");
    $cmr->run_event();
//     @ $cmr->event_log("Script=" . __FILE__ . " Line=" . __LINE__ . " : " . "IP authentification ");
//     cmr_header("Location: " . $cmr->get_path("index") . "index.php?auth_user_send=" . $cmr->get_conf("cmr_default_user") . "&auth_pw_send=" . $cmr->get_conf("cmr_default_pw") . ");
} elseif (($cmr->get_conf("cmr_cookie_auth"))) {
    // ==================== COOKIE AUTHENTIFICATION =====================
    $cmr->event["id"] = "7";
    $cmr->event["name"] = "login_cookie";
    $cmr->event["line"]=__LINE__;
    $cmr->event["script"]=__FILE__;
    $cmr->event["data"] = "";
    $cmr->event["comment"] = "Apache authentification Auth_User=" . $_SERVER['PHP_AUTH_USER'];
    $cmr->run_event();
    @cmr_setcookie("auth_user_send", $cmr->get_conf("cmr_default_user"), time() + 420);
    @cmr_setcookie("auth_pw_send", $cmr->get_conf("cmr_default_pw"), time() + 420);
//     @ $cmr->event_log("Script=" . __FILE__ . " Line=" . __LINE__ . " : " . "Cookie authentification ");
//     cmr_header("Location: " . $cmr->get_path("index") . "index.php?auth_user_send=" . $cmr->get_conf("cmr_default_user") . "&auth_pw_send=" . $cmr->get_conf("cmr_default_pw") . ");
}


 // if(($cmr->get_conf("cmr_normal_auth")))
// ==================================================================
// ==================== NORMAL FORM AUTHENTIFICATION ================
    $cmr->event["id"] = "8";
    $cmr->event["name"] = "login_form";
    $cmr->event["line"]=__LINE__;
    $cmr->event["script"]=__FILE__;
    $cmr->event["data"] = "";
    $cmr->event["comment"] = "Nomal form authentification ";
    $cmr->run_event();
// ==================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->session["cmr_img_code"] = $cmr->gener_code("Camaroes");
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
if (($cmr->get_conf("cmr_clock_engine"))) {
    $cmr->prints["match_clock_engine"] = $cmr->get_page("cmr_clock_engine")."; ";
}

$cmr->prints["match_ajax_engine"] = ";";
$cmr->prints["match_legend_link"] = "";
$cmr->prints["match_option_login_to"] = "";

$cmr->prints["match_onload"] = ";";
$cmr->prints["match_noscript"] = $cmr->translate("!!! Need java script to run well !!!");
$cmr->prints["match_sound"] = 0;



if ($cmr->get_conf('cmr_exec_sound')) {
    $cmr->prints["match_sound"] = "";
}
// // print("<embed src=\"". $cmr->get_conf("cmr_audio_sound") ."\" hidden=\"true\" height=\"60\" width=\"135\" autostart=\"true\" loop=\"false\" playcount=\"1\" volume=\"10\" starttime=\"00:11\" endtime=\"00:16\"/>");
// // print("<noembed>";style=\"visibility :hidden); display:none\"
// print("<bgsound src=\"". $cmr->get_conf("cmr_audio_sound") ."\"  loop=\"1\" />");
// // print("</noembed>");

$cmr->page["middle1"] = "login";
if (($cmr->get_page("page_title"))&&(strlen($cmr->page["page_title"])>2)) {
    $cmr->prints["match_title"] = ucfirst(cmr_search_replace("_", " ", $cmr->get_page("page_title")))." (" . $cmr->config["cmr_company_name3"] . ") " . $cmr->get_conf("cmr_version");
} else {
    $cmr->prints["match_title"] = "(" . $cmr->config["cmr_company_name3"] . ") " . ucfirst(cmr_search_replace("_", " ", substr($cmr->get_page("middle1"), 0, strrpos($cmr->get_page("middle1"), ".")))) . " - Ver. " . $cmr->get_conf("cmr_version");
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->config["template_login"];
$file_list[] = $cmr->get_path("template") . "templates/template_login" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/origin/template_login" . $cmr->get_ext("template");
$template_login_file = cmr_good_file($file_list);
$template_login = file_get_contents($template_login_file);
$cmr->print_template("template1", $template_login);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $user_email=$cmr->user["auth_email"];


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "login";
$mod->rown_position = "head";
$mod->col_position = "1";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 if (cmr_match_include($template_login, "match_include1")) {
     include_once($cmr->get_path("module") . "modules/guest/page_header.php");
 }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->themes["win_type"] = "default";
// $division->load_template($cmr->themes);

$division->module["name"]= "login";
$division->module["title"] = $cmr->translate("login");

$division->themes["module_positionx"]= "middle";
$division->themes["module_positiony"]= "1;1;1;1;1;1";

if (isset($cmr->post_var["login_to"])) {
    $division->module["title"] = $cmr->translate("login to")." : " . $cmr->post_var["login_to"];
}
// $division->module["text"] = $str;



// $division->themes["background"]= "";
// $division->bgcolor = "#E0E0E0";



$division->themes["header_tools_right"] = 0;








$cmr->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_login_failled"] = "";
if (get_post("login")) {
    $cmr->prints["match_login_failled"] = $cmr->translate("login failled");
}
//$cmr->show();exit;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//include_once(dirname(__FILE__) . "/adodb/adodb.inc.php");
//$result = sql_run("result", $cmr->connect(), "select", "", $cmr->config["db_name"], $cmr->config["cmr_table_prefix"] . "user", "email");
if (empty($result)) {
    $cmr->prints["match_login_failled"] = $cmr->translate("IF problem with connection - ") . "<a href=\"index.php?cmr_mode=install_need\" >" .  $cmr->translate("Click here to solve the problem") . "</a>";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_module_message"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ==================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["cmr_wwwpath"] = "";
// $cmr->prints["match_form_param"] = "";
// $cmr->prints["match_form_id"] = "login";
$cmr->prints["match_link_login"] = "";
$cmr->prints["cmr_allow_forget_account"] = "";
$cmr->prints["cmr_allow_inscription"] = "";
$cmr->prints["cmr_allow_certificate_login"] = "";
$cmr->prints["match_link_validation"] = "";
$cmr->prints["match_link_forget_account"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_cmr_images_path"] = $cmr->get_path("image");
$cmr->prints["match_label_Login"] = $cmr->translate("Login");

$cmr->prints["match_label_login_to"] = $cmr->translate("login to");
$cmr->prints["match_all"] = $cmr->translate("all");

$cmr->prints["match_default_login_to"] = "all";
if (!empty($_COOKIE["login_to"])) {
    $cmr->prints["match_default_login_to"] = $_COOKIE["login_to"];
}
if ($cmr->post_var["login_to"]) {
    $cmr->prints["match_default_login_to"] = $cmr->post_var["login_to"];
}
$array_value = get_page_list($cmr->config);
$cmr->prints["match_option_login_to"] .= select_order($cmr->language, $array_value[1], $array_value[2], "");


$cmr->prints["match_login"] = $cmr->translate("login");



$cmr->print_template("template2", $template_login);

$cmr->prints["match_label_normal"] = $cmr->translate("normal");
$cmr->prints["match_label_cert"] = $cmr->translate("cert");
$cmr->prints["match_label_demo"] = $cmr->translate("demo");
$cmr->prints["match_label_read_only"] = $cmr->translate("read only");
$cmr->prints["match_label_certificate"] = $cmr->translate("certificate");
if (($cmr->get_conf("cmr_allow_select_login"))) {
    $cmr->print_template("template3", $template_login);
} else {
    print("<input type=\"hidden\" value=\"" . $cmr->post_var["login_to"] . "\" name=\"login_to\" />");
}


@$cmr->prints["match_cookie_auth_cert"] = $_COOKIE["auth_cert"];
if (($cmr->get_conf("cmr_allow_certificate_login"))) {
    $cmr->print_template("template4", $template_login);
}

@$cmr->prints["match_save_cookies"] = $_COOKIE["save_cookies"];
$cmr->prints["match_user_name"] = $cmr->translate("insert user name and password - default ") . "(admin / admin)";
$cmr->prints["match_label_uid"] = $cmr->translate("id user:");
@$cmr->prints["match_cookie_auth_user"] = $_COOKIE["auth_user"];
$cmr->prints["match_label_password"] = $cmr->translate("password:");
@$cmr->prints["match_cookie_auth_pw"] = $_COOKIE["auth_pw"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_value_image_code"] = pw_encode($cmr->get_session("cmr_img_code"));
$cmr->prints["match_image_code"] = $cmr->get_session("cmr_img_code");
$cmr->prints["match_alt_code"] = "[code]";
if (($cmr->get_session("cmr_img_code"))) {
}
$cmr->prints["match_label_image_code"] = $cmr->translate("image code:");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_label_login"] = $cmr->translate("login");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $cmr->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
// $cmr->prints["match_submit"] = $cmr->translate("login");
// $cmr->prints["match_submit_java"] = $cmr->translate("confirm login");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->prints["match_label_info"] = $cmr->translate("info");

$cmr->prints["match_label_save_cookies"] = $cmr->translate(" Save to (cookies)");

$cmr->prints["match_link_login"] ="<a href=\"index.php?cmr_mode=login&force_login=yes\" ><big>" . $cmr->translate("Login") . "</big></a>";
$cmr->prints["match_link_logout"] ="<a href=\"index.php?cmr_mode=logout\" ><big>" . $cmr->translate("logout") . "</big></a>";

if (($cmr->get_conf("cmr_allow_forget_account"))) {
    $cmr->prints["match_link_forget_account"] = "<a href=\"index.php?cmr_mode=forget_account\" ><big>" . $cmr->translate("Forget Account") . "</big></a>";
}

if (($cmr->get_conf("cmr_allow_inscription"))) {
    $cmr->prints["match_link_inscription"] = "<a href=\"index.php?cmr_mode=inscription\" ><big>" . $cmr->translate("New account") . "</big></a>";
}

if (($cmr->get_conf("cmr_allow_validation"))) {
    $cmr->prints["match_link_validation"] = "<a href=\"index.php?cmr_mode=validation\" ><big>" . $cmr->translate("Account Validation") . "</big></a>";
}


$cmr->prints["match_label_admin_user"] = $cmr->translate("default admin user:");
$cmr->prints["match_label_admin_pw"] = $cmr->translate("default admin pw:");
$cmr->prints["match_label_operator_user"] = $cmr->translate("default operator user:");
$cmr->prints["match_label_operator_pw"] = $cmr->translate("default operator pw:");
$cmr->prints["match_label_guest_user"] = $cmr->translate("default guest user:");
$cmr->prints["match_label_guest_pw"] = $cmr->translate("default guest pw:");

if (($cmr->get_conf("cmr_allow_normal_login"))) {
    $cmr->print_template("template5", $template_login);
}


if (($cmr->get_conf("cmr_allow_default_pw"))) {
    $cmr->print_template("template6", $template_login);
}


$cmr->prints["match_option_db_type"] = "";
$array_driver = get_db_drivers($cmr->config);
$cmr->prints["match_option_db_type"] .= select_order($cmr->language, $array_driver, $array_driver, "");

$cmr->prints["match_label_database"] = $cmr->translate("database");
$cmr->prints["match_label_db_type"] = $cmr->translate("database type");
$cmr->prints["match_label_db_host"] = $cmr->translate("database host");
$cmr->prints["match_label_db_name"] = $cmr->translate("database name");
$cmr->prints["match_label_db_user"] = $cmr->translate("database user");
$cmr->prints["match_label_db_pw"] = $cmr->translate("database password");

@ $cmr->prints["match_cookie_db_pw"] = $_COOKIE["db_pw"];
@ $cmr->prints["match_cookie_db_user"] = $_COOKIE["db_user"];
@ $cmr->prints["match_cookie_db_name"] = $_COOKIE["db_name"];
@ $cmr->prints["match_cookie_db_host"] = $_COOKIE["db_host"];
@ $cmr->prints["match_cookie_db_type"] = $_COOKIE["db_type"];

if (($cmr->get_conf("cmr_allow_db_login"))) {
    $cmr->print_template("template7", $template_login);
}

$cmr->prints["match_label_other"] = $cmr->translate("other");
$cmr->prints["match_label_cmr_lang"] = $cmr->translate("language");
$cmr->prints["match_cmr_default_lang"] = $cmr->get_conf("cmr_default_lang");
$cmr->prints["match_cookie_cmr_lang"] = "";
@ $cmr->prints["match_cookie_cmr_lang"] = $_COOKIE["cmr_lang"];
// $cmr->prints["match_label_default"] = $cmr->translate("default");

$cmr->prints["match_options_language"] = "";
$array_value = get_languages_list($cmr->config);
$cmr->prints["match_options_language"] .= select_order($cmr->language, $array_value[1], $array_value[2], "1");


$cmr->prints["match_label_themes"] = $cmr->translate("themes");
$cmr->prints["match_cmr_default_theme"] = $cmr->get_conf("cmr_default_theme");
$cmr->prints["match_cookie_cmr_theme"] = "";
@ $cmr->prints["match_cookie_cmr_theme"] = $_COOKIE["cmr_theme"];
// $cmr->prints["match_label_default"] = $cmr->translate("default");

$cmr->prints["match_options_theme"] = "";
$array_value = get_themes_list($cmr->config);
$cmr->prints["match_options_theme"] .= select_order($cmr->language, $array_value[1], $array_value[2], "");

if (($cmr->get_conf("cmr_allow_theme_login"))) {
}
$cmr->print_template("template8", $template_login);

$cmr->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->prints["match_label_Login"] = $cmr->translate("Login");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template9", $template_login);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "footer";
$mod->rown_position = "foot";
$mod->col_position = "1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if (cmr_match_include($template_login, "match_include2")) {
    include($cmr->get_path("module") . "modules/guest/page_footer.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template10", $template_login);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//$_SESSION = array();
exit;
