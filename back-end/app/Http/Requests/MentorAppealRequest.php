<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorAppealRequest extends FormRequest
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
            'competency_id' => ['required', 'integer'],
            'year' => ['required'],
            'file' => ['required', 'max:20000'],
            'linkedin' => ['required'],
            'company_and_position' => ['required'],
            'postscript' => ['required'],
        ];
    }
}
