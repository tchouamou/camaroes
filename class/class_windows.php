<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_windows.php
 *   ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








class_windows.php,Ver 3.0  2011-July 10:36:59
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 */


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/../control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(class_exists("class_windows"))){

/**
 * windows
 *
 * @package
 * @author Administrator
 * @copyright Copyright (c) 2011
 * @version $Id$
 * @access public
 **/
class class_windows {

//     var $config = array();
    var $page = array();
    var $module = array();
    var $themes = array();
    var $label = array();
    var $value = array();
    var $prints = array();
    var $template = "";
    // ------------
    // ------------
//00000000000000000000000000
function __construct($page = array(), $module = array(), $themes = array()) // --constructor--
{
   return $this->class_windows($page, $module, $themes);
}
//00000000000000000000000000
    /**
     * windows::windows($themes)
     *
     **/
    function class_windows($page = array(), $module = array(), $themes = array()) // --contructor--
    {
//     $this->config = $config;
    $this->page = $page;
    $this->module = $module;
    $this->themes = $themes;

    // ------------
    }
    // ------------
    // ------------
    /**
     * windows::load_template($themes, $config, $language, $config, $language,)
     *
     * @return
     **/
    function load_themes($themes=array())
    {
	    if(count($themes)){
//          $this->module["title"] = $this->module["title"];
//          $this->module["text"] = $this->module["text"];


         $this->themes["win_type"] = $themes["win_type"];
         $this->themes["html_class"] = $themes["html_class"];
         $this->themes["header_visible"] = $themes["header_visible"];
         $this->themes["header_tools_left"] = $themes["header_tools_left"];
         $this->themes["header_tools_right"] = $themes["header_tools_right"];
         $this->themes["header_mouse_effect"] = $themes["header_mouse_effect"];

         $this->themes["text_align"] = $themes["text_align"];
         $this->themes["text_font"] = $themes["text_font"];
         $this->themes["text_size"] = $themes["text_size"];
         $this->themes["text_color"] = $themes["text_color"];
         $this->themes["bgcolor"] = $themes["bgcolor"];
         $this->themes["border"] = $themes["border"];
         $this->themes["bordercolor"] = $themes["bordercolor"];
         $this->themes["background"] = $themes["background"];
         $this->themes["width"] = $themes["width"];
         $this->themes["header_bgcolor"] = $themes["header_bgcolor"];
         $this->themes["header_color"] = $themes["header_color"];
         $this->themes["header_align"] = $themes["header_align"];
         $this->themes["header_border"] = $themes["header_border"];
         $this->themes["header_bgimage_left"] = $themes["header_bgimage_left"];
         $this->themes["header_bgimage_middle"] = $themes["header_bgimage_middle"];
         $this->themes["header_bgimage_right"] = $themes["header_bgimage_right"];
        }
    }
    // ------------
    // ------------
    /**
     * windows::show_noclose($config, $language, $config, $language)
     *
     * @return
     **/
    function show_noclose()
    {
        switch ($this->themes["win_type"]){
            case "simple":;
                print("<div class=\"cmr_win_table\">");
                print($this->module["title"] . "<hr />");
//                 print($this->module["text"]);
                break;

            case "frameset":;
                print("<fieldset  class=\"cmr_win_table\" ><legend>" . $this->module["title"] . "</legend>");
//                 print($this->module["text"]);
                break;
            case "default":; //can call another function ($config = array(), open_box)
            case "normal":;
            case "black":;
            case "hacker":;
            case "beautyfull":;
            case "modern":;
            case "admin":;
            case "icommerce":;
            case "linux":;
            case "windows":;
            default:
                return open_box($this->page, $this->module, $this->themes);
            break;

        }
	return "";
    }
    // ------------
    // ------------
    function close()
    {
        switch ($this->themes["win_type"]){
            case "simple":;
                print("</td></tr>");
                if((isset($this->module["message"])) && ($this->module["message"])){
                    print("<p class=\"normal_text\">");
                    print($this->module["message"]);
                    $this->module["message"] = "";
                    print("</p>");
                }
                print("</div>");
                break;
            case "frameset":;
                if((isset($this->module["message"])) && ($this->module["message"])){
                    print("<p class=\"normal_text\">");
                    print($this->module["message"]);
                    $this->module["message"] = "";
                    print("</p>");
                }
                print("</frameset>");
                break;

            case "default":; //can call another function ($config = array(), open_box)
            case "normal":;
            case "black":;
            case "hacker":;
            case "beautyfull":;
            case "modern":;
            case "admin":;
            case "icommerce":;
            case "linux":;
            case "windows":;
            default:
               return close_box($this->module);
            break;
        }
     return "";
    }
    // ------------
    // ------------
    /**
     * windows::load_template()
     *
     * @return
     **/
    function load_template($file_list = array()) // ----
    {
		is_array($file_list) ? $template_file = cmr_good_file($file_list) : $template_file = $file_list;
		if(file_exists($template_file)) $this->template = file_get_contents($template_file);  ;
     return $this->template;
    }
    // ------------

    // ------------
    /**
     * windows::print_template()
     *
     * @return
     **/
    function print_template($part = "", $template = "", $prints = array()) // ----
    {
		if(empty($template)) $template = $this->template;
		if(empty($prints)) $prints = $this->prints;
    //$box1 = preg_replace_callback("/([^}{]*)(\{match_)([^}{ ]*)(\})([^}{]*)/siU", function ($m) use ($prints) {return print($m[1]);print($prints["match_".$m[3]]);print($m[5]);}, ($template));
    //return ($box1);
    //return cmr_print_r($prints);
    return print(cmr_print_template($template, $part, $prints));
    }
    // ------------
    // ------------
    /**
     * windows::show()
     *
     * @return
     **/
    function show() // ----
    {
	    print($this->show_noclose());
     return print($this->close());
    }
	// ------------
    // ------------
    /**
     * windows::layers_init()
     *
     * @return
     **/

	function layers_init($code1 = "", $form = "")
	    {
        return layers_init($this->page = array(), $code1, $form);
	   }
	// ------------
    // ------------
    /**
     * windows::tab_open()
     *
     * @return
     **/
    function tab_open($cmr_config = array(), $type = "0") // ----
    {
     return open_tab($cmr_config, $this->page, $type);
    }
    // ------------
    /**
     * windows::module_tab_open()
     *
     * @return
     **/
    function module_tab_open($array_link = array(), $current = 1) // ----
    {
     return open_module_tab($array_link, $current);
    }
    // ------------
    // ------------
    /**
     * windows::tab_close()
     *
     * @return
     **/
    function tab_close() // ----
    {
     return close_tab();
    }


}

}
	// ------------
    // ------------
?>
