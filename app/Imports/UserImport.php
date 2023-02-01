<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Datadiri;
use App\Models\Anak;
use App\Models\Dokumen;
use App\Models\Keluarga;
use App\Models\Kepemilikan;
use App\Models\Pekerjaan;
use App\Models\Pelayanan;
use App\Models\Pendidikan;
use App\Models\Prestasi;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    public function model(array $row)
    {
        $rem = Str::random(60);
        
        if ($row[3] === 'user') {
            $pass = $row[2];
        } elseif ($row[3] === 'Admin') {
            $pass = 'admin123**';
        }
        
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => bcrypt($pass),
            'remember_token' => $rem,
            'role' => $row[3]
        ]);
    }
}