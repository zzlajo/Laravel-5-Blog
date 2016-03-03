<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    /**
     * The databases table used by the model
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable
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
