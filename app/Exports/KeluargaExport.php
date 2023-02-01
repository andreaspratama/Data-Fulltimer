<?php

namespace App\Exports;

use App\Models\Keluarga;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeluargaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Keluarga::all();
    }

    public function map($kel): array
    {
        return [
            $kel->status,
            $kel->namaPasa,
            $kel->tlahirPasa,
            $kel->tgllahirPasa,
            $kel->pekerjaanPasa,
            $kel->pend_akhir,
        ];
    }

    public function headings(): array
    {
        return [
            'Status',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Pekerjaan',
            'Pendidikan Akhir',
        ];
    }
}
