<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MentorProgramRequest;
use App\Http\Resources\MentorProgramDetailResource;
use App\Http\Resources\MentorProgramsResource;
use App\Models\MentorProgram;
use Illuminate\Http\Request;


class MentorProgramResourceController extends Controller
{

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return MentorProgramsResource::collection(
            MentorProgram::query()
                ->withFilters($request)
                ->with(
                    [
                        'mentorUser',
                        'mentorUser.user',
                        'mentorUser.competency'
                    ]
                )
                ->take(5)
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
     * @param  MentorProgramRequest  $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function store(MentorProgramRequest $request)
    {
        $request->user()->mentor->programs()->create(
            array_merge($request->validated(), ['slug' => rand(100000, 999999)])
        );

        return response()->json(['status' => true], 201);
    }

    /**
     * @param  MentorProgram  $mentorProgram
     * @return MentorProgramDetailResource
     */
    public function show(MentorProgram $mentorProgram)
    {
        return new MentorProgramDetailResource($mentorProgram);
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
