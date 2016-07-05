<?php

namespace App\Policies;

use App\User;
use App\Venta;
use Illuminate\Auth\Access\HandlesAuthorization;

class VentaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */
    public function destroy(User $user, Venta $venta)
    {
        return $user->id === $venta->user_id;
    }
}
