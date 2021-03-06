<?php

namespace App\Imports;

use App\Models\Mitra;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MitraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mitra([
            'name' => $row['nama'],
            'slug' => Str::of($row['nama']),
            'email' => $row['email'],
            'gender' => $row['gender'],
            'alamat' => $row['alamat'],
            'pendidikan' => $row['pendidikan'],
        ]);
    }
}
