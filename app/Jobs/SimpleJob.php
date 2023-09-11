<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SimpleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $random)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $key = "simple-{$this->random}";

        $redis = app('redis');
        $redis->set($key, 'bar');
        $redis->get($key);
    }
}
