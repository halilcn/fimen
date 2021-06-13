<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait MentorProgram
{
    /**
     * @param  Collection  $usersAppeal
     * @param  Collection  $approvedUsersId
     * @return object
     */
    public function checkSelectedMentee(Collection $usersAppeal, Collection $approvedUsersId): object
    {
        return $usersAppeal->map(
            function ($item) use ($approvedUsersId) {
                $item['is_mentee_selected'] = $approvedUsersId->contains('id', $item['id']);
                return $item;
            }
        );
    }

}
