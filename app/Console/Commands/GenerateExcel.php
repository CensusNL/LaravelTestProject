<?php

namespace App\Console\Commands;

use App\Exports\UserExport;
use App\User;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class GenerateExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Users Excel file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return Excel::store(new UserExport(), 'users.xlsx', 'public');
    }
}
