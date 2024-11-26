<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        // Shared rules
        $rules = [
            'password' => 'required|min:8|confirmed', // Ensure password confirmation is present
            'role' => 'required|in:super_admin,admin,user',

        ];

        // Specific rules based on route
        if (request()->routeIs('user.login')) {
            $rules = array_merge($rules, [
                'user_id'  => 'required|integer|max:255',
                'password' => 'required|min:8',
                'brgy'     => 'required|string|max:255',
            ]);
        } else if (request()->routeIs('user.store')) {
            $rules = array_merge($rules, [
                'email'        => 'required|email|string|max:255|unique:users,email',
                'firstname'    => 'required|string|max:255',
                'middle_name'  => 'nullable|string|max:255',
                'lastname'     => 'required|string|max:255',
                'suffix'       => 'nullable|string|max:255',
                'phone_number' => 'required|string',
                'brgy'         => 'required|string|max:255',
                'birthdate'    => 'nullable|date|date_format:Y-m-d',
                'image_path'   => 'nullable|max:255',
                'approved'     => 'nullable|boolean',
            ]);
        } else if (request()->routeIs('user.password')) {
            $rules = array_merge($rules, [
                'password' => 'required|confirmed|min:8',
            ]);
        }

        return $rules;
    }
}
