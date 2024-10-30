<?php

namespace App\Region\Http\Requests\Data;

use Illuminate\Foundation\Http\FormRequest;

class DataGetRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'action' => 'required|in:search',
            'lat'    => 'required|numeric',
            'lan'    => 'required|numeric',
        ];
    }
    
    public function messages(): array
    {
        return [
            'action.in' => 'The selected :attribute should be "search".',
        ];
    }
    
    public function getLan(): float
    {
        return $this->input('lan');
    }
    
    public function getLat(): float
    {
        return $this->input('lat');
    }
}
