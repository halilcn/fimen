<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MentorMenteeProgramDetailInformationResource extends JsonResource
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
            'info' => [
                'number_of_days_spent' => $this->created_at->diffInDays(now()),
            ],
            'notifications' => MentorMenteeProgramDetailInformationNotificationResource::collection(
                $this->notifications
            )
        ];
    }
}
