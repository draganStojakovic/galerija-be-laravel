<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'description' => 'max:1000',
            'image_url' => 'required|array|min:1',
            'image_url.*' => 'url',
            // 'image_url.*' => 'required|file|mimetypes:image/jpg,image/jpeg',  
            // 'image_url.*' => ["url", "regex:/(*.jpeg)/g"]
        ];
    }
}
