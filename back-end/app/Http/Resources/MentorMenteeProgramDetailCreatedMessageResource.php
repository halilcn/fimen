<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MentorMenteeProgramDetailCreatedMessageResource extends JsonResource
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
            'is_my_message' => true,
            'from_user_id' => $this->from_user_id,
            'to_user_id' => $this->to_user_id,
            'mentor_mentee_id' => $this->mentor_mentee_id,
            'message' => $this->when(
                $this->message_type === 'message',
                function () {
                    return $this->message;
                },
                function () {
                    return collect(json_decode($this->message))->map(function ($media) {
                        return Storage::url($media);
                    });
                }
            )
            ,
            'message_type' => $this->message_type,
            'created_at' => $this->created_at
        ];
    }
}
