<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_image.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























func_image.php,Ver 3.0  2011-Oct-Mon 15:23:08
*/


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("class_module_icon"))){
function class_module_icon($cmr_config = array(), $module, $size = "16")
    {
    (empty($cmr_config["image" . cmr_basename($module)])) ? $image = cmr_get_path("www") . "images/" . $size . "x" . $size . ".png" : $image = cmr_get_path("www") . $cmr_config["image" . cmr_basename($module)];
	$image = trim($image);
//     if(!file_exists($image)) $image = dirname($image) . "/auto/" . basename($image);
//     if(!file_exists($image)) return "|";
   return ("<img src=\"" . $image . "\" alt=\"|\" />");
} /*=================================================================*/
} /*=================================================================*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * try_create_image()
 *
 * @param mixed $mod_name
 * @param mixed $image_key_inf
 * @param mixed $image_lang
 * @param mixed $img_heigth
 * @param mixed $img_right
 * @return
 **/
if(!(function_exists("try_create_image"))){
function try_create_image($cmr_config = array(), $cmr_language = array(), $mod_name, $image_key_inf, $image_lang, $img_heigth, $img_right, $image = "1")
{
$src_image = "";
$return_link = "";

		// $a_link.="<img src=\"".cmr_get_path("www") ."images/ServiceContract.ico\" />";
        // $a_link.="<img src=\"button.php?text=".ucfirst($base_modname)."\" ";
        // $a_link.=ucfirst($base_modname);
if(($image != "1")){
	$return_link = "<img height=\"".$img_heigth."\" width=\"".$img_right."\"  src=\"".$image."\" ";
	$return_link .= " alt=\"|" . ucfirst($image_key_inf) . "|\" />";
	return $return_link;
    }


if($cmr_config["cmr_use_button"]=="force_image"){
	if(!file_exists(cmr_get_path("www") . "images/button/" . $image_lang . "/auto/" . $mod_name . ".png")){
		if(function_exists("image_save")){
			image_save($cmr_config, $image_key_inf,  cmr_get_path("www") . "images/button/" . $image_lang . "/auto/" . $mod_name . ".png");
		}
	}
}

	// =========================================

switch($cmr_config["cmr_use_button"]){
 case "image_text":
 case "text":
			$return_link = language_text("", $image_key_inf);
 break;

 case "header_image":
	$src_image=cmr_get_path("www") . "index.php?cmr_mode=image&img_text=".$image_key_inf."&img_color=".$cmr_config["cmr_button_color"]."&img_dim=".$cmr_config["cmr_button_dim"];
	$return_link = "<img height=\"".$img_heigth."\" width=\"".$img_right."\"  src=\"".$src_image."\" ";
	$return_link .= " alt=\"|" . ucfirst($image_key_inf) . "|\" />";
 break;

 case "force_image":
 case "exist_image":
 default:
   $file_list = array();
   $file_list[] = cmr_get_path("www") . "images/button/" . $image_lang . "/" . $mod_name . ".png";
   $file_list[] = cmr_get_path("www") . "images/button/" . "default" . "/" . $mod_name . ".png";
   $file_list[] = cmr_get_path("www") . "images/button/" . $image_lang . "/auto/" . $mod_name . ".png";
   $src_image = cmr_good_file($file_list);

	if(empty($src_image)){
			$return_link = language_text("", $image_key_inf);
		}else{
	$return_link = "<img height=\"".$img_heigth."\" width=\"".$img_right."\"  src=\"".$src_image."\" ";
	$return_link .= " alt=\"|" . ucfirst($image_key_inf) . "|\" />";
	}
 break;

	}

return $return_link;
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * image_save()
 *
 * @param mixed $image_text
 * @param mixed $button_dest
 * @param string $image_template
 * @return
 **/
if(!(function_exists("image_save"))){
function image_save($cmr_config = array(), $image_text, $button_dest)
{
// print("\$image_text=$image_text,\$button_dest=$button_dest:".$cmr_config["cmr_button_color"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(file_exists($cmr_config["cmr_button_model"])){
	$im = imagecreatefrompng($cmr_config["cmr_button_model"]);
	}else{
	$im = @imagecreatetruecolor(100, 50) or print(cmr_translate("!!!Image can't be created !!!"));
	$background_color = imagecolorallocate ($im, 0, 255, 0);
	imagefill($im, 0, 0, $background_color);
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
	imagefilledrectangle($im, 0, 0, 99, 49, $white);
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(empty($cmr_config["cmr_button_color"])){
	$text_color = imagecolorallocate ($im, 233, 14, 91);
	}else{
		list($col1, $col2, $col3) = explode(",", $cmr_config["cmr_button_color"]);
		$text_color  = ImageColorAllocate  ($im, trim($col1),  trim($col2), trim($col3));
		}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(empty($cmr_config["cmr_button_dim"])){
		$font=1;
		$font_size=20;
		$font_angle=0;
		$x_pos = 10;
		$y_pos= 20;
		imagestring ($im, $font, 5, 5,  $image_text, $text_color);
		// Add  text (ombre)
		imagettftext($im, $font_size, $font_angle, ($x_pos + 1), ($y_pos + 1), $grey, $font, $image_text);
		// Add text
		imagettftext($im, $font_size, $font_angle, $x_pos, $y_pos, $black, $font, $image_text);
	}else{
		list($font, $x_pos, $y_pos, $font_size) = explode(",", $cmr_config["cmr_button_dim"]);
		if(!is_numeric($font)) $font = imageloadfont(realpath($font));
		Imagestring  ($im, trim($font), trim($x_pos), trim($y_pos),  $image_text, $text_color );
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $font_width=imagefontwidth($font);
// $font_height=imagefontheight($font);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  if(imagepng ($im, $button_dest)){
	}elseif(function_exists("imagegif")){
    imagegif($im, $button_dest . ".gif");
  }elseif(function_exists("imagejpeg")){
    imagejpeg($im, $button_dest . ".jpeg", 0.5);
  }elseif(function_exists("imagepng")){
    imagepng($im, $button_dest);
  } elseif(function_exists("imagewbmp")){
    imagewbmp($im, $button_dest . ".bmp");
  }  else {
    print(cmr_translate("Graphic Not support by PHP serveur"));
	return false;
  }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// header ("Content-type: image/png" );
imagedestroy($im);
return true;
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
* cmr_icon_src()
* Receive a path to an image and return a href value usefull to call  cmr_img_by_text()
*
* @param mixed $icon_src
* @return
*/
if(!(function_exists("cmr_icon_src"))){
function cmr_icon_src($cmr_config, $icon_src = "")
{
    if(!file_exists($icon_src)){
        if(!empty($cmr_config["self_header"])){
            return "?cmr_imgtext=" . urlencode(basename($icon_src, ".png"));
        }else{
            return cmr_get_path("image");
        }
    }
    return $icon_src;
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
* cmr_img_by_text()
* Receive a string and send to the browser the corresponds image or an image of the string
*
* @param string $cmr_imgtext
* @return
*/
if(!(function_exists("cmr_img_by_text"))){
function cmr_img_by_text($cmr_imgtext = "")
{
    if($cmr_imgtext){
        switch ($cmr_imgtext){
            case "spreadsheet" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QQWFA0J2YhE+gAAAk1JREFUOMuVkt9LU2EYxz9nm2561vxV4FmKlXEIUiGRLIoKlBEUeCGZFIHdSH9FY111GzTQm1KDCq0LQ3LQhRQUaHc5zWyUDPRITVtbS885O+/pYj/s1y58rr4v7/P9vN/3fV5peHj4yfr6ei+7q8vBYHAcgFAoZO+2QqGQXSC5CiISieSVhKZp+P0KAJqmoSj+vF5jYGDgjyhFgKZpSFIOIEm59c7eWsm7FAGKX8ErewGIxWL09PQAEI1GaWltQbIl5qPzpQGGbpAhg4QEQCqVIi9Jf0+Rj1ca4HG7kb1eCq/j81UV/PiqdnRJwLau50/MtX6MPGf17h22FhaJpzO5JrmCybZWvG3t/0ng8SDLMgD26D0+zc3RdOUiZZ0qwiGRFQLDFEgOD03Ppnh0vONl/+zb/iJA13UANh6MUbOyTMONPrLpJMn4KqYQGJaNs6oWUwisThXn0uqZEfXw7SLA7XYjyzKJyDT7r57nRzxWNJpC8KH+EJuGC1NkMSQL77F61KeTff8ksDe/YRlb6NaOWVLK2dPhJvy1C8PUUWu9CMvk6OhDj+PvBGZ1Dc59DeCrQRcWuiVwqpU0N6epz65xsnEvX1IpfCvvyXg828UEgUAgN43BQd7dH+Pg9V7qDhzBdrmoPl2HqHAQ7JB4/DlNY3yR9skJKlV1XAqHw1OJROLC77OtnZlBfvMa89wJyhqq8Zy10Q1BZsNkekrQM/uKClV9cW1hIVDqfzDS3X1JX1q66U4mVefPTLltg5Blw6Uoywe7um6dGhqaAPgF9PUj6TDrLfkAAAAASUVORK5CYII=";
                break;
            case "presentation" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1gQTDigI5ocAsQAAAmVJREFUOMt9Ul1IU2EYfs7OmpOwNEM4qZsEaVrQRblaSAqBdKHSjUQYQVl6YxQaRBcWQVkajnQ3qUQXGYE/EbMfL2SUoCuKLiJ3kMJ2/DsDbUqwHbbe73xdbJOzKb0378fH8z7P+/MIZxvO3CSiDmyOHwD8AGYS2d9S7P2ahpk0E1HHQN8TKEognYABoERmANj6iBcHL94BeBzw/entE2aLxdJ/ubmxKa2YGwr1JFlLMTDvfQWOWdirbgAAzM+fvWh+0HWv6fy5C4hEIhBNJggAi2kacSI9IyuLIAjMJIrs18AhFFadxtqcG5zH2zAnJSVJgqIoWBgawm6fj+2z2XQQsUAgwFSHgwobGnQAWJ72wJrHEfsTTCUAgFVZRrmqIsNuZ3/DYYqGw7TLvI1lTU3rHxWFsvMB6VgtQj/dyTWkEoRkGbooQgsGWRSkT5yqZsNL+xmnKJW+72Mn8wHV54Ell2+MYDIS7K2uxtvRUa5qGgsdLaAdzgDLN4do5zevXlp5QAcAyVELnlxtOsH23FxIvb3CyOIi9Q8/ZmO3Olnw5X29JG+dKi81EgAsfxqLq/MtRrBarSirqEDZ+DgznNHoBUjlNViZdSOm/d5MIMt+o4nSfcAAYGnKA4ppyMzZogOn83jyqSeUydjB5Dtgj7MOK/LcphH6Ox92GN1IBvWNDpwA1M+vIWYCSFxBwH/i6rUrDluhvXh+QRnveeRe/dCew0vq27Ey04OMbAfU6YnUKxjD5eo+YrcV1bW1XR+024oKXK5uEwAEv7yBzvgGTtiisAZAF4CZ1ta2esO/eHjtLqXBB/8Bjq8iwW+iMcgAAAAASUVORK5CYII=";
                break;
            case "terminal" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QoSFSUbRvzYGQAAAilJREFUOMt9k89LVFEUxz93fDMqZEGG0cLAEgpXrly1qEXLNu2C0mqRuggXQWCtgja1DkqwRWKC/gG1LSUIwqI0UCOdsRgrHX2Ome/dX6fFG2dGLQ8c7r3ccz/3ew7nqKHngweNsf3W2u44jhuMMVTcYmz1OXFn3XoUx4+11g8CpdT9o03Hek62tKYztXWAgPBP896xXiySX8o3jk+8vp1bzKYD4PqJltb0la5Opj9Ns5+JJOTTbafo7enN5BazPYGI1CmV4svcHKMvH+HFISJ4cXjvEUnceUHE4b2j80I/qZRCRA4FFXnC1MdZwOG9lEDJ422QF8F5C4B1yVoF8DQ2NSTB3uOxeO/wJUBstgjXlwk3CwA453YCRISpDzP09d7l2cgTlgt5BME5SyH8SRRtJoFKJR/uAXihviHDqzcvuNHVR2FtmcGRh6wVfkGNpf5AbQlAKYVdAC+e2el5Vn/8oaP9HJmglveTnxHvy49Qle2eFBAgcNzsvsXw2ABvJycI0gqoKSlXOxS43UUE+Dr7jUtXL4IIKHg3PlO+0zrmzPn28tk5v6sGgPMuqZFKAdBxtq1KukKlUvsoECiubv2/Davy31EDpZQGqW8+3szCwkK5XfezxiOHieIIpdTvANRwNjd/bWxsNNjYKBKGIWG4RhRFGGuw1mK3J9FarDVoo1lZKWjgaSDi7+SXvpPNzV82xmS01pVRNqYM2R5lrTVGm9hYOyQi9/4C16KCF5hN9R0AAAAASUVORK5CYII=";
                break;
            case "sound1" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABQAAAAWBAMAAAAyb6E1AAAAGFBMVEXM////MzP////MzMyZmZlmAAAzMzMAAAD978/hAAAAAWJLR0QHFmGI6wAAAGpJREFUeNpjYMANEhgYBSAs9gJBBkEIs6SAUQAizO5UwCAIYZYoFQgwAlWwl5c7KRUABQMZSlxclIBMVhBTCQgKAoljpqQkQbUBDTODGsaQllacBLECCNLN4BazFYOcA3FZOsKRbAinYwAArBsbpwdFPHYAAABWdEVYdENvbW1lbnQAVGhpcyBhcnQgaXMgaW4gdGhlIHB1YmxpYyBkb21haW4uIEtldmluIEh1Z2hlcywga2V2aW5oQGVpdC5jb20sIFNlcHRlbWJlciAxOTk1TOj0xAAAAABJRU5ErkJggg==";
                break;
            case "doc" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QkHDR4My8+dUwAAAbZJREFUOMudkzGLIkEQhb/qHvEWNHDN/BGmBmZipJiZCEaCt/mBe5GbeYyesPEliiADBmamnomZgT/AxGB+gRjoMNNzgevseN4lFjRN0V3v1XtdLfag9xX4xQOhlPqGPeiFj4Y96IXWFc11XdbrNbvdjvl8DsBisUBrfcMaBAEAuVzu0kX8sFgs0mg0GI/H8TbRWqOUQil1LyOebLdb6vU6juMAoLXGhIYgCAhMgO8HCPJ/gLe3N6bTKdVqNQLQSmNpjdYWllYorRAlGGMAiDwQuSA3m00A+oM+rVYL13VZ/l6iDBilEGMQ80lqxbUul0tEJFrv/jtBEGBpi1CFqDDECIBEZqo4gIhEZl3z4/FIuVwmk8mQzWZ5ff3O09OXSMInwEdxHARgv99TKpU4HA60221GoxGr1Yrz+fyXiUqi4vieSCTodrskk0k6nQ4Am83m/hUEudF/NVXk4rhSitPpBIDnefcA4cflOLuI4Hketm3j+z7D4RCAQqHwjw7C8GZARIRUKkU+n2c2m5FOp5lMJtRqNSqVyv0zZp6f78bUcZzIbQDf9y/dxsgs4KX/88dD3xl4+QP+j8+Vjq02WwAAAABJRU5ErkJggg==";
                break;
            case "executable" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QQWFAc4cmrsSgAAAb1JREFUOMu1k81OE2EUhp/vm29mpE1IKIKkYDsNkAnGKGggYaMbSPAGuAA3TdywYOPOcAEumrhhwwU03oDRlXHlQqoJ2lHMDKFpC7T8ZfqHKC6UZhRmdrzJWT5PTvKeAyFZXFqdnFl4era4tDpJRGQY7Dnu+vNnj/Ecdz1KIqPgYmmHiXt2pESGwZuVGrrSuDM+TGJkKFQiL117dx9dSXRNgzPoMQwsO3OpRPwPl+qHCARCgBCCT8USpqE4Pf3JF7eK57hYdmYqn8sWAGQQrh4co2sauvoz7fYP+AWJ3ji3RpMM9/cFN5kDUOdw7biBrjSEEAgEjVaH2r7P3YmbXDMV795vIhGkB/oB8Bz3NSCkZWfml1fWuN4bp9U6wW+0+e7tsrVdp1w5pNnoUK4coaQkZhps7dXxHJfUWOo+gMznsm8sOzO1vLLGyGAfG8UyezUf3+8wlh4klUzQap4QMw2ccrULv3zx5EO3hXwuWziXPHp4m7hpEDcNjg6aSCFQQvLRK12A/6kxKHkwO07MNBhND2Dqircb3/Acl6R1YzoId2sMO6avxR1eFT5fqC5SEJT8rSwUjkzgG+e4yvwGH5vwRFJ4Rk0AAAAASUVORK5CYII=";
                break;
            case "html" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QQWFBMzy8WilwAAAlJJREFUOMuVkr1PU1EYxn/n9tIrUGx6gUIhQqx8SIiAGBwcjERdMCEmDkZl0U3j6KIxIV38BwwmGKODHwMxLurg5GBcQCYhpi0BTa0U6O2HLfe2t+29DqbYK8aEZ3pP8p7n/N7zvGJ2dvZlIpG4wN50cXp6eg6AUChk71WhUMiuOsnVQtM0LMsCQAix81S1FkLgcrnwer0OlB0Dy7KIRCKOC7USQjAwMLBrFrn20N/f/1+Cf0mubawlqOrzWoalr1myhkXZsnHLElKpnct3nl19cW/qiYOgr69vx+D75k8evlog0KYyeeYYBzubaVAU0nmDldgWi8uxx5duP73uMIhGowAkUgavFzY4Pz7McK+fdN5gNfoF2eOHeh9N++DKxAjzy/ExxwhVgrlH75k8NcSRoEoqmaClaxBvSwC9UCIRW0W2TKSKwemxoPMTI5EIn8IaPt9+xsd6yGU0yrIHJEGdJOOus2lQZHwNCgF/K4ri3p3C28WPnBjtIpNOkjQb8Xd0YNtgAwgJYZmspywWV5bw1dvOFMLhMAlNp7vdx3x0k2CvH8uGai75TIrjI4MIIbBtm/j6BtLfBAWzjKK4kTx+MvkCWzkTvVghp5uY+S3HXrS1Nv8hUFX192LIEtntAo2FH3hkhc3tFpJ1bsoVi0KqzEipRLFo0uRpRNd1xMzMzJtkMnmuahS3DnH25DBHe1SCBwJ8i8X5sGJg4sYolslmUiiiwo3JITRNY9d+Xrv7/H57QL05NTHK4e5WANKZLA/erVHBxXbBxDBMbk10ksvl+AWD+hkUofZ2KAAAAABJRU5ErkJggg==";
                break;
            case "help1" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABQAAAAWBAMAAAAyb6E1AAAAD1BMVEXM//////+ZmZkzMzMAAADr3BzJAAAAAWJLR0QEj2jZUQAAAGBJREFUeNptzu0NgCAMRdGuUHABCANAYAHx7T+TbfnQRO+v44MYqFqZpMKS9w85GyNwsc7FQamzEa014YFuX8aTgZjGH9ymnvNgAvqkjGEz8CYvWp/1n6+7izWO5JGEGd3GGBy7/dylDQAAAFZ0RVh0Q29tbWVudABUaGlzIGFydCBpcyBpbiB0aGUgcHVibGljIGRvbWFpbi4gS2V2aW4gSHVnaGVzLCBrZXZpbmhAZWl0LmNvbSwgU2VwdGVtYmVyIDE5OTVM6PTEAAAAAElFTkSuQmCC";
                break;
            case "bomb" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QwDARgOPQO6ugAAAZNJREFUOMudk71SGzEUhT/J9hriPEDGBTCTN2B4Axc0FHQ01KFPCbUzjtN7Jn3SU/IuTIoQ90S7lvfPq5Nis2vIuonV6M5I57v3niuZ2Xz6AfjKHsta+5HZfKp912w+Vb+hLZfL/8o+Ho8BaAEqinovSyhLqCoUAkgYa6HXg34f0+/DYNCCtgDva3FRQFliJIwECIwFa1BvUIuH0Q7AagVZBkXB8fk5AE/39wAcXV4C8OvhAUURGr0hhPAPYL0Gv8LmRUtvhO2dOIYowlqznUQTmDSF3zFyjp+LRce0p8UC4xzEMawzqqp6XQFpipK4biPPOwA9P6MowhweYkZv2xbaCvAekgQ5x8ntbQdwfHeHnCM4h9ae/G+SrQdZSogTzNq3oh/X14B4/+07AME5zGYDabpjCmmG/AolCY9XVyhN63ECjxcXmIMDzGgEIaAs2wHI8/otrGpI8L72QsI0vUtYa18BWg+Gp6eogUkgIYk6VHMAEsOzs24F7yYTmEw65jVuA2w2mzZ+aeLN5y+f9vrOwM0fpocVsnebVZ4AAAAASUVORK5CYII=";
                break;
            case "link" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABQAAAAWBAMAAAAyb6E1AAAAFVBMVEXM////MzP///+ZmZlmAAAzMzMAAABgX88jAAAAAWJLR0QGYWa4fQAAAGBJREFUeNpNzsENwCAIQFFW0DgBrV3ApPeaDmBMdAT2H6FgRfynFxII0EYFuIpcjEYsxmiU8eDVe1cS0SQe6Vai8vSISrfRDz5O2uiNWfhyLthaXgx2LC9KzJb++EmgGXySDiQUgmrejwAAAFZ0RVh0Q29tbWVudABUaGlzIGFydCBpcyBpbiB0aGUgcHVibGljIGRvbWFpbi4gS2V2aW4gSHVnaGVzLCBrZXZpbmhAZWl0LmNvbSwgU2VwdGVtYmVyIDE5OTVM6PTEAAAAAElFTkSuQmCC";
                break;
            case "quill" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1gEGFgQD9XZoggAAApVJREFUOMutk01sDGEYx38zs7O1SLfMLMGBVtCJ4KCJg6C4NHEgUkmJr2NLilpBpEQQgooica1EE8Q2EtGDS320REiJj52lRWJbldRud2c/ul27O68DO2kvTv7Jkzzvm/x/eZ43/1dinPYdaNQ0TYsUz9FoVL/aei3KPyQVG/+hA2tLvWVdS1bUiBRTJVWMib6XD6SEFV93qaX10T8Bjfv3arruiyysqmEg7WHl4lmY4RjpZAIr1InLpaAosmNSVTXgbzq8BcAFoOu+SPnilXyxSqhbXc4kt4KqyHSHBDOWbGD4fSfHjjY7gPMXz9YWe5dzO9nHvOmlFGxBNlcgm7PxlZbwdWgMCbCsOABebxklb45zeassgB3OXGohweBwgnAkQzydZ47mwS0X0KfYAIRCIQBatynsutJDde1+gJsyQMKKr+t73cXMUglzYISR1BgvzO/EUhmi7++zaeMmDMOgrUFj99VnDD5t5505WACQAaaVTe+qKJ9P+NU9Knwl9IR+khzNMvy6A13TGE2POuaBJzd51x9lxOxQgCrpzJlTYu68cny6TtAMkkqnnGdZtnQZ1WuqaWvQ2Hmpm3BPO28/RYmZAYCqplt2rwtwzAeb/FhW3NkX+GNueUr/wzY+fk8SMwP8WlTPkZPXewFJbm4+IQXNIPnCL7toMgwDwzCorKzkm7yC4PPn9A9ZxIJ3qTv9Atsz28mQDOA/eEgCEMJhIITgxh6dzz+i3AkEiHzoYFV9B5O0BeRyuWIEhDwulXY+n58AaLpls37mZ2o272Z5w2PE5Dkkk0lyuTyAMjFIgKq68XrdDiCTyZBIJMhmsyiKgqqqf8sFYE8AKIpy+0LLue1CiAlTFEuSnH+Hx+NpB3L8D/0Gec0bDM69rVkAAAAASUVORK5CYII=";
                break;
            case "system" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QsECzcg0anuZwAAAB10RVh0Q29tbWVudABDcmVhdGVkIHdpdGggVGhlIEdJTVDvZCVuAAAB2UlEQVQ4y8WTTWsTYRSFn2lrgzSdNCOhJkM3gcbdhGRCSIpYdSU1WYkIFQQhZP5BEVx1IYgrETct/QOlLQhDslEMWEGRvPmYooLbJJSJNCVZtIgfcWFnSNt01YV3dXnP5XDvOeeFc5Z0FvD02ZO+0z9aenzm3JjT3L13J6PrcRNAiEoWIJ8zWF1bOYadJHMJdD1u5nMGlmUBmKGgSstuEAqqoGOmkmk0TQPoD5KMDbJZlsWlaT+3swvuWywRJUbUxU/WqNP4Fb/40/+9GLkyS6vRYvvddq9ttz071k5vyjflmfBOUCqVEKKS/fL567djGziChYIqALVarWfb318JUd1UFOWqJI0+XMjcCjjn6Hrc1WLEYcrnDGKJf6v6fD652WxubqxvmZ1O570sewPOOfmcMdyF1bUVQkGVWCLKwcHh4dxcegkgHA4b3W63B8jVcp3CbvG0Bm9ev132K34xOeldvHHtJj9//bjQbrcDkcjsA0ni8vz1eXncM05FVBCikn3x/OX9oTamkmladgN1RkWdUS8eQbIzk0qmAcyN9S3XxpHBdTRNY8/ep2AWqZbrAFTLdQpmkT1738nBcA2OVO27SdQxM9MZCrtFJ5nmx08fTiXx3H/h/9dfs1mvKwIMuy0AAAAASUVORK5CYII=";
                break;
            case "folder" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QsKEjkN+d1wUAAAAX9JREFUOMulkU2IUlEYhp9jKv5AposQWgRBtA6CmSCa5SzjYhG0qYggiP6Y3WxmtrMIol1QM84qRKRlSVC2bBcYRpuIIigFC7F7j0fP/WZx7QriBc2XDw6cw/e8L+9Rly6XtorF4jZTMsYE58Dc2tvdf0KE1J17t+X61RszH7X2eLb3lF6vd6VaqT2PBJSci7Q+taJMeNt4M331qFqpPQCIA6TTGY7k8pEA50IpcFMKpRS1F9X7QAAwxuB5Lq8/9ml2Msylww5nbjpSSOnPYYJmJ8PjjXW0sXMxUslD3H1YPxUH8DwXgJ+/NV/af+cCnDiaBSCmtSadnjP6DMVc1w0T/BfgXwdLARZNYK2PHgZlh7+QiPkIICIopRARRMAXwVphaH3MSBiMLEMr5LLJCcDzXI7nBnT7hh9dD0ThI4wHERAEkTEYGFmZAH512pw+e44PX/+MlwJ3EfARBAUiYaqVkwXqL1+R19/L6vy1nYabOLa2aHnZ4bf378qbqyyrA8KHtMqnsOL4AAAAAElFTkSuQmCC";
                break;
            case "image1" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAgACAAIBEKJNNAAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QUbCyk51smA0AAAAhFJREFUOMudkztoVEEUhr9zziy5m5tdA2p8oGgiQbEIpFEEUbAVK4lBFEQlSNAYERSTYgULW/GBD0QQK7Wx0M4qjWJjs5WFRUARk911N0t01707Y3GT2ESImWaY4p/5Ps4/wirWvj27poADkCCrCH/ff/BwTz7fTX2uhP7vBaLaE8c5isUivxp+ZQR7BzcH0QgIuEzEt9mfN/r6dhQGBgaRoeGjQURxzjBnOHXp7hzlcoVatUaj8pEQ7b4JkMvlkmw2W6hUKohIqvDiyjVUlWdjlxFTHp87j6jy8uoEqopzgUd3hicf3j42WZg4Urg4eoitWzaxccN6ZPj4UDAznDnMOZwZ5hxmRrlcplat4evvufvgHh/evWZnfwf9vQ1mv7zi7VSCqgqqipqgpogqqoqpoiqICnGU0Gq1mKtNk3FN2sk81fltADjvAyIe31ZEPIrgvactgveB4ANd2YRMRlFbRyvpIIoC3fE0wMoIAFqJx7dLZFyTRuMvgYoYqoaooaKYpUFVRUVRhLX5JoTlR+wWA4svqqQEqikNknbtnwopsi2EbElBbIHAWFQIyyqYKE9GL6Ci3D8zgqly68QpVJSnY+MIig/WjqJY4riLer3Jp89Gtqs3rfbZkdNLPXAL8zeXnmdmZ6iUq2yP3/jx68/1R+mr74zXSNSZl6Sdp1QqrewvXDrp2sBvH3ACJoKAB+API0Gz8DSo/XIAAAAASUVORK5CYII=";
                break;
            case "movie" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABQAAAAWBAMAAAAyb6E1AAAAFVBMVEXM///////MzMyZmZlmZmYzMzMAAACJEDptAAAAAWJLR0QGYWa4fQAAADlJREFUeNpjSIOCBAaGJDUwSykVxHQBAjEQMy3N2djYWCwNLApmKqEyiVAgCARQBfS1As5kDYUCBgBmJTTqIcTrXgAAAFZ0RVh0Q29tbWVudABUaGlzIGFydCBpcyBpbiB0aGUgcHVibGljIGRvbWFpbi4gS2V2aW4gSHVnaGVzLCBrZXZpbmhAZWl0LmNvbSwgU2VwdGVtYmVyIDE5OTVM6PTEAAAAAElFTkSuQmCC";
                break;
            case "script" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA7ADsAOwdIxY2AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QkPCjsE7Rz77AAAAZFJREFUOMuVk7+O2kAQxn+DVqIMzgMgCgo3SMdbRIqoUvAIuZrGDQdyB/QUNPScriNNJN6BlFTISAiwgysaaJgr1usYTnfRjTS7q9HON9/8k8lk8nI4HH7wOWn3+/1nAMIw1M9KGIbqkIx7pGmawwuCCkgxptjjq+fdUDH33EQkuy0QgKoD0ze5mGIE54AIogW7ZAxU3geQIgPNDIIFEgf8EQPE5u7+i+XjfJX7olgpFVNQ0eyP5LeK1SSJefz5yG63ewdAHYcC40z/JjG9Xo8gCOh0Olyv17cAUuTnCioQJzFPT9Z5s9ng+z6r1YogCB5uaqDyr/8lBEVJ4iSPvN1uMcZQr9dJ05QoipZBEDTv5kARzYZIJHfe7/cYY/IZKZfL1Go1oihalu7baPutKMpoNGI4HGKMyfV0OuH7PlEUATRzAM/z8DyPSqVi9UuFarXKYDBgOp1ijOFyuQCwWCwAmrPZ7I+Mx+Nfx+Px+0erdz6fWa/XtFot5vM5jUbjd7fb/XbD/L/7224/AEsX2dlfAZgsvxGj7otLAAAAAElFTkSuQmCC";
                break;
            case "text" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QkWEjcpO1ICSAAAActJREFUOMulk01oE0EUx38z3aNIFiIt4rHgKaBYKwEPghWEeOxF0LYnr6UXFTyKIMUg9SJ+gJoWijG9WxoRTVwQ7cFi040bTP3A1WzrEBVakc14MEOzbWorvsv/Dcz7z29m3oP/DGGS4l36gBng2FZ6eIi8qZMAl0cvnQFmDh532I62ElhNvQHw7fk5tqNXT0rdrDstjdPeVEBZFVjdk6esCvzoethWX0xLBseKHOkfBhg3BMTjccSJpT+LfU1lTX3fJ39PMnTtGR+ejDO3EIRAh9V6H6UU9Xp9w0sHQYCbSa0Ve8t8LU11AD0RA9u2sW07Uuz7Pm4mxeBYkcXHGV6Vl1GlHEDPyGRj9q8E5uSBdIHFfIa5twpVyvFz/0XOn70wC4hNCbTWFNK9DFx5ijd9h8rn76j5B7zvGqazzTdGCLTWZLNZfslDzDsO7z7VWXo9Bb1pdq2sANo0oW5LEIYhuz+mefSlm/u5HN3yJTv7bpFMJnFdlzeVBYyLXE9QrVbxPI+RyQZHOyus7kgQHhglkUhgWRaWZUW6eANBLBZDa02tVkNrjZQSrTVCCIQQrdsbEQOlFI7jbDp1xmR9GIOJm7evn/qHKZ4wyW9aneiYeQn8EgAAAABJRU5ErkJggg==";
                break;
            case "world1" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QQaBywH5hnejwAAADV0RVh0Q29tbWVudAAoYykgMjAwNCBKYWt1YiBTdGVpbmVyCgpDcmVhdGVkIHdpdGggVGhlIEdJTVCQ2YtvAAAC7ElEQVQ4y62TXWhbZRyHn/ec95xjkzRpm+ajjW3W0KIsuHWyyMSrKagwFG+UKd1FZTgQb4ShoLdSEMX7XYgVR0HE6Y1MhjezMLWzlo12K67rXD+znCwfTXKSc5Kc1wvZxO3W5/r/ey7+/H6CBzj+3uwp4C1dyv0KLOX7DaVY0HTt7NzM1BcP3ov7wfe/nDR17ceJsWTiyIE0Y6koAcuiXG+ytmmzuLLJjY3CZSHEybmZqav/Ebz27ue5YLjnt1eOHhQHJ+KU603snQ1kKA49/eDYpBJRFla2OT+/chchnr0nkQDRaOin55/JiicyA5SKeQZHs0QGh3BabfKb60jfQ+s2eS6Xoeur6IVL188ATwNob3741UfJeH/4aG4cQ/PpyBBoAkNKTEMSsCSJaC9D8RixviC57KOkhweOvPHB2WkALRwJnDycHaVSLnLHDRAf3odS4CtAaAjfY7fU4PuLy1yYXyRiKfaPDwO8CiBrTjuWTvazcKNAZiKOr/79bL1S4qnJLEIIlFJs796h1WwyFIsAHAbQWl5HsywTLRSnUm9h1zwct0vN8fDqNkL8oxNCkIhFubp6E8uQAAMAUtc1v9poacHWDiFpUWgMUjRMOl2fVqnDZLuN63r0hoI4jsO+VIxC0wMoAUhD0/K3torDh8aTZEaGuL25zfzaHh4mTS/Ip99ewRJd3n75ALVajaVrN6E3DfA7gKa63XNLq1t4vgQgPZLi2KEYu4USd6sNqq7gdtnHtm2q1SqP9KdYXc8DfAOgL/187vx47qXTQtfNSNCgx9T5ZXGZ5byi1nDZa7jsOS65EZ3CnsdW2efa2s6vczNT79wvUqVQPHHxsv+d78OTjyX44UqVsmfidbq4XgfLEGxUFH8V2lz6Y60shDj10BaOTX/8+mhmZDYc6TMfzyRJDoaxLAOn1WbXrvDnrTxbO8XrQpfHH9rCPfoGxswXTpye1a3Ai+iyD4RQyu+oTntdCe2zrz+ZPsP/zd9wbDf3MdodlQAAAABJRU5ErkJggg==";
                break;
            case "down" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QsKDTgPGbLEcAAAAIx0RVh0Q29tbWVudABNZW51LXNpemVkIGljb24KPT09PT09PT09PQoKKGMpIDIwMDMgSmFrdWIgJ2ppbW1hYycgU3RlaW5lciwgCmh0dHA6Ly9qaW1tYWMubXVzaWNoYWxsLmN6CgpjcmVhdGVkIHdpdGggdGhlIEdJTVAsCmh0dHA6Ly93d3cuZ2ltcC5vcmdnisdHAAACV0lEQVQ4y52ST0iTYRzHP+/b/DNz8s7ha1q2iZpIHSI0tgQND2mQROEhhMQiqFiNeepgYR4MIQPxIEWHpCCEFQVF3SKhg2Z5KLKDmmhZhuRwbqXb3vfXYbYSLcjP6XmeL8+H7/PjUc51XLg4Fc5X5+ajC0ABUAfsTFFl2Zb+/VtWWrSvv/NKK39BqfH3NLl2lLmcufrk7sIcv9Nu3ROJG4x+WeT10IA59nGWUvub7b3td2fWFXjbOntjobmzcVGZNTR+pOWwyZJCY+0+ivKz6b7/AuPTCK7U+fXut+Nt8cn05wkREZmYGpWh0Qnx3Xgi7tNXJTA8LT1P30rDpZvybnJG/iQcDovP7xVLmsVga66LYDCIlpmLqixglSgAI+Oz6JkWvs4v8n7iA1uyrKAACKmpqQBY4jEQUzBMk/rWW2s6Dk0GicUNugKDdAUGAXjccQIkkasAppiYhknPGQ8AzceO4HGXs7QUIc+mUumuoKmhHoDjNcWYhomI/BaICHa7Rn6Oi2unyunrf0CpqwAVBRUFd5mT2/ce0VhdyOHKCjI2Z6wWAITDYXRdx5lXkpR4dhVR4tpG952HNFYXcrTKja7rRKPR5BMtAKZpEolEANB1HV3X6T1vpeV6gOWYwcnaMpoPHUBVVUKhEJFIBJvNlvgHPr9XKsr3IqwM+D8YfvUy0cDjrgSRFYOSmLAiIMrKNqEvKS5mfHwMQUH5U+BwOHg+8CwZCLKmzf6qGgCyHQ4QJZlbADRNIz3d+s+6ml0DwK7ZV51bfi3qag+yERSf33sZaGNjtP8Elb70qz97tp0AAAAASUVORK5CYII=";
                break;
            case "tar":
            case "compressed" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QYQEhgJtRvS4AAAAalJREFUOMutkjFoVEEQhr/Z2913d8k9YgxBrhARBJEgSSOKTcTGUgkoh41YKJYRCzuvSCkepBGUFLEJaBUsBEUPtRT0mohibIyYIipRouFd3tuxeDkVI3hRp5nZgf+b2ZmBfzQBaNTMMPBsk9qR8ZnQkkbNNIHRs1cX9P38YxVbNqAAGCO5F0g+L2JKAxlpIi+e3jNzD6cB6hbg9OVWliy/MbOTp8Q7B8DaWhsfRQiCcw5TcPi4Wjh28Q5Lb5+z+8AYr1v3Ry2wQ4yYkKViCp405P1FvQMAVPqrIAaA6q59tFfeEShQ2bINDdmwBfqSlQ+8fHKbkxemQLMNn1UFUAht0o+vSFY/4YoxABYoPro5IYePnoP0C2SroAHVDEKKash9WAdrYM/e/TyYvQ5o0QJ+cPuQYozgK0Dlx3pQJK+9/qYzX4ZGDrIw14ykUTOXgPpfnkG9cwd65MR5luebXaninYe4e+sK4zNBbCfpozI98dauAM5H3+OfACWI+7sCmKi4EeBKPdguAan7XQdxleB7/yDN9xGC/AKw5WvTE8fPbGb8XxO9wf+wb+DSh8wTKaW0AAAAAElFTkSuQmCC";
                break;
            case "compress" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QYVFCkaxKsYDAAAADV0RVh0Q29tbWVudAAoYykgMjAwNCBKYWt1YiBTdGVpbmVyCgpDcmVhdGVkIHdpdGggVGhlIEdJTVCQ2YtvAAACtUlEQVQ4y22TS2xMcRTGf/97p2aq8+yMRxGtpl5FBEG8FoQFkdDUW7ASgkTYCAsJiW0tiJUFKxLEIyLeYqEhilb6Ho/U0Kmaaaczc++duXfu/dtQfTirk3PO9+X7Ts4R/CfO71TmA41DSlFg67FrTtPIWTECuBHYA2LbvkOnCQQjAAykEly9dKYA1B275pwYilH/JnU7xGYhxN3dJ29O94+x1PIFmxDF48ATwTU2TLTljbLh8JUls5WXZ9dUZZseNdM+qKBuh1gnhHh89MIH6GvmS8sr0jlBZPJMAOJdrYR9Liqrl2GHF3HxSDVSys3Hr8u7CoAQonbtkVuQ+ADmAJXT51JVMRlFj6HoMSomRaisqgZzAPXXa1YdvIkQYheA64+DAzMrJoDlgqwOgNcXxOsLjlqwLPIyKVgEsA3Y/pcA6+d7FO84xPilCEsD/Qfk+0F1g2ssBfcEcgWFns8NdEffDhK6/lEXsN+dQ114CuEvh5IpFDxlWEYWI5Ogr+kG3S1PyGoGoVnrRxNoep5gcRhsE5n6BLH7GKZA03Okkz/IasYgKFtwD+YKQL1TQ6tWga36IfMZ0h2AROb6cIzksB30WQFisop6p2a4gpRuczm+mpUix+ySLqRTRIZSkrZFwpLEjCI6UyXEUzaLC+poC46UuMe4ac9G0ELL0Qs6/U4/yXySTC5DOp9GczJABinlcAsAHo/HLg2H0TSNRCKBbdv/exMCgQABb7Ez7JQ9btftru/dh+ZVz5FTp5YLBDiOg2maGIaBaZoEgyHKJpYRDgXkw2fPlWh7296en78+qgDxeG+vW7UfdPcm9ndGO5kzY5oTDJUKr8+Pz+fDNk1yer/d1NyqtHV0iHdv6mvaOr4+BQwxQqF/xcpltWGf2OL2l20Y2tCS3+71pKwX7xsa7wBxIA/wG8WmJi24cShhAAAAAElFTkSuQmCC";
                break;
            case "comp.gray" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QsEChUbxtIrVAAAAV1JREFUOMutk71qwlAYhp+vuhkNkWwODoIi3oJmdejYodfgLTgoccgliC5ddGnp2sFRcPUCTkToomTQnNUpdhCDMaIIfafD+3Ge7+8cARiPx99BELzxnN77/f4XAK7rHp+V67pHgOwlcr/fE0URACIS++eziJDJZDBNM44lAFEU4ft+4sKlRIR6vZ7wsteN1Wo1AHq9Xux1Oh1KpVIKCPByncH3fVarFe12G601Wms8z0MphVLqPgBgOp1iGAbNZpNut4tlWVhWgWq1Gld3F3DOuFgs8DwPEUEky3b7e3OXqRZOGS1msxnFYjGOjUYfBEHwuILL3sMwJAxDtNYcDgeGwyG73e7+FlqtFo7jxBVtNhsmkwmFQoFcLsd8PqdSqdwGiAhKqdQ7cByH9XqNYRjk8/nH7+A0uCSk0WiwXC7vAy6Hdi3TNCmXyyk/C2Db9s9gMHh95ivatv3Jf+gP4I6j5m0xmyQAAAAASUVORK5CYII=";
                break;
            case "unknown" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAM2SURBVDiNbZNbbFRlFIW/8//nWlEawIZOofQ27YBOqVOCBU1TLkYt+qKihsSEmBgTKwZJTCdBjGmirRck8UENiRHS+OCDCaBHI4KO1aAFaRla24Jjp2KdoS1Qe5lpp3bO70NLA8Gd7JedvVfWXllLU0pxYxVvawkAzwB1QHB+3AVEgNa4G+67cV+7DlC8rUUAjYtyzFd3PrrOvifgE5Xl+QCcv5ik80LCO3Ts18xkeqYJeDvuhr0FgPnjtvuqikItLz3snIoOcKI9Rk//MABrSvJ4oMbPxrWrCL//9dRPnQMdQG3cDXv6PJPGTetKQ2/uesjZs/9Lro2l2fvcZir9+aSnZvihI06r28nxX2K8u+cR55UDbvWPHfFGoJmi+uZAcPt7qb+Hx9TT4U9VUX2zerHliMpmPdXTP6RGx9NKKaVOno6pmp0fqYa3vlCJkXEV3L4/XVTfHJC5/q0vv/Dkhk2j42nt0LGzABiGzmfHz3PYPUd79188vuVuVi7P5fPvexkZTVG6YgklK5bKU9E/JwRQV1Xh0060xwCwTJ1Ll8dIXk1hWwZVFT4Arv6TxjB0chyLzt+HCK0uEFKIOh0IBsuWE72YxDAkpmlgWQaWaRAKFLB7x0aUUhw82oFjWwihkbgyyeriPDylgtdFRAgNQ9cxjbm2TIO9z9Zi6pLDX0XpuzRKjmMihMCxTDQ0NEAAXV2xy4QCBRiGnGNh6Cy+3WYgOcaZ3gRt0UEc28SxLXIck/LCZcQGryGk6BJA5NyFhLdlfRm6LtF1iWHoaELwc/cgp3uTSCmxbWMBpNKfR/cfQ14260UE0PrxkTOZDWtXsf6ulehSoktB7iKH3U/dS8Nj1eQ4JpZlYtsma4rvpMyXy4HWSEYp1SribrhvIpVp2vfBN1OvP7+ZUMCHlAIptQW/G/O6BAqX8ERtKa99+O30RCrTFHfDfTdZeWuNv/qNhgftaGyYaGyYxJVJbHvu58rSZZTkL6bp4Mlpt63n7My/s7VxN+zdEqY7brP37dpxv11V4dPKC5eiaRrxxCi/9Y9473zyXWZ8crop63k3h+n/4iylqFNKBQGklF2zs9mIUuqWOP8HZvdMlKLbimEAAAAASUVORK5CYII=";
                break;
            default:
                if(function_exists("imagecreate")){
                    $imgtext = "";
                }else{
                    $imgtext1 = "iVBORw0KGgoAAAANSUhEUgAAAC0AAAAPAQMAAABKsNTkAAAABlBMVEX/m5sAAACNNGKnAAAASklEQVR4nGNgwAbsEhskEhgYkiHUgcQGngMgasPx9gcg6jBDAsNxEHWA4TCQYmwAU8xADcaSh9mA2uX4DrM/AJqjcABsnHwDAwMA5uMazHHVIWwAAAAASUVORK5CYII=";
                    $imgtext2 = "iVBORw0KGgoAAAANSUhEUgAAAC0AAAAPAQMAAABKsNTkAAAABlBMVEX/m5sAAACNNGKnAAAAVElEQVR4nGNgwAZsEjdIJB9gSCvcIPMsgeFw5Qb5NwYMzJXbpRMMGNhyd85OSGDgyd1wO+EAg0T6hhuJDQwGyRtuJDMwJACpNAaG/4kbbuR/QDUSAD87HICLQ7oHAAAAAElFTkSuQmCC";
                    $rand_image = rand(1, 5);
                    $imgtext = ($rand_image > 3) ? $imgtext1 : $imgtext2;
                }

                break;
        }

        if(!empty($imgtext)){
            $iconcontent = base64_decode($imgtext);
            cmr_header('Content-type: image/gif');
            cmr_header('Content-length: ' . strlen($iconcontent));
            print($iconcontent);
            die(0);
        }else{
            $im = imagecreate(45, 15);
            $bg = imagecolorallocate($im, 255, 155, 155);
            $textcolor = imagecolorallocate($im, 0, 0, 0);
            imagestring($im, 5, 0, 0, $cmr_imgtext, $textcolor);
            cmr_header("Content-type: image/png");
            imagepng($im);
            die(0);
        }
    }
    return false;
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
* cmr_img_by_path()
* Receive a path to an image and send the image to the browser
*
* @param string $cmr_imgpath
* @return
*/
if(!(function_exists("cmr_img_by_path"))){
function cmr_img_by_path($cmr_imgpath = "")
{
    if(file_exists($cmr_imgpath)){
        $cmr_imgarray = pathinfo($cmr_imgpath);

        $iconcontent = file_get_contents($cmr_imgpath);
        cmr_header("Content-type: image/" . $cmr_imgarray["extension"]);
        cmr_header('Content-length: ' . strlen($iconcontent));
        print($iconcontent);
        die(0);
    }else{
       $imgtext = "iVBORw0KGgoAAAANSUhEUgAAAGQAAAAWCAIAAAC5aq7JAAAAAXNSR0IArs4c6QAAAARnQU1BAACx";
       $imgtext .= "jwv8YQUAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAAlwSFlz";
       $imgtext .= "AAALEwAACxMBAJqcGAAACXhJREFUWEfdWPtXU1cWDhbXsmuNP/hDf5+/Yf6OmVkj0k7VKdVaH22F";
       $imgtext .= "Fplqa6tWW54KWHmICBYQEsIrQBKQ8BDC+y0gIigPIRBBEY1CxOTczLfPuffmJvjorGlXlxM+7jp3";
       $imgtext .= "7+98e5+dc889JyE+n0/3ms/zzmcPF5ecC0+fPPE8ca26XE9Xn62trno83ndC39m8efOmTZskfBgL";
       $imgtext .= "CQnR6UI0aiE6+lM/FGVjKOqk+fxvBNLiYeR/5KPmoAZChoxJ+AsNDd2yZcvWrVu3bdsW+u67f3rv";
       $imgtext .= "vT//5eDrSsEH8JLP85Wmic4LDTkHjYnhlSk7azP32g0x4/Zzzhs5y2OFz2Yq3E6re8Hqnqtena10";
       $imgtext .= "O6rdzhr3vIUacxo4zG4HjGZyCZAlEKrrNyEI8TlASQMpCeOCiF7tnqf2msP8dKp8ZVy/OJI73nzW";
       $imgtext .= "ro+2pkUY47ZjvN2GGMdQ7kvLElws11RJhyFGH7vdEB/WWXp0eaxgdblRkgaZNMLYKGNjjI172YSX";
       $imgtext .= "3faycSZNMOkOx20mwR4MTvDjDyUgW0qVJy/ynGCEMUm6KUlDkqd7bbnh4Wh+mz5a/9M/ihN2DFtO";
       $imgtext .= "BZXMX6wXruYh88miH/9enRYx3ZLsWbQwTydjfczbK73olrwDjNDLvLD080aPxPokNsgxAHA7vCr6";
       $imgtext .= "JaYCBHi1hH4mewckibpzguirMkV34d2oQEyFIAfakAMyFC6RJ5R7ePJoDNJVHgJoA8iHsW7vevu6";
       $imgtext .= "w3SnPg6zrCTx/bmeTLVkcrFe3Le2F35Zkhg+XPX9+mSxtGRlD2p8y3W+R4CNo05avhYEjZc40nIQ";
       $imgtext .= "R+1L3TcogFwnh1ipDwxBLhFLm8CrcxB5UrgNOagKIhk1Q9GokxD6sc23YvOJWCs2acXmfVDrW7Ss";
       $imgtext .= "3cpvK/zSELt92HxS1EsuVm/5scIzf2vK/WyyIX62+dxsS/Jsy7mZ5rP3FOB2zi4bYZ+5LrtgB0dc";
       $imgtext .= "AdjJu4EgOFDgIsmcmYQrbqndlCgIctzrSVxf1iRlORwRAuxyL9hlvCoHEQ59KQE+ELRhxGDn21Jh";
       $imgtext .= "FAR1INNNSRjF+LUfbZc+NcaHjdaclos1Xh9XmhhemvRBY85BW/b+msy9tuwDINVl7bt28RMADdul";
       $imgtext .= "/XDVcaOCT8HRoi5L690HsipCtOz99QRSBq5xHZJFWw4BzgHQZFc2uVRNtHn3/zKHLDlDhBAK0Ldd";
       $imgtext .= "oihqDsKoGRey4hlepOFb0/fggTNf+OjpaJ6OOavrLx8ojt9RHB+GpxTruj6WljeyJOwwosGBhoE4";
       $imgtext .= "GnCjFnIvlaN4RXchBRGEUKTCKGjCDmRDXoSOgytMCSc31BC8O3Xxp/Grc9CKBIyCkpHTwPB5GiJK";
       $imgtext .= "ON5yRXjRxW0vOP1XZIiZpMMMbLh8EDeYWQAaWNVobUt6vzQQsHMLaPx69oOyQMAiRGRwr9KL+kLT";
       $imgtext .= "SOIE2HGrjaJ6ySU4QQlouss6XEGLgAxfl6Q8OhFLHRElKTJMoIKUn/snr2B41fl/YYrpsKLXZOyF";
       $imgtext .= "1ZSyE5OtMnV3efKHptRdppRdlala7BZGjp10DfASUyHA+/YSNMNM3YWyVFBZIlDB2sxPdLdrzzRc";
       $imgtext .= "PlCTsQeV4ovUPkvax9aMPSgkjAB2pOpVWKzpH8OrEoSR2wXgfWsJNNi9Yvi4WtIiMC6sXFXndzfl";
       $imgtext .= "HtItdqW1FkSiXmL9xq6d2rTCifXYD74Y07oovP//hOz9WKdQDUwgNDqKvtIt92V1GWKu//I5bloL";
       $imgtext .= "ooAOfXSn/kh74VfYeWGjATsIXcUxwoJbgLepIdCpj+aNaLLDywmBLn8viHAEKATJChGtghJCiL9B";
       $imgtext .= "IYgg+gYo8GzFQIQL6DIcQbvtKuWGIohAoLVejUIdbpiOo1gXRy2n4Aapx/jvgYpvb1R+P8SB5Wyk";
       $imgtext .= "+uRw1QlxO1J9Ahbe/m4IjSoiDHMjt3+HjjdMuHLwhmCqNOqF7ryvaPgVhLjsUkQUBTkiV36zwsYQ";
       $imgtext .= "PD0eNCg9JHx80HScj5SGicFiyGijDoMVsJ/oKzuGemG6jNf9pHMN5Uw2JvSXHUNpe4xfw40N4WJX";
       $imgtext .= "urPjZ2fHhaXu9Ac9GbjF0/qwN5Pa3ekwCuBWg8ylbiBDiwc96EK9BNSOr1DQEmQdRUHoUIhFCvGq";
       $imgtext .= "HF4TQlXwZwhBGlRvJkaHceEhw9RxdqRh7A/7Ls63/YwFHdXsLo7pL/sGe1QdmzJiC4uS95UeGyj/";
       $imgtext .= "BhW9Zf1hof386s08uNh0ibhKM6WeKaNn0uid8oO8KshbHARBVjnavkEuwfETJmW1oC7QD7IE5KBV";
       $imgtext .= "UPIMUg7MkNKTEPpeGQ3zrgFX70zp+kQRCnfHFofno6/0aG/J13j4UFAdzkSro3l3bbF4YrHSY4rh";
       $imgtext .= "ybppOTXdlPio/5LnrsHnMPkWqgDpvjkIOEBp8VYSMIT7Zp+zWobD9Pz2VcyVUesPmECYOngAURNU";
       $imgtext .= "Y32sQOdbb5Oc1Y/6s+DGsoUXpJ2XDI8uTkaoLk5MeLKeDOWgpphcbM5EcACV0jwHGg4TwI0BkAmC";
       $imgtext .= "Nl/5uxMQXc7NnwalpyRAOVD+FX7avTLMI/etfNdwLp5uDHbCFjtiOTVQ/i3edeIlOF575vFQjm/J";
       $imgtext .= "SgdptmZns+VLXekj5pNY6RtzDmEbgUM1aocZiNVuoi52qjFhqilxWpw26aSNE2kKHYxbAH6IbaYT";
       $imgtext .= "snqgFadicXJWEUyAjqwgdJJJmYvfkw/Gb1IIDMG7K+khQ8qKDsziDO+Qj/Eajj0FXpyZMS5MC4y0";
       $imgtext .= "t/Ro29Uo7A1wBMQuCu9ELFsrA9lsvsr/qwNzt3kXqh4PZmOxx+LV/MsX2F9gzyq2ZNhtNV35DMaW";
       $imgtext .= "vMOYd/b8SHtBFErZCvDdBp5fxGgthCVKA9p5aEH8AAJERHcZ9vwoLh5JFmK+USFQH7kp6QlNCIr0";
       $imgtext .= "aBsENTkc9CNpQ8D3BMD1K59j84jtN4DNJiZKS/5hLOoo/bNb+fRLkfYnGnHDXI3euXJMSKz8eAvY";
       $imgtext .= "8w+jZHTQ7gy6gy7gy7u7u5z8/YGtrTovARh/bfwFscFVg124B0gBhpLaym5cbwqghBCjArih/hEC/TiEgBFcQ6eHK";
       $imgtext .= "G7DwfNSzhzYBMqbvQdqoEYrVmHuomfab0ViCMBldw1cwgbQ/lr7sN3hXE2ad+44eEw2PCV6OeCO0";
       $imgtext .= "F0WLbwYlb8n7gr7//EjeOAwjrsIovkZwxFeHq3DRd4i+eWiTizODXCTFZfnkhQgxxdQjsqqACQ4O";
       $imgtext .= "xLkyqQkOrhgquQooSU7jakoslQmLPKf4NOe77iPYCYzVnMbTilF7pkte+hv8fwDj2WSHhooY+QAA";
       $imgtext .= "AABJRU5ErkJggg==";

        $iconcontent = base64_decode($imgtext);
//         cmr_header("Content-type: image/png");
//         cmr_header('Content-length: ' . strlen($iconcontent));
//         print($iconcontent);
//         die(0);
//
		$image_text = get_post("image_text");

		$text_color  = ImageColorAllocate  ($iconcontent, 255,  255, 200);
		Imagestring  ($iconcontent, 7, 3, 3,  $image_text, $text_color );
		header ("Content-type: image/png" );
		imagepng ($iconconten);
       die(0);
	    }

    return false;
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
