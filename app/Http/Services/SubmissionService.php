<?php

namespace App\Http\Services;

use App\DTOs\SubmissionData;
use App\Jobs\StoreSubmission;

class SubmissionService
{
    /**
     * @param SubmissionData $submissionData
     * @return void
     */
    public function storeSubmission(SubmissionData $submissionData): void
    {
        StoreSubmission::dispatch($submissionData);
    }
}
