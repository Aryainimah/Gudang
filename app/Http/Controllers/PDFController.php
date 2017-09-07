<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gudang;
use PDF;

class PDFController extends Controller
{
    public function pdf()
    {
    	$gudangs = Gudang::all();
    	$pdf = PDF::loadView('pdf', ['gudangs' => $gudangs]);
    	return $pdf -> download('gudang.pdf'); 
    }
    
}
