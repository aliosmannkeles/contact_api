<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateContactMail extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Ad alanı zorunludur.',
            'first_name.min' => 'Ad alanı en az 2 karekter olmalıdır.',
            'first_name.max' => 'Ad alanı en fazla 100 karekter olmalıdır.',
            'last_name.required' => 'Soyad alanı zorunludur.',
            'last_name.min' => 'Soyad alanı en az 2 karekter olmalıdır.',
            'last_name.max' => 'Soyad alanı en fazla 100 karekter olmalıdır.',
            'phone.required' => 'Telefon alanı zorunludur.',
            'phone.max' => 'Telefon alanı en fazla 11 karekter olmalıdır.',
            'email.required' => 'Email alanı zorunludur.',
            'email.max' => 'Email alanı en fazla 50 karekter olmalıdır.',
            'email.email' => 'Geçersiz email formatı.',
            'message.required' => 'Mesaj alanı zorunludur.',
            'message.max' => 'Mesaj alanı en fazla 500 karekter olmalıdır.',
        ];
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'phone' => 'required|max:11',
            'email' => 'required|max:50|email',
            'message' => 'required|max:500',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Doğrulama hataları',
                'errors' => $validator->errors()
            ])
        );
    }
}
