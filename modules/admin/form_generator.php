<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * form_generator.php
 * ------------------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























form_generator.php, Ver 3.03
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type"))
die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->config = $mod->load_conf("conf.d/conf_form_generator" . $cmr->get_ext("conf"));
    $cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "generator" . $cmr->get_ext("lang"));
    $cmr->help=$cmr->load_help_need("form_generator" . $cmr->get_ext("help"));
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    include_once($cmr->get_path("func") . "function/func_zip.php");
    include_once($cmr->get_path("func") . "function/func_generators.php");
    include_once($cmr->get_path("class") . "class/class_generators.php");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;
$division->module["title"] = $cmr->translate("generator"); //$division->module["title"] = "<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/new.gif\">"." New generator";
// $division->module["text"] = "";







$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/form_generator.php?conf_name=conf.d/modules/conf_form_generator.ini", 1);;;
$lk->add_link("modules/admin/replace.php?conf_name=conf.d/modules/conf_replace.ini", 1);;;
$division->prints["match_open_tab"] = $lk->open_module_tab(0);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_list.php?left1=&middle2=", 1);
$lk->add_link("modules/desktop.php?left1=&middle2=", 1);
$division->prints["match_link_list"] = $lk->list_link();




$division->prints["match_link_list"] = "";
$division->prints["match_input_hidden_id"] = "";
$division->prints["match_default"] = "";

$division->prints["match_snow"] = "";
$division->prints["match_ghostwhite"] = "";
$division->prints["match_whitesmoke"] = "";
$division->prints["match_gainsboro"] = "";
$division->prints["match_floralwhite"] = "";
$division->prints["match_oldlace"] = "";
$division->prints["match_linen"] = "";
$division->prints["match_antiquewhite"] = "";
$division->prints["match_papayawhip"] = "";
$division->prints["match_blanchedalmond"] = "";
$division->prints["match_bisque"] = "";
$division->prints["match_peachpuff"] = "";
$division->prints["match_navajowhite"] = "";
$division->prints["match_moccasin"] = "";
$division->prints["match_cornsilk"] = "";
$division->prints["match_ivory"] = "";
$division->prints["match_lemonchiffon"] = "";
$division->prints["match_seashell"] = "";
$division->prints["match_honeydew"] = "";
$division->prints["match_mintcream"] = "";
$division->prints["match_azure"] = "";
$division->prints["match_aliceblue"] = "";
$division->prints["match_lavender"] = "";
$division->prints["match_lavenderblush"] = "";
$division->prints["match_mistyrose"] = "";
$division->prints["match_white"] = "";
$division->prints["match_black"] = "";
$division->prints["match_darkslategray"] = "";
$division->prints["match_dimgray"] = "";
$division->prints["match_slategray"] = "";
$division->prints["match_lightslategray"] = "";
$division->prints["match_gray"] = "";
$division->prints["match_lightgray"] = "";
$division->prints["match_midnightblue"] = "";
$division->prints["match_navyblue"] = "";
$division->prints["match_cornflowerblue"] = "";
$division->prints["match_darkslateblue"] = "";
$division->prints["match_slateblue"] = "";
$division->prints["match_mediumslateblue"] = "";
$division->prints["match_lightslateblue"] = "";
$division->prints["match_mediumblue"] = "";
$division->prints["match_royalblue"] = "";
$division->prints["match_blue"] = "";
$division->prints["match_dodgerblue"] = "";
$division->prints["match_deepskyblue"] = "";
$division->prints["match_skyblue"] = "";
$division->prints["match_lightskyblue"] = "";
$division->prints["match_steelblue"] = "";
$division->prints["match_lightsteelblue"] = "";
$division->prints["match_lightblue"] = "";
$division->prints["match_powderblue"] = "";
$division->prints["match_paleturquoise"] = "";
$division->prints["match_darkturquoise"] = "";
$division->prints["match_mediumturquoise"] = "";
$division->prints["match_turquoise"] = "";
$division->prints["match_cyan"] = "";
$division->prints["match_lightcyan"] = "";
$division->prints["match_cadetblue"] = "";
$division->prints["match_mediumaquamarine"] = "";
$division->prints["match_aquamarine"] = "";
$division->prints["match_darkgreen"] = "";
$division->prints["match_darkolivegreen"] = "";
$division->prints["match_darkseagreen"] = "";
$division->prints["match_seagreen"] = "";
$division->prints["match_mediumseagreen"] = "";
$division->prints["match_lightseagreen"] = "";
$division->prints["match_palegreen"] = "";
$division->prints["match_springgreen"] = "";
$division->prints["match_lawngreen"] = "";
$division->prints["match_green"] = "";
$division->prints["match_chartreuse"] = "";
$division->prints["match_medspringgreen"] = "";
$division->prints["match_greenyellow"] = "";
$division->prints["match_limegreen"] = "";
$division->prints["match_yellowgreen"] = "";
$division->prints["match_forestgreen"] = "";
$division->prints["match_olivedrab"] = "";
$division->prints["match_darkkhaki"] = "";
$division->prints["match_palegoldenrod"] = "";
$division->prints["match_ltgoldenrodyello"] = "";
$division->prints["match_lightyellow"] = "";
$division->prints["match_yellow"] = "";
$division->prints["match_gold"] = "";
$division->prints["match_lightgoldenrod"] = "";
$division->prints["match_goldenrod"] = "";
$division->prints["match_darkgoldenrod"] = "";
$division->prints["match_rosybrown"] = "";
$division->prints["match_indianred"] = "";
$division->prints["match_saddlebrown"] = "";
$division->prints["match_sienna"] = "";
$division->prints["match_peru"] = "";
$division->prints["match_burlywood"] = "";
$division->prints["match_beige"] = "";
$division->prints["match_wheat"] = "";
$division->prints["match_sandybrown"] = "";
$division->prints["match_tan"] = "";
$division->prints["match_chocolate"] = "";
$division->prints["match_firebrick"] = "";
$division->prints["match_brown"] = "";
$division->prints["match_darksalmon"] = "";
$division->prints["match_salmon"] = "";
$division->prints["match_lightsalmon"] = "";
$division->prints["match_orange"] = "";
$division->prints["match_darkorange"] = "";
$division->prints["match_coral"] = "";
$division->prints["match_lightcoral"] = "";
$division->prints["match_tomato"] = "";
$division->prints["match_orangered"] = "";
$division->prints["match_red"] = "";
$division->prints["match_hotpink"] = "";
$division->prints["match_deeppink"] = "";
$division->prints["match_pink"] = "";
$division->prints["match_lightpink"] = "";
$division->prints["match_palevioletred"] = "";
$division->prints["match_maroon"] = "";
$division->prints["match_mediumvioletred"] = "";
$division->prints["match_violetred"] = "";
$division->prints["match_magenta"] = "";
$division->prints["match_violet"] = "";
$division->prints["match_plum"] = "";
$division->prints["match_orchid"] = "";
$division->prints["match_mediumorchid"] = "";
$division->prints["match_darkorchid"] = "";
$division->prints["match_darkviolet"] = "";
$division->prints["match_blueviolet"] = "";
$division->prints["match_purple"] = "";
$division->prints["match_mediumpurple"] = "";
$division->prints["match_thistle"] = "";
$division->prints["match_snow1"] = "";
$division->prints["match_snow2"] = "";
$division->prints["match_snow3"] = "";
$division->prints["match_snow4"] = "";
$division->prints["match_seashell1"] = "";
$division->prints["match_seashell2"] = "";
$division->prints["match_seashell3"] = "";
$division->prints["match_seashell4"] = "";
$division->prints["match_antiquewhite1"] = "";
$division->prints["match_antiquewhite2"] = "";
$division->prints["match_antiquewhite3"] = "";
$division->prints["match_antiquewhite4"] = "";
$division->prints["match_bisque1"] = "";
$division->prints["match_bisque2"] = "";
$division->prints["match_bisque3"] = "";
$division->prints["match_bisque4"] = "";
$division->prints["match_peachpuff1"] = "";
$division->prints["match_peachpuff2"] = "";
$division->prints["match_peachpuff3"] = "";
$division->prints["match_peachpuff4"] = "";
$division->prints["match_navajowhite1"] = "";
$division->prints["match_navajowhite2"] = "";
$division->prints["match_navajowhite3"] = "";
$division->prints["match_navajowhite4"] = "";
$division->prints["match_lemonchiffon1"] = "";
$division->prints["match_lemonchiffon2"] = "";
$division->prints["match_lemonchiffon3"] = "";
$division->prints["match_lemonchiffon4"] = "";
$division->prints["match_cornsilk1"] = "";
$division->prints["match_cornsilk2"] = "";
$division->prints["match_cornsilk3"] = "";
$division->prints["match_cornsilk4"] = "";
$division->prints["match_ivory1"] = "";
$division->prints["match_ivory2"] = "";
$division->prints["match_ivory3"] = "";
$division->prints["match_ivory4"] = "";
$division->prints["match_honeydew1"] = "";
$division->prints["match_honeydew2"] = "";
$division->prints["match_honeydew3"] = "";
$division->prints["match_honeydew4"] = "";
$division->prints["match_lavenderblush1"] = "";
$division->prints["match_lavenderblush2"] = "";
$division->prints["match_lavenderblush3"] = "";
$division->prints["match_lavenderblush4"] = "";
$division->prints["match_mistyrose1"] = "";
$division->prints["match_mistyrose2"] = "";
$division->prints["match_mistyrose3"] = "";
$division->prints["match_mistyrose4"] = "";
$division->prints["match_azure1"] = "";
$division->prints["match_azure2"] = "";
$division->prints["match_azure3"] = "";
$division->prints["match_azure4"] = "";
$division->prints["match_slateblue1"] = "";
$division->prints["match_slateblue2"] = "";
$division->prints["match_slateblue3"] = "";
$division->prints["match_slateblue4"] = "";
$division->prints["match_royalblue1"] = "";
$division->prints["match_royalblue2"] = "";
$division->prints["match_royalblue3"] = "";
$division->prints["match_royalblue4"] = "";
$division->prints["match_blue1"] = "";
$division->prints["match_blue2"] = "";
$division->prints["match_blue3"] = "";
$division->prints["match_blue4"] = "";
$division->prints["match_dodgerblue1"] = "";
$division->prints["match_dodgerblue2"] = "";
$division->prints["match_dodgerblue3"] = "";
$division->prints["match_dodgerblue4"] = "";
$division->prints["match_steelblue1"] = "";
$division->prints["match_steelblue2"] = "";
$division->prints["match_steelblue3"] = "";
$division->prints["match_steelblue4"] = "";
$division->prints["match_deepskyblue1"] = "";
$division->prints["match_deepskyblue2"] = "";
$division->prints["match_deepskyblue3"] = "";
$division->prints["match_deepskyblue4"] = "";
$division->prints["match_skyblue1"] = "";
$division->prints["match_skyblue2"] = "";
$division->prints["match_skyblue3"] = "";
$division->prints["match_skyblue4"] = "";
$division->prints["match_lightskyblue1"] = "";
$division->prints["match_lightskyblue2"] = "";
$division->prints["match_lightskyblue3"] = "";
$division->prints["match_lightskyblue4"] = "";
$division->prints["match_slategray1"] = "";
$division->prints["match_slategray2"] = "";
$division->prints["match_slategray3"] = "";
$division->prints["match_slategray4"] = "";
$division->prints["match_lightsteelblue1"] = "";
$division->prints["match_lightsteelblue2"] = "";
$division->prints["match_lightsteelblue3"] = "";
$division->prints["match_lightsteelblue4"] = "";
$division->prints["match_lightblue1"] = "";
$division->prints["match_lightblue2"] = "";
$division->prints["match_lightblue3"] = "";
$division->prints["match_lightblue4"] = "";
$division->prints["match_lightcyan1"] = "";
$division->prints["match_lightcyan2"] = "";
$division->prints["match_lightcyan3"] = "";
$division->prints["match_lightcyan4"] = "";
$division->prints["match_paleturquoise1"] = "";
$division->prints["match_paleturquoise2"] = "";
$division->prints["match_paleturquoise3"] = "";
$division->prints["match_paleturquoise4"] = "";
$division->prints["match_cadetblue1"] = "";
$division->prints["match_cadetblue2"] = "";
$division->prints["match_cadetblue3"] = "";
$division->prints["match_cadetblue4"] = "";
$division->prints["match_turquoise1"] = "";
$division->prints["match_turquoise2"] = "";
$division->prints["match_turquoise3"] = "";
$division->prints["match_turquoise4"] = "";
$division->prints["match_cyan1"] = "";
$division->prints["match_cyan2"] = "";
$division->prints["match_cyan3"] = "";
$division->prints["match_cyan4"] = "";
$division->prints["match_darkslategray1"] = "";
$division->prints["match_darkslategray2"] = "";
$division->prints["match_darkslategray3"] = "";
$division->prints["match_darkslategray4"] = "";
$division->prints["match_aquamarine1"] = "";
$division->prints["match_aquamarine2"] = "";
$division->prints["match_aquamarine3"] = "";
$division->prints["match_aquamarine4"] = "";
$division->prints["match_darkseagreen1"] = "";
$division->prints["match_darkseagreen2"] = "";
$division->prints["match_darkseagreen3"] = "";
$division->prints["match_darkseagreen4"] = "";
$division->prints["match_seagreen1"] = "";
$division->prints["match_seagreen2"] = "";
$division->prints["match_seagreen3"] = "";
$division->prints["match_seagreen4"] = "";
$division->prints["match_palegreen1"] = "";
$division->prints["match_palegreen2"] = "";
$division->prints["match_palegreen3"] = "";
$division->prints["match_palegreen4"] = "";
$division->prints["match_springgreen1"] = "";
$division->prints["match_springgreen2"] = "";
$division->prints["match_springgreen3"] = "";
$division->prints["match_springgreen4"] = "";
$division->prints["match_green1"] = "";
$division->prints["match_green2"] = "";
$division->prints["match_green3"] = "";
$division->prints["match_green4"] = "";
$division->prints["match_chartreuse1"] = "";
$division->prints["match_chartreuse2"] = "";
$division->prints["match_chartreuse3"] = "";
$division->prints["match_chartreuse4"] = "";
$division->prints["match_olivedrab1"] = "";
$division->prints["match_olivedrab2"] = "";
$division->prints["match_olivedrab3"] = "";
$division->prints["match_olivedrab4"] = "";
$division->prints["match_darkolivegreen1"] = "";
$division->prints["match_darkolivegreen2"] = "";
$division->prints["match_darkolivegreen3"] = "";
$division->prints["match_darkolivegreen4"] = "";
$division->prints["match_khaki1"] = "";
$division->prints["match_khaki2"] = "";
$division->prints["match_khaki3"] = "";
$division->prints["match_khaki4"] = "";
$division->prints["match_lightgoldenrod1"] = "";
$division->prints["match_lightgoldenrod2"] = "";
$division->prints["match_lightgoldenrod3"] = "";
$division->prints["match_lightgoldenrod4"] = "";
$division->prints["match_lightyellow1"] = "";
$division->prints["match_lightyellow2"] = "";
$division->prints["match_lightyellow3"] = "";
$division->prints["match_lightyellow4"] = "";
$division->prints["match_yellow1"] = "";
$division->prints["match_yellow2"] = "";
$division->prints["match_yellow3"] = "";
$division->prints["match_yellow4"] = "";
$division->prints["match_gold1"] = "";
$division->prints["match_gold2"] = "";
$division->prints["match_gold3"] = "";
$division->prints["match_gold4"] = "";
$division->prints["match_goldenrod1"] = "";
$division->prints["match_goldenrod2"] = "";
$division->prints["match_goldenrod3"] = "";
$division->prints["match_goldenrod4"] = "";
$division->prints["match_darkgoldenrod1"] = "";
$division->prints["match_darkgoldenrod2"] = "";
$division->prints["match_darkgoldenrod3"] = "";
$division->prints["match_darkgoldenrod4"] = "";
$division->prints["match_rosybrown1"] = "";
$division->prints["match_rosybrown2"] = "";
$division->prints["match_rosybrown3"] = "";
$division->prints["match_rosybrown4"] = "";
$division->prints["match_indianred1"] = "";
$division->prints["match_indianred2"] = "";
$division->prints["match_indianred3"] = "";
$division->prints["match_indianred4"] = "";
$division->prints["match_sienna1"] = "";
$division->prints["match_sienna2"] = "";
$division->prints["match_sienna3"] = "";
$division->prints["match_sienna4"] = "";
$division->prints["match_burlywood1"] = "";
$division->prints["match_burlywood2"] = "";
$division->prints["match_burlywood3"] = "";
$division->prints["match_burlywood4"] = "";
$division->prints["match_wheat1"] = "";
$division->prints["match_wheat2"] = "";
$division->prints["match_wheat3"] = "";
$division->prints["match_wheat4"] = "";
$division->prints["match_tan1"] = "";
$division->prints["match_tan2"] = "";
$division->prints["match_tan3"] = "";
$division->prints["match_tan4"] = "";
$division->prints["match_chocolate1"] = "";
$division->prints["match_chocolate2"] = "";
$division->prints["match_chocolate3"] = "";
$division->prints["match_chocolate4"] = "";
$division->prints["match_firebrick1"] = "";
$division->prints["match_firebrick2"] = "";
$division->prints["match_firebrick3"] = "";
$division->prints["match_firebrick4"] = "";
$division->prints["match_brown1"] = "";
$division->prints["match_brown2"] = "";
$division->prints["match_brown3"] = "";
$division->prints["match_brown4"] = "";
$division->prints["match_salmon1"] = "";
$division->prints["match_salmon2"] = "";
$division->prints["match_salmon3"] = "";
$division->prints["match_salmon4"] = "";
$division->prints["match_lightsalmon1"] = "";
$division->prints["match_lightsalmon2"] = "";
$division->prints["match_lightsalmon3"] = "";
$division->prints["match_lightsalmon4"] = "";
$division->prints["match_orange1"] = "";
$division->prints["match_orange2"] = "";
$division->prints["match_orange3"] = "";
$division->prints["match_orange4"] = "";
$division->prints["match_darkorange1"] = "";
$division->prints["match_darkorange2"] = "";
$division->prints["match_darkorange3"] = "";
$division->prints["match_darkorange4"] = "";
$division->prints["match_coral1"] = "";
$division->prints["match_coral2"] = "";
$division->prints["match_coral3"] = "";
$division->prints["match_coral4"] = "";
$division->prints["match_tomato1"] = "";
$division->prints["match_tomato2"] = "";
$division->prints["match_tomato3"] = "";
$division->prints["match_tomato4"] = "";
$division->prints["match_orangered1"] = "";
$division->prints["match_orangered2"] = "";
$division->prints["match_orangered3"] = "";
$division->prints["match_orangered4"] = "";
$division->prints["match_red1"] = "";
$division->prints["match_red2"] = "";
$division->prints["match_red3"] = "";
$division->prints["match_red4"] = "";
$division->prints["match_deeppink1"] = "";
$division->prints["match_deeppink2"] = "";
$division->prints["match_deeppink3"] = "";
$division->prints["match_deeppink4"] = "";
$division->prints["match_hotpink1"] = "";
$division->prints["match_hotpink2"] = "";
$division->prints["match_hotpink3"] = "";
$division->prints["match_hotpink4"] = "";
$division->prints["match_pink1"] = "";
$division->prints["match_pink2"] = "";
$division->prints["match_pink3"] = "";
$division->prints["match_pink4"] = "";
$division->prints["match_lightpink1"] = "";
$division->prints["match_lightpink2"] = "";
$division->prints["match_lightpink3"] = "";
$division->prints["match_lightpink4"] = "";
$division->prints["match_palevioletred1"] = "";
$division->prints["match_palevioletred2"] = "";
$division->prints["match_palevioletred3"] = "";
$division->prints["match_palevioletred4"] = "";
$division->prints["match_maroon1"] = "";
$division->prints["match_maroon2"] = "";
$division->prints["match_maroon3"] = "";
$division->prints["match_maroon4"] = "";
$division->prints["match_violetred1"] = "";
$division->prints["match_violetred2"] = "";
$division->prints["match_violetred3"] = "";
$division->prints["match_violetred4"] = "";
$division->prints["match_magenta1"] = "";
$division->prints["match_magenta2"] = "";
$division->prints["match_magenta3"] = "";
$division->prints["match_magenta4"] = "";
$division->prints["match_orchid1"] = "";
$division->prints["match_orchid2"] = "";
$division->prints["match_orchid3"] = "";
$division->prints["match_orchid4"] = "";
$division->prints["match_plum1"] = "";
$division->prints["match_plum2"] = "";
$division->prints["match_plum3"] = "";
$division->prints["match_plum4"] = "";
$division->prints["match_mediumorchid1"] = "";
$division->prints["match_mediumorchid2"] = "";
$division->prints["match_mediumorchid3"] = "";
$division->prints["match_mediumorchid4"] = "";
$division->prints["match_darkorchid1"] = "";
$division->prints["match_darkorchid2"] = "";
$division->prints["match_darkorchid3"] = "";
$division->prints["match_darkorchid4"] = "";
$division->prints["match_purple1"] = "";
$division->prints["match_purple2"] = "";
$division->prints["match_purple3"] = "";
$division->prints["match_purple4"] = "";
$division->prints["match_mediumpurple1"] = "";
$division->prints["match_mediumpurple2"] = "";
$division->prints["match_mediumpurple3"] = "";
$division->prints["match_mediumpurple4"] = "";
$division->prints["match_thistle1"] = "";
$division->prints["match_thistle2"] = "";
$division->prints["match_thistle3"] = "";
$division->prints["match_thistle4"] = "";
$division->prints["match_gray11"] = "";
$division->prints["match_gray21"] = "";
$division->prints["match_gray31"] = "";
$division->prints["match_gray41"] = "";
$division->prints["match_gray51"] = "";
$division->prints["match_gray61"] = "";
$division->prints["match_gray71"] = "";
$division->prints["match_gray81"] = "";
$division->prints["match_gray91"] = "";
$division->prints["match_darkgray"] = "";
$division->prints["match_darkblue"] = "";
$division->prints["match_darkcyan"] = "";
$division->prints["match_darkmagenta"] = "";
$division->prints["match_darkred"] = "";
$division->prints["match_lightgreen"] = "";

$division->prints["match_db_name"] = "";






// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_link_legend"] = $cmr->translate("Links");
$division->prints["match_user_title1"] = $cmr->translate("Generator");
$division->prints["match_user_title2"] = "";
$division->prints["match_label_manual_insert"] = ($cmr->translate("manual insert"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_groups";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_form_generator.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $db_type = get_post("db_type");
    $the_db_name = get_post("the_db_name");
    $model_group = get_post("model_group");
    $db_source = get_post("db_source");
    $model_source = get_post("model_source");
    $output_type = get_post("output_type");
	if(empty($db_type)) $db_type = $cmr->get_conf("db_type");
	if(empty($the_db_name)) $the_db_name = $cmr->get_conf("db_name");
	if(empty($model_group)) $model_group = $cmr->get_path("model") . "model/php";
	if(empty($db_source)) $db_source = "local";
	if(empty($model_source)) $model_source = "local";
	if(empty($output_type)) $output_type = "download";

	($the_db_name == "camaroes_db") ? $division->prints["match_table_prefix"] = "cmr_" : $division->prints["match_table_prefix"] = "";

$division->prints["match_label_main"] = ($cmr->translate("main"));
$division->prints["match_label_db_type"] = ($cmr->translate("db_type"));
$division->prints["match_db_type"] = ($db_type);

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_option_db_type"] = "";
$array_driver = get_db_drivers($cmr->config);
foreach ($array_driver as $driver)
$division->prints["match_option_db_type"] .= "<option>" . $driver . "</option>";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_select_db_type"] = $division->prints["match_option_db_type"];
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_db_source"] = ($cmr->translate("database source"));
$division->prints["match_db_source"] = ($db_source);
$division->prints["match_label_default"] = ($cmr->translate("default selection"));
$division->prints["match_label_text"] = ($cmr->translate("insert text"));
$division->prints["match_label_none"] = ($cmr->translate("none"));
$division->prints["match_label_local_source"] = ($cmr->translate("local file source"));
$division->prints["match_label_local_zip"] = ($cmr->translate("local file zip"));
$division->prints["match_label_server"] = ($cmr->translate("from server"));
$division->prints["match_label_remote_source"] = ($cmr->translate("remote file source"));
$division->prints["match_label_remote_zip"] = ($cmr->translate("remote file zip"));
$division->prints["match_label_model_source"] = ($cmr->translate("model source"));
$division->prints["match_model_source"] = ($model_source);
$division->prints["match_label_default"] = ($cmr->translate("default selection"));
$division->prints["match_label_button_generator"] = ($cmr->translate("button generator"));
$division->prints["match_label_text"] = ($cmr->translate("insert text"));
$division->prints["match_label_from_server"] = ($cmr->translate("from server"));
$division->prints["match_label_local_source"] = ($cmr->translate("local file source"));
$division->prints["match_label_local_zip"] = ($cmr->translate("local file zip"));
$division->prints["match_label_remote_source"] = ($cmr->translate("remote file source"));
$division->prints["match_label_remote_folder"] = ($cmr->translate("remote folder source"));
$division->prints["match_label_remote_zip"] = ($cmr->translate("remote file zip"));
$division->prints["match_label_output"] = ($cmr->translate("output"));
$division->prints["match_output_type"] = ($output_type);
$division->prints["match_label_default"] = ($cmr->translate("default selection"));
$division->prints["match_label_download"] = ($cmr->translate("download"));
$division->prints["match_label_download_zip"] = ($cmr->translate("download file zip"));
$division->prints["match_label_auto_folders"] = ($cmr->translate("in application auto folders"));
$division->prints["match_label_temporary_folders"] = ($cmr->translate("in application temporary folders"));
$division->prints["match_label_update_files"] = ($cmr->translate("update application files"));
$division->prints["match_label_remote_folder"] = ($cmr->translate("remote folder"));
$division->prints["match_label_remote_zip"] = ($cmr->translate("remote file zip"));
$division->prints["match_label_remote_file"] = ($cmr->translate("remote file"));
$division->prints["match_label_core_files"] = ($cmr->translate("insert camaroes core files"));
$division->prints["match_label_core_tables"] = ($cmr->translate("insert camaroes core tables"));
$division->prints["match_label_prefix"] = ($cmr->translate("prefix"));
$division->prints["match_label_options"] = ($cmr->translate("options"));
$division->prints["match_label_model_group"] = ($cmr->translate("model group"));
$division->prints["match_model_group_value"] = trim($model_group);
$division->prints["match_model_group"] = basename($model_group);
$division->prints["match_label_default"] = ($cmr->translate("default selection"));
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_select_model_group"] = "";
$dir = @opendir($cmr->get_path("model") . "model");
while ($file = readdir($dir)){
    if(is_dir($cmr->get_path("model") . "model/".$file) && ($file != ".") && ($file != "..") && (!cmr_searchi("^index", $file))){
        $division->prints["match_select_model_group"] .= "<option value=\"" . trim($cmr->get_path("model") . "model/" . $file) . "\">" . $file . "</option>";
    }
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_select_text_font"] = "";
$dir = @opendir($cmr->get_path("font") . "fonts");
while ($file = readdir($dir)){
    if(!is_dir($cmr->get_path("font") . "fonts/".$file) && ($file != ".") && ($file != "..") && (!cmr_searchi("^index", $file))){
        $division->prints["match_select_text_font"] .= "<option value=\"" . trim($cmr->get_path("font") . "fonts/" . $file) . "\">" . $file . "</option>";
    }
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_select_button_model"] = "";

$dir = @opendir($cmr->get_path("www") . "images/button/model/");
while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..")){
        $division->prints["match_select_button_model"] .= "<option value=\"" . trim($cmr->get_path("www") . "images/button/model/" . $file) . "\">[" . trim($file) . "]</option>";
    }
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_db_source"] = ($cmr->translate("database source"));
$division->prints["match_label_model_source"] = ($cmr->translate("model source"));
$division->prints["match_label_text_font"] = ($cmr->translate("text_font"));
$division->prints["match_label_text_size"] = ($cmr->translate("text_size"));

	list($col1, $col2, $col3) = explode(",", $cmr->get_conf("cmr_button_color"));
	list($font, $x_pos, $y_pos, $size) = explode(",", $cmr->get_conf("cmr_button_dim"));

$division->prints["match_label_button_options"] = ($cmr->translate("button options"));
$division->prints["match_label_button_color"] = ($cmr->translate("button text color "));
$division->prints["match_col1"] = (dechex($col1));
$division->prints["match_col2"] = (dechex($col2));
$division->prints["match_col3"] = (dechex($col3));
$division->prints["match_label_button_font"] = ($cmr->translate("Font"));
$division->prints["match_font"] = (trim($font));
$division->prints["match_label_button_x_pos"] = ($cmr->translate("text position x"));
$division->prints["match_x_pos"] = (trim($x_pos));
$division->prints["match_label_button_y_pos"] = ($cmr->translate("text position y"));
$division->prints["match_y_pos"] = (trim($y_pos));
$division->prints["match_size"] = (trim($size));
$division->prints["match_label_button_model"] = ($cmr->translate("button model"));
$division->prints["match_button_model_value"] = (trim($cmr->get_conf("cmr_button_model")));
$division->prints["match_button_model"] = (basename($cmr->get_conf("cmr_button_model")));
$division->prints["match_label_output_dest"] = ($cmr->translate("output destination"));
$division->prints["match_temp_path"] = ($cmr->get_path("temp"));
$division->prints["match_label_backup"] = ($cmr->translate("output with backup"));
$division->prints["match_label_extra"] = ($cmr->translate("extra and other work"));
$division->prints["match_label_server_db"] = ($cmr->translate("server database"));
$division->prints["match_label_db_host"] = ($cmr->translate("db_host"));
$division->prints["match_cookie_db_host"] = (@ $_cookie["db_host"]);
$division->prints["match_label_db_port"] = ($cmr->translate("db_port"));
$division->prints["match_cookie_db_port"] = (@ $_cookie["db_port"]);
$division->prints["match_label_db_name"] = ($cmr->translate("db_name"));

$division->prints["match_the_db_name"] = ($the_db_name);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_select_db_name"] = "";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$database_array = sql_run("array", $cmr->db_connection, "show_databases", "", $the_db_name);
$database_p = $database_array[0];
$num_tab = count($database_p);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_select_db_name"] = select_order($cmr->language, $database_p,  $database_p, "0", "100");

// $sql_db_result = &$cmr->db_connection->query("show databases;") or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// while (($db = $sql_db_result->FetchRow())){
//	$db_name = $db[0];
//  $division->prints["match_select_db_name"] .= "<option>" . $db_name . "</option>";
//	$sql_db_result->MoveNext();
// }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_db_name"] = ($cmr->translate("db_name"));
$division->prints["match_cookie_db_name"] = (@ $_cookie["db_name"]);
$division->prints["match_label_db_user"] = ($cmr->translate("db_user"));
$division->prints["match_cookie_db_user"] = (@ $_cookie["db_user"]);
$division->prints["match_label_db_pw"] = ($cmr->translate("db_pw"));
$division->prints["match_cookie_db_pw"] = (@ $_cookie["db_pw"]);
$division->prints["match_label_table_prefix"] = ($cmr->translate("table prefix"));
// $division->prints["match_table_prefix"] = ($cmr->get_conf("cmr_table_prefix"));
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$table_array = sql_run("array", $cmr->db_connection, "show_tables", "", $the_db_name);
$table_p = $table_array[0];
$num_tab = count($table_p);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_select_table_p"] = select_order($cmr->language, $table_p,  $table_p, "0", "100");

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_tables"] = ($cmr->translate("table of "));
$division->prints["match_the_db_name"] = ($the_db_name);
$division->prints["match_label_select_table"] = ($cmr->translate("select list table(s)"));


//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$model_p = array();
$num_type = 0;
$model_dir = $model_group . "/";
$dir = @opendir($model_dir);
while ($fich = readdir($dir)){
  if(($fich != ".") && ($fich != "..") && (is_file($model_dir . $fich))){
//   $list_files[] = $fich;
//     $form_model = str_replace(strstr($fich, "_model"),"",$fich);
    $num_type++;
//     $list_files[$key] = "";
//     $model_v[] = $model_group . "/" . $fich;
    $model_p[] =  $fich;
}
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $array_model_type = gen_model_array($cmr->config);
if(empty($array_model_type)) $array_model_type = array("administrate", "button", "class", "conf", "config", "delete", "export", "func", "help", "import", "lang", "lib", "menu", "new", "notify", "preview", "report", "search", "template", "update", "view");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// foreach($array_model_type as $pref){
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // foreach($array_model_type as $form_model)
// reset($list_files);
// foreach($list_files as $key => $file){
//     if((!empty($file)) && cmr_searchi("^" . $pref . "[^\.]*_model\.", $file)){
//     $form_model = str_replace("_model", "", substr($file, 0, strrpos($file, ".")));
//     $num_type++;
//     $list_files[$key] = "";


//     $model_v[] = "check_type_" . $form_model;
//     $model_p[] =  $file;

// };
// }
// }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// reset($list_files);
// foreach($list_files as $file){
//     if(!empty($file)){
//     $form_model = str_replace("_model", "", substr($file, 0, strrpos($file, ".")));
//     $num_type++;

//     $model_v1[] = "check_" . $form_model;
//     $model_p1[] = $file;

// };
// }

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_models"] = ($cmr->translate("models "));
$division->prints["match_label_models_group"] = ($cmr->translate("models group "));


$division->prints["match_label_select_list_model"] = ($cmr->translate("select list model(s)"));

	$cmr_language["cmr_alphabet"] = implode(",", $array_model_type);
  $division->prints["match_select_list_model"] = select_order($cmr_language, $model_p,  $model_p, "0", "100");
// 	print(select_order($cmr->language, $model_v1,  $model_p1, "0", "100"));

$division->prints["match_label_num_tab"] = sprintf("%d", $num_tab * $num_type) . $cmr->translate(")... ");


$division->prints["match_label_files"] = ($cmr->translate("file(s) to create"));
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// cmrdb_select_db($cmr->db["db_name"], $cmr->db_connection);
$cmr->db_connection->Connect($cmr->get_conf("db_host"), $cmr->config["db_user"], $cmr->config["db_pw"], $cmr->config["db_name"]);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("generate");
$division->prints["match_submit_java"] = $cmr->translate("generate script?");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_form_generator" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_form_generator" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_form_generator" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
