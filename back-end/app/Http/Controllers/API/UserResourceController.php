<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SearchUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class UserResourceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) {
            return SearchUserResource::collection(
                User::query()
                    ->where('name', 'LIKE', '%'.$request->input('search').'%')
                    ->orWhere('username', 'LIKE', '%'.$request->input('search').'%')
                    ->with('mentor.competency:name,id')
                    ->get()
            );
        }
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


    public function show($username)
    {
        return UserResource::make(User::where('username', $username)->first());
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
