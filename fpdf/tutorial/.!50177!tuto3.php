<?php
require('../fpdf.php');

class PDF extends FPDF
{
function Header()
{
	global $titre;

	// Arial gras 15
	$this->SetFont('Arial','B',15);
	// Calcul de la largeur du titre et positionnement
	$w = $this->GetStringWidth($titre)+6;
	$this->SetX((210-$w)/2);
	// Couleurs du cadre, du fond et du texte
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(230,230,0);
	$this->SetTextColor(220,50,50);
	// Epaisseur du cadre (1 mm)
	$this->SetLineWidth(1);
	// Titre
	$this->Cell($w,9,$titre,1,1,'C',true);
	// Saut de ligne
	$this->Ln(10);
}

function Footer()
{
