<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MentorMenteeProgramsItemResource extends JsonResource
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
            'is_mentor' => $request->user()->isProgramOwner($this->mentor->id),
            'is_active' => $this->active,
            'passing_time' => $this->created_at->diffInDays(now()),
            'mentor' => MentorMenteeProgramsItemUserResource::make($this->mentor->user),
            'mentee' => MentorMenteeProgramsItemUserResource::make($this->mentee),
        ];
    }
}
