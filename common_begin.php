<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * common_begin.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
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
    #the first configuration file is ./config.inc.php
    #the general dynamic configuration files are ./conf.d/conf.ini, ./config.inc.php
    #the group configuration file is ./home/groups/{group_name}/config.ini
    #the user configuration file is ./home/groups/{user_name}/config.ini


    #to configure the interface (module windows position) for all user, see ./page/page.ini or ./themes/themes.ini or ./css/camaroes.css
    #to configure the interface (module windows position) for a group, see ./home/{group_name}/page.ini or ./home/{user_name}/page.ini

    #the language file is ./languages/language.ini or ./language/lang_to_use/language.ini
    #the default windows themes configuration file ./themes/themes.ini or ./themes/{themes_folder}/themes.ini

    #the database connection configuation can_be ./conf.d/conf.ini or ./config.inc.php or ./conf.d/conf.ini or ./home/{group_name}/login_rc.php  or ./home/{group_name}/config.ini  or ./home/{user_name}/config.ini (the default one is in ./conf.d/conf.ini )

    # the database connection configuation is in ./home/{group}/connect.php (the default one is in config.inc.php, ./conf.d/conf.ini )
/*
=================================================================
**/
// print_r($cmr);
// exit;

        /*==================*/
        $cmr->load_session_mode();
        session_start();/* start the session */
        /*==================*/        /*==================*/
          // --chosing authentification method by host ip or hostname---
          if (empty($_SESSION['host_name'])) {
              $_SESSION['host_name'] = $_SERVER['REMOTE_ADDR'];
          }
          $cmr->config = auth_method($cmr->config, $_SERVER['REMOTE_ADDR'], $_SESSION['host_name']);
         if (!($cmr->get_session("type"))) {
             $cmr->session["type"] = "normal";
         } //read_only
        /*==================*/
         cmr_init_mode($cmr->config, trim($cmr->translate("cmr_charset")));
        /*==================*/
        //$cmr->show();
        //if(get_post("cmr_mode")) include($cmr->get_path("index") . "system/select_mode.php");//login, logout, forget_account, inscription, install..etc

        /*========main=======*/
        if ($cmr->get_conf("cmr_output_buffering")) {
            ob_start();
        } // start output buffering//  ob_start('cmr_callback');
        /*==================*/
        /*==================*/
        if ($cmr->get_conf("cmr_use_db")) {
            //include_once($cmr->get_path("index") . "adodb/adodb.inc.php");
            $cmr->db_connection = $cmr->connect();
            //$cmr->db = $cmr->input_session("db");
        if (!empty($cmr->db["db_host"])) {
            $cmr->db_connection = $cmr->connect($cmr->db);
        }//or $cmr->config["cmr_guest_mode"] = 0; //-----database connection------
        }
        /*==================*/
        if ($cmr->db_connection) {
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            include_once($cmr->get_path("get_data") . "get_data/guest/get_login.php");
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            include($cmr->get_path("index") . "system/load_user_data.php");
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            include_once($cmr->get_path("index") . "system/control_session.php");
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        } else {
            $cmr->config["cmr_guest_mode"] = 1;
        }
        /*==================*/
        /*==================*/
        //$cmr->user = $cmr->input_session("user");
        //if(!($cmr->get_conf("cmr_guest_mode")) && (get_post("cmr_mode") != "guest_mode")){
        //if($cmr->new_login()){// ======================get authentificazione first==================
        //}else{
        //$cmr->session = $cmr->input_session("session");
        //$cmr->db = $cmr->input_session("db");
        //if(!empty($cmr->db["db_host"])) $cmr->db_connection = $cmr->connect($cmr->db);
        //}
        //}
        /*==================*/
        /*==================*/
        if (($cmr->get_conf("cmr_guest_mode")) || (get_post("cmr_mode") == "guest_mode")) {
            //if($cmr->new_login()){// ======================get authentificazione first==================
            include($cmr->get_path("index") . "system/load_guest_mode.php");
            //}else{
        //$cmr->load_session();
        //}
        }
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        if (get_post("login_to")) {
            include($cmr->get_path("index") . "/system/loader/login_to.php");
        }
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        /*==================*/
        if (isset($_POST["auth_user"])) {
            $_SESSION = array();
        }
        /*==================*/
        (isset($_SESSION["cmr_id"]))?$cmr->load_session():$_SESSION["cmr_id"] = session_id();
        /*==================*/
        /*==================*/
        //if(!$cmr->new_login())
        include($cmr->get_path("get_data") . "get_data/guest/get_default_data.php");
        /*==================*/
        /*==================*/
        $cmr->save_session();
        /*==================*/
        /*==================*/
        //$cmr->post_var["cmr_mode"] = "";
        $cmr->post_var["class_module"] = get_post("class_module");
        $cmr->post_var["cmr_get_data"] = get_post("cmr_get_data");
        /*==================*/
        /*==================*/
