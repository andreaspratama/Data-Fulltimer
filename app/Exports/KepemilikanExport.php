<?php

namespace App\Exports;

use App\Models\Kepemilikan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KepemilikanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kepemilikan::all();
    }

    public function map($kep): array
    {
        return [
            $kep->tptTinggal,
            $kep->ket,
            $kep->transport,
        ];
    }

    public function headings(): array
    {
        return [
            'Tempat Tinggal',
            'Ket',
            'Transport',
        ];
    }
}
