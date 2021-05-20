<?php


namespace App\Contracts;


interface ApiStorageInterface
{
    public function put(string $file, array $options = []): object;

    public function delete(string $publicId): object;
}
