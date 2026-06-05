<?php

namespace App\Imports;

use App\Models\Via;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;

class ViasImport implements OnEachRow, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    public $ubigeo = '080108';

    public function __construct()
    {
    }

    public function onRow(Row $row)
    {
        $codevia = Via::where('codi_via',$row['codi_via'])->first();
        if(!$codevia){
            $via = new Via();
            $via->id_via = $this->ubigeo.$row['codi_via'];
            $via->nomb_via = $row['nomb_via'];
            $via->tipo_via = $row['tipo_via'];
            $via->codi_via = $row['codi_via'];
            $via->id_ubi_geo = $this->ubigeo;
            $via->fecha_via = Carbon::now()->format("Y-m-d");
            $via->estado = 1;
            $via->save();
        }
    }

    public function batchSize(): int
    {
        return 4000;
    }
    
    public function chunkSize(): int
    {
        return 4000;
    }

    public function rules(): array
    {
        return [
            '*.nomb_via' => 'required',
            '*.tipo_via' => 'required',
            '*.codi_via' => 'required',
        ];
    }
}
