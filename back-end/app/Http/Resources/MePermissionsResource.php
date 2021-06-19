<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MePermissionsResource extends JsonResource
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
            'permissions' => [
                'cv_visible' => $this->cv_visible
            ],
            'notifications' => [
                'mentor_program_notify' => $this->mentor_program_notify
            ]
        ];
    }
}
