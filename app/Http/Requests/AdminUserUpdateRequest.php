<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminUserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('id');
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => [
                'required',
                'email:rfc,dns',
                'email',
                Rule::unique('users', 'email')->ignore($userId, 'id')
            ],
            'phone' => 'required|min:11|max:11',
            'role' => 'required',
            'address' => 'nullable',
            'status' => 'nullable',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'name.min' => 'Name not less than 3 characters',
            'name.max' => 'Name not more than 50 characters',

            'email.required' => 'Email is required',
            'email.unique' => 'This email already taken.',

            'phone.required' => 'Phone number is required.',
            'phone.max' => 'Phone number is invalid.',
            'phone.min' => 'Phone number is invalid.',

            'role.required' => 'Role is required',


        ];
    }


}
