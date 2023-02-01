<?php

namespace App\Exports;

use App\Models\Anak;
use App\Models\Datadiri;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class AnakExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return Anak::query()->where('datadiri_id', $this->id);
    }

    public function headings(): array
    {
        return [
            'Nama',
        ];
    }
}
