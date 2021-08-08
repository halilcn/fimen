<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MentorMenteeProgramMeetingRequest;
use App\Http\Resources\MentorMenteeProgramDetailMeetingResource;
use App\Jobs\CreateMentorMenteeProgramNotification;
use App\Models\MentorMenteeProgram;
use App\Models\MentorMenteeProgramMeeting;
use Illuminate\Http\Request;

class MentorMenteeProgramMeetingResourceController extends Controller
{

    /**
     * @param  MentorMenteeProgram  $mentorMenteeProgram
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(MentorMenteeProgram $mentorMenteeProgram)
    {
        $this->authorize('show', [MentorMenteeProgramMeeting::class, $mentorMenteeProgram]);

        $mentorMenteeProgram->load('meetings');

        return MentorMenteeProgramDetailMeetingResource::collection($mentorMenteeProgram->meetings);
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
     * @param  MentorMenteeProgram  $mentorMenteeProgram
     * @param  MentorMenteeProgramMeetingRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MentorMenteeProgram $mentorMenteeProgram, MentorMenteeProgramMeetingRequest $request)
    {
        $this->authorize('create', [MentorMenteeProgramMeeting::class, $mentorMenteeProgram]);

        $this->transaction(
            function () use ($mentorMenteeProgram, $request) {
                $mentorMenteeProgram->meetings()->create($request->validated());
                CreateMentorMenteeProgramNotification::dispatch(
                    $mentorMenteeProgram,
                    'CreatedNewMeeting',
                    [
                        'meeting_date' => $request->input('date')
                    ]
                );
            }
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
