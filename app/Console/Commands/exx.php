<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use Carbon\Carbon;


class exx extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:certain';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete reseption every day ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $books=Book::where('status_of_book',3)->get();

        foreach($books as $book)
        {
            $o=$book->created_at;
            $b= Carbon::now()->subDays($book->period_of_book);
            if( $o< $b){
            $book->delete();
            }
        }
    }
}
