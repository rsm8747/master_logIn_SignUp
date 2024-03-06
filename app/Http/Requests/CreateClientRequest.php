<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:clients|email',
            'password' => 'required|confirmed',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add other validation rules as needed
        ];
    }
}
