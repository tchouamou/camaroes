<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * initial_page.php
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

        /*==================*/
        $cmr->load_session_mode();
        session_start();/* start the session */
        /*==================*/
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
      // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            switch (get_post("cmr_mode")) {
            case "login":
            include_once($cmr->get_path("index") . "login.php");
            exit;
            break;

            case "logout":
            include_once($cmr->get_path("index") . "logout.php");
            exit;
            break;

            case "forget_account":
            case "forget_account":
            if (($cmr->get_conf("cmr_allow_forget_account"))) {
                include_once($cmr->get_path("index") . "forget_account.php");
                exit;
            }
             die("<br />forget id not allow !!, change the configuration file  or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
            break;

            case "inscription":
            if (($cmr->get_conf("cmr_allow_inscription"))) {
                include_once($cmr->get_path("index") . "inscription.php");
                exit;
            }
             die("<br />Inscription not allow !!, change the configuration file  or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
            break;

            case "validation":
            if (($cmr->get_conf("cmr_allow_validation"))) {
                include_once($cmr->get_path("index") . "validation.php");
                exit;
            }
             die("<br />Validation not allow !!, change the configuration file  or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
            break;


            case "install_db":
            case "install_need":
            include_once($cmr->get_path("index") . "install/install_need.php");
            exit;
            break;

            case "update":
            if (($cmr->get_conf("cmr_allow_update"))) {
                include_once($cmr->get_path("index") . "install/update.php");
                exit;
            }
             die("<br />Update not allow !!, change the configuration file  or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
            break;

            case "install":
            case "install_all":
            if (($cmr->get_conf("cmr_allow_install"))) {
                include_once($cmr->get_path("index") . "install/install.php");
                exit;
            }
             die("<br />Install not allow !!, change the configuration file or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
            break;

            case "explore":
            include_once($cmr->get_path("module") . "modules/admin/explore.php");
            exit;
            break;

            case "normal":;
            // no break
            default:;
            break;
        }
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
