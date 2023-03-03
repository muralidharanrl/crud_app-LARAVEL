<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ContactImport implements ToModel, WithHeadingRow
{
    /** 
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'id' => $row['id'],
            'name' => $row['name'],
            'address' => $row['address'],
            'mobile' => $row['mobile']
        ]);
    }
    /**
     */
}
