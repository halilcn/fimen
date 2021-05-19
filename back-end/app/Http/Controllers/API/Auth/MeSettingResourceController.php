<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeSettingsRequest;
use App\Http\Resources\MeSettingsResource;
use App\Http\Resources\MeUpdatedSettingResource;

//facade
use App\Jobs\UploadProfileImage;
use App\Services\ApiStorageService;

use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Intervention\Image\Facades\Image;


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
            $file = Image::make($request->file('image_file'));

            //  $file_image = Image::make($request->file('image_file'));
            //      $file_image->resize(512, 512);
            //         $img->resize(100, 100);

            //  (new ApiStorageService)->put($request->file('image_file')->getRealPath());

            //   (new ApiStorageService)->delete();

            // return UploadProfileImage::dispatchNow($request->file('image_file')->getRealPath());
        }

        if ($request->has('cv_file')) {
            //İş
        }

        return "ok";

        $user = $request->user()->update($validated);
        return MeUpdatedSettingResource::make($user);
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
