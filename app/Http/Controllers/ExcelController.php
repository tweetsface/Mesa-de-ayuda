<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
	\Excel::create('Reportes', function($excel) {//crea un numero documeton Reportes
 
    $hd_reg_tickets=hd_reg_ticket::all();
 
    $excel->sheet('tickets', function($sheet) use($users) {//creamos hoja dentro del documetno
 
    $sheet->fromArray($hd_reg_tickets);
 
});
 
})->export('xlsx');
}
