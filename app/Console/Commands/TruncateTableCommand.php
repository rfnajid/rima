<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Facades\DB;
use App\Helpers\GlobalHelper as G;


class TruncateTableCommand extends Command {

    /**
     *  The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate {tables*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Truncating tables";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {

        $tables = $this->argument('tables');

        if(!$tables || count($tables) == 0){
            G::log('No table selected!!');
            return;
        }

        foreach ($tables as $table) {
            G::log("Truncating {$table}...");
            DB::table($table)->delete();
        }

    }

}
