<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function list_buku(){
        return view("pages/list_buku");
    }
}
