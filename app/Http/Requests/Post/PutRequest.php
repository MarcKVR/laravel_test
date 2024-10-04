<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException as ValidationValidationException;


class PutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:250',
            'content' => 'required|min:8',
            'category_id' => 'required|integer',
            'description' => 'required|min:9',
            'posted' => 'required',
            'slug' => 'required|min:5|max:250|unique:posts,slug,' . $this->route('post')->id,
            'image' => 'mimes:jpeg,jpg,png|max:10240',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        if ($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);
            throw new ValidationValidationException($validator, $response);
        }
    }
}
