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

class KeluargaImport implements ToModel
{
    private $datadiri;

    public function __construct()
    {
        $this->datadiri = Datadiri::select('id', 'email')->get();
    }

    public function model(array $row)
    {
        dd($row[3]);
        $tgl = strtr($row[3], '/', '-');
        $htgl = date('Y-m-d', strtotime($tgl));

        $datadiri = $this->datadiri->where('email', $row[6])->first();

        return new Keluarga([
            'status' => $row[0],
            'namaPasa' => $row[1],
            'tlahirPasa' => $row[2],
            'tgllahirPasa' => $htgl,
            'pekerjaanPasa' => $row[4],
            'pend_akhir' => $row[5],
            'datadiri_id' => $datadiri->id ?? NULL,
        ]);
    }
}