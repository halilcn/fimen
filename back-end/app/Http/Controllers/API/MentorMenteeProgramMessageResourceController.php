<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MentorMenteeProgramMessageRequest;
use App\Http\Resources\MentorMenteeProgramDetailMessageResource;
use App\Models\MentorMenteeProgram;
use App\Models\MentorMenteeProgramMessage;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class MentorMenteeProgramMessageResourceController extends Controller
{
    public function index(MentorMenteeProgram $mentorMenteeProgram)
    {
        $this->authorize('show', [MentorMenteeProgramMessage::class, $mentorMenteeProgram]);

        $mentorMenteeProgram->load(
            [
                'messages',
                'mentor.user',
                'mentee'
            ]
        );

        $mentorMenteeProgram->processedMessages = $mentorMenteeProgram->messages->groupBy(function ($message) {
            return $message->created_at->format('d M Y');
        });

        return new MentorMenteeProgramDetailMessageResource(
            $mentorMenteeProgram
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param  MentorMenteeProgramMessageRequest  $request
     * @param  MentorMenteeProgram  $mentorMenteeProgram
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(MentorMenteeProgramMessageRequest $request, MentorMenteeProgram $mentorMenteeProgram)
    {
        $this->authorize('create', [MentorMenteeProgramMessage::class, $mentorMenteeProgram]);


        //Message Message Content
        $content = $request->input('content');
        if ($request->input('type') === 'media') {
            $content = collect();
            foreach ($request->file('content') as $media) {
                $content->push($media->store('message-media'));
            }
        }

        //Define Message toUserId
        $mentorUserId = $mentorMenteeProgram->mentor->user->id;
        $menteeUserId = $mentorMenteeProgram->user_id;
        $toUserId = $request->user()->id === $menteeUserId ? $mentorUserId : $menteeUserId;


        $mentorMenteeProgram->messages()->create(
            [
                'from_user_id' => $request->user()->id,
                'to_user_id' => $toUserId,
                'message_type' => $request->input('type'),
                'message' => $content,
            ]
        );

        return response()->json(['status' => true], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
