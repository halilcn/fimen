<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class MentorProgramsResource extends JsonResource
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
            'user' => [
                'username' => $this->mentorUser->user->username,
                'name' => $this->mentorUser->user->name,
                'image' => $this->mentorUser->user->image,
                'competency_name' => $this->mentorUser->competency->name
            ],
            'title' => $this->title,
            'explanation' => Str::limit($this->explanation, 200),
            'slug' => $this->slug,
            'mentee_count' => $this->mentee_count,
            'deadline' => $this->deadline->isPast() ? false : $this->deadline
        ];
    }
}
