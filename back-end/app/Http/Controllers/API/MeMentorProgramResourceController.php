<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeMentorProgramDetailResource;
use App\Http\Resources\MeMentorProgramsResource;
use App\Models\MentorProgram;
use Illuminate\Http\Request;
use \App\Traits\MentorProgram as MentorProgramTrait;

class MeMentorProgramResourceController extends Controller
{
    use MentorProgramTrait;

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return MeMentorProgramsResource::collection($request->user()->mentorPrograms);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param  MentorProgram  $mentorProgram
     * @return MeMentorProgramDetailResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(MentorProgram $mentorProgram)
    {
        $this->authorize('destroy', $mentorProgram);

        $mentorProgram->load('usersAppeal', 'approvedUsers:id');
        $mentorProgram->usersAppeal = $this->checkSelectedMentee(
            $mentorProgram->usersAppeal,
            $mentorProgram->approvedUsers
        );
        return MeMentorProgramDetailResource::make($mentorProgram);
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
     * @param  MentorProgram  $mentorProgram
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(MentorProgram $mentorProgram)
    {
        $this->authorize('destroy', $mentorProgram);
        $mentorProgram->usersAppeal()->detach();
        $mentorProgram->approvedUsers()->detach();
        $mentorProgram->delete();

        return response(['status' => true], 202);
    }
}
