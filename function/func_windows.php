<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_windows.php
 *   ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








func_windows.php,Ver 3.0  2011-July 10:36:59
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)
 */
// function close_tab()
// function open_tab($cmr_config = array(), $cmr_page = array(), $type = "0")
// function open_module_tab($array_link = array(), $current = 1)
// function close_box($module=array())
// function open_box($cmr_page = array(), $module = array(), $themes=array())
// function change_page($cmr_page = array(), $module = array(), $themes = array(), $win_action, $win_pos)
// function remove_module($win_posx = "head", $win_posy = "1",  $cmr_page)
// function permute_module($win_pos1 = "head1", $win_pos2 = "head2",  $cmr_page)
// function insert_module($win_pos = "head1", $cmr_page, $where="")
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/../control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("insert_module"))){
    /**
     * insert_module()
     *
     * @param array $cmr_page
     * @param string $where
     * @param string $win_posx
     * @param string $win_posy
     * @return
     **/
function insert_module($win_pos = "head1", $cmr_page, $where = "")
{
    $win_posy = cmr_searchi_replace("^head|^left|^middle|^right|^foot", "", $where);
    $win_posx = cmr_searchi_replace("$win_posy" . "\$", "", $where);
	
	// shift to create space 
    $cmr_page[$win_posx . "_num_mod"]++;
    $x = $cmr_page[$win_posx . "_num_mod"];
	while($x >= $win_posy){
	if(!empty($cmr_page[$x-1])) $cmr_page[$x] = $cmr_page[$x-1];
	$x--;
	}
	
	$cmr_page[$where] = $cmr_page[$win_pos];
    return $cmr_page;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("permute_module"))){
    /**
     * permute_module()
     *
     * @param array $cmr_page
     * @param string $win_pos1
     * @param string $win_pos2
     * @return
     **/
function permute_module($win_pos1 = "head1", $win_pos2 = "head2",  $cmr_page)
{
    $pagex = $cmr_page[$win_pos2];
    $cmr_page[$win_pos2] = $cmr_page[$win_pos1];
    $cmr_page[$win_pos1] = $pagex;
    return $cmr_page;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("remove_module"))){
    /**
     * remove_module()
     *
     * @param array $cmr_page
     * @param string $win_posx
     * @param string $win_posy
     * @return
     **/
function remove_module($win_posx = "head", $win_posy = "1",  $cmr_page)
{
	// shift to empty
	while(!empty($cmr_page[$win_posx . $win_posy])){
	$cmr_page[$win_posx . $win_posy] = $cmr_page[$win_posx . ($win_posy + 1)];
	$win_posy++;
	}
	
	unset($cmr_page[$win_posx . $win_posy]);
    return $cmr_page;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("layers_init"))){
    
	function layers_init($cmr_page = array(), $code1 = "", $form = "")
	    {
// 		$cmr_page["story"] = $cmr_page["middle1"];
		if(!(($code1) || ($form))){//  @@@ important for external form @@
		empty($cmr_page["story"]) or $cmr_page["middle1"] = $cmr_page["story"];
		}
		$cmr_page["head_num_mod"] = 1;
		$cmr_page["left_num_mod"] = 1;
		$cmr_page["middle_num_mod"] = 1;
		$cmr_page["right_num_mod"] = 1;
		$cmr_page["foot_num_mod"] = 1;
		// $numtask=1;
		if($cmr_page)
		foreach($cmr_page as $key => $values){
		    // $_SESSION[$key] = $values;
		    if(cmr_search("^head[1-9]+", $key) && ($values)) $cmr_page["head_num_mod"]++;
		    if(cmr_search("^left[1-9]+", $key) && ($values)) $cmr_page["left_num_mod"]++;
		    if(cmr_search("^middle[1-9]+", $key) && ($values)) $cmr_page["middle_num_mod"]++;
		    if(cmr_search("^right[1-9]+", $key) && ($values)) $cmr_page["right_num_mod"]++;
		    if(cmr_search("^foot[1-9]+", $key) && ($values)) $cmr_page["foot_num_mod"]++;
		    // if(cmr_search("^task[0-9]+", $key)&&($values)) $numtask++;
		}
		
		if((isset($cmr_page["task"])) && ($cmr_page["task"])) $cmr_page["foot_num_mod"] = 1 + $cmr_page["foot_num_mod"];
		
        return $cmr_page;
	   }
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("change_page"))){
    /**
     * change_page()
     *
     * @param array $cmr_page
     * @param array $module
     * @param array $themes
     * @return
     **/
function change_page($cmr_page = array(), $module = array(), $themes = array(), $win_action, $win_pos)
{
	    $win_posy = cmr_searchi_replace("^head|^left|^middle|^right|^foot", "", $win_pos);
	    $win_posx = cmr_searchi_replace("$win_posy" . "\$", "", $win_pos);
	    
		$max_head = $cmr_page["head_num_mod"];
		$max_left = $cmr_page["left_num_mod"];
		$max_middle = $cmr_page["middle_num_mod"];
		$max_right = $cmr_page["right_num_mod"];
		$max_foot = $cmr_page["foot_num_mod"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            switch ($win_action){
    			// -----------
                case "left":
		            switch ($win_posx){
		                case "head":
			                $cmr_page = insert_module($win_pos, $cmr_page, "left1");
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
		                case "left":
			                $cmr_page = insert_module($win_pos, $cmr_page, "right1");
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
		                case "middle":
			                $cmr_page = insert_module($win_pos, $cmr_page, "left" . $max_left);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
		                case "right":
			                $cmr_page = insert_module($win_pos, $cmr_page, "middle" . $max_middle);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
		                case "foot":
		                
			                $cmr_page = insert_module($win_pos, $cmr_page, "left" . $max_left);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
                		default:
                		break;
		                }
                break;
    			// -----------
                case "right":
		            switch ($win_posx){
		                case "head":
			                $cmr_page = insert_module($win_pos, $cmr_page, "right1");
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
		                case "left":
			                $cmr_page = insert_module($win_pos, $cmr_page, "middle" . $max_middle);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
		                case "middle":
			                $cmr_page = insert_module($win_pos, $cmr_page, "right" . $max_right);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
		                case "right":
			                $cmr_page = insert_module($win_pos, $cmr_page, "left" . $max_left);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
		                case "foot":
		                
			                $cmr_page = insert_module($win_pos, $cmr_page, "right" . $max_right);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                break;
		                
                		default:
                		break;
		                }
                break;
    			// -----------
                case "up":
		            switch ($win_posx){
		                case "head":
						if($win_posy==1){
			                $cmr_page = insert_module($win_pos, $cmr_page, "foot" . $max_foot);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy-1), $cmr_page);
			                }
		                break;
		                
		                case "left":
						if($win_posy==1){
			                $cmr_page = insert_module($win_pos, $cmr_page, "head" . $max_head);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy-1), $cmr_page);
			                }
		                break;
		                
		                case "middle":
						if($win_posy==1){
			                $cmr_page = insert_module($win_pos, $cmr_page, "head" . $max_head);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy-1), $cmr_page);
			                }
		                break;
		                
		                case "right":
						if($win_posy==1){
			                $cmr_page = insert_module($win_pos, $cmr_page, "head" . $max_head);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy-1), $cmr_page);
			                }
		                break;
		                
		                case "foot":
						if($win_posy==1){
			                $cmr_page = insert_module($win_pos, $cmr_page, "middle" . $max_middle);
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy-1), $cmr_page);
			                }
		                break;
		                
                		default:
                		break;
		                }
                break;
    			// -----------
                case "down":
		            switch ($win_posx){
		                case "head":
						if($win_posy==$max_head){
			                $cmr_page = insert_module($win_pos, $cmr_page, "middle1");
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy+1), $cmr_page);
			                }
		                break;
		                
		                case "left":
						if($win_posy==$max_left){
			                $cmr_page = insert_module($win_pos, $cmr_page, "page_footer");
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy+1), $cmr_page);
			                }
		                break;
		                
		                case "middle":
						if($win_posy==$max_middle){
			                $cmr_page = insert_module($win_pos, $cmr_page, "page_footer");
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy+1), $cmr_page);
			                }
		                break;
		                
		                case "right":
						if($win_posy==$max_right){
			                $cmr_page = insert_module($win_pos, $cmr_page, "page_footer");
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy+1), $cmr_page);
			                }
		                break;
		                
		                case "foot":
						if($win_posy==$max_foot){
			                $cmr_page = insert_module($win_pos, $cmr_page, "head1");
			                $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
		                }else{
			                $cmr_page = permute_module($win_pos, $win_posx . ($win_posy+1), $cmr_page);
			                }
		                break;
		                
                		default:
                		break;
		                }
                break;
    			// -----------
                case "riduct":
//                 $cmr->page["show_task"] = "yes";
                $cmr_page["task"][] = $cmr_page[$win_pos] . ";" . $win_pos;
			    $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
                break;
    			// -----------
                case "zoom":
			    $cmr_page = insert_module($win_pos, $cmr_page, "middle1");
                break;
    			// -----------
                case "close":
			    $cmr_page = remove_module($win_posx, $win_posy, $cmr_page);
                break;
    			// -----------
                default:
                break;
            }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
	    
	    
        return $cmr_page;
	} 
	
} 
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("open_box"))){
    /**
     * open_box()
     *
     * @param array $cmr_page
     * @param array $module
     * @param array $themes
     * @return
     **/
    function open_box($cmr_page = array(), $module = array(), $themes=array())
    {
			if(empty($module["position"]))  $module["position"] = "head1";      
			if(empty($module["base_name"]))  $module["base_name"] = "page";      

            $win_link["left"] = "index.php?win_pos=" . $module["position"] . "&win_action=left";
            $win_link["up"] = "index.php?win_pos=" . $module["position"] . "&win_action=up";
            $win_link["down"] = "index.php?win_pos=" . $module["position"] . "&win_action=down";
            $win_link["right"] = "index.php?win_pos=" . $module["position"] . "&win_action=right";

            $win_link["riduct"] = "index.php?win_pos=" . $module["position"] . "&win_action=riduct";
            $win_link["zoom"] = "index.php?win_pos=" . $module["position"] . "&win_action=zoom";
            $win_link["close"] = "index.php?win_pos=" . $module["position"] . "&win_action=close";

        $output = ""; 
        $mod_name = cmr_search_replace("[\.,:;]", "_", $module["base_name"]);
        $output .= "<div id=\"div_id_" . $mod_name . "\" class=\"div_win_table\" >";
        $output .= "<table class=\"cmr_win_table\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"";
        if(($themes["width"]))  $output .= "style=\"width:" . $themes["width"] . ";\"";
        $output .= ">";
        

        if($themes["header_visible"]){ // -- title bar of the windows --
        
        	$output .= "<thead>";
            $output .= "<tr><td>";
            $output .= "<table class=\"win_header\"";
        	if($themes){
            $output .= "style=\"";
        	if(($themes["width"])) $output .= "width:" . $themes["width"] . ";  ";
            if(($themes["header_border"])) $output .= "border:" . $themes["header_border"] . "; ";
            $output .= "\" ";
//             $output .= "background-image:url(images/layer_head.jpg);no-repeat; background-size: 100%;\" ";
			}
            $output .= "cellspacing=\"0\" cellpadding=\"0\" ";
            $output .= ">";
        	$output .= "<thead>";
            $output .= "<tr ";
            $output .= ">";

            $output .= "<td class=\"win_header1\" ";
        	if(($themes["header_bgimage_left"])){
            $output .= "style=\"background-image:url(" . cmr_get_path("www") . $themes["header_bgimage_left"] .  "); ";
            $output .= "background-color:" . $themes["header_bgcolor"] .  "; ";
            $output .= "width:50;\"";
        	}
            $output .= ">";

            if($themes["header_tools_left"]){ // -- title bar of the windows --
                $output .= "<a href=\"" . $win_link["left"] . "\" class=\"arrow_link\"><img width=\"10\" alt=\"<\" src=\"" . cmr_get_path("www") . "images/icon/go_first_icon.png\" border=\"0\" title=\"" . cmr_translate("Left") . "\" /></a>";
                $output .= "<a href=\"" . $win_link["up"] . "\" class=\"arrow_link\"><img width=\"10\" alt=\"^\" src=\"" . cmr_get_path("www") . "images/icon/go_top_icon.png\" border=\"0\" title=\"" . cmr_translate("Up") . "\"  /></a>";
                $output .= "<a href=\"" . $win_link["down"] . "\" class=\"arrow_link\"><img width=\"10\" alt=\"v\" src=\"" . cmr_get_path("www") . "images/icon/go_bottom_icon.png\" border=\"0\" title=\"" . cmr_translate("Down") . "\"  /></a>";
                $output .= "<a href=\"" . $win_link["right"] . "\" class=\"arrow_link\"><img width=\"10\" alt=\">\" src=\"" . cmr_get_path("www") . "images/icon/go_last_icon.png\" border=\"0\" title=\"" . cmr_translate("Rigth") . "\"  /></a>";
            } else
//                 $output .= "&nbsp;&nbsp;";

            $output .= "</td> ";

            $output .= "<td class=\"win_header2\" ";
            if((($themes["header_color"])) || (($themes["header_align"])) || (($themes["header_bgcolor"])) || (($themes["header_bgimage_middle"]))){
            $output .= "style=\"";
        	if(($themes["header_color"])) $output .= "color:" . $themes["header_color"].";";
            if(($themes["header_align"])) $output .= "text-align: " . $themes["header_align"] . "; ";
            if(($themes["header_bgcolor"])) $output .= "background-color:" . $themes["header_bgcolor"] .  ";";
            if(($themes["header_bgimage_middle"])) $output .= "background-image:url(" . cmr_get_path("www") . $themes["header_bgimage_middle"] .  ");";
            $output .= "\"";
        	}
            if(($themes["header_mouse_effect"])&&($themes["header_color"])){
                // onmousemove=\"move_element('div_id_menu')\"
                // onmouseout=\"hide_element('div_id_menu')\"
                $output .= "onmouseover=\"this.style.color='#00EEEE'\" ";
                $output .= "onmouseout=\"this.style.color='" . $themes["header_color"]."'\" ";
                // $output .= "ondragstart=\"move_element('div_id_$mod_name')\"
                // ondrag=\"move_element('div_id_$mod_name')\"
                // ondragend=\"move_element('div_id_$mod_name')\"
                $output .= " ondblclick=\"zoom_id('div_id_" . $mod_name . "');\" ";
                // ondblclick=\"javascript:this.style.color=prompt('$mod_name \\nColore?','#FFFFFF')\"";
            }
            $output .= "> ";

            if(strlen($module["title"]) <= 2) $module["title"] = "_" . $module["title"] . "_";
            // -----------
            $config["image" . $module["base_name"]] = "";
			if($module["header_icon"]) $config["image" . $module["base_name"]] = $module["header_icon"];
            $output .= class_module_icon($config, $mod_name, "16")  . $module["title"];
            $output .= "<img alt=\"^\" id=\"" . "me1_id_" . $mod_name . "\" src=\"" . cmr_get_path("www") . "images/icon/go_up_icon.png" . "\" onclick=\"hide('div1_id_" . $mod_name . "');hide('me1_id_" . $mod_name . "');show('me2_id_" . $mod_name . "');\" />";
            $output .= "<img alt=\"v\" id=\"" . "me2_id_" . $mod_name . "\" src=\"" . cmr_get_path("www") . "images/icon/go_down_icon.png" . "\" onclick=\"show('div1_id_" . $mod_name . "');hide('me2_id_" . $mod_name . "');show('me1_id_" . $mod_name . "');\" class=\"hidded\"/>";
            // -----------
            $output .= "</td>";
            $output .= "<td class=\"win_header3\" ";
        	if($themes["header_bgimage_right"]){
            $output .= "style=\"background-image:url(" . cmr_get_path("www") . $themes["header_bgimage_right"] .  "); ";
            $output .= "background-color:" . $themes["header_bgcolor"] .  "; ";
            $output .= "width:50;\"";
        	}
            $output .= ">";

            if($themes["header_tools_right"]){ // -- title bar of the windows --
                $output .= "<a href=\"\"><img onclick=\"print_id('div1_id_" . $mod_name . "');\" width=\"10\" alt=\"p\" src=\"" . cmr_get_path("www") . "images/icon/print_icon.png\" border=\"0\"  title=\"" . cmr_translate("Print") . "\" /></a>";
                $output .= "<a href=\"" . $win_link["riduct"] . "\"><img width=\"10\" alt=\"_\" src=\"" . cmr_get_path("www") . "images/icon/remove_icon.png\" border=\"0\"  title=\"" . cmr_translate("Riduct") . "\" /></a>";
                $output .= "<a href=\"" . $win_link["zoom"] . "\"><img width=\"10\" alt=\"o\" src=\"" . cmr_get_path("www") . "images/icon/fullscreen_icon.png\" border=\"0\" title=\"" . cmr_translate("Zoom") . "\"  /></a>";
                $output .= "<a href=\"" . $win_link["close"] . "\"><img width=\"10\" alt=\"x\" src=\"" . cmr_get_path("www") . "images/icon/stop_icon.png\" border=\"0\"  title=\"" . cmr_translate("Close") . "\" /></a>";
            };

            $output .= "</td></tr></thead></table>";
            $output .= "</td></tr>";
        	$output .= "</thead>";
        }
        $output .= "<tbody>";
        $output .= "<tr><td valign=\"top\" class=\"normal_win\" ";
        if($themes){
        $output .= "style=\"";
        if($themes["text_font"]) $output .= "font-family: " . $themes["text_font"] . "; ";
        if($themes["text_color"]) $output .= "color:" . $themes["text_color"] . "; ";
        if($themes["text_size"]) $output .= "font-size:" . $themes["text_size"] . "; ";
        if($themes["background"]) $output .= "background-image:url(" . cmr_get_path("www") . $themes["background"] . ");";
        if($themes["text_align"]) $output .= "text-align:" . $themes["text_align"] . "; ";
        if($themes["bgcolor"]) $output .= "background-color:" . $themes["bgcolor"] . "; ";
        if($themes["border"]) $output .= "border: " . $themes["border"] . "; ";
        if($themes["bordercolor"]) $output .= "border-color:" . $themes["bordercolor"] . ";";
        $output .= "\"";
    	}
        $output .= ">";
        // ===================onmouseover=\"ajax_event('http://tchouamou.homeunix.com/cmr/event.php?event=');\"====
        $output .= "<div class=\"" . $themes["html_class"] . "\" id=\"div1_id_" . $mod_name . "\" title=\"" . str_replace("_php", "", $mod_name) . "\" >";
//         $output .= $module["text"];
        return $output;
    } 
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("close_box"))){
    /**
     * close_box()
     *
     * @return
     **/
    function close_box($module=array())
    {
        $output = "";

        if(!(empty($module["message"]))){
            $output .= "<p class=\"event_message\">";
            $output .= $module["message"];
            $output .= "</p>";
        }

        $output .= "</div>";
        $output .= "</td></tr></tbody></table></div>";
        return $output;
    } 
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
 * open_tab()
 *
 * @return
 **/
if(!(function_exists("open_tab"))){
function open_tab($cmr_config = array(), $cmr_page = array(), $type = "0")
{
$array_tab = array();
$array_image = array();
$array_path = array();
$array_link = array();

$numeric_type = intval($type);
$policy_tab = $cmr_config["cmr_tab_type_" . $numeric_type];


$page_tabs = explode("|\n", $cmr_page["tab"]);
//----------------------
    foreach($page_tabs as $key => $value){
        if(cmr_policy($cmr_config, $value, $policy_tab, $numeric_type)){
	    @ list($array_tab[$key], $array_image[$key], $array_path[$key]) = explode("|", $value);
		$array_tab[$key] = trim($array_tab[$key]);
		$array_image[$key] = trim($array_image[$key]);
		$array_path[$key] = trim($array_path[$key]);
        if(empty($array_path[$key])) $array_path[$key] = $array_tab[$key];
    	}
      }
//----------------------
// 	    $array_tab=array_unique($array_tab);
        if(empty($cmr_page["current_tab"])) $cmr_page["current_tab"] = $array_path[0];
	    
        $str="<div>";

        $str .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" ><tr>";
//      $str .= "<td>Default</td>";
		$i=0;
		$j=0;
        while(!empty($array_tab[$i])){

//      $str .= "<td class=\"tab_space\" >&nbsp;</td>";
	        if((($i+1) % 20) == 0){
	            $str .= "</tr><tr>";
	         if(((($i+1) / 10)) % 2==0){ 
	            $str .= "<td class=\"tab_space\" ></td>";
	        	$i++;
	         }
	        }

            if(trim($cmr_page["current_tab"]) == trim($array_path[$i])){
            $str .= "<td class=\"tab_current\"   >";
            $j=$i;
            }else{
            $str .= "<td class=\"tab_no_current\" >";
                }

            if(!empty($array_image[$i])) $str .= "<img src=\"" . cmr_get_path("www") . $array_image[$i] . "\" alt=\"+\" />";           
			$array_link[$key] = "<a href=\"index.php?conf=com_tab&amp;current_tab=" . $array_path[$i] . "\" ><b>" . cmr_translate($array_tab[$i]) . "</b></a>";           
            $str .= $array_link[$key];
        	$str .= "</td><td class=\"tab_space\" >&nbsp;</td>";

        $i++;
        }
//      $str .= "<td class=\"tab_no_current\" ><a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?conf=com_tab&amp;current_tab = page/close/page.ini >".ucfirst($cmr_language["close"])."</a></b></td>";
        $str .= "<td class=\"tab_space\" width=\"100\">&nbsp;</td>";

        $str .= "<td class=\"tab_no_current\" >";
        $str .= "<a href=\"index.php?conf=com_tab&amp;current_tab=close&amp;tab_num=$j \" >";           
        $str .= "<img src=\"" .cmr_get_path("www") ."images/icon/deleted_icon.png\" alt=\"X\" />";           
        $str .= "</a>";           
        $str .= "</td></tr></table>";



        $str .= "<div class=\"tab_tab\">";
        return $str;
}
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
 * open_module_tab()
 *
 * @return
 **/
if(!(function_exists("open_module_tab"))){
function open_module_tab($array_link = array(), $current = 1)
{
        $str="<div>";
        $str .= "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\" ><tr>";
        
		$i=0;
		$j=0;
        foreach($array_link as $key => $value){
	        if((($i+1) % 20) == 0){
	            $str .= "</tr><tr>";
	         if(((($i+1) / 10)) % 2==0){ 
	            $str .= "<td class=\"tab_space\" >&nbsp;</td>";
	        	$i++;
	         }
	        }

            if($current == $i){
	            $str .= "<td class=\"tab_current\">";
	            $j=$i;
            }else{
	            $str .= "<td class=\"tab_no_current\" >";
                }

            $str .= $value;
        	$str .= "</td><td class=\"tab_space\" ></td>";

        $i++;
        }
        $str .= "<td class=\"tab_space\" width=\"100\">&nbsp;</td>";

        $str .= "</tr></table>";
        $str .= "<div class=\"tab_tab\">";
        return $str;
}
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
 * close_tab()
 *
 * @return
 **/
if(!(function_exists("close_tab"))){
function close_tab()
    {
        $str="</div>";
        $str="</div>";
        return $str;
    }
    }
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
 * close_module_tab()
 *
 * @return
 **/
if(!(function_exists("close_module_tab"))){
function close_module_tab()
    {
        return close_tab();
    }
    }
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>
