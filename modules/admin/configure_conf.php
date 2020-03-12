<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * configure_conf
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











configure_conf,Ver 3.0  2011-Sep-Wed 12:32:30  
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_soc_type")) return;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_config.php")
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);
// $division->module["title"] = "New Open ticket";
// $division->module["text"] = "";


















print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/configure_conf.php?conf_name=conf.d/modules/conf_configure_conf.ini", 1);
$lk->add_link("modules/admin/configure_page.php?conf_name=conf.d/modules/conf_configure_page.ini", 1);
$lk->add_link("modules/admin/configure_lang.php?conf_name=conf.d/modules/conf_configure_lang.ini", 1);
$lk->add_link("modules/admin/configure_theme.php?conf_name=conf.d/modules/conf_configure_theme.ini", 1);
$lk->add_link("modules/admin/configure_tab.php?conf_name=conf.d/modules/conf_configure_tab.ini", 1);
$lk->add_link("modules/admin/config_all.php?conf_name=conf.d/modules/conf_all.ini", 1);
print($lk->open_module_tab(0));



$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/config_front_page.php?conf_name=conf.d/modules/conf_front_page.ini", 1);
$lk->add_link("modules/admin/config_menu.php?conf_name=conf.d/modules/conf_menu.ini", 1);
$lk->add_link("modules/admin/config_template.php?conf_name=conf.d/modules/conf_template.ini", 1);

$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=tab&middle2=", "", $cmr->translate("Policy tab"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=query&middle2=", "", $cmr->translate("Policy query"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=module&middle2=", "", $cmr->translate("Policy module"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=lib&middle2=", "", $cmr->translate("Policy lib"));

$lk->add_link("modules/admin/config_default_conf.php?conf_name=conf.d/modules/conf_default_conf.ini", 1);
$lk->add_link("modules/admin/config_default_page.php?conf_name=conf.d/modules/conf_default_page.ini", 1);
$lk->add_link("modules/admin/config_default_lang.php?conf_name=conf.d/modules/conf_default_lang.ini", 1);
$lk->add_link("modules/admin/config_default_theme.php?conf_name=conf.d/modules/conf_default_theme.ini", 1);
$lk->add_link("modules/menu_config.php?conf_name=conf.d/modules/conf_config.ini", 1);
print($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="site_map_div">
<table border="0" align="left" >
<tr valign="top">
<td align="left">
 <?php
$cols = "0";

$dir = opendir($cmr->get_path("conf") . "conf.d/");

print("<hr />");
echo "<ul style=\"text-align:left;\" >";
$cols++;

while ($file = readdir($dir)){
    $file_name = $cmr->get_path("conf") . "conf.d/" . $file;
    if(($file != ".") && ($file != "..") && ($file != ".htaccess") && ($file != "index.html") && (is_file($file_name))){
        print("<li>" . $cmr->module_link($cmr->get_path("module") . "modules/load_configure.php?file_name=" . $file_name, "", $file) . "</li>");
    };
}


$dir = opendir($cmr->get_path("conf") . "conf.d/");
while ($file = readdir($dir)){
    $file_name = $cmr->get_path("conf") . "conf.d/" . $file;
    if(($file != ".") && ($file != "..") && (is_dir($file_name))){
        print("<br /><hr /><br />");
        print("<li>" . $file_name . "</li>");
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // @@@@@@@@@@@@@@@@ Reading the sub folder @@@@@@@@@@@@@@@@@@
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        $cols++;
        $dir1 = opendir($file_name);
        echo "<ul style=\"text-align:left;\" >";
        while ($file1 = readdir($dir1)){
            $file_name1 = $cmr->get_path("conf") . "conf.d/" . $file . "/" . $file1 . "/" ;
    		if(($file1 != ".") && ($file1 != "..") && ($file1 != ".htaccess") && ($file1 != "index.html") && (is_file($file_name1))){
                print("<li>" . $cmr->module_link($cmr->get_path("module") . "modules/load_configure.php?file_name=" . $file_name1, "", $file1) . "</li>");
            };
        }
            print("</ul>");
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    };
    print("</ul>");
}

?>
 </td></tr>
 </table>
</div>
<?php  
print($lk->close_module_tab());
print($division->close());
?>

