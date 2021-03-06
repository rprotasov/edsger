<?php

namespace App\Policies;

use App\User;
use App\BoxPermission;
use App\BoxShare;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoxSharePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the
     *     given box share entry
     *
     * @param User $user
     * @param BoxShare $share
     * @return bool
     */
    public function destroy(User $user, BoxShare $share)
    {
        $permissions =
            BoxPermission::where('user_id', $user->id)
                            ->where('box_id', $share->box_id)
                            ->get();

        if (count($permissions) != 1) {
            return false;
        }

        return true;
    }
}
