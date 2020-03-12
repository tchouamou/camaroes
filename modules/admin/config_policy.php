<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * config_policy.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










config_policy.php,Ver 3.0  2011-May-Thu 03:42:05
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
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type")) die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$policy_mode = get_post("policy_mode");
if(empty($policy_mode)) $policy_mode = $cmr->post_var["policy_mode"];
$text_key = "cmr_" . $policy_mode . "_type_";


$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] =  $cmr->translate($mod->base_name . " for " . $policy_mode);

// $division->module["text"] = "";


















echo $division->show_noclose();

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=tab&middle2=", "", $cmr->translate("Policy tab"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=query&middle2=", "", $cmr->translate("Policy query"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=module&middle2=", "", $cmr->translate("Policy module"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=get_data&middle2=", "", $cmr->translate("Policy get"));
$lk->add_link("modules/admin/config_all.php?conf_name=conf.d/modules/conf_all.ini", 1);
print($lk->open_module_tab(0));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/config_front_page.php?conf_name=conf.d/modules/conf_front_page.ini", 1);
$lk->add_link("modules/admin/config_menu.php?conf_name=conf.d/modules/conf_menu.ini", 1);
$lk->add_link("modules/admin/config_template.php?conf_name=conf.d/modules/conf_template.ini", 1);


$lk->add_link("modules/admin/config_default_conf.php?conf_name=conf.d/modules/conf_default_conf.ini", 1);
$lk->add_link("modules/admin/config_default_page.php?conf_name=conf.d/modules/conf_default_page.ini", 1);
$lk->add_link("modules/admin/config_default_lang.php?conf_name=conf.d/modules/conf_default_lang.ini", 1);
$lk->add_link("modules/admin/config_default_theme.php?conf_name=conf.d/modules/conf_default_theme.ini", 1);

$lk->add_link("modules/admin/configure_conf.php?conf_name=conf.d/modules/conf_configure_conf.ini", 1);
$lk->add_link("modules/admin/configure_page.php?conf_name=conf.d/modules/conf_configure_page.ini", 1);
$lk->add_link("modules/admin/configure_lang.php?conf_name=conf.d/modules/conf_configure_lang.ini", 1);
$lk->add_link("modules/admin/configure_theme.php?conf_name=conf.d/modules/conf_configure_theme.ini", 1);
$lk->add_link("modules/admin/configure_tab.php?conf_name=conf.d/modules/conf_configure_tab.ini", 1);
$lk->add_link("modules/menu_config.php?conf_name=conf.d/modules/conf_config.ini", 1);
print($lk->list_link());

(cmr_search("^\+all", $cmr->config[$text_key . "0"])) ? $default0 = "+all" : $default0 = "-all";
(cmr_search("^\+all", $cmr->config[$text_key . "1"])) ? $default1 = "+all" : $default1 = "-all";
(cmr_search("^\+all", $cmr->config[$text_key . "2"])) ? $default2 = "+all" : $default2 = "-all";
(cmr_search("^\+all", $cmr->config[$text_key . "3"])) ? $default3 = "+all" : $default3 = "-all";
(cmr_search("^\+all", $cmr->config[$text_key . "4"])) ? $default4 = "+all" : $default4 = "-all";
(cmr_search("^\+all", $cmr->config[$text_key . "5"])) ? $default5 = "+all" : $default5 = "-all";
(cmr_search("^\+all", $cmr->config[$text_key . "6"])) ? $default6 = "+all" : $default6 = "-all";
(cmr_search("^\+all", $cmr->config[$text_key . "7"])) ? $default7 = "+all" : $default7 = "-all";


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div class="form" id="config_policy_div">


<form  action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_config_policy.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . $policy_mode . "\" name=\"cmr_policy\" />"));?>

<fieldset class="bubble"><legend><?php  print($cmr->translate("destination:"));?></legend>
<table border="1" align="center" >
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("to user"));?>:
	<select name="dest_user" width="200">
	<?php 
	print("<option value=\"\">" . $cmr->translate("default") . "</option>");
	print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email,state", "column", $cmr->get_conf("db_name"), "email", $cmr->get_conf("cmr_max_view"), "email", "50"));
	?>
	</select>
 </td>
 </tr>
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("to group"));?>:
	<select name="dest_group" width="200">
	<?php 
	print("<option value=\"\">" . $cmr->translate("default") . "</option>");
	print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "name,state", "column", $cmr->get_conf("db_name"), "name", $cmr->get_conf("cmr_max_view"), "name", "35") );
	?>
	</select>
 </td>
 </tr>
</table>
</fieldset>

<fieldset class="bubble"><legend><?php  print($cmr->translate("default value:"));?></legend>
<table border="1" align="center" >
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("type 0"));?>:
	<select name="default0" width="200">
	<option value="<?php  print($default0);?>"><?php  print($cmr->translate($default0));?></option>
	<option value="-all"><?php  print($cmr->translate("deny from all"));?></option>
	<option value="+all"><?php  print($cmr->translate("allow from all"));?></option>
	</select>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("type 1"));?>:
	<select name="default1" width="200">
	<option value="<?php  print($default1);?>"><?php  print($cmr->translate($default1));?></option>
	<option value="-all"><?php  print($cmr->translate("deny from all"));?></option>
	<option value="+all"><?php  print($cmr->translate("allow from all"));?></option>
	</select>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("type 2"));?>:
	<select name="default2" width="200">
	<option value="<?php  print($default2);?>"><?php  print($cmr->translate($default2));?></option>
	<option value="-all"><?php  print($cmr->translate("deny from all"));?></option>
	<option value="+all"><?php  print($cmr->translate("allow from all"));?></option>
	</select>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("type 3"));?>:
	<select name="default3" width="200">
	<option value="<?php  print($default3);?>"><?php  print($cmr->translate($default3));?></option>
	<option value="-all"><?php  print($cmr->translate("deny from all"));?></option>
	<option value="+all"><?php  print($cmr->translate("allow from all"));?></option>
	</select>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("type 4"));?>:
	<select name="default4" width="200">
	<option value="<?php  print($default4);?>"><?php  print($cmr->translate($default4));?></option>
	<option value="+all"><?php  print($cmr->translate("allow from all"));?></option>
	<option value="-all"><?php  print($cmr->translate("deny from all"));?></option>
	</select>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("type 5"));?>:
	<select name="default5" width="200">
	<option value="<?php  print($default5);?>"><?php  print($cmr->translate($default5));?></option>
	<option value="+all"><?php  print($cmr->translate("allow from all"));?></option>
	<option value="-all"><?php  print($cmr->translate("deny from all"));?></option>
	</select>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("type 6"));?>:
	<select name="default6" width="200">
	<option value="<?php  print($default6);?>"><?php  print($cmr->translate($default6));?></option>
	<option value="+all"><?php  print($cmr->translate("allow from all"));?></option>
	<option value="-all"><?php  print($cmr->translate("deny from all"));?></option>
	</select>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("type 7"));?>:
	<select name="default7" width="200">
	<option value="<?php  print($default7);?>"><?php  print($cmr->translate($default7));?></option>
	<option value="+all"><?php  print($cmr->translate("allow from all"));?></option>
	<option value="-all"><?php  print($cmr->translate("deny from all"));?></option>
	</select>
 </td>
 </tr>

 </table>
</fieldset>





<br />
<?php
$array_policy = array();

switch($policy_mode){
	case "tab":
	$dir_path = $cmr->get_path("tab") . "page/";
    $dir = @opendir($dir_path);
    while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..") && (is_dir($dir_path . "/" . $file))){
	    $array_policy[] = trim($file);
    }
	}
	break;
	//----------------------
	    
	//----------------------
	case "get_data":
	$dir_path = $cmr->get_path("get_data") . "get_data";
    $dir = @opendir($dir_path);
    while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..") && ($file != ".htaccess") && ($file != "index.html") && (is_file($dir_path . "/" . $file))){
	    $array_policy[] = trim($file);
    }
	}
	break;
	//----------------------
	    
	//----------------------
	case "query":
	    $array_policy = array("select", "insert", "update", "delete", "replace", "show", "alter", "lock", "unlock", "explain", "optimize", "check", "repair", "grant", "revoke", "drop", "create");
        $array_table = sql_run("array", $cmr->db_connection, "show_tables", "", $cmr->get_conf("db_name"));
        foreach($array_table[0] as $key => $value){
	        $array_policy[] = $value . ":select";
	        $array_policy[] = $value . ":insert";
	        $array_policy[] = $value . ":update";
	        $array_policy[] = $value . ":delete";
        }
	break;
	//----------------------
	    
	//----------------------
	case "module":
	default:
	$dir_path = $cmr->get_path("module") . "modules";
    $dir = @opendir($dir_path);
    while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..") && ($file != ".htaccess") && ($file != "index.html") && (is_file($dir_path . "/" . $file))){
	    $array_policy[] = trim($file);
    }
	}
	break;
	//----------------------
	}

//----------------------
       sort($array_policy, SORT_STRING);
//----------------------
    
//----------------------
	$options_type = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "type", "type");
//----------------------
    
//----------------------
        ?>
        
        <table border="1" width="100%" class="normal_text"  cellspacing="3" cellpadding="3" >
        <tr>
        <th colspan="3"><?php echo $cmr->translate("Policy for " . $policy_mode);?></th>
        </tr>
        
        <tr>
        <td><b></b></td>
        <td><b><?php echo $cmr->translate($policy_mode);?></b></td>
        <td><b><?php echo $cmr->translate(" type");?></b></td>
        </tr>
                    
        <?php 
        $key = 0;
        while (!empty($array_policy[$key]) || ($key < 1)){
//----------------------
//             $type[$array_policy[$key]] = "";
            if(cmr_search($array_policy[$key], $cmr->config[$text_key . "0"])) $type[$array_policy[$key]] = "0_guest";
            if(cmr_search($array_policy[$key], $cmr->config[$text_key . "1"])) $type[$array_policy[$key]] = "1_contact";
            if(cmr_search($array_policy[$key], $cmr->config[$text_key . "2"])) $type[$array_policy[$key]] = "2_client";
            if(cmr_search($array_policy[$key], $cmr->config[$text_key . "3"])) $type[$array_policy[$key]] = "3_user";
            if(cmr_search($array_policy[$key], $cmr->config[$text_key . "4"])) $type[$array_policy[$key]] = "4_tecnician";
            if(cmr_search($array_policy[$key], $cmr->config[$text_key . "5"])) $type[$array_policy[$key]] = "5_operator";
            if(cmr_search($array_policy[$key], $cmr->config[$text_key . "6"])) $type[$array_policy[$key]] = "6_admin";
            if(cmr_search($array_policy[$key], $cmr->config[$text_key . "7"])) $type[$array_policy[$key]] = "7_developer";
//----------------------
                print("<tr>");
                print("<td>" . $key . "</td>");
                
                print("<td>");
//                 if(empty($array_image[$key])) $array_image[$key] = "";
//                 print("<img border=\"0\" alt=\"=>\" src=\"" . $cmr->get_path("www") . "images/icon/" . $array_image[$key] . "\" />");
                print($array_policy[$key]);
                print("<input type=\"hidden\" value=\"" . $array_policy[$key] . "\" name=\"policy_" . $key . "\" />");
                print("</td>");
                
                
                print("<td>");
                print("<select name=\"type_" . $key . "\">");
                print("<option value=\"" . $type[$array_policy[$key]] . "\">" . $cmr->translate($type[$array_policy[$key]]) . "</option>");
                print("" . $options_type . "");
                print("</select>");
                print("</td>");
                
                print("</tr>");
        $key++;
       }

?>
        </table>
<p align="center">
<input class="submit" type="submit" value="<?php echo  $cmr->translate("save policy");?>" onclick="return confirm('<?php print($cmr->translate("sure to change policy"));?>')"/>
</p>
</form>

</div>

<?php 
print($lk->close_module_tab());
print($division->close());
?>