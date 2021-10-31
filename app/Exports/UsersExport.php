<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Activity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromCollection
// class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // use Exportable;

    public function collection()
    {
        $activity = Activity::with('mitra', 'job', 'division')->get();
        return $activity;
    }

    // public function view(): View
    // {   
    //     $activity = Activity::with('mitra', 'job', 'division');

    //     return view('users.exports', [
    //         'users' => User::all()
    //     ]);
    // }
}

