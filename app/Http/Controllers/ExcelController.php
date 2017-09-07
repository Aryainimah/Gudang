<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Gudang;
use DB;
use Excel;
class ExcelController extends Controller
{
    public function getImport(){
    	return view('excel.importGudang');
    }
    public function postImport(){
    	Excel::load(Input::file('gudang'), function($reader){
    		$reader->each(function($sheet){
    			Gudang::firstOrCreate($sheet->toArray());
    		});
    	});
    	return redirect('gudangs');
    }

    public function getExport()
    {
    	$gudang=Gudang::All();
    	Excel::create('Export Data',function($excel) use($gudang){
    		$excel->sheet('Sheet 1',function($sheet) use($gudang){
    			$sheet->fromArray($gudang);
    		});
    	})->export('xlsx');
    }

    public function deleteAll(){
    	DB::table('gudangs')->delete();
    	return redirect('gudangs');

    }
}
