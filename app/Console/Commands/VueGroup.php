<?php

namespace App\Console\Commands;

use App\Traits\VueGenerater;
use Illuminate\Console\Command;

class VueGroup extends Command
{
    use VueGenerater;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vue:group {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'vue:group Admin';

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
        $arg = strtolower($this->argument('name'));

        if($this->ifRouteExist($arg)){
            return $this->error('The menu already exists');
        }

        if(!$this->copyTemplateDirectory($arg)){
            return $this->error('Something when wrong, please try again');
        }

        if(!$this->addToRouter($arg)){
             return $this->error('Something when wrong! please try again');
        }

        if(!$this->addToVuex($arg)){
             return $this->error('Something when wrong! please try again');
        }

        return $this->info('Success');
    }
}
