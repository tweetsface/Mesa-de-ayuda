<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ExcelController extends Controller
{
    //
    function reportes()
    {

     return Excel::download(new TicketsExport, 'Reporteincidencia.xlsx');
    }
}
