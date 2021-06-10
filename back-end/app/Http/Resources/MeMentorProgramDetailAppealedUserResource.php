<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeMentorProgramDetailAppealedUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'image' => $this->image,
            'answers' => $this->appeal->answers,
            'is_mentee_selected' => $this->is_mentee_selected
        ];
    }
}
