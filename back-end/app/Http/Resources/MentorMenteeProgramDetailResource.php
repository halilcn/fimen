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
            'mentee' => [
                'username' => $this->mentee->username,
                'name' => $this->mentee->name,
                'image' => $this->mentee->image
            ],
            'mentor' => [
                'username' => $this->mentor->user->username,
                'name' => $this->mentor->user->name,
                'image' => $this->mentor->user->image,
            ],
            'next meeting' => null
        ];
    }
}
