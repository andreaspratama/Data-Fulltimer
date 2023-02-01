<?php

namespace App\Exports;

use App\Models\Pelayanan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PelayananExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pelayanan::all();
    }

    public function map($pel): array
    {
        return [
            $pel->pelPernah,
            $pel->pelSkrng,
        ];
    }

    public function headings(): array
    {
        return [
            'Pengalaman Pelayanan',
            'Pelayanan Sekarang',
        ];
    }
}
