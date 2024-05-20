<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VilleImport;
use App\Models\Ville;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function show_import(){
        return view('import_excel');
    }


    public function import(){
        $file = request()->file('excel_file');
        Excel::import(new VilleImport, $file);
    }
}
