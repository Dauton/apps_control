<?php

namespace App\Http\Controllers\ImportsControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Validations extends Controller
{
    public static function fileValidations(Request $request)
    {
        $request->validate(
            [
                'file' => ['required', 'file', 'extensions:xlsx,xls']
            ],
            [
                'file.required' => 'O arquivo deve ser anexado.',
                'file.file' => 'O arquivo deve ser válido.',
                'file.extensions' => 'O arquivo deve ser do tipo Excel (.xlsx ou .xls)'
            ]
        );
    }
}
