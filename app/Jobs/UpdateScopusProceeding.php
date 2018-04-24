<?php

namespace App\Jobs;

use App\Achievement;
use App\Repositories\ScopusRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateScopusProceeding implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $repo = new ScopusRepository;
        $proceeding = $repo->getProceeding();

        Achievement::where('name', 'proceeding_scopus')->first()->update([
            'value' => $proceeding
        ]);
    }
}
