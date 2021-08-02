<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MentorMenteeProgramDetailMessageContentResource extends JsonResource
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
            $this->map(function ($message) {
                return [
                    'from_user_id' => $message->from_user_id,
                    'to_user_id' => $message->to_user_id,
                    'message' => $message->message,
                    'message_type' => $message->message_type,
                    'created_at' => $message->created_at
                ];
            })
        ];
    }
}
