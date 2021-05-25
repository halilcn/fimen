<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

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
            'is_favorite_user' => $request->user()->isFavoriteUser($this->id),
            'cv_path' => $this->when(
                $this->permissions->cv_visible,
                $this->cv_path == null
                    ? $this->cv_path
                    : Storage::url($this->cv_path),
            ),
            'mentor' => $this->when(
                $this->mentor,
                function () {
                    return [
                        'total_mentee_count' => $this->mentor->mentees()->count(),
                        'total_program_count' => $this->mentor->programs()->count(),
                        'competency' => $this->mentor->competency->name
                    ];
                },
            ),
            'permissions' => [
                'cv_visible' => $this->permissions->cv_visible
            ],
        ];
    }
}
