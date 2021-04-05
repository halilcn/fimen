<?php


namespace App\Traits;

trait Image
{

    public function createDefaultProfileImage(string $name, string $surname): string
    {
        return "https://ui-avatars.com/api/?name=${name}+${surname}&background=f2f2f2&size=128";
    }

}
