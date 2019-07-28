<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {



        if ($row[0] != '#'){
            $name = explode(' ',$row[2]);

            $template = '<h1>Hello '.$row[2].'</h1>';
            $template .= '<p>This is a test</p>';
            $template = '<p>Thank you</p>';

            //Since this function is called within a loop. Each user will be sent a mail before inserting on the DB.
            //Any email library can be used. Used php mail for illustration purposes.
            mail($row[1],'Welcome to our website',$template);

            return new User([

                'email' => $row[1],
                'first_name' => !empty($name[0]) ? $name[0] : '',
                'last_name' => !empty($name[1]) ? $name[1] : '',
                'city' => $row[3],
                'zip' => $row[4],
                'number' => $row[5],
                'street' => $row[6],
                'country' => $row[7],
                'phone' => $row[8],
                'company' => $row[9],
                'job_title' => $row[10],
                'ip' => $row[11],
                'password' => \Hash::make('123456'),
            ]);
        }



    }
}
