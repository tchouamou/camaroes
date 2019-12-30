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
 * $t object istance of the class module_links
 *
 * @a _link() function who take in input a page name and create and html link to this page
 */


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(class_exists("class_module_link"))){

/**
 * module_link
 *
 * @package
 * @author Administrator
 * @copyright Copyright (c) 2011
 * @version $Id$
 * @access public
 **/
    
 class class_module_link {
    
    var $config = array();
    var $page = array();
    var $language = array();
    var $array_link =  array();
    // ------------
    // ------------
    //00000000000000000000000000 
	function __construct($config = array(), $page = array(), $language = array()) // --constructor--
	{
	   return $this->class_module_link($config, $page, $language);
	}
    //00000000000000000000000000 
    /**
     * module_link::module_link()
     *
     **/
    function class_module_link($config = array(), $page = array(), $language = array()) // --contructor--
    {
    $this->config = $config;
    $this->page = $page;
    $this->language = $language;
    
    // ------------
    }

    // ------------
    /**
     * module_link::add_link()
     *
     * @return
     **/
    function add_link($link = "", $param1 = "", $param2 = "", $param3 = "")
    {
     array_push($this->array_link, class_module_icon($this->config, $link, "16") . code_link($this->config, $this->page, $this->language, $link, $param1, $param2, $param3));
     return $this->array_link;
    }
    // ------------
    // ------------
    /**
     * module_link::show()
     *
     * @return
     **/
    function list_link() // --contructor--
    {
	 $menu_link = "<br />";
	 foreach($this->array_link as $key => $value){
		 $menu_link .= $value . "&nbsp;&nbsp;";
		}
     return $menu_link;
    }
    // ------------
	// ------------
    // ------------
    /**
     * windows::module_tab_open()
     *
     * @return
     **/
    function module_tab_open($current = 1) // ----
    {
     return open_module_tab($this->array_link, $current);
    }
    
    function open_module_tab($current = 1) // ----
    {
     return open_module_tab($this->array_link, $current);
    }
    // ------------
    // ------------
    /**
     * windows::tab_close()
     *
     * @return
     **/
    function close_module_tab() // ----
    {
     return close_tab();
    }
    
    function tab_close() // ----
    {
     return close_tab();
    }
    // ------------

}
}

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 class info_link {
    var $type = "";
    var $state = "";
    var $title = "";
    var $text = "";
    var $image = "";
    var $links = "";
    var $date = "";
    var $severity = "";
    var $num_view = "";
    var $num_comment = "";
    var $template = "";
    var $config = array();
    var $page = array();
    var $language = array();
    var $array_link =  array();
}
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>