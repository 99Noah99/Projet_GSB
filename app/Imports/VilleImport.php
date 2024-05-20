<?php

namespace App\Imports;
ini_set('max_execution_time', 1800);
ini_set('memory_limit', '1024M');
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Ville;

class VilleImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        Ville::create([
            'CP_Ville' => $row['zip_code'],
            'Nom_Ville' => $row['label']
        ]);
    }
}
