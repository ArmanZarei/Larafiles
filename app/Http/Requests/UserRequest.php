<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'wallet' => 'integer',
            'role' => 'integer'
        ];
        if (request()->route('user_id') && intval(request()->route('user_id')) > 0) {
            $rules['password'] = 'min:6';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required'
        ];
    }
}
