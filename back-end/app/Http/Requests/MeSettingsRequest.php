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

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'social_media' => explode(',', $this->input('social_media', []))//??
            ]
        );
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
            'social_media' => ['array', 'nullable'],
            'social_media.*' => ['string']
        ];
    }

}
