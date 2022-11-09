<?php

namespace App\Imports;

use App\product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new product([
            'category_id' => $row[1],
            'name' => $row[2],
            'description' => $row[3],
            'price' => $row[4],
            'stock' => $row[5],
            'image' => ''
        ]);

    }
}
