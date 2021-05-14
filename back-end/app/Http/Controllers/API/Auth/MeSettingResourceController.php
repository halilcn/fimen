<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeSettingsRequest;
use App\Http\Resources\MeSettingsResource;
use Illuminate\Http\Request;

class MeSettingResourceController extends Controller
{

    public function index(Request $request)
    {
        return new MeSettingsResource($request->user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }


    public function store(MeSettingsRequest $request)
    {
        $validated = $request->validated();

        if ($request->has('image_file')) {
        }

        if ($request->has('cv_file')) {
        }

        return $validated;

        $request->user()->update();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
