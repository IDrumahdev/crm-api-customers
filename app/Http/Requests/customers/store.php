<?php

namespace App\Http\Requests\customers;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class store extends FormRequest
{
        /**
     * Handler Validator Logs.
     *
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {
        Log::info("Bad Request Data Customer.");
        throw new HttpResponseException(response()->json([
            'code'  =>400,
            'error' =>true,
            'data'  =>[
                'message' =>$validator->errors()
            ]
        ],400));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'    => 'required|max:100',
            'last_name'     => 'required|max:100',
            'birth_day'     => 'required|date',
            'place_birth'   => 'required',
            'email'         => 'required|email|unique:customers,email',
            'mobilephone'   => 'required|regex:/^08[0-9]{8,13}$/',
            'address'       => 'required',
            'city'          => 'required',
            'country'       => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'first_name.required'   => 'Kolom nama depan wajib diisi.',
            'first_name.max'        => 'Nama depan tidak boleh lebih dari 100 karakter.',
            'last_name.required'    => 'Kolom nama belakang wajib diisi.',
            'last_name.max'         => 'Nama belakang tidak boleh lebih dari 100 karakter.',
            'birth_day.required'    => 'Kolom tanggal lahir wajib diisi.',
            'birth_day.date'        => 'Format tanggal lahir tidak valid.',
            'place_birth.required'  => 'Kolom tempat lahir wajib diisi.',
            'email.required'        => 'Kolom email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'email.unique'          => 'Email sudah digunakan.',
            'mobilephone.required'  => 'Kolom nomor telepon wajib diisi.',
            'mobilephone.regex'     => 'Format nomor telepon tidak valid. Harus dimulai dengan 08 dan berisi 10-15 angka.',
            'address.required'      => 'Kolom alamat wajib diisi.',
            'city.required'         => 'Kolom kota wajib diisi.',
            'country.required'      => 'Kolom negara wajib diisi.',
        ];
    }
}
