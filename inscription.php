<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a> to login before continue ");
/**
 * inscription.php
 *         --------
 * begin : July 2004 - October 2011
 * copyright : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









inscription.php, 2011-Oct
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//-----database connection------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	include_once($cmr->get_path("index") . "adodb/adodb.inc.php");
// 	include_once($cmr->get_path("func") . "function/func_database.php");
// 	$cmr->db_connection = $cmr->connect();
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->prints["match_select_type"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "type", "type");
// $cmr->prints["match_option_sexe"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "sexe", "type");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->session["cmr_img_code"] = $cmr->gener_code("Camaroes");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            // -----------------------------------------------------

            // -----------------------------------------------------
$cmr->post_var["class_module"] = get_post("class_module");

            // -----------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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
if (($cmr->get_conf("cmr_ajax_engine"))) {
    $cmr->prints["match_ajax_engine"] = "ajax_event('". $cmr->get_page("cmr_ajax_engine")."')";
}

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
$cmr->page["middle1"] = "inscription";
if (($cmr->get_page("page_title"))&&(strlen($cmr->page["page_title"])>2)) {
    $cmr->prints["match_title"] = ucfirst(cmr_search_replace("_", " ", $cmr->get_page("page_title")))." (" . $cmr->config["cmr_company_name3"] . ") " . $cmr->get_conf("cmr_version");
} else {
    $cmr->prints["match_title"] = "(" . $cmr->config["cmr_company_name3"] . ") " . ucfirst(cmr_search_replace("_", " ", substr($cmr->get_page("middle1"), 0, strrpos($cmr->get_page("middle1"), ".")))) . " - Ver. " . $cmr->get_conf("cmr_version");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->config["template_inscription"];
$file_list[] = $cmr->get_path("template") . "templates/template_inscription" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/origin/template_inscription" . $cmr->get_ext("template");
$template_inscription_file = cmr_good_file($file_list);
$template_inscription = file_get_contents($template_inscription_file);
$cmr->print_template("template1", $template_inscription);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "";
$mod->rown_position = "head";
$mod->col_position = "1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if (cmr_match_include($template_inscription, "match_include1")) {
    include_once($cmr->get_path("module") . "modules/guest/page_header.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->load_template($cmr->themes);
// $division->themes["win_type"] = "default";
$division->module["name"]= "inscription.php";
$division->module["title"] = $cmr->translate("Inscription");

$division->themes["header_tools_left"] = 0;
$division->themes["header_tools_right"] = 0;
$division->themes["module_positionx"]= "head";
$division->themes["module_positiony"]= "2";

$cmr->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_title1"] = "";
$cmr->prints["match_title2"] = "";
$cmr->prints["match_module_message"] = "";
$cmr->prints["match_legend_link"] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template2", $template_inscription);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    // ================================================
if ((get_post("class_module"))||(get_post("cmr_get_data"))) {
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if (cmr_match_include($template_inscription, "match_include2")) {
        include($cmr->get_path("get_data") . "get_data/get_inscription.php");
    }
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
    // ================================================

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->output[0] = "";
$cmr->output[1] = "";

// $cmr->prints["match_select_type"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "type", "type");
// $cmr->prints["match_option_sexe"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "sexe", "type");


$cmr->prints["match_inscription_request"] = $cmr->translate("inscription request");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["cmr_wwwpath"] = "";
$cmr->prints["match_form_param"] = "";
$cmr->prints["match_form_id"] = "inscription";

$cmr->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_inscription.php\" name=\"cmr_get_data\" />");
$cmr->prints["match_input_hidden_module"] = "";
$cmr->prints["match_input_hidden_conf"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_value_image_code"] = pw_encode($cmr->get_session("cmr_img_code"));
$cmr->prints["match_image_code"] = $cmr->get_session("cmr_img_code");
$cmr->prints["match_alt_code"] = "[code]";
if (($cmr->get_session("cmr_img_code"))) {
}
$cmr->prints["match_label_image_code"] = $cmr->translate("image code:");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->prints["match_label_image code"] = $cmr->translate("image code:");
$cmr->prints["match_label_login"] = $cmr->translate("login");
$cmr->prints["match_user"] = $cmr->translate("user");
$cmr->prints["match_label_uid"] = $cmr->translate("uid");
$cmr->prints["match_label_pw"] = $cmr->translate("pw");
$cmr->prints["match_label_email"] = $cmr->translate("email");
$cmr->prints["match_label_last_name"] = $cmr->translate("last_name");
$cmr->prints["match_label_request"] = $cmr->translate("request ");
$cmr->prints["match_label_groups"] = $cmr->translate("groups");
$cmr->prints["match_label_name"] = $cmr->translate("name");
$cmr->prints["match_label_sexe"] = $cmr->translate("sexe");
$cmr->prints["match_label_role"] = $cmr->translate("role");
$cmr->prints["match_label_email_sign"] = $cmr->translate("email_sign");
$cmr->prints["match_label_tel"] = $cmr->translate("tel");
$cmr->prints["match_label_cel"] = $cmr->translate("cel");
$cmr->prints["match_label_adress"] = $cmr->translate("adress");
$cmr->prints["match_label_location"] = $cmr->translate("location");



$cmr->prints["match_albania"] = $cmr->translate("albania");
$cmr->prints["match_algeria"] = $cmr->translate("algeria");
$cmr->prints["match_american_samoa"] = $cmr->translate("american samoa");
$cmr->prints["match_andorra"] = $cmr->translate("andorra");
$cmr->prints["match_angola"] = $cmr->translate("angola");
$cmr->prints["match_anguilla"] = $cmr->translate("anguilla");
$cmr->prints["match_antarctica"] = $cmr->translate("antarctica");
$cmr->prints["match_antigua_and_barbuda"] = $cmr->translate("antigua and barbuda");
$cmr->prints["match_argentina"] = $cmr->translate("argentina");
$cmr->prints["match_armenia"] = $cmr->translate("armenia");
$cmr->prints["match_aruba"] = $cmr->translate("aruba");
$cmr->prints["match_australia"] = $cmr->translate("australia");
$cmr->prints["match_austria"] = $cmr->translate("austria");
$cmr->prints["match_azerbaijan"] = $cmr->translate("azerbaijan");
$cmr->prints["match_bahamas"] = $cmr->translate("bahamas");
$cmr->prints["match_bahrain"] = $cmr->translate("bahrain");
$cmr->prints["match_bangladesh"] = $cmr->translate("bangladesh");
$cmr->prints["match_barbados"] = $cmr->translate("barbados");
$cmr->prints["match_belarus"] = $cmr->translate("belarus");
$cmr->prints["match_belgium"] = $cmr->translate("belgium");
$cmr->prints["match_belize"] = $cmr->translate("belize");
$cmr->prints["match_benin"] = $cmr->translate("benin");
$cmr->prints["match_bermuda"] = $cmr->translate("bermuda");
$cmr->prints["match_bhutan"] = $cmr->translate("bhutan");
$cmr->prints["match_bolivia"] = $cmr->translate("bolivia");
$cmr->prints["match_bosnia_and_herzegovina"] = $cmr->translate("bosnia and herzegovina");
$cmr->prints["match_botswana"] = $cmr->translate("botswana");
$cmr->prints["match_bouvet_island"] = $cmr->translate("bouvet island");
$cmr->prints["match_brazil"] = $cmr->translate("brazil");
$cmr->prints["match_british_indian_ocean_territories"] = $cmr->translate("british indian ocean territories");
$cmr->prints["match_brunei_darussalam"] = $cmr->translate("brunei darussalam");
$cmr->prints["match_bulgaria"] = $cmr->translate("bulgaria");
$cmr->prints["match_burkina_faso"] = $cmr->translate("burkina faso");
$cmr->prints["match_burundi"] = $cmr->translate("burundi");
$cmr->prints["match_cambodia"] = $cmr->translate("cambodia");
$cmr->prints["match_cameroon"] = $cmr->translate("cameroon");
$cmr->prints["match_canada"] = $cmr->translate("canada");
$cmr->prints["match_cape_verde"] = $cmr->translate("cape verde");
$cmr->prints["match_cayman_islands"] = $cmr->translate("cayman islands");
$cmr->prints["match_central_african_republic"] = $cmr->translate("central african republic");
$cmr->prints["match_chad"] = $cmr->translate("chad");
$cmr->prints["match_chile"] = $cmr->translate("chile");
$cmr->prints["match_china"] = $cmr->translate("china");
$cmr->prints["match_christmas_island"] = $cmr->translate("christmas island");
$cmr->prints["match_cocos_islands"] = $cmr->translate("cocos islands");
$cmr->prints["match_colombia"] = $cmr->translate("colombia");
$cmr->prints["match_comoros"] = $cmr->translate("comoros");
$cmr->prints["match_congo"] = $cmr->translate("congo");
$cmr->prints["match_congo_democratic"] = $cmr->translate("congo, the democratic republic of the");
$cmr->prints["match_cook_islands"] = $cmr->translate("cook islands");
$cmr->prints["match_costa_rica"] = $cmr->translate("costa rica");
$cmr->prints["match_Cote_Divoire"] = $cmr->translate("Cote D'ivoire");

$cmr->prints["match_croatia"] = $cmr->translate("croatia");
$cmr->prints["match_cyprus"] = $cmr->translate("cyprus");
$cmr->prints["match_czech_republic"] = $cmr->translate("czech republic");
$cmr->prints["match_denmark"] = $cmr->translate("denmark");
$cmr->prints["match_djibouti"] = $cmr->translate("djibouti");
$cmr->prints["match_dominica"] = $cmr->translate("dominica");
$cmr->prints["match_dominican_republic"] = $cmr->translate("dominican republic");
$cmr->prints["match_east_timor"] = $cmr->translate("east timor");
$cmr->prints["match_ecuador"] = $cmr->translate("ecuador");
$cmr->prints["match_egypt"] = $cmr->translate("egypt");
$cmr->prints["match_el_salvador"] = $cmr->translate("el salvador");
$cmr->prints["match_equatorial_guinea"] = $cmr->translate("equatorial guinea");
$cmr->prints["match_eritrea"] = $cmr->translate("eritrea");
$cmr->prints["match_estonia"] = $cmr->translate("estonia");
$cmr->prints["match_ethiopia"] = $cmr->translate("ethiopia");
$cmr->prints["match_falkland_islands"] = $cmr->translate("falkland islands");
$cmr->prints["match_faroe_islands"] = $cmr->translate("faroe islands");
$cmr->prints["match_fiji"] = $cmr->translate("fiji");
$cmr->prints["match_finland"] = $cmr->translate("finland");
$cmr->prints["match_france"] = $cmr->translate("france");
$cmr->prints["match_french_guiana"] = $cmr->translate("french guiana");
$cmr->prints["match_french_polynesia"] = $cmr->translate("french polynesia");
$cmr->prints["match_french_southern_territories"] = $cmr->translate("french southern territories");
$cmr->prints["match_gabon"] = $cmr->translate("gabon");
$cmr->prints["match_gambia"] = $cmr->translate("gambia");
$cmr->prints["match_gaza_strip"] = $cmr->translate("gaza strip");
$cmr->prints["match_georgia"] = $cmr->translate("georgia");
$cmr->prints["match_germany"] = $cmr->translate("germany");
$cmr->prints["match_ghana"] = $cmr->translate("ghana");
$cmr->prints["match_gibraltar"] = $cmr->translate("gibraltar");
$cmr->prints["match_greece"] = $cmr->translate("greece");
$cmr->prints["match_greenland"] = $cmr->translate("greenland");
$cmr->prints["match_grenada"] = $cmr->translate("grenada");
$cmr->prints["match_guadeloupe"] = $cmr->translate("guadeloupe");
$cmr->prints["match_guam"] = $cmr->translate("guam");
$cmr->prints["match_guatemala"] = $cmr->translate("guatemala");
$cmr->prints["match_guinea"] = $cmr->translate("guinea");
$cmr->prints["match_Guinea_Bissau"] = $cmr->translate("Guinea-Bissau");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_guyana"] = $cmr->translate("guyana");
$cmr->prints["match_haiti"] = $cmr->translate("haiti");
$cmr->prints["match_heard_island_and_mcdonald_islands"] = $cmr->translate("heard island and mcdonald islands");
$cmr->prints["match_vatican"] = $cmr->translate("holy see (vatican city state)");
$cmr->prints["match_honduras"] = $cmr->translate("honduras");
$cmr->prints["match_hong_kong"] = $cmr->translate("hong kong");
$cmr->prints["match_hungary"] = $cmr->translate("hungary");
$cmr->prints["match_iceland"] = $cmr->translate("iceland");
$cmr->prints["match_india"] = $cmr->translate("india");
$cmr->prints["match_indonesia"] = $cmr->translate("indonesia");
$cmr->prints["match_ireland"] = $cmr->translate("ireland");
$cmr->prints["match_israel"] = $cmr->translate("israel");
$cmr->prints["match_italy"] = $cmr->translate("italy");
$cmr->prints["match_jamaica"] = $cmr->translate("jamaica");
$cmr->prints["match_japan"] = $cmr->translate("japan");
$cmr->prints["match_jordan"] = $cmr->translate("jordan");
$cmr->prints["match_kazakhstan"] = $cmr->translate("kazakhstan");
$cmr->prints["match_kenya"] = $cmr->translate("kenya");
$cmr->prints["match_kiribati"] = $cmr->translate("kiribati");
$cmr->prints["match_kuwait"] = $cmr->translate("kuwait");
$cmr->prints["match_kyrgyzstan"] = $cmr->translate("kyrgyzstan");
$cmr->prints["match_lao_peoples_democratic_republic"] = $cmr->translate("lao peoples democratic republic");
$cmr->prints["match_latvia"] = $cmr->translate("latvia");
$cmr->prints["match_lebanon"] = $cmr->translate("lebanon");
$cmr->prints["match_lesotho"] = $cmr->translate("lesotho");
$cmr->prints["match_liberia"] = $cmr->translate("liberia");
$cmr->prints["match_liechtenstein"] = $cmr->translate("liechtenstein");
$cmr->prints["match_lithuania"] = $cmr->translate("lithuania");
$cmr->prints["match_luxembourg"] = $cmr->translate("luxembourg");
$cmr->prints["match_macau"] = $cmr->translate("macau");
$cmr->prints["match_macedonia"] = $cmr->translate("macedonia");
$cmr->prints["match_madagascar"] = $cmr->translate("madagascar");
$cmr->prints["match_malawi"] = $cmr->translate("malawi");
$cmr->prints["match_malaysia"] = $cmr->translate("malaysia");
$cmr->prints["match_maldives"] = $cmr->translate("maldives");
$cmr->prints["match_mali"] = $cmr->translate("mali");
$cmr->prints["match_malta"] = $cmr->translate("malta");
$cmr->prints["match_marshall_islands"] = $cmr->translate("marshall islands");
$cmr->prints["match_martinique"] = $cmr->translate("martinique");
$cmr->prints["match_mauritania"] = $cmr->translate("mauritania");
$cmr->prints["match_mauritius"] = $cmr->translate("mauritius");
$cmr->prints["match_mayotte"] = $cmr->translate("mayotte");
$cmr->prints["match_mexico"] = $cmr->translate("mexico");
$cmr->prints["match_micronesia"] = $cmr->translate("micronesia");
$cmr->prints["match_moldova"] = $cmr->translate("moldova");
$cmr->prints["match_monaco"] = $cmr->translate("monaco");
$cmr->prints["match_mongolia"] = $cmr->translate("mongolia");
$cmr->prints["match_montserrat"] = $cmr->translate("montserrat");
$cmr->prints["match_morocco"] = $cmr->translate("morocco");
$cmr->prints["match_mozambique"] = $cmr->translate("mozambique");
$cmr->prints["match_myanmar"] = $cmr->translate("myanmar");
$cmr->prints["match_namibia"] = $cmr->translate("namibia");
$cmr->prints["match_nauru"] = $cmr->translate("nauru");
$cmr->prints["match_nepal"] = $cmr->translate("nepal");
$cmr->prints["match_netherlands"] = $cmr->translate("netherlands");
$cmr->prints["match_netherlands_antilles"] = $cmr->translate("netherlands antilles");
$cmr->prints["match_new_caledonia"] = $cmr->translate("new caledonia");
$cmr->prints["match_new_zealand"] = $cmr->translate("new zealand");
$cmr->prints["match_nicaragua"] = $cmr->translate("nicaragua");
$cmr->prints["match_niger"] = $cmr->translate("niger");
$cmr->prints["match_nigeria"] = $cmr->translate("nigeria");
$cmr->prints["match_niue"] = $cmr->translate("niue");
$cmr->prints["match_norfolk_island"] = $cmr->translate("norfolk island");
$cmr->prints["match_northern_mariana_islands"] = $cmr->translate("northern mariana islands");
$cmr->prints["match_norway"] = $cmr->translate("norway");
$cmr->prints["match_oman"] = $cmr->translate("oman");
$cmr->prints["match_pakistan"] = $cmr->translate("pakistan");
$cmr->prints["match_palau"] = $cmr->translate("palau");
$cmr->prints["match_palestinian"] = $cmr->translate("palestinian territory, occupied");
$cmr->prints["match_panama"] = $cmr->translate("panama");
$cmr->prints["match_papua_new_guinea"] = $cmr->translate("papua new guinea");
$cmr->prints["match_paraguay"] = $cmr->translate("paraguay");
$cmr->prints["match_peru"] = $cmr->translate("peru");
$cmr->prints["match_philippines"] = $cmr->translate("philippines");
$cmr->prints["match_pitcairn"] = $cmr->translate("pitcairn");
$cmr->prints["match_poland"] = $cmr->translate("poland");
$cmr->prints["match_portugal"] = $cmr->translate("portugal");
$cmr->prints["match_puerto_rico"] = $cmr->translate("puerto rico");
$cmr->prints["match_qatar"] = $cmr->translate("qatar");
$cmr->prints["match_republic_of_korea"] = $cmr->translate("republic of korea");
$cmr->prints["match_reunion"] = $cmr->translate("reunion");
$cmr->prints["match_romania"] = $cmr->translate("romania");
$cmr->prints["match_russian_federation"] = $cmr->translate("russian federation");
$cmr->prints["match_rwanda"] = $cmr->translate("rwanda");
$cmr->prints["match_saint_helena"] = $cmr->translate("saint helena");
$cmr->prints["match_saint_kitts_and_nevis"] = $cmr->translate("saint kitts and nevis");
$cmr->prints["match_saint_lucia"] = $cmr->translate("saint lucia");
$cmr->prints["match_saint_pierre_and_miquelon"] = $cmr->translate("saint pierre and miquelon");
$cmr->prints["match_saint_vincent_and_the_grenadines"] = $cmr->translate("saint vincent and the grenadines");
$cmr->prints["match_samoa"] = $cmr->translate("samoa");
$cmr->prints["match_san_marino"] = $cmr->translate("san marino");
$cmr->prints["match_sao_tome_and_principe"] = $cmr->translate("sao tome and principe");
$cmr->prints["match_saudi_arabia"] = $cmr->translate("saudi arabia");
$cmr->prints["match_senegal"] = $cmr->translate("senegal");
$cmr->prints["match_seychelles"] = $cmr->translate("seychelles");
$cmr->prints["match_sierra_leone"] = $cmr->translate("sierra leone");
$cmr->prints["match_singapore"] = $cmr->translate("singapore");
$cmr->prints["match_slovakia"] = $cmr->translate("slovakia");
$cmr->prints["match_slovenia"] = $cmr->translate("slovenia");
$cmr->prints["match_solomon_islands"] = $cmr->translate("solomon islands");
$cmr->prints["match_somalia"] = $cmr->translate("somalia");
$cmr->prints["match_south_africa"] = $cmr->translate("south africa");
$cmr->prints["match_south_georgia_and_sandwich_islands"] = $cmr->translate("south georgia and sandwich islands");
$cmr->prints["match_spain"] = $cmr->translate("spain");
$cmr->prints["match_sri_lanka"] = $cmr->translate("sri lanka");
$cmr->prints["match_suriname"] = $cmr->translate("suriname");
$cmr->prints["match_svalbard_and_jan_mayen"] = $cmr->translate("svalbard and jan mayen");
$cmr->prints["match_swaziland"] = $cmr->translate("swaziland");
$cmr->prints["match_sweden"] = $cmr->translate("sweden");
$cmr->prints["match_switzerland"] = $cmr->translate("switzerland");
$cmr->prints["match_taiwan"] = $cmr->translate("taiwan");
$cmr->prints["match_tajikistan"] = $cmr->translate("tajikistan");
$cmr->prints["match_tanzania"] = $cmr->translate("tanzania");
$cmr->prints["match_thailand"] = $cmr->translate("thailand");
$cmr->prints["match_togo"] = $cmr->translate("togo");
$cmr->prints["match_tokelau"] = $cmr->translate("tokelau");
$cmr->prints["match_tonga"] = $cmr->translate("tonga");
$cmr->prints["match_trinidad_and_tobago"] = $cmr->translate("trinidad and tobago");
$cmr->prints["match_tunisia"] = $cmr->translate("tunisia");
$cmr->prints["match_turkey"] = $cmr->translate("turkey");
$cmr->prints["match_turkmenistan"] = $cmr->translate("turkmenistan");
$cmr->prints["match_turks_and_caicos_islands"] = $cmr->translate("turks and caicos islands");
$cmr->prints["match_tuvalu"] = $cmr->translate("tuvalu");
$cmr->prints["match_uganda"] = $cmr->translate("uganda");
$cmr->prints["match_ukraine"] = $cmr->translate("ukraine");
$cmr->prints["match_united_arab_emirates"] = $cmr->translate("united arab emirates");
$cmr->prints["match_united_kingdom"] = $cmr->translate("united kingdom");
$cmr->prints["match_united_states"] = $cmr->translate("united states");
$cmr->prints["match_united_states_minor_outlying_islands"] = $cmr->translate("united states minor outlying islands");
$cmr->prints["match_uruguay"] = $cmr->translate("uruguay");
$cmr->prints["match_uzbekistan"] = $cmr->translate("uzbekistan");
$cmr->prints["match_vanuatu"] = $cmr->translate("vanuatu");
$cmr->prints["match_venezuela"] = $cmr->translate("venezuela");
$cmr->prints["match_viet_nam"] = $cmr->translate("viet nam");
$cmr->prints["match_viet_nam_us"] = $cmr->translate("viet nam us");
$cmr->prints["match_viet_nam_british"] = $cmr->translate("viet nam british");
$cmr->prints["match_virgin_islands_british"] = $cmr->translate("virgin islands (british)");
$cmr->prints["match_virgin_islands_us"] = $cmr->translate("virgin islands (u.s.)");
$cmr->prints["match_wallis_and_futuna_islands"] = $cmr->translate("wallis and futuna islands");
$cmr->prints["match_west_bank"] = $cmr->translate("west bank");
$cmr->prints["match_western_sahara"] = $cmr->translate("western sahara");
$cmr->prints["match_yemen"] = $cmr->translate("yemen");
$cmr->prints["match_yugoslavia"] = $cmr->translate("yugoslavia");
$cmr->prints["match_zambia"] = $cmr->translate("zambia");
$cmr->prints["match_zimbabwe"] = $cmr->translate("zimbabwe");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_label_lang"] = $cmr->translate("language");
$cmr->prints["match_default_lang"] =  $cmr->translate("language");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_options_language"] = "";
$array_value = get_languages_list($cmr->config);
$cmr->prints["match_options_language"] .= select_order($cmr->language, $array_value[1], $array_value[2], "1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_label_style"] = $cmr->translate("style");
$cmr->prints["match_default_themes"] = $cmr->translate("themes");

$cmr->prints["match_options_theme"] = "";
$array_value = get_themes_list($cmr->config);
$cmr->prints["match_options_theme"] .= select_order($cmr->language, $array_value[1], $array_value[2], "");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 // input size="20" type="text" value="" id="style" name="style" onclick="large_id('style')"
$cmr->prints["match_reset_form"] = $cmr->translate("login_script");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$cmr->prints["match_submit"] = $cmr->translate("Send request");
$cmr->prints["match_submit_java"] = $cmr->translate("confirm that you want to inser this user");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template3", $template_inscription);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "footer";
$mod->rown_position = "foot";
$mod->col_position = "1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if (cmr_match_include($template_inscription, "match_include3")) {
    include($cmr->get_path("module") . "modules/guest/page_footer.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template4", $template_inscription);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
