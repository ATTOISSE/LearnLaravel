<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => ['required','min:4']
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Le champ :attribute est obligatoire.',
            'password.min' => 'le mot de passe doit avoir au moins 4 caracteres.',
            'email.email' => 'Le format du champ :email est invalide.',
            'email.required' => 'Le champ :attribute est obligatoire.',
        ];
    }
}