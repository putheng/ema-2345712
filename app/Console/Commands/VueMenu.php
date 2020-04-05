<?php

namespace App\Console\Commands;

use App\Traits\VueGenerater;
use Illuminate\Console\Command;

class VueMenu extends Command
{
    use VueGenerater;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vue:menu {menu}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'vue:menu Admin\\\Profile\\\Password';

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
        $arg = explode('\\', strtolower($this->argument('menu')));

        if($this->pageFileExist($arg)){
            return $this->error('Page already exist!');
        }

        if(!$this->createDirectory($arg)){
            return $this->error('Something when wrong, please try again!x');
        }

        if(!$this->createPage($arg)){
            return $this->error('Something when wrong, please try again!y');
        }

        return $this->info('Success');
    }
}
