<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Office;
use App\Models\Division;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code = Office::all()->first()->code;

        User::create([
            'username' => 'tatausaha',
            'email' => $code.'1@bps.go.id',
            'email_verified_at' => now(),
            'password' => bcrypt('simantik'),
        ]);
        User::create([
            'username' => 'sosial',
            'email' => $code.'2@bps.go.id',
            'email_verified_at' => now(),
            'password' => bcrypt('simantik'),
        ]);
        User::create([
            'username' => 'produksi',
            'email' => $code.'3@bps.go.id',
            'email_verified_at' => now(),
            'password' => bcrypt('simantik'),
        ]);
        User::create([
            'username' => 'nerwilis',
            'email' => $code.'4@bps.go.id',
            'email_verified_at' => now(),
            'password' => bcrypt('simantik'),
        ]);
        User::create([
            'username' => 'distribusi',
            'email' => $code.'5@bps.go.id',
            'email_verified_at' => now(),
            'password' => bcrypt('simantik'),
        ]);
        User::create([
            'username' => 'ipds',
            'email' => $code.'6@bps.go.id',
            'email_verified_at' => now(),
            'password' => bcrypt('simantik'),
        ]);
        
    }
}
