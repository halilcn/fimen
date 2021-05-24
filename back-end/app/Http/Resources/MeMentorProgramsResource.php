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
            'id'=>$this->id,
            'title' => $this->title,
            'mentee_count' => $this->mentee_count,
            'questions_count' => count($this->questions),
            'slug' => $this->slug,
            'deadline' => $this->deadline,
            'appeal_count' => $this->usersAppeal()->count()
        ];
    }
}
