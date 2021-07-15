<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MentorMenteeProgramDetailInformationNotificationResource extends JsonResource
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
            'notification_type' => $this->notification_type,
            'data' => $this->data,
            'created_at' => $this->created_at
        ];
    }
}
