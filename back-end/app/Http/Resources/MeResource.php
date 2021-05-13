<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeResource extends JsonResource
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
            'name_surname' => $this->name,
            'username' => $this->username,
            'image' => $this->image,
            'mentor' => $this->when(
                $this->mentor()->exists(),
                function () {
                    return $this->mentor()->get();
                },
                function () {
                    return [
                        'status' => $this->mentorAppeal()->exists()
                    ];
                }
            )
        ];
    }
}
