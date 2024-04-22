<?php

namespace App\Http\Requests\Data;

use Illuminate\Foundation\Http\FormRequest;

class DataPutRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'action'       => 'required|in:refresh',
            'delaySeconds' => 'nullable|integer|min:1|max:200',
        ];
    }
    
    public function messages(): array
    {
        return [
            'action.in' => 'The selected :attribute should be "refresh".',
        ];
    }
    
    public function getDelaySeconds(): int
    {
        return $this->input('delaySeconds') ?? 0;
    }
}
