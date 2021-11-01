<?php

namespace App\Imports;

use App\Models\Mitra;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MitraImport implements ToModel, WithHeadingRow
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
            'nik' => $row['nik'],
            'gender' => $row['gender'],
            'alamat' => $row['alamat'],
            'pendidikan' => $row['pendidikan'],
            'kecamatan' => $row['kecamatan'],
            'kelurahan' => $row['kelurahan'],
            'nohp' => $row['nohp'],
        ]);
    }
}
