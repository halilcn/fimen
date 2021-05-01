<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorProgramRequest extends FormRequest
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
            'title' => ['required'],
            'explanation' => ['required'],
            'mentee_count' => ['required', 'min:1'],
            'deadline' => ['required'],  //bugünden geçmiş olmasın
            'questions.*' => ['max:1000']
        ];
    }
}
