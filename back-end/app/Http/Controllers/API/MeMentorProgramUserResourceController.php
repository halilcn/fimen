<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MentorProgram;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MeMentorProgramUserResourceController extends Controller
{
    public function index(Request $request, MentorProgram $mentorProgram)
    {
        $this->authorize('view', $mentorProgram);

        return $mentorProgram->usersAppeal()->with('user')->get();
        /*  ->when(
              true,
              function (Builder $query) {
                  $query->where('users.cv_path', '!=', null);
              }
          )*/
        // ->get();
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
