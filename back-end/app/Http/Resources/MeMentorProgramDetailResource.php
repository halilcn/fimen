<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeMentorProgramDetailResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'mentee_count' => $this->mentee_count,
            'has_questions' => !empty($this->questions),
            'questions' => $this->questions,
            'appealed_users' => MeMentorProgramDetailAppealedUserResource::collection($this->usersAppeal)
        ];
    }
}
