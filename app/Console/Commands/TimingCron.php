<?php
   
namespace App\Console\Commands;
   
use Illuminate\Console\Command;
use App\Models\TimeEntry;
use Carbon\Carbon;
use App\Models\User;
use App\Models\SleepMode;
use App\Models\ModelAvailability;
use DateTime;

class TimingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TimingCron:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
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
        $dt = new DateTime();
        $laravelCronTime= $dt->format('H:i:s');
        $userData=User::all();
        if(!empty($userData)){
            foreach($userData as $item){
              if($item->sleepMode){
                 $sleepMode=SleepMode::where('model_id',$item->id)->first();
                    if($sleepMode->start_time<$laravelCronTime){
                        $sleepMode->is_active='1';
                        $sleepMode->save();
                        $item->is_sleep_mode='1';
                        $item->save();
                        \Log::info($sleepMode);
                    }

                    if($sleepMode->end_time<$laravelCronTime){
                        $sleepMode->is_active='0';
                        $sleepMode->save();
                        $item->is_sleep_mode='0';
                        $item->save();
                        \Log::info($sleepMode);

                        if($sleepMode->mode_type=='onetime'){
                            $sleepMode->delete();
                        }
                    }
              }

 //Model availabality


                $DayOfWeek= Carbon::now()->format("l");
                $ModelAvailability=ModelAvailability::where('model_id',$item->id)->where('week_day',$DayOfWeek)->first();

                if(!empty($ModelAvailability)){
                    // \Log::info($ModelAvailability);
                    if($ModelAvailability->availability_type=='open'){
                      $item->availability='0';
                    }elseif($ModelAvailability->availability_type=='unavailable' || $ModelAvailability->availability_type=='limited'){
                        $item->availability='1';
                    }else{
                        if($ModelAvailability->availability_type=='custom'){
                            $item->availability='1';
                          if($ModelAvailability->from_time<$laravelCronTime){
                            $item->availability='0';
                          }
                          if($ModelAvailability->until_time<$laravelCronTime){
                            $item->availability='1';
                          }
                        }
                    }
                    $item->save();
                }

            }
        }
        
       

       

    }
}