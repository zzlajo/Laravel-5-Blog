<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    /**
     * The database table used by role model
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes used for mass assginable
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

    /**
     * The attributes exclude from the model's JSON form
     *
     * @var array
     */
    protected $hidden = [];
}
