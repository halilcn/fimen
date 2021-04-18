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
            'file' => ['max:20000'],
            'linkedin' => ['max:1000'],
            'company_and_position' => ['max:1000'],
            'postscript' => ['max:1000'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(
            function ($validator) {
                if ($this->user()->mentorAppeal()->first()) {
                    $validator->errors()->add('already_has_appeal', 'Zaten başvuru yapılmış.');
                }
            }
        );
    }
}
