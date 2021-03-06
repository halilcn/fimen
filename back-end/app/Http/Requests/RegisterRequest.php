<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'surname' => ['required', 'max:50'],
            'username' => ['required', 'unique:users', 'max:15', 'min:3', 'string', 'regex:/^\S*$/u'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'repeat_password' => ['required', 'same:password']
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Kullanıcı Adı'
        ];
    }
}
