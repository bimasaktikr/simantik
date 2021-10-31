<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Datatables;
use Yajra\Datatables\Datatables;
use App\Models\User;

class DatatablesController extends Controller
{

    // public function index(){

    // }
    /**
 * Displays datatables front end view
 *
 * @return \Illuminate\View\View
 */
public function getIndex()
{
    return view('users.index',[
        'anyData'  => 'datatables.data',
        'getIndex' => 'datatables',
    ]);
}

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
public function anyData()
{
    return Datatables::of(User::query())->make(true);
}
}
