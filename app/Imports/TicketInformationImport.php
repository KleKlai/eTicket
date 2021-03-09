<?php

namespace App\Imports;

use App\Models\TicketInformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TicketInformationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TicketInformation([
            'ticket_code'   => $row['ticket_code'],
            'name'          => $row['name'],
            'email'         => $row['email'],
        ]);
    }
}
