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
                    'cloud_name' => 'dbaeatlkx',
                    'api_key' => '319662467781978',
                    'api_secret' => 'eZBhHBYknlMseB3pYEQzT6grJFE'
                ],
                'url' => [
                    'secure' => true
                ]
            ]
        );
    }

    public function put(string $file, array $options = [])
    {
        return (new UploadApi())->upload($file, $options);
    }

    public function delete()
    {
        return (new UploadApi())->destroy(
            "https://res.cloudinary.com/dbaeatlkx/image/upload/v1621420521/vgqzywljfs15napezf2s.jpg"
        );
    }

}
