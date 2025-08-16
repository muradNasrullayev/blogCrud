<?php

namespace App\Http\Requests\Blogs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        'title'       => 'required|string|max:25',
        'description' => 'required|string|max:100',
        'image'       => 'nullable|image',   
    ];
}

public function messages()
    {
        return [
            'title.required'       => 'Title boş ola bilməz.',
            'title.max'            => 'Title maksimum 25 simvol ola bilər.',
            'description.required' => 'Description boş ola bilməz.',
            'description.max'      => 'Title maksimum 100 simvol ola bilər.',
        ];
    }

}
