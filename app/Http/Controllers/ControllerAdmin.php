<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hd_users;
use App\hd_reg_ticket;

class ControllerAdmin extends Controller
{
     function ticket()//Dashboard
     {
      $hd_reg_tickets = hd_reg_ticket::all();
      return view('ticketdmin')->with('hd_reg_tickets',$hd_reg_tickets );
     }
     function auser()//Dashboard
     {
      $hd_users = hd_users::all();
      return view('ausers')->with('hd_users',$hd_users );
     }

}