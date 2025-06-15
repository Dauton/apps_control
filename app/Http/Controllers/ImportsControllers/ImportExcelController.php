<?php

namespace App\Http\Controllers\ImportsControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImportsControllers\Validations;
use App\Imports\ImportExcelApp;
use App\Imports\ImportExcelServer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function importApp(Request $request)
    {

        Validations::fileValidations($request);

        $file = $request->file('file');

        Excel::import(new ImportExcelApp, $file);

        return redirect()->route('importation')->with('alertSuccess', 'Aplicações importadas como sucesso.');
    }

    public function importServer(Request $request)
    {

        Validations::fileValidations($request);

        $file = $request->file('file');

        Excel::import(new ImportExcelServer, $file);

        return redirect()->route('importation')->with('alertSuccess', 'Servidores importados como sucesso.');
    }
}
