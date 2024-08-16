<?php

namespace App\Jobs;

use App\DTOs\SubmissionData;
use App\Events\SubmissionSaved;
use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class StoreSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public readonly SubmissionData $submissionData
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::transaction(function () {
            /** @var Submission $submission */
            $submission = Submission::query()
                ->create($this->submissionData->toArray());

            SubmissionSaved::dispatch($submission);
        });
    }

    /**
     * @param Throwable|null $exception
     * @return void
     */
    public function failed(?Throwable $exception): void
    {
        Log::error('[StoreSubmission Job]: Failed processing', [
            'exception' => $exception->getMessage(),
            'data' => (array)$this->submissionData,
        ]);
    }
}
