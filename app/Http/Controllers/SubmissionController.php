<?php

namespace App\Http\Controllers;

use App\DTOs\SubmissionData;
use App\Http\Requests\SubmissionStoreRequest;
use App\Http\Services\SubmissionService;
use Illuminate\Http\JsonResponse;

class SubmissionController extends Controller
{
    /**
     * @param SubmissionStoreRequest $request
     * @param SubmissionService $submissionService
     * @return JsonResponse
     */
    public function store(SubmissionStoreRequest $request, SubmissionService $submissionService): JsonResponse
    {
        $submissionData = SubmissionData::fromRequest($request);

        $submissionService->storeSubmission($submissionData);

        return new JsonResponse(data: ['message' => 'success']);
    }
}
