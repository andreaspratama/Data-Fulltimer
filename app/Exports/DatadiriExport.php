<?php

namespace App\Exports;

use App\Models\Datadiri;
use App\Models\Pekerjaan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DatadiriExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Datadiri::all();
    }

    public function map($dd): array
    {
        return [
            $dd->nama,
            $dd->tlahirDiri,
            $dd->tgllahirDiri,
            $dd->mulai_bekerja,
            $dd->jabatan,
            $dd->alamat,
            $dd->telp,
            $dd->hp,
            $dd->email,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Mulai Bekerja',
            'Jabatan',
            'Alamat',
            'Telephone',
            'HP',
            'Email',
        ];
    }
}
