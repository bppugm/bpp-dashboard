<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LaunchScheduledUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $repo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repo = resolve('App\Repositories\ScheduledUpdatesRepository');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->repo->update();
    }
}
