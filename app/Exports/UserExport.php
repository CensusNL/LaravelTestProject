<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        ini_set('memory_limit','6144M');
        return factory(User::class, 100000)->make();
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'email',
            'name',
            'city',
            'zip',
            'number',
            'street',
            'country',
            'phone',
            'company',
            'job_title',
            'ip'
        ];
    }


    /**
     * @var User $user
     * @return array
     */
    public function map($user): array
    {
        return [
            $user->uid,
            $user->email,
            $user->name,
            $user->city,
            $user->zip,
            $user->number,
            $user->street,
            $user->country,
            $user->phone,
            $user->company,
            $user->job_title,
            $user->ip
        ];
    }
}
