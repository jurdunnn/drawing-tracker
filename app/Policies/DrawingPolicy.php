<?php

namespace App\Policies;

use App\Models\Drawing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DrawingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Drawing $drawing)
    {
        return $drawing->project->user->id == $user->id
            ? Response::allow()
            : Response::deny('You do not have access to this project');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Drawing $drawing)
    {
        return $drawing->project->user->id == $user->id
            ? Response::allow()
            : Response::deny('You do not have access to this project');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Drawing $drawing)
    {
        return $drawing->project->user->id == $user->id
            ? Response::allow()
            : Response::deny('You do not have access to this project');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Drawing $drawing)
    {
        return $drawing->project->user->id == $user->id
            ? Response::allow()
            : Response::deny('You do not have access to this project');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Drawing $drawing)
    {
        return $drawing->project->user->id == $user->id
            ? Response::allow()
            : Response::deny('You do not have access to this project');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Drawing $drawing)
    {
        return $drawing->project->user->id == $user->id
            ? Response::allow()
            : Response::deny('You do not have access to this project');
    }
}
