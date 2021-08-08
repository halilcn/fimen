<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MentorMenteeProgramDetailInformationResource;
use App\Http\Resources\MentorMenteeProgramDetailResource;
use App\Http\Resources\MentorMenteeProgramsResource;
use App\Models\MentorMenteeProgram;
use App\Models\MentorProgram;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorMenteeProgramResourceController extends Controller
{
    /**
     * @param  Request  $request
     * @return MentorMenteeProgramsResource
     */
    public function index(Request $request)
    {
        //TODO: Code Review

        // Bad Code ?
        return MentorMenteeProgramsResource::make(
            MentorMenteeProgram::query()
                ->where('user_id', $request->user()->id)
                ->when(
                    $request->user()->mentor,
                    function (Builder $query) use ($request) {
                        $query->orWhere('mentor_id', $request->user()->mentor->id);
                    }
                )
                ->with('mentor', 'mentee')
                ->get()
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
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $mentorProgram = MentorProgram::query()
            ->where('slug', $request->input('program_slug'))
            ->firstOrFail();

        $this->authorize('create', [MentorMenteeProgram::class, $mentorProgram]);

        //TODO: Do this with pure sql
        abort_if(
            $mentorProgram->approvedUsers()->wherePivot('user_id', $request->input('user_id'))->exists(),
            409
        );

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
     * @param  MentorMenteeProgram  $mentorMenteeProgram
     * @return MentorMenteeProgramDetailResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(MentorMenteeProgram $mentorMenteeProgram)
    {
        $this->authorize('show', $mentorMenteeProgram);

        $mentorMenteeProgram->load(
            [
                'mentee',
                'mentor.user',
                'meetings' => function (HasMany $query) {
                    $query->orderBy('date')
                        ->where('date', '>', now())
                        ->select('address', 'date', 'mentor_mentee_program_id')
                        ->first();
                }
            ]
        );

        return MentorMenteeProgramDetailResource::make($mentorMenteeProgram);
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
     * @param  MentorMenteeProgram  $mentorMenteeProgram
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(MentorMenteeProgram $mentorMenteeProgram)
    {
        $this->authorize('delete', $mentorMenteeProgram);

        $mentorMenteeProgram->deleteRelationships();
        $mentorMenteeProgram->delete();

        return response()->json(['status' => true]);
    }

    /**
     * @param  MentorMenteeProgram  $mentorMenteeProgram
     * @return MentorMenteeProgramDetailInformationResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function getInformation(MentorMenteeProgram $mentorMenteeProgram)
    {
        $this->authorize('show', $mentorMenteeProgram);

        $mentorMenteeProgram->load('notifications');

        return MentorMenteeProgramDetailInformationResource::make($mentorMenteeProgram);
    }
}
