<?php

namespace App\Policies;

use App\User;
use App\Proveedor;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProveedorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */
    public function destroy(User $user, Proveedor $proveedor)
    {
        return $user->id === $proveedor->user_id;
    }
}
