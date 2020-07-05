<?php
/**
 * graph.php
 * ---------
 * begin    : July 2004 - August 2011
 * copyright   : TSTM Ver 1.1 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























graph.php, Ver 3.03
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
if(!(function_exists("get_post"))){
function get_post($PE_var = "")
{
    $PE_return = null;
    $PE_return = isset($_POST[$PE_var]) ? $_POST[$PE_var]: $PE_return;
    $PE_return = isset($_GET[$PE_var]) ? urldecode($_GET[$PE_var]): $PE_return;

    return $PE_return;
}
}
// .........................
(get_post("width") > 400) ? $grph_width= get_post("width") : $grph_width = 600;
(get_post("height") > 200) ? $grph_height= get_post("height") : $grph_height = 600;

(get_post("title")) ? $grph_title= get_post("title") : $grph_title = "Graph";
(get_post("tab_title")) ? $grph_tab_title= get_post("tab_title") : $grph_tab_title = "Period";

(get_post("xtitle")) ? $grph_xtitle= get_post("xtitle") : $grph_xtitle = "";
(get_post("ytitle")) ? $grph_ytitle= get_post("ytitle") : $grph_ytitle = "";


(get_post("type1")) ? $grph_type1= get_post("type1") : $grph_type1 = "bar";
(get_post("type2")) ? $grph_type2= get_post("type2") : $grph_type2 = "line";

(get_post("legend1")) ? $grph_legend1= get_post("legend1") : $grph_legend1 = "Legend";
(get_post("legend2")) ? $grph_legend2= get_post("legend2") : $grph_legend2 = "Legend";

(get_post("scale")) ? $grph_scale= get_post("scale") : $grph_scale = "int";

(get_post("xlabel1")) ? $grph_xlabel1= get_post("xlabel1") : $grph_xlabel1 = "shortmonth";
(get_post("xlabel2")) ? $grph_xlabel2= get_post("xlabel2") : $grph_xlabel2 = "";


(get_post("color1")) ? $grph_color1= get_post("color1") : $grph_color1 = "red";
(get_post("color2")) ? $grph_color2= get_post("color2") : $grph_color2 = "orange";


(get_post("fillcolor1")) ? $grph_fillcolor1= get_post("fillcolor1") : $grph_fillcolor1 = "blue";
(get_post("fillcolor2")) ? $grph_fillcolor2= get_post("fillcolor2") : $grph_fillcolor2 = "green";

(get_post("path")) ? $grph_path= get_post("path") : $grph_path = "";

(get_post("font1")) ? $grph_font1= get_post("font1") : $grph_font1 = "";
(get_post("font2")) ? $grph_font2= get_post("font2") : $grph_font2 = "";



// .........................
(get_post("ydata1")) ? $grph_ydata1= get_post("ydata1") : $grph_ydata1 = "0,0";
(get_post("ydata2")) ? $grph_ydata2= get_post("ydata2") : $grph_ydata2 = "0,0";
// $l1datay = array(11,9,2,4,3,13,3);
// $l2datay = array(23,12,5,19,17,10,15);

$l1datay = explode(",", $grph_ydata1);
$l2datay = explode(",", $grph_ydata2);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$jpgraph_src = dirname(__FILE__) . "/../../jpgraph/src/";
if(phpversion() > "5") $jpgraph_src = dirname(__FILE__) . "jpgraph/src5/";
if(phpversion() > "6") $jpgraph_src = dirname(__FILE__) . "jpgraph/src/";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once ($jpgraph_src . "jpgraph.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// .........................


switch($grph_type1){
	case "pie":
	include ($jpgraph_src . "jpgraph_pie.php");
	include ($jpgraph_src . "jpgraph_pie3d.php");
	break;

	case "barcode":
// 	include ($jpgraph_src . "jpgraph_barcode.php");
	break;

	case "bar":
	case "line":
	default:
	include ($jpgraph_src . "jpgraph_line.php");
	include ($jpgraph_src . "jpgraph_bar.php");
	break;
}

// .........................



switch($grph_type1){
case "barcode":
			$symbology = BarcodeFactory::Create ($grph_ydata1);// ENCODING_EAN128, ENCODING_EAN13, ENCODING_EAN8, ENCODING_UPCA, ENCODING_UPCE, ENCODING_CODE39, ENCODING_CODE93, ENCODING_CODE128, ENCODING_CODE25, ENCODING_CODEI25, ENCODING_CODABAR, ENCODING_CODE11, ENCODING_POSTNET, ENCODING_BOOKLAND
			$barcode = BackendFactory ::Create('IMAGE', $symbology);
			$barcode->Stroke($grph_ydata2);//'ABC123'..
break;

case "pie":
			// Create the Pie Graph.
			$graph = new PieGraph($grph_width, $grph_height,"auto");
break;

	case "bar":
	case "line":
	default:
			// Create the graph.
			$graph = new Graph($grph_width, $grph_height, "auto");
	break;
}


// .........................




switch($grph_type1){
	case "barcode":
	break;

	case "pie":
	case "bar":
	case "line":
	default:
			$graph->SetShadow();
			// Set A title for the plot
			$graph->title->Set($grph_title);
		if(!empty($grph_font1)){
			$graph->title->SetFont(FF_VERDANA,FS_BOLD,10);
			}
			$graph->title->SetColor($grph_color1);
	break;
}





// .........................





switch($grph_type1){
case "barcode":
break;

case "pie":
// 			$graph->legend->Pos(0.1,0.2);

			// Create 3D pie plot
			(array_sum($l1datay)==0) ? $l1datay=array(1) : $l1datay= $l1datay;
			$p1 = new PiePlot3d($l1datay);
			$p1->SetTheme("sand");
// 			$p1->SetCenter(0.4);
// 			$p1->SetSize(80);

			// Adjust projection angle
// 			$p1->SetAngle(45);

			// Adjsut angle for first slice
// 			$p1->SetStartAngle(45);

			// As a shortcut you can easily explode one numbered slice with
			$p1->ExplodeSlice(1);

			// Setup slice values
		if(!empty($grph_font1))	$p1->value->SetFont(FF_ARIAL,FS_BOLD,11);

			$p1->value->SetColor($grph_color2);


break;


	default:
			// .........................
			$graph->SetMarginColor('white');


			switch($grph_scale){
			case "text" : $graph->SetScale("textlin");break;
			case "int" : $graph->SetScale("intlin");break;
			default : $graph->SetScale("textlin");break;
			}

			// Adjust the margin slightly so that we use the
			// entire area (since we don't use a frame)
			$graph->img->SetMargin(40,130,20,40);
			// $graph->SetMargin(30,1,20,5);

			// Box around plotarea
			$graph->SetBox();

			// No frame around the image
			$graph->SetFrame(false);

			// Setup the tab title
			$graph->tabtitle->Set($grph_tab_title);
		if(!empty($grph_font1)){
			$graph->tabtitle->SetFont(FF_ARIAL,FS_BOLD,10);
			}

			// Setup the X and Y grid
			$graph->ygrid->SetFill(true,'#DDDDDD@0.5','#BBBBBB@0.5');
			$graph->ygrid->SetLineStyle('dashed');
			$graph->ygrid->SetColor('gray');
			$graph->xgrid->Show();
			$graph->xgrid->SetLineStyle('dashed');
			$graph->xgrid->SetColor('gray');





			// Create the bar plot
			$bplot = new BarPlot($l1datay);
			// $bplot->SetFillColor($grph_fillcolor1);
			$bplot->SetLegend($grph_legend1);
			$bplot->SetWidth(0.6);
			$fcol='#440000';
			$tcol='#FF9090';

			$bplot->SetFillGradient($fcol,$tcol,GRAD_LEFT_REFLECTION);

			// Set line weigth to 0 so that there are no border
			// around each bar
			$bplot->SetWeight(0);






			// Create the linear error plot
			$l1plot=new LinePlot($l2datay);

			$l1plot->SetLegend($grph_legend2);

			$l1plot->SetWeight(2);
			$l1plot->SetFillColor($grph_fillcolor1);
			$l1plot->SetColor($grph_color1);
			// $l1plot->SetColor($grph_color2);
			$l1plot->SetBarCenter();

			$l1plot->mark->SetType(MARK_SQUARE);
			$l1plot->mark->SetColor($grph_color2);
			$l1plot->mark->SetFillColor($grph_fillcolor2);
			$l1plot->mark->SetSize(6);

	break;
}

// .........................








switch($grph_type1){

	case "barcode":
	break;

	case "pie":
	case "bar":
	case "line":
	default:
			switch($grph_xlabel1){
			case "shortmonth" : $datax = $gDateLocale->GetShortMonth();break;
			case "month" : $datax = $gDateLocale->GetMonth();break;
			case "day" : $datax = $gDateLocale->GetDayAbb(); break;
			case "shortday" : $datax = $gDateLocale->GetShortDay();break;
			default:
			$datax = explode(",", $grph_xlabel1);
// 			$datax = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct");
			break;
			}

	break;
}



// .........................


// .........................


switch($grph_type1){
	case "barcode":	break;
	case "pie":
			$p1->SetLegends($datax);
	break;
	case "line":
	case "bar":
	default:

		foreach($datax as $key => $value) $datax[$key] = substr($value, 0, 4) . "..";

// 		   $_datax = $datax;
// 		   $_l1datay = $l1datay;
// 		   if(!empty($_datax)){
// 		    array_multisort(
// 		        $_l1datay, SORT_ASC, SORT_NUMERIC,
// 		        $_datax, SORT_ASC, SORT_STRING
// 		        );
// 		      }
// 			$_datax = array_flip($_datax);
// 			foreach($datax as $key => $value) $datax[$key] = $_datax[$value];


				// Setup month as labels on the X-axis
				$graph->xaxis->SetTickLabels($datax);


				$graph->xaxis->title->Set($grph_xtitle);
		if(!empty($grph_font1)){
				$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,8);
			}

		if(!empty($grph_font1)){
				$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
				$graph->xaxis->SetLabelAngle(45);
			}

				$graph->yaxis->title->Set($grph_ytitle);
		if(!empty($grph_font1)){
				$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
			}

	break;
}



// Add the plots to t'he graph
switch($grph_type1){
	case "barcode":	break;
	case "pie" : $graph->Add($p1);
	// Display the graph
		if(empty($grph_path)){
				$graph->Stroke();
			}else{
				$graph->Stroke($grph_path);
				}
	break;
	case "line" : $graph->Add($l1plot);break;
	case "bar" : $graph->Add($bplot);break;
default:break;
}



// .........................






switch($grph_type2){
	case "bar":	$graph->Add($bplot);break;
	case "line" : $graph->Add($l1plot);break;


	case "barcode":
	case "pie":
	default:
	break;
}

// .........................



switch($grph_type2){

	case "barcode":break;
	case "pie":break;

	case "line":
	case "bar":
	default:
		if(empty($grph_path)){
				$graph->Stroke();
			}else{
				$graph->Stroke($grph_path);
				}
//  $graph->Stroke($cmr->get_path("index") . "/tmp/myimage.png")
	break;
}

// .........................




?>
<?php
// include ($jpgraph_src . "jpgraph_line.php");
// include ($jpgraph_src . "jpgraph_utils.inc");

// $n = ReadFileData::FromCSV('data.csv',$datay);
// if( $n == false ){
//     die("Can't read data.csv.");
// }

// // Setup the graph
// $graph = new Graph(400,300);
// $graph->title->Set('Reading CSV file with '.$n.' data points');
// $graph->SetScale("intlin");

// $l1 = new LinePlot($datay);
// $graph->Add($l1);

// 		if(empty($grph_path)){
// 				$graph->Stroke();
// 			}else{
// 				$graph->Stroke($grph_path);
// 				}





// $graph = new Graph(...);

// // Code to create the graph
// // .........................
// .........................

// // Put the image in a PDF page
// $im = $graph->Stroke(_IMG_HANDLER);

// $pdf = pdf_new();
// pdf_open_file($pdf, '');

// // Convert the GD image to somehing the
// // PDFlibrary knows how to handle
// $pimg = pdf_open_memory_image($pdf, $im);

// pdf_begin_page($pdf, 595, 842);
// pdf_add_outline($pdf, 'Page 1');
// pdf_place_image($pdf, $pimg, 0, 500, 1);
// pdf_close_image($pdf, $pimg);
// pdf_end_page($pdf);
// pdf_close($pdf);

// $buf = pdf_get_buffer($pdf);
// $len = strlen($buf);

// // Send PDF mime headers
// cmr_header('Content-type: application/pdf');
// cmr_header("Content-Length: $len");
// cmr_header("Content-Disposition: inline; filename=foo.pdf");

// // Send the content of the PDF file
// print($buf);
print($buf);
// // .. and clean up
// pdf_delete($pdf);

?>
