<?php  
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        func_download.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/ 
 
 
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 


 

 
 

 


 
 
 
 
 
 
 
 
 


 


func_download.php,Ver 3.0  2011-Nov-Wed 22:18:12  
*/






// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*=================================================================*/
/**
 * export()
 *
 * @param string $file_data
 * @param string $type
 * @param string $file_name
 * @param string $from_file
 * @return
 **/
if(!(function_exists("export"))){
function export($file_data = "", $type = "text", $file_name = "", $from_file = "", $mime_array = array())
{
    if($from_file){
        if(!file_exists($file_name)) return "";
        
        if(is_dir($file_name)){
        $array_files_dirs_to_zip = cmr_getdir_all(array($file_name), "");
		$file_data = cmr_zipfiles($array_files_dirs_to_zip, dirname($file_name), "UTF-8");
    	$file_data_len = strlen($file_data);
    	$type = "zip";
    	$file_name .= ".zip";
		}else{
        $file_data = file_get_contents($file_name);
        $file_data_len = @ (filesize($file_name));
    	}

        
        
    }else{
    	$file_data_len = strlen($file_data);
	    }

    if(empty($file_data)) $file_data = "\n";
    if(empty($file_name)) $file_name = "cmr_export_" . date("y-m-d_h-i-s") . "." . $type;
    
    $type = substr($file_name, strrpos($file_name, "."));
    $the_name = str_replace("\\", "/", $file_name);
    $the_name = substr($the_name, strrpos($the_name, "/"));
    $the_name = str_replace("/", "", $the_name);
    
	if(!($mime_array)){    
		$mime_array["mathml"] = "application/mathml+xml";
		$mime_array["doc"] = "application/msword";
		$mime_array["pdf"] = "application/pdf";
		$mime_array["mime"] = "message/rfc822";
		$mime_array["eml"] = "message/rfc822";
		$mime_array["eps"] = "application/postscript";
		$mime_array["ps"] = "application/postscript";
		$mime_array["rdf"] = "application/rdf+xml";
		$mime_array["grxml"] = "application/srgs+xml";
		$mime_array["xul"] = "application/vnd.mozilla.xul+xml";
		$mime_array["xls"] = "application/vnd.ms-excel";
		$mime_array["ppt"] = "application/vnd.ms-powerpoint";
		$mime_array["wbxml"] = "application/vnd.wap.wbxml";
		$mime_array["wmlc"] = "application/vnd.wap.wmlc";
		$mime_array["wmlc"] = "application/vnd.wap.wmlc";
		$mime_array["wmlsc"] = "application/vnd.wap.wmlscriptc";
		$mime_array["wmlsc"] = "application/vnd.wap.wmlscriptc";
		$mime_array["vxml"] = "application/voicexml+xml";
		$mime_array["pgn"] = "application/x-chess-pgn";
		$mime_array["tar"] = "application/zip";
		$mime_array["tgz"] = "application/zip";
		$mime_array["csh"] = "application/x-csh";
		$mime_array["php"] = "application/x-httpd-php";
		$mime_array["php4"] = "application/x-httpd-php";
		$mime_array["php3"] = "application/x-httpd-php";
		$mime_array["phtml"] = "application/x-httpd-php";
		$mime_array["phps"] = "application/x-httpd-php-source";
		$mime_array["js"] = "application/x-javascript";
		$mime_array["tgz"] = "application/x-tar";
		$mime_array["tar"] = "application/x-tar";
		$mime_array["tcl"] = "application/x-tcl";
		$mime_array["tex"] = "application/x-tex";
		$mime_array["texinfo"] = "application/x-texinfo";
		$mime_array["texi"] = "application/x-texinfo";
		$mime_array["crt"] = "application/x-x509-ca-cert";
		$mime_array["xhtml"] = "application/xhtml+xml";
		$mime_array["xht"] = "application/xhtml+xml";
		$mime_array["xml"] = "application/xml";
		$mime_array["xsl"] = "application/xml";
		$mime_array["dtd"] = "application/xml-dtd";
		$mime_array["xslt"] = "application/xslt+xml";
		$mime_array["zip"] = "application/zip";
		$mime_array["bmp"] = "image/bmp";
		$mime_array["gif"] = "image/gif";
		$mime_array["jpeg"] = "image/jpeg";
		$mime_array["jpg"] = "image/jpeg";
		$mime_array["jpe"] = "image/jpeg";
		$mime_array["png"] = "image/png";
		$mime_array["svg"] = "image/svg+xml";
		$mime_array["ifb"] = "text/calendar";
		$mime_array["css"] = "text/css";
		$mime_array["shtml"] = "text/html";
		$mime_array["html"] = "text/html";
		$mime_array["htm"] = "text/html";
		$mime_array["cgi"] = "text/plain";
		$mime_array["pas"] = "text/plain";
		$mime_array["bat"] = "text/plain";
		$mime_array["inf"] = "text/plain";
		$mime_array["asc"] = "text/plain";
		$mime_array["txt"] = "text/plain";
		$mime_array["rtx"] = "text/richtext";
		$mime_array["rtf"] = "text/rtf";
		$mime_array["sgml"] = "text/sgml";
		$mime_array["sgm"] = "text/sgml";
	}
    $mime_key = str_replace(".", "", $type);
	$ctype = "application/force-download";
    if(array_key_exists($mime_key, $mime_array)) $ctype = $mime_array[$mime_key];

    
    cmr_header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    cmr_header("Cache-Control: private", false);
    cmr_header("Pragma: public");
    cmr_header("Expires: 0");
    cmr_header("Content-Type: $ctype");
    cmr_header("Content-Disposition: attachment; filename=\"" . $the_name . "\";");
    cmr_header("Content-Transfer-Encoding: binary");
    cmr_header("Content-Length: " . $file_data_len);
    set_time_limit(0);
    @ print($file_data);
    $cmr_session = cmr_get_session();
    $cmr_config = cmr_get_config();
    cmr_error_log($cmr_config, $cmr_session, "Downloading file:" . $file_name);
    exit;
}
}
/*=================================================================*/
/*=================================================================*/
/**
 * download_file()
 *
 * @param mixed $the_file
 * @return
 **/
if(!(function_exists("download_file"))){
function download_file($cmr_config = array(), $the_file)
{
	$mime_array = array();
//  $cmr_config["cmr_mimes_file"];
	 export("", "", $the_file, 1, $mime_array);
	 return true;
}
}
/*=================================================================*/
if(!(function_exists("download_attachment"))){
function download_attachment($cmr_config = array(), $file_data="", $file_name = "", $type="")
{
	$mime_array = array();
//  $cmr_config["cmr_mimes_file"];
	if(empty($file_name)) $file_name = "cmr_email_attachment_" . date("y-m-d_h-i-s") . "." . $type;
	export(base64_decode($file_data), $type, $file_name, "", $mime_array);
 return true;
}
}

/*=================================================================*/
/*=================================================================*/
if(!(function_exists("mime_type_icon"))){
function mime_type_icon($extension = ".txt")
{
                    switch (strtolower($extension)){
                        case ".doc" : $image = "word_icon.png";
                            break;
                        case ".xls" : $image = "excell_icon.png";
                            break;
                        case ".ppt" : $image = "ppt_icon.png";
                            break;
                        case ".zip" : $image = "zip_icon.png";
                            break;
                        case ".rar" : $image = "rar_icon.png";
                            break;
                        case ".pdf" : $image = "pdf_icon.png";
                            break;
                        case ".html" : $image = "html_icon.png";
                            break;
                        case ".htm" : $image = "html_icon.png";
                            break;
                        case ".exe" : $image = "exe_icon.png";
                            break;
                        case ".com" : $image = "exe_icon.png";
                            break;
                        case ".dll" : $image = "exe_icon.png";
                            break;
                        case ".txt" : $image = "text_icon.png";
                            break;
                        case ".php" : $image = "text_icon.png";
                            break;
                        case ".css" : $image = "text_icon.png";
                            break;
                        case ".pas" : $image = "text_icon.png";
                            break;
                        case ".c" : $image = "text_icon.png";
                            break;
                        default : $image = "document_icon.png";
                            break;
                    }
    return $image;
}

} 
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("show_download"))){
function show_download($cmr_config, $cmr_db_connection, $file_path = "", $db_file = "")
{
    $array_file_name = array();
    $array_file_ext = array();
    $array_image = array();
    $array_filesize = array();
    $array_filemtime = array();
    if(!($db_file)){
//  print($file_path);
        if(file_exists($file_path)){
        if($dir = opendir($file_path)){
            while ($file = readdir($dir)){
                if(($file != ".") && ($file != "..")){
                    $file_ext = strtolower(strrchr($file, "."));
                    $array_file_ext[] = $file_ext;
                    $array_image[] = mime_type_icon($file_ext);
                    $array_file_name[] = $file_path . $file;
                    $array_filesize[] = filesize($file_path . $file);
//                     $array_fileowner[] = fileowner($file_path . $file);
//                     $array_fileperms[] = fileperms($file_path.$file);
                    $array_filemtime[] = date("F d Y H:i:s.", filemtime($file_path . $file));
                    $array_comment[] = date("F d Y H:i:s.", filemtime($file_path . $file));
                }
            }
            closedir($dir);
        }
        }
        }else{
        $db_download = sql_run("array_assoc", $cmr_db_connection, "select", "", $cmr_config["db_name"], $cmr_config["cmr_table_prefix"] . "download", "*");
        if($db_download){
            foreach($db_download as $key => $value){
                $file = $value["file_name"];
                if(($file != ".") && ($file != "..")){
                    
                    $file_ext = strtolower(strrchr($file, "."));
                    $array_file_ext[] = $file_ext;
//                     $array_file_ext[] = substr($file, strrpos($file, "."));
                    $array_image[] = mime_type_icon($file_ext);
                    $array_file_name[] = $value["path"];
                    $array_filesize[] = $value["file_size"];
//                     $array_fileowner[] = fileowner($file_path . $file);
//                     $array_fileperms[] = fileperms($file_path.$file);
                    $array_filemtime[] = $value["date_time"];
                    $array_comment[] = $value["comment"];
            }
            }
            }
        }
            
        if($array_file_name)
                array_multisort(
                    $array_file_name, SORT_DESC, SORT_STRING,
                    $array_filemtime, SORT_DESC, SORT_STRING,
                    $array_file_ext, SORT_DESC, SORT_STRING,
                    $array_filesize, SORT_DESC, SORT_STRING,
                    $array_image, SORT_DESC, SORT_STRING,
                    $array_comment, SORT_DESC, SORT_STRING
                    );
            
            ?>
            
            <table border="1" width="100%" class="normal_text"  cellspacing="3" cellpadding="3" >
            <tr>
            <th colspan="6">
            <?php 
			if(cmr_get_user("authorisation") >= cmr_get_config("cmr_noc_type")){
            print(realpath($file_path));
        	}else{
            print(basename($file_path));
	        }
            ?>
            </th>
            </tr>
            
            <tr>
            <td><b></b></td>
            <td><b><?php echo cmr_translate("Name");?></b></td>
            <td><b><?php echo cmr_translate("Type");?></b></td>
            <td><b><?php echo cmr_translate("Dim");?></b></td>
            <td><b><?php echo cmr_translate("Data");?></b></td>
            <td><b><?php echo cmr_translate("Comment");?></b></td>
            </tr>
            
            <?php 
            foreach ($array_file_name as $key => $value){
                    print("<tr>");
                    print("<td><img border=\"0\" alt=\"=>\" src=\"" . cmr_get_path("www") . "images/icon/" . $array_image[$key] . "\" /></td>");
                    print("<td>" . file_link($value) . "</td>");
                    print("<td>" . $array_file_ext[$key] . "</td>");
                    print("<td>" . $array_filesize[$key] . " byte</td>");
                    print("<td>" . $array_filemtime[$key] . "</td>");
                    print("<td>" . $array_comment[$key] . "</td>");
                    print("</tr>");
            }
            print("</table>");
    return true;
}

} 
/*=================================================================*/
if(!(function_exists("download_link_default"))){
    /**
     * download_link_default()
     *
     * @param mixed $val
     * @param string $extend
     * @param array $header
     * @return
     **/
    function download_link_default($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $val)
    {
        $id_download = $val[$cmr_config["column_id_download"]];
        if($id_download){
            $download_link = "<input type=\"checkbox\" name=\"download_check_" . $val[$cmr_config["column_id_download"]] . "\" value=\"" . $val[$cmr_config["column_id_download"]] . "\" />";
            $download_link .= "<b>";

            $download_link .= trim(substr($val[$cmr_config["column1_download"]], 0, 20));
            $download_link .= ":";
            $download_link .= trim(substr($val[$cmr_config["column4_download"]], 0, 20));
            $download_link .= "</b>";
            $download_link .= "<i><small>";
            $download_link .= "[" . conv_timestamp($val[$cmr_config["column_date_time1_download"]]) . "] ";
            $download_link .= "(" . trim(substr($val[$cmr_config["column_text1_download"]], 0, 20)) . ")";
            $download_link .= "</small></i>";
            $download_link .= "<br /><b>";
            
            $download_color .= "";
            if((isset($GLOBALS["current_download_id"])) && ($id_t == cmr_get_global("current_download_id"))){
                $download_color .= " style=\"color:#EE00EE \" ";
            }
            
            $download_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_download.php?id_download=" . $val[$cmr_config["column_id_download"]], "", $val[$cmr_config["column2_download"]], "", "", "", $download_color);
            $download_link .= "</b>";

            cmr_set_session("pre_match",  cmr_get_session("pre_match") . "download_check_" . $val[$cmr_config["column_id_download"]] . "@,@.*@,@10@;@");

            if($extend){
                $download_link .= " [" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_download.php?id_download=" . $val[$cmr_config["column_id_download"]], "", "<b class=\"link\">[U]</b>");
                $download_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?id_download=" . $val[$cmr_config["column_id_download"]], "", "<b class=\"link\">[C]</b>");
                $download_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?id_download=" . $val[$cmr_config["column_id_download"]], "", "<b class=\"link\">[P]</b>");
            }
        }
        return $download_link . "<br />";
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("download_link_tab"))){
    /**
     * download_link_tab()
     *
     * @param mixed $val
     * @param string $extend
     * @param array $header
     * @return
     **/
    function download_link_tab($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
        $download_link = "";
        $id_download = $val[$cmr_config["column_id_download"]];
	    $download_link .= "<tr><td class=\"rown3\">" . $cmr_page["__number__"] . "</td>";

        if($id_download){
            $download_link .= "<td class=\"rown1\" >";
            $download_link .= "<input type=\"checkbox\" name=\"download_check_" . $val[$cmr_config["column_id_download"]] . "\" value=\"" . $val[$cmr_config["column_id_download"]] . "\" />";
            $download_link .= list_attach_link(str_replace(", ", ":", $val["path"]), "<img alt=\"&\" src=\"" . cmr_get_path("www") . "images/icon/attachment_icon.png\" border=\"0\"  title=\"" . cmr_translate("file")  . "\" />", ":");
            $download_link .= "</td>";

        if(!in_array ($id_download, $GLOBALS["download_read"])) $download_style = "unreaded";
	        
        if((isset($GLOBALS["current_download_id"])) && ($id_download == cmr_get_global("current_download_id"))){
           $download_style = "current";
        }
           $download_link .= "</td>";

           
           
            $i_col = 1;
            while ((isset($cmr_config["column" . $i_col . "_download"])) && ($i_col <= $cmr_page["__columns__"])){
                $val_const = $val[$cmr_config["column" . $i_col . "_download"]];


                if((!empty($val_const) || ($val_const == 0)) && ($val_const != null)){
                    $download_link .= "<td class=\"" . $download_style . "\">";
                    $download_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_download.php?id_download=$id_download", "", trim(wordwrap($val_const, 20, "\n",1)), "", "", "middle1",  " class=\"" . $download_style . "\" ");
//                     $download_link .= code_link($cmr_config, $cmr_page, $cmr_language, $modulename, $image = "", $text = "", $img_heigth = "20", $img_right = "90", $link_layer = "middle1", $other_a_link = "", $other_img = "")
                    $download_link .= "</td>";
                }else{
                    $download_link .= "<td  class=\"" . $download_style . "\"></td>";
                }

                $i_col++;
            }
            
            

        	empty($val["the_date"]) ? $times = unix_timestamp(strval($val["date_time"])) : $times = $val["the_date"];
            $download_link .= "<td  class=\"" . $download_style . "\">" . conv_timestamp($times) . "</td>";

            $download_link .= "<td class=\"rown1\" >";
            
                $download_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_download.php?id_download=" . $id_download, "", "<b class=\"link\">[U]</b>");
                $download_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?id_download=" . $id_download, "", "<b class=\"link\">[C]</b>");
                $download_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?id_download=" . $id_download, "", "<b class=\"link\">[P]</b>");
            
            $download_link .= "</td>";
        }
        return $download_link . "</tr>";
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("download_link_detail"))){
    /**
     * download_link_detail()
     *
     * @param mixed $val
     * @param string $extend
     * @param array $header
     * @return
     **/
    function download_link_detail($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
        $download_link_d = "<fieldset class=\"bubble\"><legend>" . $cmr_page["__number__"] . "</legend>";
        
        if(($cmr_config["column_image1_download"]) && ($val[$cmr_config["column_image1_download"]]))
        $download_link_d .= "<img alt=\"" . cmr_translate($cmr_config["column_image1_download"]) . "\" src=\"" . $val[$cmr_config["column_image1_download"]] . "\" class=\"cmr_image\" />";
        
        $download_link_d .= download_link_default($cmr_config, $cmr_page, $cmr_language, $val);
        $download_link_d .= "<br />" . htmlentities(substr($val[$cmr_config["column_text1_download"]], 0, 400)) . "<br />";
        $download_link_d .= " [" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_download.php?id_download=" . $val[$cmr_config["column_id_download"]], "", "<b class=\"link\">" . $cmr_language["update"] . "</b>");
        $download_link_d .= " - ";
        $download_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?id_download=" . $val[$cmr_config["column_id_download"]], "", "<b class=\"link\">" . $cmr_language["Comment"] . "</b>");
        $download_link_d .= " - ";
        $download_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?id_download=" . $val[$cmr_config["column_id_download"]], "", "<b class=\"link\">" . $cmr_language["Policy"] . "</b>");
        $download_link_d .= "</fieldset>";
        return "" . $download_link_d . "";
    }
}
/*=================================================================*/
?>
