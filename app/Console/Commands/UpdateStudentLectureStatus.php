<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class UpdateStudentLectureStatus extends Command
{
    protected $signature = 'update:student-lecture-status';
    protected $description = 'Update status column in student_lecture table every month';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        DB::table('student_lecture')->update(['status' => 0]);
        DB::table('student_unit')->update(['status' => 0]);

        $this->info('Student lecture status updated successfully.');
    }
}
