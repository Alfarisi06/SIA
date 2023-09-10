<?php

namespace App\Http\Requests\Mapel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMapelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function messages(): array
    {
        return [
            'required' => 'wajib diisi',
            'string' => 'format salah',
            'date_format' => 'format salah'
        ];   
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'waktu' => 'required|date_format:H:i'
        ];
    }
}
