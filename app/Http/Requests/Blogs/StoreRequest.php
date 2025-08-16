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
        'title'       => 'required|string|max:256',
        'description' => 'required|string|max:65000',
        'image'       => 'required|image|mimes:jpeg,png,jpg|max:10240',
    ];
}

    public function messages()
    {
        return [
            'title.required'       => 'Title boş ola bilməz.',
            'title.max'            => 'Title maksimum 256 simvol ola bilər.',
            'description.required' => 'Description boş ola bilməz.',
            'description.max'      => 'Title maksimum 65000 simvol ola bilər.',
            'image.required'       => 'Şəkil seçilməlidir.',
            'image.image'          => 'Yüklədiyiniz fayl şəkil formatında olmalıdır.',
            'image.mimes'          => 'Şəkil yalnız jpeg, png, jpg formatında ola bilər.',
            'image.max'            => 'Şəkil maksimum 10 MB ola bilər.',
        ];
    }

}
