<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/*=================================================================*/
// vim
// set expandtab
// set shiftwidth=4
// set softtabstop=4
// set tabstop=4
// 80 char / line
// * @package cmr
// * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
// * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
// * This version may have been modified pursuant
// * to the GNU General Public License, and as distributed it includes or
// * is derivative of works licensed under the GNU General Public License or
// * other free or open source software licenses.
// */
// this is php index file, the, most important file, were to see how TSTM work configuration file ./conf.php
// the general static configuration file ./conf.php
// generaly all line will be transform from [cmr_with_login==1] to [define('cmr_with_login')='1';] before php execution
// to configure the interface (module windows position) for all user, see ./page.ini or ./themes.ini or ./cmr.css
// to configure the interface (module windows position) for a group, see ./home/{group}/page.ini or ./home/{group}/themes.ini or ./home/{group}/cmr.css
// the language file is ./language.ini or ./language/lang_to_use/language.ini
// the default windows themes configuration file ./themes.ini or ./themes/{themes_folder}/themes.ini
// the database connection configuation is in ./connect.php or in ./home/{group}/connect.php (the default one is in ./conf.php )
/*
=================================================================
**/
include_once(dirname(__FILE__) . "/camaroes_class.php");
$cmr = new camaroes();
// $cmr->show();
// print_r($cmr);  
// exit;
        /*==================*/
            
        /*==================*/
            include_once(dirname(__FILE__) . "/control.php"); //to control access in the module
            if(file_exists(dirname(__FILE__) . "/config.inc.php")){
                include_once(dirname(__FILE__) . "/config.inc.php");
            }else{
                $cmr->config["cmr_main_config"]=dirname(__FILE__) . "/conf.d/conf.ini"; // conf_file_exist($cmr->get_conf("cmr_main_config"));
                }
        /*==================*/
            
        /*==================*/
            include_once(dirname(__FILE__) . "/system/function.php");
        /*==================*/
            
        /*==================*/
            $cmr->config = $cmr->include_conf($cmr->get_conf("cmr_main_config"), $cmr->config, "var");
            $cmr->config = $cmr->preload_config();
        /*==================*/
            
        /*==================*/
            if(!($cmr->get_path("index"))) $cmr->path["index"] = realpath("./");
            $cmr->path["index"] = realpath($cmr->get_path("index"))  . "/";
        /*==================*/
            
        /*==================*/
				$cmr->config["cmr_with_login"] = 1;
				$cmr->config["cmr_no_auth"] = 0;
				$cmr->config["cmr_apache_auth"] = 1;
				$cmr->config["cmr_radius_auth"] = 0;
				$cmr->config["cmr_other_auth"] = 0;
				$cmr->config["cmr_url_auth"] = 1;
				$cmr->config["cmr_output_buffering"] = 0;
				
// 				$cmr->path["index"] = $_SERVER["PWD"]."/";
// 				$cmr->path["home"] = $_SERVER["PWD"]."/";
// 				$cmr->path["log"] = $_SERVER["PWD"]."/";
// 				$cmr->path["module"] = $_SERVER["PWD"]."/";
// 				$cmr->path["db"] = $_SERVER["PWD"]."/";
// 				$cmr->path["help"] = $_SERVER["PWD"]."/";
// 				$cmr->path["func"] = $_SERVER["PWD"]."/";
// 				$cmr->path["conf"] = $_SERVER["PWD"]."/";
// 				$cmr->path["image"] = $_SERVER["PWD"]."/";
// 				$cmr->path["lang"] = $_SERVER["PWD"]."/";
// 				$cmr->path["theme"] = $_SERVER["PWD"]."/";
// 				$cmr->path["lib"] = $_SERVER["PWD"]."/";
// 				$cmr->path["temp"] = "/temp/";// es: /temp/
// 				$cmr->path["template"] = $_SERVER["PWD"]."/";
// 				$cmr->path["model"] = $_SERVER["PWD"]."/";
// 				$cmr->path["session"] = getenv("TEMP")."/";// es: /temp/
        /*==================*/
            
        /*==================*/
            $cmr->action["to_load"] = "preload_function";
            include($cmr->get_path("index") . "system/loader/loader_function.php");
            $cmr->action["to_load"] = "preload_class";
            include($cmr->get_path("index") . "system/loader/loader_class.php");
        /*==================*/
            
        /*==================*/
            $cmr->load_session_mode();
            
            /* set the cache limiter to 'nocache' */
            session_cache_limiter('nocache');
            /* set the cache expire to 30 minutes */
            session_cache_expire(36000);
            /* start the session */
            session_start();
// $cmr->debug_print();exit;
        /*==================*/
            
        /*==================*/
//         $cmr->language = auto_language($cmr->config, $cmr->language, $cmr->db_connection); //__automatic create language traduction
        $cmr->language = $cmr->include_conf($cmr->get_conf("cmr_begin_lang_file"), $cmr->language, "var");
        $cmr->page = $cmr->include_conf($cmr->get_conf("cmr_begin_pager_file"), $cmr->page, "var");// =========== default config ==================
        $cmr->themes = $cmr->include_conf($cmr->get_conf("cmr_begin_theme_file"), $cmr->themes, "var");
        
        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_conf("cmr_default_lang"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
        $cmr->themes = $cmr->include_conf($cmr->get_path("theme") . "themes/". $cmr->get_conf("cmr_default_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
        $cmr->page = $cmr->include_conf($cmr->get_path("tab") . "page/". $cmr->get_conf("cmr_default_pager") . "/" . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");// =========== default config ==================
        /*==================*/
            
        /*==================*/
        include($cmr->get_path("index") . "system/select_mode.php");//login, logout, forget_account, inscription, ..etc
        /*==================*/

        /*==================*/
        include($cmr->get_path("index") . "system/init_mode.php");
        !($cmr->get_conf("cmr_output_buffering")) or ob_start(); // start output buffering//  ob_start('cmr_callback');
        include_once($cmr->get_path("func") . "function/database/" . $cmr->get_conf("db_type") . ".php");
        $cmr->db_connection = $cmr->connect();//or $cmr->config["cmr_guest_mode"] = 0; //-----database connection------
        if(!is_resource($cmr->db_connection)) $cmr->config["cmr_guest_mode"] = 1;
        /*==================*/
             
        /*==================*/
        if(!($cmr->get_conf("cmr_guest_mode"))&&(get_post("cmr_mode")!="guest_mode")){
        if(cmr_new_login($cmr->config, $cmr->user)){// ======================get authentificazione first==================
        include_once($cmr->get_path("get_data") . "get_data/guest/get_login.php");
        include($cmr->get_path("index") . "system/load_user_data.php");
            
// $cmr->debug_print();exit;
             
        @ include_once(($cmr->get_user("auth_group_path")."login_rc.php"));// ===============file group login script================
        @ include_once(($cmr->get_user("auth_user_path")."login_rc.php"));// ===============file login user script=================
        @ eval($cmr->get_user("auth_group_script"));// ===============database login group script================
        @ eval($cmr->get_user("auth_user_script"));// ===============database login user script=================
             
        $cmr->config = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");
        $cmr->config = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");
             
        $cmr->page = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
        $cmr->page = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
        $cmr->themes = $cmr->include_conf($cmr->get_path("theme") . "themes/".$cmr->get_page("auth_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("auth_lang"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("language"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
        
        if((get_post("cmr_lang"))) $cmr->language = $cmr->include_conf($cmr->get_conf("cmr_begin_lang_file"), $cmr->language, "var");
        if((get_post("cmr_theme"))) $cmr->themes = $cmr->include_conf($cmr->get_conf("cmr_begin_theme_file"), $cmr->themes, "var");
        if(($cmr->get_action("next_page"))) $cmr->page = $cmr->include_conf($cmr->get_conf("cmr_begin_pager_file"), $cmr->page, "var");// =========== default config ==================
        include($cmr->get_path("index") . "system/loader/login_to.php");
                }else{
           $cmr->user=cmr_load_session("user");
           $cmr->session=cmr_load_session("session");
           $cmr->db=cmr_load_session("db");
           
           if(!empty($cmr->db["db_host"])) $cmr->db_connection = connect_to_db($cmr->config, $cmr->db);
           include_once($cmr->get_path("func") . "system/control_session.php");
           $cmr->load_session(); 
// $cmr->debug_print();exit;
                }
        include($cmr->get_path("index") . "get_data/guest/get_default_data.php");
// $cmr->debug_print();exit;
        
		update_messages($cmr->config, $cmr->db_connection); //Update ripetitive Message 
                
        }
        /*==================*/
             
        /*==================*/
        if(($cmr->get_conf("cmr_guest_mode"))||(get_post("cmr_mode")=="guest_mode")){
        if(cmr_new_login($cmr->config, $cmr->user)){// ======================get authentificazione first==================
         $_SESSION["cmr_id"]=session_id();
        include($cmr->get_path("index") . "system/load_guest_mode.php");
        include_once(($cmr->get_user("auth_group_path")."login_rc.php"));// ===============file group login script================
        include_once(($cmr->get_user("auth_user_path")."login_rc.php"));// ===============file login user script=================
        $cmr->config = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");
        $cmr->config = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");
        
        $cmr->page = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_page_filename"), array(), "var");
        $cmr->page = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
        $cmr->themes = $cmr->include_conf($cmr->get_path("theme") . "themes/".$cmr->get_page("auth_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
        $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/". $cmr->get_page("language"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
        include($cmr->get_path("index") . "get_data/guest/get_default_data.php");
        }else{
        $cmr->load_session(); 
        }
        };
        /*==================*/
             
        /*==================*/
        $cmr->post_var["cmr_module"] = get_post("cmr_module");
        
        if((!empty($cmr->post_var["cmr_module"]))||(!empty($cmr->post_var["cmr_get_data"]))){
//      $cmr->post_files=get_post_files($cmr->config, $cmr->user, $cmr->post_files);
             include_once($cmr->get_path("index") . "system/loader/loader_get.php");
        }
        /*==================*/
             
        /*==================*/
             include_once($cmr->get_path("index") . "system/cron.php");
        /*==================*/
             
        /*==================*/
        $cmr->session["pre_match"] = "";//$code1="1";
        $cmr->page=layers_init($cmr->page, 1, $cmr->post_var["cmr_module"]);// print("head=$cmr->get_page("head_num_mod");left=$cmr->get_page("left_num_mod");middle=$cmr->get_page("middle_num_mod");right=$cmr->get_page("right_num_mod");foot=$cmr->get_page("foot_num_mod")");
        /*==================*/
// $cmr->debug_print();exit;
			include($cmr->get_path("index") . "front_page.php");
        /*==================*/
            
        /*==================*/
			!($cmr->get_conf("cmr_debug_mode")) or  $cmr->debug_print();
			include($cmr->get_path("index") . "page_print.php");
			$cmr->save_session(); 
			!($cmr->get_conf("cmr_output_buffering")) or  ob_end_clean(); // clean  buffer content
			$doc_cli = strip_tags(($cmr->buffer), '<b><high><medium><low><h1><option><b><i><a><ul><li><pre><hr><br /><blockquote><img><p><table><tr><td>');
			$trans = array("&nbsp;" => " ", "<br" => "\n<br", "<tr" => "\n<tr", "<td" => " | <td",  "<h" => "\n<h", "<p" => "\n<p", "<option" => "\n<option", "<table" => "\n===================\n<table");            
			$doc_cli = strtr($doc_cli, $trans);
			$doc_cli = strip_tags(($doc_cli));
			print(($doc_cli));
			$cmr->buffer = "";
/*=================================================================*/
?>
