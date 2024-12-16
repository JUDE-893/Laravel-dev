<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WriteFormRequest extends FormRequest
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
            'title' => 'required|max:150',
            'intro' => 'required|max:100|min:30',
            'post_img' => 'required',
            'contentBody' => 'required|min:500|max:10000',
        ];
    }
}
