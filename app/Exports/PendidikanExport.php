<?php

namespace App\Exports;

use App\Models\Pendidikan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PendidikanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendidikan::all();
    }

    public function map($pend): array
    {
        return [
            $pend->sd,
            $pend->smp,
            $pend->sma,
            $pend->univ,
            $pend->kursus,
            $pend->kursusImg,
            $pend->seminar,
            $pend->semImg,
            $pend->pelatihan,
            $pend->pelatihanImg,
        ];
    }

    public function headings(): array
    {
        return [
            'SD',
            'SMP',
            'SMA',
            'Univ',
            'Kursus',
            'Sertf Kursus',
            'Seminar',
            'Sertf Seminar',
            'Pelatihan',
            'Sertf Pelatihan',
        ];
    }
}
