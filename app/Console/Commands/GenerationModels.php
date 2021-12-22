<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class GenerationModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gen:mod';

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
     * @return int
     */
    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table){
            $table = (array) $table;
            $model = Str::studly(Str::singular($table['Tables_in_flowers_new']));
            //echo $table['Tables_in_flowers_new']."\n";
            //echo $model."\n";
            //$this::call("infyom:model ".$model.' --fromTable --tableName='.$table['Tables_in_flowers_new']);

             $this->call('infyom:model', [
                    'model' => $model, '--fromTable' => true, '--tableName' => $table['Tables_in_flowers_new']
                ]);

        }
        return Command::SUCCESS;
    }
}
