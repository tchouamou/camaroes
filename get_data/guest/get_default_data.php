<?php
defined("cmr_online") or die("Application is not online, click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_default_data.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











get_default_data.php,  2011-Oct
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
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// print_r($_GET);
// print_r($_POST);exit;
// -------------------
// -------------------

foreach($_GET as $key => $value){
        if(($key) && cmr_searchi("'" . $key . "'", $cmr->get_conf("cmr_var_restrict"))){
        $cmr->event["id"] = "26";
        $cmr->event["name"] = "var_restrict";
        $cmr->event["line"]=__LINE__;
        $cmr->event["script"]=__FILE__;
        $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
        $cmr->event["comment"] = " trying to change the restrict var [" . $key . "]  action not permited";
        $cmr->run_event();
        }
//     empty($key) or $cmr->post_var[$key] = $value;
    empty($key) or $cmr->post_var[$key] = get_post($key, "get");
    }
// -------------------
// -------------------
foreach($_POST as $key => $value){
        if(($key) && cmr_searchi("'" . $key . "'", $cmr->get_conf("cmr_var_restrict"))){
        $cmr->event["id"] = "26";
        $cmr->event["name"] = "var_restrict";
        $cmr->event["line"]=__LINE__;
        $cmr->event["script"]=__FILE__;
        $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
        $cmr->event["comment"] = " trying to change the restrict var [" . $key . "]  action not permited";
        $cmr->run_event();
        }
//     empty($key) or $cmr->post_var[$key] = $value;
    empty($key) or $cmr->post_var[$key] = get_post($key, "post");
    }

// ============================================
// ============================================
// ============================================
// $cmr->post_var["conf"] = get_post("conf", "get");
// // -------------------
$cmr->post_var["cod"] = get_post("cod", "get");
// $cmr->post_var["vals"] = get_post("vals", "get");
// $cmr->post_var["keys"] = get_post("keys", "get");

// $cmr->post_var["sid"] = get_post("cmr_sid", "get");
// $cmr->post_var["win_action"] = get_post('win_action', 'get');
// $cmr->post_var["win_pos"] = get_post('win_pos', 'get');
// $cmr->post_var["conf_name"] = get_post('conf_name');
// $cmr->post_var["current_action"] = get_post('current_action', 'get');
$cmr->post_var["current_tab"] = get_post('current_tab', 'get');
// $cmr->post_var["current_themes"] = get_post('current_themes', 'get');
// $cmr->post_var["current_lang"] = get_post('current_lang', 'get');
// $cmr->post_var["current_refresh"] = get_post('current_refresh', 'get');
// $cmr->post_var["current_file"] = get_post('current_file', 'get');
// // $cmr->post_var["current_db_name"] = get_post('current_db_name', 'get');
// $cmr->post_var["pdf_param"] = get_post('pdf_param', 'get');
$cmr->post_var["module_name"] = get_post('module_name', 'get');
$cmr->post_var["action_cod"] = get_post('action_cod', 'get');
// -------------------
// -------------------
if(($cmr->post_var["action_cod"]) && ($cmr->get_conf("cmr_secure_mode")))
$cmr->post_var = secure_get_href($cmr->post_var);
// -------------------
// -------------------
// -------------------
if(!empty($cmr->post_var["cmr_sid"])) $cmr->post_var["sid"] = $cmr->post_var["cmr_sid"];
if(!($cmr->get_session("pre_match"))) $cmr->session["pre_match"] = "";
// -------------------
// -------------------
$cmr->post_var["encode"] = $cmr->post_var["cod"];
$cmr->post_var["values"] = $cmr->post_var["vals"];
// $cmr->post_var["keys"] = $cmr->post_var["keys"];
$cmr->post_var = add_encode_post_var($cmr->config, $cmr->post_var, $cmr->get_session("pre_match"));
// -------------------
// -------------------
// print_r($cmr->post_var);
// -------------------

// ============================================
foreach($cmr->post_var as $key => $value){

    if(cmr_searchi("^lang_", $key)){
        $cmr->language[$key] = $cmr->post_var[$key];
        }
    elseif(cmr_searchi("^theme_", $key)){
        $cmr->themes[$key] = $cmr->post_var[$key];
        }
//  elseif(cmr_searchi("^task[0-9]*", $key)){
//      $cmr->page[$key] = $cmr->post_var[$key];
//      }
//     elseif(cmr_searchi("^conf_", $key)){
//         $cmr->config[$key] = $cmr->post_var[$key];
//         }
//     elseif(cmr_searchi("^page_", $key)){
//         $cmr->page[$key] = $cmr->post_var[$key];
//         }
//     elseif(cmr_searchi("^head[0-9]+", $key)){
//         $cmr->page[$key] = $cmr->post_var[$key];
//         }
//     elseif(cmr_searchi("^left[0-9]+", $key)){
//         $cmr->page[$key] = $cmr->post_var[$key];
//         }
//     elseif(cmr_searchi("^middle[0-9]+", $key)){
//         $cmr->page[$key] = $cmr->post_var[$key];
//         }
//     elseif(cmr_searchi("^right[0-9]+", $key)){
//         $cmr->page[$key] = $cmr->post_var[$key];
//         }
//     elseif(cmr_searchi("^foot[0-9]+", $key)){
//         $cmr->page[$key] = $cmr->post_var[$key];
//         }

    else{


switch($key){

 case "page_title": $cmr->page[$key] = $cmr->post_var[$key];break;
 case "layer": $cmr->page[$key] = $cmr->post_var[$key];break;
 case "refresh": $cmr->page[$key] = $cmr->post_var[$key];break;

 case "template": $cmr->page[$key] = $cmr->post_var[$key];break;
 case "auth_theme": $cmr->page[$key] = $cmr->post_var[$key];break;

 case "win_task":
 if($cmr->post_var["task_action"]=="close") unset($cmr->page["task"][$value]);
 if($cmr->post_var["task_action"]=="show"){
    @ list($task_name, $task_pos) = explode(";", $cmr->page["task"][$value]);
     $cmr->page[$task_pos] = $task_name;
 }
 break;

 case "tab_mode": ;
 case "current_tab": ;

//  case "tab_1": ;
//  case "tab_2": ;
//  case "tab_3": ;
//  case "tab_4": ;
//  case "tab_5": ;
//  case "tab_6": ;
//  case "tab_7": ;
//  case "tab_8": ;
//  case "tab_9": ;
//  case "tab_10": ;
//  case "tab_11": ;



//  case "head1": ;
//  case "head2": ;
//  case "head3": ;


//  case "left1": ;
//  case "left2": ;
//  case "left3": ;
//  case "left4": ;
//  case "left5": ;
//  case "left6": ;
//  case "left7": ;


//  case "middle1": ;
//  case "middle2": ;
//  case "middle3": ;
//  case "middle4": ;
//  case "middle5": ;
//  case "middle6": ;
//  case "middle7": ;
//  case "middle8": ;


//  case "right1": ;
//  case "right2": ;
//  case "right3": ;
//  case "right4": ;
//  case "right5": ;
//  case "right6": ;
//  case "right7": ;
//  case "right8": ;

//  case "page_footer": ;
//  case "foot2": ;
//  case "page_footer": ;

//  case "title": ;
//  case "text": ;




//  case "desktop":
//  case "tab":
//  case "menu1":
//  case "menu2":
 case "list_module" : $cmr->page[$key] = $cmr->post_var[$key];break;





 case "win_type": ;
 case "align": ;
 case "bgcolor": ;
 case "border": ;
 case "bordercolor": ;
 case "background": ;
 case "width": ;
 case "header_visible": ;
 case "header_tools_left": ;
 case "header_tools_right": ;
 case "header_bgcolor": ;
 case "header_color": ;
 case "header_align": ;
 case "header_border": ;
 case "header_bgimage_left": ;
 case "header_bgimage_middle": ;
 case "header_bgimage_right": ;
 case "header_mouse_effect": ;

 case "html_class": ;
 case "bgcolor": ;
 case "background": ;
 case "cmr_style": $cmr->themes[$key] = $cmr->post_var[$key];break;


    default:
//  $_SESSION[$key] = $cmr->post_var[$key];
    break;

  }
}

}

// ============================================
// ============================================
// ============================================
$cmr->post_var["win_action"] = get_post('win_action', 'get');
$cmr->post_var["win_pos"] = get_post('win_pos', 'get');
if((get_post("win_action")) && (get_post("win_pos"))){ // ----windows manager----------
$cmr->page = $cmr->update_page(get_post("win_action"), get_post("win_pos"));

}

// ============================================
// ============================================
// ============================================
// $cmr->post_var["conf"] = get_post('conf', 'get');


// ======================================================================
if($cmr->post_var["conf"] == "com_action"){ // ----gestione dei tab----------
    $cmr->post_var["current_action"] = get_post('current_action', 'get');

    switch ($cmr->post_var["current_action"]){
        case "command_bar" : $cmr->page["head2"] = $cmr->get_path("module") . "modules/" . "commands.php";;
            break;
        case "left_menu" : $cmr->page["left1"] = $cmr->get_path("module") . "modules/" . "menu_list.php";;
            break;
        case "tab_mode" : $cmr->page["tab_mode"] = 1;
            break;
        case "view_task" : $cmr->page["foot2"] = $cmr->get_path("module") . "modules/" . "task_bar.php";
            break;
        case "exit" : $cmr->post_var["conf"] = "exit";
            break;
        case "login" : $cmr->post_var["conf"] = "login";
            break;
        case "init":
        case "home":
        $cmr->post_var["conf"] = "init";
            break;

        case "load_d":
        $cmr->post_var["conf"] = "init";
        break;
        case "load_u":
            if(is_resource($cmr->db_connection)){
//             $cmr->language = auto_language($cmr->config, $cmr->language, $cmr->db_connection); //__automatic create language traduction
            }
        $cmr->language = $cmr->include_conf($cmr->get_conf("cmr_begin_lang_file"), $cmr->language, "var");
        $cmr->themes = $cmr->include_conf($cmr->get_conf("cmr_begin_theme_file"), $cmr->themes, "var");
        $cmr->page = $cmr->include_conf($cmr->get_conf("cmr_begin_pager_file"), $cmr->page, "var");// =========== default config ==================



        @ include_once(($cmr->get_user("auth_user_path") . "login_rc.php"));// ===============file login user script=================
        @ eval($cmr->get_user("auth_user_script"));// ===============database login user script=================
        $cmr->config = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");

        $cmr->page = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
        $cmr->themes = $cmr->include_conf($cmr->get_path("theme") . "themes/".$cmr->get_page("auth_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("auth_lang"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("language"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");

//             $cmr->save_conf("user");
            $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " default configuration loaded for group:" . $cmr->get_user("auth_group") . "  !");
        break;
        case "load_g":
            if(is_resource($cmr->db_connection)){
//             $cmr->language = auto_language($cmr->config, $cmr->language, $cmr->db_connection); //__automatic create language traduction
            }
        $cmr->language = $cmr->include_conf($cmr->get_conf("cmr_begin_lang_file"), $cmr->language, "var");
        $cmr->themes = $cmr->include_conf($cmr->get_conf("cmr_begin_theme_file"), $cmr->themes, "var");
        $cmr->page = $cmr->include_conf($cmr->get_conf("cmr_begin_pager_file"), $cmr->page, "var");// =========== default config ==================

        @ include_once(($cmr->get_user("auth_group_path") . "login_rc.php"));// ===============file group login script================
        @ eval($cmr->get_user("auth_group_script"));// ===============database login group script================
        $cmr->config = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");

        $cmr->page = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
        $cmr->themes = $cmr->include_conf($cmr->get_path("theme") . "themes/".$cmr->get_page("auth_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("auth_lang"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("language"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");

//             $cmr->save_conf("group");
            $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " default saving configuration loaded for user  !");
        break;

        case "save_u":
            $cmr->save_conf("user");
            $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " saving configuration for group:" . $cmr->get_user("auth_group") . "  !");
        break;
        case "save_g":
			if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
            $cmr->save_conf("group");
            $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " saving configuration for user  !");
        	}
        break;
        case "save_d":
			if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
            $cmr->save_conf("default");
            $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " saving configuration for default user !");
        	}
        break;
        case "normal":
            $cmr->themes["header_visible"] = 1;
            $cmr->themes["header_tools_left"] = 0;
            $cmr->themes["header_tools_right"] = 1;
            break;

        case "minim":
            $cmr->themes["header_visible"] = 0;
            // $cmr->themes["border"] = 0;
            break;

        case "expert":
            $cmr->themes["header_visible"] = 1;
            $cmr->themes["header_tools_left"] = 1;
            $cmr->themes["header_tools_right"] = 1;
            break;

        case "debug":
			if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type"))
            $cmr->config["cmr_debug_mode"] = 1;
            break;

        case "no_debug":
            $cmr->config["cmr_debug_mode"] = 0;
            break;

        case "read_only":
            $cmr->session["type"] ="read_only";
            break;
        case "read_write":
			$cmr->session["type"] = $cmr->user["authorisation"];
            break;


        case "site_map" : $cmr->page["middle1"] = $cmr->get_path("module") . "modules/" . "modules_map.php";
            break;

        case "layer_1" : $cmr->page["layer"] = 1;
            break;
        case "layer_2":
        $cmr->page["layer"] = 2;
            break;
        case "layer_3" : $cmr->page["layer"] = 3;
            break;
        case "layer_normal" : $cmr->page["layer"] = 3;
            break;




        default:break;
    }
}
		// ===================================================================
		// ===================================================================
if(isset($cmr->post_var["conf"])){
        // ======================================================================

		if($cmr->post_var["conf"] == "exit"){
		        $cmr->event["id"] = "9";
		        $cmr->event["name"] = "logout_request";
		        $cmr->event["line"]=__LINE__;
		        $cmr->event["script"]=__FILE__;
		        $cmr->event["data"] = "?cmr_mode=logout";
		        $cmr->event["comment"] = "Exit Request Normaly";
		        $cmr->run_event();
		//     $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "Exit Request");
		//     cmr_header("Location: " . $cmr->get_path("index") . "index.php?cmr_mode=logout");
		//     // cmr_header("Location: ".$cmr->get_path("index") ."index.php?cmr_mode=login");
		//     die("Exit Request");
		}
		// ======================================================================
		// ======================================================================
		// ======================================================================
		// =======================================================================

		if($cmr->post_var["conf"] == "login"){
		    // *************************session ***********************************
		        $cmr->event["id"] = "0";
		        $cmr->event["name"] = "login_request";
		        $cmr->event["line"]=__LINE__;
		        $cmr->event["script"]=__FILE__;
		        $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
		        $cmr->event["comment"] = "Login Request Normaly";
		        $cmr->run_event();
		    // ======================================================================
		//     $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "Login Request Normaly");
		//     cmr_header("Location: " . $cmr->get_path("index") . "index.php?cmr_mode=login");
		//     die("login Request Normaly");
		}
		// ======================================================================
		if($cmr->post_var["conf"] == "com_lang"){ // ----gestione dei tab----------
		    $cmr->post_var["current_lang"] = get_post('current_lang', 'get');
		    $cmr->language = array();
		    $cmr->page["language"] = $cmr->post_var["current_lang"];
		    $cmr->language = $cmr->include_conf($cmr->get_path("index") . "languages/" . $cmr->page["language"] . "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
		}
		// ======================================================================
		if($cmr->post_var["conf"] == "init"){ // --------home ----------
		    if(is_resource($cmr->db_connection)){
		//     $cmr->language = auto_language($cmr->config, $cmr->language, $cmr->db_connection); //__automatic create language traduction
		}
		// ======================================================================
	        $cmr->language = $cmr->include_conf($cmr->get_conf("cmr_begin_lang_file"), $cmr->language, "var");
	        $cmr->themes = $cmr->include_conf($cmr->get_conf("cmr_begin_theme_file"), $cmr->themes, "var");
	        $cmr->page = $cmr->include_conf($cmr->get_conf("cmr_begin_pager_file"), $cmr->page, "var");// =========== default config ==================

	        if(isset($cmr->post_var["auth_lang"]))
	        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("auth_lang"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");

	        if(file_exists($cmr->get_user("auth_group_path") . "login_rc.php"))
	        include_once(($cmr->get_user("auth_group_path") . "login_rc.php"));// ===============file group login script================

	        if(file_exists($cmr->get_user("auth_user_path") . "login_rc.php"))
	        include_once(($cmr->get_user("auth_user_path") . "login_rc.php"));// ===============file login user script=================
	        @ eval($cmr->get_user("auth_group_script"));// ===============database login group script================
	        @ eval($cmr->get_user("auth_user_script"));// ===============database login user script=================

	        $cmr->config = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");
	        $cmr->config = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");

	        $cmr->page = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
	        $cmr->page = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
	        $cmr->themes = $cmr->include_conf($cmr->get_path("theme") . "themes/".$cmr->get_page("auth_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
	        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("language"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
		// ======================================================================

		    include($cmr->get_path("index") . "system/loader/login_to.php");
		    $cmr->post_var=array("conf" => '', "code" => '', "keys" => '', "values" => '', "vals" => '', "action_cod" => '', "middle1" => '');
		// ======================================================================
		$cmr->update_mess(); //Update ripetitive Message
		// ======================================================================
		}

		if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
		if($cmr->post_var["conf"] == "save_g"){ // -
		    $cmr->save_conf("group", ""); //type=default--type=user--type=group--
		    $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " saving configuration for group:" . $cmr->get_user("auth_group") . "  !");
		}
		// ====================================================================

		if($cmr->post_var["conf"] == "save_u"){ // -
		    $cmr->save_conf("user", ""); //type=default--type=user--type=group--
		    $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " saving configuration for user  !");
		}
		// ======================================================================

		if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type"))
		if($cmr->post_var["conf"] == "save_d"){ // -
		    $cmr->save_conf("default", ""); //type=default--type=user--type=group--
		    $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " saving configuration for default user !");
		}
		// ===================================================================
		// =======================EXIT ==========================================

		if($cmr->post_var["conf"] == "com_tab"){ // ----gestione dei tab----------
		    // $cmr->language=auto_language($cmr->config, $cmr->language, $cmr->db_connection);//__automatic create language traduction
		//     $cmr->post_var["current_tab"] = get_post('current_tab', 'get');
		    // $cmr->themes = $cmr->include_conf($cmr->get_path("index") ."/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
		    // $cmr->page = $cmr->include_conf($cmr->get_path("index") ."/" . $cmr->get_conf("cmr_page_filename"), $cmr->config, "var");
		    // $cmr->language = $cmr->include_conf($cmr->get_path("index") ."/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
		    // $cmr->themes = $cmr->include_conf($cmr->get_path("index") ."themes/".$cmr->get_page("auth_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
		    // $cmr->page = $cmr->include_conf($cmr->get_user("auth_path") . "/" . $cmr->get_conf("cmr_page_filename"), $cmr->config, "var");
		    // $cmr->language = $cmr->include_conf($cmr->get_path("index") ."languages/". $cmr->get_user("auth_lang") . "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
		    //$cmr->page["tab_mode"] = 1;
		    $cmr->page["current_tab"] = $cmr->post_var["current_tab"];

		     if($cmr->post_var["current_tab"] == "close"){
		        $cmr->page["tab_mode"] = 0;
		        // $tab_num= get_post('tab_num','get');
		        // $_SESSION["tab_$tab_num"] = "";
		        // $tab_num=abs($tab_num-1);
		        // if(!$tab_num){$tab_num=1;}
		        // $cmr->page["current_tab"] = $_SESSION["tab_$tab_num"];
		    } elseif($cmr->post_var["current_tab"] != "default"){
		//         $cmr->page = $cmr->include_conf($cmr->get_path("index") . "page/" . $cmr->post_var["current_tab"] . "/" . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
		        $cmr->page = $cmr->include_conf($cmr->get_path("tab") . $cmr->post_var["current_tab"], $cmr->page, "var");
		    }
		}


		if($cmr->post_var["conf"] == "com_themes"){ // ----gestione dei tab----------
		    $cmr->post_var["current_themes"] = get_post('current_themes', 'get');
		    $cmr->themes = $cmr->include_conf($cmr->get_path("index") . "themes/" . $cmr->post_var["current_themes"] . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
		    $cmr->page["auth_theme"] = $cmr->post_var["current_themes"];
		}


		if($cmr->post_var["conf"] == "com_refresh"){ // ----gestione del refresh----------
		    $cmr->post_var["current_refresh"] = get_post('current_refresh', 'get');
		    $cmr->page["refresh"] = $cmr->post_var["current_refresh"];
		}


		if($cmr->post_var["conf"] == "com_download"){ // ----gestione dei download----------
		    $cmr->post_var["current_file"] = get_post('current_file', 'get');
		    $cmr->down_file($_SESSION[$cmr->post_var["current_file"]]);
		}


		if($cmr->post_var["conf"] == "com_attachment"){ // ----gestione dei download----------
		    $cmr->post_var["current_file"] = get_post('current_file', 'get');
		    $cmr->down_attachment($_SESSION[$cmr->post_var["current_file"] . "_data"], $_SESSION[$cmr->post_var["current_file"] . "_file"]);
		}


		if($cmr->post_var["conf"] == "com_pdf"){ // ----gestione dei download----------
		    $cmr->post_var["pdf_param"] = get_post('pdf_param', 'get');
// 		    show_pdf($cmr->config, $cmr->language, $cmr->post_var["current_pdf"], $cmr->post_var["pdf_param"]);
			echo_pdf($cmr->post_var["current_pdf"]);
		}


		if($cmr->post_var["conf"] == "com_db_name"){ // -------------
		  $cmr->post_var["current_db_name"] = get_post('current_db_name', 'get');
		}
		// ===================================================================
		// ===================================================================

}
		// ===================================================================
		// ===================================================================
		if(!empty($cmr->post_var["module_name"])){
		 $cmr->module["module_name"] = $cmr->post_var["module_name"];
		 $cmr->page["middle1"] = $cmr->post_var["module_name"];
		}
		// ===================================================================
		// ===================================================================
//$cmr->show();
// -------------
// -------------
// -------------
		// ===================================================================
		// ===================================================================
		// ===================================================================
		// ===================================================================
?>
