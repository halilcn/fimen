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
            'user' => new MentorUserResource($this->mentorUser),
            'title' => $this->title,
            'explanation' => Str::limit($this->explanation, 200),
            'slug' => $this->slug,
            'mentee_count' => $this->mentee_count,
            'deadline' => $this->deadline->isPast() ? false : $this->deadline
        ];
    }
}
