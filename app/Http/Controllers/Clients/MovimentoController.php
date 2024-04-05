<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    public function indexMovimento(){
        return view('clients.movimentos');
    }
}
