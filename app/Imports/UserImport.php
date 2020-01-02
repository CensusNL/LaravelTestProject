<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserImport implements ToModel, WithHeadingRow, WithMultipleSheets
{

    public function model(array $row)
    {
        list($firstName, $lastName) = explode(' ', $row['name']);
        return new User([
            'email' => $row['email'],
            'password' => Hash::make(str_random(8)),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'city' => $row['city'],
            'zip' => $row['zip'],
            'number' => $row['number'],
            'number_extra' => 0,
            'street' => $row['street'],
            'country' => $row['country'],
            'phone' => substr($row['phone'], 0, 10),
            'company' => $row['company'],
            'job_title' => $row['job_title'],
            'ip' => 0
        ]);
    }

    public function sheets(): array
    {
        return [
            0 => new UserImport(),
        ];
    }

}
