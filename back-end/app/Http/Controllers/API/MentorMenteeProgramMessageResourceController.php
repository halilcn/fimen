<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MentorMenteeProgramMessageRequest;
use App\Models\MentorMenteeProgram;
use App\Models\MentorMenteeProgramMessage;
use Illuminate\Http\Request;

class MentorMenteeProgramMessageResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function store(MentorMenteeProgramMessageRequest $request, MentorMenteeProgram $mentorMenteeProgram)
    {
        //TODO:

        $this->authorize('create', [MentorMenteeProgramMessage::class, $mentorMenteeProgram]);

        if ($request->hasFile('content')) {
            return "dosya";
        }
        return "mesaj";


        return json_decode($request->input('content'));

        if ($request->input('type') === 'media') {
            foreach (collect($request->input('content')) as $media) {
                return $media->store('deneme');
            }

            return 'media';
        }


        //Message Define toUserId
        $mentorUserId = $mentorMenteeProgram->mentor->user->id;
        $menteeUserId = $mentorMenteeProgram->user_id;
        $toUserId = $request->user()->id === $menteeUserId ? $mentorUserId : $menteeUserId;

        return $toUserId;

        $mentorMenteeProgram->messages()->create(
            [
                'from_user_id' => $request->user()->id,
                'to_user_id' => $toUserId,
                'message_type' => $request->input('type'),
                'message' => '?',
            ]
        );

        return $request->input('type');
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
