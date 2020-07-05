<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_zip.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























func_zip.php,Ver 3.0  2011-Oct-Mon 15:23:08
*/
/**
 * unzip()
 *
 * @param mixed $file_zip
 * @param string $destination
 * @return
 **/
if(!(function_exists("unzip"))){
function unzip($file_zip, $destination = "")
{
$zip_array = array();
    $zip = zip_open($file_zip);
    if($zip){
        while ($zip_entry = zip_read($zip)){
            $name = zip_entry_name($zip_entry);
            $dimension = zip_entry_filesize($zip_entry);
            $dim_compress = zip_entry_compressedsize($zip_entry);
            $method_compress = zip_entry_compressionmethod($zip_entry);

			$zip_array["name"][] = $name;
			$zip_array["dimension"][] = $dimension;
			$zip_array["dim_compress"][] = $dim_compress;
			$zip_array["method_compress"][] = $method_compress;

            if(zip_entry_open($zip, $zip_entry, "r")){
                print("unzip file : $name ....<br />");
                $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

                $fich = @ fopen($destination . $name, "w+");
                if(@ fwrite($fich, $buf)){
                    print("<br /> " . cmr_translate("file") . " [$name] " . cmr_translate("successfully created") . ".......<br />");
                }else{
                    print("<br /> " . cmr_translate("file") . " [$name] " . cmr_translate("successfully created") . ".......<br />");
                }
                zip_entry_close($zip_entry);
            }
            print("end file size : $dimension <br />------<br />");
        }

        zip_close($zip);
    }else{
    }
    return $zip_array;
}
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
* cmr_zipfiles()
*
* return a compressed zip data
* $array_files_dirs_to_zip is an array of absolute paths, see getdirectorycontent()
* $parent_dir_all_files is an absolute path of a folder which contains all files and folder to be zip
* $file_name_encoding is the encoding of filenames in the zip data
*
* @param mixed $array_files_dirs_to_zip
* @param mixed $parent_dir_all_files
* @param string $file_name_encoding
* @return
*/
if(!(function_exists("cmr_zipfiles"))){
function cmr_zipfiles($array_files_dirs_to_zip, $parent_dir_all_files, $file_name_encoding = "UTF-8")
{
    $datasec = array();
    $ctrl_dir = array();
    $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
    $old_offset = 0;

    foreach($array_files_dirs_to_zip as $key => $value){
        $name = substr($value, strlen($parent_dir_all_files) + 1);
        $name = mb_convert_encoding($name, $file_name_encoding, "auto");

        if(is_dir($value)){
            $fr = "\x50\x4b\x03\x04";
            $fr .= "\x0a\x00";
            $fr .= "\x00\x00";
            $fr .= "\x00\x00";
            $fr .= "\x00\x00\x00\x00";
            $fr .= pack("V", 0);
            $fr .= pack("V", 0);
            $fr .= pack("V", 0);
            $fr .= pack("v", strlen($name));
            $fr .= pack("v", 0);
            $fr .= $name;
            // $fr .= pack("V", 0);
            // $fr .= pack("V", 0);
            // $fr .= pack("V", 0);
            $datasec[] = $fr;

            $new_offset = strlen(implode("", $datasec));
            $cdrec = "\x50\x4b\x01\x02";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x0a\x00";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x00\x00\x00\x00";
            $cdrec .= pack("V", 0);
            $cdrec .= pack("V", 0);
            $cdrec .= pack("V", 0);
            $cdrec .= pack("v", strlen($name));
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $ext = "\x00\x00\x10\x00";
            $ext = "\xff\xff\xff\xff";
            $cdrec .= pack("V", 16);
            $cdrec .= pack("V", $old_offset);
            $cdrec .= $name;
            $ctrl_dir[] = $cdrec;
            $old_offset = $new_offset;
        }else{
            $data = file_get_contents($value);

            $unc_len = strlen($data);
            $crc = crc32($data);
            $zdata = gzcompress($data);
            $zdata = substr($zdata, 2, -4);
            $c_len = strlen($zdata);

            $fr = "\x50\x4b\x03\x04";
            $fr .= "\x14\x00";
            $fr .= "\x00\x00";
            $fr .= "\x08\x00";
            $fr .= "\x00\x00\x00\x00";
            $fr .= pack("V", $crc);
            $fr .= pack("V", $c_len);
            $fr .= pack("V", $unc_len);
            $fr .= pack("v", strlen($name));
            $fr .= pack("v", 0);
            $fr .= $name;
            $fr .= $zdata;
            // $fr .= pack("V", $crc);
            // $fr .= pack("V", $c_len);
            // $fr .= pack("V", $unc_len);
            $datasec[] = $fr;

            $new_offset = strlen(implode("", $datasec));
            $cdrec = "\x50\x4b\x01\x02";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x14\x00";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x08\x00";
            $cdrec .= "\x00\x00\x00\x00";
            $cdrec .= pack("V", $crc);
            $cdrec .= pack("V", $c_len);
            $cdrec .= pack("V", $unc_len);
            $cdrec .= pack("v", strlen($name));
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("V", 32);
            $cdrec .= pack("V", $old_offset);
            $old_offset = $new_offset;
            $cdrec .= $name;
            $ctrl_dir[] = $cdrec;
        }
    }

    $data = implode("", $datasec);
    $ctrldir = implode("", $ctrl_dir);

    return
    $data . $ctrldir . $eof_ctrl_dir .
    pack("v", sizeof($ctrl_dir)) .
    pack("v", sizeof($ctrl_dir)) .
    pack("V", strlen($ctrldir)) .
    pack("V", strlen($data)) . "\x00\x00";
}
}

?>
