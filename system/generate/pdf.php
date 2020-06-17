<?php
defined("cmr_online") or die("Tstm is not online, click <a href=\"login.php?force_login=yes\" > Here </a>  to login before continue ");
/**
 * pdf.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : TSTM Ver 1.1 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























pdf.php, Ver 3.03 
*/



/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
// ----------------------
include_once($cmr->get_path("func") . "function/func_pdf.php");
// ----------------------
// ----------------------
include_once($cmr->get_path("class") . "class/class_pdf.php");
// ----------------------
 

(strlen(get_post("title")) > 0) ? $title= get_post("title") : $title="PDF";
(strlen(get_post("author")) > 0) ? $author= get_post("author") : $author="";
(strlen(get_post("file")) > 0) ? $file= get_post("file") : $file="";
(strlen(get_post("links")) > 0) ? $links= get_post("links") : $links="0";


(strlen(get_post("data_type")) > 0) ? $data_type= get_post("data_type") : $data_type="text";
(strlen(get_post("dim_col")) > 0) ? $dim_col= get_post("dim_col") : $dim_col=0;
(strlen(get_post("header")) > 0) ? $header= get_post("header") : $header="";
(strlen(get_post("data")) > 0) ? $data= get_post("data") : $data="";


// $title,$author,$data_type,$dim_col,$header,$data,$file
// $header=array('Country','Capital','Area (sq km)','Pop. (thousands)');



// ----------------------
$array_data_type = explode(",", $data_type);
$array_dim_col = explode(",", $dim_col);
$array_header = explode(":;:", $header);
$array_data = explode(":;:", $data);

$array_doc = array();
// ----------------------




// ----------------------
foreach($array_data_type as $key => $value){
(!empty($array_data_type[$key])) ? $array_doc[$key]["data_type"] = $array_data_type[$key] : $array_doc[$key]["data_type"] = "text";
(!empty($array_header[$key])) ? $array_doc[$key]["header"] = $array_header[$key] : $array_doc[$key]["header"] = "";
(!empty($array_dim_col[$key])) ? $array_doc[$key]["dim_col"] = $array_dim_col[$key] : $array_doc[$key]["dim_col"] = 0;
(!empty($array_data[$key])) ? $array_doc[$key]["data"] = $array_data[$key] : $array_doc[$key]["data"] = "";
}
// ----------------------







// ----------------------
// ----------------------
// ----------------------

$pdf = new class_pdf();
$pdf->SetTitle($title);
$pdf->SetAuthor($author);



if(!empty($links)){
// First page
$pdf->AddPage();
// $pdf->SetFont('Arial','',10);
foreach($array_data_type as $key => $value){
// 		$pdf->SetFont("","U");
		$array_doc[$key]["link"] = $pdf->AddLink();
		$pdf->Write(5,"Chapter " . $key . ") ............................  [" . $value . "]",$array_doc[$key]["link"]);
}
$pdf->SetFont('');
}




// ----------------------
// ----------------------
foreach($array_doc as $key => $value){
	
	$header = explode(",", $value["header"]);
	if(empty($value["data"])){
		$value["data"] = "No data sended";
		$value["data_type"] = "text";
		}
	if(empty($value["data_type"]))$value["data_type"] = "text";
	if(empty($value["dim_col"]))$value["dim_col"] = 0;
	
// Other page
	$pdf->AddPage();
	if(!empty($links))$pdf->SetLink($array_doc[$key]["link"]);
// 	$pdf->SetLeftMargin(45);
	$pdf->SetFontSize(14);
	
	
	switch($value["data_type"]){
		case "html":
		$pdf->AddPage();
// 		$value["data"]=nl2br($value["data"]);
		$pdf->WriteHTML($value["data"]);
		$i=0;
		while($i < strlen($value["data"]) + 1999){
		$pdf->WriteHTML(substr($value["data"],$i,2000));
		$i+=1000;
		$pdf->AddPage();
		}
		break;
		
		
		case "image":
		$pdf->AddPage();
		if(empty($header[0]))$header[0]=10;
		if(empty($header[1]))$header[1]=10;
		if(empty($header[2]))$header[2]=10;
		if(empty($header[3]))$header[3]=0;
		if(empty($header[4]))$header[4]="";
		if(empty($header[5]))$header[5]="index.php?cmr_mode=pdf";
		$pdf->Image($value["data"],$header[0],$header[1],$header[2],$header[3],$header[4],$header[5]);
		break;
		
		case "text":
		if(empty($header[0]))$header[0] = $key;
		if(empty($header[1]))$header[1] = $value["data_type"];
		$i=0;
		
		$line_array = explode("\n", $value["data"]);
		$nume_line=0;
		$text_line="";	
		foreach($line_array as $num=>$line){
			$nume_line++;
			$text_line.="\n" . $line;	
				if(($nume_line % 35)==0){
					$pdf->PrintChapter($header[0],$header[1],"",$text_line,$value["dim_col"]);
					$text_line="";	
					$pdf->AddPage();
				}
		}
		
// 		while($i < strlen($value["data"]) + 999){
// 		$pdf->PrintChapter($header[0],$header[1],"",substr($value["data"],$i,1000),$value["dim_col"]);
// 		$i+=1000;
// 		$pdf->AddPage();
// // 		$pdf->SetAutoPageBreak(false,(28.35/(72/25.4)));
// 		}
		break;
		
		case "file":
		if(empty($header[0]))$header[0] = $key;
		if(empty($header[1]))$header[1] = $value["data_type"];
		$pdf->PrintChapter($header[0],$header[1],$value["data"],"",$value["dim_col"]);
		break;
		
		case "table1":
		if(empty($header[0]))$header[0]="column1";
		if(empty($header[1]))$header[1]="column2";
		$pdf->BasicTable($header,$value["data"]);
		break;
		
		case "table2":
		if(empty($header[0]))$header[0]="column1";
		if(empty($header[1]))$header[1]="column2";
		$pdf->ImprovedTable($header,$value["data"]);
		break;
		
		case "table":
		case "table3":
		if(empty($header[0]))$header[0]="column1";
		if(empty($header[1]))$header[1]="column2";
		$pdf->FancyTable($header,$value["data"]);
		break;
		
		case "table_file":
		//Data loading
		$text= $pdf->LoadData($value["data"]);
		//Column titles
		if(empty($header[0]))$header[0]="column1";
		if(empty($header[1]))$header[1]="column2";
		$pdf->FancyTable($header, $text);
		break;
		
		default:
// 		if(empty($header[0]))$header[0] = $key;
// 		if(empty($header[1]))$header[1] = $value["data_type"];
		if(empty($header[0]))$header[0]="-";
		if(empty($header[1]))$header[1]="-";
		$pdf->PrintChapter($header[0],$header[1],"",$value["data"], $value["dim_col"]);
		break;
	}
}
// ----------------------


// ----------------------
if(empty($file)){
$pdf->Output();
}else{
	if($file!="temp"){
	$pdf->Output($file);
	}else{
	//Determina il nome del file temporaneo nella directory corrente
	$file=basename(tempnam(getcwd(),'tmp'));
	@rename($file,$file.'.pdf');
	$file.='.pdf';
	//Salva il PDF come file
	$pdf->Output($file);
	}

getpdf($file);
//Reindirizzamento JavaScript
print("<html><script>document.location='$file';</script></html>"); 
}
// ----------------------
// ----------------------
// ----------------------
?>
