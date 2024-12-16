<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginStoreRequestes extends FormRequest
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
        $rules =  [
          'email' => 'required|min:10|max:30',
          'password' => 'required|max:15',];

          if ($this->isMethod('post') && $this->routeIs("Login.store")) {
            $rules = array_merge($rules , ['password_confirmation' => 'required|max:15|same:password',
                                  'firstName' => 'required|max:10|min:2',
                                  'lastName' => 'required|max:20|min:2',
                                  ]);
          }else if ($this->isMethod('post') && $this->routeIs('Login.edite')) {};

        return $rules;
    }

    // /**
    //     * Get the custom validation messages.
    //     *
    //     * @return array
    //     */
    //    public function messages()
    //    {
    //        return [
    //            'email.max' => 'Invalid email field! Must not be greater than 30 characters.',
    //            'email.min' => 'Invalid email field! Must not be less than 10 characters.',
    //            'password.max' => 'Invalid password field! Must not be greater than 15 characters.',
    //        ];
    //    }
}
