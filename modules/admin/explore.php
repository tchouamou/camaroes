<?php
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
// generaly all line will be transform from [cmr_use_db==1] to [define('cmr_use_db')='1';] before php execution
// to configure the interface (module windows position) for all user, see ./page.php or ./themes.php or ./cmr.css
// to configure the interface (module windows position) for a group, see ./home/{group}/page.php or ./home/{group}/themes.php or ./home/{group}/cmr.css
// the language file is ./language.php or ./language/lang_to_use/language.php
// the default windows themes configuration file ./themes.php or ./themes/{themes_folder}/themes.php
// the database connection configuation is in ./connect.php or in ./home/{group}/connect.php (the default one is in ./conf.php )

/*==================LOAD LICENCE===================================*/
/*=================================================================*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type")) die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));

	include_once($cmr->get_path("class") . "class/class_phpexplorator.php");
	$p1 = new phpexplorator();
	$p1->config["PE_key"] = "cmr_mode";//-- optional var to be send (usefull for integration in Tstm)
	$p1->config["PE_val"] = "explore";//-- optional var value to be send (usefull for integration in Tstm)
    if($p1->config["self_header"]){
        $p1->img_by_text($p1->getpost("PE_imgtext"));
        $p1->img_by_path($p1->getpost("PE_imgpath"));
    }


		// ===============================================
		$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

		// $division->load_themes($cmr->themes);

		$division->module["name"] = "Explore";
		$division->themes["module_positionx"] = "middle";
		$division->themes["module_positiony"] = "1;1;1;1;1;1";

		$division->module["title"] = $cmr->translate($mod->base_name);
		// $division->module["text"] = $str;
		$division->header_tools_right = 0;
		unset($cmr->page["head1"]);
		unset($cmr->page["left1"]);
		unset($cmr->page["right1"]);
		// ===============================================
		// ===============================================
    if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_noc_type")){
    if($p1->login()){
		print($division->show_noclose());
    	$p1->language = $p1->load_lang($p1->config);
        $p1->header_extra();
        if($p1->config["self_header"])$p1->header_html_mce();
        $p1->header_body();
		// ===============================================
        $p1->title();
        $p1->config = $p1->action();
        $p1->head_dir();
        $p1->dir_list();
        print("<br />");
        $p1->command_1();
        $p1->command_2();
        print("<br />");
        $p1->command_upload();
        print("<br />");
        $p1->command_extend();
        $p1->shell();
// 		        if($P1->Config["Self_Header"]) $P1->Footer();
        $p1->replace();
    }
    }
		// ===============================================
		// ===============================================
		// ===============================================
		 print($division->close());
?>
