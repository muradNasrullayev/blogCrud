<?php

namespace App\Http\Requests\Blogs;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        'image'       => 'required|image |mimes:jpeg,png,jpg|max:5120',
    ];
}

    public function messages()
    {
        return [
            'title.required'       => 'Title boş ola bilməz.',
            'title.max'            => 'Title maksimum 25 simvol ola bilər.',
            'description.required' => 'Description boş ola bilməz.',
            'description.max'      => 'Title maksimum 100 simvol ola bilər.',
            'image.required'       => 'Şəkil seçilməlidir.',
            'image.image'          => 'Yüklədiyiniz fayl şəkil formatında olmalıdır.',
            'image.mimes'          => 'Şəkil yalnız jpeg, png, jpg formatında ola bilər.',
            'image.max'            => 'Şəkil maksimum 5 MB ola bilər.',
        ];
    }

}
