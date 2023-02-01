<?php

namespace App\Exports;

use App\Models\Dokumen;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DokumenExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dokumen::all();
    }

    public function map($dok): array
    {
        return [
            $dok->ktp,
            $dok->kk,
            $dok->surat_nikah,
            $dok->surat_baptis,
        ];
    }

    public function headings(): array
    {
        return [
            'KTP',
            'KK',
            'Surat Nikah',
            'Surat Baptis',
        ];
    }
}
