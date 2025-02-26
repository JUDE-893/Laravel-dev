<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CabinFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'max_capacity' => 'required|integer|min:1',
            'regular_price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|between:0,1',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:2048'
        ];
    }

    // costomize the on validation fails event to return a json instead fo redirecting the user
    protected function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(response()->json([
        'success' => false,
        'message' => 'validation fails',
        'errors' => $validator->errors()
      ], 422));

    }
}
