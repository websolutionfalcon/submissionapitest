<?php

namespace Tests\Feature;

use App\Http\Controllers\SubmissionController;
use App\Http\Requests\SubmissionStoreRequest;
use App\Http\Services\SubmissionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\JsonResponse;
use Mockery;
use Tests\TestCase;

class SubmissionControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $request = Mockery::mock(SubmissionStoreRequest::class);
        $submissionService = Mockery::mock(SubmissionService::class);

        $submissionService->shouldReceive('storeSubmission')
            ->once()
            ->with($request);

        $controller = new SubmissionController();

        $response = $controller->store($request, $submissionService);

        $this->assertInstanceOf(JsonResponse::class, $response);

        $this->assertEquals(['message' => 'success'], $response->getData(true));
    }
}
