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
            'from_user_information' => new MentorMenteeProgramDetailMessageUserResource(
                $request->user()->isProgramMentee($this->user_id)
                    ? $this->mentee
                    : $this->mentor->user
            ),
        ];
    }
}
