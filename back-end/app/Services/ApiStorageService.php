<?php


namespace App\Services;


use App\Contracts\ApiStorageInterface;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;

class ApiStorageService implements ApiStorageInterface
{

    public function __construct()
    {
        Configuration::instance(
            [
                'cloud' => [
                    'cloud_name' => config('cloudder.cloudName'),
                    'api_key' => config('cloudder.apiKey'),
                    'api_secret' => config('cloudder.apiSecret'),
                ],
                'url' => [
                    'secure' => true
                ]
            ]
        );
    }

    /**
     * @param  string  $file
     * @param  array  $options
     * @return object
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function put(string $file, array $options = []): object
    {
        return (new UploadApi())->upload($file, $options);
    }

    /**
     * @param  string  $publicId
     * @return object
     */
    public function delete(string $publicId): object
    {
        return (new UploadApi())->destroy($publicId);
    }

}
