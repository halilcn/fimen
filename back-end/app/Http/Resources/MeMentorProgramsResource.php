<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeMentorProgramsResource extends JsonResource
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
            'mentee_count' => $this->mentee_count,
            'questions_count' => $this->questions()->count(),
            'deadline' => $this->deadline,
            'appeal_count' => $this->usersAppeal()->count()
        ];
    }
}
