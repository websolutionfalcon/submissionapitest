<?php

namespace App\DTOs;

use App\Http\Requests\SubmissionStoreRequest;
use Illuminate\Contracts\Support\Arrayable;

class SubmissionData implements Arrayable
{
    /**
     * @param string $name
     * @param string $email
     * @param string $message
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $message,
    ) {}

    /**
     * @param SubmissionStoreRequest $request
     * @return self
     */
    public static function fromRequest(SubmissionStoreRequest $request): self
    {
        $data = $request->validated();

        return new self(
            $data['name'],
            $data['email'],
            $data['message'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ];
    }
}
