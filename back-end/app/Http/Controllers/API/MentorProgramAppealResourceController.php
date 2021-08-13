<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MentorProgramAppealRequest;
use App\Models\MentorProgram;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class MentorProgramAppealResourceController extends Controller
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


    /**
     * @param  MentorProgramAppealRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(MentorProgramAppealRequest $request)
    {
        $mentorProgram = MentorProgram::where('slug', $request->input('program_id'))->firstOrFail();
        $this->authorize('create-mentor-program-appeal', $mentorProgram);

        abort_if($mentorProgram->deadline->isPast(), 400); //400?
        $mentorProgram->usersAppeal()->attach(
            $request->user()->id,
            ['answers' => json_encode($request->input('answers'))]
        );

        return response(['status' => 'true'], 201);
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
