<?php

/**
 * This file is part of Cerberus,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package LucasQuinnGuru\Cerberus
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Cerberus Role Model
    |--------------------------------------------------------------------------
    |
    | This is the Role model used by Cerberus to create correct relations.  Update
    | the role if it is in a different namespace.
    |
    */
    'role' => 'App\Role',

    /*
    |--------------------------------------------------------------------------
    | Cerberus Roles Table
    |--------------------------------------------------------------------------
    |
    | This is the roles table used by Cerberus to save roles to the database.
    |
    */
    'roles_table' => 'roles',

    /*
    |--------------------------------------------------------------------------
    | Cerberus role foreign key
    |--------------------------------------------------------------------------
    |
    | This is the role foreign key used by Cerberus to make a proper
    | relation between permissions and roles & roles and users
    |
    */
    'role_foreign_key' => 'role_id',

    /*
    |--------------------------------------------------------------------------
    | Application User Model
    |--------------------------------------------------------------------------
    |
    | This is the User model used by Cerberus to create correct relations.
    | Update the User if it is in a different namespace.
    |
    */
    'user' => 'App\User',

    /*
    |--------------------------------------------------------------------------
    | Application Users Table
    |--------------------------------------------------------------------------
    |
    | This is the users table used by the application to save users to the
    | database.
    |
    */
    'users_table' => 'users',

    /*
    |--------------------------------------------------------------------------
    | Cerberus role_user Table
    |--------------------------------------------------------------------------
    |
    | This is the role_user table used by Cerberus to save assigned roles to the
    | database.
    |
    */
    'role_user_table' => 'roleables',

    /*
    |--------------------------------------------------------------------------
    | Cerberus user foreign key
    |--------------------------------------------------------------------------
    |
    | This is the user foreign key used by Cerberus to make a proper
    | relation between roles and users
    |
    */
    'user_foreign_key' => 'roleable_id',

    /*
    |--------------------------------------------------------------------------
    | Cerberus Permission Model
    |--------------------------------------------------------------------------
    |
    | This is the Permission model used by Cerberus to create correct relations.
    | Update the permission if it is in a different namespace.
    |
    */
    'permission' => 'App\Permission',

    /*
    |--------------------------------------------------------------------------
    | Cerberus Permissions Table
    |--------------------------------------------------------------------------
    |
    | This is the permissions table used by Cerberus to save permissions to the
    | database.
    |
    */
    'permissions_table' => 'permissions',

    /*
    |--------------------------------------------------------------------------
    | Cerberus permission_role Table
    |--------------------------------------------------------------------------
    |
    | This is the permission_role table used by Cerberus to save relationship
    | between permissions and roles to the database.
    |
    */
    'permission_role_table' => 'permissionables',

    /*
    |--------------------------------------------------------------------------
    | Cerberus permission foreign key
    |--------------------------------------------------------------------------
    |
    | This is the permission foreign key used by Cerberus to make a proper
    | relation between permissions and roles
    |
    */
    'permission_foreign_key' => 'permissionable_id',
];
