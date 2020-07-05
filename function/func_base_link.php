<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_asset.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























func_asset.php,Ver 3.0  2011-Oct-Sat 23:42:49
*/


/*=================================================================*/
/*=================================================================*/
/**
 * code_href()
 *
 * @param mixed $mod_name
 * @param integer $cod
 * @param string $param
 * @param string $keys
 * @param string $vals
 * @param string $link_layer
 * @return
 **/
if(!(function_exists("code_href"))){
function code_href($cmr_config = array(), $cmr_page = array(), $mod_name, $param = "", $keys = "", $vals = "", $link_layer = "middle1")
{
    $final_keys = $keys;
    $final_vals = $vals;
	if(empty($cmr_config)) $cmr_config = cmr_get_config();

// 	is_numeric($base_url) ? $base_url="index.php?";
// 	page_title=
    if(($mod_name != "") || ($param != "") && (accept_mod($cmr_config, array(), $mod_name))){
// 	    $module = parse_module($mod_name); // parse_url()
// 	    (empty($param)) ? $str_module=$mod_name . "&" . $vals : $str_module=$mod_name . "?" . $param . "&" . $vals;
	    (empty($param)) ? $str_module=$mod_name . "&" . $vals : $str_module=$mod_name . "&" . $param . "&" . $vals;

        $final_keys = $link_layer . $keys;
        $final_vals = $str_module;
    }else{
// 		secure_return_href($cmr_config["cmr_secure_mode"], $PHP_SELF);
		$final_vals = "modules/guest/security.php&module_message=" . $mod_name;
	    }

// 	$to_return = $base_url . "&amp;keys=" . encode_url($cmr_config, $final_keys) . "&amp;vals=" . encode_url($cmr_config,  $final_vals);
	$to_return = "index.php?module_name=" . $final_vals;


//    	return $to_return;
   	return secure_return_href($cmr_config["cmr_secure_mode"], $to_return);
}
}

/*=================================================================*/
/*=================================================================*/
/**
 * code_link()
 *
 * @param mixed $mod_name
 * @param string $image
 * @param string $text
 * @param string $img_heigth
 * @param string $img_right
 * @param string $link_layer
 * @param string $other_a_link
 * @return
 **/
if(!(function_exists("code_link"))){
function code_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $modulename, $image = "", $text = "", $img_heigth = "20", $img_right = "90", $link_layer = "middle1", $other_a_link = "")
{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $a_link = "";
    $module_array = parse_module($modulename);// parse_url()
//  $module_array["name"] = strtolower($module_array["name"]);
    (empty($text)) ? $link_title = $module_array["title"] : $link_title = htmlentities($text);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $a_link .= "<a title=\"" . $link_title . "\" href=\"";
        $a_link .= code_href($cmr_config, $cmr_page, $module_array["name"] . "." . $module_array["extension"], $module_array["param"], "", "", $link_layer);
        $a_link .= "\" " . $other_a_link . " >";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(($image) && ($cmr_config["cmr_use_button"])){
             $a_link .= try_create_image($cmr_config, $cmr_page, $module_array["name"], $module_array["title"], $cmr_page["language"], $img_heigth, $img_right, $image);
	    }else{
	         $a_link .= language_text($text, $module_array["title"]); //--with the good language --
	    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $a_link .= "</a>";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    return $a_link;
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * file_link()
 *
 * @param mixed $the_file
 * @return
 **/
if(!(function_exists("file_link"))){
function file_link($the_file, $links = "")
{
    $the_file = str_replace("\\", "/", $the_file);
    $file_name = substr($the_file, strrpos($the_file, "/"));
    $file_name = str_replace("/", "", $file_name);
    $already_exist = false;
    $url_file = md5($the_file);



    $_SESSION[$url_file] = $the_file;
    if($links){
    return "<a class=\"cmr_link\" href=\"index.php?conf=com_download&current_file=" . $url_file . "\" >" . $links . "</a>";
	}else{
    return "<a class=\"cmr_link\" href=\"index.php?conf=com_download&current_file=" . $url_file . "\" >" . $file_name . "</a>";
	}
    // return "<a class=\"cmr_link\" href=\"download.php?cod=1&path=".encode_url($cmr_config,  $the_file)."\" >".$file_name."</a>";




    }
}
/*=================================================================*/
/*=================================================================*/
/**
 * list_file_link()
 *
 * @param mixed $list_file
 * @param string $separator
 * @return
 **/
if(!(function_exists("list_file_link"))){
function list_file_link($list_file, $separator = ":", $links = "")
{
    $list_file_link = "";
    @ $array_file = explode($separator, $list_file);

    if($array_file){
        foreach($array_file as $the_file){
            $list_file_link .= file_link($the_file, $links) . $separator;
        }
    }

    return $list_file_link;
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * list_attach_link()
 *
 * @param mixed $list_file
 * @return
 **/
if(!(function_exists("list_attach_link"))){
function list_attach_link($list_file, $links="", $separator = ":")
{
    return list_file_link($list_file, $separator, $links);
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * date_link()
 *
 * @param mixed $send_date
 * @return
 **/
if(!(function_exists("date_link"))){
function date_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $times)
{
    $send_date=conv_timestamp(strval($times));
    return code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_date.php?send_date=" . urlencode($times), "", $send_date);
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * user_info_link()
 *
 * @param mixed $id_user_email
 * @return
 **/
if(!(function_exists("user_info_link"))){
function user_info_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $id_user_email, $extend = "")
{
    // $id_user_email=urlencode( $id_user_email);
    if($id_user_email){
        $user_link = code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_user.php?id_user_email=$id_user_email", "", $id_user_email);

        if($extend){
            $user_id = return_key($cmr_config, cmr_get_user(), cmr_get_db_connection(), "cmr_user", "id", "email", $id_user_email);

            $user_link = "<input type=\"checkbox\" name=\"user_check_" . $user_id . "\" value=\"" . $user_id . "\" />" . $user_link;
            $user_link .= " [" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_user.php?id_user=" . $user_id, "", "<b class=\"link\">" . $cmr_language['update'] . "</b>");
            $user_link .= " - ";
            $user_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/change_pw.php?id_user=" . $user_id, "", "<b class=\"link\">" . $cmr_language['change_pw'] . "</b>");
            $user_link .= " - ";
            $user_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?table_name=user&line_id=" . $user_id, "", "<b class=\"link\">" . $cmr_language['comment'] . "</b>");
            $user_link .= " - ";
            $user_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?table_name=user&line_id=" . $user_id, "", "<b class=\"link\">" . $cmr_language['policy'] . "</b>") . "]";
            // $user_link.=" - ";
            // $user_link.=code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_user.php", "", "<b class=\"link\">".$cmr_language['new']."</b>");
        }
    }
    return $user_link;
} /*=================================================================*/
} /*=================================================================*/

/**
 * list_user_link($cmr_config, $cmr_page, $cmr_language)
 *
 * @param mixed $list_user_email
 * @param string $separator
 * @param string $extend
 * @return
 **/
if(!(function_exists("list_user_link"))){
function list_user_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $list_user_email, $separator = ",| ", $extend = "")
{
    $list_user_link = "";
    foreach(cmr_split($separator, $list_user_email) as $email){
        if(cmr_search("@", $email)){
            $list_user_link .= user_info_link($cmr_config, $cmr_page, $cmr_language, $email, $extend) . ", ";
        }
    }
    return $list_user_link;
} /*=================================================================*/
} /*=================================================================*/
/**
 * group_info_link()
 *
 * @param mixed $group_name
 * @param string $extend
 * @return
 **/
if(!(function_exists("group_info_link"))){
function group_info_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $group_name, $extend = "")
{
    $group_link = "";
    if($group_name){
        $group_link = code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_groups.php?group_name=$group_name", "", $group_name);

        if($extend){
            $group_id = return_key($cmr_config, cmr_get_user(), cmr_get_db_connection(), $cmr_config["cmr_table_prefix"] . "groups", "id", "name", $group_name);

            $group_link = "<input type=\"checkbox\" name=\"group_check_" . $group_id . "\" value=\"" . $group_id . "\" />" . $group_link;
            $group_link .= " [" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/admin/update_groups.php?id_groups=" . $group_id, "", "<b class=\"link\">" . $cmr_language['update'] . "</b>");
            $group_link .= " - ";
            $group_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?table_name=groups&line_id=" . $group_id, "", "<b class=\"link\">" . $cmr_language['comment'] . "</b>");
            $group_link .= " - ";
            $group_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?table_name=groups&line_id=" . $group_id, "", "<b class=\"link\">" . $cmr_language['policy'] . "</b>") . "]";
            // $group_link.=" - ";
            // $group_link.=code_link($cmr_config, $cmr_page, $cmr_language, "modules/admin/new_groups.php", "", "<b class=\"link\">".$cmr_language['new']."</b>");
        }
    }
    return $group_link;
} /*=================================================================*/
} /*=================================================================*/
/**
 * list_group_link($cmr_config, $cmr_page, $cmr_language)
 *
 * @param mixed $list_group_name
 * @param string $separator
 * @param string $extend
 * @return
 **/
if(!(function_exists("list_group_link"))){
function list_group_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $list_group_name, $separator = ",", $extend = "")
{
    $list_group_link = "";
    foreach(explode($separator, $list_group_name) as $group_name){
        $list_group_link .= group_info_link($cmr_config, $cmr_page, $cmr_language,str_replace("'", "", $group_name), $extend) . $separator;
    }
    return $list_group_link;
} /*=================================================================*/
} /*=================================================================*/
/**
 * list_user_groups_link($cmr_config, $cmr_page, $cmr_language,)
 *
 * @param mixed $list_user_groups_name
 * @param string $separator
 * @param string $extend
 * @return
 **/
if(!(function_exists("list_user_groups_link"))){
function list_user_groups_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $list_user_groups_name, $separator = ",", $extend = "")
{
    $list_user_groups_link = "";
    foreach(explode($separator, $list_user_groups_name) as $user_groups){
        if(cmr_search("@", $user_groups)){
            $list_user_groups_link .= user_info_link($cmr_config, $cmr_page, $cmr_language,$user_groups, $extend) . $separator;
        }else{
            $list_user_groups_link .= group_info_link($cmr_config, $cmr_page, $cmr_language, $user_groups, $extend) . $separator;
        }
    }
    return $list_user_groups_link;
} /*=================================================================*/
} /*=================================================================*/
/**
 * module_link()
 *
 * @param mixed $modules
 * @return
 **/
if(!(function_exists("module_link"))){
function module_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $modules)
{
    return code_link($cmr_config, $cmr_page, $cmr_language, $modules);
} /*=================================================================*/
} /*=================================================================*/
/**
 * list_module_link()
 *
 * @param mixed $modules
 * @return
 **/
if(!(function_exists("list_module_link"))){
function list_module_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $list_module, $separator = ",")
{
    $list_module = "";
    foreach(explode($separator, $list_module) as $module){
        $list_modules .= module_link($cmr_config, $cmr_page, $cmr_language, str_replace("'", "", $module)) . $separator;
    }
    return $list_modules;
} /*=================================================================*/
} /*=================================================================*/
/**
 * date_time_link()
 *
 * @param mixed $date_time
 * @return
 **/
if(!(function_exists("date_time_link"))){
function date_time_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $date_time)
{
    return date_link($cmr_config, $cmr_page, $cmr_language,  $date_time);
} /*=================================================================*/
} /*=================================================================*/
/**
 * type_link()
 *
 * @param mixed $type
 * @return
 **/
if(!(function_exists("type_link"))){
function type_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $type)
{
    return $type;
} /*=================================================================*/
} /*=================================================================*/
/**
 * list_type_link($cmr_config, $cmr_page, $cmr_language)
 *
 * @param mixed $list_type
 * @param string $separator
 * @param string $extend
 * @return
 **/
if(!(function_exists("list_type_link"))){
function list_type_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $list_type, $separator = ",", $extend = "")
{
    $list_type_link = "";
    foreach(explode($separator, $list_type) as $type){
        $list_type_link .= type_link($cmr_config, $cmr_page, $cmr_language,str_replace("'", "", $type), $extend) . $separator;
    }
    return $list_type_link;
} /*=================================================================*/
} /*=================================================================*/
/**
 * client_link()
 *
 * @param mixed $client_name
 * @param string $extend
 * @return
 **/
if(!(function_exists("client_link"))){
function client_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $client_name, $extend = "")
{
    return group_info_link($cmr_config, $cmr_page, $cmr_language, $client_name, $extend);
} /*=================================================================*/
} /*=================================================================*/
/**
 * asset_link()
 *
 * @param mixed $asset_id
 * @param string $extend
 * @return
 **/
// function asset_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $asset_id, $extend = "")
// {
//     $asset_id = code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_asset_ticket.php?asset_name=$asset_id", "", $asset_id);
//     return $asset_id;
// } /*=================================================================*/
/*=================================================================*/
/*=================================================================*/
if(!function_exists("menu_tree_link")){
function menu_tree_link($tolink, $cmr_config = array(), $cmr_language = array(), $cmr_page=array()){
	return code_href(cmr_get_config(), cmr_get_page(), $tolink) . "|";
	}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("show_next_preview_bar"))){
function show_next_preview_bar($cmr_config = array(), $cmr_language = array(), $cmr_page = array(), $module, $current_page, $num_page, $current_layer = "middle1", $params="")
{
    $class_module["base_name"] = substr($module, 0, strpos($module, "."));
//     $current_layer = "middle1";

    $preview_page = $current_page;
    $next_page = $current_page;
	 if($current_page > 0) $preview_page = $current_page - 1;
	 if($current_page < $num_page) $next_page = $current_page + 1;

    $str = "<p align=\"center\">";
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $class_module["base_name"] . "_page=0", cmr_get_path("www") . "images/icon/go_first_icon.png", "<<", 16, 16, $current_layer, " title=\"" . (cmr_translate("Begin")) . "\"");
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $class_module["base_name"] . "_page=" . $preview_page, cmr_get_path("www") . "images/icon/go_previous_icon.png", "<", 16, 16, $current_layer, " title=\"" . (cmr_translate("Before")) . "\"");

    $current_page = $current_page;
    $ic = 0;
    while (($current_page < $num_page) && ($ic < 9)){
        $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $class_module["base_name"] . "_page=" . $current_page . $params, "", " " . ($current_page + 1), "", "", $current_layer);
        $current_page++;
        $ic++;
    }
    if($current_page < $num_page){
        $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $class_module["base_name"] . "_page=" . $current_page . $params, "", " ...", "", "", $current_layer);
    }
    $str .= " ";
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $class_module["base_name"] . "_page=" . $next_page . $params, cmr_get_path("www") . "images/icon/go_next_icon.png", ">", 16, 16, $current_layer, " title=\"" . (cmr_translate("Next")) . "\"");
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $class_module["base_name"] . "_page=" . $num_page . $params, cmr_get_path("www") . "images/icon/go_last_icon.png", ">>", 16, 16, $current_layer, " title=\"" . (cmr_translate("Last")) . "\"");
    $str .= "</p>";
    return $str;
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * button_assign_del()
 *
 * @param mixed $module
 * @param string $view_mode
 * @return
 **/
if(!(function_exists("button_assign_del"))){
// function button_assign_del($cmr_config = array(), $cmr_language = array(), $cmr_page = array(), $cmr_post_var = array(), $module, $view_mode = "view_user_mode")
function button_assign_del($cmr_config = array(), $cmr_language = array(), $cmr_page = array(), $module, $view_mode = "view_user_mode", $module_position="middle1", $run_mode = array())
{
    $str = "";
//     $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $view_mode . "=link_refresh", cmr_get_path("www") . "images/icon/refresh_icon.png", "refresh view", 15, 20, "", "", " title=\"refresh\"");

// 	if(empty($run_mode))
	$run_mode = array("check_box", "view_link", "view_detail", "view_table", "print", "update");
   $form_id = "form_" . substr($module, 0, strpos($module, "."));
//     $str = "<p align=\"left\">";
	if(in_array("check_box", $run_mode))
    $str .= "<input type=\"checkbox\" name=\"check_" . $form_id . "\" id=\"check_" . $form_id . "\" value=\"yes\" onclick=\"check_uncheck(this.form, 'check_" . $form_id . "');\" />";
	if(in_array("view_link", $run_mode))
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $view_mode . "=link", cmr_get_path("www") . "images/icon/font_icon.png", cmr_translate("List view"), 15, 20, $module_position, "", " title=\"" . (cmr_translate("links ")) . " alt=\"" . (cmr_translate("links ")) . "\"");
	if(in_array("view_detail", $run_mode))
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $view_mode . "=link_detail", cmr_get_path("www") . "images/icon/justify_icon.png", cmr_translate("Detail view"), 15, 20, $module_position, "", " title=\"" . (cmr_translate("Details")) . " alt=\"" . (cmr_translate("Details")) . "\"");
	if(in_array("view_table", $run_mode))
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $view_mode . "=link_tab", cmr_get_path("www") . "images/icon/math_icon.png", cmr_translate("Table view"), 15, 20, $module_position, "", " title=\"" . (cmr_translate("Table")) . " alt=\"" . (cmr_translate("Table")) . "\"");
    $str .= "&nbsp;";
	if(in_array("update", $run_mode))
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $view_mode . "=link_update", cmr_get_path("www") . "images/icon/text_icon.png", cmr_translate("Update view"), 20, 20, $module_position, "", " title=\"" . (cmr_translate("Update")) . " alt=\"" . (cmr_translate("Update")) . "\"");
    $str .= "&nbsp;";
	if(in_array("print", $run_mode))
    $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $view_mode . "=link_print", cmr_get_path("www") . "images/icon/print_icon.png", cmr_translate("Print view"), 20, 20, $module_position, "", " title=\"" . (cmr_translate("Print")) . " alt=\"" . (cmr_translate("Print")) . "\"");
    $str .= "&nbsp;";



	if(in_array("delete", $run_mode)){
    $str .= "<input type=\"image\" src=\"".cmr_get_path("www") . "images/icon/delete_icon.png\" ";
    $str .= " onclick=\"return confirm_check_action(this.form,'" . (cmr_translate("Delete object selected ?")) . "',";
    $str .= " 'check_action','delete');\"  title=\"".(cmr_translate("Delete")). "\" />";
	}

//     $str .= code_link($cmr_config, $cmr_page, $cmr_language, $module . "?" . $view_mode . "=link_pdf", cmr_get_path("www") . "images/icon/pdf_icon.png", "pdf list view", 15, 20, "", "", " title=\""
//     . (cmr_translate("View pdf Mode"))."\"");




//     $str .= "</p>";
    return $str;
}
}
/*=================================================================*/
if(!(function_exists("cmr_link_default"))){
    /**
     * cmr_link_default()
     *
     * @param mixed $val
     * @param string $extend
     * @param array $num_view
     * @return
     **/
    function cmr_link_default($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $val)
    {
		$table_style = "";
        $table_link = "";
	    $table = $cmr_page["__table__"];
	    $column_id = $val[$cmr_config["column_id_" . $table]];
	    $num_view = $cmr_page["__number__"];
        if(empty($GLOBALS["" . $table . "_read"])) $GLOBALS["" . $table . "_read"] = array();
	    $table_read = $GLOBALS["" . $table . "_read"];


	      if($column_id){
	        $table_link = input_hidden("<input type=\"checkbox\" name=\"" . $table . "_check_" . $num_view . "\" value=\"" . $val[$cmr_config["column_id_" . $table]] . "\" />");

	        $image1 = cmr_get_path("image") . "images/icon/readed_icon.png";
	        $image2 = cmr_get_path("image") . "images/icon/to_read_icon.png";

            if($image2) $table_link .= "<img  alt=\"<\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("unreaded")  . "\" />";
	        $table_style .= " class=\"unreaded\" ";

	        if(in_array ($column_id, $table_read)){
	            if($image1) $table_link .= "<img alt=\">\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("readed")  . "\" />";
		        $table_style .= " class=\"readed\" ";
	        };

	        if((isset($GLOBALS["current_" . $table . "_id"])) && ($column_id == $GLOBALS["current_" . $table . "_id"]))
	        $table_style .= " class=\"current\" ";

            $table_link .= "<b>" . (trim(substr(show_column_value($cmr_config["column1_" . $table], $val[$cmr_config["column1_" . $table]]), 0, 20))) . "</b>";
            $table_link .= ":";
            if(isset($val[$cmr_config["column2_" . $table]])) $table_link .= (trim(substr(show_column_value($cmr_config["column2_" . $table], $val[$cmr_config["column2_" . $table]]), 0, 20)));
            $table_link .= "<i>";

        	empty($val["the_date"]) ? $times = strval($val[$cmr_config["column_date_time1_" . $table]]) : $times = $val["the_date"];
            if(isset($times)) $table_link .= "[" . date_link($cmr_config, $cmr_page, $cmr_language, $times) . "] ";
            if(isset($val[$cmr_config["column_text1_" . $table]])) $table_link .= "(" . (trim(substr(show_column_value($cmr_config["column1_" . $table], $val[$cmr_config["column_text1_" . $table]]), 0, 20))) . ")";
            $table_link .= "</i>";
            $table_link .= "<br />";


            $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_" . $table . ".php?id_" . $table . "=" . $val[$cmr_config["column_id_" . $table]], "", $val[$cmr_config["column2_" . $table]], "", "", "", $table_style);

            cmr_set_session("pre_match",  cmr_get_session("pre_match") . $table . "_check_" . $val[$cmr_config["column_id_" . $table]] . "@,@.*@,@10@;@");

        }
        return $table_link . "<br />";
    }
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("cmr_link_tab"))){
    /**
     * " . $table . "_tab_link()
     *
     * @param mixed $val
     * @return
     **/
    function cmr_link_tab($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
        $table_link = "";
	    $table_style = "";
	    $table = $cmr_page["__table__"];
	    $num_view = $cmr_page["__number__"];
		$array_column = $cmr_page["__array_column__"];
        $column_id = $val[$cmr_config["column_id_" . $table]];
        if(empty($GLOBALS["" . $table . "_read"])) $GLOBALS["" . $table . "_read"] = array();
	    $table_read = $GLOBALS["" . $table . "_read"];


        if($column_id){
        	$table_link .= "<td class=\"rown3\">";
        	if($cmr_page["__mode__"] == "link_print"){
        	$table_link .=  $num_view;
	    	}else{
            $table_link .=  code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_" . $table . ".php?id_" . $table . "=" . $val[$cmr_config["column_id_" . $table]], "", $num_view, "", "", "middle1");
	        }
            $table_link .= "</td>";


            $table_link .= "<td class=\"rown1\" >";
            $table_link .= input_hidden("<input type=\"checkbox\" name=\"" . $table . "_check_" . $num_view . "\" value=\"" . $val[$cmr_config["column_id_" . $table]] . "\" />");

	        $image1 = cmr_get_path("image") . "images/icon/readed_icon.png";
	        $image2 = cmr_get_path("image") . "images/icon/to_read_icon.png";

            if($image2) $table_link .= "<img  alt=\"<\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("unreaded")  . "\" />";
	        $table_style .= " class=\"unreaded\" ";

	        if(in_array ($column_id, $table_read)){
	            if($image1) $table_link .= "<img alt=\">\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("readed")  . "\" />";
		        $table_style .= " class=\"readed\" ";
	        };

	        $table_link .= "</td>";
	        if((isset($GLOBALS["current_" . $table . "_id"])) && ($column_id == $GLOBALS["current_" . $table . "_id"])){
	            $table_style .= " class=\"current\" ";
	        }
      $i_count = 1;
			foreach($array_column as $i_col => $conf_val){
                (empty($val[$conf_val])) ? $val_const = "" : $val_const = $val[$conf_val];
                $i_count++;
                $text_empty = "";
                $text_full =  code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_" . $table . ".php?id_" . $table . "=" . $val[$cmr_config["column_id_" . $table]], "", htmlentities(trim(substr($val_const, 0, 20))), "", "", "middle1", $table_style);
                if($cmr_page["__mode__"] == "link_print") $text_full =  htmlentities($val_const);
                if($cmr_page["__mode__"] == "link_update"){
	                $text_full =  "<input type=\"text\" size=\"20\" name=\"" . $table . "_" . $num_view . "_" . $conf_val . "\" value=\"" . htmlentities($val_const) . "\" >";
	                $text_empty = "<input type=\"text\" name=\"" . $table . "_" . $num_view . "_" . $conf_val . "\" value=\"\"  size=\"20\">";
                }


                $table_link .= "<td class=\"rown_" . $i_col . ($i_count % 2 + 1) . "\" >";

                if((!empty($val_const) || ($val_const == 0)) && ($val_const != null)){
	                $table_link .= $text_full;
	            }else{
	                $table_link .= $text_empty;
		        }

                $table_link .= "</td>";
            }

        	empty($val["the_date"]) ? $times = conv_timestamp(strval($val[$cmr_config["column_date_time1_" . $table]])) : $times = $val["the_date"];
            $table_link .= "<td class=\"rown" . $i_col . ($i_count % 2 + 1) . "\" >" . $times . "</td>";

            cmr_set_session("pre_match",  cmr_get_session("pre_match") . $table . "_check_" . $num_view . "@,@.*@,@10@;@");

            $table_link .= "<td class=\"rown1\" >";
        	if($cmr_page["__mode__"] != "link_print"){
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?table_name=" . $table . "&line_id=" . $column_id, "", " [C] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?table_name=" . $table . "&line_id=" . $column_id, "", " [P] ", "", "", "", " class=\"link\" ");
//                 $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_" . $table . ".php?id_" . $table . "=" . $column_id, "", " [A] ", "", "", "", " class=\"link\" ");
//                 $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_" . $table . ".php?id_" . $table . "=" . $column_id, "", " [U] ", "", "", "", " class=\"link\" ");
//                 $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_" . $table . ".php?id_" . $table . "=" . $val[$cmr_config["column_id_" . $table]], "", " [N] ", "", "", "", " class=\"link\" ");
        }
            $table_link .= "</td>";
        }
        return "<tr>" . $table_link . "</tr>";
    }
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("cmr_link_detail"))){
    /**
     * " . $table . "_link_detail()
     *
     * @param mixed $val
     * @return
     **/
    function cmr_link_detail($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
	    $table = $cmr_page["__table__"];
        $table_link_d = "<fieldset class=\"bubble\"><legend>" . $cmr_page["__number__"] . "</legend>";

        if(!empty($cmr_config["column_image1_" . $table]) && (!image_exists($val[$cmr_config["column_image1_" . $table]])))
        $table_link_d .= "<img alt=\"" . translate($cmr_config["column_image1_" . $table]) . "\" src=\"" . $val[$cmr_config["column_image1_" . $table]] . "\" class=\"cmr_image\" />";

        $table_link_d .= "<ul>";
        $table_link_d .= "<li>" . cmr_link_default($cmr_config, $cmr_page, $cmr_language, $val) . "</li>";
        $table_link_d .= "<li class=\"normal_text\">" . htmlentities(trim(wordwrap($val[$cmr_config["column_text1_" . $table]]))) . "</li>";
        $table_link_d .= "<li>[";
        $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_" . $table . ".php?id_" . $table . "=" . $val[$cmr_config["column_id_" . $table]], "", "<b class=\"link\">" . $cmr_language["update"] . "</b>");
        $table_link_d .= " - ";
        $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?table_name=" . $table . "&line_id=" . $val[$cmr_config["column_id_" . $table]], "", "<b class=\"link\">" . $cmr_language["comment"] . "</b>");
        $table_link_d .= " - ";
        $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?table_name=" . $table . "&line_id=" . $val[$cmr_config["column_id_" . $table]], "", "<b class=\"link\">" . $cmr_language["policy"] . "</b>");
//         $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_" . $table . ".php?id_" . $table . "=" . $val[$cmr_config["column_id_" . $table]], "", "<b class=\"link\">" . cmr_translate("view_all") . "</b>");
//         $table_link_d .= " - ";
//         $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_" . $table . ".php?id_" . $table . "=" . $val[$cmr_config["column_id_" . $table]], "", "<b class=\"link\">" . cmr_translate("new_" . $table) . "</b>");
        $table_link_d .= "]</li>";
        $table_link_d .= "</ul>";
        $table_link_d .= "</fieldset>";
        return "" . $table_link_d . "";
    }
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/*=================================================================*/
if(!(function_exists("line_link"))){
    /**
     * line_link()
     *
     * @param mixed $val
     * @param string $template
     * @return
     **/
function line_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val, $template)
{
// if($val_table[$cmr->config["column_id_@_table_@"]]){
// 	$view_win->prints["match_row_num"] = $num_view;
// 	$view_win->prints["match_link_update"] = $val_table["__number__"];
// 	$view_win->prints["match_link_update"] = $@_table_@_link_d .= code_link($cmr->config, $cmr->page, $cmr->language, "modules/update_@_table_@.php?id_@_table_@=" . $val[$cmr->config["column_id_@_table_@"]], "", "<b class=\"link\">" . $cmr->language["update"] . "</b>");
// 	$view_win->prints["match_link_preview"] = $@_table_@_link_d .= code_link($cmr->config, $cmr->page, $cmr->language, "modules/preview_@_table_@.php?id_@_table_@=" . $val[$cmr->config["column_id_@_table_@"]], "", "<b class=\"link\">" . $cmr->language["print"] . "</b>");
// 	$view_win->prints["match_link_delete"] = $@_table_@_link_d .= code_link($cmr->config, $cmr->page, $cmr->language, "modules/view_@_table_@.php?id_@_table_@=" . $val[$cmr->config["column_id_@_table_@"]], "", "<b class=\"link\">" . $cmr->language["delete"] . "</b>");
// 	$view_win->prints["match_value_check_box"] = input_hidden("<input type=\"checkbox\" name=\"@_table_@_check_" . $val_table["__number__"] . "\" value=\"" . $val[$cmr->config["column_id_@_table_@"]] . "\" />");
// if(in_array ($val_table[$cmr->config["column_id_@_table_@"]], $GLOBALS["@_table_@_read"])){
// 	$view_win->prints["match_source_image"] = cmr_get_path("image") . "images/icon/readed_icon.png";
//     $@_table_@_style .= " class=\"readed\" ";
// }else{
// 	$view_win->prints["match_source_image"] =  cmr_get_path("image") . "images/icon/to_read_icon.png";
//     $@_table_@_style .= " class=\"unreaded\" ";
// }

// $@_table_@_link .= "</td>";
// if((isset($GLOBALS["current_@_table_@_id"])) && ($val_table[$cmr->config["column_id_@_table_@"]] == cmr_get_global("current_@_table_@_id"))){
// $@_table_@_style .= " class=\"current\" ";
// }

// $view_win->prints["match_show_column1"] =  htmlentities(trim(substr(show_column_value($cmr_config["column1_@_table_@"], $val[$cmr_config["column1_@_table_@"]]), 0, 20))) . "</b>";
// if(isset($times)) $view_win->prints["match_link_date_time"] = date_link($cmr_config, $cmr_page, $cmr_language, $times);
// $view_win->prints["match_text_column1"] =  htmlentities(trim(substr(show_column_value($cmr_config["column1_@_table_@"], $val[$cmr_config["column2_@_table_@"]]), 0, 20)));

//
// empty($val["the_date"]) ? $times = strval($val[$cmr_config["column_date_time1_@_table_@"]]) : $times = $val["the_date"];
// if(isset($val[$cmr_config["column_text1_@_table_@"]]))
// $view_win->prints["match_text_column1"] =  htmlentities(trim(substr(show_column_value($cmr_config["column1_@_table_@"], $val[$cmr_config["column_text1_@_table_@"]]), 0, 20))) . ")";
// $view_win->prints["match_link_val"] =  code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_@_table_@.php?id_@_table_@=" . $val[$cmr_config["column_id_@_table_@"]], "", $val[$cmr_config["column2_@_table_@"]], "", "", "", $@_table_@_style);


// $i_col = 1;
// $conf_val = trim($cmr->config["column" . $i_col . "_@_table_@"]);
// while ((isset($cmr->config["column" . $i_col . "_@_table_@"])) && ($i_col <= $cmr_page["__columns__"])){
// $conf_val = trim($cmr->config["column" . $i_col . "_@_table_@"]);
// (empty($val[$conf_val])) ? $val_const = "" : $val_const = $val[$conf_val];

// $view_win->prints["match_col_num"] = ($i_col % 2 + 1);
// if((!empty($val_const) || ($val_const == 0)) && ($val_const != null)){
// 	$view_win->prints["match_link_val"] = code_link($cmr->config, $cmr->page, $cmr->language, "modules/preview_@_table_@.php?id_@_table_@=" . $val[$cmr->config["column_id_@_table_@"]], "", htmlentities(trim(substr($val_const, 0, 20))), "", "", "middle1", $@_table_@_style);
// }else{
// 	$view_win->prints["match_link_val"] = "";
// }
// $i_col++;
// }
// empty($val["the_date"]) ? $times = conv_timestamp(strval($val[$cmr->config["column_date_time1_@_table_@"]])) : $times = $val["the_date"];
// 	$view_win->prints["match_show_date_time"] = $times;
// $cmr->session["pre_match"] .= "@_table_@_check_" . $val_table["__number__"] . "@,@.*@,@10@;@";
// }
//
// return $view_win->print_template($template);
}
}

?>
