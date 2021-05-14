<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeSettingsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:40'],
            'image_file' => ['nullable', 'image', 'max:2000'],
            'cv_file' => ['nullable', 'max:10000'],
            'about' => ['string'],
            'social_media' => ['string']
        ];
    }
}
