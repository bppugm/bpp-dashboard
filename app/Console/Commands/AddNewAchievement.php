<?php

namespace App\Console\Commands;

use App\Achievement;
use Illuminate\Console\Command;

class AddNewAchievement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:achievement {name} {--is_automated=0}';

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
        $achievement = Achievement::create(['category_id' => 4, 'name' => $this->argument('name'), 'value' => 0, 'automated' => $this->option('is_automated')]);

        $this->info('Achievement Created!');
    }
}
