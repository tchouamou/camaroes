<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * configure_page.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























configure_page.php,Ver 3.0  2011-Sep-Wed 12:32:30  
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
print($lk->open_module_tab(1));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/config_front_page.php?conf_name=conf.d/modules/conf_front_page.ini", 1);
$lk->add_link("modules/admin/config_menu.php?conf_name=conf.d/modules/conf_menu.ini", 1);
$lk->add_link("modules/admin/config_template.php?conf_name=conf.d/modules/conf_template.ini", 1);

$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=tab&middle2=", "", $cmr->translate("Policy tab"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=query&middle2=", "", $cmr->translate("Policy query"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=module&middle2=", "", $cmr->translate("Policy module"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=get&middle2=", "", $cmr->translate("Policy get"));

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

    
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // @@@@@@@@@@@@@@@@ Reading the sub folder @@@@@@@@@@@@@@@@@@
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        print("<br /><hr /><b>" .$cmr->translate("groups"). "</b><hr /><br />");
        echo "<ul style=\"text-align:left;\" >";
        $dir1 = opendir($cmr->get_path("home") . "home/groups/");

        while ($file1 = readdir($dir1)){
            $file_name1 = $cmr->get_path("home") . "home/groups/" . $file1 ;
		    if(($file1 != ".") && ($file1 != "..") && (is_dir($file_name1))){
	            
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		        echo "<ul style=\"text-align:left;\" >";
		
		        $dir3 = opendir($file_name1);
		        print("<li><b>" .$file1. "</b></li>");
		
		        while ($file3 = readdir($dir3)){
		            $file_name3 = $cmr->get_path("home") . "home/groups/" . $file1 . "/" . $file3;
				    if(($file3 != ".") && ($file3 != "..") && ($file3 != ".htaccess") && ($file3 != "index.html") && ($file3) && (is_file($file_name3))){
		                print("<li>" . $cmr->module_link($cmr->get_path("module") . "modules/load_configure.php?file_name=" . $file_name3, "", $file3) . "</li>");
		            };
		            print("</ul>");
		        }
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			                        
                
             };
            print("</ul>");
        }
    
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // @@@@@@@@@@@@@@@@ Reading the sub folder @@@@@@@@@@@@@@@@@@
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        print("<br /><hr /><b>" .$cmr->translate("users"). "</b><hr /><br />");
        echo "<ul style=\"text-align:left;\" >";
        $cols = 0;
        $dir2 = opendir($cmr->get_path("home") . "home/users/");

        while ($file2 = readdir($dir2)){
            $cmr->post_var["file_name2"] = $cmr->get_path("home") . "home/users/" . $file2 ;
		    if(($file2 != ".") && ($file2 != "..") && ($file2 != ".htaccess") && ($file2 != "index.html") && ($file2) && (is_dir($cmr->post_var["file_name2"]))){
	            
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		        echo "<ul style=\"text-align:left;\" >";
		        $cols++;
		
		        $dir4 = opendir($cmr->post_var["file_name2"]);
		        print("<li><b>" .$file2. "</b></li>");
		
		        while ($file4 = readdir($dir4)){
		            $file_name4 = $cmr->get_path("home") . "home/users/" . $file2 . "/" . $file4;
				    if(($file4 != ".") && ($file4 != "..") && ($file4 != ".htaccess") && ($file4 != "index.html") && ($file4) && (is_file($file_name4))){
		                print("<li>" . $cmr->module_link($cmr->get_path("module") . "modules/load_configure.php?file_name=" . $file_name4, "", $file4) . "</li>");
		            };
		            print("</ul>");
		        }
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
     
           };
            print("</ul>");
        }
    
// }

?>
</td>
</tr>
</table>
</div>
<?php  
print($lk->close_module_tab());
print($division->close());
?>

