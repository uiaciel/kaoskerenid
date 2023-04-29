<?php

namespace App\Exports;

use App\Models\Klien;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KlienExport implements FromCollection, WithMapping, WithHeadings
{

    use Exportable;

    public function collection()
    {
        // return Klien::orderBy('created_at', 'desc')->take(5)->get();
        return Klien::all();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Given Name',
            'Family Name',
            'Phone 1 - Type',
            'Phone 1 - Value',

        ];
    }

    public function map($kliens): array
    {
        return [
            $kliens->nama . ' SABLON',
            $kliens->nama,
            'SABLON',
            'Mobile',
            $kliens->hp,
        ];
    }
}
