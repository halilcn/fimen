<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use function Symfony\Component\Translation\t;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'username' => $this->username,
            'image' => $this->image,
            'about' => $this->about,
            'social_media' => $this->social_media,
            'cv_path' => '',
            'mentor' => $this->when(
                $this->mentor,
                function () {
                    return [
                        'total_mentee_count' => 10,
                        'total_program_count' => $this->mentor->programs()->count(),
                        'competency' => $this->mentor->competency->name
                    ];
                },
            ),
            'permissions' => [

            ],
        ];
    }
}
