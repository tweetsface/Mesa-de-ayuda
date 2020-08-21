<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TicketsExport;
use Excel;


class ExcelController extends Controller
{
    //
    function reportes()
    {

     return Excel::download(new TicketsExport, 'Reporteincidencia.xlsx');
    }
}
