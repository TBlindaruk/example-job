<?php

namespace App\Region\Http\Requests;

use App\Base\Http\Requests\PaginatorRequest;
use App\Region\ORM\Models\Job;
use Illuminate\Validation\Rule;

class JobGetRequest extends PaginatorRequest
{
    protected $stopOnFirstFailure = true;
    
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return array_merge(
            parent::rules(),
            [
                'action' => 'required|in:list',
                'status' => ['required', Rule::in(Job::STATUS)],
            ],
        );
    }
    
    public function messages(): array
    {
        return
            array_merge(
                parent::messages(),
                [
                    'action.in' => 'The selected :attribute should be "list".',
                    'status.in' => 'The selected :attribute should be from ' . implode(' or ', Job::STATUS),
                ]
            );
    }
    
    public function getStatus(): int
    {
        return $this->input('status');
    }
}
