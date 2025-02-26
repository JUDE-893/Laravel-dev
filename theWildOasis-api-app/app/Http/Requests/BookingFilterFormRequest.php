<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookingFilterFormRequest extends FormRequest
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
            "pageLength" => 'sometimes|integer|min:5',
            "page" => 'sometimes|integer|min:1',
            "filterColumn" => 'sometimes|string|min:1',
            "filterValue" => 'sometimes|string|min:1',
            "sortByColumn" => 'sometimes|string',
            "order" => "sometimes"
        ];
    }

    protected function failedValidation(Validator $validator) {

      throw new HttpResponseException(response()->json([
        'success' => false,
        'message' => 'fails',
        'errors' => $validator->errors()
      ],422));
    }
}
