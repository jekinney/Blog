<?php

use App\Users\Models\User;
use App\Users\Models\Role;
use App\Users\Models\Permission;
use Illuminate\Database\Seeder;

class ACLTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
        		'name' => 'Full Admin',
        		'description' => 'Full access',
        	],
        	[
        		'name' => 'Full Author',
        		'description' => 'Can add and edit articles, categories',
        	], 
        	[
        		'name' => 'Author',
        		'description' => 'Can add and edit own articles',
        	],
        	[
        		'name' => 'Comment Moderator',
        		'description' => 'Can hide, un-hide, approve and dis-approve comments',
        	],  
        ];

        $permissions = [
        	[
        		'name' => 'Dashboard Access',
        		'description' => 'Can access the dashboard',
        		'dashboard' => true,
        		'site' => true,
        	], 
            [
                'name' => 'Blog Dashboard Access',
                'description' => 'Can access Blog Menu',
                'dashboard' => true,
                'blog' => true, 
                'site' => true,
            ], 
        	[
        		'name' => 'Category Dashboard Access',
        		'description' => 'Can see the categories menu in the dashboard',
        		'dashboard' => true,
        		'blog' => true,
        	], 
        	[
        		'name' => 'Category Create',
        		'description' => 'Can create categories',
        		'dashboard' => true,
        		'blog' => true,
        	], 
        	[
        		'name' => 'Category Edit',
        		'description' => 'Can edit existing categories',
        		'dashboard' => true,
        		'blog' => true,
        	],
        	[
        		'name' => 'Category Delete',
        		'description' => 'Can remove an existing category',
        		'dashboard' => true,
        		'blog' => true,
        	],
        	[
        		'name' => 'Article Dashboard Access',
        		'description' => 'Can create categories (Image access seperate)',
        		'dashboard' => true,
        		'blog' => true,
        		'site' => true,
        	],
        	[
        		'name' => 'Article Create',
        		'description' => 'Can create articles',
        		'dashboard' => true,
        		'blog' => true,
        	], 
        	[
        		'name' => 'Article Edit',
        		'description' => 'Can edit ALL articles',
        		'dashboard' => true,
        		'blog' => true,
        	], 
        	[
        		'name' => 'Article Edit Only Authored',
        		'description' => 'Can edit only articles user authored',
        		'dashboard' => true,
        		'blog' => true,
        	],
        	[
        		'name' => 'Moderate Comments',
        		'description' => 'Can approve comments when a user requires approval',
        		'dashboard' => false,
        		'blog' => true,
        		'site' => true,
        	],
        	[
        		'name' => 'Hide Comments',
        		'description' => 'Can toggle comments to and from hidden status',
        		'dashboard' => false,
        		'blog' => true,
        		'site' => true,
        	],

        	[
        		'name' => 'Images Dashboard Access',
        		'description' => 'Can access images menu in the dashboard',
        		'dashboard' => true,
        		'site' => true,
        	],
        	[
        		'name' => 'Images Category Upload',
        		'description' => 'Can upload blog category related images',
        		'dashboard' => true,
        		'blog' => true,
        	],
        	[
        		'name' => 'Images Article Upload',
        		'description' => 'Can upload blog article related images',
        		'dashboard' => true,
        		'blog' => true,
        	],
        	[
        		'name' => 'Images Category Edit',
        		'description' => 'Can edit blog category related images',
        		'dashboard' => true,
        		'blog' => true,
        	],
        	[
        		'name' => 'Images Article Edit',
        		'description' => 'Can edit blog article related images',
        		'dashboard' => true,
        		'blog' => true,
        	],
        	[
        		'name' => 'Images Category Delete',
        		'description' => 'Can edit blog category related images',
        		'dashboard' => true,
        		'blog' => true,
        	],
        	[
        		'name' => 'Images Article Delete',
        		'description' => 'Can edit blog article related images',
        		'dashboard' => true,
        		'blog' => true,
        	],

        	[
        		'name' => 'User Dashboard Access',
        		'description' => 'Access to user menu in the dashboard',
        		'dashboard' => true,
        		'site' => true,
        		'user' => true,
        	],
        	[
        		'name' => 'User toggle Ban',
        		'description' => 'Toggle a user ban',
        		'dashboard' => true,
        		'user' => true,
        	],
        	[
        		'name' => 'User Activate',
        		'description' => 'Can force a user status to activated',
        		'dashboard' => true,
        		'user' => true,
        	],
        	[
        		'name' => 'User Moderated',
        		'description' => 'Require a user to have content approved by moderator',
        		'dashboard' => true,
        		'user' => true,
        	],
        	[
        		'name' => 'User Details',
        		'description' => 'Check a user\'s detials and history, overiding any private settings',
        		'dashboard' => true,
        		'user' => true,
        	],
        	[
        		'name' => 'User Roles',
        		'description' => 'Add or remove a User\'s roles',
        		'dashboard' => true,
        		'user' => true,
        	],

        	[
        		'name' => 'Roles Dashboard Access',
        		'description' => 'Access to roles in the dashboard menu',
        		'dashboard' => true,
        		'site' => true,
        		'user' => true,
        	],
        	[
        		'name' => 'Roles Create',
        		'description' => 'Create new roles and assign permissions',
        		'dashboard' => true,
        		'user' => true,
        	],
        	[
        		'name' => 'Roles Edit',
        		'description' => 'Edit roles and permissions on the role',
        		'dashboard' => true,
        		'user' => true,
        	],
        	[
        		'name' => 'Roles Delete',
        		'description' => 'Delete roles',
        		'dashboard' => true,
        		'user' => true,
        	],
        ];

        foreach($roles as $role)
        {
        	Role::create($role);
        }

        foreach($permissions as $permission)
        {
        	Permission::create($permission);
        }

        $permissions = Permission::get();
        $adminRole = Role::first();
        $adminRole->permissions()->sync($permissions);

        User::create(['username' => 'jekinney', 'email' => 'jekinneys@yahoo.com', 'password' => 'test123'])
        ->roles()->attach($adminRole);
    }
}
