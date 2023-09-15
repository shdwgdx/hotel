<?php

namespace App\Policies;

use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisementPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Advertisement $advertisement)
    {
        return $advertisement->user_id === $user->id;
    }
}
