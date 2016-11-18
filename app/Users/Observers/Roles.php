<?php

namespace App\Users\Observers;

use App\Helpers\Slugs;
use App\Users\Models\Role;

class Roles
{
	/**
     * Listen to the Role creating event.
     *
     * @param  Role  $role
     * @return void
     */
    public function creating(Role $role)
    {
        $role->slug = Slugs::make($role->name);
    }

    /**
     * Listen to the Role updating event.
     *
     * @param  Role  $role
     * @return void
     */
    public function updating(Role $role)
    {
        $role->slug = Slugs::make($role->name);
    }
}