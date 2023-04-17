<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'required' =>  ':attribute tidak boleh kosong.',
            'name.required' => 'nama harus di isi.',
            'email' => 'sepertinya yang anda masukkan bukan :attribute.',
            'unique' => ':attribute sudah terdaftar.',
            'min' => ':attribute minimal 6 karakter.',
            'confirmed' => ':attribute tidak cocok.',
        ];
    }
}
