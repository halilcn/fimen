<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchUserResource extends JsonResource
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
            'username' => $this->username,
            'image' => $this->image,
            'name' => $this->name,
            'surname' => $this->surname,
            'mentor' => $this->when(
                $this->mentor,
                function () {
                    return [
                        'competency_name' => $this->mentor->competency->name
                    ];
                },
                false
            )
        ];
    }
}
