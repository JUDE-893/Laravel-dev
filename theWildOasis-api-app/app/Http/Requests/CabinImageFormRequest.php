<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CabinImageFormRequest extends FormRequest
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
          'image' => 'image|mimes:jpeg,png,svg,jpg',
          'imageName' => 'string'
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
