<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Office;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@bps.go.id',
            'email_verified_at' => now(),
            'password' => bcrypt('simantik'),
            'is_admin' => '1'
        ]);

        Office::Create([
            'name' => "BPS Kota Malang" ,
            'code' => "3573" ,
            'address' => "Jl. Janti Barat No. 47, Sukun, Kota Malang",
        ]);
        
    }
}
