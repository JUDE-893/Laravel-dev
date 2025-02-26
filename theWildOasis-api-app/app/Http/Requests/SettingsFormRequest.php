<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsFormRequest extends FormRequest
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
          'min_booking_length' => 'sometimes|integer|min:1',
          'max_booking_length' => 'sometimes|integer|min:1',
          'max_guest_per_booking' => 'sometimes|integer|min:1',
          'breakfast_price' => 'sometimes|numeric|min:0',
        ];
    }
}
