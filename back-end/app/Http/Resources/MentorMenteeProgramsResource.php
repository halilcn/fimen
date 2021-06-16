<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MentorMenteeProgramsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'programs' => MentorMenteeProgramsItemResource::collection($this->collection),
            'mentor_infos' => $this->when(
                $request->user()->mentor,
                function () {
                    return [
                        'active_mentee_count' => request()->user()->mentor->mentorPrograms()->where(
                            'active',
                            true
                        )->count()
                    ];
                }
            ),
        ];
    }
}
