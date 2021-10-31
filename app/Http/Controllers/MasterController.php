<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function Index()
    {
        return view ('master.index');
    }
    public function Office()
    {
        return view ('master.index');
    }
}
