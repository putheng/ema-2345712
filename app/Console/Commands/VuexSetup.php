<?php

namespace App\Console\Commands;

use App\Traits\VuexGenerator;
use Illuminate\Console\Command;

class VuexSetup extends Command
{
    use VuexGenerator;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vue:state {group} {--state=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'vue:state admin --state=user';

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
        $this->vueState();

        $this->vueGetter();

        $this->addMutation();
        
        $this->addAction();
    }
}
