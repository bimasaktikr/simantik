<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\Office;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code = Office::all()->first()->code;

        Division::create([
            'id' => 1 ,
            'name' => 'Tata Usaha',
            'code' => '35731',
        ]);
        Division::create([
            'id' => 2 ,
            'name' => 'Fungsi Sosial',
            'code' => '35732',
        ]);
        Division::create([
            'id' => 3 ,
            'name' => 'Fungsi Produksi',
            'code' => '35733',
        ]);
        Division::create([
            'id' => 4 ,
            'name' => 'Fungsi Nerwilis',
            'code' => '35734',
        ]);
        Division::create([
            'id' => 5 ,
            'name' => 'Fungsi Distribusi',
            'code' => '35735',
        ]);
        Division::create([
            'id' => 6 ,
            'name' => 'Fungsi IPDS',
            'code' => '35736',
        ]);
        
    }
}
