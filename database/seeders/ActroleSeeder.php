<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actrole;

class ActroleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actrole::create([
            'name' => 'Koordinator Fungsi',
        ]);
        Actrole::create([
            'name' => 'Subject Matter',
        ]);
        Actrole::create([
            'name' => 'Pengawas',
        ]);
        Actrole::create([
            'name' => 'Pencacah',
        ]);
    }
}
