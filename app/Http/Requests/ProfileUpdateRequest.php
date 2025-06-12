<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                ],
            'password' => [
                'sometimes', // Make password optional for profile updates
                'required',  // If 'password' is present, it must be required
                'string',
                Password::min(8) // Minimum 8 characters
                    ->mixedCase() // At least one uppercase and one lowercase letter
                    ->numbers(), // At least one number
                'confirmed', // Ensures 'password' matches 'password_confirmation' field
            ],
            'actividad' => 'required|string',
            'cargo' => 'required|string',
            'vinculo' => 'required|string',
            'domicilio' => 'required|string',
            'localidad' => 'required|string',
            'telefono' => 'required|string',
            'cuit' => 'required|string',
        ];
    }
}
