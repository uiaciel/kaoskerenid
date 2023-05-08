<?php

namespace App\Exports;

use App\Models\Klien;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class KlienExport implements FromQuery, WithMapping, WithHeadings
{

    use Exportable;

    public function query()
    {
        // return Klien::orderBy('created_at', 'desc')->take(5)->get();
        return Klien::query()->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'));
        // return Klien::query()->whereMonth('created_at', Carbon::now()->month)->whereMonth('created_at', Carbon::now()->year);
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
            Str::upper($kliens->nama) . ' SABLON',
            Str::upper($kliens->nama),
            'SABLON',
            'Mobile',
            $kliens->hp,
        ];
    }
}
