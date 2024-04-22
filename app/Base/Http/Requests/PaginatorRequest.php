<?php

namespace App\Base\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class PaginatorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => 'nullable|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1',
        ];
    }
    
    public function getLimit(): int
    {
        return $this->input('limit') ?? 15;
    }
    
    public function getPage(): int
    {
        return $this->input('page') ?? 1;
    }
}
