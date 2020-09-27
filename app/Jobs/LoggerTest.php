<?php

namespace App\Jobs;

use App\Model\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoggerTest implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $text;
    /**
     * Create a new job instance.
     *
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::create([
            'description' => $this->text
        ]);
    }
}
