<?php

namespace App\Http\Controllers\ImportsControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImportsControllers\Validations;
use App\Http\Controllers\LogControllers\LogController;
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

        LogController::createLog('Importação', 'Sucesso', 'Aplicações importadas');

        return redirect()->route('importation')->with('alertSuccess', 'Aplicações importadas com sucesso.');
    }

    public function importServer(Request $request)
    {

        Validations::fileValidations($request);

        $file = $request->file('file');

        Excel::import(new ImportExcelServer, $file);

        LogController::createLog('Importação', 'Sucesso', 'Servidores importados');

        return redirect()->route('importation')->with('alertSuccess', 'Servidores importadas com sucesso.');
    }
}
