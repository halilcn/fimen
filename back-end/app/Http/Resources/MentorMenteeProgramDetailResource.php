<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MentorMenteeProgramDetailResource extends JsonResource
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
            'mentee' => MentorMenteeProgramDetailUserResource::make($this->mentee),
            'mentor' => MentorMenteeProgramDetailUserResource::make($this->mentor->user),
            'is_mentor' => $request->user()->isProgramMentor($this->mentor->user->id),
            'next_meeting' => $this->when(
                $this->meetings->count() != 0,
                function () {
                    return $this->meetings[0];
                },
                function () {
                    return false;
                }
            ),
        ];
    }
}
