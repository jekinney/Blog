<?php

namespace App\Users\Observers;

use App\Helpers\Slugs;
use App\Users\Models\Permission;

class Permissions
{
	/**
     * Listen to the Permission creating event.
     *
     * @param  Permission  $permission
     * @return void
     */
    public function creating(Permission $permission)
    {
        $permission->slug = Slugs::make($permission->name);
    }

    /**
     * Listen to the Permission updating event.
     *
     * @param  Permission  $permission
     * @return void
     */
    public function updating(Permission $permission)
    {
        $permission->slug = Slugs::make($permission->name);
    }
}