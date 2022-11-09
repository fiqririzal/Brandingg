<?php

namespace App\Imports;

use App\supplier;
use Maatwebsite\Excel\Concerns\ToModel;

class SupplierImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new supplier([
            'name' => $row[1],
            'address' => $row[2],
        ]);
    }
}
