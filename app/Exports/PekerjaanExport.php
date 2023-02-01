<?php

namespace App\Exports;

use App\Models\Pekerjaan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PekerjaanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pekerjaan::all();
    }

    public function map($pek): array
    {
        return [
            $pek->pengKerja,
            $pek->pekSkrng,
        ];
    }

    public function headings(): array
    {
        return [
            'Pengalaman Kerja',
            'Pekerjaan Sekarang',
        ];
    }
}
