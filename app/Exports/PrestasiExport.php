<?php

namespace App\Exports;

use App\Models\Prestasi;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrestasiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prestasi::all();
    }

    public function map($pend): array
    {
        return [
            $pend->pres,
            $pend->presImg,
        ];
    }

    public function headings(): array
    {
        return [
            'Prestasi',
            'Sertf Prestasi',
        ];
    }
}
