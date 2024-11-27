<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequestes extends FormRequest
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
          'email' => 'required|min:10|max:30',
          'password' => 'required|max:15',
        ];
    }

    /**
        * Get the custom validation messages.
        *
        * @return array
        */
       public function messages()
       {
           return [
               'email.max' => 'Invalid email field! Must not be greater than 30 characters.',
               'email.min' => 'Invalid email field! Must not be less than 10 characters.',
               'password.max' => 'Invalid password field! Must not be greater than 15 characters.',
           ];
       }
}
