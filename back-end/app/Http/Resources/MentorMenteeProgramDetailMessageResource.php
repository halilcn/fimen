<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MentorMenteeProgramDetailMessageResource extends JsonResource
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
            'messages' => MentorMenteeProgramDetailMessageContentResource::collection($this->processedMessages),
            'user' => [
                'mentor' => new MentorMenteeProgramDetailMessageUserResource($this->mentor->user),
                'mentee' => new MentorMenteeProgramDetailMessageUserResource($this->mentee),
            ]
        ];
    }
}
