<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class PutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator): void
    {
        if ($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);
            throw new ValidationValidationException($validator, $response);
        }
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:250',
            'slug' => 'required|min:5|max:250|unique:categories,slug,' . $this->route('category')->id
        ];
    }
}
