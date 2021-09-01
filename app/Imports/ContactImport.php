<?php

namespace App\Imports;

use App\Contact;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'Contact_First'     => $row[0],
            'Email'    => $row[1], 
            'Phone' => $row[2],
        ]);
    }
}
