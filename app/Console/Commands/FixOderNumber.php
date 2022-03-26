<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\School;
use App\Events\SendMail;
use Event;
use Auth;

class FixOderNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix students order numbers.';

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
     * @return int
     */
    public function handle(){
        $students   = Student::all();
        $schools    = School::all();
        $order      = 0;

        foreach ($schools as $school){
            $students   = Student::all()->where('school_id', $school->id);
            foreach ($students as $student){
                $order++;
                $student->order = $order;
                $student->save();
            }

            $order      = 0;
        }
        
        event(new SendMail(1));
        echo "students reordered succeefully !";
    }
}
