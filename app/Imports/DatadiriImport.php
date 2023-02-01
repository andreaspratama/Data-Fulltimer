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
use Carbon\Carbon;

class DatadiriImport implements ToModel
{
    private $user;

    public function __construct()
    {
        $this->user = User::select('id', 'name', 'email')->get();
    }

    public function model(array $row)
    {
        if ($row[2] === null) {
            $tgl = $row[2];
        } else {
            $tgl = new Carbon($row[2]);
        }

        if ($row[3] === null) {
            $mb = $row[3];
        } else {
            $mb = new Carbon($row[3]);
        }
        

        $user = $this->user->where('email', $row[8])->first();
        return new Datadiri([
            'nama' => $row[0],
            'tlahirDiri' => $row[1],
            'tgllahirDiri' => $tgl,
            'mulai_bekerja' => $mb,
            'jabatan' => $row[4],
            'alamat' => $row[5],
            'telp' => $row[6],
            'hp' => $row[7],
            'email' => $row[8],
            'user_id' => $user->id ?? NULL,
        ]);
    }
}