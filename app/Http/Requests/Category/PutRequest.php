<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:250',
            'slug' => 'required|min:5|max:250|unique:categories,slug,'.$this->route('category')->id
        ];
    }
}
