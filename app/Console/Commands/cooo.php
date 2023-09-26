<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class cooo extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:copun';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'copon is deleted';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $copuns=UseCopun::all();
        foreach( $copuns as $copun)
        {$a=$copun->created_at;
            $b= Carbon::now()->subDays( $copun->period_of_copun);
            if($a<=$b){
                $copun->delete();
            }

        }

    }
}
