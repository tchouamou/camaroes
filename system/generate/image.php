<?php
/**
 * image.php
 * ---------
 * begin    : July 2004 - August 2011
 * copyright   : TSTM Ver 1.1 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























image.php, Ver 3.03
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ----------------------
include_once(dirname(__FILE__) . "/../../function/func_image.php");
// ----------------------
/**
* @param mixed $cmr_var
* @return
*/
if(!(function_exists("get_post"))){
function get_post($cmr_var = "")
{
    $cmr_return = null;
    $cmr_return = isset($_POST[$cmr_var]) ? $_POST[$cmr_var]: $cmr_return;
    $cmr_return = isset($_GET[$cmr_var]) ? urldecode($_GET[$cmr_var]): $cmr_return;

    return $cmr_return;
}
}


// ###   ##   #    ### ##  ###
// ##  ##    ##    #   ##  #
// ### ##   # #    #   ### #
// # ## #   ####   #   # ###
// # #  #  #   #   #   #  ##
// ###  ### #   ## ### ###  #
/**
*
* Main image
*
*/
$imgtext= get_post("cmr_imgtext");
$imgpath= get_post("cmr_imgpath");

if(!empty($imgtext)){
	cmr_img_by_text($imgtext);
	};


if(!empty($imgpath)){
	cmr_img_by_path($imgpath);
	};

// $image_text= get_post("image_text");
// if(!empty($image_text)){
// echo "<img src=\"image.php?cmr_imgpath=0&image_text=salut\" alt=\"ciao\" />";
// 	};
/**
*
*
*/





// // Antispam example using a random string
// include_once "jpgraph/src/jpgraph_antispam.php";

// // Create new anti-spam challenge creator
// // Note: Neither '0' (digit) or 'O' (letter) can be used to avoid confusion
// $spam = new AntiSpam();

// // Create a random 5 char challenge and return the string generated
// $chars = $spam->Rand(5);

// // Stroke random cahllenge
// if( $spam->Stroke() === false ){
//     die('Illegal or no data to plot');
// }

?>
