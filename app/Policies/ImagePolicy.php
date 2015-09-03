<?php

namespace App\Policies;

use App\Image;
use App\User;

class ImagePolicy
{
    /**
     * Determine if the given image can be deleted by the user.
     *
     * @return void
     */
    public function destroy(User $user, Image $image)
    {
        //
        return $user->instructor->instructor_id === $image->instructor_id;
    }
}
