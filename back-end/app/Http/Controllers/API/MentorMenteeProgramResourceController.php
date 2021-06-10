<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MentorMenteeProgram;
use App\Models\MentorProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorMenteeProgramResourceController extends Controller
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

    public function store(Request $request)
    {
        //sql olarak aynı user_id ve mentor_id kayıt olmamalı.! kayıt varsa kayıt olmayı engelle //migration ?
        $mentorProgram = MentorProgram::query()
            ->where('slug', $request->input('program_slug'))
            ->firstOrFail();
        $this->authorize('create', [MentorMenteeProgram::class, $mentorProgram]);

        $this->transaction(
            function () use ($request, $mentorProgram) {
                $userId = $request->input('user_id');
                $mentorProgram->approvedUsers()->attach($userId);
                $request->user()->mentor->mentorPrograms()->create(
                    [
                        'user_id' => $userId,
                    ]
                );
            }
        );
        return response(['status' => true], 201);
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
