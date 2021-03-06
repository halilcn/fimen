<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeMentorProgramDetailAppealedUserResource;
use App\Models\MentorProgram;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Traits\MentorProgram as MentorProgramTrait;

class MeMentorProgramUserResourceController extends Controller
{
    use MentorProgramTrait;

    /**
     * @param  Request  $request
     * @param  MentorProgram  $mentorProgram
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request, MentorProgram $mentorProgram)
    {
        $this->authorize('view', $mentorProgram);

        $mentorProgram->load('approvedUsers:id');

        return MeMentorProgramDetailAppealedUserResource::collection(
            $this->checkSelectedMentee(
                $mentorProgram->usersAppeal()
                    ->appealUsersWithFilters($request)
                    ->get(),
                $mentorProgram->approvedUsers
            )
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
