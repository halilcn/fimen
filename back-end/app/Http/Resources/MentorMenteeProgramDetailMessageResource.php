<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MentorMenteeProgramDetailMessageResource extends JsonResource
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
            'messages' => $this->messages->each(function ($item) use ($request) {
                if ($item->message_type === 'media') {
                    $item->message = collect(json_decode($item->message))->map(function ($media) {
                        return Storage::url($media);
                    });
                }

                $item->is_my_message = $request->user()->checkUserId($item->from_user_id);
                return $item;
            })->groupBy(function ($message) {
                return $message->created_at->isoFormat('DD MMMM Y');
            }),
            'from_user_information' => new MentorMenteeProgramDetailMessageUserResource(
                $request->user()->isProgramMentee($this->user_id)
                    ? $this->mentee
                    : $this->mentor->user
            ),
        ];
    }
}
