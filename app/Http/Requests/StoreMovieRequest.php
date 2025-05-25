<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
        $rules = [
            'title' => 'required',
            'description' => 'required|min:3',
            'release_date' => 'required',
            'cast' => 'required',
            'genres' => 'required',
            'image' => 'required',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'title kudu di isi',
            'description.required' => 'Deskripsi kudu ono',
            'description.min' => 'minimal 3 kata le..'
        ];
    }
}
