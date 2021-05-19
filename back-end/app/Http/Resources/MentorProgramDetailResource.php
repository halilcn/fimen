<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use function Symfony\Component\Translation\t;

class MentorProgramDetailResource extends JsonResource
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
            'title' => $this->title,
            'explanation' => $this->explanation,
            'deadline' => $this->deadline,
            'mentee_count' => $this->mentee_count,
            'questions' => $this->questions,
            'user' => new MentorUserResource($this->mentorUser)
        ];
    }
}
