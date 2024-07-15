<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        return [
            'title' => 'required|min:3|max:100',
            'author' => 'required|min:5|max:50',
            'plot' => 'required|min:10|max:1000',
            'cover' => 'image|mimes:png,jpg,webp,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Il campo :attribute è richiesto',
            'min' => 'Il campo :attribute deve avere minimo :min caratteri',
            'max' => 'Il campo :attribute deve avere massimo :max caratteri',
            'image' => 'Il file deve essere un\'immagine',
            'mimes' => 'Le estensioni accettate sono :values',
        ];
    }

    public function attributes(){
        return [
            'title' => 'titolo'
        ];
    }
}
